<?php declare(strict_types=1);

namespace IhorAss\Core\Content\ManufProduct;

use IhorAss\Core\Content\Manuf\ManufEntity;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ReferenceVersion;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Version;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;

#[EntityAttribute('manuf_product')]
class ManufProductEntity extends Entity
{
    #[PrimaryKey]
    #[ReferenceVersion(entity: 'product')]
    public string $productVersionId;

    #[PrimaryKey]
    #[ForeignKey(entity: 'product')]
    public ?string $productId = null;

    #[PrimaryKey]
    #[ForeignKey(entity: 'manuf')]
    public ?string $manufId = null;

    #[ManyToOne(entity: 'product', onDelete: OnDelete::SET_NULL)]
    public ?ProductEntity $product = null;

    #[ManyToOne(entity: 'manuf', onDelete: OnDelete::SET_NULL)]
    public ?ManufEntity $manuf = null;
}