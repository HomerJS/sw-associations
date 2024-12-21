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

        $criteria = new Criteria();
        $criteria->addAssociation('cars');
        $colors = $this->carColorRepo->search($criteria, $context);
        foreach ($colors as $color) {
            var_dump($color->cars);
        }

        return Command::SUCCESS;
    }
}
