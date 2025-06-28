// Global variables
let cart = JSON.parse(localStorage.getItem("cart")) || []
let currentStep = 1
let currentThumbnailIndex = 0
let isProcessingOrder = false

// Initialize the application
document.addEventListener("DOMContentLoaded", () => {
  updateCartCount()
  initializeProductSliders()
  initializeCheckoutForm()
  loadCartItems()
  initializeEventListeners()
  initializeFormValidation()
})

// Initialize event listeners
function initializeEventListeners() {
  // Search functionality
  const searchInput = document.querySelector(".search-input")
  const searchBtn = document.querySelector(".search-btn")

  if (searchInput && searchBtn) {
    searchBtn.addEventListener("click", performSearch)
    searchInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        performSearch()
      }
    })
  }

  // Close cart sidebar when clicking overlay
  const overlay = document.getElementById("overlay")
  if (overlay) {
    overlay.addEventListener("click", () => {
      toggleCart()
    })
  }

  // Close notifications when clicked
  document.addEventListener("click", (e) => {
    if (e.target.closest(".cart-notification")) {
      e.target.closest(".cart-notification").remove()
    }
  })

  // Handle window resize for mobile menu
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      const nav = document.querySelector(".nav")
      if (nav && nav.classList.contains("active")) {
        nav.classList.remove("active")
      }
    }
  })
}

// Enhanced cart functionality
function addToCart(id, name, price, image, quantity = 1) {
  try {
    // Validate inputs
    if (!id || !name || !price || !image) {
      throw new Error("Missing required product information")
    }

    const existingItem = cart.find((item) => item.id === id)
    const quantityToAdd = Number.parseInt(quantity) || 1

    if (existingItem) {
      existingItem.quantity += quantityToAdd
    } else {
      cart.push({
        id: Number.parseInt(id),
        name: String(name),
        price: Number.parseFloat(price),
        image: String(image),
        quantity: quantityToAdd,
        addedAt: new Date().toISOString(),
      })
    }

    localStorage.setItem("cart", JSON.stringify(cart))
    updateCartCount()
    showCartNotification(name, quantityToAdd)
    updateCartSidebar()

    // Trigger custom event for analytics
    window.dispatchEvent(
      new CustomEvent("cartUpdated", {
        detail: { action: "add", productId: id, quantity: quantityToAdd },
      }),
    )
  } catch (error) {
    console.error("Error adding to cart:", error)
    showErrorNotification("Failed to add item to cart. Please try again.")
  }
}

function removeFromCart(id) {
  try {
    const itemIndex = cart.findIndex((item) => item.id === Number.parseInt(id))
    if (itemIndex === -1) {
      throw new Error("Item not found in cart")
    }

    const removedItem = cart[itemIndex]
    cart.splice(itemIndex, 1)

    localStorage.setItem("cart", JSON.stringify(cart))
    updateCartCount()
    updateCartSidebar()
    loadCartItems()

    showCartNotification(`${removedItem.name} removed from cart`, 0, "removed")

    // Trigger custom event
    window.dispatchEvent(
      new CustomEvent("cartUpdated", {
        detail: { action: "remove", productId: id },
      }),
    )
  } catch (error) {
    console.error("Error removing from cart:", error)
    showErrorNotification("Failed to remove item from cart.")
  }
}

function updateQuantity(id, change) {
  try {
    const item = cart.find((item) => item.id === Number.parseInt(id))
    if (!item) {
      throw new Error("Item not found in cart")
    }

    if (typeof change === "number") {
      item.quantity += change
    } else {
      item.quantity = Number.parseInt(change) || 1
    }

    if (item.quantity <= 0) {
      removeFromCart(id)
      return
    }

    // Limit maximum quantity
    if (item.quantity > 99) {
      item.quantity = 99
      showErrorNotification("Maximum quantity is 99 per item.")
    }

    localStorage.setItem("cart", JSON.stringify(cart))
    updateCartCount()
    updateCartSidebar()
    loadCartItems()

    // Trigger custom event
    window.dispatchEvent(
      new CustomEvent("cartUpdated", {
        detail: { action: "update", productId: id, quantity: item.quantity },
      }),
    )
  } catch (error) {
    console.error("Error updating quantity:", error)
    showErrorNotification("Failed to update quantity.")
  }
}

function clearCart() {
  if (cart.length === 0) {
    showErrorNotification("Cart is already empty.")
    return
  }

  if (confirm("Are you sure you want to clear your cart? This action cannot be undone.")) {
    cart = []
    localStorage.setItem("cart", JSON.stringify(cart))
    updateCartCount()
    updateCartSidebar()
    loadCartItems()
    showCartNotification("Cart cleared", 0, "cleared")

    // Trigger custom event
    window.dispatchEvent(
      new CustomEvent("cartUpdated", {
        detail: { action: "clear" },
      }),
    )
  }
}

