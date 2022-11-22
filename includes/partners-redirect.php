<?php
use CodeLibrary\Php\Controllers\AffiliateLinkSystem\AffiliateLinkSystemFrontController;
use CodeLibrary\Php\Controllers\UnitySystem\UnityAfflinks;
use CodeLibrary\Php\Controllers\UnitySystem\UnityUtils;
use CodeLibrary\Php\Models\AffiliateLinkSystem\AffiliateLinkCriteriaRepository;
use CodeLibrary\Php\Models\CentraliseSystem\PartnerFactory;
use CodeLibrary\Php\Models\CentraliseSystem\Partners;
use CodeLibrary\Php\Models\CentraliseSystem\PartnerVerticalRepository;
use CodeLibrary\Php\Models\SiteInformationSystem\DeviceRepository;
use CodeLibrary\Php\Models\SiteInformationSystem\LocationRepository;
use CodeLibrary\ThirdParty\Php\UserAgentDetection\PhpUserAgent;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';

$affiliateLinkFrontController = new AffiliateLinkSystemFrontController(
    new UnityAfflinks(
        new UnityUtils(),
        new LocationRepository(),
        new DeviceRepository(),
        new Partners(),
        new PartnerFactory(),
        AffiliateLinkCriteriaRepository::createRepositoryInstance(),
        PartnerVerticalRepository::createRepositoryInstance(),
        new PhpUserAgent($_SERVER['HTTP_USER_AGENT'])
    )
);


$affiliateLinkFrontController->sendUserToAffiliateLink();
