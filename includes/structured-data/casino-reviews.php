<?php
    //  check
    if (isset(
        $title,
        $desc,
        $partner['sitename'],
        $partner['logo'],
        $partner['bonusDigits'],
        $partner['rating']
    )) {
?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@graph":
  [
    {
        "@type": "Review",
        "itemReviewed": {
            "@type": "Product",
            "brand": "<?php echo $partner['sitename']; ?>",
            "image": "https://www.onlineslots.ca<?php echo $partner['logo']; ?>",
            "name": "<?php echo $partner['sitename']; ?> Casino",
            "offers": {
                "@type": "Offer",
                "name": "bonus",
                "price": "<?php echo $partner['bonusDigits']; ?>",
                "priceCurrency": "CAD"
            }
        },
        "reviewRating": {
            "@type": "Rating",
            "ratingValue": "<?php echo ($partner['rating']) / 2; ?>",
            "bestRating": "5",
            "worstRating": "1"
        },
        "author": {
            "@type": "Organization",
            "name": "Onlineslots.ca"
        }
    },
    {
        "@type": "PlayAction",
        "potentialAction": {
            "@type": "PlayAction",
            "name": "<?php echo $partner['sitename']; ?> Casino"
        },
        "description": "Play <?php echo $partner['sitename']; ?> Casino Slot games"
    },
    {
        "@type": "WebPage",
        "mainEntityOfPage": {
            "@type": "WebPage"
        },
        "headline": "<php? echo $title; ?>",
        "description": "<php? echo $desc; ?>",
        "about": [
            {
                "@type": "Thing",
                "name": "Online Casino",
                "sameAs": "https://en.wikipedia.org/wiki/Online_casino"
            },
            {
                "@type": "Thing",
                "name": "Online Gambling",
                "sameAs": "https://en.wikipedia.org/wiki/Online_gambling"
            },
            {
                "@type": "Thing",
                "name": "Slot machine",
                "sameAs": "https://en.wikipedia.org/wiki/Slot_machine"
            }
        ],
        "image": [
            "https://www.onlineslots.ca<?php echo $partner['logo']; ?>"
        ]
    }
  ]
}
</script>

<?php
    }
?>
