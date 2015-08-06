<?php


namespace Accesto\PolishHolidays\Tests\Calendar;


use Accesto\PolishHolidays\Calendar\FixedHoliday;

class FixedHolidayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider holidays
     */
    public function testFixedHoliday($month, $day, $holidayYear, $date)
    {
        $year = $this->prophesize('Accesto\PolishHolidays\Calendar\Year');
        $year->getYear()->willReturn($holidayYear);
        $holiday = new FixedHoliday("test holiday", $month, $day);
        $this->assertEquals($date, $holiday->getDate($year->reveal()));
    }

    public function holidays()
    {
        return array(
            array(1, 1, 2015, new \DateTime("2015-01-01")),
            array(1, 1, 2016, new \DateTime("2016-01-01")),
            array(12, 25, 2015, new \DateTime("2015-12-25")),
            array(12, 25, 2016, new \DateTime("2016-12-25")),
        );
    }
}
