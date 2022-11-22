<?php
$title = "White King Slots Review ".date('Y')." - Play For Free Here!";
$desc = "Top White King Online Slots Review for ".date('Y')." - A simple & easy game to play, with great graphics and music. Play free here to win the 16,000 coin jackpot today.";

$slotName = 'White King';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 4641
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
            <h1 class="title title--h2">Slot Review of Playtech&apos;s White King</h1>
            <p>
            The slot supreme for high rollers and thrill seekers, White King is a Playtech game unlike any other. With Roaring Stacked Wilds for adrenaline fueled mayhem, 40 paylines and the chance to enter into the Majestic Night Free Spins round &ndash; there&apos;s
        no question as to why this game was one of the most highly anticipated slots of the year. Playtech have surpassed all expectations with this release, and as one of the forerunners in the entertainment industry, that&apos;s not easy to do. Read our
        review and find out how to play White King, learn how to win and find out about the gaming experience itself.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/white-king.png" class="review-game__img" alt="White King" width="200" height="139">
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
        <h2 class="title title--h2">The Appealing Parts</h2>
        <p>This high variance slot is a challenging game, yet the rewards are definitely worth the trouble. You may not hit as often as you do with other, similar, slots but when you do prepare yourself for a potentially life changing amount. Expect your
          bankroll to be volatile while playing this game, but if you have some patience and faith, you'll find that the unpredictability can work in your favour too. With the betting ranging from C$0.01 to 50 Canadian dollars a payline, this game suits
          players from all budgets.</p>
        <p>If you haven't figured it out yet, it's possible to make a C$2000 bet in just one round, an almost unheard of amount for an online slot game. Players should be careful however, as with the chance to win enormous amounts of cash, comes the potential
          to also lose enormous amounts of cash. And with White King's low end payout of 90%, you'd be wise to be warned.</p>

           <h2 class="title title--h2">Graphics and Sound Effects</h2>
           <p>No matter if you are rolling high or playing it cautious, all players will love this visually stunning game, whose theme revolves around the powers of the mythical white lion. The fairytale backdrop, the piercing blue eyes of the King, and the
          gorgeous detailing of the crown, eagle and pride symbols will captivate you during your time playing. The slot has has been hailed as one of the best games in legendary gaming provider Playtech's portfolio, not only due to its incredible winning
          potential, but because of the hugely appealing graphics and sound effects of the game. Playing is so effortless, so natural and so intuitive, you won't be able to help yourself coming back for more. Let's take a closer look at the symbols and
          features used to help you win.</p>
      </div>
      <div class="type-right-side">
        <?php echo getCasinoBlockHTML('whiteking', 'game-images'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-6">
        <h2 class="title title--h2">Wilds, Scatters and Free Spins</h2>
        <p>Of course the White King, the white lion himself, is the Wild in this game, the emblem of power. The almighty Wild, which can appear on any reel, and gifts you with the ability to create even more winning combinations. The logo of the game is
          the Scatter symbol, and if this symbol appears on any of your reels you will be directed straight into the exciting bonus round of Majestic Night. That's where you can really start to rake in the cash. With 5 free spins, and the potential to
          earn more in play, and a greater frequency of White Kings in play – this is your chance to call upon lady luck and hope for a rewarding round.</p>
        <h2 class="title title--h2">Auto and Turbo Play</h2>
        <p>Other features include the option to use turbo play and autoplay to speed up your betting process. Use of this is recommended only for veteran players who know what they are doing. You also have the option of stopping the autoplay when it comes
          to the bonus round, by selecting “until feature”,so you can keep better control over your profits and losses.</p>
        <h2 class="title title--h2">The Final Say</h2>
        <p>
        This incredible game is challenging, but gives you real earning potential. If you really like to splash your cash around a casino, then perhaps this game is for you - with the option of betting up to C$2000 per round. However, as this is an extremely
          high variance game, we don't recommend that you blow all of your bank roll in one turn of the reels, and that you try to space it out over at least 100 spins.
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
