<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Fields
{
    /**
     * @Serializer\Type("string")
     */
    private $description;

    /**
     * @Serializer\Type("string")
     */
    private $summary;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\Creator")
     */
    private $creator;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\Creator")
     */
    private $assignee;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\Project")
     */
    private $project;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\IssueType")
     */
    private $issuetype;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\Priority")
     */
    private $priority;

    /**
     * @Serializer\Type("AppBundle\Value\Jira\Status")
     */
    private $status;

    public function getDescription()
    {
        return $this->description;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getCreator()
    {
        return $this->creator;
    }

    public function getAssignee()
    {
        return $this->assignee;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function getIssueType()
    {
        return $this->issuetype;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getStatus()
    {
        return $this->status;
    }
}