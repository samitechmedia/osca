<?php
$title = "Twin Spin Slots Review ".date('Y')." - Play It Free Here!";
$desc = "Top Twin Spin Online Slots Review for ".date('Y')." - With a massive 243 ways to win, you can win up to 100x your bet + the huge 135,000 coin jackpot. Play free here.";

$slotName = 'Twin Spin';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 640
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
            <h1 class="title title--h2">Twin Spin: Online Slot Review</h1>
            <p>
                Throughout this Twin Spin slot review, you&rsquo;ll find that this tribute to 1970s-style Las Vegas
                gambling is fast, funky, and furious. The disco beats and classic styling may not be everybody&rsquo;s thing, but the mid-to-high variance of the game and the potential to win up to 100 times your bet means that slots veterans in Canada count this NetEnt game as a firm favourite.
            </p>
            <p>
                Optimized for online casinos and mobile gaming, this game boasts 243 ways to win and has picked up a
                really devoted following in Canada. The combination of lots of little wins and the chance to bag up to C$135,000 is pretty tough to beat. Overall, we can call it an oldie but goodie.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/twin-spin.png" class="review-game__img" alt="Twin Spin" width="200" height="139">
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
        <h2 class="title title--h2">Twin Reels – Double Trouble &amp; Double Prizes</h2>
        <p>
        The first thing that this Twin Spin review should point out is that this game is more than just your average five-reel slot game – not just because of the 243 ways to win. The Twin Reel feature is a bone fide guarantee that two of the reels will
          contain matching symbols on every single spin. That means if you’re lucky enough to find just one more symbol to match it, you’ve locked up a win!</p>
        <p>If you’re truly on a roll, other reels can lock up into triple, quadruple and even quintuple reels too. If that happens, of course, you are guaranteed an amazing cash prize. This exciting addition is activated entirely at random – so any spin
          you make could be the big one..
        </p>

         <h2 class="title title--h2">Betting &amp; Bankroll</h2>
        <p>
        This slot can be enjoyed by online slots fans in Canada of any level, from total beginner to high roller. That’s because the betting configuration goes from 0.25 all the way to 250. If you’re a real expert you can even set the game to autoplay
          and watch the wins rack up.
        </p>
      </div>
      <div class="type-right-side">
        <?php echo getCasinoBlockHTML('twinspin', 'game-images'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-6">
        <h2 class="title title--h2">Twin Spin Slot Review: Our Verdict</h2>
        <p>
        To conclude our Twin Spin online review, this is a pretty simple game. However, like many of NetEnt’s best, there are many exciting twists to keep the play interesting throughout your spins. What makes this game appealing to Canadian players is
          the fact that NetEnt have attempted to cater to all markets with a basic, stripped-down slot boasting 243 ways to win and a flexible budget.</p>
        <p>However, we must admit that for veteran players this can be annoying – these savvy slots players know that since the game pays out so frequently, you’ll rarely hit a big jackpot. However, thanks to the Twin Reels, there is plenty of opportunity
          for a tidy win on this great game.
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
