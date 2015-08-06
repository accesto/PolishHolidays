<?php


namespace Accesto\PolishHolidays\Calendar;


/**
 * Class Year
 *
 * @package Accesto\PolishHolidays\Calendar
 */
class Year
{
    protected $year;

    /**
     * Year constructor.
     *
     * @param $year
     */
    public function __construct($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    public function isLeap()
    {
        $isMod4 = ($this->year % 4) == 0;
        $isMod100 = ($this->year % 100) == 0;
        $isMod400 = ($this->year % 400) == 0;

        return ($isMod4) && (!$isMod100 || $isMod400);
    }
}
