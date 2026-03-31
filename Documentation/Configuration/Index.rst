.. include:: /Includes.rst.txt

=============
Configuration
=============

.. contents:: On this page
   :local:
   :depth: 2

TypoScript Constants
====================

.. confval:: plugin.tx_dveducationfaq.persistence.storagePid

   :type: int
   :Default: (empty)

   UID of the sysfolder containing FAQ categories and items.

.. confval:: plugin.tx_dveducationfaq.settings.showRating

   :type: boolean
   :Default: 1

   Enable or disable the "Was this helpful?" rating buttons in the
   frontend. Set to ``0`` to hide them.

Plugins
=======

- **FaqList** (CType: ``dveducationfaq_faqlist``) — Main FAQ display with
  search, category filter, and accordion. Non-cacheable (POST search).
- **FaqRate** (CType: ``dveducationfaq_faqrate``) — AJAX endpoint for
  helpfulness rating. Returns JSON. Non-cacheable.

Helpfulness rating
==================

How it works
------------

Each FAQ item has two integer counters in the database:

- ``helpful_yes`` — number of "Yes" clicks
- ``helpful_no`` — number of "No" clicks

When a visitor clicks "Yes" or "No", a POST request is sent to the
**FaqRate** plugin which increments the corresponding counter and
returns a JSON response.

Backend view
------------

The counters are visible in the backend when editing a FAQ item:

- Open a FAQ item record
- Switch to the **Rating** tab
- The fields "Helpful: Yes" and "Helpful: No" show the current counts
  (read-only)

The model also provides computed properties:

- ``getHelpfulTotal()`` — sum of yes + no
- ``getHelpfulPercentage()`` — percentage of "yes" votes
