<?php
$title = 'Black Knight 2 Slot Review - By Williams Interactive';
$desc = 'Black Knight 2 Slot Review ((' . date('Y') . ')) - Discover more features about this medieval-themed slot machine by Williams Interactive. Learn more about jackpots &amp; bonuses!';

$slotName = 'Black Knight 2';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7624
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
            <h1 class="title title--h2">Black Knight 2 Slot Review</h1>
            <p>
				Black knight 2 is the much anticipated sequel to the WMS slot machine Black knight. The original Black Knight was a five reel, 30 payline slots that brought you into medieval times when Kings and Queens ruled and Knights defended the honor of fair maidens. Black Knight 2 takes place in this same world, and expands upon it with enhanced graphics, more paylines and fun sound effects. This game will keep you entertained and satisfied for hours upon end, and comes loaded with all of the bonus features you have come to expect from Williams Interactive slots games. Read on and we will tell you all about th features of this game.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/black-knight-2.png" class="review-game__img" alt="Black Knight 2" width="200" height="139">
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
			<h2 class="title title--h2">Medieval Fantasy Symbols and Reels </h2>
			<p>
				As you can imagine, Black Knight 2 takes place in a fantasy medieval setting. There are castles, kings, queens, jesters and all of the tools of the trade you would expect from a knight, like his weapons and shield. The sound effects as well are designed to make you feel like you are in Arthurian times with all of the knights and ladies. The symbols you will find in this game all relate to this central theme. There is a king, a lady, a court jester, the black knight himself, a scepter, as shield, and the classic card symbols as well.
			</p>
			<h2 class="title title--h2">Black Knight 2 - A Classic Vegas Style Slots game</h2>
			<p>
				You may remember form Black knight that there are not a whole lot of bonus features in the game. Black Knight 2 is much the same. It is a standard slot machine that has standard features, but nothing flashy like you see in video slots. This is not a negative in our opinion, however. Online slots developers are constantly competing with each other and trying to outdo each other with increasingly complex slots features, layouts and bonus rounds. Sometimes you just want a regular, easy to play, Vegas style slots game, and Black Knight 2 is just that. You don't need all the bells and whistles to have a great time playing Black Knight 2.
			</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('black-knight-2', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Wilds, Bonuses, Free Spins and More!</h2>
			<p>
				Black Knight 2 does have all of the bonus features that you expect when you play a Vegas Style slots game. The Black Knight himself is the Wild symbol, and he substitutes for every single symbol on the screen, even the bonus feature symbol. He appears on the middle three reels, and substitutes for the highest payout possible in any of the 40 paylines. There is a free spins round that can be triggered by lining up any of the Feature symbols. The wild symbol stays locked in during your free spins, and the wilds expand to cover an entire reel whenever you line one up. When you see the Black Knight on reels 2, 3 and 4 and you have free spins running, that is when you really rake in the cash!
			</p>
			<h2 class="title title--h2">Game Conclusions - Final Thoughts on Black Knight 2 </h2>
			<p>
				We love <a href="/software/williams-interactive" class="text--link" title="Williams Interactive games">Williams Interactive games</a>, and the Black Knight series is a real crowd pleaser. It has stacked wilds, bonus free spin rounds, and all of the excitement of kings, queens and medieval knights. You will have a great time playing this classic, five reel, 40 payline slot machine.
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
