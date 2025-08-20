<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin('DvEducationFaq', 'FaqList', 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang.xlf:plugin.faqlist.title', 'ext-dveducationfaq-item');
ExtensionUtility::registerPlugin('DvEducationFaq', 'FaqRate', 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang.xlf:plugin.faqrate.title', 'ext-dveducationfaq-item');
