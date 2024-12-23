<?php declare(strict_types=1);

namespace IhorAss\Core\Content\Manuf;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToMany;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;

#[EntityAttribute('manuf')]
class ManufEntity extends Entity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

    #[Field(type: FieldType::STRING)]
    public string $string;

    /**
     * @var array<string, ProductEntity>
     */
    #[ManyToMany(entity: 'product', onDelete: OnDelete::SET_NULL)]
    public ?array $products = null;
}