function updateCartCount() {
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0)
  const cartCountElements = document.querySelectorAll(".cart-count, #cartItemCount")

  cartCountElements.forEach((element) => {
    element.textContent = totalItems

    // Add animation class for visual feedback
    element.classList.add("updated")
    setTimeout(() => element.classList.remove("updated"), 300)
  })

  // Update page title with cart count
  if (totalItems > 0) {
    document.title = `(${totalItems}) ${document.title.replace(/^$$\d+$$\s/, "")}`
  } else {
    document.title = document.title.replace(/^$$\d+$$\s/, "")
  }
}

function updateCartSidebar() {
  const cartItemsContainer = document.getElementById("cartItems")
  const cartTotalElement = document.getElementById("cartTotal")

  if (!cartItemsContainer) return

  if (cart.length === 0) {
    cartItemsContainer.innerHTML = `
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Your cart is empty</p>
                <button class="btn btn-primary" onclick="toggleCart()">Continue Shopping</button>
            </div>
        `
    if (cartTotalElement) cartTotalElement.textContent = "0.00"
    return
  }

  let cartHTML = ""
  let total = 0

  cart.forEach((item) => {
    const itemTotal = item.price * item.quantity
    total += itemTotal

    cartHTML += `
            <div class="cart-item-mini" data-id="${item.id}">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;" onerror="this.src='/placeholder.svg?height=50&width=50'">
                <div style="flex: 1; margin-left: 1rem;">
                    <h4 style="margin: 0; font-size: 0.9rem;">${item.name}</h4>
                    <p style="margin: 0; color: #666; font-size: 0.8rem;">Qty: ${item.quantity}</p>
                </div>
                <div style="text-align: right;">
                    <p style="margin: 0; font-weight: bold; color: #007bff;">$${itemTotal.toFixed(2)}</p>
                    <button onclick="removeFromCart(${item.id})" style="background: none; border: none; color: #dc3545; cursor: pointer; font-size: 0.8rem;" title="Remove item">Remove</button>
                </div>
            </div>
        `
  })

  cartItemsContainer.innerHTML = cartHTML
  if (cartTotalElement) cartTotalElement.textContent = total.toFixed(2)
}

function loadCartItems() {
  const cartItemsList = document.getElementById("cartItemsList")
  if (!cartItemsList) return

  if (cart.length === 0) {
    cartItemsList.innerHTML = `
            <div class="empty-cart-page">
                <i class="fas fa-shopping-cart"></i>
                <h3>Your cart is empty</h3>
                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="/" class="btn btn-primary">Start Shopping</a>
            </div>
        `
    return
  }

  let cartHTML = ""
  cart.forEach((item) => {
    const itemTotal = item.price * item.quantity
    cartHTML += `
            <div class="cart-item" data-id="${item.id}">
                <div class="item-image">
                    <img src="${item.image}" alt="${item.name}" onerror="this.src='/placeholder.svg?height=120&width=120'">
                </div>
                <div class="item-details">
                    <h3>${item.name}</h3>
                    <p class="item-description">Premium quality product</p>
                    <div class="item-actions">
                        <button class="btn-link" onclick="moveToWishlist(${item.id})" title="Move to wishlist">
                            <i class="far fa-heart"></i> Move to Wishlist
                        </button>
                        <button class="btn-link" onclick="removeFromCart(${item.id})" title="Remove from cart">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
                <div class="item-quantity">
                    <label>Quantity:</label>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity(${item.id}, -1)" ${item.quantity <= 1 ? "disabled" : ""}>-</button>
                        <input type="number" value="${item.quantity}" min="1" max="99" onchange="updateQuantity(${item.id}, this.value)">
                        <button onclick="updateQuantity(${item.id}, 1)" ${item.quantity >= 99 ? "disabled" : ""}>+</button>
                    </div>
                </div>
                <div class="item-price">
                    <div class="current-price">$${itemTotal.toFixed(2)}</div>
                    <div class="unit-price">$${item.price.toFixed(2)} each</div>
                </div>
            </div>
        `
  })

  cartItemsList.innerHTML = cartHTML
}

