class MobileMenu {
  constructor() {
    console.log("MobileMenu constructor called");
    this.menu = document.querySelector(".site-header__menu");
    this.openButton = document.querySelector(".site-header__menu-trigger");
    console.log("this.menu:", this.menu);
    console.log("this.openButton:", this.openButton);
    this.events();
  }

  events() {
    console.log("Adding event listener");
    console.log("this.openButton:", this.openButton);
    this.openButton.addEventListener("click", () => this.openMenu());
  }

  openMenu() {
    console.log("openMenu called");
    this.openButton.classList.toggle("fa-bars");
    this.openButton.classList.toggle("fa-window-close");
    this.menu.classList.toggle("site-header__menu--active");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const mobileMenu = new MobileMenu();
});

export default MobileMenu;
