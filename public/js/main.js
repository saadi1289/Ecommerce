// ===== MAIN JAVASCRIPT FILE =====

document.addEventListener("DOMContentLoaded", () => {
  // Initialize all components
  initializeAOS()
  initializeSidebar()
  initializeHeroSlider()
  initializeCounters()
  initializeProductInteractions()
  initializeFormHandlers()
  initializeTooltips()
  initializeFilterTabs()
  initializeToggleSwitches()
  initializeNotifications()
})

// ===== AOS ANIMATION INITIALIZATION =====
function initializeAOS() {
  const AOS = window.AOS // Declare the AOS variable
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 800,
      easing: "ease-out-cubic",
      once: true,
      offset: 100,
      delay: 0,
    })
  }
}

// ===== SIDEBAR FUNCTIONALITY =====
function initializeSidebar() {
  const sidebar = document.getElementById("sidebar")
  const sidebarToggle = document.getElementById("sidebarToggle")
  const sidebarToggleBtn = document.getElementById("sidebarToggleBtn")
  const overlay = document.getElementById("overlay")
  const mainContent = document.querySelector(".main-content")

  function toggleSidebar() {
    if (window.innerWidth <= 768) {
      sidebar.classList.toggle("open")
      overlay.classList.toggle("show")
      document.body.style.overflow = sidebar.classList.contains("open") ? "hidden" : ""
    } else {
      sidebar.classList.toggle("collapsed")
      if (mainContent) {
        mainContent.style.marginLeft = sidebar.classList.contains("collapsed") ? "0" : "280px"
      }
    }
  }

  function closeSidebar() {
    sidebar.classList.remove("open")
    overlay.classList.remove("show")
    document.body.style.overflow = ""
  }

  // Event listeners
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", toggleSidebar)
  }

  if (sidebarToggleBtn) {
    sidebarToggleBtn.addEventListener("click", toggleSidebar)
  }

  if (overlay) {
    overlay.addEventListener("click", closeSidebar)
  }

  // Handle window resize
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      closeSidebar()
      if (mainContent) {
        mainContent.style.marginLeft = "280px"
      }
    }
  })
}

// ===== HERO SLIDER =====
function initializeHeroSlider() {
  const slides = document.querySelectorAll(".hero-slide")
  const indicators = document.querySelectorAll(".indicator")

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

  // Auto-play
  setInterval(nextSlide, 5000)

  // Manual controls
  indicators.forEach((indicator, index) => {
    indicator.addEventListener("click", () => {
      currentSlide = index
      showSlide(currentSlide)
    })
  })
}

// ===== ANIMATED COUNTERS =====
function initializeCounters() {
  const counters = document.querySelectorAll("[data-count]")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const counter = entry.target
          const target = Number.parseFloat(counter.dataset.count)
          const duration = 2000
          const increment = target / (duration / 16)
          let current = 0

          const updateCounter = () => {
            current += increment
            if (current < target) {
              counter.textContent = Math.floor(current).toLocaleString()
              requestAnimationFrame(updateCounter)
            } else {
              counter.textContent = target % 1 === 0 ? target.toLocaleString() : target.toFixed(1)
            }
          }

          updateCounter()
          observer.unobserve(counter)
        }
      })
    },
    { threshold: 0.5 },
  )

  counters.forEach((counter) => {
    observer.observe(counter)
  })
}

// ===== PRODUCT INTERACTIONS =====
function initializeProductInteractions() {
  // Wishlist functionality
  const wishlistBtns = document.querySelectorAll('.action-btn[data-tooltip*="Wishlist"]')
  wishlistBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const icon = this.querySelector("i") || this

      // Toggle heart state
      if (icon.textContent === "♡") {
        icon.textContent = "❤️"
        showNotification("Added to wishlist!", "success")
      } else {
        icon.textContent = "♡"
        showNotification("Removed from wishlist!", "info")
      }

      // Add animation
      this.style.transform = "scale(1.2)"
      setTimeout(() => {
        this.style.transform = ""
      }, 200)
    })
  })

  // Add to cart functionality
  const cartBtns = document.querySelectorAll('.action-btn[data-tooltip*="Cart"]')
  cartBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()

      // Add loading state
      this.classList.add("loading")

      setTimeout(() => {
        this.classList.remove("loading")
        showNotification("Added to cart!", "success")
        updateCartCounter()
      }, 1000)
    })
  })

  // Quick view functionality
  const quickViewBtns = document.querySelectorAll('.action-btn[data-tooltip*="Quick View"]')
  quickViewBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault()
      showNotification("Quick view feature coming soon!", "info")
    })
  })
}

