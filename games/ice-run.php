<?php
$title = "Ice Run Slot Review - By Playtech";
$desc = "Ice Run Slot Review for ".date('Y')." - We check out this Ice age based slot machine by Playtech. Find out more about great bonus rounds, jackpots &amp; more!";

$slotName = 'Ice Run';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 4521
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
                <h1 class="title title--h2">Ice Run Slot Review</h1>
                <p>Created by legendary gaming providers Playtech, this quirky little game is reminiscent of hugely popular movie Ice Age; with a few twists of course. The game features affable Inuit characters and ice dwelling animals like seals and fishes. The bonus
                round is surprisingly easy and rewarding for a slot game, making the rather rudimentary graphics completely worth it.</p>
                <p>You don't need as many spins on this game, compared to other Playtech games, to earn a tidy profit; 50 would be more than enough to reap the   full benefits of this game. For that reason, it has earned itself a dazzling reputation amongst Canadian
                players, as it's much easier to make larger bets on shorter games, making it all the more rewarding. However, starting from one 0.01 coin a bet and going all the way up to 1.250 a spin, this game suits every budget. In this review, we look at
                the graphics, special features and winning potential of this exciting slot. So wrap up warm, and join us in exploring the fascinating Ice Run.</p>
              </div>
              <div class="col-12 col-lg-6 col-xl-4">
                <div class="hidden__block">
                    <div class="type-display-flex type-flex-justify-between">
                      <img src="/images/slots/ice-run.png" class="review-game__img" alt="Ice Run" width="200" height="139">
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
              <h2 class="title title--h2">Game Configuration and Payout</h2>
              <p>While this game is a non progressive, a fact that might put some die hard gamers off, the slot does offer many other innovative ways to win. The base game itself is pretty exciting, with the availability of up to 25 paylines, depending on the
                amount of your bet. As we mentioned, we found it surprisingly easy to win decent amounts of profit, particularly when making larger bets - so it pays to take a risk here. It has a 93.83% payout rate, which is lower than some, but still better
                than others. The regularity of the bonus round, and the uplifting rewards of the bonus round make the game well worth a chance. The maximum jackpot of Ice Run is 4,000 coins attained by hitting 5 Eskimo Girls in your activated paylines at once.
                This won't excite some high rollers, however, if you are looking for a slow but steady earner, this ones a winner.</p>
              <h2 class="title title--h2">Wilds and Scatters</h2>
              <p>Other special features include the Eskimo boy. He's the wild symbol in this game and supplements all but the Scatter, providing you with far more regular winning combos. Whenever you see the guy grinning in the third reel, you are in for a bonus
              feature surprise. The entire third reel becomes taken up by the Wild and you are awarded with 2 free spins with this activated. It really does pay to have more active paylines in this game, to fully make the most of the bonus feature. The Scatter
              is represented by the igloo. Landing this symbol gets you into the free spin round, with the potential for up to 10 free goes and a 3 times multiplier.</p>
            </div>
            <div class="type-right-side">
              <?php echo getCasinoBlockHTML('icerun', 'game-images'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <h2 class="title title--h2">Free Spins, Ice Run and More</h2>
              <p>The most exciting special feature of all, however is the Husky Dog. You'll only find this friendly guy on either reel 1 or 5, but when you discover him on both, a whole new game is opened up. This is the pinnacle of Ice Run. You will find 7 snowmen,
                and you must use your Inuit avatar to slide down the hill and smash your choice of three. Inside you will unearth amazing cash prizes. There is also the chance to be awarded with the Snowball feature, which is randomly activated. This entitles
                you to 7 cash prizes in the bonus round. Additionally, there is a second bonus round for your enjoyment. Make your choice between one of three igloos and bag yourself a brilliant multiplier. This can hugely increase your winnings from the first
                round, depending on your selection.</p>
              <h2 class="title title--h2">Final Verdict</h2>
              <p>All in all, we can forgive Playtech for their slightly under par graphics, as the game play has a lot going for it, and that's what truly matters. With tons of special features and generous prizes this game never fails to delight. It suits everyones
              budget, so everyone can make the most of this slot.</p>
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
