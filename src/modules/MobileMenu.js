class MobileMenu {
  constructor() {
    this.menu = document.querySelector(".site-header__menu")
    this.openButton = document.querySelector(".site-header__menu-trigger")
    this.openButtonIcon = this.openButton?.querySelector("i")
    if (!this.menu || !this.openButton || !this.openButtonIcon) return
    this.events()
  }

  events() {
    this.openButton.addEventListener("click", () => this.openMenu())
    // Close menu when clicking a link
    const menuLinks = this.menu.querySelectorAll("a")
    menuLinks.forEach((link) => {
      link.addEventListener("click", () => this.closeMenu())
    })
  }

  openMenu() {
    this.menu.classList.toggle("site-header__menu--active")
    if (this.menu.classList.contains("site-header__menu--active")) {
      this.openButtonIcon.classList.remove("fa-bars")
      this.openButtonIcon.classList.add("fa-times")
    } else {
      this.openButtonIcon.classList.remove("fa-times")
      this.openButtonIcon.classList.add("fa-bars")
    }
  }

  closeMenu() {
    this.menu.classList.remove("site-header__menu--active")
    this.openButtonIcon.classList.remove("fa-times")
    this.openButtonIcon.classList.add("fa-bars")
  }
}

export default MobileMenu