// ===== FORM HANDLERS =====
function initializeFormHandlers() {
  // Newsletter form
  const newsletterForm = document.querySelector(".newsletter-form")
  if (newsletterForm) {
    newsletterForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const email = this.querySelector('input[type="email"]').value
      const btn = this.querySelector('button[type="submit"]')
      const originalText = btn.textContent

      // Show loading state
      btn.textContent = "Subscribing..."
      btn.disabled = true

      setTimeout(() => {
        btn.textContent = "Subscribed!"
        btn.style.background = "var(--success)"
        showNotification("Successfully subscribed to newsletter!", "success")

        // Reset form
        setTimeout(() => {
          this.reset()
          btn.textContent = originalText
          btn.disabled = false
          btn.style.background = ""
        }, 2000)
      }, 1500)
    })
  }

  // Profile form
  const profileForm = document.querySelector(".profile-form")
  if (profileForm) {
    profileForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const submitBtn = this.querySelector('button[type="submit"]')
      const originalText = submitBtn.textContent

      submitBtn.textContent = "Saving..."
      submitBtn.disabled = true

      setTimeout(() => {
        submitBtn.textContent = "Saved!"
        submitBtn.style.background = "var(--success)"
        showNotification("Profile updated successfully!", "success")

        setTimeout(() => {
          submitBtn.textContent = originalText
          submitBtn.disabled = false
          submitBtn.style.background = ""
        }, 2000)
      }, 1500)
    })
  }
}

// ===== TOOLTIPS =====
function initializeTooltips() {
  const tooltipElements = document.querySelectorAll("[data-tooltip]")

  tooltipElements.forEach((element) => {
    element.addEventListener("mouseenter", function () {
      const tooltip = document.createElement("div")
      tooltip.className = "tooltip-popup"
      tooltip.textContent = this.getAttribute("data-tooltip")
      document.body.appendChild(tooltip)

      const rect = this.getBoundingClientRect()
      tooltip.style.cssText = `
                position: absolute;
                top: ${rect.top - tooltip.offsetHeight - 8}px;
                left: ${rect.left + rect.width / 2 - tooltip.offsetWidth / 2}px;
                background: var(--gray-900);
                color: var(--white);
                padding: var(--space-2) var(--space-3);
                border-radius: var(--radius);
                font-size: var(--font-size-xs);
                white-space: nowrap;
                z-index: 1000;
                opacity: 0;
                transition: opacity 0.2s;
            `

      setTimeout(() => (tooltip.style.opacity = "1"), 10)
    })

    element.addEventListener("mouseleave", () => {
      const tooltip = document.querySelector(".tooltip-popup")
      if (tooltip) {
        tooltip.style.opacity = "0"
        setTimeout(() => tooltip.remove(), 200)
      }
    })
  })
}

// ===== FILTER TABS =====
function initializeFilterTabs() {
  const filterTabs = document.querySelectorAll(".filter-tab")
  const orderCards = document.querySelectorAll(".order-card")

  filterTabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const filter = this.dataset.filter

      // Update active tab
      filterTabs.forEach((t) => t.classList.remove("active"))
      this.classList.add("active")

      // Filter orders
      orderCards.forEach((card) => {
        if (filter === "all" || card.dataset.status === filter) {
          card.style.display = "block"
          card.style.animation = "fadeIn 0.3s ease"
        } else {
          card.style.display = "none"
        }
      })
    })
  })
}

// ===== TOGGLE SWITCHES =====
function initializeToggleSwitches() {
  const toggles = document.querySelectorAll(".toggle-input")

  toggles.forEach((toggle) => {
    toggle.addEventListener("change", function () {
      const label = this.nextElementSibling
      const isChecked = this.checked

      // Add animation
      label.style.transform = "scale(0.95)"
      setTimeout(() => {
        label.style.transform = ""
      }, 150)

      // Show notification
      const setting = this.id.replace(/([A-Z])/g, " $1").toLowerCase()
      showNotification(`${setting} ${isChecked ? "enabled" : "disabled"}`, isChecked ? "success" : "info")
    })
  })
}

// ===== NOTIFICATIONS =====
function initializeNotifications() {
  // Create notification container if it doesn't exist
  if (!document.querySelector(".notification-container")) {
    const container = document.createElement("div")
    container.className = "notification-container"
    container.style.cssText = `
            position: fixed;
            top: var(--space-4);
            right: var(--space-4);
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: var(--space-2);
        `
    document.body.appendChild(container)
  }
}

