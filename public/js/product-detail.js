document.addEventListener("DOMContentLoaded", () => {
  // Initialize all product detail functionality
  initializeImageSlider()
  initializeThumbnails()
  initializeImageZoom()
  initializeQuantitySelector()
  initializeProductOptions()
  initializeProductTabs()
  initializeProductActions()
  initializeShareModal()
})

// Import Glide.js
const Glide = window.Glide

// Image Slider using Glide.js
function initializeImageSlider() {
  const mainSlider = document.getElementById("productImageSlider")
  if (!mainSlider) return

  const glideMain = new Glide(mainSlider, {
    type: "carousel",
    startAt: 0,
    perView: 1,
    gap: 0,
    keyboard: true,
    animationDuration: 400,
    animationTimingFunc: "cubic-bezier(0.4, 0, 0.2, 1)",
  })

  glideMain.mount()

  // Sync with thumbnails
  const thumbnailSlider = document.getElementById("thumbnailSlider")
  if (thumbnailSlider) {
    const glideThumbs = new Glide(thumbnailSlider, {
      type: "carousel",
      startAt: 0,
      perView: 4,
      gap: 10,
      keyboard: false,
      animationDuration: 400,
      breakpoints: {
        768: { perView: 3 },
        480: { perView: 2 },
      },
    })

    glideThumbs.mount()

    // Sync sliders
    glideMain.on("move", () => {
      glideThumbs.go("=" + glideMain.index)
      updateActiveThumbnail(glideMain.index)
    })
  }
}

// Thumbnail functionality
function initializeThumbnails() {
  const thumbnails = document.querySelectorAll(".thumbnail")
  const mainImage = document.querySelector(".main-product-image")

  thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", function () {
      const imageUrl = this.dataset.image
      if (imageUrl && mainImage) {
        mainImage.src = imageUrl
        updateActiveThumbnail(index)

        // Update main slider if exists
        const mainSlider = document.getElementById("productImageSlider")
        if (mainSlider && window.glideMain) {
          window.glideMain.go("=" + index)
        }
      }
    })
  })
}

function updateActiveThumbnail(activeIndex) {
  const thumbnails = document.querySelectorAll(".thumbnail")
  thumbnails.forEach((thumb, index) => {
    thumb.classList.toggle("active", index === activeIndex)
  })
}

// Image Zoom functionality
function initializeImageZoom() {
  const mainImages = document.querySelectorAll(".main-product-image")
  const zoomOverlay = document.getElementById("imageZoomOverlay")
  const zoomedImage = document.getElementById("zoomedImage")
  const zoomClose = document.getElementById("zoomClose")

  mainImages.forEach((image) => {
    image.addEventListener("click", function () {
      if (zoomOverlay && zoomedImage) {
        zoomedImage.src = this.src
        zoomOverlay.classList.add("active")
        document.body.style.overflow = "hidden"
      }
    })
  })

  if (zoomClose) {
    zoomClose.addEventListener("click", closeImageZoom)
  }

  if (zoomOverlay) {
    zoomOverlay.addEventListener("click", function (e) {
      if (e.target === this) {
        closeImageZoom()
      }
    })
  }

  // Close on escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && zoomOverlay && zoomOverlay.classList.contains("active")) {
      closeImageZoom()
    }
  })
}

function closeImageZoom() {
  const zoomOverlay = document.getElementById("imageZoomOverlay")
  if (zoomOverlay) {
    zoomOverlay.classList.remove("active")
    document.body.style.overflow = ""
  }
}

