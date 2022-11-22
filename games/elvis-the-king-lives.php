<?php
$title = 'Elvis The King Lives Slot Review (' . date('Y') . ')';
$desc = 'Elvis The King Lives Slot Review for ' . date('Y') . ' - Join The King of Rock and Roll in this Presley-inspired slot game. Learn about jackpot features &amp; bonus rounds!';

$slotName = 'Elvis The King Lives';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7638
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
            <h1 class="title title--h2">Elvis The King Lives Slot Review</h1>
            <p>
				Las Vegas is the worldwide capital for slot machines, and who is better known for their connection to Sin City than the King himself, Elvis? With the glitz and glamour of online slots, the connection is undeniable. In Elvis The King Lives, Williams Interactive has brought all of the excitement of gambling on the Vegas strip right to your home computer. The interface is completely Elvis themed, from the symbols to the graphics and even the music playing in the background. Read on to learn more about this slots game from game developer WMS and its innovative features and bonus rounds.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/elvis-the-king-lives.png" class="review-game__img" alt="Elvis The King Lives" width="200" height="139">
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
			<h2 class="title title--h2">Symbols on the Reels</h2>
			<p>This slots game from WMS is similar to their other online slots in that it has a unique configuration of the reels. You won't usually find the standard five by four reel set up in <a href="/software/williams-interactive" class="text--link" title="Williams Interactive games">Williams Interactive games</a>. In Elvis The King Lives, you get 11 reels and can win on up to 80 paylines. The more paylines you play, the better your chances of winning. WMS is known for offering way more ways to win than other developers – most slots online have about 20 paylines at most. The game is set up with two reel sets – one that is 2 x 2 and one that is 3 x 6. In order to win, you must line up two adjacent symbols on one of the smaller reels, and then an identical symbol or a Wild card on the first reel in the larger reel set. </p>
			<h2 class="title title--h2">Awesome Game Features</h2>
			<p>This game is based on Elvis's stage persona and performance presence. You will find symbols like blue suede shoes, a guitar, a hunk of love, a purple teddy bear, and even a hound dog. Anyone who is familiar with Elvis's greatest hits will recognize those symbols right away. In keeping with Las Vegas style slots, this game also has the classic card symbols – heart, diamond, spade and club. There is a free spins bonus feature which can be triggered by either lining up four matching symbols on reels 1 – 4 or 5 – 8, or you can line up the Elvis disc symbol on reels 9, 10 and 11. You get five free spins in this bonus feature, and if you are able to line up symbols on either reels 1 – 4 or 5 – 8 during your free spins, you will be rewarded with 100x your bet amount. </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('elvis-the-king-lives', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Elvis The King Lives in This Bonus Slots Round</h2>
			<p>The special bonus round in this game is called the Jukebox. This feature can be triggered before your free spins start rolling. A jukebox pops up on your screen with four Elvis songs to choose from. You get to choose your favourite song and win up to 25x  your bet amount. If you choose Hound dog,  you win 25x your bet and 10 extra spins. Choose Teddy Bear and you will get 12x your bet and 5 free spins. Blue Suede shoes will award you 12x the bet amount and 5 additional spins, while Big hunk o love gives you 8x payout and 5 free extra spins of the reels. </p>
			<h2 class="title title--h2">Our Final Thoughts - Elvis The King Lives Slots Conclusion</h2>
			<p>Elvis The King Lives is another fun slots game from Williams Interactive. It seems confusing at first because of the unique layout of the reels, but once you play a few rounds you will get the hang of it easily. This is why we always recommend players to try out games for free before committing to real money game play. The graphics in this game are not stupendous like you would see in some other video slots, but it is an exciting and lively slots machine that would fit right in at any Las Vegas casino.</p>
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
