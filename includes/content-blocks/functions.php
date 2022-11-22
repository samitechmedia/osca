<?php

function altFreeGameBox($gameName){
  echo '<div class="free-game-box">
  	    <div class="free-game-box__intro-text">
  	      Play '.$gameName.'<br/>
  	      at our <span class="free-game-box__intro-text--bold-green">#1 Rated Casino</span>
  	    </div>
  	    <div class="free-game-box__casino-logo">
  	        <div class="free-game-box__casino-logo-holder">
  	          <img alt="JackpotCity Logo" class="lazy" src="/images/logos/inner/jackpotcity-logo.png" data-src="/images/logos/inner/jackpotcity-logo.png" style="display: inline;">
  	          <span class="free-game-box__casino-logo-text">+580 Slots</span>
  	        </div>
  	          <span class="free-game-box__casino-rating">
  	            <span style="width: 95%;" class="free-game-box__casino-ratingon">&nbsp;</span>
  	          </span>
  	    </div>
  	    <div class="free-game-box__cta-button">
  	      <a class="btn-wide" href="/go/spincasino/casino" rel="nofollow noreferrer" target="_blank">
  	        <span class="arrow">&nbsp;</span> Bonus: 100% Up To C$1600
  	      </a>
  	    </div>
  	  </div>';
}

function topCasinoBox($ctaButtonText){

    echo '<div class="bottom-box2">
                <a target="_blank" href="/go/jackpotcity/casino" rel="nofollow noreferrer">
                                <div class="hold-padd">
                                    <div class="img-left">
                                        <div class="logo-box-in">
                                            <div class="logo-wrap"><span href="#"><img alt="JackpotCity Logo" class="lazy" src="/images/rings.svg" data-src="/images/logos/inner/jackpotcity-logo.png"></span></div>
                                            <span class="rating"><span style="width: 95%;" class="ratingon">&nbsp;</span></span>
                                        </div>
                                    </div>
                                    <div class="txt-tight">
                                        <div class="top-ttl">
                                            Exclusive Slots Bonus: <span class="line-bg"><span>100%</span> Up To <span>C$1600</span></span>
                                        </div>
                                        <ul class="info-list">
                                            <li>More than 580 games to play with real money</li>
                                            <li>Over C$1600 available in deposit bonuses</li>
                                            <li>Play with and earn real cash</li>
                                            <li>350+ themed slot games</li>
                                        </ul>
                                        <div class="bottom-card">
                                            <div class="item-holder">
                                                <ul class="card-list">
                                                    <li title="Click and Buy"><i class="sprite sprite-img-item-01"></i></li>
                                                    <li title="Visa"><i class="sprite sprite-img-item-02"></i></li>
                                                    <li title="Paysafecard"><i class="sprite sprite-img-item-03"></i></li>
                                                    <li title="Mastercard"><i class="sprite sprite-img-item-04"></i></li>
                                                    <li title="Insta Debit"><i class="sprite sprite-img-item-05"></i></li>
                                                    <li title="Entro Pay"><i class="sprite sprite-img-item-06"></i></li>
                                                    <li title="Eco Payz"><i class="sprite sprite-img-item-07"></i></li>
                                                    <li title="iDebit"><i class="sprite sprite-img-item-08"></i></li>
                                                </ul>
                                            </div>
                                            <div class="item-holder right-box">
                                                <ul class="list-tel">
                                                    <li title="Apple" class="fa-stack fa-lg">
                                                <i class="sprite apple sprite-img-item-09 icon-circle fa-stack-2x"></i>
                                                    <i class="apple icon-apple fa-stack-1x fa-inverse"></i>
                                                    </li>
                                                    <li title="Android" class="fa-stack fa-lg">
                                                 <i class="sprite android sprite-img-item-10 icon-circle fa-stack-2x"></i>
                                                    <i class="android icon-android fa-stack-1x fa-inverse"></i>
                                                    </li>
                                                    <li title="Windows" class="fa-stack fa-lg">
                                                   <i class="sprite windows sprite-img-item-11 icon-circle fa-stack-2x"></i>
                                                    <i class="windows icon-windows fa-stack-1x fa-inverse"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hold-bottom">
                                    <div class="img-left">
                                        <i class="sprite sprite-ico-02"></i>
                                    </div>
                                    <div class="txt-right">
                                        <p><span href="#" class="btn-wide">'.$ctaButtonText.'<span class="arrow">&nbsp;</span></span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>';
}
