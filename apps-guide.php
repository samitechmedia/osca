<?php
$title = 'Slot Apps: The Ultimate '.date('Y').' Guide to Playing on Your Mobile';
$desc = 'How to play Real Money Slots Apps on your Mobile Device '.date('Y').' - From downloading top games, to playing &amp; winning big jackpots on your smartphone or tablet.';
$bc = 'Slot Games Explained';

$class = 'class="mobile-slots"';
include($_SERVER['DOCUMENT_ROOT']."/includes/onca_header.php");

// use the autoloader
require_once $_SERVER['DOCUMENT_ROOT'].'/CodeLibrary/Php/Setup/Loader.php';

$jackpots = new \CodeLibrary\Php\Controllers\JackpotSystem\JackpotSystem();
$currencyCode = 'cad';
$jackpotIds = array(15,63,6,10,4,5);
$jackpotDataArray = array();

foreach ($jackpotIds as $id) {

    // Get the single jackpot row
    $jackpotRow = $jackpots->getSingleJackpotArray($id);

    // Format the jackpot amount
    $jackpotRow['amount'] = $jackpots->formatJackpotForTicker($currencyCode,$jackpotRow['amount']);

    // Add to new array ready for output to browser
    $jackpotDataArray[] = $jackpotRow;

}

?>