function showNotification(message, type = "info") {
  const container = document.querySelector(".notification-container")
  if (!container) return

  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`

  const colors = {
    success: "var(--success)",
    error: "var(--error)",
    warning: "var(--warning)",
    info: "var(--primary)",
  }

  const icons = {
    success: "✓",
    error: "✕",
    warning: "⚠",
    info: "ℹ",
  }

  notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-icon">${icons[type]}</span>
            <span class="notification-message">${message}</span>
            <button class="notification-close">✕</button>
        </div>
    `

  notification.style.cssText = `
        background: ${colors[type]};
        color: var(--white);
        padding: var(--space-4);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        transform: translateX(100%);
        transition: var(--transition);
        max-width: 350px;
        font-weight: 500;
    `

  const content = notification.querySelector(".notification-content")
  content.style.cssText = `
        display: flex;
        align-items: center;
        gap: var(--space-3);
    `

  const closeBtn = notification.querySelector(".notification-close")
  closeBtn.style.cssText = `
        background: none;
        border: none;
        color: var(--white);
        cursor: pointer;
        font-size: var(--font-size-lg);
        opacity: 0.8;
        margin-left: auto;
    `

  container.appendChild(notification)

  // Show notification
  setTimeout(() => {
    notification.style.transform = "translateX(0)"
  }, 100)

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
  notification.style.transform = "translateX(100%)"
  notification.style.opacity = "0"

  setTimeout(() => {
    if (notification.parentNode) {
      notification.parentNode.removeChild(notification)
    }
  }, 300)
}

// ===== UTILITY FUNCTIONS =====
function updateCartCounter() {
  const counter = document.querySelector(".badge")
  if (counter) {
    const currentCount = Number.parseInt(counter.textContent) || 0
    counter.textContent = currentCount + 1

    // Add bounce animation
    counter.style.animation = "bounce 0.5s ease"
    setTimeout(() => {
      counter.style.animation = ""
    }, 500)
  }
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

function throttle(func, limit) {
  let inThrottle
  return function () {
    const args = arguments
    
    if (!inThrottle) {
      func.apply(this, args)
      inThrottle = true
      setTimeout(() => (inThrottle = false), limit)
    }
  }
}

// ===== SMOOTH SCROLLING =====
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// ===== LAZY LOADING =====
if ("IntersectionObserver" in window) {
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target
        img.src = img.dataset.src || img.src
        img.classList.remove("lazy")
        imageObserver.unobserve(img)
      }
    })
  })

  document.querySelectorAll("img[data-src]").forEach((img) => {
    imageObserver.observe(img)
  })
}

// ===== PERFORMANCE OPTIMIZATIONS =====
// Optimize scroll events
const optimizedScroll = throttle(() => {
  // Add scroll-based animations here
  const scrolled = window.pageYOffset
  const parallaxElements = document.querySelectorAll(".parallax")

  parallaxElements.forEach((element) => {
    const speed = element.dataset.speed || 0.5
    element.style.transform = `translateY(${scrolled * speed}px)`
  })
}, 16)

window.addEventListener("scroll", optimizedScroll)

// ===== ERROR HANDLING =====
window.addEventListener("error", (e) => {
  console.error("JavaScript Error:", e.error)
  // You can add error reporting here
})

// ===== ACCESSIBILITY IMPROVEMENTS =====
// Focus management
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    // Close any open modals, dropdowns, etc.
    const overlay = document.getElementById("overlay")
    if (overlay && overlay.classList.contains("show")) {
      overlay.click()
    }
  }
})

// Skip to main content
const skipLink = document.createElement("a")
skipLink.href = "#main-content"
skipLink.textContent = "Skip to main content"
skipLink.className = "sr-only"
skipLink.style.cssText = `
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary);
    color: var(--white);
    padding: 8px;
    text-decoration: none;
    border-radius: 4px;
    z-index: 10000;
`

skipLink.addEventListener("focus", function () {
  this.style.top = "6px"
})

skipLink.addEventListener("blur", function () {
  this.style.top = "-40px"
})

document.body.insertBefore(skipLink, document.body.firstChild)

// ===== EXPORT FOR GLOBAL USE =====
window.ShopPro = {
  showNotification,
  updateCartCounter,
  debounce,
  throttle,
}
