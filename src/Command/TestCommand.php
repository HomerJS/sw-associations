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

        $this->sRepository->create([
            [
                'id' => Uuid::randomHex(),
                'simpleName' => 'some name',
            ]
        ], $context);

        $this->s2Repository->create([
            [
                'id' => Uuid::randomHex(),
                'simple2Name' => 'some2 name',
            ]
        ], $context);

        return Command::SUCCESS;
    }
}
