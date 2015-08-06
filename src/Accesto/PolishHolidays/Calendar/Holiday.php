<?php


namespace Accesto\PolishHolidays\Calendar;


/**
 * Class Holiday
 *
 * @package Accesto\PolishHolidays\Holiday
 */
abstract class Holiday
{
    protected $name;

    /**
     * Holiday constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract public function getDate(Year $year);
}
