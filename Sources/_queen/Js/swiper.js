// core version + navigation, pagination modules
import Swiper, { Navigation, Pagination } from 'swiper/core';

// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

if (document.querySelector('.js-exclusive-swiper')) {
    new Swiper('.js-exclusive-swiper__container', {
        loop: true,
        navigation: {
            nextEl: '.js-exclusive-swiper__next',
            prevEl: '.js-exclusive-swiper__prev',
        },
        slidesPerView: 4,
        spaceBetween: 10,
    });
};

// Casino review Swiper
if (document.querySelector('.js-review-swiper')) {
    new Swiper('.js-review-swiper__container', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        loop: true,
        navigation: {
            nextEl: '.js-review-swiper__next',
            prevEl: '.js-review-swiper__prev',
        },
        slidesPerView: 1,
        spaceBetween: 15
    });
};

function RelatedboxSlider(elem) {
    this.elem = elem;
    this.swiperInst = null;
    this.resizeTimer = null;

    this.sliderOptions = {
        observer: true,
        observeParents: true,
        slidesPerView: 'auto',
        threshold: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    };

    this.resizeHandler = function () {
        clearTimeout(this.resizeTimer);
        this.resizeTimer = setTimeout(function () {
            if (window.matchMedia('(min-width: 768px)').matches) {
                if (this.swiperInst) {
                    this.swiperInst.destroy();
                    this.swiperInst = null;
                }
            } else if (!this.swiperInst) {
                this.swiperInst = new Swiper(this.elem, this.sliderOptions);
            }
        }.bind(this), 100);
    }

    this.init = function () {
        this.resizeHandler();
        window.addEventListener('resize', this.resizeHandler.bind(this));
        window.addEventListener('orientationchange', this.resizeHandler.bind(this));
    }

    this.init();
}

var sliders = document.querySelectorAll('.js-related-box-slider');
sliders.forEach(function (slider) {
    new RelatedboxSlider(slider);
});
