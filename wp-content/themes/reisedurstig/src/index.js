import "../css/style.scss"

// Our modules / classes
// import MobileMenu from "./modules/MobileMenu"
// import HeroSlider from "./modules/HeroSlider"
// import GoogleMap from "./modules/GoogleMap"  // funktioniert aber
import SearchAjax from "./modules/SearchAjax";
import CustomScript from "./modules/CustomScript";


document.addEventListener("DOMContentLoaded", () => {
//   const mobileMenu = new MobileMenu()
  // const heroSlider = new HeroSlider()
  // const googleMap = new GoogleMap() //funktioniert
  const searchAjax = new SearchAjax()
  const customScript = new CustomScript()
  
  // Hier kannst du weitere Anweisungen hinzufügen, die nach dem Laden des DOMs ausgeführt werden sollen.
});

// alert('Just a test');
