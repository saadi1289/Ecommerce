document.addEventListener("DOMContentLoaded", () => {
  initializeAuthForms()
  initializePasswordStrength()
  initializeFormValidation()
  initializeAnimations()
})

// Initialize auth form functionality
function initializeAuthForms() {
  const forms = document.querySelectorAll(".login-form, .register-form")

  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const submitBtn = form.querySelector(".btn-primary")
      if (submitBtn) {
        submitBtn.classList.add("loading")
        submitBtn.disabled = true

        // Re-enable button after 3 seconds if form doesn't submit
        setTimeout(() => {
          submitBtn.classList.remove("loading")
          submitBtn.disabled = false
        }, 3000)
      }
    })
  })

  // Initialize input animations
  initializeInputAnimations()

  // Initialize social login
  initializeSocialLogin()
}

// Input animations and interactions
function initializeInputAnimations() {
  const inputs = document.querySelectorAll(".form-input")

  inputs.forEach((input) => {
    // Handle focus and blur events
    input.addEventListener("focus", function () {
      this.parentElement.classList.add("focused")
    })

    input.addEventListener("blur", function () {
      this.parentElement.classList.remove("focused")
      if (this.value.trim() !== "") {
        this.parentElement.classList.add("filled")
      } else {
        this.parentElement.classList.remove("filled")
      }
    })

    // Check if input has value on load
    if (input.value.trim() !== "") {
      input.parentElement.classList.add("filled")
    }

    // Add input validation
    input.addEventListener("input", function () {
      validateInput(this)
    })
  })
}

// Password visibility toggle
function togglePassword(inputId) {
  const input = document.getElementById(inputId)
  const toggle = input.parentElement.querySelector(".password-toggle i")

  if (input.type === "password") {
    input.type = "text"
    toggle.className = "fas fa-eye-slash"
  } else {
    input.type = "password"
    toggle.className = "fas fa-eye"
  }
}

// Password strength indicator
function initializePasswordStrength() {
  const passwordInput = document.getElementById("password")
  if (!passwordInput) return

  const strengthBar = document.querySelector(".strength-fill")
  const strengthText = document.querySelector(".strength-text")

  if (!strengthBar || !strengthText) return

  passwordInput.addEventListener("input", function () {
    const password = this.value
    const strength = calculatePasswordStrength(password)

    updatePasswordStrength(strengthBar, strengthText, strength)
  })
}

function calculatePasswordStrength(password) {
  let score = 0
  const feedback = []

  if (password.length === 0) {
    return { score: 0, feedback: ["Enter a password"], color: "#e2e8f0" }
  }

  // Length check
  if (password.length >= 8) {
    score += 25
  } else {
    feedback.push("At least 8 characters")
  }

  // Lowercase check
  if (/[a-z]/.test(password)) {
    score += 25
  } else {
    feedback.push("Add lowercase letters")
  }

  // Uppercase check
  if (/[A-Z]/.test(password)) {
    score += 25
  } else {
    feedback.push("Add uppercase letters")
  }

  // Number or special character check
  if (/[\d\W]/.test(password)) {
    score += 25
  } else {
    feedback.push("Add numbers or symbols")
  }

  // Determine strength level and color
  let level, color
  if (score < 50) {
    level = "Weak"
    color = "#e53e3e"
  } else if (score < 75) {
    level = "Fair"
    color = "#dd6b20"
  } else if (score < 100) {
    level = "Good"
    color = "#38a169"
  } else {
    level = "Strong"
    color = "#38a169"
  }

  return { score, level, color, feedback }
}

function updatePasswordStrength(strengthBar, strengthText, strength) {
  strengthBar.style.width = strength.score + "%"
  strengthBar.style.background = strength.color
  strengthText.textContent = strength.level ? `Password strength: ${strength.level}` : "Password strength"
  strengthText.style.color = strength.color
}

// Form validation
function initializeFormValidation() {
  const inputs = document.querySelectorAll(".form-input")

  inputs.forEach((input) => {
    input.addEventListener("blur", function () {
      validateInput(this)
    })
  })
}

