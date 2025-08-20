<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:tx_dveducationfaq_domain_model_faqcategory',
        'label' => 'title',
        'tstamp' => 'tstamp', 'crdate' => 'crdate', 'delete' => 'deleted',
        'default_sortby' => 'sorting ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'title',
        'iconIdentifier' => 'ext-dveducationfaq-category',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => ['1' => ['showitem' => 'title, slug, description, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden']],
    'columns' => [
        'title' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.title', 'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true]],
        'description' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.description', 'config' => ['type' => 'text', 'rows' => 3]],
        'slug' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.slug', 'config' => ['type' => 'slug', 'generatorOptions' => ['fields' => ['title']], 'fallbackCharacter' => '-', 'prependSlash' => false]],
    ],
];
