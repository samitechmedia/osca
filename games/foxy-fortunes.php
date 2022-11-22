<?php
$title = "Foxy Fortunes Slots Review - By Playtech";
$desc = "Foxy Fortunes Slots Review (".date('Y').") - Follow Foxy in this animal-themed slot machine by Playtech. Learn more about features including bonus rounds &amp; jackpots!";

$slotName = 'Foxy Fortunes';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<!-- this game does not exist in Arcade -->
<section class="section review__section type-section-padding-bottom" id="freeGame">
  <div class="container">
    <div itemscope="" itemtype="http://schema.org/Review">

      <div class="review-game__information">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-8">
            <h1 class="title title--h2">Foxy Fortunes Slot Review</h1>
            <p>
              This charming little game follows the antics of title character Foxy and her rural adventures with lovable pals through bucolic scenes. With so many games focusing on powered up bonus features, dynamic action themed slots and booming sound affects
              to aggressively pump up the adrenaline while playing, it's reassuring to see the unparalleled success of a game so utterly the opposite. Of course, not all gamers want obnoxious, in your face themes while they are gambling. Some prefer the finer,
              gentler side of life. If this sounds like you then we are sure you will enjoy this fresh new slot from Playtech.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/foxy-fortunes.png" class="review-game__img" alt="Foxy Fortunes" width="200" height="139">
                <div class="rating__area">
                  <span class="rating__count">5/5 </span>
                  <span class="rate-stars">
                    <svg class="icon c-silver" width="102" height="18" aria-hidden="true">
                        <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                    </svg>
                    <span class="rate-stars__fill" style="width:100%;">
                        <svg class="icon c-orange" width="102" height="18" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                        </svg>
                    </span>
                  </span>
                </div>
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
      <?php echo getCasinoBlockHTML('foxyfortunes', 'slots'); ?>
      <div class="review__text-block type-display-flex type-flex-justify-center-top type-margin-bottom">
        <div class="type-left-side">
          <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
          <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
          <h2 class="title title--h2">Exploring Foxy's Slot</h2>
          <p>Reminiscent of an updated, and wildly less sad, Disney's Fox in the Hound or Robin Hood, this slot glorifiers the simple pleasures of the countryside. The symbols all contribute towards building the theme - there's an almost Tom Sawyer vibe here.
            A tent, a cooking pot and heart warming bonfire, and of course, a park ranger make up the symbols. Even though you aren't given much information about the game, it's pretty clear that the fox and the hound are best buddies. They sit together
            toasting a marshmallow over the fire while the reels spin round. It's difficult not to get sentimental playing this game. However, we have a sneaking suspicion it wouldn't be quite as popular in Canada if it didn't offer something pretty big
            in the cash rewards department. We tried it out for ourselves; find out what we thought in this candid review.</p>
          <h2 class="title title--h2">Paylines, Budgets and Betting Limits</h2>
          <p>You can unlock up to 25 paylines in this 5 reel game, with the minimum bet starting at a relatively high 0.25 per spin. Perhaps people with lower budgets ought to look elsewhere as we recommend that you budget for at least 100 spins, with 200
          being ideal per play. If you are looking to be utterly ridiculous in your spending money, and just hate having spare cash, luckily for you this innocent looking game has a maximum betting limit of 2,500 per spin. We wonder if anyone has ever
          been stupid enough to try it, or lucky enough to reap the understandably considerable rewards of being that much of a daredevil. It certainly doesn't seem to fit in with the cutesy theme!</p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('foxyfortunes', 'game-images'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Bonuses and Rewards</h2>
          <p>The bonus features in Foxy Fortunes makes everything worthwhile. The first offers you 15 free spins and a 3 times your original bet multiplier. This round offers you the chance to walk away with on average between 10 to 30 times your original
            bet. Not bad. The other bonus feature here is the exciting Lucky Grapes cash bonus. In order to unlock this feature you must discover over 2 of the grape symbols on any reel. This is based on the traditional scratch card type game. Foxy will
            bound up and down on her trampoline, with every bounce rewarding you with yet another cash prize as she picks the grapes from the trees.</p>
          <h2 class="title title--h2">Concluding Thoughts</h2>
          <p>While this game appeals to those with a milder disposition, it still packs a punch in the cash rewards department. Luckily for you, if it's not to your taste, there's a wealth of in your face, adrenaline pumping games out there to choose from.
          However, for those who prefer this theme of game, its a true serene oasis in the desert. As Foxy Fortunes has such an usually high maximum bet, it's sure to attract some daredevils and big spenders, however we caution all players to practice
          good bankroll control and not get carried away beyond your budget.</p>
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

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
