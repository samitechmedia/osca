<?php
$title = "Big Bang Slot Machine Review - By NetEnt";
$desc = "Big Bang Slot Machine Review - Learn more about bonuses &amp; jackpots in this space-themed slot machine special by gaming giants NetEnt!";

$slotName = 'Big Bang';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 11362
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
            <h1 class="title title--h2">Big Bang Slot Review</h1>
            <p>
              This Big Bang review is another example of NetEnt scoring a big hit with a new sci-fi themed online slot. Travel from Canada to the farthest corners of the universe to score some truly astronomical real cash wins with one of the best online slots available.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/big-bang.png" class="review-game__img" alt="Big Bang" width="200" height="139">
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
          <h2 class="title title--h2">The Big Bang Theory</h2>
          <p>
            This great five-reel NetEnt game can indeed give you bang for your buck, despite a lack of bonus rounds and a simple 25-payline setup. If you read practically any online slot review of NetEnt games, you’ll see that this developer has a great knack for producing simple games that give slots fans a very rewarding experience.
          </p>
          <h2 class="title title--h2">Out of This World Graphics</h2>
          <p>
            If you’ve read our online slots review of NetEnt’s other excellent game, Starburst, then you’ll immediately see the similarities between that and Big Bang. That, of course, is a great review because Starburst is one of the top online slots.
          </p>
          <p>
            This game, too, is one of NetEnt’s best with a space-age theme and tranquil interstellar music that ramps up into hyperdrive when you’re on a winning streak. It’s reminiscent of a spaceship hitting warp speed for an awesome and immersive gameplay experience.
          </p>
          <h2 class="title title--h2">Big Multipliers for a Big Bang</h2>
          <p>
            The lack of bonus rounds might not score many points in an online slot review, but the way the game really packs a punch is with the progressive multipliers that can award you with a big real cash prize of up to 32 times your original win.
          </p>
          <p>
            This is a huge figure, and it’s not as difficult to attain as you might expect. In order to win the maximum real money bonus, you need to win six spins in a row. Each consecutive winning spin you land playing Big Bang will award an increasing multiplier.
          </p>
          <p>
            The possible multiplier levels are displayed alongside the reels to let you know how close you are to the top prize. The multipliers run from double your win all the way up to 32 times your win.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('bigbang', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Big Bang Slot Review: Our Verdict</h2>
          <p>
            This game combines great graphics and sound with immersive gameplay and big online slots prizes, so it’s no wonder that NetEnt have scored another hit with this game. The tantalising multipliers that increase with each winning spin are a great motivator to keep on playing, but even without those this game is a lot of fun. To conclude this online slot review, we can only say that it’s not too difficult to see why this is considered one of the top online slots in Canada.
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
