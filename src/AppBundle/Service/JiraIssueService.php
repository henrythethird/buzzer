<?php

namespace AppBundle\Service;

use AppBundle\Value\Jira\Response;
use JMS\Serializer\SerializerInterface;

class JiraIssueService
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $ticketNumber
     * @return Response
     */
    public function fetchIssue($ticketNumber)
    {
        $ch = curl_init(sprintf("https://jira.pwc-digital.ch/rest/api/2/issue/%s", $ticketNumber));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Basic cGF0cmljay5rYXVmbWFubkBwd2MtZGlnaXRhbC5jaDpAU2Nocm9kaW5nZXIxMjM0"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        curl_close($ch);

        return $this->serializer->deserialize($response, Response::class, 'json');
    }
}