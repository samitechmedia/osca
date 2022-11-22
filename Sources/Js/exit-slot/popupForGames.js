(function ($) {


    var isOpened = false,
        lightboxOpened = false,
        showSlotGameCountDown,
        currentPage = window.location.host+window.location.pathname,
        targetExitCount,
        htmlExitCount = 1;

//    if($.cookie('cookiePopup') !== 'popUp') return;

    var gameLightboxTimer = setInterval(checkForGameOpenAndClose,1000);

    if(currentPage != 'www.onlineslots.ca/free'){
        targetExitCount = 1;
    }else{
        targetExitCount = 2;
    }


    $('html').mouseleave(function () {
        if(htmlExitCount >= targetExitCount){
            showSlotGame();
            if(lightboxOpened){
                clearTimeout(showSlotGameCountDown);
            }else{
                clearInterval(gameLightboxTimer);
            }
        }else{
            htmlExitCount++;
        }

    });


    function checkForGameOpenAndClose(){
        var $modalScreen = $('#modalscreen');
        if($modalScreen.is(':visible') && !lightboxOpened){
            showSlotGameCountDown = setTimeout(showSlotGame,120000);
            lightboxOpened = true;
            //clearInterval(gameLightboxTimer);
        }else if(!$modalScreen.is(':visible') && lightboxOpened){
            clearTimeout(showSlotGameCountDown);
            clearInterval(gameLightboxTimer);
            showSlotGame();
        }else{
            return false;
        }
    }

    function showSlotGame(){

        if (isOpened)
            return;

        if (!$.cookie('cookiePopup')) {
            var cookieExpireDate = new Date();
            cookieExpireDate.setTime(cookieExpireDate.getTime() + (60*60*1000));
            $.cookie("cookiePopup", "true", { expires: cookieExpireDate });

            $('.block-slot-machine').on('click','.close-slot-machine',function(e){
                e.preventDefault();
                //$(".fancybox-overlay").remove();
                $.fancybox.close("#exit-popup");
            });

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
                                winText.html('$1000 BONUS AT <span class="casino-prize">SPIN CASINO</span>');
                                var $blockSpinToWin = $('a.block-spin-to-win');
                                $blockSpinToWin.removeClass('block-try-again');
                                $blockSpinToWin.prop('onclick',null).off('click');
                                $(".block-slot-machine .block-prize").css({"backgroundColor" : "#442052",});
                                $('a.block-prize').attr({
                                    'href':'/go/spincasino/casino',
                                    'target':'_blank',
                                    'rel':'nofollow'
                                });
                                $('div.block-slot-machine').on('click','a.block-prize',function(){
                                    $.fancybox.close("#exit-popup");
                                });
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
            isOpened = true;
        }
    }

})(jQuery);

