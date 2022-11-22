<?php
$title = "Battleship Slots Review [".date('Y')."] - By IGT";
$desc = "Battleship Slots Review for ".date('Y')." - Discover more about this battleship-themed slot machine by IGT. Find more info on bonus rounds &amp; jackpots!";

$slotName = 'Battleship';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 8984
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
            <h1 class="title title--h2">Battleship Slots Online Review</h1>
            <p>
              All at sea over what slot to play next? Maybe its time to give the five reel, forty payline,
                Battleships a spin? Brought to you by IGT, International Gaming Technology, this slot is based on the classic board game of the same name that most remember from dreary wet Canadian winter afternoons spent with grandpa. Unlike the original, this slot doesn't require pen, paper nor an ageing relative, and sadly little except the graphics and name have much to do with the original game, except the Bonus round. But fear not, this slot still has the potential to provide hours of entertainment, especially on long dark nights.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/battleship.png" class="review-game__img" alt="Battleship" width="200" height="139">
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
          <h2 class="title title--h2">Wilds and Multipliers</h2>
          <p>
            Unlike the weather forecast that normally accompanies a game of Battleships, players look out over a tranquil sea complete with a setting sun, thanks to the transparent grid. If you’re a fan of military themed games, then you are going to appreciate this one. The graphics are spot on visually, if a little retro, and cover all the icons you would hope to see. Basic symbols include the usual 9, 10, Jack, Queen, King and Ace, while higher value symbols include a helicopter, a medic, a pilot, a fighter plane, a naval captain and a navy battleship of course! The battleship is the Wild symbol in this slot, and if it appears twice in a winning combination, a 2x multiplier is awarded. It also can substitute all other symbols, except for the Bonus symbol, helping players line up winning combinations. A final feature of the Wild is that it can come stacked yet again, aiding players to make winning combinations on the reels.
          </p>
          <h2 class="title title--h2">Scatter Symbol and Free Bonus Game</h2>
          <p>
            Keep your eyes peeled for the Bonus Scatter symbol, easily identified with the word ‘Bonus’ plastered across it, as three or more of these anywhere on the reels gains you entry to the slot’s Victory Bonus round. It is here that players can finally
            relive a little of the pastime they used to know – the game that requires shouts of, “You sunk my sub”. In the bonus round five battleships appear along with a number of missiles, depending on how many Bonus symbols you found to activate the
            round. If three symbols are gained you will be armed with two missiles, if you get four symbols you will be armed with three missiles and if you bag five, the full five missiles will be handed over. Each battleship is then auto-targeted by the
            game. Every battleship destroyed awards the player with a certain number of Free Spins, a Free Spins Multiplier or a cash bonus. Free spins are then played out with whichever value multiplier you have managed to amass.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('battleship', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Our Verdict</h2>
          <p>
            Overall, Battleship is a solid game, which will appeal to players who have a soft spot for the classics. Don’t get us wrong there is excitement to be had here – the graphics are what you hope for, the animations are good and there are plenty of themed sound effects. There is potential for this slot to be a good earner too, but just like real warfare this game is win or lose. It’s not going to be easy capturing the big bucks, but those lucky enough to pull through will be on top of the world.
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
