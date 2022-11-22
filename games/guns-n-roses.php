<?php
$title = "Guns N' Roses Slot Game - Play Free! (No Download)";
$desc = "Play Guns N&apos; Roses Slot Machine for FREE ➤ No Download Needed ➤ No Registration ➤ Zero Ads. Play for Fun! (Instant Gameplay)";

$slotName = 'Guns N Roses';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 4357
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
            <h1 class="title title--h2">Guns &amp; Roses Slots: Is it Rocking?</h1>
            <p>
              For an online slot with a wild streak (as well as tons of wilds and wins) you can't go wrong with NetEnt developed Guns &amp; Roses online slots. Choose your soundtrack from a superb back catalogue of all your favourite classic rock hits and
              spin the reels for real Canadian dollars.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/guns-n-roses.png" class="review-game__img" alt="Guns N Roses" width="200" height="139">
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
          <h2 class="title title--h2">Control The Tunes You Play To</h2>
          <p>The stage is set for you to spin the reels and cash in on this Guns &amp; Roses themed online slot game from NetEnt. The first in their two musical tribute casino slot games (the other being Jimi Hendrix slots), this original dedicated to
            one of rocks legendary groups will have you head banging along as you play for big bucks. Set your bets, and the coin level by line, or opt all in and play with the Max Bet button to gamble with the highest possible stake. One thing's for
            sure, playing Guns &amp; Roses online slots is sure to bring out the wild side in you, as well as help you to remember what it was that rocketed this band to the music hall of fame, as you play against a soundtrack of their greatest hits.</p>
          <h2 class="title title--h2">Do You Have An Appetite For Destruction?</h2>
          <p>There are plenty of free play versions of this rock-inspired slot game online, or if you're ready to play with real cash for the change to win some big Canadian dollars just sign-on to any NetEnt casino online and get started.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('guns-n-roses', 'game-images'); ?>
        </div>
      </div>
      <p>What's great about Guns &amp; Roses online slots (besides the amazing soundtrack which you can control), is the fact the game offers multiple playing modes and features. So whether you want to go for wilds or opt in for free spins, Guns &amp;
              Roses slots has got you covered. Once you've set your bet levels, you can alter the coin value you choose to bet (up to a maximum 200 coins) and then you're ready to spin the reels and try your luck.</p>
      <p>Wild symbols in this slot can crop up at any time, anywhere (except reel 3 during the Appetite for Destruction mode), and even expand vertically to give you more chances to win. They replace all other symbols on the reels bar the bonus ones,
              to give you maximum paylines. Another random feature is the Legend Spins which offer you free re-spins combined with up to 2 stacked wild reels on top. While the Appetite for Destruction wild takes the shape of the iconic Guns &amp; Roses
              album cover artwork when it appears.</p>
      <p>In addition to the free spins and wilds, our Guns &amp; Roses online review showed multiplier features and bonus rounds. So, if it's variety you enjoy when playing at an online gambling slot then you're well catered for with this legendary
              rock incarnation of the classic slot game.</p>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Guns &amp; Roses: Take It On Tour</h2>
          <p>Like all NetEnt developed online slots Guns &amp; Roses is available in a mobile version that's perfectly compatible with the leading smartphone devices, from iPhone through to Android. It comes available on the NetEnt Touch platform, so it's
            specifically optimized with smartphone touch technology in mind. Making it one of the top performing mobile slots for online casino gaming on the move in Canada.</p>
          <h2 class="title title--h2">A Guns N Roses Online Review - Is It Worth Your Time?</h2>
          <p>You don't have to be a die hard fan to get on with this online slot (but of course it doesn't hurt if you are). The multitude of in-game features, and the randomly generated wilds &amp; re-spins are enough to keep the game play on the edge
              of your seat. It's definitely one that keeps you entertained for hours, during our Guns N Rosees review we found the multipliers and bonus rounds definitely contribute to seeing your payroll rise. Which, at the end of the day, is what it's
              all about. The jackpot is smaller than some similar style slots in the NetEnt portfolio, but the frequency of other smaller wins, more than makes up for this.</p>
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
