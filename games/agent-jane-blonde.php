<?php
$title = "Agent Jane Blonde Slot Review (".date('Y').") - By Microgaming";
$desc = "Agent Jane Blonde Slot Review - Learn more about the Agent Jane Blonde slot machine, impressive game features, free spins, huge jackpot &amp; bonus rounds!";

$slotName = 'Agent Jane Blonde';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
  window._arcade = {
      countryAlpha2: '<?php echo $currentCountry; ?>',
      providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
      affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
      bonusText: '<?php echo $partnerInfo['cta']; ?>',
      currentGame: 2393
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
            <h1 class="title title--h2">Agent Jane Blonde Slot Review</h1>
            <p>
              Cartoon slots are meant to be a lot of fun, and this zany offering from Microgaming has oodles of it.
                Agent Blonde, Jane Blonde, is a slot game with a tongue in cheek spy girl motif. Yes, one of her biggest weapons is a lip stick and yes she's beautiful, blonde and pouty, but hey - what's not to like about that?
            </p>
              <p> This James Bond parody of a slot game, while mildly offensive to strong female protagonists everywhere, is intended in harmless good fun. The game suits those who prefer lower but more regular payouts, and we found that the game rewarded spending a bit more time at the machine, rather than blowing it all at once. Let's take a closer look at what's to love about this smoking hot game.
            </p>
          </div>
          <div class="col-12 col-lg-6 col-xl-4">
            <div class="hidden__block">
              <div class="type-display-flex type-flex-justify-between">
                <img src="/images/slots/agent-jane-blonde.png" class="review-game__img" alt="Agent Jane Blonde" width="200" height="139">
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
          <h2 class="title title--h2">Spy Girl Symbols</h2>
          <p>
            The symbols are everything a girl needs in order to be a high class spy these days. Gadget shades, C4 bombs, Guns, presumably poison lipstick and of course, the essential spy gadget - a cocktail shaker. The game operates on 5 reels and offers
            9 paylines. Of course, like other Microgaming games there are Wild symbols (the secret agent herself), multipliers, Scatters (the logo), as well as free spins to keep players satisfied. Agent Blonde has many different disguises and these are
            all depicted beautifully in the cartoon style. It's difficult not to become fond of the game!</p>
          <h2 class="title title--h2">Extra Features</h2>
          <p>
            Another feature of the game is the gamble button. Not readily available on all slots, this button allows you to double or even quadruple your winnings by playing a game of guess the card. This is a real little earner, as if you guess correctly a few times in a row, your money really starts to add up. Of course it's very risky business, as you could lose it all! This section adds to the excitement of the slots, as it brings a little more than the straight forward slot machine. Spending too long at the slot machines can start to become a bit repetitive, so this is a great little feature that draws you back into the thrill of gambling money. You also feel as though you are more in control of the outcome, it's very rewarding to be right several times in a row, especially if you are gambling on a big win.
          </p>
        </div>
        <div class="type-right-side">
          <?php echo getCasinoBlockHTML('agentjaneblond', 'game-images'); ?>
        </div>
      </div>
      <div class="row type-section-padding">
        <div class="col-12 col-xl-6">
          <h2 class="title title--h2">Gain Entry to the Free Spins Bonus Round</h2>
          <p>
            Additionally, if there are three or more Scatter symbols on the board at any time, it triggers the entry to a bonus round. In this round you are rewarded with 15 free spins and three times multipliers. Exciting stuff. So while the game may look
            a little silly, the money you can win is certainly serious stuff. The jackpot of 10,000 coins will certainly be enough to shake up anyones martini!
          </p>
          <h2 class="title title--h2">Our Conclusions?</h2>
          <p>
            A darling lady with a dangerous secret, is Agent Jane Blonde the right slot for you? Well, if you enjoy the pastiche theme and like a bit of fun and a light hearted flutter then you would be crazy not to give it a try. It's not just the attractiveness of the theme that make the game unmissable, but the highly rewarding payout structure and the additional gamble and bonus rounds suits those who just want to have a good time, without breaking the bank. Already immensely popular in Canada, why not give it a try and see what all the fuss it about.
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
