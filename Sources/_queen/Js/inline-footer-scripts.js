if (document.querySelector('.js-more')) {
    loadjs(['/dist/js/read-more.min.js'], 'readMore');
}

if (document.querySelector('.js-swiper')) {
    loadjs(['/dist/js/swiper.min.js'], 'swiper');
}

if (document.querySelector('.js-casino-finder')) {
    loadjs(['/dist/js/site-finder.min.js'], 'siteFinder');
}

// Define "jquery" dependency
loadjs(['/dist/js/jquery-3.1.1.min.js'], 'jquery');

// Execute code when "jquery" is ready
loadjs.ready('jquery', function() {
    loadjs('/dist/js/main.min.js');

    if (document.querySelector('.jackpot__area')) {
        loadjs('/dist/js/jackpot.min.js');
    }

    if (document.querySelector('.fancybox')) {
        loadjs('/dist/js/jquery.fancybox.min.js');
    }
});
