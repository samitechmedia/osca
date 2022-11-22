<?php
function buildFAQWithSchema($faqItems, $faqBuilderOptions = null)
{
    $faqHeader = 'Online Slots FAQ';
    if(isset($faqBuilderOptions['header'])){
        $faqHeader = $faqBuilderOptions['header'];
    }
    $faqSchema = '';
    $faqMarkup = '';
    $faqItemsCount = count($faqItems);
    foreach ($faqItems as $key => $faqItem):
        $faqSchema .= '
            {
                "@type": "Question",
                "name": ' . json_encode($faqItem['Question']) . ',
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": ' . json_encode($faqItem['Anwser']) . '
                }
            }
        ';
    if ($key < $faqItemsCount - 1) {
        $faqSchema .= ',';
    }
        $faqMarkup .=  '<div class="accordion__item">
                            <span class="accordion-item__title type-display-flex type-flex-justify-between">
                            ' . $faqItem['Question']. '<svg class="icon icon--bold accordion-item__title-ico" width="13" height="13" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-angle-down"></use>
                        </svg>
                            </span>
                            <div class="accordion__content">
                                <p>
                                 ' . $faqItem['Anwser']. '
                                </p>
                            </div>
                        </div>';
endforeach;

$faqSchema = '
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": ['  . $faqSchema . ']
            }
        </script>
    ';

$faqMarkup ='  <section class="section type-section-padding">
               <div class="container">
               <h2 class="title title--h2" id="faq">
                '. $faqHeader .'
            </h2>
            <div class="faq__accordion">' . $faqMarkup . '</div>
            </div>
            </section>';
return $faqSchema . $faqMarkup;
}
