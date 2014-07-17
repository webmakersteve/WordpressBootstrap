'use strict';

require.config({
    baseUrl: bootstrap.__dirname + '/public/js/',
    paths: {
        jquery: 'jquery.min',
        bootstrap: 'bootstrap.min'
    }
})

require(['jquery', 'bootstrap'], function (jQuery) {
    (function($) {
        var navdrawerContainer = $('.navdrawer-container');
        var appbarElement = $('.app-bar');
        var menuBtn = $('.navbar-toggle');
        var main = $('main');


        function closeMenu() {
            appbarElement.removeClass('open');
            navdrawerContainer.removeClass('open');
        }

        function toggleMenu() {
            appbarElement.toggleClass('open');
            navdrawerContainer.toggleClass('open');
        }


        main.on('ontouchstart', closeMenu);
        main.on('click', closeMenu);
        menuBtn.on('click', toggleMenu);
        navdrawerContainer.on('click', function (event) {
            if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
                closeMenu();
            }
        });

    })(jQuery);


});