// Quantity Selector
function initializeQuantitySelector() {
  const qtyMinus = document.getElementById("qtyMinus")
  const qtyPlus = document.getElementById("qtyPlus")
  const qtyInput = document.getElementById("quantity")

  if (qtyMinus && qtyInput) {
    qtyMinus.addEventListener("click", () => {
      const currentValue = Number.parseInt(qtyInput.value) || 1
      const minValue = Number.parseInt(qtyInput.min) || 1
      if (currentValue > minValue) {
        qtyInput.value = currentValue - 1
        qtyInput.dispatchEvent(new Event("change"))
      }
    })
  }

  if (qtyPlus && qtyInput) {
    qtyPlus.addEventListener("click", () => {
      const currentValue = Number.parseInt(qtyInput.value) || 1
      const maxValue = Number.parseInt(qtyInput.max) || 999
      if (currentValue < maxValue) {
        qtyInput.value = currentValue + 1
        qtyInput.dispatchEvent(new Event("change"))
      }
    })
  }

  // Validate input
  if (qtyInput) {
    qtyInput.addEventListener("change", function () {
      const value = Number.parseInt(this.value)
      const min = Number.parseInt(this.min) || 1
      const max = Number.parseInt(this.max) || 999

      if (isNaN(value) || value < min) {
        this.value = min
      } else if (value > max) {
        this.value = max
      }
    })
  }
}

// Product Options (Color, Size)
function initializeProductOptions() {
  // Color options
  const colorOptions = document.querySelectorAll(".color-option")
  colorOptions.forEach((option) => {
    option.addEventListener("click", function () {
      colorOptions.forEach((opt) => opt.classList.remove("active"))
      this.classList.add("active")

      // Add selection animation
      this.classList.add("animate__animated", "animate__pulse")
      setTimeout(() => {
        this.classList.remove("animate__animated", "animate__pulse")
      }, 600)
    })
  })

  // Size options
  const sizeOptions = document.querySelectorAll(".size-option")
  sizeOptions.forEach((option) => {
    option.addEventListener("click", function () {
      sizeOptions.forEach((opt) => opt.classList.remove("active"))
      this.classList.add("active")

      // Add selection animation
      this.classList.add("animate__animated", "animate__pulse")
      setTimeout(() => {
        this.classList.remove("animate__animated", "animate__pulse")
      }, 600)
    })
  })
}

// Product Tabs
function initializeProductTabs() {
  const tabBtns = document.querySelectorAll(".tab-btn")
  const tabPanes = document.querySelectorAll(".tab-pane")

  tabBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const targetTab = this.dataset.tab

      // Remove active class from all tabs and panes
      tabBtns.forEach((b) => b.classList.remove("active"))
      tabPanes.forEach((p) => p.classList.remove("active"))

      // Add active class to clicked tab and corresponding pane
      this.classList.add("active")
      const targetPane = document.getElementById(targetTab)
      if (targetPane) {
        targetPane.classList.add("active")
      }

      // Add animation to tab content
      if (targetPane) {
        targetPane.style.opacity = "0"
        targetPane.style.transform = "translateY(20px)"

        setTimeout(() => {
          targetPane.style.opacity = "1"
          targetPane.style.transform = "translateY(0)"
        }, 50)
      }
    })
  })
}

