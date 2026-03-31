<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Tests\Unit\Domain\Model;

use Davitec\DvEducationFaq\Domain\Model\FaqCategory;
use Davitec\DvEducationFaq\Domain\Model\FaqItem;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class FaqItemTest extends UnitTestCase
{
    private FaqItem $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new FaqItem();
    }

    #[Test]
    public function testQuestionDefault(): void { self::assertSame('', $this->subject->getQuestion()); }

    #[Test]
    public function testSetQuestion(): void { $this->subject->setQuestion('Wie bewerbe ich mich?'); self::assertSame('Wie bewerbe ich mich?', $this->subject->getQuestion()); }

    #[Test]
    public function testAnswerDefault(): void { self::assertSame('', $this->subject->getAnswer()); }

    #[Test]
    public function testSetAnswer(): void { $this->subject->setAnswer('<p>Online-Portal</p>'); self::assertSame('<p>Online-Portal</p>', $this->subject->getAnswer()); }

    #[Test]
    public function testCategoryDefault(): void { self::assertNull($this->subject->getCategory()); }

    #[Test]
    public function testSetCategory(): void
    {
        $cat = new FaqCategory();
        $this->subject->setCategory($cat);
        self::assertSame($cat, $this->subject->getCategory());
    }

    #[Test]
    public function testHelpfulYesDefault(): void { self::assertSame(0, $this->subject->getHelpfulYes()); }

    #[Test]
    public function testSetHelpfulYes(): void { $this->subject->setHelpfulYes(42); self::assertSame(42, $this->subject->getHelpfulYes()); }

    #[Test]
    public function testHelpfulNoDefault(): void { self::assertSame(0, $this->subject->getHelpfulNo()); }

    #[Test]
    public function testSetHelpfulNo(): void { $this->subject->setHelpfulNo(5); self::assertSame(5, $this->subject->getHelpfulNo()); }

    #[Test]
    public function testGetHelpfulTotal(): void
    {
        $this->subject->setHelpfulYes(30);
        $this->subject->setHelpfulNo(10);
        self::assertSame(40, $this->subject->getHelpfulTotal());
    }

    #[Test]
    public function testGetHelpfulPercentage(): void
    {
        $this->subject->setHelpfulYes(3);
        $this->subject->setHelpfulNo(1);
        self::assertSame(75.0, $this->subject->getHelpfulPercentage());
    }

    #[Test]
    public function testGetHelpfulPercentageZeroVotes(): void
    {
        self::assertSame(0.0, $this->subject->getHelpfulPercentage());
    }

    #[Test]
    public function testSortingDefault(): void { self::assertSame(0, $this->subject->getSorting()); }

    #[Test]
    public function testSetSorting(): void { $this->subject->setSorting(3); self::assertSame(3, $this->subject->getSorting()); }
}
