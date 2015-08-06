<?php


namespace Accesto\PolishHolidays\Calendar;


/**
 * Class FixedHoliday
 *
 * @package Accesto\PolishHolidays\Holiday
 */
class FixedHoliday extends Holiday
{
    protected $day;

    protected $month;

    /**
     * Holiday constructor.
     *
     * @param $name
     */
    public function __construct($name, $month, $day)
    {
        $this->day = $day;
        $this->month = $month;

        parent::__construct($name);
    }

    public function getDate(Year $year)
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $year->getYear().'-'.$this->month.'-'.$this->day.' 00:00:00');
    }
}
