document.addEventListener("DOMContentLoaded", () => {
  // Initialize all store functionality
  initializeHeader()
  initializeHeroSlider()
  initializeProductActions()
  initializeCartSidebar()
  initializeQuantitySelectors()
  initializeWishlist()
  initializeSearch()
  initializeMobileMenu()
})

// Header functionality
function initializeHeader() {
  // Search form
  const searchForm = document.querySelector(".search-form")
  if (searchForm) {
    searchForm.addEventListener("submit", (e) => {
      const searchInput = searchForm.querySelector(".search-input")
      if (!searchInput.value.trim()) {
        e.preventDefault()
        searchInput.focus()
      }
    })
  }

  // Cart and wishlist counters
  updateCartCounter()
  updateWishlistCounter()
}

// Hero slider functionality
function initializeHeroSlider() {
  const slides = document.querySelectorAll(".hero-slide")
  const indicators = document.querySelectorAll(".indicator")
  const prevBtn = document.getElementById("heroPrev")
  const nextBtn = document.getElementById("heroNext")

  if (slides.length === 0) return

  let currentSlide = 0
  const totalSlides = slides.length

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index)
    })
    indicators.forEach((indicator, i) => {
      indicator.classList.toggle("active", i === index)
    })
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides
    showSlide(currentSlide)
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides
    showSlide(currentSlide)
  }

  // Event listeners
  if (nextBtn) nextBtn.addEventListener("click", nextSlide)
  if (prevBtn) prevBtn.addEventListener("click", prevSlide)

  indicators.forEach((indicator, index) => {
    indicator.addEventListener("click", () => {
      currentSlide = index
      showSlide(currentSlide)
    })
  })

  // Auto-play
  setInterval(nextSlide, 5000)
}

// Product actions (Add to cart, wishlist, quick view)
function initializeProductActions() {
  // Add to cart buttons
  const addToCartBtns = document.querySelectorAll(".add-to-cart-btn")
  addToCartBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      const quantity = getProductQuantity(productId)
      addToCart(productId, quantity)
    })
  })

  // Buy now buttons
  const buyNowBtns = document.querySelectorAll(".buy-now-btn")
  buyNowBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      const quantity = getProductQuantity(productId)
      addToCart(productId, quantity)
      // Redirect to checkout
      window.location.href = "/checkout"
    })
  })

  // Wishlist buttons
  const wishlistBtns = document.querySelectorAll(".wishlist-btn")
  wishlistBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      toggleWishlist(productId)
    })
  })

  // Quick view buttons
  const quickViewBtns = document.querySelectorAll(".quick-view-btn")
  quickViewBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      showQuickView(productId)
    })
  })
}

// Cart sidebar functionality
function initializeCartSidebar() {
  const cartBtn = document.getElementById("cartBtn")
  const cartSidebar = document.getElementById("cartSidebar")
  const cartOverlay = document.getElementById("cartOverlay")
  const cartCloseBtn = document.getElementById("cartCloseBtn")

  if (cartBtn) {
    cartBtn.addEventListener("click", () => {
      openCartSidebar()
    })
  }

  if (cartCloseBtn) {
    cartCloseBtn.addEventListener("click", () => {
      closeCartSidebar()
    })
  }

  if (cartOverlay) {
    cartOverlay.addEventListener("click", () => {
      closeCartSidebar()
    })
  }

  // Initialize cart sidebar content
  loadCartSidebarContent()
}

function openCartSidebar() {
  const cartSidebar = document.getElementById("cartSidebar")
  const cartOverlay = document.getElementById("cartOverlay")

  if (cartSidebar && cartOverlay) {
    cartSidebar.classList.add("open")
    cartOverlay.classList.add("show")
    document.body.style.overflow = "hidden"
  }
}

function closeCartSidebar() {
  const cartSidebar = document.getElementById("cartSidebar")
  const cartOverlay = document.getElementById("cartOverlay")

  if (cartSidebar && cartOverlay) {
    cartSidebar.classList.remove("open")
    cartOverlay.classList.remove("show")
    document.body.style.overflow = ""
  }
}

