// This is the JS for the ajax search method (live-search)
class Search {
    constructor() {
        
    }
}







// This is the JS for the classic search method without ajax
document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('search-icon');
    const searchForm = document.getElementById('search-form');

    if (searchIcon && searchForm) {
        searchIcon.addEventListener('click', function() {
            if (searchForm.style.display === 'none' || searchForm.style.display === '') {
                searchForm.style.display = 'block';
            } else {
                searchForm.style.display = 'none';
            }
        });
    }
});
