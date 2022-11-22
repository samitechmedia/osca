<?php
$title = "Wizard of Oz Ruby Slippers Slots - " . date('Y') . " Slot Game Review:";
$desc = "Wizard of Oz Ruby Slippers Slots " . date('Y') . " - Have fun with this hugely popular online slot game. Check out our review to get your FREE welcome bonus!";

$slotName = 'Wizard Of Oz Ruby Slippers';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7704
  };
</script>

<div id="arcade-game-review">
<section class="section review__section type-section-padding-bottom"  id="freeGame">
  <div class="container">
    <div itemscope="" itemtype="http://schema.org/Review">
    <?php
      include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
    ?>
      <div class="review-game__information">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-8">
            <h1 class="title title--h2">Review of WMS Slots Wizard of Oz Ruby Slippers Game</h1>
            <p>
            Williams Interactive has come up with the perfect slots game for any Wizard of Oz lover. If you are a fan of this classic American movie, you are definitely going to love Wizard of Oz Ruby Slippers slots. In this game you will find all of your favourite characters &ndash; from Dorothy and Toto to the Cowardly Lion  and all of the witches. This game is a video slot machine, so you can expect all of the exciting graphics and features that go along with video slots game play. There are the standard five reels and up to 30 paylines for you to bet one, giving you way more chances to win than in a regular slots game. You even have tons of bonus features that can be triggered while you play &ndash; read on to learn more about these features!
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/wizard-of-oz-ruby-slippers.png" class="review-game__img" alt="Wizard of Oz Ruby" width="200" height="139">
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
    <div class="review__text-block type-display-flex type-flex-justify-center-top">
      <div class="type-left-side">
        <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
        <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
        <h2 class="title title--h2">Wizard of Oz Ruby Slippers – Reels and Symbols</h2>
        <p>
        Wizard of Oz Ruby Slippers is a fantastic and gorgeous slots game as can be expected from WMS video slots. It features beautifully designed reels and symbols that take you right into the world of the Wizard of Oz movie. The symbols you will find on the reels include Dorothy, the Wicked Witch, the Tin Man, the Scare Crow, the Cowardly Lion, Glinda the good witch, the Wizard of Oz, Dorothy's Basket, an Hourglass, a Red Apple and a Pink Lollipop. Even the music in the background and the game sound effects add to the effect of putting you right there in the movie with these well-loved characters.
        </p>
        <h2 class="title title--h2">Bonus Features for Dorothy and Toto</h2>
        <p>
        Great graphics and fun symbols aren't the only thing you have to look forward to in this game. What really makes this slot machine special re its bonus features. There are an outstanding 45 ways that you can trigger bonus features in this game, meaning just about every spin has the chance to set one off! Here is an overview of some of the very best bonus features you will find in the game. First of all,there is the Wizard of Oz Wild symbol. This replaces all other symbols for the highest payout on any payline you are betting on. The Ruby Slippers feature turns an entire reel Wild – up to four reels at a time – and features a 2x or 5x multiplier as well. If Glinda appears on the screen during this feature, she makes the multiplier increase up to 10x! There is also a re-spin feature and free spin triggers to take advantage of.
        </p>
      </div>
      <div class="type-right-side">
        <?php echo getCasinoBlockHTML('wizard-of-oz-ruby-slippers', 'game-images'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-6">
      <h2 class="title title--h2">Bonus Features Along the Yellow Brick Road</h2>
        <p>
        In addition to all of the in-game bonus features, there is also a special bonus game within a game that you can trigger while you play Wizard of Oz Ruby Slippers. This bonus game is called the Find the Broom bonus round. When you trigger this round, you get to turn over brooms symbols in order to win multipliers. If you pick the right broom, you can even win a 50x multiplier and pour a bucket of water over the Wicked Witch! During this round, if you see the crystal Ball you will get additional credits as your reward. If you see the Emerald City Feature, you will get free spins, and each character you see during your free spins gives you additional prizes.
        </p>

         <h2 class="title title--h2">Final Thoughts – Our Conclusions about Wizard of Oz Ruby Slippers</h2>
        <p>
        Wizard of Oz Ruby Slippers is a great game not only for Wizard of Oz lovers, but for anyone who loves a good slots game. It has a ton of bonus features, with up to 45 ways to trigger them. You have multipliers, bonus rounds, wild, and free spins waiting around every corner. This is definitely not a slots game that you want to miss out on!
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
