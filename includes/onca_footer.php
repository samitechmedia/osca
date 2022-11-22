<footer class="footer">
    <div class="footer__wrap">
        <div class="container">
            <div class="footer-top__panel type-display-flex type-flex-justify-center">
                <h2 class="title title--h2">We Only List Sites Verified and
                    Secured by The Likes of:</h2>
            </div>

            <ul class="footer-logo__list type-display-flex type-flex-justify-center">
                <li class="footer-logo__item">
                    <a href="https://gaminglabs.com/" target="_blank" rel="noreferrer noopener">
                        <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 70 38'%3E%3C/svg%3E" data-src="/images/redesign/tst.png"
                             alt="tst a gli company" width="70" height="38">
                    </a>
                </li>
                <li class="footer-logo__item">
                    <a href="https://ecogra.org/" target="_blank" rel="noreferrer noopener">
                        <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 136 57'%3E%3C/svg%3E" data-src="/images/redesign/ecogra.png"
                             alt="ecogra" width="136" height="57">
                    </a>
                </li>
                <li class="footer-logo__item">
                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 92 50'%3E%3C/svg%3E" data-src="/images/redesign/verisign.png"
                         alt="verisign secured" width="92" height="50">
                </li>
                <li class="footer-logo__item">
                    <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 136 61'%3E%3C/svg%3E" data-src="/images/redesign/18.png"
                         alt="18+ logo" width="136" height="61">
                </li>
            </ul>

            <div class="type-display-flex type-flex-justify-center-top">
                <div class="col-6 col-sm-6 col-lg-3 col-xl-3">
                    <h4 class="title title--h4">POPULAR PAGES</h4>
                    <ul class="footer-menu__list">
                        <li class="footer-menu__item">
                            <a href="/real-money">Real Money</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/mobile">Mobile</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/fr/">Français</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-6 col-lg-3 col-xl-3">
                    <h4 class="title title--h4">SLOTS VARIETIES</h4>
                    <ul class="footer-menu__list">
                        <li class="footer-menu__item">
                            <a href="/free">Free</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/no-download">No Download</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-6 col-lg-3 col-xl-3">
                    <h4 class="title title--h4">REVIEWS</h4>
                    <ul class="footer-menu__list">
                        <li class="footer-menu__item">
                            <a href="/reviews/jackpot-city">Jackpot City</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/reviews/spin-casino">Spin Casino</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/reviews/ruby-fortune">Ruby Fortune</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-6 col-lg-3 col-xl-3">
                    <h4 class="title title--h4">USEFUL GUIDES</h4>
                    <ul class="footer-menu__list">
                        <li class="footer-menu__item">
                            <a href="/about/">About</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/sitemap">Sitemap</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/responsible-gambling">Responsible
                                Gambling</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="/privacy">Privacy and Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright__area type-display-flex type-flex-justify-center">
        <span class="copyright__text">&copy; Copyright <?php echo date('Y') ?>
            OnlineSlots.ca. All Rights Reserved.</span>
    </div>

    <a class="scroll-top">
        <svg class="icon icon--x-bold" width="14" height="14" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-angle-up"></use>
        </svg>
    </a>
</footer>

<script src="/dist/js/mobile-menu.min.js" defer></script>
<script src="/dist/js/loadlazy.min.js" defer></script>
<script src="/dist/js/common.min.js" defer></script>

<script>
    siteLang = '<?php echo $pageLanguage ?>';
    var clicky_site_ids = clicky_site_ids || [];
    clicky_site_ids.push(100724316);
    window.hj = window.hj || function() { (window.hj.q = window.hj.q || []).push(arguments) };
    window._hjSettings = { hjid:15902, hjsv:6 };
    <?php
    // Get contents of inline footer scripts
    $footerScriptsInline = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/dist/js/inline-footer-scripts.min.js');
    // Output the inline footer scripts
    echo $footerScriptsInline;
    ?>
</script>
<script src="https://static.hotjar.com/c/hotjar-15902.js?sv=6" async defer></script>
<script src="https://static.getclicky.com/js" async defer></script>

<noscript>
    <p><img alt="Clicky" width="1" height="1" src="https://in.getclicky.com/100724316ns.gif"/></p>
</noscript>

<?php
    function importCSS($path)
    {
        if (!count($path)) return;
        $script = '<link rel="preload" href=' . json_encode($path, JSON_UNESCAPED_SLASHES) . ' as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        $noscript = '<noscript><link href="' . $path . '" rel="stylesheet"></noscript>';
        return $script . $noscript;
    }

    function getBTFStyles($customATF)
    {
        $BTFPath = '/dist/css/btf/btf';
        $customBTFPath = $BTFPath . '-' . $customATF . '.css';
        return $customATF ? $customBTFPath : $BTFPath . '.css';
    }

    $customATF = isset($customATF) ? $customATF : '';
    $stylesToLoad = getBTFStyles($customATF);

    echo importCSS($stylesToLoad);

    require(__DIR__ . '/analytics.php');
?>

<script src="/dist/js/plugins/wizardry.min.js" defer></script>
</body>
</html>
