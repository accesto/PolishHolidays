<?php


namespace Accesto\PolishHolidays\Tests\Calendar;


use Accesto\PolishHolidays\Calendar\EasterHoliday;

class EasterHolidayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider holidays
     */
    public function testEasterHoliday($holidayYear, $isLeapYear, $date)
    {
        $year = $this->prophesize('Accesto\PolishHolidays\Calendar\Year');
        $year->getYear()->willReturn($holidayYear);
        $year->isLeap()->willReturn($isLeapYear);

        $holiday = new EasterHoliday("wielkanoc", 0);
        $this->assertEquals($date, $holiday->getDate($year->reveal()));
    }

    public function holidays()
    {
        return array(
            array(2015, false, new \DateTime('2015-04-05')),
            array(2016, true, new \DateTime('2016-03-27')),
            array(2017, false, new \DateTime('2017-04-16')),
            array(2018, false, new \DateTime('2018-04-01')),
            array(2019, false, new \DateTime('2019-04-21')),
            array(2020, true, new \DateTime('2020-04-12')),
            array(2021, false, new \DateTime('2021-04-04')),
            array(2022, false, new \DateTime('2022-04-17')),
            array(2023, false, new \DateTime('2023-04-09')),
            array(2024, true, new \DateTime('2024-03-31')),
            array(2025, false, new \DateTime('2025-04-20')),
            array(2026, false, new \DateTime('2026-04-05')),
        );
    }
}
