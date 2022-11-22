<?php
$title = "Aliens Slot Machine Review ".date('Y')." - By NetEnt";
$desc = " Aliens Slot Machine Review ".date('Y')." &#10148; Developed by NetEnt, learn more about this film-based sci-fi classic slot machine &amp; bonus round features!";

$slotName = 'Aliens';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 10925
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
            <h1 class="title title--h2">Aliens Slot Machine Review</h1>
            <p>
              Canadian sci-fi fans will love this Aliens' variation of the classic casino slot game, which takes its theme from the cult film of the same name. If it's great graphics you're after, high-octane gameplay, and the chance to win real cash bonuses amounting to hundreds of Canadian dollars then Aliens ticks all the boxes and then some. Developed by online casino games giant NetEnt, in association with 20th Century Fox, Aliens online slots offers all the benefits of an online casino game
            with a great twist.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/aliens.png" class="review-game__img" alt="Aliens" width="200" height="139">
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
          <h2 class="title title--h2">Kill The Alien Queen</h2>
          <p>
            As we've briefly mentioned, the game theme is based on the Aliens movie that was released in the eighties. The film catapulted to cult status in Canada, and so any online casino slot game that dares to take on the Aliens genre needs to pack a punch. Fortunately, great graphics and a first person arcade mode playing style make this online slot gambling experience live up to expectations. Play progresses over three individual stages, with the plot line loosely following the second Aliens film, and with the ultimate aim to reach stage 3 and kill the queen.
          </p>
          <h2 class="title title--h2">Make It To The Hive</h2>
          <p>
            You take on the role of a marine in this arcade game and online slots mash-up which sees you navigate three stages for a chance to win real money.
          </p>
          <p>
            The first stage involves you attempting to build-up your bonus metre, which you do by playing slots in the traditional way, spinning the reel and matching up symbols to win. Your bonus metre will fill up as you play, and once topped up to
            the max, you'll be able to progress to stage 2. This is where the chance to win some top real cash begins.
          </p>
          <p>
            In stage 2, the first person shoot 'em up element of the game kicks into gear, as you make your way through the Alien ship in a bid to reach the hive. This is where the bonuses you built-up in stage 1 will come in handy, as you can use these
            to your advantage in order to make winning combinations more profitable. This stage relies on you having enough ammunition to make it through to stage 3, where you'll come face to face with the queen, so it's important to keep hitting to
            make sure your ammo stays topped up. If you run out, then it's slot game over.
          </p>
          <p>
            Make it to stage 3 and this is where you can really stand to make strides towards winning a good sum of real cash. Stage 3 is separated into 4 steps and for each one you make you can redeem a real money reward. Make it to stage 4 and successfully kill the Queen and you'll be taken back to stage 1, with your winnings added to your bankroll and the opportunity to play this top game all over again.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('aliens', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Aliens On The Move</h2>
          <p>
            Sadly, the Aliens online slot isn't available on mobile or smartphone devices so you're restricted to playing this online slot game on your laptop or desktop computer at home, or wherever you can connect to Wi-Fi. With the sophistication of the graphics required to support this game,it's not really surprising a mobile app version isn't available, even for mobile devices as evolved as the iPhone or Android handsets. The smaller screen size would definitely diminish enjoyment of the interactivity needed to fully appreciate this top online slot game at its finest.
          </p>
          <h2 class="title title--h2">An Aliens Online Review: Our Verdict</h2>
          <p>
            Hats off to NetEnt, you can always count of them to come up with an exciting mode of gameplay that puts a fresh twist on an old classic and that's exactly what Aliens delivers. The combination of traditional slot reels muddled in with arcade style action, and a storyline that evolves with you the player at the centre of the action, is genius. Our Aliens review found that this coupled with the fact that you can win in multiple levels of the game, from small payouts to big bonuses, made an online slots game that's every bit as entertaining as it is lucrative. As we said from the off, if you're a fan of the sci-fi film genre, and the Alien franchise in particular, you won't be disappointed with this slot gaming version.
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
