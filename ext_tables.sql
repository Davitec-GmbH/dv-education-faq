CREATE TABLE tx_dveducationfaq_domain_model_faqcategory (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    slug varchar(2048) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_dveducationfaq_domain_model_faqitem (
    question varchar(1024) DEFAULT '' NOT NULL,
    answer text,
    category int(11) unsigned DEFAULT '0' NOT NULL,
    helpful_yes int(11) unsigned DEFAULT '0' NOT NULL,
    helpful_no int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);
