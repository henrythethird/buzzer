<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Status
{
    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    const UNCONFIRMED = 0;
    const OPEN = 1;
    const CLOSED = 2;
    const INVALID = 3;

    const MAP = [
        self::UNCONFIRMED => "Unconfirmed",
        self::OPEN => "Open",
        self::CLOSED => "Closed",
        self::INVALID => "Invalid"
    ];

    public function __construct($status = self::UNCONFIRMED)
    {
        $this->code = $status;
    }

    /**
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param integer $code
     * @return Status
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function __toString()
    {
        return self::MAP[$this->getCode()];
    }
}