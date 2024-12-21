<?php declare(strict_types=1);

namespace IhorAss\Core\Content\CarColor;

use IhorAss\Core\Content\Car\CarEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OneToMany;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;

#[EntityAttribute('car_color')]
class CarColorEntity extends Entity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

    #[Required]
    #[Field(type: FieldType::STRING)]
    public string $carColor;

    //prod has cms_id many-to-one
    //cms has many products one-to-many

    /**
     * @var array<string, CarEntity>|null
     */
    #[OneToMany(entity: 'car', ref: 'car_color_id', onDelete: OnDelete::CASCADE)]
    public ?array $cars = null;
}