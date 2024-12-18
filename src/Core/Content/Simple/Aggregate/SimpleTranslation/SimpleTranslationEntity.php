<?php declare(strict_types=1);

namespace IhorAss\Core\Content\Simple\Aggregate\SimpleTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class SimpleTranslationEntity extends TranslationEntity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $simpleEntityId;

    #[Field(type: FieldType::STRING)]
    public ?string $simpleName = null;
}