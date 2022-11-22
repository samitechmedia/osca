<?php
$title = "100 Pandas Slot Review (".date('Y').") By IGT";
$desc = "100 Pandas Slots Review ".date('Y')." &#10148; Developed by International Gaming Technology, learn more about this Chinese panda classic, 5-reeled slots and jackpot.";

$slotName = '100 Pandas';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 369
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
            <h1 class="title title--h2">100 Pandas Slot Review</h1>
            <p>
              What's not to love about a game based on Chinese pandas in their natural habit? 100 Pandas, developed by IGT, also known a International Gaming Technology, is a five reel, 100 payline slot game packed full of fun features such as Stacked Wilds, scatters and free spin bonuses. For those of you in Canada who enjoyed the iconic Wolf Run or simply love high variance slots then this game is for you.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/100-pandas.png" class="review-game__img" alt="100 Pandas" width="200" height="139">
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
          <h2 class="title title--h2">Visually Stunning Gameplay</h2>
          <p>
            As you might expect 100 Pandas is set to the backdrop of deep bamboo forests and an appropriate oriental soundtrack: think relaxing Chinese-style sounds, mixed with a symphony of jungle noises. The main symbols here include a Purple Panda, a Green
            Panda, the Wild (a group of pandas), Bamboo, Flower, a Yin Yang scatter that changes colour depending on whether you’re in the bonus round or not, and five other various Chinese symbols.
          </p>
          <p>
            With five reels and 100 possible paylines, it’s pretty much a given you're going to be a winner if you land any matching symbols in adjacent reels. Although there are 100 paylines, players may choose to play as few as one, with options to play 10, 25, 50, 75 right through to, of course, 100. As a rule of thumb you should aim for 10 or more active paylines, or you might find the whole game a little dull.
          </p>
          <h2 class="title title--h2">Stacked Wilds and Scatters</h2>
          <p>
            First up for the specials is the Stacked Wild feature. The concept here being that each reel is sporadically stacked with four or more Wilds in a row, potentially allowing the whole screen to fill with the Wild symbol or for groups of Wilds to
            form across any of the reels. The Wild symbol itself depicts a trio of pandas set to the backdrop of a full moon and can take the place of all symbols except the Yin Yang scatter symbol, helping you rack up matching combinations and big wins.
            Happily, the Stacked Wild feature is available to players during regular play, not just in the bonus rounds, and if you’re lucky enough to get a couple of stacked wild reels on a spin, you’re guaranteed a surprisingly large payout.
          </p>
          <p>
            Next is the Yin Yang scatter symbol – get three of these on the center reels and you will be awarded with ten free spins. Plus, all wins during the free spin rounds are doubled with a 2x multiplier. If that’s not enough, the Stacked Wilds are even more abundant in the bonus round than in the base play. Get three more bonus symbols anywhere on the three centre reels and the Free Spin bonus is retriggered, resulting in ten extra bonus spins. Players can win up to 255 free spins consecutively which often result in a pretty decent amount of no-risk double winnings. Not bad, not bad!During the bonus round the games colour scheme changes, adding some nice variation to your play. The outer edge of the Yin Yang changes from yellow to red, while the Wild’s background changes from blue to purple.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('100pandas', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">The Expert Conclusion</h2>
          <p>
            100 Pandas is a slot that appeals to a wide range of players, and certainly has a local Canadian following. With the availability of up to 100 paylines, you have the option of placing high stakes on a low number of lines and hoping for the big wins. Or you could spin that on its head and bet lower stakes on a greater number of active paylines. Our advice for the average player here is to go for the latter. With the availability of Free Spins and the Stacked Wilds, opening up a reasonable amount of paylines almost guarantees small, but regular wins. Overall, this game will certainly hold your attention, with its charming oriental theme and fantastic features - it really delivers some very solid gameplay.
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
