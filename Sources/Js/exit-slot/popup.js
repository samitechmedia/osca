(function ($) {
    var isOpened = false;

//    if($.cookie('cookiePopup') !== 'popUp') return;

    $('html').mouseleave(function () {

        if (isOpened)
            return;

        if (!$.cookie('cookiePopup')) {

            $.fancybox.open("#exit-popup", {
                closeBtn: false,
                padding: 0,
                helpers: {
                    overlay: {
                        closeClick: false
                    }
                },
                beforeShow: function () {
                    var congrat = $('#win-congratulations');
                    var winText = $('#win-text');
                    $('.slot').jSlots({
                        spinner: '#play-spin',
                        loops: 15,
                        onStart: function () {
                            congrat.hide();
                            winText.html('');
                        },
                        onEnd: function (imgs) {
                            var isWin = true;
                            var prev = false;
                            $.each(imgs, function (i, v) {
                                var num = $(v).data('number');
                                if (prev !== false && prev != num) {
                                    isWin = false;
                                    return false;
                                }
                                prev = num;
                            });

                            if (isWin) {
                                congrat.show();
                                winText.html('C$1000 BONUS AT <span class="casino-prize">SPIN Casino</span>');
                                $('a.block-spin-to-win').removeClass('block-try-again');
								$(".block-slot-machine .block-prize").css({"backgroundColor" : "#442052",});
                            } else {
                                // congrat.show();
                                winText.html('YOU LOSE. TRY AGAIN');
                                $('a.block-spin-to-win').addClass('block-try-again');
                            }
                        }
                    });

                    $(".fancybox-skin").css({
                        "backgroundColor": "transparent",
                        "boxShadow": "none"
                    });
                    $(".fancybox-overlay").css({
                        "background": "rgba(0,0,0,0.95)"
                    });
                }
            });
        }
        isOpened = true;
    });

})(jQuery);


