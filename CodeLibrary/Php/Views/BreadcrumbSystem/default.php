<ul class="breadcrumbs">
    <?php

    $counter = 0;
    foreach ($this->viewVariables['parts'] as $url => $part) {
        if ((++$counter) < count($this->viewVariables['parts'])) {
            ?>
            <li class="breadcrumbs__list-item">
                <a href="<?php echo $url ?>" class="breadcrumbs__link">
                    <?php echo $part ?>
                </a>
                <svg class="icon icon--bold" width="10" height="10" aria-hidden="true">
                    <use xlink:href="/dist/icons/icons-core.svg#icon-angle-right"></use>
                </svg>
            </li>
        <?php
    } else {
        ?>
            <li class="breadcrumbs__list-item">
                <span href="#" class="breadcrumbs__link"><?php echo $part ?></span>
            </li>
        <?php
    }
} ?>
</ul>

<?php

echo '<script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [';

$counter = 0;
foreach ($this->viewVariables['parts'] as $url => $part) {
    if ((++$counter) < count($this->viewVariables['parts'])) {
        echo '{
                            "@type": "ListItem",
                            "position": ' . $counter . ',
                            "item": {
                                "@id": "https:' . $url . '",
                                "name": "' . $part . '"
                            }
                        },';
    } else {
        echo '{
                            "@type": "ListItem",
                            "position": ' . $counter . ',
                            "item": {
                                "@id": "https:' . $url . '",
                                "name": "' . $part . '"
                            }
                        }';
    }
}
echo ']
        }';

echo '</script>';
