<?php declare(strict_types=1);

namespace IhorAss\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'ihor:test', description: 'Hello PhpStorm')]
class TestCommand extends Command
{
    public function __construct(
        private readonly EntityRepository $carRepo,
        private readonly EntityRepository $carNumberRepo,
        private readonly EntityRepository $carColorRepo,
        private readonly EntityRepository $driverRepo,
        private readonly EntityRepository $productRepo,
        private readonly EntityRepository $manufRepo,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createCLIContext();

//        $this->carRepo->create([
//            [
//                'id' => Uuid::randomHex(),
//                'name' => 'VW',
//                'carNumber' => [
//                    'id' => Uuid::randomHex(),
//                    'carNumber' => 'Second',
//                ],
//                'carColor' => [
//                    'id' => Uuid::randomHex(),
//                    'carColor' => 'Black',
//                ]
//            ]
//        ], $context);

//        $criteria = new Criteria();
//        $criteria->addAssociation('carNumber');
//        $cars = $this->carRepo->search($criteria, $context)->getElements();
//        foreach ($cars as $car) {
//            var_dump($car->carNumberId);
//            var_dump($car->carNumber);
//        }

//        $criteria = new Criteria();
//        $criteria->addAssociation('cars');
//        $colors = $this->carColorRepo->search($criteria, $context);
//        foreach ($colors as $color) {
//            var_dump($color->cars);
//        }

//        $this->driverRepo->create([
//            [
//                'id' => Uuid::randomHex(),
//                'name' => 'Driver1'
//            ],
//            [
//                'id' => Uuid::randomHex(),
//                'name' => 'Driver2'
//            ],
//            [
//                'id' => Uuid::randomHex(),
//                'name' => 'Driver3'
//            ]
//        ], $context);


//        $carId = $this->carRepo->searchIds(new Criteria(), $context)->firstId();
//        $driverIds = $this->driverRepo->searchIds(new Criteria(), $context)->getIds();
//
//        $payload = [];
//        foreach ($driverIds as $driverId) {
//            $payload[] = [
//                'id' => $driverId,
//            ];
//        }
//
//        $this->carRepo->update([
//            [
//                'id' => $carId,
//                'drivers' => $payload
//            ]
//        ], $context);

//        $criteria = new Criteria();
//        $criteria->addAssociation('drivers');
//        $cars = $this->carRepo->search($criteria, $context);
//        foreach ($cars as $car) {
//            var_dump($car->drivers);
//        }

        //        One-To-One
//        $product = $this->productRepo->search(new Criteria(), $context)->first();
//
//        $this->productRepo->upsert([
//            [
//                'id' => $product->getId(),
//                'ProductNumber' => [
//                    'productVersionId' => $product->getVersionId(),
//                    'number' => 'some number'
//                ]
//            ]
//        ], $context);

//        One-To-Many
//        $product = $this->productRepo->search(new Criteria(), $context)->first();
//
//        $this->productRepo->upsert([
//            [
//                'id' => $product->getId(),
//                'ProductTexts' => [
//                    [
//                        'text' => 'some text'
//                    ]
//                ]
//            ]
//        ], $context);

//        $criteria = new Criteria();
//        $criteria->addAssociation('ProductTexts');
//        $product = $this->productRepo->search($criteria, $context)->first();
//
//        $extensions = $product->getExtension('ProductTexts');
//        foreach ($extensions as $extension) {
//            var_dump($extension->getText());
//        }


//        MANY-TO-MANY
//        $this->manufRepo->create([
//            [
//                'id' => Uuid::randomHex(),
//                'string' => 'TH'
//            ],
//            [
//                'id' => Uuid::randomHex(),
//                'string' => 'LV'
//            ],
//            [
//                'id' => Uuid::randomHex(),
//                'string' => 'GA'
//            ],
//        ], $context);
//
        $manufId = $this->manufRepo->searchIds(new Criteria(), $context)->firstId();
        $productIds = $this->productRepo->searchIds(new Criteria(), $context)->getIds();

        $payload = [];
        foreach ($productIds as $productId) {
            $payload[] = [
                'id' => $productId,
            ];
        }

        $this->manufRepo->update([
            [
                'id' => $manufId,
                'products' => $payload
            ]
        ], $context);

        return Command::SUCCESS;
    }
}
