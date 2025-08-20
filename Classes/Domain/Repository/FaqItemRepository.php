<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class FaqItemRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    public function findBySearchTerm(string $searchTerm): QueryResultInterface
    {
        $query = $this->createQuery();
        $pattern = '%' . $searchTerm . '%';

        $query->matching(
            $query->logicalOr(
                $query->like('question', $pattern),
                $query->like('answer', $pattern),
            )
        );

        return $query->execute();
    }

    public function findByCategory(int $categoryUid): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('category', $categoryUid));

        return $query->execute();
    }
}