// Quantity selectors
function initializeQuantitySelectors() {
  const quantitySelectors = document.querySelectorAll(".quantity-selector")

  quantitySelectors.forEach((selector) => {
    const minusBtn = selector.querySelector(".qty-btn.minus")
    const plusBtn = selector.querySelector(".qty-btn.plus")
    const input = selector.querySelector(".qty-input")

    if (minusBtn && input) {
      minusBtn.addEventListener("click", () => {
        const currentValue = Number.parseInt(input.value) || 1
        const minValue = Number.parseInt(input.min) || 1
        if (currentValue > minValue) {
          input.value = currentValue - 1
          input.dispatchEvent(new Event("change"))
        }
      })
    }

    if (plusBtn && input) {
      plusBtn.addEventListener("click", () => {
        const currentValue = Number.parseInt(input.value) || 1
        const maxValue = Number.parseInt(input.max) || 999
        if (currentValue < maxValue) {
          input.value = currentValue + 1
          input.dispatchEvent(new Event("change"))
        }
      })
    }

    // Handle cart item quantity changes
    if (input && input.dataset.itemId) {
      input.addEventListener("change", () => {
        const itemId = input.dataset.itemId
        const quantity = Number.parseInt(input.value) || 1
        updateCartItemQuantity(itemId, quantity)
      })
    }
  })
}

// Wishlist functionality
function initializeWishlist() {
  loadWishlistFromStorage()
}

function toggleWishlist(productId) {
  const wishlist = getWishlistFromStorage()
  const index = wishlist.indexOf(productId)

  if (index > -1) {
    wishlist.splice(index, 1)
    showNotification("Removed from wishlist", "info")
  } else {
    wishlist.push(productId)
    showNotification("Added to wishlist", "success")
  }

  saveWishlistToStorage(wishlist)
  updateWishlistCounter()
  updateWishlistButtons()
}

function getWishlistFromStorage() {
  return JSON.parse(localStorage.getItem("wishlist") || "[]")
}

function saveWishlistToStorage(wishlist) {
  localStorage.setItem("wishlist", JSON.stringify(wishlist))
}

function loadWishlistFromStorage() {
  const wishlist = getWishlistFromStorage()
  updateWishlistCounter()
  updateWishlistButtons()
}

function updateWishlistButtons() {
  const wishlist = getWishlistFromStorage()
  const wishlistBtns = document.querySelectorAll(".wishlist-btn")

  wishlistBtns.forEach((btn) => {
    const productId = btn.dataset.productId
    const isInWishlist = wishlist.includes(productId)
    const icon = btn.querySelector("i")

    if (icon) {
      icon.className = isInWishlist ? "fas fa-heart" : "far fa-heart"
    }
    btn.classList.toggle("active", isInWishlist)
  })
}

function updateWishlistCounter() {
  const wishlist = getWishlistFromStorage()
  const counter = document.getElementById("wishlistCount")
  if (counter) {
    counter.textContent = wishlist.length
    counter.style.display = wishlist.length > 0 ? "block" : "none"
  }
}

// Search functionality
function initializeSearch() {
  const searchInput = document.querySelector(".search-input")
  if (searchInput) {
    // Add search suggestions functionality here
    let searchTimeout

    searchInput.addEventListener("input", () => {
      clearTimeout(searchTimeout)
      searchTimeout = setTimeout(() => {
        const query = searchInput.value.trim()
        if (query.length > 2) {
          // Implement search suggestions
          console.log("Searching for:", query)
        }
      }, 300)
    })
  }
}

// Mobile menu functionality
function initializeMobileMenu() {
  const mobileMenuToggle = document.getElementById("mobileMenuToggle")
  const navigation = document.querySelector(".navigation")

  if (mobileMenuToggle && navigation) {
    mobileMenuToggle.addEventListener("click", () => {
      navigation.classList.toggle("mobile-open")
      mobileMenuToggle.classList.toggle("active")
    })
  }
}

