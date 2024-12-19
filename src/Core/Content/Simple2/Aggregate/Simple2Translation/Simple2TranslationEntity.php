<?php declare(strict_types=1);

namespace IhorAss\Core\Content\Simple2\Aggregate\Simple2Translation;

use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class Simple2TranslationEntity extends TranslationEntity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $simple2EntityId;

    #[Field(type: FieldType::STRING)]
    public ?string $simple2Name = null;
}