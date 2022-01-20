<?php


namespace Accesto\PolishHolidays;

use Accesto\PolishHolidays\Calendar\EasterHoliday;
use Accesto\PolishHolidays\Calendar\FixedHoliday;
use Accesto\PolishHolidays\Calendar\Holiday;
use Accesto\PolishHolidays\Calendar\Year;


/**
 * Class Calendar
 *
 * @package Accesto\PolishHolidays
 */
class Calendar
{
    /**
     * @var Holiday[]
     */
    protected $holidays = array();

    public static function createWithPolishHolidays()
    {
        $calendar = new static;

        $calendar->addHoliday(new FixedHoliday('Nowy Rok', 1, 1));
        $calendar->addHoliday(new FixedHoliday('Święto Trzech Króli', 1, 6));
        $calendar->addHoliday(new FixedHoliday('Święto Państwowe', 5, 1));
        $calendar->addHoliday(new FixedHoliday('Święto Narodowe Trzeciego Maja', 5, 3));
        $calendar->addHoliday(new FixedHoliday('Wniebowzięcie Najświętszej Maryi Panny', 8, 15));
        $calendar->addHoliday(new FixedHoliday('Wszystkich Świętych', 11, 1));
        $calendar->addHoliday(new FixedHoliday('Narodowe Święto Niepodległości', 11, 11));
        $calendar->addHoliday(new FixedHoliday('pierwszy dzień Bożego Narodzenia', 12, 25));
        $calendar->addHoliday(new FixedHoliday('drugi dzień Bożego Narodzenia', 12, 26));

        $calendar->addHoliday(new EasterHoliday('pierwszy dzień Wielkiej Nocy', 0));
        $calendar->addHoliday(new EasterHoliday('drugi dzień Wielkiej Nocy', 1));
        $calendar->addHoliday(new EasterHoliday('pierwszy dzień Zielonych Świątek', 49));
        $calendar->addHoliday(new EasterHoliday('dzień Bożego Ciała', 60));

        return $calendar;
    }

    public function addHoliday(Holiday $holiday)
    {
        $this->holidays[] = $holiday;
    }

    public function getHoliday(\DateTime $date)
    {
        foreach($this->holidays as $holiday)
        {
            $holidayDate = $holiday->getDate(new Year($date->format('Y')));

            if ($this->compareDates($date, $holidayDate)) {
                return $holiday;
            }
        }

        return null;
    }

    protected function compareDates(\DateTime $date1, \DateTime $date2)
    {
        return $date1->format('Y-m-d') == $date2->format('Y-m-d');
    }
}
