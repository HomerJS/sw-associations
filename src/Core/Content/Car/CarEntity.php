<?php declare(strict_types=1);

namespace IhorAss\Core\Content\Car;

use IhorAss\Core\Content\CarColor\CarColorEntity;
use IhorAss\Core\Content\CarNumber\CarNumberEntity;
use IhorAss\Core\Content\Driver\DriverEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToMany;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OneToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;

#[EntityAttribute('car')]
class CarEntity extends Entity
{
    #[PrimaryKey]
    #[Field(type: FieldType::UUID)]
    public string $id;

    #[Required]
    #[Field(type: FieldType::STRING)]
    public string $name;

    #[ForeignKey(entity: 'car_number')]
    public ?string $carNumberId = null;

    #[OneToOne(entity: 'car_number', onDelete: OnDelete::CASCADE)]
    public ?CarNumberEntity $carNumber = null;

    #[ForeignKey(entity: 'car_color')]
    public ?string $carColorId = null;

    #[ManyToOne(entity: 'car_color', onDelete: OnDelete::SET_NULL)]
    public ?CarColorEntity $carColor = null;

    /**
     * @var array<string, DriverEntity>
     */
    #[ManyToMany(entity: 'driver', onDelete: OnDelete::CASCADE)]
    public ?array $drivers = null;
}