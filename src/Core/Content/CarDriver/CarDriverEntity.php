<?php declare(strict_types=1);

namespace IhorAss\Core\Content\CarDriver;

use IhorAss\Core\Content\Car\CarEntity;
use IhorAss\Core\Content\Driver\DriverEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;

#[EntityAttribute('car_driver')]
class CarDriverEntity extends Entity
{
    #[PrimaryKey]
    #[ForeignKey(entity: 'car')]
    public ?string $carId = null;

    #[PrimaryKey]
    #[ForeignKey(entity: 'driver')]
    public ?string $driverId = null;

    #[ManyToOne(entity: 'car', onDelete: OnDelete::SET_NULL)]
    public ?CarEntity $car = null;

    #[ManyToOne(entity: 'driver', onDelete: OnDelete::SET_NULL)]
    public ?DriverEntity $driver = null;
}