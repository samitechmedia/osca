<link rel="preload" href="/images/redesign/main_logo.png" as="image">
<?php
    if (isset($customResources) && ($customResources === "homepage")) {
        echo'<link rel="preload" href="/images/redesign/hero_bg-med.jpg" as="image" media="(min-width: 768px)">';
    }
?>
<?php if (isset($pageName) && ($pageName === 'free-slots')): ?>
    <link rel="preload" crossorigin href="/fonts/Poppins/poppins-regular.woff2" as="font" type="font/woff2">
<?php else: ?>
    <link rel="preload" crossorigin href="/fonts/FilsonSoft/filson-soft-regular.woff2" as="font" type="font/woff2">
<?php endif; ?>
