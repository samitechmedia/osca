<?php
$title = "Cat Queen Slot Review (".date('Y').") - By Playtech";
$desc = "Cat Queen Slot Review (".date('Y').") - Learn more about Playtech&apos;s exciting Egyptian-themed slot machine. Discover more in-game features including bonus rounds!";

$slotName = 'Cat Queen';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 5550
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
            <h1 class="title title--h2">Cat Queen Slot Review</h1>
            <p>
              Egyptian themed slots are a strong favourite in the slot machine world. There's something about that sense of hidden riches, and of puzzles, and worthy adventurers that just evokes something exciting. If there are plenty of Egyptian themed slots
              out there to choose from - does Playtech's Cat Queen have what it takes to compete?
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/cat-queen.png" class="review-game__img" alt="Cat Queen" width="200" height="139">
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

      <div class="review__text-block type-display-flex  type-flex-justify-center-top">
        <div class="type-left-side">
          <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
            <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
          <h2 class="title title--h2">Brilliant Base Game</h2>
          <p>
            We found it to be a truly entertaining slot, with a base game that seems like it's just giving it away. It's more than possible to win big with C$4 bets a spin, and 17 paylines active. Hit the right symbols and you can and win over C$800 in just
            a few rounds, which is an outstanding amount for a base game slot. Keep reading to find out more information about the elusive Cat Queen, how to play, and the best casinos to play it on it Canada.
          </p>
          <h2 class="title title--h2">Symbols of Power</h2>
          <p>
            The symbols feature a selection of recognizable Egyptian deities. There is Seth and the son of his brother and mortal enemy, Horus. Bastet also features of course, a Goddess with the head of a cat. Other Egyptian archetypes also make up the remainder
            of the symbols, including The Eye of Horus, the Ankh and a Scarab beetle. The Pharaoh, half man and half God, is the highest paying symbol on the reels. If you get 5 of these in an active payline, you win 200 times your original bet. The Cat
            Queen is the powerful yet capricious Wild symbol, that can gift you with the combination of a lifetime, or leave you hanging in the dust with nothing. Finally, there is the Scatter symbol, a pyramid, which triggers the three spins round if you
            land three or more in one spin.
          </p>
          <h2 class="title title--h2">Free Spins Round</h2>
          <p>
            In the free spins round there are no multipliers, which is a bit disappointing, and really the only benefit it the chance to get something for nothing. More free spins can be triggered during the round, extending your chance at earning more money,
            but that's all. The game also has the gamble feature, which allows you to win double or nothing of your most recent win by playing a higher card than the dealer.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('catqueen', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">The Verdict From Our Expert</h2>
          <p>
            While this game has an extremely strong base game, the bonus round doesn't compete with some of the other slots out there, making it a bit disappointing. However, for those who like their slots simple and their wins modest, but regular, this one
            is for you. It is one of the better games for you to always stay above your bank roll. While there;s no progressive to aim for, this offers a more realistic chance at the top prize, and is a safer bet.
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
