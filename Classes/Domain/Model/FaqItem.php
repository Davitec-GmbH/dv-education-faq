<?php

declare(strict_types=1);

namespace Davitec\DvEducationFaq\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class FaqItem extends AbstractEntity
{
    protected string $question = '';
    protected string $answer = '';
    protected ?FaqCategory $category = null;
    protected int $helpfulYes = 0;
    protected int $helpfulNo = 0;
    protected int $sorting = 0;

    public function getQuestion(): string { return $this->question; }
    public function setQuestion(string $question): void { $this->question = $question; }
    public function getAnswer(): string { return $this->answer; }
    public function setAnswer(string $answer): void { $this->answer = $answer; }
    public function getCategory(): ?FaqCategory { return $this->category; }
    public function setCategory(?FaqCategory $category): void { $this->category = $category; }
    public function getHelpfulYes(): int { return $this->helpfulYes; }
    public function setHelpfulYes(int $helpfulYes): void { $this->helpfulYes = $helpfulYes; }
    public function getHelpfulNo(): int { return $this->helpfulNo; }
    public function setHelpfulNo(int $helpfulNo): void { $this->helpfulNo = $helpfulNo; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $sorting): void { $this->sorting = $sorting; }

    public function getHelpfulTotal(): int
    {
        return $this->helpfulYes + $this->helpfulNo;
    }

    public function getHelpfulPercentage(): float
    {
        $total = $this->getHelpfulTotal();
        return $total > 0 ? round(($this->helpfulYes / $total) * 100, 1) : 0.0;
    }
}
