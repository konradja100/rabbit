<?php

namespace App\Command;

use App\Message\SimpleMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateRabbitMessagesCommand extends Command
{
    protected static $defaultName = 'rabbit:create';
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct($name = null, MessageBusInterface $bus)
    {
        parent::__construct($name);
        $this->bus = $bus;
    }

    protected function configure()
    {
        $this
            ->setDescription('Create dummy rabbitmq messages')
            ->addOption('size', '--size', InputOption::VALUE_REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $size = $input->getOption('size');

        for ($i = 1; $i <= $size; $i++) {
            $this->bus->dispatch(new SimpleMessage());
        }

        $io->success(sprintf('Created %d messages', $size));
    }
}
