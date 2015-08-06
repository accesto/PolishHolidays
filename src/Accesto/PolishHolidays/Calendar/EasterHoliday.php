<?php


namespace Accesto\PolishHolidays\Calendar;


/**
 * Class EasterHoliday
 *
 * @package Accesto\PolishHolidays\Calendar
 */
class EasterHoliday extends Holiday
{
    private $easterDayOffset;

    /**
     * Holiday constructor.
     *
     * @param $name
     */
    public function __construct($name, $easterDayOffset = 0)
    {
        $this->easterDayOffset = $easterDayOffset;

        parent::__construct($name);
    }

    public function getDate(Year $year)
    {
        /**
         * We do not rely on the easter_date function in order to always
         * calculate te Polish easter date (not depending on the timezone)
         */

        $a = $year->getYear() % 19;
        $b = floor($year->getYear()/100);
        $c = $year->getYear() % 100;
        $d = floor($b/4);
        $e = $b % 4;
        $f = floor(($b+8)/25);
        $g = floor(($b-$f+1)/3);
        $h = (19*$a + $b - $d - $g + 15) % 30;
        $i = floor($c/4);
        $k = $c % 4;
        $l = (32 + 2*$e + 2*$i - $h - $k) % 7;
        $m = floor(($a + 11*$h + 22*$l)/451);
        $p = ($h + $l -7*$m + 114);
        $day = ($p % 31)+1;
        $month = floor($p/31);

        $date = new \DateTime($year->getYear().'-'.$month.'-'.$day);
        $date->add(new \DateInterval('P'.$this->easterDayOffset.'D'));

        return $date;
    }
}
