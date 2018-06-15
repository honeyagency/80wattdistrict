jQuery(document).ready(function($) {
    var myLazyLoad = new LazyLoad({
        // example of options object -> see options section
        threshold: 500,
        throttle: 30,
        show_while_loading: false,
    });
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
    if (window.matchMedia('(max-width: 767px)').matches) {
        var mob = true;
    } else {
        var mob = false;
    }$('.trigger--children').on('click touchstart', function(event) {
            event.preventDefault();
            $parent = $(this).parent();
            $child = $parent.find('.section--child-nav');
            $openChild = $('.section--child-nav.open');
            if ($parent.hasClass('children--visible')) {
                $parent.removeClass('children--visible');
                $child.removeClass('open');
            } else {
                $('.children--visible').removeClass('children--visible');
                $openChild.removeClass('open');
                $parent.addClass('children--visible');
                $child.addClass('open');
            }
        });
        if ($('.aboutgallery').length > 0) {
        $('.aboutgallery').flickity({
            // options
            cellSelector: 'img',
            // cellAlign: 'left',
            // setGallerySize: false,
            prevNextButtons: false,
            wrapAround: true,
            pageDots: true
        });
    }
    if (mob == true) {} else {
        $search = $('.toggle-search');
        $search.on('click touchstart', function(event) {
            event.preventDefault();

            function openSearch(scrollPosition) {
                var scrollPosition = [
                    self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                    self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
                ];
                $('body').addClass('search-open');
                $('.search-field').focus();
                var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
                html.data('scroll-position', scrollPosition);
                html.data('previous-overflow', html.css('overflow'));
                html.css('overflow', 'hidden');
                window.scrollTo(scrollPosition[0], scrollPosition[1]);
            }

            function closeSearch(scrollPosition) {
                var scrollPosition = [
                    self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                    self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
                ];
                $('body').removeClass('search-open');
                var html = jQuery('html');
                var scrollPosition = html.data('scroll-position');
                html.css('overflow', html.data('previous-overflow'));
                window.scrollTo(scrollPosition[0], scrollPosition[1])
            }
            if ($('body').hasClass('search-open')) {
                closeSearch();
            } else {
                openSearch();
            }
            $(document).keydown(function(event) {
                if (event.keyCode == 27) {
                    closeSearch();
                }
            });
        });
        
    }
});