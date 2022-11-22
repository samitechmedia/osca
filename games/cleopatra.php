<?php
$title = "Cleopatra Slot Review (" . date('Y') . ") - By IGT";
$desc = "Cleopatra Slot Review " . date('Y') . " - Take a step back into ancient Egypt with IGT&apos;s popular Cleopatra slots. Find out more about bonus rounds &amp; the huge jackpot!";

$slotName = 'Cleopatra';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2342
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
            <h1 class="title title--h2">Cleopatra Slot Review</h1>
            <p>
              Cleopatra is somewhat of a Grandad in the slot machine world. It's been around for a while. It may not
                have all the frills that some other newer games provide, but it's a firm favourite for a reason - this is a fantastically solid game which holds
              its own and has rightfully gained a very strong Canadian following. In fact, it is arguably one of the most popular slot games of all time both on the ground in brick and mortar casinos, as well as online.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/cleopatra.png" class="review-game__img" alt="Cleopatra" width="200" height="139">
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
          <h2 class="title title--h2">General Overview of Cleopatra</h2>
          <p>
            Brought to you by the renowned <a href="/software/igt">IGT</a> (International Gaming Technology), Cleopatra is a five reel, twenty payline slot machine, which, as you have probably gathered from the name, has an Egyptian theme. This slot follows a classic format and as such
            limits the amount of time needed to figure it out. To play you simply need to make a bet, anything from 0.01 to 5.00 coins a line. For every coin you put in another payline is enabled. The reel spins and once it has stopped, the computer checks
            the combination of symbols along each of the enabled paylines. As you would expect, the symbols use an Egyptian theme, and in some ways are much like any other similarly themed slot. Here the lowest paying symbols include the high playing card
            icons, while the Eye of Ra, the Crook and the Flail are more valuable; the Lotus, the Scarab Beetle, the Cartouche and Cleopatra herself are worth the most money.
          </p>
          <p>
            There are a number of special features to this game, including the Wild Multiplier symbol, Scatter symbols and a Cleopatra Free Spin Bonus game with 3x multiplier for all winning combinations, giving a maximum jackpot of £100,000.
          </p>
          <h2 class="title title--h2">The Wild Multiplier, The Cleopatra Bonus and More Specials</h2>
          <p>
            So first up is the Wild Multiplier symbol. This takes the form of Cleopatra herself, so as well as being one of the most profitable symbols, this icon is also the multiplier. When she appears winnings are doubled, although do bear in mind, the
            wild icon does not necessarily help a player complete a high winning payline.
          </p>
          <p>
            The next special to be aware of is the Cleopatra Bonus – take note as these fifteen free spins can be highly profitable! To trigger it three or more Sphinx scatter symbols need to appear in a single spin, and only then is the player awarded the
            lucrative free spins. During this round, all payouts are tripled, except on the occasion that the player also collects five wild icons. Unlike some slots players are able to retrigger free spins during a free spin bonus round. However there
            is a maximum of 180 free spins, and after that the free spin rounds come to an end regardless of how many Sphinx scatter symbols appear. Likewise the free spins round is also over once the player’s free spin counter has reached zero. A good
            thing to be aware of here is that while normally all symbols pay left to right in consecutive order, the Sphinx scatter symbol pays any.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('cleopatra', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding-bottom">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">The Incredible Jackpot</h2>
          <p>
            The last feature of this slot is the Cleopatra Jackpot, worth a whopping 10,000 coins. To win players need to line up five of the wild icons; that’s five Cleopatra symbols just incase you have forgotten. For those lucky players that manage to
            do this and happen to be playing with the maximum wager when they hit the jackpot, this slot suddenly becomes worth £100,000, a mighty sum for a non-progressive slot!
          </p>
          <h2 class="title title--h2">The Final Word</h2>
          <p>
            So despite the fact that there are a fair few Ancient Egyptian themed slots out there, and the stereotypical icons and graphics don’t necessarily stand out, Cleopatra trumps other similar slots hands-down with it style and gameplay. With free
            spins aplenty, lucrative top playing symbols and scatter pays all around, this slot brings the excitement. Plus, lets not forget Cleopatra boasts one of the largest standard jackpots in the online slot world! No wonder IGT’s Cleopatra has stood
            the test of time and proven itself as a truly brilliant classic.
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
