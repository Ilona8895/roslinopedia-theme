class MobileMenu {
  constructor() {
    this.menu = document.querySelector(".site-header__menu")
    this.openButton = document.querySelector(".site-header__menu-trigger")
    if (!this.menu || !this.openButton) return
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
      this.openButton.classList.remove("fa-bars")
      this.openButton.classList.add("fa-times")
    } else {
      this.openButton.classList.remove("fa-times")
      this.openButton.classList.add("fa-bars")
    }
  }

  closeMenu() {
    this.menu.classList.remove("site-header__menu--active")
    this.openButton.classList.remove("fa-times")
    this.openButton.classList.add("fa-bars")
  }
}

export default MobileMenu
