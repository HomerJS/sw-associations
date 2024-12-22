<?php declare(strict_types=1);

namespace IhorAss\Extension\Content\Product;

use IhorAss\Core\Content\ProductNumber\ProductNumberDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductNumberExtension extends EntityExtension
{
    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField('ProductNumber', 'id', 'product_id', ProductNumberDefinition::class, true)
        );
    }
}