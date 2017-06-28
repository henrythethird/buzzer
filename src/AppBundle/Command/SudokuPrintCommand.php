<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xeeeveee\Sudoku\Puzzle;

class SudokuPrintCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:print:sudoku')
            ->addArgument('n', InputArgument::REQUIRED)
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $n = $input->getArgument('n');
        $ch = curl_init($this->constructUrl());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->constructRequestContent($n));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml; charset="utf-8"'
        ));

        curl_exec($ch);

        echo $this->constructRequestContent($n);

        curl_close($ch);
    }

    private function constructRequestContent($n)
    {
        $puzzle = new Puzzle();
        $puzzle->generatePuzzle(intval($n));
        $puzzle = $puzzle->getPuzzle();


        array_walk_recursive($puzzle, function(&$item) {
            $item = $item ?: " ";
        });

        $xml = $this->getContainer()->get('twig')->render('print/tic-tac-toe.xml.twig', [
            'p' => $puzzle
        ]);

        simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);

        return json_decode($json,TRUE);
    }

    private function constructUrl()
    {
        return sprintf("http://%s/cgi-bin/epos/service.cgi?devid=local_printer&timeout=6000", $this->getContainer()->getParameter('printer_ip'));
    }
}
