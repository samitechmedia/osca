<?php
$title = "Break Away Slot Review (".date('Y').") - By Microgaming";
$desc = "Break Away Slot Review (".date('Y').") - Learn more about this Ice Hockey inspired slot game by Microgaming. See more features including bonus rounds &amp; multipliers!";

$slotName = 'Break Away';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2408
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
            <h1 class="title title--h2">Break Away Slot Review</h1>
            <p>
              Slots paired with Ice Hockey? For a select niche of people, it's a match made in heaven. As you can expect, the Canadian gaming community have gone Wild for it. Break Away has landed itself one of the ten ten spots of Microgaming slot games, and
              it's partly because of all of the attention from Canada. The structure of the game will be familiar to all of those who have played a Microgaming slot game before, but the novelty of the additional theme is what makes gamers keep coming back for
              more. We took a close look at the game in this review, to try to figure out what makes this one of the most well loved slot games around.
            </p>
            <p>
              With state of the art graphics, high speed, fluid, interface and the latest in gaming software - Break
                Away is a masterpiece of a slot game. It really doesn't get much better than this. On top of all that, the game is completely loaded with ways
              to win - 243 ways in fact. With a generous sprinkling of Wilds and Scatters throughout play, you'll
                find playing a truly satisfying experience. What's more, you have the chance to be entered into a bonus round. Read on to discover how.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/break-away.png" class="review-game__img" alt="Break Away" width="200" height="139">
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
          <h2 class="title title--h2">Game Features</h2>
          <p>
            The Wild symbol, which can be paired with other symbols to make a winning combination, is represented by the Break Away logo. Keep an eye out for these as they also trigger Smashing Wilds and Stacked Wilds - powered up combos which reward you
            with extra Wilds and MegaWilds respectively. The developers have really gone all out to make these extra features as exciting as possible, as you we experienced in the gameplay.
          </p>
          <p>
            Oh, and did we mention that every time you win the reels roll down in the rolling wheel feature, meaning that you have the chance to win again? No? Well, they do. Unlike other slot games, the rolling wheel feature is active during the entirety
            of the game, and not just during the special bonus rounds. That's the kind of thing we love about games like this, you end up feeling one rush after another, almost like a hockey game!
          </p>
          <p>
            Additionally, the puck symbol, which acts as a Scatter, comes with more special features than you might expect from a regular slot. Other than the usual benefits of the Scatter symbol, you will also enjoy the double payout feature if two Scatters
            turn up on your screen, and if you are lucky enough to have three or more then the amazing bonus round is triggered. When this happens, pay attention, because this is where you can really start to rake in the cash.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('breakaway', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Bonus Round</h2>
          <p>
            The adrenaline filled bonus round will certainly have hockey fans on the edge of their seats. Similar to the other Microgaming slots, if you are entered into this round you receive 25 free spins. On top of that, there's also the chance of getting
            up to 10 times multipliers on your wins. We never quite reached ten but did have a few 3 times multipliers, which definitely made a big boost to our bankroll. Especially as the rolling reels were still in effect! You can really rack up a tidy
            sum in this round, so make sure that you make the most of it.
          </p>
          <h2 class="title title--h2">Our Concluding Thoughts on Break Away</h2>
          <p>
            This game is for people who love to win consistently, and gain money relatively slowly in the casino. There's no big, towering jackpot to speak of, though the wins do get very high, peaking at 2,000 times your original bet. While, that amount of money will never compete with the large area progressives that some slots offer, you certainly have more chance of walking away with more money than you started, here. All in all, we found the game experience a completely thrilling ride. We couldn't get enough, but unfortunately we had to drag ourselves away to write this review!
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
