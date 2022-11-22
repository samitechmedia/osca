<?php

    $title = 'Progressive Jackpots Guide - How Online Slots Jackpots Work';
    $desc = 'Progressive Jackpots Guide - Learn how these huge slots prizes work with our expert guide to progressive jackpot online casino games.';
    $bc = 'Progressive Jackpots';

    require_once $_SERVER["DOCUMENT_ROOT"] . '/CodeLibrary/Php/Setup/Loader.php';
    $jackpotSystem = new CodeLibrary\Php\Controllers\JackpotSystem\JackpotSystem();
    $jackpotResults = $jackpotSystem->filterJackpots(0, 1);

    include $_SERVER['DOCUMENT_ROOT'] . "/includes/onca_header.php";
?>

    <section class="section type-section-padding-bottom further__information">
        <div class="container">
            <div class="type-display-flex type-flex-justify-center-top">
                <div class="type-left-side">
                    <h1 class="title title--h2">Progressive Jackpots 101 – Your Guide to Winning Big</h1>
                    <p>Know how huge winnings are made possible?</p>
                    <p>Progressive jackpots. </p>
                    <p>A progressive jackpot is an accumulation of losing bets made at a <a
                            href="/guides/slot-machine-history" class="text--link">slot machine</a> or video poker
                        machine that is part of a designated group. Once a player gets lucky and wins the jackpot, the
                        jackpot gets reset to its original amount.</p>
                    <h2 class="title title--h2">Progressive Jackpots in a Nutshell</h2>
                    <p>The more losing spins a slot machine doles out or the more hands are lost at a video poker
                        machine, the bigger its progressive jackpot gets. Some believe that the bigger the progressive
                        jackpot, the closer you are to winning it.</p>
                    <p>Just like the ocean is made up of many drops, a progressive jackpot consists of portions of bets
                        made by any player who loses a spin or a hand. Usually, a progressive jackpot is pooled between
                        multiple slot machines or video poker machines and anyone playing one of those machines has a
                        shot at winning the entire thing.</p>
                    <p>Once someone gets lucky and wins the jackpot, the collection pool is reset to zero.</p>
                </div>
                <div class="type-right-side">
                    <div class="quick__guide">
                        <h3 class="title title--h3 type-display-flex type-flex-justify-between"><span>Quick
                                Facts</span></h3>
                        <ul class="bullet__list">
                            <li class="bullet__item">Progressives are jackpots generated across a network of thousands
                                of online slots. Each time a player plays a machine on the network a portion of their
                                bet is reserved for the progressive jackpot.
                            </li>
                            <li class="bullet__item">This means prizes can climb into the millions before they are hit
                                by a player on the network.
                            </li>
                            <li class="bullet__item">The variety between games is enormous, as online casinos are not
                                limited by floor space.
                            </li>
                            <li class="bullet__item">Progressives often require you to bet max in order to hit the big
                                one. Keep an eye on the progressives at a number of different casinos, and play them
                                only when they get high.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section type-section-padding-bottom">
        <div class="container">
            <div class="block-progressive-jackpots" id="progressive-jackpots">
                <div class="block-progressive-jackpots__heading block-progressive-jackpots__heading--red">
                    Explore range of Jackpots
                </div>

                <!--EDIT CODE HERE-->
                <div class="block-progressive-jackpots__filter">

                    <div class="filter-wrap">
                        <div class="item filter-clear">
                            <span>Clear all</span> <i class="filter-close">&times;</i>
                        </div>
                        <div class="filter-switch">
                            <div class="filter-title">
                                Filters:
                            </div>
                            <label class="switch-light switch-rating">
                                <input type="checkbox">
                                <span>
                                <span>high to low</span>
                                <span>low to high</span>
                                <a></a>
                            </span>
                            </label>
                        </div>
                    </div>

                    <div class="select-casino">
                        <div class="list-casino">
                            <div class="item" data-id="1">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 76 45'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/microgaming.png" alt="Microgaming" width="76" height="45">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                            <div class="item" data-id="2">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 70 41'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/gamesys.png" alt="Gamesys" width="70" height="41">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                            <div class="item" data-id="3">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 31'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/betsoft.png" alt="BetSoft" width="80" height="31">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                            <div class="item" data-id="4">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 114 24'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/playtech.png" alt="Playtech" width="114" height="24">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                            <div class="item" data-id="5">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 81 30'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/netent.png" alt="Netent" width="81" height="30">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                            <div class="item" data-id="6">
                                <div class="logo-casino">
                                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 110 30'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/logos/realTimeGaming.png"
                                         alt="Real Time Gaming" width="110" height="30">
                                    <i class="filter-close">&times;</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="choose-casinos">
                        Choose casinos
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </div>
                </div>

                <a class="block-progressive-jackpots__jackpot-games"
                   href="<?php $unity->outputTopPartnerSingleItemFromToplist('PartnerLink.php'); ?>" target="_blank" rel="nofollow noreferrer">

                <?php
                    $c = 1;

                    foreach ($jackpotResults as $jackpot) {

                        $image = $jackpot['image'];

                        if ($jackpot['provider'] == 1) {
                            $providerImage = 'microgaming';
                        } elseif ($jackpot['provider'] == 3) {
                            $providerImage = 'playtech';
                        } elseif ($jackpot['provider'] == 2) {
                            $providerImage = 'netent';
                        } elseif ($jackpot['provider'] == 4) {
                            $providerImage = 'gamesys';
                        } elseif ($jackpot['provider'] == 5) {
                            $providerImage = 'betsoft';
                        } elseif ($jackpot['provider'] == 6) {
                            $providerImage = 'rtg';
                        }

                        if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/images/progressive-jackpots-page/progressive-jackpot-logos/' . $providerImage . '/' . $image . '.png'))
                        { ?>
                            <div class="block-progressive-jackpots__jackpot-game <?php echo $image; ?>">

                                <div class="block-progressive-jackpots__title-game">
                                    <?php echo $jackpot['name']; ?>
                                </div>

                                <div class="block-progressive-jackpots__logo-game">
                                    <img alt="<?php echo $jackpot['name']; ?> Logo"
                                        class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 85 48'%3E%3C/svg%3E"
                                        data-src="/images/progressive-jackpots-page/progressive-jackpot-logos/<?php echo $providerImage; ?>/<?php echo $image; ?>.png"
                                        width="85" height="48">
                                </div>

                                <div class="block-progressive-jackpots__value-jackpot <?php echo $image; ?>">
                                    &#8364;<?php echo number_format($jackpot['amount']); ?>
                                </div>

                                <div class="block-progressive-jackpots__btn-play-now">
                                    Play Now
                                </div>
                            </div>

                        <?php }
                    } ?>
                </a>
            </div>
        </div>
    </section>

    <section class="section type-section-padding-bottom">
        <div class="container">
            <h2 class="title title--h2">Two Things You Should Know About Progressive Jackpots</h2>
            <div class="flex__md">
                <div class="width-lrg-percentage-70">
                    <p>When it comes to progressive jackpots, it is important to know two things:</p>
                    <ol>
                        <li>Playing the maximum number of lines is in your best interest because it increases your
                            chances of winning the progressive jackpot.
                        </li>
                        <li>Large bets mean large prizes! There are no direct or extra costs you should worry about. It
                            may seem like an unlikely possibility, but you can definitely hit a progressive jackpot if
                            it’s your lucky day.
                        </li>
                    </ol>
                    <p>
                        Until progressive jackpots came into being, the only gamblers that were winning millions of
                        dollars in Canada were lottery players. Today, though, slots players have unlimited access to
                        these jackpots that are worth hundreds of thousands, if not millions, of dollars. Read on and
                        find out exactly how they work and what it takes to become the next big winner.
                    </p>

                </div>
                <div class="hide-sm">
                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E"
                         data-src="/images/progressive-jackpots-page/two-things-you-should-know.png"
                         alt="Progressive Jackpots"
                         width="200" height="200">
                </div>
            </div>

        <div class="block-top-tips">
            <div class="title">How to Find the Best Machines for Progressive Jackpots</div>
            <p>There are lots of factors that set a slot machine apart from the others, but the top three factors to
                look for are:</p>
            <div class="box-row flex__md flex--space-between m-t-20 m-b-20">
                <div class="box-col">
                    <div class="box-tip no-left-pad">
                        <div class="box-num-badge">1</div>
                        <p class="badge">A high degree of trust</p>
                    </div>
                </div>
                <div class="box-col">
                    <div class="box-tip no-left-pad">
                        <div class="box-num-badge">2</div>
                        <p class="badge">A high payout percentage</p>
                    </div>
                </div>
                <div class="box-col">
                    <div class="box-tip no-left-pad">
                        <div class="box-num-badge">3</div>
                        <p class="badge">A fun design that catches your eye</p>
                    </div>
                </div>
            </div>
            <p>When we look at progressive jackpots specifically, you want to keep an eye out for the biggest jackpots
                possible (it's a long shot - you'd better get paid for it!) and consider progressive jackpots that have
                multiple tiers.The more tiers a progressive jackpot has, the higher your chances are of bringing home a
                lot of money.</p>
            <p>Basically, the best machines for progressive jackpots have the biggest jackpots and multiple tiers.</p>
        </div>
        <h2 class="title title--h2">Mega Moolah's Biggest Winners</h2>
        <p>Microgaming's record-breaking slot has crowned many a millionaire over the years. Let's take a look at some
            of the biggest jackpot champs in the game's history.</p>
        <div class="mm-winners-table">
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">1&nbsp;&nbsp;Jonathan Heywood</div>
                        <div class="mm-winners-table__cell">$20.06 million (2015)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">2&nbsp;&nbsp;Marcus Goodwin</div>
                        <div class="mm-winners-table__cell">$11.6 million (2016)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">3&nbsp;&nbsp;Anonymous</div>
                        <div class="mm-winners-table__cell">C$11.6 million (2016)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">4&nbsp;&nbsp;John Orchard</div>
                        <div class="mm-winners-table__cell">$9.49 million (2012)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">5&nbsp;&nbsp;Georgios M.</div>
                        <div class="mm-winners-table__cell">$8.65 million (2009)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">6&nbsp;&nbsp;Rawiri Pou</div>
                        <div class="mm-winners-table__cell">$8.33 million (2016)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">7&nbsp;&nbsp;Mark A.</div>
                        <div class="mm-winners-table__cell">C$7.5 million (2015)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">8&nbsp;&nbsp;Gabriel L</div>
                        <div class="mm-winners-table__cell">$5.94 million (2013)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">9&nbsp;&nbsp;Klaus E.</div>
                        <div class="mm-winners-table__cell">$5.56 million (2008)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">10&nbsp;&nbsp;A.D.</div>
                        <div class="mm-winners-table__cell">$5.3 million (2011)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">11&nbsp;&nbsp;"G.M."</div>
                        <div class="mm-winners-table__cell">$3.9 million (2014)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">12&nbsp;&nbsp;"I.R."</div>
                        <div class="mm-winners-table__cell">€3 million (2014)</div>
                    </div>
                </div>
            </div>
            <div class="mm-winners-table__row">
                <div class="mm-winners-table__cell">
                    <div class="mm-winners-table__row">
                        <div class="mm-winners-table__cell">13&nbsp;&nbsp;"Jorge"</div>
                        <div class="mm-winners-table__cell">$2.38 million (2014)</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="section type-section-padding-bottom">
        <div class="container">
            <h2 class="title title--h2">Frequently Asked Questions</h2>
            <div class="faq__accordion">
                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                How Do Progressive Jackpots Work?
                <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div class="accordion__content">
                        <img class="accordion__item__img artright lazy"
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/how-do-progressive-jackpots-work.png"
                             alt="How Do Progressive Jackpots Work" width="200" height="200">
                        <p>
                            Unlike normal jackpots which are static, progressive jackpots are fluid. They grow over the
                            course of days weeks, or even months. Thousands of machines (virtual in this case) can be
                            hooked up to the same jackpot at any given moment and, every time someone fails to win, a
                            small portion of their bet is contributed to the progressive jackpot. This process continues
                            as players lose until a lucky player eventually takes down the whole pot. The jackpot
                            returns to its starting value - only to immediately start growing again.
                        </p>
                    </div>
                </div>
                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                How to Play for Progressives
                <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div class="accordion__content">
                        <img class="accordion__item__img artright lazy"
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/how-to-play-for-progressives.png"
                             data-src="/images/progressive-jackpots-page/how-to-play-for-progressives.png"
                             alt="how to play for progressives" width="200" height="200">
                        <p>
                            Winning progressive jackpots might be unlikely, but it's not technically difficult for you
                            or any other Canadian online slot player. Go ahead and play the same way you would normally
                            play. Just keep looking to win normal payouts while chasing the elusive top prize. Always
                            remember the importance of playing the maximum number of lines. Also, while you can get away
                            with smaller coin sizes, one rule always holds true: the bigger the bet, the bigger the
                            prize!
                        </p>
                        <p>
                            Note that, in some progressive jackpot slot games, you'll be taken to a hidden mini-game
                            where you can finalize the size of your progressive jackpot. In fact, this is already fairly
                            common. Some of the biggest progressive jackpots on the net make use of a Wheel of Fortune
                            styled game to determine exactly how big your payout will be.
                        </p>
                    </div>
                </div>
                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Do Progressive Jackpots Cost Extra?
                <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div class="accordion__content">
                        <img class="accordion__item__img artright lazy"
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/do-progressives-cost-extra.png"
                             alt="do progressives cost extra" width="200" height="200">
                        <p>
                            No, or at least not directly. Just remember that you're probably going have to play
                            max-lines, which could make these games more expensive than what you're used to. To deal
                            with this, as always, you should feel free to reduce your coin size if necessary. Being
                            eligible for the top prize is the key to having the best house edge possible, so never bet
                            less than what's required.
                        </p>
                    </div>
                </div>
                <div class="accordion__item">
                <span class="accordion-item__title type-display-flex type-flex-justify-between">
                Top Progressive Jackpot Tips
                <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div class="accordion__content">
                        <img class="accordion__item__img artright lazy"
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="/images/progressive-jackpots-page/top-progressive-jacktop-tips.png"
                             alt="top progressive jacktop tips" width="200" height="200">
                        <p>
                            - Make sure your bets actually qualify for the jackpot. Read the terms and conditions of
                            each game before playing it and find out which restrictions are in place. For example, you
                            might have to play all the paylines in order to qualify for the jackpot
                        </p>
                        <p>
                            - Wait until the jackpot has grown. The odds of winning each bet are the same, but with a
                            bigger prize to win, the house edge will be reduced.
                        </p>
                        <p>
                            - Play small enough to make lots of bets. If you blow your bankroll in one hour, you'll have
                            to rely on luck more than usual to win. Slow and steady always wins in the long run.
                        </p>
                        <p>
                            - When it comes to <a href="/online-casinos" class="text--link">online casinos</a>, often
                            times you'll be able to access the same progressive jackpots via different casinos on the
                            same network. If you are gambling online, feel free to shop around and find the best online
                            casinos that meet your needs.
                        </p>
                    </div>
                </div>
            </div>
            <?php
