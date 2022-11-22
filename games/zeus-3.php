<?php
$title = 'Zeus 3 Slots ' . date('Y') . ' - Expert Review Of The Zeus 3 Slot Game';
$desc = 'Zeus 3 Slots ' . date('Y') . ' - Find the low-down on Zeus 3 one of this year\'s most popular online slots games, with huge progressive jackpots.';

$slotName = 'Zeus 3';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7712
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
			<h1 class="title title--h2">Review of the Online Slots Game Zeus 3</h1>
			<p>Here is the latest slots game in the Williams Interactive (WMS) Zeus Slot Machine series. This game is an excellent choice for anyone who loves Greek Mythology of course, featuring the king of all kings, the ultimate in power, Zeus himself. There are six reels and 192 paylines, giving you so many chances to win that you will feel like a Greek god yourself! The Zeus Slot machine is incredibly popular among WMS fans, and it is easy to see why. Zeus is one of the most popular and well-loved slots of WMS&apos;s entire repertoire so it makes sense that they would want to continue that momentum with more updates and newer versions of the game. This is great for you as a player because you get to experience the improved graphics and features in Zeus 3. Let&apos;s move on to the game details. </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/zeus-3.png" class="review-game__img" alt="Zeus 3" width="200" height="139">
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
			<h2 class="title title--h2">Zeus 3 Reels and Symbols</h2>
			<p>As far as graphics go, the Zeus 3 slots game is far superior to its predecessors. Williams Interactive definitely pulled out all of the stops to develop a gorgeous, smooth and seamless experience for player in this game. Not only that, you get to play 192 paylines at once in this game. In online slots, that number of paylines is almost unprecedented, with most games offering no more than 20 paylines per spin. The potential that you have to win in this game far outshines most other slots games, including Zeus the original. You will see familiar Greek mythology symbols on your screen as you play, including Zeus's thunderbolt, Zeus himself, his ship, a Greek vase, the classic card symbols and more. </p>
			<h2 class="title title--h2">Special Zeus 3 Bonus Features</h2>
			<p>One of the things that makes Zeus 3 so special is the game engine. The original Zeus game was powered by <a href="/software/williams-interactive" title="Williams Interactive">Williams Interactive's</a> G+ Game Engine, which at the time it was develop was considered high tech but nowadays has been left in the dust. Zeus 3 is powered by the iGaming Reel Boost Game Engine. When compared with G+ and other gaming engines, Reel Boost is considered to be very intense and high risk. This makes it an awesome choice for players who love an exciting game.</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('zeus-3', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Extra Bonuses Inside the Game</h2>
			<p>The configuration of the reels in Zeus 3 is like nothing else we have seen. There are six reels, but each reel has a different number of potential symbols that you can land. You get 2 symbols on the first reel, and the number increases as you move right, until you get to the sixth reel which has 7 symbols. This means if you line up symbols on the sixth reel you are in for huge wins.  To activate the free spins bonus round, you need to line up at least three Zeus Thunderbolt symbols. You can win up to 50 free spins with this feature, if you are able to hit five scatter symbols while spinning. You can also retrigger the free spin feature to keep it going even longer. The wild symbol is the man himself, Zeus. If you line up a full reel of Zeus heads, the reel will turn into a huge stacked wild. </p>
			<h2 class="title title--h2">Review Conclusion – Our Final Thoughts</h2>
			<p>Overall, we consider Zeus 3 to be an exciting and excellent game to choose. It has everything we love in a good online slot machine. There are bonus features, free spins, tons of ways to win, and a unique layout. WMS loves to innovate with their games, and it makes for a really great game play experience. We definitely suggest checking out Zeus 3 if you love exciting and fast paced slots. You won't be disappointed! </p>
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