function showCartNotification(productName, quantity = 1, action = "added") {
  // Remove existing notifications
  document.querySelectorAll(".cart-notification").forEach((n) => n.remove())

  let message = ""
  let bgColor = "#28a745"
  let icon = "fas fa-check-circle"

  switch (action) {
    case "added":
      message = quantity > 1 ? `${quantity} × ${productName} added to cart!` : `${productName} added to cart!`
      break
    case "removed":
      message = `${productName} removed from cart!`
      bgColor = "#dc3545"
      icon = "fas fa-trash"
      break
    case "cleared":
      message = "Cart cleared!"
      bgColor = "#6c757d"
      icon = "fas fa-broom"
      break
  }

  const notification = document.createElement("div")
  notification.className = "cart-notification"
  notification.innerHTML = `
        <div style="background: ${bgColor}; color: white; padding: 1rem; border-radius: 5px; position: fixed; top: 20px; right: 20px; z-index: 9999; box-shadow: 0 5px 15px rgba(0,0,0,0.2); max-width: 300px; cursor: pointer;">
            <i class="${icon}"></i> ${message}
        </div>
    `

  document.body.appendChild(notification)

  // Auto-remove after 3 seconds
  setTimeout(() => {
    if (notification.parentNode) {
      notification.remove()
    }
  }, 3000)
}

function showErrorNotification(message) {
  // Remove existing notifications
  document.querySelectorAll(".error-notification").forEach((n) => n.remove())

  const notification = document.createElement("div")
  notification.className = "error-notification"
  notification.innerHTML = `
        <div style="background: #dc3545; color: white; padding: 1rem; border-radius: 5px; position: fixed; top: 20px; right: 20px; z-index: 9999; box-shadow: 0 5px 15px rgba(0,0,0,0.2); max-width: 300px; cursor: pointer;">
            <i class="fas fa-exclamation-triangle"></i> ${message}
        </div>
    `

  document.body.appendChild(notification)

  // Auto-remove after 4 seconds
  setTimeout(() => {
    if (notification.parentNode) {
      notification.remove()
    }
  }, 4000)
}

// Cart sidebar toggle
function toggleCart() {
  const cartSidebar = document.getElementById("cartSidebar")
  const overlay = document.getElementById("overlay")

  if (cartSidebar && overlay) {
    const isActive = cartSidebar.classList.contains("active")

    if (isActive) {
      cartSidebar.classList.remove("active")
      overlay.classList.remove("active")
      document.body.style.overflow = ""
    } else {
      cartSidebar.classList.add("active")
      overlay.classList.add("active")
      document.body.style.overflow = "hidden"
      updateCartSidebar()
    }
  }
}

// Mobile menu toggle
function toggleMobileMenu() {
  const nav = document.querySelector(".nav")
  const hamburger = document.querySelector(".hamburger")

  if (nav) {
    nav.classList.toggle("active")
    if (hamburger) {
      hamburger.classList.toggle("active")
    }

    // Prevent body scroll when menu is open
    if (nav.classList.contains("active")) {
      document.body.style.overflow = "hidden"
    } else {
      document.body.style.overflow = ""
    }
  }
}

// Enhanced product image gallery
function changeMainImage(src, thumbnail) {
  const mainImage = document.getElementById("mainProductImage")
  if (mainImage) {
    // Add loading state
    mainImage.style.opacity = "0.5"

    // Create new image to preload
    const newImg = new Image()
    newImg.onload = () => {
      mainImage.src = src
      mainImage.style.opacity = "1"
    }
    newImg.onerror = () => {
      mainImage.style.opacity = "1"
      showErrorNotification("Failed to load image")
    }
    newImg.src = src
  }

  // Update active thumbnail
  document.querySelectorAll(".thumbnail").forEach((thumb) => {
    thumb.classList.remove("active")
  })
  if (thumbnail) {
    thumbnail.classList.add("active")

    // Update current index for keyboard navigation
    const thumbnails = Array.from(document.querySelectorAll(".thumbnail"))
    currentThumbnailIndex = thumbnails.indexOf(thumbnail)
  }
}

function nextThumbnail() {
  const thumbnails = document.querySelectorAll(".thumbnail")
  if (thumbnails.length > 0) {
    currentThumbnailIndex = (currentThumbnailIndex + 1) % thumbnails.length
    thumbnails[currentThumbnailIndex].click()
  }
}

function prevThumbnail() {
  const thumbnails = document.querySelectorAll(".thumbnail")
  if (thumbnails.length > 0) {
    currentThumbnailIndex = currentThumbnailIndex === 0 ? thumbnails.length - 1 : currentThumbnailIndex - 1
    thumbnails[currentThumbnailIndex].click()
  }
}

// Enhanced product quantity controls
function increaseQuantity() {
  const quantityInput = document.getElementById("quantity")
  if (quantityInput) {
    const currentValue = Number.parseInt(quantityInput.value) || 1
    const maxValue = Number.parseInt(quantityInput.max) || 99
    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1
      quantityInput.dispatchEvent(new Event("change"))
    }
  }
}

