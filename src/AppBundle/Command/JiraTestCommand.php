<?php

namespace AppBundle\Command;

use AppBundle\Value\Jira\Response;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class JiraTestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName("app:test:jira")
            ->addArgument('ticketNumber', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this
            ->getContainer()
            ->get('app.jira')
            ->fetchIssue($input->getArgument('ticketNumber'));

        dump($response);

        $this->getContainer()->get('app.printer')->dispatch(
            $this->constructRequestContent($response)
        );
    }

    private function constructRequestContent(Response $response)
    {
        $xml = $this->getContainer()->get('templating')->render('print/jira_ticket.xml.twig', [
            'fields' => $response->getFields(),
            'ticketNr' => $response->getKey()
        ]);

        simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);

        return json_decode($json,TRUE);
    }
}