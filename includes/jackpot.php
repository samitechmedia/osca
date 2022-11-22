<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/jackpots/jackpot_include.php");

    $megaAmount = '11473895';
    $mega_query = 'SELECT `date`,`MegaMoolahMega` FROM jackpots ORDER BY date DESC LIMIT 1';
    $mega_data = mysqli_query($dbc, $mega_query);
    while ($row = mysqli_fetch_array($mega_data)) {

        $megaDate = $row['date'];
        $megaAmount .= $row['MegaMoolahMega'] . '.00';
    }
?>

<script>
    var amount_one = <?php echo !empty($megaAmount) ? $megaAmount : '-1'; ?>;
</script>

<div class="jackpot__area">
    <div class="ribbon">
        <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 182 181'%3E%3C/svg%3E" data-src="/images/redesign/mega-moolah-ribon.png" alt="Ribon showing total payouts" width="182" height="181">
    </div>
    <h2 class="title title--h2">play for <?php echo date('F') . '\'s'; ?> top jackpot</h2>
    <p class="jackpot__text  jackpot__area--light">at <a href="/reviews/jackpot-city">Jackpot City</a> with C&dollar;1600 BONUS</p>
    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 174 115'%3E%3C/svg%3E" data-src="/images/redesign/moolach_image.jpg" alt="Mega Moolah Logo" width="174" height="115">
    <p class="type-text-uppercase text--bold jackpot__area--light">CURRENT JACKPOT</p>
    <p class="jackpot__price ">C&dollar;<span class="sum_ticker1"></span></p>
    <p class="type-rose-text-color">Most recent win:</p>
    <p class="jackpot__area__win jackpot__area--light"> <?php
            echo  'C&dollar; 18,915,872.81 million in ' .  date('M Y', strtotime("last month"));
        ?>    </p>
    <a href="/go/jackpotcity/casino" target="_blank" rel="nofollow noreferrer" class="primary-btn primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green primary-btn--hover">
        PLAY NOW
        <div class="white__inner-circle">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </div>
    </a>
    <p class="jackpot__area--light">at Jackpot City</p>
</div>
