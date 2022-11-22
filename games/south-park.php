<?php
//We didn't do arcade rollout for that game review because we don't have this game in our games library
$title = "South Park Slots Review ".date('Y')." × Play For Free!";
$desc = "South Park Online Slots Review for ".date('Y')." - Play free here, or for freal money, fun game-play + a top win of 69,500 coins in the jackpot.";

$slotName = "South Park";
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<section class="section review__section type-section-padding-bottom"  id="freeGame">
  <div class="container">
    <div itemscope="" itemtype="http://schema.org/Review">

      <div class="review-game__information">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-8">
            <h1 class="title title--h2">South Park: Online Slot Review</h1>
            <p>
                This South Park slot review was one of our favourites to write, because a marriage of a fantastic online slot developer like NetEnt and one of the most famously naughty and biting satirical cartoon sitcoms of all time is obviously a great thing.
            </p>
            <p>
                If you&rsquo;re a fan of the show you&rsquo;ll be a fan of this slot, but if you&rsquo;re simply a fan of slots in general, well, you&rsquo;ll still likely be a fan of this slot. Though, like the show itself, this game is not for the easily offended.
            </p>
            <p>
                If you have seen the show, you know the style of black humour in the sitcom revolving around the lives of four young boys in the town of South Park, Colorado. The show and the slot follows their misadventures.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/southpark.png" class="review-game__img" alt="South Park" width="200" height="139">
                <div class="rating__area">
                  <span class="rating__count">4/5 </span>
                  <span class="rate-stars">
                    <svg class="icon c-silver" width="102" height="18" aria-hidden="true">
                        <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                    </svg>
                    <span class="rate-stars__fill" style="width:80%;">
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
    <?php echo getCasinoBlockHTML('southpark', 'slots'); ?>
    <div class="review__text-block type-display-flex type-flex-justify-center-top">
      <div class="type-left-side">
        <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
        <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
        <h2 class="title title--h2">Come On Down To South Park</h2>
        <p>
            The introduction to the game is a classic, opening with Kenny being crushed beneath a slot machine. Hopefully, the same won’t happen to you; it didn’t happen to us, which is why our review isn’t a negative one!
        </p>
        <p>
            NetEnt almost always deliver on their graphics, and this game is no exception. The graphics are styled after the cartoon, so the aesthetics of the reels will be pleasing to die-hard South Park fans and die-hard slots fans alike.
        </p>
        <p>
            The soundtrack is equally great, with South Park characters piping up after big wins – from Cartman’s “awesome” to Timmy’s “can I get a wh-wh-what what” the soundtrack skirts the line between offending and encouraging you. All the while, the classic
          theme tune tinkles away in the background.
        </p>
        <h2 class="title title--h2">Kyle, Stan, Cartman, and Kenny Bonus Rounds</h2>
        <p>
            However, the serious comedic meat of this slot comes with the bonus rounds. There are four bonus rounds, with the chance for some serious wins. The bonuses are easily triggered, as well, simply requiring you to land the character symbol on the
          fifth reel.
        </p>
        <p>
            Stan’s bonus opens with Stan vomiting on Wendy – we did say this game wasn’t for the easily offended! This vomit, however, gives you a sticky wild. Gross, but profitable, this wild remains on your screen for several spins and gives you the chance
          to win up to 30 times your bet.
        </p>
      </div>
      <div class="type-right-side">
        <?php echo getCasinoBlockHTML('southpark', 'game-images'); ?>
      </div>
    </div>
    <p>
      Kyle’s round opens with him and his baby brother from Canada, Ike. You’ll get 10 free spins and a ton of special bonuses – remember to kick the baby! Naturally, Kenny’s bonus round is just as offensive as you spend it trying in vain to save a
      10-year-old child from death. However, there are up to 139,000 coins to be won!
    </p>
    <p>
      Last but certainly not least comes Cartman’s round, which can produce some amazingly epic wins as Cartman tracks down his most hated enemies: the hippies. You can win up to 5,000 times your bet in this meaty feature.
    </p>
    <div class="row">
      <div class="col-12 col-xl-6">
        <h2 class="title title--h2">South Park Slot Review: Our Verdict</h2>
        <p>
            There are more episodes than you can count, and like the show this slot is for those who are in it for the long haul. The variance is medium to high, and it might take a while for you to hit all the special features and bonuses; be sure to manage
          your bankroll carefully and budget for 100 to 200 spins.
        </p>
        <p>
            To conclude our South Park slot review, this game is hilarious and rude – even without the chance of winning big, which it has.
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

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
