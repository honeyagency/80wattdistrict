jQuery(document).ready(function($) {
    appear({
        init: function init() {},
        // function to get all elements to track
        elements: function elements() {
            return document.getElementsByClassName('block--image');
        },
        // function to run when an element is in view
        appear: function appear(el) {
            el.className += " show";
        },
        // function to run when an element is in view
        disappear: function disappear(el) {
            el.classList.remove("show");
        },
        reappear: true,
    });
    $('.menu--trigger').on('click touchstart', function(event) {
        event.preventDefault();
        $('body').toggleClass('nav-open');
    });
    $('#toggleSearch').on('click touchstart',  function(event) {
        event.preventDefault();
        $('body').toggleClass('search-open');
    });
});