<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Tests\Functional\Repository;

use Davitec\DvEducationFaq\Domain\Repository\FaqItemRepository;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class FaqItemRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['typo3conf/ext/dv_education_faq'];

    private FaqItemRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationfaq_domain_model_faqcategory.csv');
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/tx_dveducationfaq_domain_model_faqitem.csv');
        $this->repository = $this->get(FaqItemRepository::class);
        $this->repository->setDefaultQuerySettings(
            $this->repository->createQuery()->getQuerySettings()->setRespectStoragePage(false)
        );
    }

    #[Test]
    public function testFindAllReturnsNonDeletedItems(): void
    {
        $result = $this->repository->findAll();
        self::assertCount(3, $result);
    }

    #[Test]
    public function testFindBySearchTermMatchesQuestion(): void
    {
        $result = $this->repository->findBySearchTerm('bewerbe');
        self::assertCount(1, $result);
    }

    #[Test]
    public function testFindBySearchTermMatchesAnswer(): void
    {
        $result = $this->repository->findBySearchTerm('Eduroam');
        self::assertCount(1, $result);
    }

    #[Test]
    public function testFindBySearchTermNoMatch(): void
    {
        $result = $this->repository->findBySearchTerm('Blockchain');
        self::assertCount(0, $result);
    }

    #[Test]
    public function testFindByCategoryReturnsCorrectItems(): void
    {
        $result = $this->repository->findByCategory(1);
        self::assertCount(2, $result);
    }

    #[Test]
    public function testFindByCategoryReturnsEmptyForUnknown(): void
    {
        $result = $this->repository->findByCategory(999);
        self::assertCount(0, $result);
    }
}
