document.addEventListener("DOMContentLoaded", () => {
  // Tab functionality
  const tabBtns = document.querySelectorAll(".tab-btn")
  const tabContents = document.querySelectorAll(".tab-content")

  tabBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetTab = btn.getAttribute("data-tab")

      // Remove active class from all tabs and contents
      tabBtns.forEach((b) => b.classList.remove("active"))
      tabContents.forEach((c) => c.classList.remove("active"))

      // Add active class to clicked tab and corresponding content
      btn.classList.add("active")
      document.getElementById(targetTab).classList.add("active")
    })
  })

  // Modal functionality
  const editProfileBtn = document.getElementById("editProfileBtn")
  const editProfileModal = document.getElementById("editProfileModal")
  const closeModal = document.getElementById("closeModal")
  const cancelEdit = document.getElementById("cancelEdit")

  const changePasswordBtn = document.getElementById("changePasswordBtn")
  const changePasswordModal = document.getElementById("changePasswordModal")
  const closePasswordModalElement = document.getElementById("closePasswordModal")
  const cancelPasswordChange = document.getElementById("cancelPasswordChange")

  // Edit Profile Modal
  if (editProfileBtn) {
    editProfileBtn.addEventListener("click", () => {
      editProfileModal.classList.add("show")
      document.body.style.overflow = "hidden"
    })
  }

  function closeEditModal() {
    editProfileModal.classList.remove("show")
    document.body.style.overflow = ""
  }

  if (closeModal) closeModal.addEventListener("click", closeEditModal)
  if (cancelEdit) cancelEdit.addEventListener("click", closeEditModal)

  // Change Password Modal
  if (changePasswordBtn) {
    changePasswordBtn.addEventListener("click", () => {
      changePasswordModal.classList.add("show")
      document.body.style.overflow = "hidden"
    })
  }

  function closePasswordModal() {
    changePasswordModal.classList.remove("show")
    document.body.style.overflow = ""
  }

  if (closePasswordModalElement) closePasswordModalElement.addEventListener("click", closePasswordModal)
  if (cancelPasswordChange)
    cancelPasswordChange.addEventListener("click", closePasswordModal)

    // Close modals when clicking outside
  ;[editProfileModal, changePasswordModal].forEach((modal) => {
    if (modal) {
      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          modal.classList.remove("show")
          document.body.style.overflow = ""
        }
      })
    }
  })

  // Avatar upload functionality
  const profileAvatar = document.querySelector(".profile-avatar")
  const avatarInput = document.getElementById("avatarInput")
  const profileImage = document.getElementById("profileImage")

  if (profileAvatar && avatarInput) {
    profileAvatar.addEventListener("click", () => {
      avatarInput.click()
    })

    avatarInput.addEventListener("change", (e) => {
      const file = e.target.files[0]
      if (file) {
        const reader = new FileReader()
        reader.onload = (e) => {
          profileImage.src = e.target.result
          showNotification("Profile picture updated successfully!", "success")
        }
        reader.readAsDataURL(file)
      }
    })
  }

  // Password visibility toggle
  const passwordToggles = document.querySelectorAll(".password-toggle")
  passwordToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const input = toggle.previousElementSibling
      const icon = toggle.querySelector("i")

      if (input.type === "password") {
        input.type = "text"
        icon.classList.remove("fa-eye")
        icon.classList.add("fa-eye-slash")
      } else {
        input.type = "password"
        icon.classList.remove("fa-eye-slash")
        icon.classList.add("fa-eye")
      }
    })
  })

  // Password strength indicator
  const newPasswordInput = document.getElementById("newPassword")
  const strengthFill = document.querySelector(".strength-fill")
  const strengthText = document.querySelector(".strength-text")

  if (newPasswordInput && strengthFill) {
    newPasswordInput.addEventListener("input", (e) => {
      const password = e.target.value
      const strength = calculatePasswordStrength(password)

      strengthFill.style.width = `${strength.percentage}%`
      strengthFill.style.background = strength.color
      strengthText.textContent = strength.text
    })
  }

  function calculatePasswordStrength(password) {
    let score = 0
    const feedback = []

    if (password.length >= 8) score += 25
    else feedback.push("At least 8 characters")

    if (/[a-z]/.test(password)) score += 25
    else feedback.push("Lowercase letter")

    if (/[A-Z]/.test(password)) score += 25
    else feedback.push("Uppercase letter")

    if (/[0-9]/.test(password)) score += 25
    else feedback.push("Number")

    if (/[^A-Za-z0-9]/.test(password)) score += 25
    else feedback.push("Special character")

    let color, text
    if (score < 50) {
      color = "#ef4444"
      text = "Weak password"
    } else if (score < 75) {
      color = "#f59e0b"
      text = "Fair password"
    } else if (score < 100) {
      color = "#10b981"
      text = "Good password"
    } else {
      color = "#059669"
      text = "Strong password"
    }

    return {
      percentage: Math.min(score, 100),
      color: color,
      text: text,
    }
  }

  // Form submissions
  const editProfileForm = document.getElementById("editProfileForm")
  const changePasswordForm = document.getElementById("changePasswordForm")

  if (editProfileForm) {
    editProfileForm.addEventListener("submit", async (e) => {
      e.preventDefault()

      const submitBtn = editProfileForm.querySelector('button[type="submit"]')
      const btnText = submitBtn.querySelector(".btn-text")
      const btnLoader = submitBtn.querySelector(".btn-loader")

      // Show loading state
      btnText.style.display = "none"
      btnLoader.style.display = "inline-flex"
      submitBtn.disabled = true

      try {
        // Simulate API call
        await new Promise((resolve) => setTimeout(resolve, 2000))

        showNotification("Profile updated successfully!", "success")
        closeEditModal()

        // Update profile information on the page
        updateProfileInfo(new FormData(editProfileForm))
      } catch (error) {
        showNotification("Failed to update profile. Please try again.", "error")
      } finally {
        // Reset button state
        btnText.style.display = "inline"
        btnLoader.style.display = "none"
        submitBtn.disabled = false
      }
    })
  }

  if (changePasswordForm) {
    changePasswordForm.addEventListener("submit", async (e) => {
      e.preventDefault()

      const submitBtn = changePasswordForm.querySelector('button[type="submit"]')
      const btnText = submitBtn.querySelector(".btn-text")
      const btnLoader = submitBtn.querySelector(".btn-loader")

      // Validate passwords match
      const newPassword = document.getElementById("newPassword").value
      const confirmPassword = document.getElementById("confirmPassword").value

      if (newPassword !== confirmPassword) {
        showNotification("Passwords do not match!", "error")
        return
      }

      // Show loading state
      btnText.style.display = "none"
      btnLoader.style.display = "inline-flex"
      submitBtn.disabled = true

      try {
        // Simulate API call
        await new Promise((resolve) => setTimeout(resolve, 2000))

        showNotification("Password updated successfully!", "success")
        closePasswordModal()
        changePasswordForm.reset()
      } catch (error) {
        showNotification("Failed to update password. Please try again.", "error")
      } finally {
        // Reset button state
        btnText.style.display = "inline"
        btnLoader.style.display = "none"
        submitBtn.disabled = false
      }
    })
  }

  // Toggle switches
  const toggleSwitches = document.querySelectorAll(".toggle-switch input")
  toggleSwitches.forEach((toggle) => {
    toggle.addEventListener("change", (e) => {
      const setting = e.target.id
      const isEnabled = e.target.checked

      showNotification(
        `${setting.replace(/([A-Z])/g, " $1").toLowerCase()} ${isEnabled ? "enabled" : "disabled"}`,
        "info",
      )
    })
  })

  // Edit buttons functionality
  const editBtns = document.querySelectorAll(".edit-btn")
  editBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const section = btn.getAttribute("data-section")
      editProfileModal.classList.add("show")
      document.body.style.overflow = "hidden"

      // Focus on relevant field based on section
      if (section === "personal") {
        setTimeout(() => {
          document.getElementById("fullName").focus()
        }, 300)
      } else if (section === "professional") {
        setTimeout(() => {
          document.getElementById("department").focus()
        }, 300)
      }
    })
  })

  // Update profile info function
  function updateProfileInfo(formData) {
    const name = formData.get("name")
    const email = formData.get("email")
    const phone = formData.get("phone")
    const location = formData.get("location")
    const department = formData.get("department")
    const position = formData.get("position")

    // Update profile header
    document.querySelector(".profile-name").textContent = name
    document.querySelector(".profile-email").textContent = email

    // Update info cards
    const infoValues = document.querySelectorAll(".info-value")
    if (infoValues[0]) infoValues[0].textContent = name
    if (infoValues[1]) infoValues[1].textContent = email
    if (infoValues[2]) infoValues[2].textContent = phone
    if (infoValues[3]) infoValues[3].textContent = location
    if (infoValues[5]) infoValues[5].textContent = department
    if (infoValues[6]) infoValues[6].textContent = position
  }

  // Notification system
  function showNotification(message, type = "info") {
    const notification = document.createElement("div")
    notification.className = `notification notification-${type}`
    notification.innerHTML = `
            <div class="notification-content">
                <div class="notification-icon">
                    <i class="fas ${getNotificationIcon(type)}"></i>
                </div>
                <div class="notification-message">
                    <span>${message}</span>
                </div>
                <button class="notification-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `

    // Add notification styles if not already present
    if (!document.querySelector(".notification-styles")) {
      const styles = document.createElement("style")
      styles.className = "notification-styles"
      styles.textContent = `
                .notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: white;
                    border-radius: 0.5rem;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    border: 1px solid #e2e8f0;
                    min-width: 300px;
                    max-width: 400px;
                    z-index: 10000;
                    transform: translateX(100%);
                    transition: all 0.3s ease;
                    animation: slideInRight 0.3s ease-out;
                }
                .notification.show {
                    transform: translateX(0);
                }
                .notification-content {
                    display: flex;
                    align-items: flex-start;
                    gap: 0.75rem;
                    padding: 1rem;
                }
                .notification-icon {
                    width: 2rem;
                    height: 2rem;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 0.875rem;
                    flex-shrink: 0;
                }
                .notification-success .notification-icon {
                    background: #10b981;
                }
                .notification-error .notification-icon {
                    background: #ef4444;
                }
                .notification-info .notification-icon {
                    background: #6366f1;
                }
                .notification-warning .notification-icon {
                    background: #f59e0b;
                }
                .notification-message {
                    flex: 1;
                    font-weight: 500;
                    color: #1e293b;
                }
                .notification-close {
                    background: none;
                    border: none;
                    color: #64748b;
                    cursor: pointer;
                    padding: 0.25rem;
                    border-radius: 0.25rem;
                    transition: all 0.2s ease;
                }
                .notification-close:hover {
                    background: #f1f5f9;
                    color: #1e293b;
                }
            `
      document.head.appendChild(styles)
    }

    document.body.appendChild(notification)

    // Show notification
    setTimeout(() => {
      notification.classList.add("show")
    }, 10)

    // Auto remove after 5 seconds
    setTimeout(() => {
      notification.style.transform = "translateX(100%)"
      setTimeout(() => {
        if (notification.parentNode) {
          notification.remove()
        }
      }, 300)
    }, 5000)

    // Manual close
    notification.querySelector(".notification-close").addEventListener("click", () => {
      notification.style.transform = "translateX(100%)"
      setTimeout(() => {
        if (notification.parentNode) {
          notification.remove()
        }
      }, 300)
    })
  }

  function getNotificationIcon(type) {
    switch (type) {
      case "success":
        return "fa-check"
      case "error":
        return "fa-exclamation-triangle"
      case "warning":
        return "fa-exclamation"
      case "info":
      default:
        return "fa-info"
    }
  }

  // Activity filters
  const activityFilters = document.querySelectorAll(".filter-select, .filter-date")
  activityFilters.forEach((filter) => {
    filter.addEventListener("change", () => {
      // Simulate filtering activity
      showNotification("Activity filtered successfully", "info")
    })
  })

  // Session revoke buttons
  const revokeButtons = document.querySelectorAll(".session-item .btn-danger")
  revokeButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      if (confirm("Are you sure you want to revoke this session?")) {
        btn.closest(".session-item").style.opacity = "0.5"
        btn.textContent = "Revoked"
        btn.disabled = true
        showNotification("Session revoked successfully", "success")
      }
    })
  })

  // Animate elements on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = "running"
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  // Observe animated elements
  const animatedElements = document.querySelectorAll(".info-card, .activity-item, .timeline-item")
  animatedElements.forEach((el) => {
    el.style.animationPlayState = "paused"
    observer.observe(el)
  })

  // Initialize tooltips for status indicator
  const statusIndicator = document.querySelector(".status-indicator")
  if (statusIndicator) {
    statusIndicator.setAttribute("title", "Currently online")
  }

  // Add smooth scrolling to timeline
  const timelineContainer = document.querySelector(".activity-timeline")
  if (timelineContainer) {
    timelineContainer.style.scrollBehavior = "smooth"
  }

  // Handle preference changes
  const preferenceSelects = document.querySelectorAll(".form-select")
  preferenceSelects.forEach((select) => {
    select.addEventListener("change", (e) => {
      const setting = e.target.previousElementSibling.textContent
      const value = e.target.value
      showNotification(`${setting} changed to ${value}`, "info")
    })
  })

  // Add loading animation to stats
  const statNumbers = document.querySelectorAll(".stat-number")
  statNumbers.forEach((stat, index) => {
    const finalValue = stat.textContent
    stat.textContent = "0"

    setTimeout(
      () => {
        animateNumber(stat, finalValue)
      },
      1000 + index * 200,
    )
  })

  function animateNumber(element, finalValue) {
    const isPercentage = finalValue.includes("%")
    const isDecimal = finalValue.includes(".")
    const hasK = finalValue.includes("K")

    let numericValue = Number.parseFloat(finalValue.replace(/[^\d.]/g, ""))
    if (hasK) numericValue *= 1000

    let current = 0
    const increment = numericValue / 50
    const timer = setInterval(() => {
      current += increment
      if (current >= numericValue) {
        current = numericValue
        clearInterval(timer)
      }

      let displayValue = Math.floor(current)
      if (hasK && displayValue >= 1000) {
        displayValue = (displayValue / 1000).toFixed(1) + "K"
      } else if (isDecimal) {
        displayValue = current.toFixed(1)
      }

      if (isPercentage) displayValue += "%"

      element.textContent = displayValue
    }, 20)
  }

  // Add ripple effect to buttons
  const buttons = document.querySelectorAll(".btn, .tab-btn")
  buttons.forEach((button) => {
    button.addEventListener("click", function (e) {
      const ripple = document.createElement("span")
      const rect = this.getBoundingClientRect()
      const size = Math.max(rect.width, rect.height)
      const x = e.clientX - rect.left - size / 2
      const y = e.clientY - rect.top - size / 2

      ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `

      if (!document.querySelector(".ripple-styles")) {
        const rippleStyles = document.createElement("style")
        rippleStyles.className = "ripple-styles"
        rippleStyles.textContent = `
                    @keyframes ripple {
                        to {
                            transform: scale(4);
                            opacity: 0;
                        }
                    }
                `
        document.head.appendChild(rippleStyles)
      }

      this.style.position = "relative"
      this.style.overflow = "hidden"
      this.appendChild(ripple)

      setTimeout(() => {
        ripple.remove()
      }, 600)
    })
  })
})
