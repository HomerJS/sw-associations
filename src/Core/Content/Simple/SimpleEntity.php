<?php declare(strict_types=1);

namespace IhorAss\Core\Content\Simple;

use IhorAss\Core\Content\Simple2\Simple2Entity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OneToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Translations;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\Struct\ArrayEntity;

#[EntityAttribute('simple_entity')]
class SimpleEntity extends Entity
{
    // dal:create:schema

    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

    #[Required]
    #[Field(type: FieldType::STRING, translated: true)]
    public ?string $simpleName = null;

    /**
     * @var array<string, ArrayEntity>|null
     */
    #[Translations]
    public ?array $translations = null;

    #[ForeignKey(entity: 'simple2_entity')]
    public ?string $simple2EntityId = null;

    #[OneToOne(entity: 'simple2_entity', onDelete: OnDelete::CASCADE)]
    public ?Simple2Entity $simple2Entity = null;
}