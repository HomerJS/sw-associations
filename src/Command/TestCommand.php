<?php declare(strict_types=1);

namespace IhorAss\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'ihor:test', description: 'Hello PhpStorm')]
class TestCommand extends Command
{
    public function __construct(
        private readonly EntityRepository $sRepository,
        private readonly EntityRepository $s2Repository,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createCLIContext();

//        $simple2IdList = $this->s2Repository->create([
//            [
//                'id' => Uuid::randomHex(),
//                'simple2Name' => 'some name',
//            ]
//        ], $context);
//
//        $pk = $simple2IdList->getPrimaryKeys('simple2_entity');
//        $simple2Id = $pk[0];
//var_dump($simple2Id);
        $this->sRepository->create([
            [
                'id' => Uuid::randomHex(),
                'simpleName' => 'some2 name',
                'simple2EntityId' => '0193e08ca08b71c484e8290885464aa9'
            ]
        ], $context);

        return Command::SUCCESS;
    }
}