function decreaseQuantity() {
  const quantityInput = document.getElementById("quantity")
  if (quantityInput) {
    const currentValue = Number.parseInt(quantityInput.value) || 1
    const minValue = Number.parseInt(quantityInput.min) || 1
    if (currentValue > minValue) {
      quantityInput.value = currentValue - 1
      quantityInput.dispatchEvent(new Event("change"))
    }
  }
}

// Enhanced product tabs
function showTab(tabName) {
  // Hide all tab panes
  document.querySelectorAll(".tab-pane").forEach((pane) => {
    pane.classList.remove("active")
  })

  // Remove active class from all tab buttons
  document.querySelectorAll(".tab-btn").forEach((btn) => {
    btn.classList.remove("active")
  })

  // Show selected tab pane
  const selectedPane = document.getElementById(tabName)
  if (selectedPane) {
    selectedPane.classList.add("active")

    // Scroll to tab content on mobile
    if (window.innerWidth <= 768) {
      selectedPane.scrollIntoView({ behavior: "smooth", block: "start" })
    }
  }

  // Add active class to clicked button
  if (event && event.target) {
    event.target.classList.add("active")
  }
}

// Enhanced color option selection
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("color-option")) {
    document.querySelectorAll(".color-option").forEach((option) => {
      option.classList.remove("active")
    })
    e.target.classList.add("active")

    // Store selected color
    const selectedColor = e.target.dataset.color
    if (selectedColor) {
      localStorage.setItem("selectedColor", selectedColor)
    }
  }
})

// Navigation functions with error handling
function goToProduct(id) {
  if (!id) {
    console.error("Product ID is required")
    return
  }

  // In a real Laravel app, this would navigate to the product page
  console.log("Navigate to product:", id)
  // window.location.href = `/product/${id}`;
}

function goToCart() {
  console.log("Navigate to cart")
  // window.location.href = '/cart';
  toggleCart() // Close sidebar
}

function goToCheckout() {
  if (cart.length === 0) {
    showErrorNotification("Your cart is empty. Add some items before checkout.")
    return
  }

  console.log("Navigate to checkout")
  // window.location.href = '/checkout';
  toggleCart() // Close sidebar
}

// Enhanced checkout functionality
function initializeCheckoutForm() {
  // Initialize shipping method change handlers
  const shippingOptions = document.querySelectorAll('input[name="shipping"]')
  shippingOptions.forEach((option) => {
    option.addEventListener("change", updateShippingCost)
  })

  // Initialize payment method change handlers
  const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]')
  paymentMethods.forEach((method) => {
    method.addEventListener("change", togglePaymentForms)
  })

  // Initialize form validation
  initializeFormValidation()
}

function initializeFormValidation() {
  // Real-time validation for email
  const emailInput = document.getElementById("email")
  if (emailInput) {
    emailInput.addEventListener("blur", function () {
      if (this.value && !validateEmail(this.value)) {
        this.setCustomValidity("Please enter a valid email address")
        this.style.borderColor = "#dc3545"
      } else {
        this.setCustomValidity("")
        this.style.borderColor = ""
      }
    })
  }

  // Real-time validation for phone
  const phoneInput = document.getElementById("phone")
  if (phoneInput) {
    phoneInput.addEventListener("blur", function () {
      if (this.value && !validatePhone(this.value)) {
        this.setCustomValidity("Please enter a valid phone number")
        this.style.borderColor = "#dc3545"
      } else {
        this.setCustomValidity("")
        this.style.borderColor = ""
      }
    })
  }

  // Card number formatting
  const cardNumberInput = document.getElementById("cardNumber")
  if (cardNumberInput) {
    cardNumberInput.addEventListener("input", function () {
      // Remove all non-digits
      let value = this.value.replace(/\D/g, "")

      // Add spaces every 4 digits
      value = value.replace(/(\d{4})(?=\d)/g, "$1 ")

      // Limit to 19 characters (16 digits + 3 spaces)
      if (value.length > 19) {
        value = value.substring(0, 19)
      }

      this.value = value
    })
  }

  // Expiry date formatting
  const expiryInput = document.getElementById("expiryDate")
  if (expiryInput) {
    expiryInput.addEventListener("input", function () {
      let value = this.value.replace(/\D/g, "")
      if (value.length >= 2) {
        value = value.substring(0, 2) + "/" + value.substring(2, 4)
      }
      this.value = value
    })
  }

  // CVV validation
  const cvvInput = document.getElementById("cvv")
  if (cvvInput) {
    cvvInput.addEventListener("input", function () {
      this.value = this.value.replace(/\D/g, "").substring(0, 4)
    })
  }
}

