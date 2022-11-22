<?php
    $title = '404 Page Not Found';
    $desc = 'OnlineSlots.ca not found.';
    $bc = '404 Page Not Found';

    include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_header.php");
    ?>

    <section class="section type-padding-section-bottom">
        <div class="container">

            <h1 class="title title--h2">
                Ooops! 404 Error </h1>

            <p>Sorry, this one's out of action. Can we help you find what you're looking for?</p>

            <ul class="bullet__list bullet__list--check-green bullet--text">
                <li class="bullet__item">
                    <a class="text--link" href="/">Homepage</a>
                </li>
                <li class="bullet__item">
                    <a class="text--link" href="/free">Free Slots</a>
                </li>
                <li class="bullet__item">
                    <a class="text--link" href="/real-money">Real Money</a>
                </li>
                <li class="bullet__item">
                    <a class="text--link" href="/sitemap.php">Sitemap</a>
                </li>
            </ul>

            <img src="/images/404-page/img-404.png" alt="404 Image" width="641" height="543">

            <?php
                bottom_box(false, $script);
            ?>

        </div>

    </section>

    <script>
        window.ErrorPage = true;
        clicky_goal = '404 Error Page';
    </script>

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_footer.php");
