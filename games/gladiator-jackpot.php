<?php
$title = "Gladiator Jackpot Slot Review - By Playtech";
$desc = "Gladiator Jackpot Slot Review (".date('Y').") - Learn more about this gladiator-based slot game by Playtech. Find out more about the progressive jackpot available.";

$slotName = 'Gladiator Jackpot';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 13663
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
            <h1 class="title title--h2">Gladiator Jackpot Slot Review</h1>
            <p>
              A follow on from the original, Gladiator Jackpot is essentially the same, however it now comes with an exciting progressive jackpot. This game, based on the wildly successful cult movie, is a cinematic experience from start to finish. Playtech's
              masterpiece of slot making ingenuity has captivated Canadian gamers unlike any other. With not only
                one, but two bonus features, Gladiator gives players the chance to prove their worth in the slot arena. The question is - will you leave with a
              thumbs up, or a devastating thumbs down?
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/gladiator-jackpot.png" class="review-game__img" alt="Gladiator Jackpot" width="200" height="139">
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

      <div class="review__text-block type-display-flex type-flex-justify-between type-margin-bottom">
        <div class="type-left-side">
          <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
          <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
          <h2 class="title title--h2">Exploring the Theme</h2>
          <p>This slot really dives in deep into the Gladiator theme; your gaming experience is augmented with bonus clips from the movie. Fans of the hit film will appreciate the haunting and dramatic soundtrack of the slot, and will recognize the character
            symbols on the reels - particularly the infamous emperor. Bagging 5 of the emperor, played by Joaquin Phoenix, will land you an instant top jackpot, so keep your eyes glued on him! Even though this isn't the main event, the progressive, it is
            still enough for you to leave the casino smiling. Let's take a look and find out what it takes it get you into the Colosseum Bonus feature.</p>
          <h2 class="title title--h2">Bagging the Bonus Prizes</h2>
          <p>In order to attain entry into the Colosseum bonus round you first need to hit 3 colosseum symbols in the base game. Once inside you will find a 5 by 4 columns made of stones. Pick one box from each row. Choose wisely, as your decisions will affect
            your bonus round. The first row gives you free spins, the second is your multiplier, the third row tells you which symbol will be the additional scatter symbol in the bonus round, and the final row determines which character symbol will temporarily
            turn into a wild. Right, weapons at the ready? Enter the round and let the battle of the bonus round begin!</p>
          <p>Once inside, make sure you are still keeping a close eye on the Emperor symbol. His presence on the middle reel gifts you with additional free spins, so you can keep playing for more cash. The other bonus game, the the Gladiator Jackpot Bonus,
          round can be activated either inside this mini game, or in the base game itself. You need 3 Gladiator helmets on the second, third and fourth reels to activate this feature. This game is another selection based games. To win the progressive
          jackpot you need to turn over 9 Golden Helmets. Easy right? If only we could all be so lucky!</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('gladiatorjackpot', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">The Overall Verdict</h2>
          <p>Expert players should be sure to make use of the expert player mode, where you can trigger the reels automatically - perfect for when you want to hit up several slot games at once and optimize your time.</p>
          <p>All in all, this is an exciting, immersive experience, that will keep you on the edge of your seat, just like the movie. If you love suspense, drama and cash prizes, and a potentially life changing progressive, then then we think you will love
          this game. The game is available to play on mobile, tablet, Macbook or PC - so no matter your device you will experience smooth and flawless gameplay.</p>
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