function nextStep() {
  if (isProcessingOrder) return

  const currentSection = document.querySelector(".form-section.active")
  const nextSection = getNextSection(currentStep)

  if (validateCurrentStep()) {
    // Hide current section
    currentSection.classList.remove("active")

    // Show next section
    if (nextSection) {
      nextSection.classList.add("active")
    }

    // Update step indicator
    updateStepIndicator(currentStep + 1)
    currentStep++

    // Update review section if we're on the last step
    if (currentStep === 3) {
      updateReviewSection()
    }

    // Scroll to top of form
    const checkoutForm = document.getElementById("checkoutForm")
    if (checkoutForm) {
      checkoutForm.scrollIntoView({ behavior: "smooth", block: "start" })
    }
  }
}

function prevStep() {
  if (isProcessingOrder) return

  const currentSection = document.querySelector(".form-section.active")
  const prevSection = getPrevSection(currentStep)

  // Hide current section
  currentSection.classList.remove("active")

  // Show previous section
  if (prevSection) {
    prevSection.classList.add("active")
  }

  // Update step indicator
  updateStepIndicator(currentStep - 1)
  currentStep--

  // Scroll to top of form
  const checkoutForm = document.getElementById("checkoutForm")
  if (checkoutForm) {
    checkoutForm.scrollIntoView({ behavior: "smooth", block: "start" })
  }
}

function getNextSection(step) {
  switch (step) {
    case 1:
      return document.getElementById("paymentSection")
    case 2:
      return document.getElementById("reviewSection")
    default:
      return null
  }
}

function getPrevSection(step) {
  switch (step) {
    case 2:
      return document.getElementById("shippingSection")
    case 3:
      return document.getElementById("paymentSection")
    default:
      return null
  }
}

function updateStepIndicator(step) {
  document.querySelectorAll(".step").forEach((stepEl, index) => {
    if (index + 1 <= step) {
      stepEl.classList.add("active")
    } else {
      stepEl.classList.remove("active")
    }
  })
}

function validateCurrentStep() {
  const currentSection = document.querySelector(".form-section.active")
  const requiredFields = currentSection.querySelectorAll("input[required], select[required]")

  let isValid = true
  let firstInvalidField = null

  requiredFields.forEach((field) => {
    const value = field.value.trim()
    let fieldValid = true

    if (!value) {
      fieldValid = false
    } else {
      // Additional validation based on field type
      if (field.type === "email" && !validateEmail(value)) {
        fieldValid = false
      } else if (field.type === "tel" && !validatePhone(value)) {
        fieldValid = false
      }
    }

    if (!fieldValid) {
      field.style.borderColor = "#dc3545"
      field.classList.add("invalid")
      isValid = false

      if (!firstInvalidField) {
        firstInvalidField = field
      }
    } else {
      field.style.borderColor = ""
      field.classList.remove("invalid")
    }
  })

  if (!isValid) {
    showErrorNotification("Please fill in all required fields correctly.")
    if (firstInvalidField) {
      firstInvalidField.focus()
    }
  }

  return isValid
}

function updateShippingCost() {
  const selectedShipping = document.querySelector('input[name="shipping"]:checked')
  const shippingCostElement = document.getElementById("shippingCost")
  const orderTotalElement = document.getElementById("orderTotal")

  if (selectedShipping && shippingCostElement && orderTotalElement) {
    let shippingCost = 0
    let shippingText = "FREE"

    switch (selectedShipping.value) {
      case "express":
        shippingCost = 12.99
        shippingText = "$12.99"
        break
      case "overnight":
        shippingCost = 24.99
        shippingText = "$24.99"
        break
    }

    shippingCostElement.textContent = shippingText

    // Calculate totals from cart
    const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0)
    const tax = subtotal * 0.08 // 8% tax rate
    const newTotal = subtotal + shippingCost + tax

    orderTotalElement.textContent = `$${newTotal.toFixed(2)}`
  }
}

function togglePaymentForms() {
  const selectedPayment = document.querySelector('input[name="paymentMethod"]:checked')
  const creditCardForm = document.getElementById("creditCardForm")

  if (creditCardForm) {
    if (selectedPayment && selectedPayment.value === "creditCard") {
      creditCardForm.style.display = "block"

      // Make credit card fields required
      creditCardForm.querySelectorAll("input").forEach((input) => {
        input.setAttribute("required", "required")
      })
    } else {
      creditCardForm.style.display = "none"

      // Remove required attribute from credit card fields
      creditCardForm.querySelectorAll("input").forEach((input) => {
        input.removeAttribute("required")
      })
    }
  }
}

