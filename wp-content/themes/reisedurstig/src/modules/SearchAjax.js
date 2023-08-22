// this is the js-script for ajax search

import $ from 'jquery';

class SearchObject {
    //1. create and initiate the object
    constructor() {
        this.openButtons = document.querySelectorAll(".js-search-trigger");
        this.closeButton = document.querySelector(".search-overlay__close");
        this.searchOverlay = document.querySelector(".search-overlay");
        this.events();
    }

    //2. events
    events() {
        this.openButtons.forEach(button => {
            button.addEventListener('click', this.openOverlay.bind(this));
        });
        this.closeButton.addEventListener('click', this.closeOverlay.bind(this));
    }

    //3. methods (or functions)
    openOverlay() {
        this.searchOverlay.classList.add('search-overlay--active');
    }

    closeOverlay() {
        this.searchOverlay.classList.remove('search-overlay--active');
    }
}

export default SearchObject;