// Cart functionality
function addToCart(productId, quantity = 1) {
  // Show loading state
  const btn = document.querySelector(`[data-product-id="${productId}"].add-to-cart-btn`)
  if (btn) {
    btn.classList.add("loading")
    btn.disabled = true
  }

  // Simulate API call
  setTimeout(() => {
    const cart = getCartFromStorage()
    const existingItem = cart.find((item) => item.id === productId)

    if (existingItem) {
      existingItem.quantity += quantity
    } else {
      cart.push({
        id: productId,
        quantity: quantity,
        addedAt: new Date().toISOString(),
      })
    }

    saveCartToStorage(cart)
    updateCartCounter()
    loadCartSidebarContent()
    showNotification("Added to cart successfully!", "success")

    // Remove loading state
    if (btn) {
      btn.classList.remove("loading")
      btn.disabled = false
    }

    // Open cart sidebar
    openCartSidebar()
  }, 500)
}

function removeFromCart(productId) {
  let cart = getCartFromStorage()
  cart = cart.filter((item) => item.id !== productId)
  saveCartToStorage(cart)
  updateCartCounter()
  loadCartSidebarContent()
  showNotification("Removed from cart", "info")
}

function updateCartItemQuantity(itemId, quantity) {
  const cart = getCartFromStorage()
  const item = cart.find((item) => item.id === itemId)

  if (item) {
    if (quantity <= 0) {
      removeFromCart(itemId)
    } else {
      item.quantity = quantity
      saveCartToStorage(cart)
      updateCartCounter()
      loadCartSidebarContent()
    }
  }
}

function getCartFromStorage() {
  return JSON.parse(localStorage.getItem("cart") || "[]")
}

function saveCartToStorage(cart) {
  localStorage.setItem("cart", JSON.stringify(cart))
}

function updateCartCounter() {
  const cart = getCartFromStorage()
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0)
  const counter = document.getElementById("cartCount")
  const total = document.getElementById("cartTotal")

  if (counter) {
    counter.textContent = totalItems
    counter.style.display = totalItems > 0 ? "block" : "none"
  }

  // Calculate total price (mock data)
  const totalPrice = cart.reduce((sum, item) => {
    const price = getProductPrice(item.id) // Mock function
    return sum + price * item.quantity
  }, 0)

  if (total) {
    total.textContent = formatCurrency(totalPrice)
  }
}

function loadCartSidebarContent() {
  const cart = getCartFromStorage()
  const cartItems = document.getElementById("cartSidebarItems")
  const cartEmpty = document.getElementById("cartEmpty")
  const cartSubtotal = document.getElementById("cartSubtotal")
  const cartSidebarTotal = document.getElementById("cartSidebarTotal")

  if (!cartItems) return

  if (cart.length === 0) {
    cartItems.style.display = "none"
    if (cartEmpty) cartEmpty.style.display = "block"
    return
  }

  cartItems.style.display = "block"
  if (cartEmpty) cartEmpty.style.display = "none"

  // Generate cart items HTML (mock implementation)
  cartItems.innerHTML = cart
    .map(
      (item) => `
        <div class="cart-item">
            <div class="item-image">
                <img src="/placeholder.svg?height=60&width=60" alt="Product">
            </div>
            <div class="item-details">
                <h4>${getProductName(item.id)}</h4>
                <div class="item-price">${formatCurrency(getProductPrice(item.id))}</div>
                <div class="item-quantity">
                    <button class="qty-btn minus" data-item-id="${item.id}">-</button>
                    <span class="qty">${item.quantity}</span>
                    <button class="qty-btn plus" data-item-id="${item.id}">+</button>
                </div>
            </div>
            <button class="remove-item-btn" data-item-id="${item.id}">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `,
    )
    .join("")

  // Re-initialize quantity selectors for cart sidebar
  initializeCartSidebarActions()

  // Update totals
  const subtotal = cart.reduce((sum, item) => sum + getProductPrice(item.id) * item.quantity, 0)
  if (cartSubtotal) cartSubtotal.textContent = formatCurrency(subtotal)
  if (cartSidebarTotal) cartSidebarTotal.textContent = formatCurrency(subtotal)
}

