document.addEventListener("DOMContentLoaded", () => {
  // Initialize all welcome page functionality
  initializeHeroSlider()
  initializeScrollAnimations()
  initializeCounters()
  initializeProductHovers()
  initializeNewsletterForm()
  initializeSmoothScrolling()
})

// Hero Slider
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
      if (i === index) {
        const bg = slide.dataset.bg
        if (bg) {
          slide.style.setProperty("--bg", bg)
        }
      }
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
  setInterval(nextSlide, 6000)

  // Initialize first slide
  showSlide(0)
}

// Scroll Animations
function initializeScrollAnimations() {
  const animatedElements = document.querySelectorAll(".animate-on-scroll")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const element = entry.target
          const animation = element.dataset.animation || "fadeInUp"
          const delay = element.dataset.delay || 0

          setTimeout(() => {
            element.classList.add("animated")
            element.style.animationName = animation
          }, delay)

          observer.unobserve(element)
        }
      })
    },
    {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px",
    },
  )

  animatedElements.forEach((element) => {
    observer.observe(element)
  })
}

// Animated Counters
function initializeCounters() {
  const counters = document.querySelectorAll(".stat-number[data-count]")

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

// Product Hover Effects
function initializeProductHovers() {
  const productCards = document.querySelectorAll(".product-card")

  productCards.forEach((card) => {
    const actionBtns = card.querySelectorAll(".action-btn")

    card.addEventListener("mouseenter", () => {
      actionBtns.forEach((btn, index) => {
        setTimeout(() => {
          btn.classList.add("animate__animated", "animate__fadeInUp")
        }, index * 100)
      })
    })

    card.addEventListener("mouseleave", () => {
      actionBtns.forEach((btn) => {
        btn.classList.remove("animate__animated", "animate__fadeInUp")
      })
    })
  })

  // Wishlist functionality
  const wishlistBtns = document.querySelectorAll(".wishlist-btn")
  wishlistBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      const icon = this.querySelector("i")

      // Toggle heart icon
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

      // Remove animation class after animation completes
      setTimeout(() => {
        this.classList.remove("animate__animated", "animate__heartBeat")
      }, 1000)
    })
  })

  // Quick view functionality
  const quickViewBtns = document.querySelectorAll(".quick-view-btn")
  quickViewBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      showQuickView(productId)
    })
  })

  // Add to cart functionality
  const addToCartBtns = document.querySelectorAll(".add-to-cart-btn")
  addToCartBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const productId = this.dataset.productId
      addToCart(productId)
    })
  })
}

// Newsletter Form
function initializeNewsletterForm() {
  const form = document.querySelector(".newsletter-form")
  if (!form) return

  form.addEventListener("submit", function (e) {
    e.preventDefault()

    const email = this.querySelector('input[name="email"]').value
    const btn = this.querySelector(".newsletter-btn")
    const originalText = btn.innerHTML

    // Show loading state
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...'
    btn.disabled = true

    // Simulate API call
    setTimeout(() => {
      btn.innerHTML = '<i class="fas fa-check"></i> Subscribed!'
      btn.style.background = "var(--success-color)"

      showNotification("Successfully subscribed to newsletter!", "success")

      // Reset form
      setTimeout(() => {
        this.reset()
        btn.innerHTML = originalText
        btn.disabled = false
        btn.style.background = ""
      }, 2000)
    }, 1500)
  })
}

// Smooth Scrolling
function initializeSmoothScrolling() {
  const links = document.querySelectorAll('a[href^="#"]')

  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()

      const targetId = this.getAttribute("href")
      const targetElement = document.querySelector(targetId)

      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })
}

// Utility Functions
function addToCart(productId) {
  showNotification("Product added to cart!", "success")

  // Add ripple effect to button
  const btn = document.querySelector(`[data-product-id="${productId}"].add-to-cart-btn`)
  if (btn) {
    btn.classList.add("animate__animated", "animate__pulse")
    setTimeout(() => {
      btn.classList.remove("animate__animated", "animate__pulse")
    }, 1000)
  }

  // Update cart counter (mock)
  updateCartCounter()
}

function showQuickView(productId) {
  showNotification("Quick view feature coming soon!", "info")
}

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

// Parallax effect for hero section
window.addEventListener("scroll", () => {
  const scrolled = window.pageYOffset
  const heroSection = document.querySelector(".hero-section")

  if (heroSection) {
    const rate = scrolled * -0.5
    heroSection.style.transform = `translateY(${rate}px)`
  }
})

// Loading animation for images
document.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll("img")

  images.forEach((img) => {
    if (img.complete) {
      img.classList.add("loaded")
    } else {
      img.addEventListener("load", () => {
        img.classList.add("loaded")
      })
    }
  })
})

// Add CSS for image loading
const style = document.createElement("style")
style.textContent = `
    img {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    img.loaded {
        opacity: 1;
    }
    
    .notification {
        font-family: 'Inter', sans-serif;
    }
`
document.head.appendChild(style)
