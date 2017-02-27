<?php

namespace AppBundle\Command;

use AppBundle\Entity\Buzz;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestPrintCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:print:test')
            ->setDescription('Tests the printing service');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $buzz = new Buzz();
        $this->getContainer()->get('app.printer')->dispatch($buzz);
    }
}
