<?php
$title = 'Kiss Slots Review ' . date('Y') . ' - Game Guide To This Great Slot!';
$desc = 'Kiss Slots ' . date('Y') . ' - Here\'s everything you will need to know about Kiss slots games. Enjoy one of the best online casino games you\'ll ever play!';

$slotName = 'KISS';
$excludeArcadeSingleGame = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/templates/reviews-slot/head.php';

?>

<script>
    window._arcade = {
        countryAlpha2: '<?php echo $currentCountry; ?>',
        providerBonus: '<?php echo $partnerInfo['bonusvalue']; ?>',
        affiliateLink: '<?php echo $partnerInfo['affiliate_link']; ?>',
        bonusText: '<?php echo $partnerInfo['cta']; ?>',
        currentGame: 24
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
                            <h1 class="title title--h2">Rock N Roll Slots With KISS</h1>
                            <p>KISS Slots is another popular Williams Interactive slot machine game that went from real live Vegas slot machines to worldwide online slots hit. This game first launched at the Global Gaming Expo and was highly anticipated, as branded slots usually are. It was first a slot machine in Las Vegas casinos, and rock n' roll fans flocked to these machines, making them extremely popular. Because they were so well loved, WMS came out with an online version so that players all around the world could access this rocking game at any time. KISS is one of the greatest rock bands of all time and this slot machine definitely does them justice by bringing the killer concert experience right to your home computer screen with great graphics, sound effects and an overall experience that cannot be beat. </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="hidden__block">
                                <div class="type-display-flex type-flex-justify-between">
                                    <img src="/images/slots/kiss-shout-it-out-loud.png" class="review-game__img" alt="KISS" width="200" height="139">
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
                        <h2 class="title title--h2">KISS Reels and Symbols Bring the Concert to Life</h2>
                        <p>KISS slots is your typical Vegas style slot machine, with five reels and 100 paylines. This is definitely more pay lines than you find in most slots, with numbers usually ranging from ten to twenty and sometimes more. WMS loves to blow players away with extreme numbers of paylines, and with 100 ways to win with each spin, KISS slots does not disappoint. The game was the first to be set on WMS's now famous Colossal Reels layout, which essentially includes two games within the game, one with a five by four reel set and one with a five by twelve reel set. The game is set up to look like a KISS concert, with symbols like a guitar, a guitar pick, individual band members, Gene Simmons's tongue, the KISS logo, and all four band members in one symbol. </p>

                        <h2 class="title title--h2">Rockin' Bonus Features </h2>
                        <p>There are a few different bonus features that you can look forward to when you play KISS slots. First is the KISS Shout it Out Loud scatter, which is activated when you get three or more bonus symbols lined up on the reels. It starts with a backstage pass, and then you get to choose between either the Rock n Records Free Spin Bonus (with the number of spins determined by how many KISS logos are on the screen), the Band Prize or the KISS Alive Pick em Bonus. The Free Spins round can be anywhere between eight and 20 spins, with a 2x, 5x or 20x multiplier depending on how many scatter symbols you have lined up. </p>
                    </div>
                    <div class="type-right-side">
                        <?php echo getCasinoBlockHTML('kiss', 'game-images'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h2 class="title title--h2">Even More Excitement in the Bonus Round</h2>
                        <p>One of the cool things about this game is that you get to choose which bonus round you want to participate in. As we described above, the free spins feature works much the same as any other free spins bonus round. If you have three scatter symbols lined up, you will get eight free spins at a 2x multiplier. If you have four scatters, you get a 5x multiplier on 12 free spins. If you have five scatters on the screen, you get a 20x multiplier on 20 free spins. This is still including 100 pay lines, so you really have a lot of chances to win! The slot also has nudging wilds appearing on the first, third and fifth wheels, which expand through the reel and even extend into the next adjacent reel. </p>
                        <h2 class="title title--h2">Conclusions - Why we Can't Get Enough of KISS Slots</h2>
                        <p>KISS slots from <a href="/software/williams-interactive" class="text--link" title="Williams Interactive">WMS</a> is the first slots game that ever came out based on a rock n roll band. They could not have chosen a better model than KISS, who are well known for their enthusiastic partying and wild concerts that fit right in with the Vegas lifestyle. We are so excited about the KISS  slot machine being brought online so that we can experience the wild atmosphere right from our computers or smartphones. You will love the bonus features and the overall atmosphere of this game, we guarantee it!</p>
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