// Product Actions
function initializeProductActions() {
  // Add to Cart
  const addToCartBtn = document.querySelector(".add-to-cart-btn")
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function () {
      const productId = this.dataset.productId
      const quantity = document.getElementById("quantity")?.value || 1

      // Show loading state
      this.classList.add("loading")
      this.disabled = true

      // Simulate API call
      setTimeout(() => {
        this.classList.remove("loading")
        this.disabled = false

        showNotification("Product added to cart successfully!", "success")
        updateCartCounter()

        // Add success animation
        this.classList.add("animate__animated", "animate__pulse")
        setTimeout(() => {
          this.classList.remove("animate__animated", "animate__pulse")
        }, 1000)
      }, 1500)
    })
  }

  // Buy Now
  const buyNowBtn = document.querySelector(".buy-now-btn")
  if (buyNowBtn) {
    buyNowBtn.addEventListener("click", function () {
      const productId = this.dataset.productId
      const quantity = document.getElementById("quantity")?.value || 1

      showNotification("Redirecting to checkout...", "info")

      // Simulate redirect
      setTimeout(() => {
        window.location.href = "/checkout"
      }, 1000)
    })
  }

  // Wishlist
  const wishlistBtn = document.querySelector(".wishlist-btn")
  if (wishlistBtn) {
    wishlistBtn.addEventListener("click", function () {
      const productId = this.dataset.productId
      const icon = this.querySelector("i")

      if (icon.classList.contains("far")) {
        icon.classList.remove("far")
        icon.classList.add("fas")
        this.classList.add("animate__animated", "animate__heartBeat")
        showNotification("Added to wishlist!", "success")
      } else {
        icon.classList.remove("fas")
        icon.classList.add("far")
        showNotification("Removed from wishlist!", "info")
      }

      setTimeout(() => {
        this.classList.remove("animate__animated", "animate__heartBeat")
      }, 1000)
    })
  }

  // Compare
  const compareBtn = document.querySelector(".compare-btn")
  if (compareBtn) {
    compareBtn.addEventListener("click", function () {
      const productId = this.dataset.productId
      showNotification("Product added to compare list!", "success")

      this.classList.add("animate__animated", "animate__bounce")
      setTimeout(() => {
        this.classList.remove("animate__animated", "animate__bounce")
      }, 1000)
    })
  }

  // Share
  const shareBtn = document.querySelector(".share-btn")
  if (shareBtn) {
    shareBtn.addEventListener("click", () => {
      const shareModal = document.getElementById("shareModal")
      if (shareModal) {
        shareModal.classList.add("active")
        document.body.style.overflow = "hidden"
      }
    })
  }
}

// Share Modal
function initializeShareModal() {
  const shareModal = document.getElementById("shareModal")
  const modalClose = shareModal?.querySelector(".modal-close")
  const copyLinkBtn = shareModal?.querySelector(".copy-link")
  const shareUrl = shareModal?.querySelector(".share-url")

  // Close modal
  if (modalClose) {
    modalClose.addEventListener("click", closeShareModal)
  }

  if (shareModal) {
    shareModal.addEventListener("click", function (e) {
      if (e.target === this) {
        closeShareModal()
      }
    })
  }

  // Copy link
  if (copyLinkBtn && shareUrl) {
    copyLinkBtn.addEventListener("click", function () {
      shareUrl.select()
      shareUrl.setSelectionRange(0, 99999)
      document.execCommand("copy")

      this.innerHTML = '<i class="fas fa-check"></i> Copied!'
      this.style.background = "var(--success-color)"

      setTimeout(() => {
        this.innerHTML = '<i class="fas fa-copy"></i> Copy'
        this.style.background = ""
      }, 2000)

      showNotification("Link copied to clipboard!", "success")
    })
  }

  // Social share buttons
  const shareButtons = shareModal?.querySelectorAll(".share-btn[data-share]")
  shareButtons?.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const platform = this.dataset.share
      const url = encodeURIComponent(window.location.href)
      const title = encodeURIComponent(document.title)

      let shareUrl = ""

      switch (platform) {
        case "facebook":
          shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`
          break
        case "twitter":
          shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`
          break
        case "pinterest":
          const image = encodeURIComponent(document.querySelector(".main-product-image")?.src || "")
          shareUrl = `https://pinterest.com/pin/create/button/?url=${url}&media=${image}&description=${title}`
          break
        case "whatsapp":
          shareUrl = `https://wa.me/?text=${title} ${url}`
          break
      }

      if (shareUrl) {
        window.open(shareUrl, "_blank", "width=600,height=400")
      }
    })
  })

  // Close on escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && shareModal?.classList.contains("active")) {
      closeShareModal()
    }
  })
}

function closeShareModal() {
  const shareModal = document.getElementById("shareModal")
  if (shareModal) {
    shareModal.classList.remove("active")
    document.body.style.overflow = ""
  }
}

