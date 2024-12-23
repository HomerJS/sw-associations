<?php declare(strict_types=1);

namespace IhorAss\Core\Content\ProductText;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ProductTextEntity extends Entity
{
    use EntityIdTrait;

    protected string $text;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}