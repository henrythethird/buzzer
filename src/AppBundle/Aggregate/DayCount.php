<?php

namespace AppBundle\Aggregate;

class DayCount
{
    private $day;
    private $count;

    public function __construct($day, $count)
    {
        $this->day = $day;
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}