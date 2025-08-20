<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Controller;

use Davitec\DvEducationFaq\Domain\Model\FaqItem;
use Davitec\DvEducationFaq\Domain\Repository\FaqCategoryRepository;
use Davitec\DvEducationFaq\Domain\Repository\FaqItemRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class FaqController extends ActionController
{
    public function __construct(
        private readonly FaqItemRepository $faqItemRepository,
        private readonly FaqCategoryRepository $faqCategoryRepository,
        private readonly PersistenceManager $persistenceManager,
    ) {}

    public function listAction(): ResponseInterface
    {
        $searchTerm = trim((string)($this->request->getParsedBody()['tx_dveducationfaq_faqlist']['searchTerm']
            ?? $this->request->getQueryParams()['tx_dveducationfaq_faqlist']['searchTerm']
            ?? ''));
        $categoryUid = (int)($this->request->getParsedBody()['tx_dveducationfaq_faqlist']['category']
            ?? $this->request->getQueryParams()['tx_dveducationfaq_faqlist']['category']
            ?? 0);

        if ($searchTerm !== '') {
            $items = $this->faqItemRepository->findBySearchTerm($searchTerm);
        } elseif ($categoryUid > 0) {
            $items = $this->faqItemRepository->findByCategory($categoryUid);
        } else {
            $items = $this->faqItemRepository->findAll();
        }

        $this->view->assignMultiple([
            'items' => $items,
            'categories' => $this->faqCategoryRepository->findAll(),
            'searchTerm' => $searchTerm,
            'selectedCategory' => $categoryUid,
            'showRating' => (bool)($this->settings['showRating'] ?? true),
        ]);

        return $this->htmlResponse();
    }

    public function rateAction(): ResponseInterface
    {
        $faqUid = (int)($this->request->getParsedBody()['tx_dveducationfaq_faqrate']['faq'] ?? 0);
        $helpful = (string)($this->request->getParsedBody()['tx_dveducationfaq_faqrate']['helpful'] ?? '');

        if ($faqUid > 0 && in_array($helpful, ['yes', 'no'], true)) {
            $item = $this->faqItemRepository->findByUid($faqUid);
            if ($item instanceof FaqItem) {
                if ($helpful === 'yes') {
                    $item->setHelpfulYes($item->getHelpfulYes() + 1);
                } else {
                    $item->setHelpfulNo($item->getHelpfulNo() + 1);
                }
                $this->faqItemRepository->update($item);
                $this->persistenceManager->persistAll();
            }
        }

        return $this->jsonResponse(json_encode(['success' => true], JSON_THROW_ON_ERROR));
    }
}