function toggleBillingAddress() {
  const sameAsShipping = document.getElementById("sameAsShipping")
  const billingForm = document.getElementById("billingForm")

  if (billingForm) {
    if (sameAsShipping && sameAsShipping.checked) {
      billingForm.style.display = "none"

      // Remove required attributes from billing fields
      billingForm.querySelectorAll("input[required]").forEach((input) => {
        input.removeAttribute("required")
      })
    } else {
      billingForm.style.display = "block"

      // Add required attributes to billing fields
      billingForm.querySelectorAll("input").forEach((input) => {
        if (input.dataset.required === "true") {
          input.setAttribute("required", "required")
        }
      })
    }
  }
}

function updateReviewSection() {
  // Update shipping address display
  const shippingDisplay = document.getElementById("shippingAddressDisplay")
  if (shippingDisplay) {
    const firstName = document.getElementById("firstName")?.value || ""
    const lastName = document.getElementById("lastName")?.value || ""
    const address = document.getElementById("address")?.value || ""
    const apartment = document.getElementById("apartment")?.value || ""
    const city = document.getElementById("city")?.value || ""
    const state = document.getElementById("state")?.value || ""
    const zipCode = document.getElementById("zipCode")?.value || ""

    let addressHTML = `<p><strong>${firstName} ${lastName}</strong></p>`
    addressHTML += `<p>${address}${apartment ? ", " + apartment : ""}</p>`
    addressHTML += `<p>${city}, ${state} ${zipCode}</p>`

    shippingDisplay.innerHTML = addressHTML
  }

  // Update payment method display
  const paymentDisplay = document.getElementById("paymentMethodDisplay")
  if (paymentDisplay) {
    const selectedPayment = document.querySelector('input[name="paymentMethod"]:checked')
    if (selectedPayment) {
      let paymentText = ""
      switch (selectedPayment.value) {
        case "creditCard":
          const cardNumber = document.getElementById("cardNumber")?.value || ""
          const maskedCard = cardNumber ? `**** **** **** ${cardNumber.replace(/\s/g, "").slice(-4)}` : ""
          paymentText = `Credit Card ${maskedCard}`
          break
        case "paypal":
          paymentText = "PayPal"
          break
        case "applePay":
          paymentText = "Apple Pay"
          break
      }
      paymentDisplay.innerHTML = `<p>${paymentText}</p>`
    }
  }

  // Update shipping method display
  const selectedShipping = document.querySelector('input[name="shipping"]:checked')
  const shippingMethodDisplay = document.getElementById("shippingMethodDisplay")
  if (shippingMethodDisplay && selectedShipping) {
    const shippingLabel = selectedShipping.parentElement.querySelector("strong")?.textContent || ""
    shippingMethodDisplay.innerHTML = `<p>${shippingLabel}</p>`
  }
}

function editSection(section) {
  if (isProcessingOrder) return

  // Reset to the specified section
  document.querySelectorAll(".form-section").forEach((sec) => {
    sec.classList.remove("active")
  })

  if (section === "shipping") {
    document.getElementById("shippingSection")?.classList.add("active")
    currentStep = 1
  } else if (section === "payment") {
    document.getElementById("paymentSection")?.classList.add("active")
    currentStep = 2
  }

  updateStepIndicator(currentStep)
}

function placeOrder(event) {
  if (event) {
    event.preventDefault()
  }

  if (isProcessingOrder) return

  const agreeTerms = document.getElementById("agreeTerms")

  if (!agreeTerms || !agreeTerms.checked) {
    showErrorNotification("Please agree to the terms and conditions.")
    return
  }

  if (cart.length === 0) {
    showErrorNotification("Your cart is empty.")
    return
  }

  // Show loading state
  const submitBtn = event?.target || document.querySelector('.btn[onclick="placeOrder()"]')
  if (submitBtn) {
    const originalText = submitBtn.innerHTML
    submitBtn.innerHTML = '<span class="spinner"></span> Processing Order...'
    submitBtn.disabled = true
    isProcessingOrder = true

    // Collect order data
    const orderData = {
      items: cart,
      shipping: {
        firstName: document.getElementById("firstName")?.value,
        lastName: document.getElementById("lastName")?.value,
        email: document.getElementById("email")?.value,
        phone: document.getElementById("phone")?.value,
        address: document.getElementById("address")?.value,
        apartment: document.getElementById("apartment")?.value,
        city: document.getElementById("city")?.value,
        state: document.getElementById("state")?.value,
        zipCode: document.getElementById("zipCode")?.value,
        method: document.querySelector('input[name="shipping"]:checked')?.value,
      },
      payment: {
        method: document.querySelector('input[name="paymentMethod"]:checked')?.value,
        cardNumber: document.getElementById("cardNumber")?.value,
        expiryDate: document.getElementById("expiryDate")?.value,
        cvv: document.getElementById("cvv")?.value,
        cardName: document.getElementById("cardName")?.value,
      },
      timestamp: new Date().toISOString(),
    }

    // Simulate order processing
    setTimeout(() => {
      try {
        // In a real app, this would be an API call
        console.log("Order data:", orderData)

        // Generate order number
        const orderNumber = "ORD-" + Date.now()

        showCartNotification(
          `Order ${orderNumber} placed successfully! You will receive a confirmation email shortly.`,
          0,
          "success",
        )

        // Clear cart
        cart = []
        localStorage.setItem("cart", JSON.stringify(cart))
        updateCartCount()

        // Store order in localStorage for order confirmation page
        localStorage.setItem(
          "lastOrder",
          JSON.stringify({
            ...orderData,
            orderNumber: orderNumber,
            status: "confirmed",
          }),
        )

        // Reset form and redirect
        setTimeout(() => {
          // In a real app, redirect to order confirmation page
          // window.location.href = `/order-confirmation/${orderNumber}`;
          console.log("Redirect to order confirmation page")
        }, 1500)
      } catch (error) {
        console.error("Order processing error:", error)
        showErrorNotification("Failed to process order. Please try again.")
      } finally {
        // Reset button state
        if (submitBtn) {
          submitBtn.innerHTML = originalText
          submitBtn.disabled = false
        }
        isProcessingOrder = false
      }
    }, 2000)
  }
}

