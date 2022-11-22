<!--sidebar markup-->
<div class="review-block-sidebar">
    <?php if (!empty($partner['paymentsystems'])) { ?>
    <div class="side-block">
        <div class="heading">Deposit Options</div>
        <div class="deposit-list">
            <?php foreach (explode("||", $partner['paymentsystems']) as $system) { ?>
                <div class="deposit-icon">
                    <img src="/images/redesign/icons/deposits/<?php echo $system ?>.svg"
                         alt="<?php echo $system ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <div class="side-block">
        <div class="heading">Operating Systems</div>
        <ul class="systems-list">
            <li class="mac">
                <div class="wrapper">
                    <div class="tooltip">
                        <p>iOS</p>
                    </div>
                </div>
            </li>
            <li class="android">
                <div class="wrapper">
                    <div class="tooltip">
                        <p>Android</p>
                    </div>
                </div>
            </li>
            <li class="win">
                <div class="wrapper">
                    <div class="tooltip">
                        <p>Windows</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="side-block">
        <div class="heading">Casino Rating</div>
        <div class="side-list">
            <div class="row software">
                <div>Software:</div>
                <div class="rating-number"><?php echo $partner['software']; ?>/10</div>
            </div>
            <div class="row graphics">
                <div>Graphics:</div>
                <div class="rating-number"><?php echo $partner['graphics']; ?>/10</div>
            </div>
            <div class="row bonus">
                <div>Bonus:</div>
                <div class="rating-number"><?php echo $partner['bonus']; ?>/10</div>
            </div>
            <div class="row support">
                <div>Support:</div>
                <div class="rating-number"><?php echo $partner['support']; ?>/10</div>
            </div>
            <div class="row banking">
                <div>Banking:</div>
                <div class="rating-number"><?php echo $partner['banking']; ?>/10</div>
            </div>
            <div class="row loyalty">
                <div>Loyalty Programme:</div>
                <div class="rating-number"><?php echo $partner['loyaltyprogramme']; ?>/10</div>
            </div>
        </div>
    </div>
    <div class="side-block">
        <div class="heading">Quick Contact Info</div>
        <div class="side-list contacts">
            <div class="row email">
                <div>Email:</div>
                <div class="contacts-item"><a
                      href="mailto:<?php echo $partner['email']; ?>"><?php echo $partner['email']; ?></a></div>
            </div>
            <div class="row phone">
                <div>Toll Free:</div>
                <div class="contacts-item"><a
                      href="tel:+18667452416<?php echo $partner['tollfree']; ?>"><?php echo $partner['tollfree']; ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="side-block">
        <a href="<?php echo $partner['affiliate_link'] ?>" target="_blank" rel="nofollow noreferrer" class="inner">
            <button
              class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green play-now-btn">
                Play now
            </button>
            <span href="" class="get-your-bonus-link">And claim your <span
                  class="bonus-count"><?php echo $partner['bonusvalue']; ?></span> Bonus</span>
        </a>
    </div>
</div>
<!--sidebar markup-->