// Utility Functions
function updateCartCounter() {
  const counter = document.getElementById("cartCount")
  if (counter) {
    const currentCount = Number.parseInt(counter.textContent) || 0
    counter.textContent = currentCount + 1
    counter.style.display = "block"
    counter.classList.add("animate__animated", "animate__bounceIn")

    setTimeout(() => {
      counter.classList.remove("animate__animated", "animate__bounceIn")
    }, 1000)
  }
}

function showNotification(message, type = "info") {
  // Create notification element
  const notification = document.createElement("div")
  notification.className = `notification notification-${type} animate__animated animate__slideInRight`

  const icons = {
    success: "fa-check-circle",
    error: "fa-exclamation-circle",
    warning: "fa-exclamation-triangle",
    info: "fa-info-circle",
  }

  const colors = {
    success: "#43e97b",
    error: "#ff6b6b",
    warning: "#feca57",
    info: "#667eea",
  }

  notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${icons[type]}"></i>
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `

  // Add styles
  notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${colors[type]};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        max-width: 350px;
        font-weight: 500;
        font-family: 'Inter', sans-serif;
    `

  const content = notification.querySelector(".notification-content")
  content.style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.75rem;
    `

  const closeBtn = notification.querySelector(".notification-close")
  closeBtn.style.cssText = `
        background: none;
        border: none;
        color: white;
        font-size: 1.25rem;
        cursor: pointer;
        margin-left: auto;
        opacity: 0.8;
        transition: opacity 0.2s;
    `

  closeBtn.addEventListener("mouseenter", () => (closeBtn.style.opacity = "1"))
  closeBtn.addEventListener("mouseleave", () => (closeBtn.style.opacity = "0.8"))

  document.body.appendChild(notification)

  // Auto remove
  const autoRemove = setTimeout(() => {
    removeNotification(notification)
  }, 5000)

  // Manual close
  closeBtn.addEventListener("click", () => {
    clearTimeout(autoRemove)
    removeNotification(notification)
  })
}

function removeNotification(notification) {
  notification.classList.remove("animate__slideInRight")
  notification.classList.add("animate__slideOutRight")

  setTimeout(() => {
    if (notification.parentNode) {
      notification.parentNode.removeChild(notification)
    }
  }, 500)
}

// Write Review Modal (placeholder)
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("write-review-btn")) {
    e.preventDefault()
    showNotification("Review feature coming soon!", "info")
  }
})

// Related Products Add to Cart
document.addEventListener("click", (e) => {
  if (e.target.closest(".related-products .add-to-cart-btn")) {
    e.preventDefault()
    const btn = e.target.closest(".add-to-cart-btn")

    btn.classList.add("animate__animated", "animate__pulse")
    showNotification("Product added to cart!", "success")
    updateCartCounter()

    setTimeout(() => {
      btn.classList.remove("animate__animated", "animate__pulse")
    }, 1000)
  }
})

// Scroll to top functionality
window.addEventListener("scroll", () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop

  // Show/hide scroll to top button
  let scrollTopBtn = document.getElementById("scrollTopBtn")
  if (!scrollTopBtn) {
    scrollTopBtn = document.createElement("button")
    scrollTopBtn.id = "scrollTopBtn"
    scrollTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>'
    scrollTopBtn.style.cssText = `
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            z-index: 1000;
        `

    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      })
    })

    scrollTopBtn.addEventListener("mouseenter", function () {
      this.style.transform = "scale(1.1)"
      this.style.background = "var(--accent-color)"
    })

    scrollTopBtn.addEventListener("mouseleave", function () {
      this.style.transform = "scale(1)"
      this.style.background = "var(--primary-color)"
    })

    document.body.appendChild(scrollTopBtn)
  }

  if (scrollTop > 300) {
    scrollTopBtn.style.display = "flex"
    scrollTopBtn.classList.add("animate__animated", "animate__fadeInUp")
  } else {
    scrollTopBtn.style.display = "none"
    scrollTopBtn.classList.remove("animate__animated", "animate__fadeInUp")
  }
})