function validateInput(input) {
  const value = input.value.trim()
  const type = input.type
  const name = input.name
  let isValid = true
  let errorMessage = ""

  // Remove existing error state
  input.classList.remove("error")
  const existingError = input.parentElement.parentElement.querySelector(".error-message")
  if (existingError) {
    existingError.remove()
  }

  // Required field validation
  if (input.hasAttribute("required") && value === "") {
    isValid = false
    errorMessage = "This field is required"
  }

  // Email validation
  else if (type === "email" && value !== "") {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailRegex.test(value)) {
      isValid = false
      errorMessage = "Please enter a valid email address"
    }
  }

  // Password validation
  else if (name === "password" && value !== "") {
    if (value.length < 8) {
      isValid = false
      errorMessage = "Password must be at least 8 characters long"
    }
  }

  // Password confirmation validation
  else if (name === "password_confirmation" && value !== "") {
    const passwordInput = document.getElementById("password")
    if (passwordInput && value !== passwordInput.value) {
      isValid = false
      errorMessage = "Passwords do not match"
    }
  }

  // Phone validation (if provided)
  else if (type === "tel" && value !== "") {
    const phoneRegex = /^[+]?[1-9][\d]{0,15}$/
    if (!phoneRegex.test(value.replace(/[\s\-$$$$]/g, ""))) {
      isValid = false
      errorMessage = "Please enter a valid phone number"
    }
  }

  if (!isValid) {
    input.classList.add("error")
    showInputError(input, errorMessage)
  }

  return isValid
}

function showInputError(input, message) {
  const formGroup = input.parentElement.parentElement
  const errorElement = document.createElement("span")
  errorElement.className = "error-message"
  errorElement.textContent = message
  formGroup.appendChild(errorElement)
}

// Social login functionality
function initializeSocialLogin() {
  const socialBtns = document.querySelectorAll(".social-btn")

  socialBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const provider = this.classList.contains("google-btn") ? "google" : "facebook"
      handleSocialLogin(provider)
    })
  })
}

function handleSocialLogin(provider) {
  // Add loading state
  const btn = document.querySelector(`.${provider}-btn`)
  const originalText = btn.innerHTML
  btn.innerHTML = '<div class="spinner"></div> Connecting...'
  btn.disabled = true

  // Simulate social login process
  setTimeout(() => {
    btn.innerHTML = originalText
    btn.disabled = false
    showNotification(`${provider.charAt(0).toUpperCase() + provider.slice(1)} login coming soon!`, "info")
  }, 2000)
}

// Initialize page animations
function initializeAnimations() {
  // Animate form elements on load
  const formElements = document.querySelectorAll(".form-group")
  formElements.forEach((element, index) => {
    element.style.animationDelay = `${index * 0.1}s`
    element.classList.add("fade-in-up")
  })

  // Add hover effects to interactive elements
  addHoverEffects()

  // Initialize scroll animations if needed
  initializeScrollAnimations()
}

function addHoverEffects() {
  const interactiveElements = document.querySelectorAll(".social-btn, .switch-link, .terms-link")

  interactiveElements.forEach((element) => {
    element.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-2px)"
    })

    element.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
    })
  })
}

function initializeScrollAnimations() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-in")
      }
    })
  }, observerOptions)

  const animatedElements = document.querySelectorAll(".auth-form, .brand-content")
  animatedElements.forEach((el) => observer.observe(el))
}

// Utility functions
function showNotification(message, type = "info") {
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
  }, 4000)

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
    success: "#38a169",
    error: "#e53e3e",
    warning: "#dd6b20",
    info: "#667eea",
  }
  return colors[type] || "#667eea"
}

// Form submission handling
function handleFormSubmission(form) {
  const inputs = form.querySelectorAll(".form-input[required]")
  let isValid = true

  inputs.forEach((input) => {
    if (!validateInput(input)) {
      isValid = false
    }
  })

  // Check password confirmation if it exists
  const passwordConfirmation = form.querySelector('input[name="password_confirmation"]')
  if (passwordConfirmation) {
    if (!validateInput(passwordConfirmation)) {
      isValid = false
    }
  }

  // Check terms agreement for register form
  const termsCheckbox = form.querySelector('input[name="terms"]')
  if (termsCheckbox && !termsCheckbox.checked) {
    isValid = false
    showNotification("Please agree to the Terms of Service and Privacy Policy", "error")
  }

  return isValid
}

// Keyboard navigation support
document.addEventListener("keydown", (e) => {
  // Enter key on social buttons
  if (e.key === "Enter" && e.target.classList.contains("social-btn")) {
    e.target.click()
  }

  // Escape key to close notifications
  if (e.key === "Escape") {
    const notifications = document.querySelectorAll(".notification")
    notifications.forEach((notification) => {
      notification.querySelector(".notification-close").click()
    })
  }
})

// Export functions for global use
window.AuthManager = {
  togglePassword,
  validateInput,
  showNotification,
  handleSocialLogin,
}
