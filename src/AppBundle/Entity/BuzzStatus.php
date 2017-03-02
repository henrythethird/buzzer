<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class BuzzStatus
{
    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;
    const STATUS_INVALID = 2;

    const MAP = [
        self::STATUS_OPEN => "Open",
        self::STATUS_CLOSED => "Closed",
        self::STATUS_INVALID => "Invalid"
    ];

    public function __construct($status = self::STATUS_OPEN)
    {
        $this->status = $status;
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     * @return BuzzStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function __toString()
    {
        return self::MAP[$this->getStatus()];
    }
}