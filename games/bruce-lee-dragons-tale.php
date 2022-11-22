<?php
$title = 'Bruce Lee Slots Review (' . date('Y') . ') - Dragon&apos;s Tale';
$desc = 'Bruce Lee Slots Review ((' . date('Y') . ')) - Inspired by the Jeet Kune Do legend Bruce Lee, learn more about slot features in this martial arts based slot machine!';

$slotName = 'Bruce Lee Dragons Tale';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 7627
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
            <h1 class="title title--h2">Bruce Lee Dragon&apos;s Tale Slot Review</h1>
            <p>
				Branded slot machines are one of the most popular ways to play slots online. You will find a slot machine for just about everything, from comic book characters to movies and even music stars. Well, it is time for Bruce Lee to get in on the action with Bruce Lee Dragons Tale by WMS. Here is a five reel, 80 pay lines slots game that will keep you coming back for more. It is just as exciting as any Bruce Lee movie, with symbols and bonus features that call to mind Chinese dragons, kung fu and all of your favourite Bruce Lee movies and martial arts moves. The graphics are top notch and incorporate Chinese themes, as are the sound effects, giving this game an overall atmosphere of rich Chinese culture and history, a popular theme for online slots. Read on to learn more about the details of this exciting slots game from <a href="/software/williams-interactive" class="text--link" title="Williams Interactive">Williams Interactive</a>.
				</p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/bruce-lee-dragons-tale.png" class="review-game__img" alt="Bruce Lee Dragons Tale" width="200" height="139">
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
			<h2 class="title title--h2">Symbols and Reels </h2>
			<p>
				As you can imagine, any Bruce Lee themed slot machine is going to be full of Chinese and martial arts themed symbols. in this game, the background of the reel itself is a luminous Chinese temple, with a dragon icon flying through the game title. The symbols are all chinese in style, even the standard King, Queen, Jack and Ace. Other symbols include Bruce Lee's face, nun chucks, Chinese characters, a Chinese temple, Bruce Lee doing kung fu moves, a Bruce Lee logo and Yin and Yang symbols. The game is basically four games in one, with four separate reel sets of five by three reels. The Yin and Yang is the Feature symbol, while the Bruce Lee logo is the wild.
			</p>

			<h2 class="title title--h2">Wilds, Dragons and More in Bruce Lee Bonus Features </h2>
			<p>
				There are so many bonus features in the Bruce Lee Dragons Tale game, it is almost not fair to WMS! in addition to wilds you will find transferable wilds, scatters, free spins and even multipliers. And that is not even counting the extra special bonus round. If you spin the Bruce Lee Wild symbol, it will act as a stand in for any other symbol on the screen other than the Yin Yang featured symbol. Like in other slots, if the wild could be used for more than one pay line it will always default to whichever one has the highest payout. If you are lucky enough to line up three or more Yin and Yang symbols, you will get free spins. If you line up three, four or five, you get 10 free spins. Five symbols also comes with a 2x multiplier, or up to a 12x multiplier depending on how many reel sets have the feature symbol lined up.
			</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('bruce-lee-dragons-tale', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
			<h2 class="title title--h2">Even More Bonuses in the Super Multi Pay Feature</h2>
			<p>
				The Super Multi - Pay feature is what really sets this slot game apart from the pack. The game itself consists of four reel sets, each being five reels by three lines. This mess that each reel set has 20 individual pay lines, totaling 80 in the entire game. This means that every single time you spin, you are playing on four separate reels and you get four separate chances to win on those 20 pay lines in each set. The best part is that scatters and wilds transfer over the three smaller reels, so if you spin one of those symbols on the smaller reels you have basically spun it on all of them. This significantly increases your chances of winning every time you spin.
			</p>
			<h2 class="title title--h2">Final Thoughts on Bruce Lee Dragons Tale - A Spectacular Slots Game</h2>
			<p>
				Bruce Lee slots takes martial arts gaming to a whole new level. If you love Bruce Lee movies, you are going to really enjoy this game. It includes awesome bonus features, stand out graphics that represent the martial arts hero very well, and even sound effects to make you feel even more immersed in the Chinese theme. The bonus features are great as well, including wilds and scatters that are transferable, free spins bonus feature, and a unique reel set layout that gives you more chances to win than you will find in other slots online.
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
