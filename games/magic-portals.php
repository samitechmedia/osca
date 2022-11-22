<?php
$title = "Magic Portals Slots Review ".date('Y')." - Play For Free Here";
$desc = "Latest Magic Portals Online Slots Review for ".date('Y')." - Play for free or real C$ & discover a great betting range, free spins round, good return rate + a 64,000 coin jackpot.";

$slotName = 'Magic Portals';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 646
    };
</script>

<div id="arcade-game-review">
    <section class="section review__section type-section-padding-bottom" id="freeGame">
      <div class="container">
        <div itemscope="" itemtype="http://schema.org/Review">
        <?php
          include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/arcadeSingleGameHolder.php';
        ?>
          <div class="review-game__information type-section-padding">
            <div class="row">
              <div class="col-12 col-lg-6 col-xl-8">
                <h1 class="title title--h2">Magic Portals: Online Slot Review</h1>
                <p>Perhaps one of the reasons you&rsquo;re reading this online slot review is that you&rsquo;re browsing pages and looking for a game that&rsquo;s a little bit different? Well, this fantastic NetEnt game offers simple gameplay based around an engaging theme of witches,
            wizards, and magical mystery.</p>
              </div>
              <div class="col-12 col-lg-6 col-xl-4">
                <div class="hidden__block">
                    <div class="type-display-flex type-flex-justify-between">
                      <img src="/images/slots/magic-portals.png" class="review-game__img" alt="Magic Portals" width="200" height="139">
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
          </div>
          <m-attribute-box></m-attribute-box>
          <div class="review__text-block type-display-flex type-flex-justify-between">
            <div class="type-left-side">
              <h2 class="title title--h2">Review <i class="bottom__line"></i></h2>
              <span class="review__upd-text">Updated <?php echo $reviewDate ?></span>
              <h2 class="title title--h2">A Magical Online Slot</h2>
              <p>This 5-reel, 25-payline game had fans of online slots in Canada excited for months ahead of its release. Now it’s firmly established as one of the top ten slots of award-winning gaming provider NetEnt, which – considering their line-up includes
                great games like Starburst and Jack Hammer – is a pretty major feat. That alone should give you a better idea of this game than any online slot review.</p>
              <p>The first thing that stands out about this game is the phenomenal graphic design. Immediately you’ll feel transported to another dimension – via a magical portal, perhaps? In this dimension, fire and warlocks reign supreme with magical gemstones
                and ancient creatures dominating the reels.</p>
              <p>The symbols on the reels range from the lower-paying crystals and gemstones, to mid-level animal symbols and the more exciting and high-scoring witches and wizards. The free spins and wild symbols are also clearly labelled (and surprisingly frequent)
                so you can’t miss them.</p>
              <h2 class="title title--h2">As if by Magic – Win Free Spins!</h2>
              <p>On the leftmost and rightmost reels, there are two magical portals, which is only fitting. If you manage to match two symbols in these two portals, they transform into wilds and give your payline wins a fiery boost.</p>
              <p>To trigger the main free spins feature round in this game, all you have to do is hit two free spin symbols in the pair of magic portals on reels one and five. This will immediately give you 10 free spins, but with a magical twist – during this
              feature, all five reels will produce a portal to make a jackpot win that much closer.</p>
            </div>
            <div class="type-right-side">
              <?php echo getCasinoBlockHTML('magicportals', 'game-images'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <h2 class="title title--h2">Magic Portals Slot Review: Our Verdict</h2>
              <p>A final note of this Magic Portals slot review is that high rollers may want to look elsewhere to get their online slot kicks. Beginner and intermediate players, however, should love the mid to low variance payouts.</p>
              <p>Overall, while this game may be lacking in the big payouts department, it is highly entertaining and carries a generous payout rate of over 96%. While the game itself is simple, for those who want a straightforward slot with a captivating theme,
                it’s a breath of fresh air – after all, complexity dominates most online slots we review these days.</p>
              <p>In short, if you enjoy regular cash prizes and slowly building up a bankroll all while surrounded by the mystique of magic, then this is the game for you.</p>
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