function initializeCartSidebarActions() {
  // Quantity buttons in cart sidebar
  const qtyBtns = document.querySelectorAll(".cart-sidebar .qty-btn")
  qtyBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const itemId = btn.dataset.itemId
      const qtySpan = btn.parentElement.querySelector(".qty")
      let quantity = Number.parseInt(qtySpan.textContent)

      if (btn.classList.contains("minus")) {
        quantity = Math.max(1, quantity - 1)
      } else {
        quantity += 1
      }

      qtySpan.textContent = quantity
      updateCartItemQuantity(itemId, quantity)
    })
  })

  // Remove buttons in cart sidebar
  const removeBtns = document.querySelectorAll(".cart-sidebar .remove-item-btn")
  removeBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const itemId = btn.dataset.itemId
      removeFromCart(itemId)
    })
  })
}

// Utility functions
function getProductQuantity(productId) {
  const quantityInput = document.querySelector(`#quantity`)
  return quantityInput ? Number.parseInt(quantityInput.value) || 1 : 1
}

function getProductPrice(productId) {
  // Mock product prices
  const prices = {
    1: 99.99,
    2: 199.99,
    3: 299.99,
    4: 1299.99,
    5: 79.99,
    6: 49.99,
    7: 89.99,
    8: 19.99,
  }
  return prices[productId] || 0
}

function getProductName(productId) {
  // Mock product names
  const names = {
    1: "Wireless Bluetooth Headphones",
    2: "Smart Fitness Watch",
    3: "Ergonomic Office Chair",
    4: "Gaming Laptop Pro",
    5: "Wireless Earbuds Pro",
    6: "Portable Bluetooth Speaker",
    7: "Gaming Headset RGB",
    8: "Premium Audio Cable",
  }
  return names[productId] || "Product"
}

function formatCurrency(amount) {
  return new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
  }).format(amount)
}

function showNotification(message, type = "info") {
  // Create notification element
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `

  // Add styles
  notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${getNotificationColor(type)};
        color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 300px;
    `

  document.body.appendChild(notification)

  // Show notification
  setTimeout(() => {
    notification.style.transform = "translateX(0)"
  }, 100)

  // Auto remove
  setTimeout(() => {
    notification.style.transform = "translateX(100%)"
    setTimeout(() => {
      if (notification.parentNode) {
        notification.parentNode.removeChild(notification)
      }
    }, 300)
  }, 3000)

  // Manual close
  const closeBtn = notification.querySelector(".notification-close")
  closeBtn.addEventListener("click", () => {
    notification.style.transform = "translateX(100%)"
    setTimeout(() => {
      if (notification.parentNode) {
        notification.parentNode.removeChild(notification)
      }
    }, 300)
  })
}

function getNotificationIcon(type) {
  const icons = {
    success: "check-circle",
    error: "exclamation-circle",
    warning: "exclamation-triangle",
    info: "info-circle",
  }
  return icons[type] || "info-circle"
}

function getNotificationColor(type) {
  const colors = {
    success: "#28a745",
    error: "#dc3545",
    warning: "#ffc107",
    info: "#007bff",
  }
  return colors[type] || "#007bff"
}

function showQuickView(productId) {
  // Implement quick view modal
  console.log("Show quick view for product:", productId)
  showNotification("Quick view feature coming soon!", "info")
}

// Export functions for global use
window.StoreManager = {
  addToCart,
  removeFromCart,
  toggleWishlist,
  showNotification,
  formatCurrency,
  openCartSidebar,
  closeCartSidebar,
}

// Initialize cart and wishlist on page load
document.addEventListener("DOMContentLoaded", () => {
  updateCartCounter()
  updateWishlistCounter()
  loadCartSidebarContent()
})
