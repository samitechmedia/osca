<?php
if (isset($hreflang_alternates) and is_array($hreflang_alternates)) {
$domainHandling = new \CodeLibrary\Php\Classes\DomainHandling\DomainHandling();
foreach ($hreflang_alternates as $alternate) { ?>
    <link rel="alternate" hreflang="<?php echo $alternate['hreflang'] ?>" href="<?php echo $domainHandling->getFullDomainUrl() . $alternate['href'] ?>"/>
<?php }
}?>