<section class="section type-section-padding-bottom further__information">
  <div class="container">
    <div class="type-display-flex type-flex-justify-center-top">
      <div class="type-left-side">
        <h1 class="title title--h2">Ultimate guide to slots apps</h1>
        <p>
          We've spent years reviewing some of the best games and sites for players in Canada to enjoy playing slots, but mobile real money slots are a totally different ballgame for a few different reasons:
        </p>
        <ul class="bullet__list bullet__list--check-green bullet--text type-margin-bottom">
          <li class="bullet__item">Tablets and smartphones can't match the power of laptop and desktop computers</li>
          <li class="bullet__item">You won't find the same huge range of games that you can on the web</li>
          <li class="bullet__item">It's difficult for slot app developers to successfully replicate complex or 3D graphics on a mobile device
          </li>
        </ul>
        <p>
          Playing slots on your mobile can be a tricky game for those that don’t consider themselves proficient with mobile devices but we’re here to tell you how easy it is. It’s not a case of having the right phone or being able to do something advanced. These
          mobile casino applications have been designed from the ground up to make mobile real money slots an amazing experience that is incredibly fun for everyone.
        </p>
        <p>
        We found that <a href="/go/spincasino/casino" class="text--link" rel="nofollow noreferrer" target="_blank"><strong>Spin Casino</strong> </a>  offers some of the best slots and slot apps for real money online gambling. But people always have questions so we thought it was about time that we took an in-depth look at the slots/casino app market on mobile devices. Along the way, we're going to answer some of the many questions we receive about slot apps on a daily basis.</p>
      </div>
      <div class="type-right-side">
        <div class="quick__guide">
          <h3 class="title title--h3 type-display-flex type-flex-justify-between"><span>In This Guide</span></h3>
          <ul class="bullet__list bullet--links">
            <li class="bullet__item"><a href="#play-real-money-app">Can I play real money slots on an app?</a> </li>
            <li class="bullet__item"><a href="#start-playing">How do I start playing?</a> </li>
            <li class="bullet__item"><a href="#find-good-apps">How do I find good slot apps?</a></li>
            <li class="bullet__item"><a href="#devices-supported">What devices are supported?</a></li>
            <li class="bullet__item"><a href="#install-app">How to install a slot app?</a</li>
            <li class="bullet__item"><a href="#compare-with-desktop">How does compare with desktop games?</a></li>
            <li class="bullet__item"><a href="#same-jackpots-available">Are the same jackpots available?</a></li>
            <li class="bullet__item"><a href="#apps-safe">Are slot apps safe?</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="block-top-tips">
      <div class="title">Six Super Slots Tips for Playing Online</div>
      <div class="box-row type-display-flex">
        <div class="box-col">
          <div class="box-tip">
            <div class="box-num">1</div>
            <p><strong>Play for fun.</strong>  Statistically the house has the edge with slots, so go in to have fun and you’ll be surprised at how well you do.</p>
          </div>
          <div class="box-tip">
            <div class="box-num">2</div>
            <p><strong>Set a bankroll.</strong>  With having fun in mind, set aside an amount that you want to gamble and don’t exceed it.
            </p>
          </div>
        </div>
        <div class="box-col">
          <div class="box-tip">
            <div class="box-num">3</div>
            <p><strong>Understand winning.</strong>  Make sure the slot you choose is easy to understand so that you aren’t just throwing away money but can cheer for the spins too.</p>
          </div>
          <div class="box-tip">
            <div class="box-num">4</div>
            <p><strong>Develop a pattern.</strong>  Bet big when you win and bet small when you lose. You can extend your playing time by betting with patterns.</p>
          </div>
        </div>
        <div class="box-col">
          <div class="box-tip">
            <div class="box-num">5</div>
            <p><strong>Know the slots.</strong>  Make sure you know what the payout percentage is for the slot you’re playing on.</p>
          </div>
          <div class="box-tip">
            <div class="box-num">6</div>
            <p><strong>Stop.</strong>  Have the presence of mind to know when to quit playing. You don’t want to lose money you can’t afford to lose.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section type-section-padding">
  <div class="container">
    <?php
      $override['spincasino']['bullet1'] = 'Mac compatible';
      $override['spincasino']['bullet2'] = 'Wide range of deposit method options';
      $override['spincasino']['bullet3'] = '500 loyalty points upon sign up';
      $override['spincasino']['bullet4'] = 'Up to C$1000 in sign up bonuses';
      $override['rubyfortune']['bullet1'] = 'Play across different platform types';
      $override['rubyfortune']['bullet2'] = 'Bonuses offered on big wins!';
      $override['rubyfortune']['bullet3'] = 'Amazing payout rate of 97.8%';
      $override['rubyfortune']['bullet4'] = 'Both 3 and 5 reel slots available';
      $override['royalvegas']['bullet1'] = 'Up toC$1200 worth of deposit bonuses';
      $override['royalvegas']['bullet2'] = 'Progressive jackpots on slot games';
      $override['royalvegas']['bullet3'] = 'Transfer funds using a range of methods';
      $override['royalvegas']['bullet4'] = 'More than 500 games to choose from';
      $unity->outputToplist();
    ?>
    <div id="play-real-money-app">
      <h2 class="title title--h2" >Can I play real money slots on an app?</h2>
      <img class="lazy artright" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 315 200'%3E%3C/svg%3E" data-src="/images/ultimate-slots-guide/img-real-money-slots.png" alt="Real Mony Slots" width="315" height="200">
      <p>
        Yes, you can. In fact, for fans of the slot machine, apps offer one of the best ways to replicate the experience of hitting the slots in a land-based casino in Las Vegas, Atlantic City or your local venue in Canada.
      </p>
      <p>
        You'll soon learn that, rather than downloading a dedicated slot app to your mobile device, you'll probably be directed to a responsive version of a casino site that's been optimized for use on a mobile device.
      </p>
      <p>
        These behave just like an app, which is why we still refer to them as such, and the only difference is that you don't have to download a responsive site to your device in order to get started. You can still, however, add a shortcut to your home screen for easy access.
      </p>
    </div>
    <div id="start-playing">
      <h2 class="title title--h2">How do I start playing?</h2>
      <div class="quote-block quote-block--right">
        <svg class="icon quote-block__icon" width="100" height="100" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-quote-right"></use>
        </svg>
        It's very rare for a casino not to offer at least some of their games to players on the move.
      </div>
      <p>Because there are hundreds to choose from, finding a casino slots app to start with is no mean feat. Fortunately, there's a very easy answer if you already play <a href="/">online slots</a>: just go with your favourite casino's mobile offering.</p>
      <p>While there's no guarantee that the site(s) you use will have mobile slot game apps, the chances are pretty good; it's rare for a casino site not to offer at least some of their games to players on the go.</p>
      <p>It will be a very different story, however, if you want to try the heady combination of <a href="/mobile">mobile slots</a>, <a href="/real-money">real money slots</a> and web gambling while you're on the move for the first time. With no regular haunt, you'll need to choose an online casino to register
        with in order to find a slots app.</p>
      <p>Fortunately, we've identified a number of the best slot apps out there that will be perfect for your first time playing.</p>
    </div>
    <div id="find-good-apps">
      <h2 class="title title--h2">How do I find good slot apps?</h2>
      <img class="lazy artright" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 315 220'%3E%3C/svg%3E" data-src="/images/ultimate-slots-guide/img-find.png" alt="Find the best slots" width="315" height="220">
      <p>
        To find one of the top slot apps, you'll be looking for all of the same criteria that make for a good casino slots app on the web:
        </p>
      <ul class="bullet__list bullet__list--check-green bullet--text type-margin-bottom">
        <li class="bullet__item">Assurance that they are safe and honest to play at</li>
        <li class="bullet__item">A nice range of games to try, ideally including some of your favourites</li>
        <li class="bullet__item">Range of banking options with which to make deposits and withdrawals</li>
        <li class="bullet__item">Effective customer support that quickly addresses any issues you have</li>
      </ul>
      <p>
        Fortunately, competition among providers of slot machines (app and site alike) is fierce and there are plenty of sites all performing at a very high level to ensure that they keep their customers loyal. After all, at the end of the day, that's what casino sites want to do more than anything else: hold on to their customers.
      </p>
      <p>
        Because encouraging repeat business is so important in the world of casino sites and slot apps, more and more site owners are working to ensure that their mobile offerings have many games and is as easy to use as possible.
      </p>
    </div>
    <div id="devices-supported">
      <h2 class="title title--h2">What devices are supported?</h2>
      <div class="quote-block quote-block--right">
        <svg class="icon quote-block__icon" width="100" height="100" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-quote-right"></use>
        </svg>
        Responsive sites mean that almost every device that can get online can be used to play slot machine apps
      </div>
      <p>
        Only the most outdated – and we're really talking years and years old here – devices will be unable to access slot game apps. Whether you use <a href="/iphone">iPhone</a>, <a href="/android">Android</a>, <a href="/ipad">iPad</a>, Windows Phone or even Blackberry, you should be able to find a casino out there that will suit your .
      </p>
      <p>
        Of course, not every device will be able to access every game, but the use of responsive sites by providers means that almost every device that can get online can be used to play a slot machine app. Then, if and when you decide to upgrade, you'll be able to enjoy the most modern, cutting edge titles.
      </p>
      <p>
        It probably goes without saying, but the more modern your handset/tablet, the more games you'll have access to. iPhone 6 users and Galaxy S7 Android users, for example, will be able to enjoy all of the newest games immediately.
      </p>
      <div class="block-devices-supported">
        <a href="/iphone" class="box-device-supported">
          <div class="icon icon-iphone">
            <div class="icon-check"></div>
          </div>
          <div class="title">iPhone</div>
        </a>
        <a href="/ipad" class="box-device-supported">
          <div class="icon icon-ipad">
            <div class="icon-check"></div>
          </div>
          <div class="title">iPad</div>
        </a>
        <a href="/android" class="box-device-supported">
          <div class="icon icon-android">
            <div class="icon-check"></div>
          </div>
          <div class="title">Android</div>
        </a>
      </div>
    </div>
    <div id="install-app">
      <h2 class="title title--h2">How to install a slot app?</h2>
      <div class="block-install-app">
        <div class="box-install-app">
          <div class="box-icons">
            <div class="icon icon-click"></div>
          </div>
          <p>Because most online casinos offer responsive sites rather than a dedicated slots/casino app, you won't usually need to install anything to your phone. However, on the off chance that they do have an app, all you need to do is <strong>click the link</strong>             to the relevant app store on their website.
          </p>
        </div>
        <div class="box-install-app">
          <div class="box-icons">
            <div class="icon icon-appstore"></div>
            <div class="icon icon-google-play"></div>
          </div>
          <p>From there, you can download the app either from the <strong><a href="https://play.google.com/store/apps?hl=en" class="text--link" rel="noreferrer" target="_blank">Google Play</a></strong>  store (for Android) or through <strong><a href="https://apps.apple.com/ca/genre/ios-games/id6014" class="text--link"  target="_blank" rel="noreferrer">iTunes</a></strong> (for iPhone) and, voila, the slot machine app will appear on your phone. </p>
        </div>
        <div class="box-install-app">
          <div class="box-icons">
            <div class="icon icon-search"></div>
          </div>
          <p>Alternatively, you can <strong>search</strong>  for it on your mobile device to download it directly. If you can't find a particular site's app, it may be that they haven't made it available in your home country.</p>
        </div>
      </div>
      <a class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green" href="/go/spincasino/casino" rel="nofollow noreferrer" target="_blank">
        Play on Spin Casino, Our Top Rated Slots App
        <div class="white__inner-circle">
          <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </div>
      </a>
    </div>
    <div id="compare-with-desktop" class="border-box">
      <h2 class="title title--h2">How does it compare with desktop games?</h2>
      <p>
        As you might expect, some of the graphics are a little rougher in slot apps than their desktop equivalents. Sound effects and loading times may also take a bit of a hit, since the processing power of iPhone, iPad, Android etc. just can't match that of desktops or laptops.
      </p>
      <p>
        However, the difference is pretty negligible. Slot app producers have done a fantastic job of creating slimmed down versions of their games for use on mobile devices, so you won't have to wait too long before you can get started.
      </p>
      <p>
        One other significant difference between a casino slots app on a mobile or tablet and playing in a web casino is that the experience is a little more tactile. But what exactly does this mean for players?
      </p>
      <p>
        Because you're tapping away at the buttons with your fingers, rather than clicking them with a mouse, it can actually feel a little closer to playing real money slots in a land-based casino.
      </p>
      <p>
        Some slots fans take such a shine to the mobile slots/casino app scene because of this that they end up doing almost all of their online gambling on a smartphone or tablet instead of using a computer.
      </p>
      <div class="compare-table">
        <div class="compare-features">
          <div class="compare-row first">
            <div class="col col1">Features</div>
          </div>
          <div class="compare-row">
            <div class="col col2">Welcome bonus</div>
          </div>
          <div class="compare-row">
            <div class="col col3">Access to free play games</div>
          </div>
          <div class="compare-row">
            <div class="col col4">Play on the move</div>
          </div>
          <div class="compare-row">
            <div class="col col5">Safe, secure banking</div>
          </div>
          <div class="compare-row">
            <div class="col col6">No Download Play</div>
          </div>
          <div class="compare-row">
            <div class="col col7">Native Software</div>
          </div>
        </div>
        <div class="compare-table-in">
          <div class="compare-row first">
            <div class="col col1">
              <div class="icon icon-desktop"></div>
              <div class="title">Desktop</div>
            </div>
            <div class="col col2">
              <div class="icon icon-iphone"></div>
              <div class="title">iPhone</div>
            </div>
            <div class="col col3">
              <div class="icon icon-iphone"></div>
              <div class="title">iPad</div>
            </div>
            <div class="col col4">
              <div class="icon icon-android-phone"></div>
              <div class="title">Android Phone</div>
            </div>
            <div class="col col5">
              <div class="icon icon-android-tablet"></div>
              <div class="title">Android Tablet</div>
            </div>
            <div class="col col6">
              <div class="icon icon-windows-phone"></div>
              <div class="title">Windows Phone</div>
            </div>
            <div class="col col7">
              <div class="icon icon-blackberry-phone"></div>
              <div class="title">Blackberry Phone</div>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
          <div class="compare-row">
            <div class="col col1">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col2">
              <i class="fa fa-question" aria-hidden="true"></i>
            </div>
            <div class="col col3">
              <i class="fa fa-question" aria-hidden="true"></i>
            </div>
            <div class="col col4">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col5">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="col col6">
              <i class="fa fa-question" aria-hidden="true"></i>
            </div>
            <div class="col col7">
              <i class="fa fa-times" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="quote-block">
        <svg class="icon quote-block__icon" width="100" height="100" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-quote-right"></use>
        </svg>
        Slot producers have done a fantastic job of creating slimmed down versions of their games for use on mobiles.
      </div>
    </div>
    <div id="same-jackpots-available" class="block-same-jackpots clearfix">
      <div class="col-l">
        <h2 class="title title--h4">Are the same jackpots available?</h2>
        <p>Yes! The jackpot that players win is determined by the game, rather than the type of device being used to access it. This means that, even though you might expect the smaller size of smartphones and tablets to mean smaller jackpots, you can win
          sums of cash just as large as on a laptop or desktop.</p>
        <p>This is even true of some progressive games, which means that it's possible to win a jackpot worth millions of dollars playing real money slots on your iPhone or Android. A big win is always something special, but hitting the jackpot on your commute
          to work or during a lunch break would be even more fantastic.
        </p>
      </div>
      <div class="col-r">

        <a class="block-progressive-jackpots__jackpot-games" href="<?php $unity->outputTopPartnerSingleItemFromToplist('PartnerLink.php'); ?>" target="_blank" rel="nofollow noreferrer">
        <?php foreach($jackpotDataArray as $jackpotData ): ?>
          <div class="box-same-jackpot">
              <div class="title-game">
                <?php echo $jackpotData['name'] ?>
              </div>
              <div class="logo-game">
                <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 157 48'%3E%3C/svg%3E" data-src="/images/ultimate-slots-guide/logo-<?php echo $jackpotData['image'] ?>.png" alt="<?php echo $jackpotData['name'] ?> Logo" width="157" height="48">
              </div>
              <div class="value-jackpot <?php echo $jackpotData['code'] ?>">
                <?php echo $jackpotData['amount'] ?>
              </div>
              <div class="btn-play-now">Play Now</div>
          </div>
          <?php endforeach; ?>
          </a>
      </div>
    </div>
    <h2 class="title title--h2">Do they support play in C$?</h2>
    <img class="lazy artright" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 315 250'%3E%3C/svg%3E" data-src="/images/ultimate-slots-guide/img-canadian-curency.png" alt="Canadian Slots Money" width="315" height="250">
    <p>
      Because there are lots of active slots players located in Canada, the majority of sites do offer Canadian Dollars as a supported currency. And, if an online casino accepts deposits and allows withdrawals in C$ on their main site, this won't change on their slot apps.
    </p>
    <p>Where possible, it's always a good idea playing using C$ for a couple of different reasons:</p>
    <p>
      <ul class="bullet__list bullet__list--check-green bullet--text">
        <li class="bullet__item">It avoids any fees or charges that a casino site imposes to convert between different currencies.</li>
        <li class="bullet__item">It means that you'll have a clearer picture of how much you're spending (and winning, hopefully!) without the need to convert between, say, US$ and C$ in your head every time you spin the reels
        </li>
      </ul>
    </p>

    <div id="apps-safe" class="type-section-padding">
      <h2 class="title title--h2">Are slot apps safe?</h2>
      <div class="quote-block quote-block--right">
        <svg class="icon quote-block__icon" width="100" height="100" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-quote-right"></use>
        </svg>
        Slot apps safe to play with as long as you have sesibly, do your reseasrch and play with an honest provider
      </div>
      <p>
        Just as when you're playing with an online casino, using a slot app is perfectly safe as long you're playing with a trustworthy and legitimate provider. Sites need to follow the same security protocol, such as ensuring that they properly protect all personal information and banking/payment details, for customers on mobiles that they do for web users.
      </p>
      <p>
        As ever, we recommend being cautious when playing real money slots (as you should be whenever you make a purchase online) and taking appropriate steps to keep yourself safe:
      </p>
      <p>
        <ul class="bullet__list bullet__list--check-green bullet--text">
          <li class="bullet__item">Do some research before signing up with a site to make sure that it pays out wins, is certified by the proper authorities etc.
          </li>
          <li class="bullet__item">Look for reviews, either on this site or by other players, to confirm that that site works as it should
          </li>
          <li class="bullet__item">Use a secure network if you intend to use Wi-Fi to play, not a free/public service that could allow other connected individuals to access your data
          </li>
        </ul>
      </p>
      <p>In general, slot apps are safe to play with as long as you behave sensibly, do your research and use your common sense. This means that if something looks too good to be true, it probably is!</p>
    </div>
    <?php
      $unity->outputTopPartnerSingleItemFromToplist();
    ?>
    <?php
      bottom_box(false,$script);
    ?>
  </div>
</section>

<script>
  loadjs.ready('jquery', function() {
    loadjs('/CodeLibrary/Javascript/plugins/simpleTick.js', function() {

        $(".value-jackpot.megamoolahmega").simpleTick({
          increment: .13,
          speed: 700,
          currency: 'cad'
        });
        $(".value-jackpot.majormillions").simpleTick({
          increment: .2,
          speed: 950,
          currency: 'cad'
        });
        $(".value-jackpot.treasurenile").simpleTick({
          increment: .05,
          speed: 400,
          currency: 'cad'
        });
        $(".value-jackpot.fruitfiesta").simpleTick({
          increment: .07,
          speed: 450,
          currency: 'cad'
        });
        $(".value-jackpot.superjax").simpleTick({
          increment: .17,
          speed: 700,
          currency: 'cad'
        });
    });
  });
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
