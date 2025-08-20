<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:tx_dveducationfaq_domain_model_faqitem',
        'label' => 'question',
        'tstamp' => 'tstamp', 'crdate' => 'crdate', 'delete' => 'deleted',
        'default_sortby' => 'sorting ASC',
        'enablecolumns' => ['disabled' => 'hidden', 'starttime' => 'starttime', 'endtime' => 'endtime'],
        'searchFields' => 'question,answer',
        'iconIdentifier' => 'ext-dveducationfaq-item',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => ['1' => ['showitem' => 'question, answer, category, --div--;LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:tab.rating, helpful_yes, helpful_no, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime']],
    'columns' => [
        'question' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.question', 'config' => ['type' => 'input', 'size' => 80, 'max' => 1024, 'required' => true]],
        'answer' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.answer', 'config' => ['type' => 'text', 'rows' => 10, 'enableRichtext' => true, 'required' => true]],
        'category' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.category', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'foreign_table' => 'tx_dveducationfaq_domain_model_faqcategory', 'items' => [['label' => '', 'value' => 0]], 'default' => 0]],
        'helpful_yes' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.helpful_yes', 'config' => ['type' => 'number', 'readOnly' => true]],
        'helpful_no' => ['label' => 'LLL:EXT:dv_education_faq/Resources/Private/Language/locallang_db.xlf:field.helpful_no', 'config' => ['type' => 'number', 'readOnly' => true]],
    ],
];