// Enhanced wishlist functionality
function moveToWishlist(id) {
  try {
    const item = cart.find((item) => item.id === Number.parseInt(id))
    if (!item) {
      throw new Error("Item not found in cart")
    }

    // Get existing wishlist
    const wishlist = JSON.parse(localStorage.getItem("wishlist")) || []

    // Check if item already in wishlist
    const existingWishlistItem = wishlist.find((wItem) => wItem.id === item.id)

    if (!existingWishlistItem) {
      wishlist.push({
        id: item.id,
        name: item.name,
        price: item.price,
        image: item.image,
        addedAt: new Date().toISOString(),
      })
      localStorage.setItem("wishlist", JSON.stringify(wishlist))
    }

    // Remove from cart
    removeFromCart(id)

    showCartNotification(`${item.name} moved to wishlist!`, 0, "moved")
  } catch (error) {
    console.error("Error moving to wishlist:", error)
    showErrorNotification("Failed to move item to wishlist.")
  }
}

// Enhanced quick view functionality
function quickView(id) {
  if (!id) {
    console.error("Product ID is required for quick view")
    return
  }

  // In a real app, this would fetch product data and open a modal
  console.log("Quick view for product:", id)

  // Create and show modal (placeholder implementation)
  const modal = document.createElement("div")
  modal.className = "quick-view-modal"
  modal.innerHTML = `
        <div class="modal-overlay" onclick="this.parentElement.remove()">
            <div class="modal-content" onclick="event.stopPropagation()">
                <button class="modal-close" onclick="this.closest('.quick-view-modal').remove()">&times;</button>
                <div class="modal-body">
                    <p>Quick view for product ${id} would load here...</p>
                    <button class="btn btn-primary" onclick="this.closest('.quick-view-modal').remove()">Close</button>
                </div>
            </div>
        </div>
    `

  document.body.appendChild(modal)
  document.body.style.overflow = "hidden"

  // Clean up when modal is removed
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      if (mutation.type === "childList") {
        mutation.removedNodes.forEach((node) => {
          if (node === modal) {
            document.body.style.overflow = ""
            observer.disconnect()
          }
        })
      }
    })
  })
  observer.observe(document.body, { childList: true })
}

// Enhanced search functionality
function performSearch() {
  const searchInput = document.querySelector(".search-input")
  const query = searchInput?.value.trim()

  if (!query) {
    showErrorNotification("Please enter a search term.")
    return
  }

  if (query.length < 2) {
    showErrorNotification("Search term must be at least 2 characters long.")
    return
  }

  console.log("Search for:", query)

  // Store search query for analytics
  let searchHistory = JSON.parse(localStorage.getItem("searchHistory")) || []
  if (!searchHistory.includes(query)) {
    searchHistory.unshift(query)
    searchHistory = searchHistory.slice(0, 10) // Keep only last 10 searches
    localStorage.setItem("searchHistory", JSON.stringify(searchHistory))
  }

  // In a real app, this would redirect to search results
  // window.location.href = `/search?q=${encodeURIComponent(query)}`;
  showCartNotification(`Searching for: ${query}`, 0, "search")
}

