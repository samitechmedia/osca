'use strict';

$(function () {

    var accordionTitle = document.querySelectorAll(".accordion-item__title");

// Accordion - on click of title section - display/hide content section
    var toggleAction = function toggleAction() {
        this.parentNode.classList.toggle("js-accordion-active");
        var panel = this.nextElementSibling;
        // if max height has be set remove
        // so transitions show/hide
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            // get the height of inside content
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    };

    accordionTitle.forEach(function (item) {
        return item.addEventListener("click", toggleAction);
    });

    $(".read-more__trigger").on("click", function(e){
        var _this = $(this);
        e.preventDefault();

        _this.toggleClass("active-item");

        var featuredGame = _this.parents('.top__five-wrapp').find('.featured__game');

        if ( featuredGame.hasClass('opened') ) {
            featuredGame.removeClass('opened').slideUp();
        } else {
            featuredGame.addClass('opened').slideDown();
            if (featuredGame.hasClass('opened')) {
                animateScrollTop(featuredGame.offset().top, 1000);
            }
        }
    });


    // Toggle text box open close - set up on index page

    var toggleTextSettings = {
        toggleText: '.js-toggle-text',
        toggleTextContainer: '.js-toggle-text-container',
        toggleTextBox: '.js-toggleTextBox',
        toggleTextActive: 'js-toggle-text-active'
    };

    var toggleText = document.querySelectorAll(toggleTextSettings.toggleText);
    // ie fix
    toggleText = [].slice.call(toggleText);

    toggleText.forEach(function (item) {
        return item.addEventListener('click', function () {

            var parentContainer = document.querySelector(toggleTextSettings.toggleText).closest(toggleTextSettings.toggleTextContainer);
            parentContainer.classList.toggle(toggleTextSettings.toggleTextActive);
        });
    });

    // END toggle text box

    // Toggle Text using data attribute text
    var dataTextToggle = document.querySelectorAll(".js-dataTextToggle");

    var toggleHandler = function toggleHandler(e) {

        if (this.getAttribute("data-text-swap") === this.innerHTML) {
            this.innerHTML = this.getAttribute("data-text-original");
        } else {
            this.setAttribute("data-text-original", this.innerHTML);
            this.innerHTML = this.getAttribute("data-text-swap");
        }

    };

    dataTextToggle.forEach(function (item) {
        return item.addEventListener('click', toggleHandler);
    });

    function animateScrollTop(target, duration) {
        duration = duration || 16;
        var scrollTopProxy = { value: $(window).scrollTop() };
        if (scrollTopProxy.value != target) {
            $(scrollTopProxy).animate(
                { value: target },
                { duration: duration, step: function (stepValue) {
                    var rounded = Math.round(stepValue);
                    $(window).scrollTop(rounded);
                }
            });
        }
    }

    var scrollTopBtn = $('.scroll-top');

    $(window).scroll(function() {
        $(window).scrollTop() > 100 ? scrollTopBtn.addClass('visible') : scrollTopBtn.removeClass('visible');
    });

    scrollTopBtn.on('click', function() {
        animateScrollTop(0, 1000);
    });


    var gameMarks = {
        'Bad': 4,
        'Normal': 6,
        'Excellent': 8,
        'Superb': 10
    },
    markTitle = $('.excellent__title'),
    exelentCount = parseInt(Math.round($('.excellent__count').html()));
    for (var mark in gameMarks) {
        // console.log(mark, gameMarks[mark]);
        if (gameMarks[mark] >= exelentCount) {
            markTitle.html(mark);
            break;
        }
    }

    function animateCircle() {
        $("#count").find('path').each(function(index){
            if(index < exelentCount) {
                (function(that, i) {
                    var t = setTimeout(function() {
                        $(that).addClass("st0__fill");
                    }, 500 * i);
                })(this, index);
            }
        });
    }

    var $animation_elements = $('#count');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                animateCircle();
            } else {
                return false;
            }
        });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');

        function a(c, f) {
            if (!d && !b) {
                b = !0,
                f = void 0 == f || f == c.length ? 0 : f;
                var g = $($(".block-winners-map .block-winner")[0]);
                $(".img-map").animate({
                    left: c[f].background_left,
                    top: c[f].background_top
                }, "slow", function() {}),
                g.fadeOut(1e3, function() {
                    g.css({
                        left: "160px",
                        top: "67px"
                    }),
                    g.find("p.winner-title").html(c[f].title),
                    g.find(".site-winner img").attr("src", c[f].img),
                    g.find("a.btn-play-now").attr("href", c[f].link).attr("rel", "nofollow").attr("target", "_blank"),
                    g.find("p.bonus-winner").html(c[f].text),
                    g.fadeIn("slow", function() {
                        f++,
                        e = f,
                        setTimeout(function() {
                            a(c, f)
                        }, 3e3)
                    })
                }),
                b = !1
            }
        }
        var b = !1
          , c = [{
            background_left: "77px",
            background_top: "-317px",
            title: "Diane L. from Vancouver just won<br />C$12,319 playing Slots at Ruby Fortune.",
            img: "/images/map/site-winner-1.png",
            link: "/go/rubyfortune/casino",
            text: "C$750 Welcome bonus for new customers"
        }, {
            background_left: "-65px",
            background_top: "-64px",
            title: "Mark M from Paulatuk just won<br /> C$7,527 playing Slots at Spin Casino.",
            img: "/images/map/site-winner-3.png",
            link: "/go/spincasino/casino",
            text: "C$1000 Welcome bonus for new customers"
        }, {
            background_left: "-77px",
            background_top: "-167px",
            title: "Hope C. from Yellowknife just won<br /> C$4,157 playing Slots at Jackpot City.",
            img: "/images/map/site-winner-4.png",
            link: "/go/jackpotcity/casino",
            text: "C$500 Welcome bonus for new customers"
        }, {
            background_left: "-470px",
            background_top: "-386px",
            title: "Gille from Quebec just won<br /> C$9,752 playing Slots at Spin Casino.",
            img: "/images/map/site-winner-3.png",
            link: "/go/spincasino/casino",
            text: "C$1000 Welcome bonus for new customers"
        }, {
            background_left: "-15px",
            background_top: "-319px",
            title: "Stanley from Calgary just won<br /> C$3,687 playing Slots at Royal Vegas.",
            img: "/images/map/site-winner-2.png",
            link: "/go/royalvegas/casino",
            text: "C$250 Welcome bonus for new customers"
        }, {
            background_left: "-383px",
            background_top: "-444px",
            title: "Susan E from Toronto just won<br /> C$8,299 playing Video Poker at Spin Casino.",
            img: "/images/map/site-winner-3.png",
            link: "/go/spincasino/casino",
            text: "C$1000 Welcome bonus for new customers"
        }, {
            background_left: "-185px",
            background_top: "-367px",
            title: "Mario from Winnipeg just won<br /> C$3,697 playing Blackjack at Spin Casino.",
            img: "/images/map/site-winner-3.png",
            link: "/go/spincasino/casino",
            text: "C$1000 Welcome bonus for new customers"
        }]
          , d = !1
          , e = 0;
        $(".box-winner").on("mouseover", function() {
            d = !0
        }),
        $(".box-winner").on("mouseout", function() {
            d = !1,
            setTimeout(function() {
                a(c, e)
            }, 1e3)
        }),
        a(c);
});
