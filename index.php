<?php
    session_start();
    $_SESSION['AUTHORIZE'] = md5(microtime() . rand());
    $title = 'Online Slots Casinos [' . date('Y') . '] - Best Slot Machines in Canada';
    $desc = 'Play the Best Online Slots Sites in Canada (' . date('Y') . ') - Ranked &amp; Reviewed ✓ For Canadian players ✓ Play casino slots online ✓ Huge welcome bonuses!';

    $customATF = 'homepage';
    $customResources = 'homepage';

    $hreflang_alternates = [
        ['hreflang' => 'EN-ca', 'href' => '/'],
        ['hreflang' => 'FR-ca', 'href' => '/fr/'],
    ];

    include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_header.php");
?>

    <section class="section hero-background">

        <div class="container">
            <div class="row type-display-flex type-flex-justify-center">
                <div class="col-12 col-lg-6 col-xl-8 js-toggle-text-container">
                    <h1 class="title title--h1">
                        Your Top Online Slots Casinos <br>in Canada for <?php echo date('Y') ?> <span
                            class="green-text">- Player Approved</span> <br>

                    </h1>

                    <ul class="bullet__list bullet__list--check-green">
                        <li class="bullet__item">
                            The biggest variety of games, including free online slots, to keep you entertained
                        </li>
                        <li class="bullet__item">
                            High quality graphics and sounds for a great online gaming experience
                        </li>
                        <li class="bullet__item">
                            Online slots casinos that are proven to be safe &amp; secure
                        </li>
                        <li class="bullet__item">
                            Excellent welcome bonuses to give you a head start
                        </li>
                    </ul>

                    <div class="js-more">
                        <p class="hero-background__text">
                            There are thousands of Internet slots casinos available to Canadian players. Picking through them to find the best can be confusing. You can waste valuable playing time <span class="js-more__dots">...</span> <span class="js-more__content">as you sift through them. Even worse, you could end up at a bad gambling site and lose a lot of money (or your personal information). That's why a qualified comparison website with experienced reviewers testing the best real money gaming online is the place to go when choosing an online slots Canada website.</span>
                        </p>

                        <div class="mobile__read-more">
                            <span class="type-read-more js-more__trigger">
                                Read more
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="opacity__box">
                        <h4 class="title title--h4">I'm looking for</h4>
                        <div class="slots type-display-flex type-flex-justify-between">
                            <a href="/free" class="slots__item slots__item--green-bg slots__item__green-shadow">
                                <div class="horizontal__line sprite sprite-icon_free"></div>
                                <h3 class="title title--h3">free slots</h3>
                                <div class="half">
                                    <div class="half__circle half__circle--green">
                                        <div class="white__inner-circle">
                                            <svg class="icon icon--x-bold c-green" width="15" height="15" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-angle-right"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/real-money" class="slots__item slots__item--orange-bg slots__item__orange-shadow">
                                <div class="horizontal__line sprite sprite-icon_money"></div>
                                <h3 class="title title--h3">real money slots</h3>
                                <div class="half">
                                    <div class="half__circle half__circle--orange">
                                        <div class="white__inner-circle">
                                            <svg class="icon icon--x-bold c-orange" width="15" height="15" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-angle-right"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section best-online-slots type-section-padding">
        <div class="container">
            <div class="info__container type-display-flex type-flex-justify-between">
                <div class="type-left-side">
                    <h2 class="title title--h2">
                        The Very Best Online Slots Casinos
                    </h2>
                    <p>
                        There are thousands of online casinos to play slots at, so picking the right one can be
                        overwhelming. That’s why our team of experts has filtered through all of them to provide you
                        with the best ones out there.
                    </p>
                </div>

                <div class="type-right-side">
                    <img src="images/redesign/safe_and_secure.png"
                         alt="safe and secure" width="204" height="212">
                </div>
            </div>

            <?php $unity->outputToplist(); ?>

        </div>
    </section>

    <section class="section jackpot type-section-padding--large">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <h2 class="title title--h2">
                        Why Use Our Site?
                    </h2>
                    <p>
                        You&rsquo;re looking for the best <a href="/online-casinos">online casinos</a> - We are too! Our team of experts are responsible
                        for thoroughly checking and testing all the casino sites we list here to ensure you only get the
                        best. From trying out <a href="/games/">slot games</a> and cashing out deposits, to contacting customer care and confirming
                        all the security measures are in place, you can rest assured that all the sites on our list are
                        nothing short of excellent.
                    </p>
                    <p>
                        We also keep our list of top casinos updated. We&rsquo;re aware that new casinos are constantly
                        popping up, meaning that older casinos have to keep up. This is why we conduct regular tests and
                        check-ups so that we ensure you have access to the latest and best sites out there, whenever you
                        visit us!
                    </p>

                    <img class="hidden__block lazy img-respond" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 566 333'%3E%3C/svg%3E" data-src="/images/redesign/megah-moolah-hp.jpg" alt="Megah Moolah slots" width="566" height="333">

                </div>

                <div class="col-12 col-lg-6 col-xl-6">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/jackpot.php"); ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/site-finder.php"); ?>
            </div>
        </div>
    </section>

    <section class="section grid__box type-section-padding--large">
        <div class="container">
            <div class="type-display-flex type-flex-justify-start">
                <a href="/free" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_free_big"></i>
                    </div>
                    <h3 class="title title--h3">
                        Free Slots
                    </h3>
                    <p>
                        The best selection of free slots for Canadians.
                    </p>
                </a>

                <a href="/bonuses" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_free_big"></i>
                    </div>
                    <h3 class="title title--h3">
                        Slot Machines
                    </h3>
                    <p>
                        Play your favourite slot machines online.
                    </p>
                </a>

                <a href="/deposit/" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_pig"></i>
                    </div>
                    <h3 class="title title--h3">
                        Deposit Methods
                    </h3>
                    <p>
                        It&rsquo;s quick and easy to deposit your cash with these options.
                    </p>
                </a>

                <a href="/games/video-slots" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_video_games"></i>
                    </div>
                    <h3 class="title title--h3">
                        Video Slots
                    </h3>
                    <p>
                        High quality casino games with amazing game play.
                    </p>
                </a>

                <a href="/vip" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_video_games"></i>
                    </div>
                    <h3 class="title title--h3">
                        VIP
                    </h3>
                    <p>
                        Get 5-star benefits with a VIP status.
                    </p>
                </a>

                <a href="/mobile" class="grid-box__item">
                    <div class="blue__circle">
                        <i class="sprite sprite-icon_mobile"></i>
                    </div>
                    <h3 class="title title--h3">
                        Mobile Slots
                    </h3>
                    <p>
                        Play slots on the go with your mobile phone or tablet.
                    </p>
                </a>
            </div>
            <h2 class="title title--h2">
                Playing Slots, the Right Way
            </h2>
            <p>
                Despite slot machines being one of the easiest forms of gambling, there&rsquo;s a lot more to them than
                simply
                sitting down at a table with good graphics and mindlessly spinning those wheels.
            </p>
            <p>
                Before you start playing any online slot, it’s important to pay attention to the rules of each game.
                Although the basics for each game are going to be similar, there are differences, especially the
                slot machines with bonus games. These differences can have a huge impact on how you play.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="table__data">
                <div class="table-data__header type-display-flex type-flex-justify-between">
                    <h3 class="title title--h3">
                        Comparison of Casino Software for Canadians
                    </h3>
                </div>
                <div class="table">
                    <div class="table__row">
                        <div class="type-display-flex">
                            <div class="table__row-item type-display-flex type-flex-justify-between">
                                <div class="table-image__holder">
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 174 43'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/microgaming-logo.png"
                                        alt="Microgaming Logo"
                                        width="100" height="60">
                                </div>
                                <div class="conted__games type-display-flex">
                                    <span><span class="count">850</span><br>games</span>
                                </div>
                                <div class="table__cell">
                                    <div class="table__cell-item border__circle--margin-bottom">
                                        <div class="orange__circle">
                                            <svg class="icon" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-device.svg#icon-mobile"></use>
                                            </svg>
                                        </div>
                                        <span><span class="table__number">350</span>Mobile</span>
                                    </div>
                                    <div class="table__cell-item">
                                        <div class="orange__circle">
                                            <svg class="icon c-white" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-triangle-right"></use>
                                            </svg>
                                        </div>
                                        <span><span
                                                class="table__number">20</span>Live</span>
                                    </div>
                                </div>
                                <div class="type-display-flex type-flex-justify-between" style="width: 120px;">
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-apple"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-android"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-blackberry"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-windows"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="vip__support">
                                    <svg class="icon c-orange mb-8" width="60" height="60" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-star-solid"></use>
                                    </svg>
                                    <p>VIP</p>
                                    <p>Support</p>
                                </div>
                                <div class="top__casino">
                                    <p class="top__casino-title">Top casino:</p>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 121 46'%3E%3C/svg%3E"
                                        data-src="images/logos/jackpot_home_logo.png"
                                        alt="Jackpot City"
                                        width="100" height="60">
                                    <a href="/reviews/jackpot-city" class="type-read-more read-more--orange">Read
                                        review</a>
                                </div>
                            </div>
                            <div class="comparison__info">
                                <div class="top">Est. 1994</div>
                                <ul class="comparison__info-list">
                                    <li class="comparison__item">License:</li>
                                    <li class="comparison__item"><span class="text--bold">Isle of Man</span></li>
                                    <li class="comparison__item">Tested by</li>
                                    <li class="comparison__item"><span class="text--bold">Gambling</span></li>
                                    <li class="comparison__item"><span class="text--bold">Commission</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile__layer"><i class="fa fa-angle-right"></i></div>
                    </div>
                    <div class="table__row">
                        <div class="type-display-flex">
                            <div class="table__row-item type-display-flex type-flex-justify-between">
                                <div class="table-image__holder">
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 119 42'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/netent-logo.png" alt="NetEnt"
                                        width="100" height="60">
                                </div>
                                <div class="conted__games type-display-flex">
                                    <span><span class="count">250</span><br>games</span>
                                </div>
                                <div class="table__cell">
                                    <div class="table__cell-item border__circle--margin-bottom">
                                        <div class="orange__circle">
                                            <svg class="icon" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-device.svg#icon-mobile"></use>
                                            </svg>
                                        </div>
                                        <span><span class="table__number">100</span>Mobile</span>
                                    </div>
                                    <div class="table__cell-item">
                                        <div class="orange__circle">
                                            <svg class="icon c-white" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-triangle-right"></use>
                                            </svg>
                                        </div>
                                        <span><span
                                                class="table__number">10</span>Live</span>
                                    </div>
                                </div>
                                <div class="type-display-flex type-flex-justify-between" style="width: 120px;">
                                <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-apple"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-android"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-blackberry"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-windows"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="vip__support">
                                    <svg class="icon c-orange mb-8" width="60" height="60" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-star-solid"></use>
                                    </svg>
                                    <p>VIP</p>
                                    <p>Support</p>
                                </div>
                                <div class="top__casino">
                                    <p class="top__casino-title">Top casino:</p>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 98 28'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/betway-logo.png"
                                        alt="Betway"
                                        width="100" height="60">
                                    <a href="/reviews/betway" class="type-read-more read-more--orange">Read review</a>
                                </div>
                            </div>
                            <div class="comparison__info">
                                <div class="top">Est. 1996</div>
                                <ul class="comparison__info-list">
                                    <li class="comparison__item">License:</li>
                                    <li class="comparison__item"><span class="text--bold">Isle of Man</span></li>
                                    <li class="comparison__item">Tested by</li>
                                    <li class="comparison__item"><span class="text--bold">Gambling</span></li>
                                    <li class="comparison__item"><span class="text--bold">Commission</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile__layer"><i class="fa fa-angle-right"></i></div>
                    </div>

                    <div class="table__row">
                        <div class="type-display-flex">
                            <div class="table__row-item type-display-flex type-flex-justify-between">
                                <div class="table-image__holder">
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 133 50'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/igt-logo.png"
                                        alt="IGT Logo"
                                        width="100" height="60">
                                </div>
                                <div class="conted__games type-display-flex">
                                    <span><span class="count">100</span><br>games</span>
                                </div>
                                <div class="table__cell">
                                    <div class="table__cell-item border__circle--margin-bottom">
                                        <div class="orange__circle">
                                            <svg class="icon" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-device.svg#icon-mobile"></use>
                                            </svg>
                                        </div>
                                        <span><span class="table__number">40</span>Mobile</span>
                                    </div>
                                    <div class="table__cell-item">
                                        <div class="orange__circle">
                                        <svg class="icon c-white" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-triangle-right"></use>
                                            </svg>
                                        </div>
                                        <span><span
                                                class="table__number">9</span>Live</span>
                                    </div>
                                </div>
                                <div class="type-display-flex type-flex-justify-between" style="width: 120px;">
                                <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-apple"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-android"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-blackberry"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-windows"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="vip__support">
                                    <svg class="icon c-orange mb-8" width="60" height="60" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-star-solid"></use>
                                    </svg>
                                    <p>VIP</p>
                                    <p>Support</p>
                                </div>
                                <div class="top__casino">
                                    <p class="top__casino-title">Top casino:</p>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 119 42'%3E%3C/svg%3E"
                                        data-src="images/logos/spin_home_logo.png"
                                        alt="Spin Casino"
                                        width="100" height="60">
                                    <a href="/reviews/spin-casino" class="type-read-more read-more--orange">Read
                                        review</a>
                                </div>
                            </div>
                            <div class="comparison__info">
                                <div class="top">Est. 2005</div>
                                <ul class="comparison__info-list">
                                    <li class="comparison__item">License:</li>
                                    <li class="comparison__item"><span class="text--bold">UK</span></li>
                                    <li class="comparison__item">Tested by</li>
                                    <li class="comparison__item"><span class="text--bold">GLI</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile__layer"><i class="fa fa-angle-right"></i></div>
                    </div>
                    <div class="table__row">
                        <div class="type-display-flex">
                            <div class="table__row-item type-display-flex type-flex-justify-between">
                                <div class="table-image__holder">
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 160 33'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/playtech-logo.png"
                                        alt="Playtech Logo"
                                        width="100" height="60">
                                </div>
                                <div class="conted__games type-display-flex">
                                    <span><span class="count">500</span><br>games</span>
                                </div>
                                <div class="table__cell">
                                    <div class="table__cell-item border__circle--margin-bottom">
                                        <div class="orange__circle">
                                            <svg class="icon" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-device.svg#icon-mobile"></use>
                                            </svg>
                                        </div>
                                        <span><span class="table__number">35</span>Mobile</span>
                                    </div>
                                    <div class="table__cell-item">
                                        <div class="orange__circle">
                                        <svg class="icon c-white" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-triangle-right"></use>
                                            </svg>
                                        </div>
                                        <span><span
                                                class="table__number">17</span>Live</span>
                                    </div>
                                </div>
                                <div class="type-display-flex type-flex-justify-between" style="width: 120px;">
                                <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-apple"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-android"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-blackberry"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-windows"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="vip__support">
                                    <svg class="icon c-orange mb-8" width="60" height="60" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-star-solid"></use>
                                    </svg>
                                    <p>VIP</p>
                                    <p>Support</p>
                                </div>
                                <div class="top__casino">
                                    <p class="top__casino-title">Top casino:</p>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 119 42'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/betway-logo.png"
                                        alt="Betway Logo"
                                        width="100" height="60">
                                    <a href="/reviews/betway" class="type-read-more read-more--orange">Read review</a>
                                </div>
                            </div>
                            <div class="comparison__info">
                                <div class="top">Est. 1999</div>
                                <ul class="comparison__info-list">
                                    <li class="comparison__item">License:</li>
                                    <li class="comparison__item"><span class="text--bold">Isle of Man</span></li>
                                    <li class="comparison__item">Tested by</li>
                                    <li class="comparison__item"><span class="text--bold">Gambling</span></li>
                                    <li class="comparison__item"><span class="text--bold">Commission</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile__layer"><i class="fa fa-angle-right"></i></div>
                    </div>
                    <div class="table__row">
                        <div class="type-display-flex">
                            <div class="table__row-item type-display-flex type-flex-justify-between">
                                <div class="table-image__holder">
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 116 44'%3E%3C/svg%3E"
                                        data-src="/images/software-overview-table/betsoft-logo.png"
                                        alt="Betsoft Logo"
                                        width="100" height="60">
                                </div>
                                <div class="conted__games type-display-flex">
                                    <span><span class="count">135</span><br>games</span>
                                </div>
                                <div class="table__cell">
                                    <div class="table__cell-item border__circle--margin-bottom">
                                        <div class="orange__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-device.svg#icon-mobile"></use>
                                            </svg>
                                        </div>
                                        <span><span class="table__number">30</span>Mobile</span>
                                    </div>
                                    <div class="table__cell-item">
                                        <div class="orange__circle">
                                            <svg class="icon c-white" width="22" height="22" aria-hidden="true">
                                                <use xlink:href="/dist/icons/icons-core.svg#icon-triangle-right"></use>
                                            </svg>
                                        </div>
                                        <span><span
                                                class="table__number">5</span>Live</span>
                                    </div>
                                </div>
                                <div class="type-display-flex type-flex-justify-between" style="width: 120px;">
                                <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-apple"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle border__circle--margin-bottom">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-android"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-blackberry"></use>
                                        </svg>
                                    </div>
                                    <div class="border__circle">
                                        <svg class="icon" width="22" height="22" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-device.svg#icon-windows"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="vip__support">
                                    <svg class="icon c-orange mb-8" width="60" height="60" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-star-solid"></use>
                                    </svg>
                                    <p>VIP</p>
                                    <p>Support</p>
                                </div>
                                <div class="top__casino">
                                    <p class="top__casino-title">Top casino:</p>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 78 30'%3E%3C/svg%3E"
                                        data-src="images/software-overview-table/ruby-fortune-logo.png"
                                        alt="Ruby Fortune"
                                        width="100" height="60">
                                    <a href="/reviews/ruby-fortune" class="type-read-more read-more--orange">Read
                                        review</a>
                                </div>
                            </div>
                            <div class="comparison__info">
                                <div class="top">Est. 2005</div>
                                <ul class="comparison__info-list">
                                    <li class="comparison__item">License:</li>
                                    <li class="comparison__item"><span class="text--bold">Malta</span></li>
                                    <li class="comparison__item">Tested by</li>
                                    <li class="comparison__item"><span class="text--bold">TST</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile__layer"><i class="fa fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="type-section-padding">
                <h2 class="title title--h2">
                    Fair and safe online slots Canada
                </h2>
                <p>
                    The <a href="/real-money" class="text--link">real money Canadian online slots</a> that we recommend
                    are
                    regulated so they are fair and honest. There&rsquo;s a lot more to gambling with online Canadian
                    slots
                    than
                    simply sitting down at a fair table with good graphics and lots of options to choose from, however.
                    The
                    first thing you need to do is make sure you completely understand the rules of the game you want to
                    play. Don&rsquo;t assume that just because you move from one slots game to the next that the rules
                    will be
                    the
                    same. They won&rsquo;t. Every single online slot machine game has its own rules and betting
                    structure.
                </p>
            </div>
        </div>
    </section>

    <section class="section section free-slots type-section-padding">
        <div class="container">
            <h2 class="title title--h2">
                Our Top 5 Free Slots
                <br>
                Picked by Slot Players
            </h2>
            <p>
                Although slots are one of the easiest games to get the hang of, which is why they’re so popular
                worldwide, a little practice never hurt anyone. Before risking your hard-earned cash, practice with <a href="/free">free slots</a>.
                You can get a feel of the game and see how often it pays out before you make a <a href="/deposit/">deposit</a>.
                Free slots are also ideal if you’re a beginner or you simply want to relax and take a break from real
                money games. Check out our top 4 free slots games here.
            </p>

            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/includes/games/homepage-free-slots.php';
            ?>

            <a href="/free"
               class="free-slots__btn primary-btn primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green primary-btn--hover">
                PLAY MORE FREE SLOTS
                <div class="white__inner-circle">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </section>

    <section class="section type-section-padding">
        <div class="container">
            <p>
                The rules for slot games are generally contained in the paytables on each machine, as well as in the
                extra information for <a href="/progressive-jackpots">progressive jackpots</a>. Be sure to read through them thoroughly, especially when it
                comes to the ways in which <a href="/bonuses">slot bonuses</a> can affect payouts. That&rsquo;s your chance to win
                valuable
                additional money or free spins. Most of the best Canadian online slots games have much lower limits than
                you would find in land-based casino slots machines. That means your dollars will go much further and
                give you more chances at playing, having a good time, and ultimately, winning.
            </p>

            <div class="getting-most__slots">
                <h2 class="title title--h2">
                    Your 1 Minute Guide To Getting The Most From Slots
                </h2>
                <ul class="bullet__list">
                    <li class="bullet__item">
                        <svg class="icon icon--red-white v-align-bot" width="25" height="25" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                        Pay attention to paytables because not all video slots are made the same.
                    </li>
                    <li class="bullet__item">
                        <svg class="icon icon--red-white v-align-bot" width="25" height="25" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                        Get a good welcome bonus and look out for free spins. These will help your funds stretch further
                        for free.
                    </li>
                    <li class="bullet__item">
                        <svg class="icon icon--red-white v-align-bot" width="25" height="25" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                        Set aside a budget to play with. Don&rsquo;t gamble with money you can&rsquo;t afford to lose.
                    </li>
                    <li class="bullet__item">
                        <svg class="icon icon--red-white v-align-bot" width="25" height="25" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                        Test free online slots for fun to get used to how it plays.
                    </li>
                    <li class="bullet__item">
                        <svg class="icon icon--red-white v-align-bot" width="25" height="25" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                        If you want to win big, look for progressive slots.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section further__information type-section-padding">
        <div class="container">
            <div class="type-display-flex type-flex-justify-between">
                <div class="type-left-side">
                    <h2 class="title title--h2">
                        Test Your Luck with Free Play
                    </h2>
                    <p>
                        The rules for slot games are generally contained in the paytables on each machine, as well as in
                        the extra information for progressive jackpots. Be sure to read through them thoroughly,
                        especially when it comes to the ways in which a slot’s bonus games can affect payouts. That&rsquo;s
                        your chance to win valuable additional money or free spins. Most of the best Canadian online
                        slots games have much lower limits than you would find in land-based casino slots machines. That
                        means your dollars will go much further and give you more chances at playing, having a good
                        time, and ultimately, winning.
                    </p>
                    <p>
                        Remember though, there's only one way to actually win real money at slots online: that&rsquo;s
                        to
                        deposit and bet real money. You won’t hit the big jackpots if you only ever stick to free slots
                        games.
                    </p>
                    <p>
                        We make sure that the online Canadian casinos that we list all have easy to use <a href="/software/">casino software</a>,
                        have responsive support, and are simple to join. This way, you can easily find the
                        best free and real money casino slot machines to play without having to do the research
                        yourself.
                    </p>
                </div>

                <div class="type-right-side">
                    <div class="quick__guide">
                        <h3 class="title title--h3 type-display-flex type-flex-justify-between">
                            <span>Quick Slots Guide</span>
                        </h3>
                        <ul class="bullet__list">
                            <li class="bullet__item">Make sure you get the best bonus</li>
                            <li class="bullet__item">Only play at safe, secure sites</li>
                            <li class="bullet__item">Try out games for free first</li>
                            <li class="bullet__item">Play at casinos which give you your winnings fast</li>
                            <li class="bullet__item">Play free online slots on the move on your mobile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="quote-block">
                <svg class="icon quote-block__icon" width="100" height="100" aria-hidden="true">
                    <use xlink:href="/dist/icons/icons-core.svg#icon-quote-right"></use>
                </svg>
                <div style="position: relative;">
                    "The sites we list for Canadian players ensure that you are playing the best slots online in a way
                    that you can trust."
                </div>
            </div>

            <h2 class="title title--h2">
                A final word
            </h2>
            <p>
                Our casino reviewers have spent years playing Canadian online slots and know what players want to make
                their experience fun and safe. Each of our reviewers spends hours each day combing the web and mobile
                app stores for the best real money online slots sites, as well as making a deposit and comparing games
                so you don’t have to.
            </p>
            <p>
                So, what are you waiting for?
            </p>
            <p>
                Choose one of our top online casinos and see for yourself how much fun it is to play these exciting slot
                machines, as well as Blackjack, Roulette, Craps, Video Poker and more. And don’t forget those
                multi-million dollar jackpots waiting to be won.
            </p>
            <!--top game -->
            <?php
               $unity->outputTopPartnerSingleItemFromToplist();
            ?>
        </div>
    </section>

    <section class="section faq__area">
        <div class="container">
            <h2 class="title title--h2">
                Online Slots FAQ
            </h2>
            <p>We understand that you might have some questions relating to online slots, so we&rsquo;ve prepared a
                detailed
                FAQ that will provide you with what you need to know. Then you can get back to playing some great video
                slots games and having fun play at our top-rated Canadian casinos.
            </p>
            <div class="faq__accordion">
                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                    How do I deposit to play online slots games? <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>

                            There are a variety of methods players can use to deposit at an online casino, and they have
                            a variety of advantages and disadvantages. Credit cards are the easiest to use and give you
                            instant access to your money, as do many e-wallet solutions. You can also use bank transfers
                            <a href="/deposit/" class="text--link text--bold">to make a deposit</a>, or even an e-check.
                            However, these traditional methods do take longer.
                        </p>
                        <p>
                            Players will also need to create an account at the site and provide some details. Do
                            remember that, when you come to withdraw your winnings, you may also be asked to provide
                            identification, such as an ID card or a driver&rsquo;s license.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Will I get a welcome bonus as a slots player? <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            You most certainly will. Internet casinos are unique in offering these incentives to players
                            and you can really boost your bankroll with that extra cash. However, you won&rsquo;t be
                            able to
                            withdraw it straight away - you must use that bonus cash to play the online casino games on
                            offer (the casinos will help you, not simply hand out free money).
                        </p>
                        <p>
                            Therefore, do check out the "playthrough requirements" of a bonus. Normally these stipulate
                            how much you must gamble before you can withdraw your money. The great news is that slot
                            machines usually have the lowest playthrough requirements! Bonuses aren’t just monetary,
                            either. You can also unlock other amazing bonuses like free spins which can be used on all
                            sorts of video slots.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Can I play casino games for free?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            Yes, you can. Almost all of the games offer free play versions (some of those with a
                            progressive jackpot do not). That gives players the opportunity to test out the games and
                            get a feel of any specific bonus games and jackpots before risking any real money. Knowing
                            your bonus rounds also gives you the best chance of grabbing any free spins that might be
                            available when it’s time to spin the reels.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Do I have to download software?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            No, you don&rsquo;t. Many Internet slots casinos for Canadians offer web-based casino sites
                            and no
                            download slots that allow you to play different types of mobile slot, as well as classic
                            slots and all the usual online casino slots, in your browser, or even on your mobile. That
                            means you can enjoy your favourite games even if you are not on your PC, or are working
                            around a firewall.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                What kind of slot games will I find?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            There are a HUGE variety of online slot machine games to choose from. Many of the casinos we
                            recommend are powered by Microgaming, an industry leader for slots online. Whether you are
                            looking for 3-reel, 5-reel or multi-reel action, they have a
                            <a href="/guides/slot-machine-history" class="text--link text--bold">slots machine</a> for
                            you.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Do you have to pay taxes on your gambling winnings in Canada?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            The best thing about playing online slots in Canada is that gambling is treated like a
                            business. Therefore, unless online gambling is your main source of income (and that probably
                            accounts for a tiny percentage of the populace) then you won't be taxed. If you're finding
                            that your income is increasingly consisting of online gambling winnings, you may need to
                            look at having a secondary, 'regular' income which is treated as your main job.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Do you have a wide choice of casinos to play at?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            Yep. There's a huge range of slots casinos available to Canadian players - all offering a
                            massive portfolio of top online slots games - and with Indian reservations hosting servers
                            for worldwide real money online casinos, that list is only getting longer. The hardest
                            decision you'll have to make is picking an online casino to play slots at.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Is it easy to make deposits and withdrawals at online casinos?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            Easy <a href="/deposit/" class="text--link text--bold">banking options </a>are what great
                            slots casinos for Canadians are all about. Whether it's a Visa debit card, Mastercard credit
                            card or an e-Wallet like Skrill or Click2Pay, making deposits on your favourite online
                            casino is as easy as pulling out your card and logging onto your account. Some online
                            casinos even take Canadian dollars, so players don’t need to waste time exchanging CAD
                            before opening up exciting casino games.
                        </p>
                    </div>
                </div>

                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Can you play other games apart from slots at these sites?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                    <div class="accordion__content">
                        <p>
                            The best online casinos for players in Canada will offer plenty of free and real money slots
                            games, but also a great range of casino games like roulette, blackjack, punto banco and
                            casino poker. It's rare for a site to specialize in just slots games, but that doesn't mean
                            an online casino doesn't show online slots the respect they deserve, they are many casinos'
                            big draw after all, particularly if they have games carrying heavy progressive jackpots and
                            bonuses. There’s an increasing demand for different types of free slot games, in addition to
                            the traditional classic slots, progressive slots and jackpot slots on offer at most online
                            casinos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/structured-data/corporation-schema.php');
include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
