<?php

declare(strict_types=1);

use Davitec\DvEducationFaq\Controller\FaqController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] ?? [],
    [
        'tx_dveducationfaq_faqlist[searchTerm]',
        'tx_dveducationfaq_faqlist[category]',
        'tx_dveducationfaq_faqlist[action]',
        'tx_dveducationfaq_faqlist[controller]',
        'tx_dveducationfaq_faqlist[__referrer]',
        'tx_dveducationfaq_faqlist[__referrer][@extension]',
        'tx_dveducationfaq_faqlist[__referrer][@controller]',
        'tx_dveducationfaq_faqlist[__referrer][@action]',
        'tx_dveducationfaq_faqlist[__referrer][@request]',
        'tx_dveducationfaq_faqlist[__trustedProperties]',
        'tx_dveducationfaq_faqrate[faq]',
        'tx_dveducationfaq_faqrate[helpful]',
    ],
);

ExtensionUtility::configurePlugin(
    'DvEducationFaq',
    'FaqList',
    [FaqController::class => 'list'],
    [FaqController::class => 'list'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'DvEducationFaq',
    'FaqRate',
    [FaqController::class => 'rate'],
    [FaqController::class => 'rate'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