// Initialize product sliders and interactions
function initializeProductSliders() {
  // Auto-play hero slider if exists
  const heroSlider = document.querySelector(".hero-slider")
  if (heroSlider) {
    initializeHeroSlider(heroSlider)
  }

  // Initialize product image zoom
  const mainImage = document.getElementById("mainProductImage")
  if (mainImage) {
    mainImage.addEventListener("mousemove", handleImageZoom)
    mainImage.addEventListener("mouseleave", hideImageZoom)

    // Add keyboard navigation for images
    mainImage.addEventListener("keydown", (e) => {
      if (e.key === "ArrowLeft") {
        prevThumbnail()
      } else if (e.key === "ArrowRight") {
        nextThumbnail()
      }
    })

    // Make image focusable for keyboard navigation
    mainImage.setAttribute("tabindex", "0")
  }
}

function initializeHeroSlider(slider) {
  const slides = slider.querySelectorAll(".slide")
  const dots = slider.querySelectorAll(".dot")
  let currentSlide = 0
  let slideInterval

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index)
    })

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index)
    })

    currentSlide = index
  }

  function nextSlide() {
    const nextIndex = (currentSlide + 1) % slides.length
    showSlide(nextIndex)
  }

  function startAutoPlay() {
    slideInterval = setInterval(nextSlide, 5000)
  }

  function stopAutoPlay() {
    clearInterval(slideInterval)
  }

  // Initialize
  if (slides.length > 1) {
    showSlide(0)
    startAutoPlay()

    // Pause on hover
    slider.addEventListener("mouseenter", stopAutoPlay)
    slider.addEventListener("mouseleave", startAutoPlay)

    // Dot navigation
    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        showSlide(index)
        stopAutoPlay()
        setTimeout(startAutoPlay, 3000) // Resume after 3 seconds
      })
    })
  }
}

function handleImageZoom(e) {
  const imageZoom = document.getElementById("imageZoom")
  if (!imageZoom) return

  const rect = e.target.getBoundingClientRect()
  const x = e.clientX - rect.left
  const y = e.clientY - rect.top

  const xPercent = (x / rect.width) * 100
  const yPercent = (y / rect.height) * 100

  imageZoom.style.display = "block"
  imageZoom.style.backgroundImage = `url(${e.target.src})`
  imageZoom.style.backgroundPosition = `${xPercent}% ${yPercent}%`
  imageZoom.style.backgroundSize = "200%"
}

function hideImageZoom() {
  const imageZoom = document.getElementById("imageZoom")
  if (imageZoom) {
    imageZoom.style.display = "none"
  }
}

// Enhanced form validation helpers
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return re.test(email)
}

function validatePhone(phone) {
  // Remove all non-digits
  const cleaned = phone.replace(/\D/g, "")

  // Check if it's a valid US phone number (10 digits)
  const re = /^[0-9]{10}$/
  return re.test(cleaned)
}

function validateCreditCard(cardNumber) {
  // Remove spaces and check if it's all digits
  const cleaned = cardNumber.replace(/\s/g, "")

  if (!/^\d+$/.test(cleaned)) {
    return false
  }

  // Luhn algorithm for credit card validation
  let sum = 0
  let isEven = false

  for (let i = cleaned.length - 1; i >= 0; i--) {
    let digit = Number.parseInt(cleaned.charAt(i))

    if (isEven) {
      digit *= 2
      if (digit > 9) {
        digit -= 9
      }
    }

    sum += digit
    isEven = !isEven
  }

  return sum % 10 === 0
}

// Utility functions
function formatCurrency(amount) {
  return new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
  }).format(amount)
}

function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

// Analytics and tracking
function trackEvent(eventName, eventData = {}) {
  // In a real app, this would send data to analytics service
  console.log("Analytics Event:", eventName, eventData)

  // Store locally for debugging
  let events = JSON.parse(localStorage.getItem("analyticsEvents")) || []
  events.push({
    event: eventName,
    data: eventData,
    timestamp: new Date().toISOString(),
  })

  // Keep only last 100 events
  events = events.slice(-100)
  localStorage.setItem("analyticsEvents", JSON.stringify(events))
}

// Listen for cart updates and track them
window.addEventListener("cartUpdated", (e) => {
  trackEvent("cart_updated", e.detail)
})

// Error handling for uncaught errors
window.addEventListener("error", (e) => {
  console.error("JavaScript Error:", e.error)
  // In production, you might want to send this to an error tracking service
})

// Service worker registration (if available)
if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker
      .register("/sw.js")
      .then((registration) => {
        console.log("ServiceWorker registration successful")
      })
      .catch((err) => {
        console.log("ServiceWorker registration failed")
      })
  })
}

// Export functions for testing (if in Node.js environment)
if (typeof module !== "undefined" && module.exports) {
  module.exports = {
    validateEmail,
    validatePhone,
    validateCreditCard,
    formatCurrency,
    debounce,
  }
}

