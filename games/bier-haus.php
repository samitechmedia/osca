<?php
$title = 'Bier Haus Slot Machine Review - By Williams Interactive';
$desc = 'Bier Haus Slot Machine Review - Made by Williams Interactive, traditionally enjoyed in land casinos and now available online. Learn more about bonuses &amp; more!';

$slotName = 'Bier Haus';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7623
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
            <h1 class="title title--h2">Bier Huas - A German Beer Drinking Slots Game</h1>
            <p>Bier Haus is a Williams Interactive slot machine that started out as a land based casino game and has now been brought to the small screen, so you can play right from your very own home computer. This is a classic five reel slots with 40 pay lines and tons of bonus features. It takes the theme of a beer hall or bier haus in classic Germany. This is a really fun theme for slots because it gives a party atmosphere that you will not find anywhere else.  You will even find traditional German music playing in the background when you unlock the special bonus round. If you are intrigued, read on to learn more about how to play this awesome and exciting game from WMS!
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/bierhaus.png" class="review-game__img" alt="Bier Haus" width="200" height="139">
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
			<h2 class="title title--h2">Beer Lovers Will Enjoy These Bier Haus Reels and Symbols</h2>
			<p>
				WMS slots has put out another classic with their Bier Haus slots game. WMS is known for having more paylines for you to bet on than most other slots developers. Most slots games have about 10 or 20 paylines, but Bier Haus has a massive 40 paylines across their five reels. This means that if you bet the max number of paylines, you have 40 chances to win every time you spin. That really beats old fashioned slot machines where you could only win by lining up symbols straight across the reels! The symbols you will find in this game all have to do with Germany and beer drinking - wooden casks of beer, accordions, castles, a German man who even has Lederhosen on, a Barfrau with a Dirndl, acorns, and of course the classic card symbols as well.
			</p>
			<h2 class="title title--h2">Special German Bonus Features</h2>
			<p>
				The bonuses you will find in this game include Wilds, free spins, scatters and more. The Wild symbol is the group of beer mugs, which acts as any other symbol in order to pay out the highest possible win.  The free spins feature can be triggered by getting five Barfraus on the screen at one time, starting from the left of the screen. This includes the regular Barfraus and the Barfraus with beer mugs. Lining up five of these symbols gets you five free spins automatically. Every single extra Barfrau above five gets you five additional spins, with the maximum number of free spins being 80. The Barfrau symbols in this game are clumped, which means they appear on the screen in groups, making it very easy for you to trigger the free spins round.
			</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('bier-haus', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Bonuses and Free Spins</h2>
			<p>
				If you thought the free spins feature in this game was special, you are in for another treat. There is more to the bonus feature than meets the eye. As we mentioned above, there are regular Barfrau symbols as well as Barfrau with beer mug symbols, all of which contribute to your free spins. Before your bonus free spins start, you will find that the Barfrau with beer mug symbols all turn into Wild cards. They are also locked in position during the free spins, replicating any symbol that is needed for a payout. You can even keep the free spins going for five additional spins by lining up five more Barfraus on the screen during your bonus round.
			</p>
			<h2 class="title title--h2">Bier Haus Conclusions - Why We Love This Game </h2>
			<p>
      Bier Huas is a great game for beginners and well-seasoned slots veterans alike. Bier Haus started out as a land based machine and was extremely popular among WMS fans. It is clear to see why the online version is so well loved as well. You get 40 paylines, wilds, scatters and free spins. It has a great style and graphics that will wow you, making for a fun and immersive experience that slots players love.
			</p>
        </div>
        <div class="col-12 col-xl-6">
          <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/jackpot.php"); ?>
        </div>
      </div>
      <span itemprop="author" itemscope="" itemtype="http://schema.org/Organization"></span>
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
