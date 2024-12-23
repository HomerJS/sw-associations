<?php declare(strict_types=1);

namespace IhorAss\Extension\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\AttributeEntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductManufExtension extends EntityExtension
{
    public function __construct(
        private readonly AttributeEntityDefinition $manufDefinition,
        private readonly AttributeEntityDefinition $manufProductDefinition
    ) {
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new ManyToManyAssociationField(
                'manufs',
                $this->manufDefinition::class,
                $this->manufProductDefinition::class,
                'product_id',
                'manuf_id'
            )
        );
    }
}