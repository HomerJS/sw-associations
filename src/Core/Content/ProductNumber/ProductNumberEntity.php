<?php declare(strict_types=1);

namespace IhorAss\Core\Content\ProductNumber;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ProductNumberEntity extends Entity
{
    use EntityIdTrait;

    protected string $number;

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }
}