bottom_box(false, $script);
?>
        </div>
    </section>

    <script>
    loadjs.ready('jquery', function() {
        loadjs('/dist/js/countTo.min.js', function() {

        var countTo = {
            currency: '€',
            start: function (name, amount) {
                if (amount > 2000000) {
                    var finalTotal = Math.round(amount * .004);
                }
                else if (amount > 1000000 && amount < 2000000) {
                    var finalTotal = Math.round(amount * .01);
                }
                else {
                    var finalTotal = Math.round(amount * .04);
                }

                $('.block-progressive-jackpots__value-jackpot.' + name).countTo({
                    from: amount,
                    to: amount + finalTotal,
                    speed: 86800000,
                    refreshInterval: 50,
                    decimals: 2,
                    formatter: function (value, options) {
                        return countTo.currency + value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                        console.log(this);
                    },

                    onUpdate: function (value) {
                        //console.debug(this);
                    },
                    onComplete: function (value) {
                        //console.debug(this);
                    }
                });
            }
        };

        // Containter Block holding the filters
        var filterBlock = $('.block-progressive-jackpots__filter');

        // Defining filter functions
        var jackpots = {

            listenForFilter: function () {
                jackpots.toggleLoader();
                $('.block-progressive-jackpots__filter').on('click', '.item', function (e) {
                    jackpots.toggleLoader();
                    e.preventDefault();

                    // TargetId is the provider id
                    // To the sort options you need to add order or provider
                    var targetId = $(this).attr('data-id'),
                        $target = $(this),
                        toggleInput = $(this).find('input'),
                        $allOrderButtons = $('.jpSort.order'),
                        $allProviderButtons = $('.item');
                    providerIdToSend = 0;
                    orderByIdToSend = 1;

                    if ($target.hasClass('filter-clear')) {
                        $('.item').removeClass('selected');
                        //$(".item[data-id='1']").addClass('selected');
                    }
                    else {
                        //set each provideridtosend and orderbyidtosend
                        //then evaluate which class was clicked and search for selected in the other filter claas
                        if ($target.hasClass('order')) {
                            orderByIdToSend = $target.attr('data-id');
                            if ($allProviderButtons.hasClass('selected')) {
                                providerIdToSend = $('.item.selected').attr('data-id');
                            }
                        }
                        else if ($target.hasClass('item')) {
                            providerIdToSend = $target.attr('data-id');
                            if ($allOrderButtons.hasClass('selected')) {
                                orderByIdToSend = toggleInput.prop("checked") ? 2 : 1;
                            }
                        }

                        //now add selected markers to the proper filters
                        if ($target.hasClass('order')) {
                            $allOrderButtons.removeClass('selected');
                        }
                        else if ($target.hasClass('item')) {
                            $allProviderButtons.removeClass('selected');
                        }
                        $target.addClass('selected');
                    }

                    jackpots.makeFilterCall(providerIdToSend, orderByIdToSend);
                });

                $('.block-progressive-jackpots__filter').on('click', '.switch-rating', function (e) {
                    console.log("Select changed");

                    toggleInput = $(this).find('input');
                    toggleInput.prop("checked", !toggleInput.prop("checked"));

                    $allProviderButtons = $('.item');
                    providerIdToSend = $allProviderButtons.hasClass('selected') ? $('.item.selected').attr('data-id') : 0;
                    orderByIdToSend = toggleInput.prop("checked") ? 2 : 1;

                    jackpots.makeFilterCall(providerIdToSend, orderByIdToSend);

                });
            },

            makeFilterCall: function (providerIdToSend, orderByIdToSend) {
                $.ajax({
                    method: "POST",
                    url: "/CodeLibrary/Apis/JackpotSystem.php",
                    cache: false,
                    data: {
                        providerId: providerIdToSend,
                        orderById: orderByIdToSend,
                        action: 'returnFilteredJackpots',
                        dev: true,
                    },
                    success: function (data) {
                        jackpots.arrangeJackpots(data);
                        jackpots.toggleLoader();
                    }
                });
            },

            arrangeJackpots: function (data) {
                //first remove the currentlyFiltered class from all jackpots
                $('.block-progressive-jackpots__jackpot-game').removeClass('currentlyFiltered');

                $.each(data, function (key, value) {
                    var $targetToMove = $('.block-progressive-jackpots__jackpot-game.' + value);
                    //first make sure we are only messing with jackpots that exist or we have images for
                    if ($('.' + value).length) {
                        //now add a marker to the jackpot to indicate it is part of the filter and should be shown
                        $targetToMove.addClass('currentlyFiltered');
                        //Then add the jackpot to the beginning of the container
                        $('.block-progressive-jackpots__jackpot-games').append($targetToMove);
                    }
                    //hide all images that dont have the currently filtered class
                    $('.block-progressive-jackpots__jackpot-game').not('currentlyFiltered').hide();
                });

                $('.block-progressive-jackpots__jackpot-game').each(function () {
                    var neededClass = $(this).attr('class').split(' ')[1],
                        classIndex = $.inArray(neededClass, data);
                    if (classIndex == -1) {
                        $('.block-progressive-jackpots__jackpot-game.' + neededClass).hide();
                    }
                    else if ($('.block-progressive-jackpots__jackpot-game.' + neededClass + ':hidden')) {
                        $('.block-progressive-jackpots__jackpot-game.' + neededClass).show();
                    }
                });

            },

            toggleLoader: function () {
                $('.jpLoader').toggle();
                if ($('.jpLoader').is(':visible')) {
                    $('.jpLoader').css('display', 'inline-block');
                }
            },
        }

        // Call to the filter functions
        $(document).ready(jackpots.listenForFilter);
            <?php
                foreach ($jackpotResults as $jackpot) {

                    $image = $jackpot['image'];

                    if ($jackpot['provider'] == 1) {
                        $providerImage = 'microgaming';
                    } elseif ($jackpot['provider'] == 3) {
                        $providerImage = 'playtech';
                    } elseif ($jackpot['provider'] == 2) {
                        $providerImage = 'netent';
                    } elseif ($jackpot['provider'] == 4) {
                        $providerImage = 'gamesys';
                    } elseif ($jackpot['provider'] == 5) {
                        $providerImage = 'betsoft';
                    } elseif ($jackpot['provider'] == 6) {
                        $providerImage = 'rtg';
                    }

                    if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/images/progressive-jackpots-page/progressive-jackpot-logos/' . $providerImage . '/' . $image . '.png'))
                    { ?>
                        countTo.start('<?php echo $jackpot['image']; ?>',<?php echo $jackpot['amount']; ?>);
                <?php }
                } ?>

            // Filter button
            $('.jwidget-toggler').click(function (e) {
                e.preventDefault();
                var $button = $(this);

                if ($button.hasClass('toggled')) {
                    $button.removeClass('toggled').text('Show More Jackpots');
                    $('.jwidget-hexagons').height('650px')
                } else {
                    $button.addClass('toggled').text('Show Fewer Jackpots');
                    $('.jwidget-hexagons').height('inherit')
                }
            })
        });

    });
</script>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php";
