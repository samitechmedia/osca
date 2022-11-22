<?php
$title = "&dollar;100000 Pyramid Slot Review ".date('Y')." - By IGT";
$desc = "&dollar;100000 Pyramid Online Slot Review - Based on the American quiz show, we look at this exciting game, with a huge betting range, jackpot + free spins!";

$slotName = '100000 Pyramid';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 365
  };
</script>

<div id="arcade-game-review">
<section class="section review__section type-section-padding-bottom" id="freeGame">
  <div class="container">
    <div itemscope="" itemtype="http://schema.org/Review">
      <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
      ?>
      <div class="review-game__information">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-8">
            <h1 class="title title--h2">The &dollar;100,000 Pyramid Slot Review</h1>
            <p>
              The C&dollar;100,000 Pyramid is another five reel, fifteen payline classic from the renowned IGT
                (International Game Technology) giants. Based on the much loved American quiz show: 50,000 Pyramids,
                this game comes as the sequel to the 2010 original. Like its predecessor, The C&dollar;100,000 Pyramid is
                named after the maximum number of coins a player can win - a mighty 100,000 if you haven't guessed
                already. Play starts from just C&dollar;0.15 a spin and rises toC&dollar;450 spin for those who like to
                splash
                the cash. Is The C&dollar;100,000 Pyramid fun for a Canadian audience too? Well if you're a stickler
                for a good vintage then this is certainly a game to give a spin.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/100000-pyramid.png" class="review-game__img" alt="The C$100,000 Pyramid" width="200" height="139">
              </div>
              <a href="<?php echo $partnerInfo['affiliate_link']; ?>" rel="nofollow noreferrer" target="_blank" class="a-cta-button"> PLAY NOW
                <span aria-hidden="true" class="white__inner-circle">
                    <span aria-hidden="true" class="fa fa-arrow-right"></span>
                </span>
                <span class="is-accessible-text">Play <?php echo $slotName; ?> for free</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <m-attribute-box></m-attribute-box>
      <div class="review__text-block type-display-flex type-flex-justify-between">
        <div class="type-left-side">
          <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
            <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
          <h2 class="title title--h2">Graphics and Basic Play</h2>
          <p>
            Admittedly, the graphics leave a little to be desired. There is a strong whiff of the early 90’s here, but you’re not playing because you went looking for something flashy. Think more along the lines of Tom Cruise in the classic film Cocktail,
            a few dodgy moves and one too many nylon shirts, but a true classic none the less.
          </p>
          <p>
            Now back to play, as we mentioned earlier there is a 100,000 coin jackpot. This is triggered by getting five 100,000 Pyramid logo symbols (the wild card in this game) on an active payline. Also good to know is the 100,000 Pyramid logo symbol can
            take the place of any other symbol in the game, greatly increasing the chances of lining up a complete winning combination.
          </p>
          <h2 class="title title--h2">Symbols and Free Spin Bonus Feature</h2>
          <p>
            The other symbol you need to be aware of is the Winner’s Circle Pyramid symbol (the scatter symbol), three or more of these scattered anywhere on the five reels will activate the games Winner’s Circle Pyramid Bonus feature. This is the main attraction, so take note. To start, six free spins are rewarded with x1 multiplier, and from there you have five picks to increase the number of free spins and multipliers. Each choice will reveal either an extra free spin or an increased multiplier. You can sometimes also reveal an extra selection, or advance arrow which will take you onto the next level of the Pyramid. For you lucky ones out there, up to 36 free spins with a 9x multiplier could be awarded. For most of us, we can expect approximately twelve to fifteen free spins and a multiplier in the range of 2x to 4x.
          </p>
          <p>
            Once you have your picks, the Pyramid is revealed and you move on to the Free Spins Bonus Round. Here you play your free spins on highly enhanced bonus reels, configured to the multiplier value you earned. Unfortunately, players are unable to retrigger free spins once inside this feature. All winning combinations exposed while playing the free spins are subject to your multiplier, except for the top award of five 100,000 Pyramid Logo symbols. Once all the free spins have been played, you return to the regular game and your Free Spin wins are added to your win total.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('100000pyramid', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Our Verdict</h2>
          <p>
            Overall, The C$100,000 Pyramid is a classic slot that for many, may never lose its appeal. Charm and character are the key words here. So while newer, more refined games come out all the time this slot remains, hanging out, sipping Gin n’ Tonic with the other great IGT oldies such as Da Vinci Diamonds and Cleopatra.</p>
          <p>
            It’s a medium to high variance slot, meaning that wins don’t come so often, however the return when they do is worth the wait. In this game it really is all about the free spins or the jackpot. Thankfully though, unlike it’s predecessor, you don’t have to bet max and that, regular players will know, is a rare thing. In fact anyone, at any level, can win the whopping C$100,000 times your line bet, at any point during the game, making it a surprisingly democratic slot.
          </p>
        </div>
        <div class="col-12 col-xl-6">
          <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/jackpot.php"); ?>
        </div>
      </div>
      <span itemprop="author" itemscope="" itemtype="http://schema.org/Organization">
      </span>
      <p>Reviewed By: OnlineSlots.ca</p>
      <?php
        $unity->outputTopPartnerSingleItemFromToplist();
      ?>

      <?php include($_SERVER['DOCUMENT_ROOT']."/includes/more-pokies.php"); ?>
    </div>
  </div>
</section>
<script src="/_arcade/dist/js/game-review.js"></script>
</div>
<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
