<?php
//We didn't do arcade rollout for that game review because we don't have this game in our games library
$title = 'Queen of the Wild Slots ' . date('Y') . ' - Independent Slot Game Guide';
$desc = "Queen of the Wild Slots ' . date('Y') . ' - The only review you\'ll need to learn all about this great WMS slot game. Read & find how to uncover great bonus features.";

$slotName = "Queen Of The Wild";
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<section class="section review__section type-section-padding-bottom"  id="freeGame">
  <div class="container">
    <div itemscope="" itemtype="http://schema.org/Review">

      <div class="review-game__information">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-8">
            <h1 class="title title--h2">WMS Slots Game Queen of the Wild</h1>
            <p>
            In today&apos;s world of concrete jungles, we all need to get a bit of nature in our lives once in a while. You may even dream of escaping to a jungle paradise. WMS has come out with a new slots game that appeals to this fantasy by transporting you to the Amazon jungle where the Queen of the Wild reigns supreme. In this slots game you will find exotic symbols, bonus features, and the Queen herself. Join her in the splendor of nature as you spin the reels to win real cash prizes, free spins and more. If you want to learn more specifics about this exciting online slot machine, read on for all of the details!
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/queen-of-the-wild.png" class="review-game__img" alt="WMS Slots Game Queen of the Wild" width="200" height="147">
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
    <?php echo getCasinoBlockHTML('queen-of-the-wild', 'slots'); ?>
    <div class="review__text-block type-display-flex type-flex-justify-center-top">
      <div class="type-left-side">
        <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
        <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
        <h2 class="title title--h2">Amazon Jungle Reels and Symbols</h2>
        <p>
        This slots game is set deep within the depths of the green Amazon forest. The warrior queen herself makes an appearance on the reels, wearing leather and holding a deadly spear. The symbols include the standard card faces of spades, diamonds, clubs and hearts, as well as jungle symbols. The jungle symbols are fruit, wild animals such as dangerous snakes, tigers and gorillas, as well as innocent parrots. There is even a waterfall like you would find in the Amazon. The reels themselves are illustrated to look like pieces of leather hide stitched together. The waterfall symbol is your wild card – when you see this symbol appear, it substitutes for any other symbol on the screen. The Gorilla is your jackpot key, and you will need to line up five of them to win big.
        </p>
        <h2 class="title title--h2">Bonus Features Fit For an Amazon Queen</h2>
        <p>
        The Queen of the Wild slot also includes a scatter symbol, which is the Queen herself. She is also your key to the free spins round. You cannot miss her when she comes up on the screen. Although she only takes up one spot on the reels, her symbol is much larger than the others and seems to take up 2 slots. She is surrounded by lush green leaves and looks back at you with a challenge in her eyes. The scatter symbol is referred to as “slots player's best friend” because it is your key to unlocking all of the unique bonus features of the game, and they usually tie in with the game's theme. In this game, the feature that the Queen unlocks is free spins. .
        </p>
      </div>
      <div class="type-right-side">
        <?php echo getCasinoBlockHTML('queen-of-the-wild', 'game-images'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-6">
        <h2 class="title title--h2">Extra Bonus Features for a Jungle Adventure</h2>
        <p>
        The Amazon Queen scatter symbol appears on all five reels in this game. Usually when you line up between three to five symbols in slots, you win cash prizes. With the scatter symbol, however, you will instead unlock the bonus round. With three or more Amazon Queen symbols lined up, you will be rewarded with increasing numbers of free spins. Free spins are so much fun for slots players – you get to just sit back and watch the wins pile up without paying for the spins! If you get three scatter symbols, you will be awarded 10 spins. Four Queens gets you 25 spins, while 5 Queen symbols will award you the ax number of free spins at 100.
        </p>
        <h2 class="title title--h2">Final Thoughts – A Slots Game For the Ages</h2>
        <p>
        Queen of the Wild is a great game, especially for beginners. Unlike other online slots that are trying to outdo their competition with complex features and rules, Queen of the Wild keeps it simple. There are only a few bonus features, the rules are simple and the paylines are fixed so you do not have to bet on every single one every time you spin. With a 2,250 coin jackpot and 100 free spins up for grabs, you don't want to miss out on this slot machine!
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
