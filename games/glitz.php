<?php
$title = 'Glitz Slot Review (' . date('Y') . ') - By Williams Interactive';
$desc = 'Glitz Slot Review for ' . date('Y') . ' - We take a look into this jewel-inspired slot game by Williams Interactive. Find out more about bonus rounds &amp; paylines!';

$slotName = 'Glitz';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7645
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
            <h1 class="title title--h2">Glitz Slot Review</h1>
            <p>
				Glitz is an exciting and glamorous diamond and jewel themed slots game by world famous slots developers Williams Interactive.  This game features the WMS Money Burst Layout and has five reels and 60 paylines for you to bet on. This means you have 60 chances to win every time you spin the reels . There are bonus features galore, including Wilds and free spins. The Money Burst reels layout is unique to <a href="/software/williams-interactive" class="text--link" title="Williams Interactive">Williams Interactive</a>. It features two symbols on the first and second reels, and four symbols on the third, fourth and fifth reels. This makes it a bit more challenging and exciting for experienced players, or anyone who likes to try something new. Read on to learn more about this glamorous slot machine!
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/glitz.png" class="review-game__img" alt="Glitz" width="200" height="139">
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
			<h2 class="title title--h2">Riches and Jewels on the Glitz Slots Symbols</h2>
			<p>Gemstone themed games area a popular form of online entertainment. You may remember the game Bejweled and how popular it became seemingly overnight. This is because the jewels on the screen remind players like you what they are in for when they play these kinds of games - massive wins! Glitz is definitely a game that follows this line of thinking. It really gets you in the mood to win tons of real cash prizes when you see the luxurious and beautiful symbols on your screen. There are Diamonds, Emeralds, Sapphires, Pearls,, Topaz and Citrine stones on the reels and they all sparkle with realistic and beautiful style. </p>

			<h2 class="title title--h2">Glamorous, Glitzy Bonus Features</h2>
			<p>The best part of this glitzy game is that you get a special bonus when you choose your paylines. Usually, you have to pay for each individual payline that you want to play on. When you play Glitz, you get to play two for one, meaning you pay for one payline and play on two. This means you can bet on all 60 paylines for the same bet amount as you would normally pay in a 30 payline game, giving you double the chances to win! You can play for between one cent and three dollars per coin, giving you tons of ways to customize your spins in this exciting slots game. </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('glitz', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Even More Great Bonuses</h2>
			<p>The Wild symbol in glitz is a Diamond with the word Wild written on it - you can't miss it! The Wild symbol can replace just about every other symbol in the game. The only exception is that, like in other WMS games, it cannot replace the Scatter symbol. Wilds always pay out the maximum combination of symbols when you spin one on the reels. You will also come across three different free spins features when you play Glitz. First, you can get 20 spins by matching four symbols on the first two reels, along with three Coin Scatters on the remaining reels. You may even get to open a jewelry box to pick a special prize. You can re-trigger the free spin feature for an additional five spins if you bring up three coins during your first 20 free spins. You can also get five free spins in the regular game by lining up three coins on the final three reels, or by matching any four symbols in the first two reels. </p>
			<h2 class="title title--h2">Conclusion - Our Overall Opinion of Glitz Slots </h2>
			<p>Overall, we would rate Glitz as a highly enjoyable slots game and definitely recommend it for you to try out. There are bonus features such as Wilds and Free Spins, it has an exciting layout that is unique to WMS, and you get to double up on your paylines with their special two for one feature. The graphics are gorgeous as well, and the whole game has a glamorous feeling to it while you are playing. This is exactly what we look for in a great slots game.</p>
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
