<?php
$title = "Black Widow Slots Review ".date('Y')." by IGT";
$desc = "Black Widow Slots Review (".date('Y').") - In this review, we take a closer look into this popular slot machine by IGT. Find out more bonus rounds &amp; jackpots.";

$slotName = 'Black Widow';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 731
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
            <h1 class="title title--h2">Black Widow Slots Review</h1>
            <p>
              Don't freak out, Black Widow takes its name more from the 1987 Hollywood thriller featuring Debra Winger as a scheming female lead than the deadly spider itself. Thank goodness, as few people want to see too many creepy spiders crawling up their  screen! Developed by the slot making hot-shots IGT (International Game Technology) Black Widow is currently one of finest five reel, forty payline slots out there at the moment, featuring a handful of unique features. You'll especially love it if you count yourself among the low-to-medium denomination players and like some exciting gameplay.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/black-widow.png" class="review-game__img" alt="Black Widow" width="200" height="139">
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
          <h2 class="title title--h2">Investigating the Theme</h2>
          <p>
            As you guessed by the name, there is something dark going on here. The narrative behind this slot follows the tale of powerful murderess who seeks out wealthy middle-class men, driven by the desire to strip them of everything they’ve got, including
            their lives. On the reels players come face-to-face with dark mysterious beauties and the doomed male victims. The soundtrack has a creepy beat inline with the visuals. A heavy bass dominates here, while a low metallic hum can be heard at the
            reels spin. The game graphics are good, especially the illustrated characters, and so too is the sonic experience, but then again that’s what we have come to expect from IGT!
          </p>
          <h2 class="title title--h2">Introducing the Symbols and Bonuses</h2>
          <p>
            The lower value symbols are represented by the standard playing card symbols, while the high value ones include a vial of poison, the three male victims, and the protagonists herself: the Black Window. The Black Widow game logo acts as the game’s Wild card. This symbol is always one to keep an eye out for, as five of these beauties in a row wins you the 1,000 line bet jackpot. Plus, it has the power to substitute for all standard symbols other than the Scatters.
          </p>
          <p>
            One of the unique specials, not often seen among IGT slots, is Black Widow’s Super Stack feature. At the start of every spin, a stack of symbols are added to the reels. This increases the player’s chances of hitting some tasty multiple symbol combinations across all available paylines and paying out well in the process.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('blackwidow', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Selective Stacking Unique Feature</h2>
          <p>
            The Selective Stacking feature is another unique special. This locks the wild symbol on every spin for greater payouts and exciting play. Another highly profitable element in Black Window is the Web Capture feature. When a player manages to “capture” the female protagonist on the centre reel, then a win is awarded, based on the value of the three meters for that spin. The three male victims can also be captured on the centre reel, similarly paying the value of that meter. Plus each character has an assigned multiplier which increases with each capture. If you capture the murderess, the game plays out a little differently, paying the combined multipliers of the other characters and increasing all three. Admittedly this feature is hard to come by, but when it does the payout is big enough to put a smile on your face.
          </p>
          <p>
            To access seven free spins and the bonus Web Capture round as we mentioned above you need to land the green vial of poison symbol (the scatter symbol) across reels two, three and four simultaneously. Once the free spins are triggered you are able to re-trigger them up to thirteen times, giving you a healthy total of 91 free spins.
          </p>
          <h2 class="title title--h2">Our Verdict</h2>
          <p>
            Yes it can be tricky to trigger the features, and some of the pay-table has been trimmed to account for the features prize-winning potential, but with special features such as the Super Stack, Selective Stacking and Web Capture, Black Widow offers a hell of a lot of action on the reels and much to like about this game. There is a uniqueness to it that other games don’t always offer and maybe this is why it has continued to lure in more and more players, since its launch in 2014.
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
