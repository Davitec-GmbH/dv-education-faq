<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Tests\Unit\Domain\Model;

use Davitec\DvEducationFaq\Domain\Model\FaqCategory;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class FaqCategoryTest extends UnitTestCase
{
    private FaqCategory $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new FaqCategory();
    }

    #[Test]
    public function testTitleDefault(): void { self::assertSame('', $this->subject->getTitle()); }

    #[Test]
    public function testSetTitle(): void { $this->subject->setTitle('Bewerbung'); self::assertSame('Bewerbung', $this->subject->getTitle()); }

    #[Test]
    public function testDescriptionDefault(): void { self::assertSame('', $this->subject->getDescription()); }

    #[Test]
    public function testSetDescription(): void { $this->subject->setDescription('Alles rund um die Bewerbung'); self::assertSame('Alles rund um die Bewerbung', $this->subject->getDescription()); }

    #[Test]
    public function testSlugDefault(): void { self::assertSame('', $this->subject->getSlug()); }

    #[Test]
    public function testSetSlug(): void { $this->subject->setSlug('bewerbung'); self::assertSame('bewerbung', $this->subject->getSlug()); }

    #[Test]
    public function testSortingDefault(): void { self::assertSame(0, $this->subject->getSorting()); }

    #[Test]
    public function testSetSorting(): void { $this->subject->setSorting(5); self::assertSame(5, $this->subject->getSorting()); }
}
