document.addEventListener("DOMContentLoaded", () => {
  // Sidebar functionality
  const sidebar = document.getElementById("sidebar")
  const sidebarToggleBtn = document.getElementById("sidebarToggleBtn")
  const sidebarToggle = document.getElementById("sidebarToggle")
  const sidebarOverlay = document.getElementById("sidebarOverlay")
  const mainContent = document.querySelector(".main-content")

  // Toggle sidebar on mobile
  function toggleSidebar() {
    if (window.innerWidth <= 768) {
      sidebar.classList.toggle("show")
      sidebarOverlay.classList.toggle("show")
      document.body.style.overflow = sidebar.classList.contains("show") ? "hidden" : ""
    } else {
      sidebar.classList.toggle("collapsed")
      mainContent.classList.toggle("expanded")
    }
  }

  // Event listeners for sidebar toggle
  if (sidebarToggleBtn) {
    sidebarToggleBtn.addEventListener("click", toggleSidebar)
  }

  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", toggleSidebar)
  }

  // Close sidebar when clicking overlay
  if (sidebarOverlay) {
    sidebarOverlay.addEventListener("click", () => {
      sidebar.classList.remove("show")
      sidebarOverlay.classList.remove("show")
      document.body.style.overflow = ""
    })
  }

  // Handle window resize
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      sidebar.classList.remove("show")
      sidebarOverlay.classList.remove("show")
      document.body.style.overflow = ""
    }
  })

  // Submenu functionality
  const submenuToggles = document.querySelectorAll(".submenu-toggle")

  submenuToggles.forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      e.preventDefault()
      const parentItem = this.closest(".nav-item")
      const isOpen = parentItem.classList.contains("open")

      // Close all other submenus
      document.querySelectorAll(".nav-item.open").forEach((item) => {
        if (item !== parentItem) {
          item.classList.remove("open")
        }
      })

      // Toggle current submenu
      parentItem.classList.toggle("open", !isOpen)
    })
  })

  // Dropdown functionality
  const dropdownBtns = document.querySelectorAll('[id$="Btn"]')

  dropdownBtns.forEach((btn) => {
    const dropdownId = btn.id.replace("Btn", "Dropdown")
    const dropdown = document.getElementById(dropdownId)

    if (dropdown) {
      btn.addEventListener("click", (e) => {
        e.stopPropagation()

        // Close other dropdowns
        document.querySelectorAll(".dropdown-menu.show").forEach((menu) => {
          if (menu !== dropdown) {
            menu.classList.remove("show")
          }
        })

        // Toggle current dropdown
        dropdown.classList.toggle("show")
      })
    }
  })

  // Close dropdowns when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".dropdown")) {
      document.querySelectorAll(".dropdown-menu.show").forEach((menu) => {
        menu.classList.remove("show")
      })
    }
  })

  // Search functionality
  const searchInput = document.querySelector(".search-input")
  if (searchInput) {
    searchInput.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        e.preventDefault()
        const searchTerm = this.value.trim()
        if (searchTerm) {
          // Implement search functionality here
          console.log("Searching for:", searchTerm)
        }
      }
    })
  }

  // Add smooth scrolling to sidebar
  const sidebarContent = document.querySelector(".sidebar-content")
  if (sidebarContent) {
    sidebarContent.style.scrollBehavior = "smooth"
  }

  // Add loading states for buttons
  const buttons = document.querySelectorAll(".btn")
  buttons.forEach((btn) => {
    btn.addEventListener("click", function () {
      if (!this.classList.contains("loading")) {
        this.classList.add("loading")
        setTimeout(() => {
          this.classList.remove("loading")
        }, 2000)
      }
    })
  })

  // Initialize tooltips (if you want to add them)
  function initTooltips() {
    const tooltipElements = document.querySelectorAll("[data-tooltip]")
    tooltipElements.forEach((element) => {
      element.addEventListener("mouseenter", function () {
        const tooltip = document.createElement("div")
        tooltip.className = "tooltip"
        tooltip.textContent = this.getAttribute("data-tooltip")
        document.body.appendChild(tooltip)

        const rect = this.getBoundingClientRect()
        tooltip.style.left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + "px"
        tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + "px"

        setTimeout(() => tooltip.classList.add("show"), 10)
      })

      element.addEventListener("mouseleave", () => {
        const tooltip = document.querySelector(".tooltip")
        if (tooltip) {
          tooltip.remove()
        }
      })
    })
  }

  // Initialize all functionality
  initTooltips()

  // Add fade-in animation to dashboard cards
  const dashboardCards = document.querySelectorAll(".dashboard-card, .stat-card")
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-in")
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  dashboardCards.forEach((card) => {
    observer.observe(card)
  })
})

// Utility functions
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
        <div class="notification-content">
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `

  document.body.appendChild(notification)

  setTimeout(() => {
    notification.classList.add("show")
  }, 10)

  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.remove()
  }, 5000)

  // Manual close
  notification.querySelector(".notification-close").addEventListener("click", () => {
    notification.remove()
  })
}

function formatNumber(num) {
  return new Intl.NumberFormat().format(num)
}

function formatCurrency(amount) {
  return new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
  }).format(amount)
}

// Export functions for use in other scripts
window.AdminDashboard = {
  showNotification,
  formatNumber,
  formatCurrency,
}
