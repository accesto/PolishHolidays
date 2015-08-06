<?php


namespace Accesto\PolishHolidays\Tests\Calendar;

use Accesto\PolishHolidays\Calendar\Year;


/**
 * Class YearTest
 *
 * @package Accesto\PolishHolidays\Tests\Calendar
 */
class YearTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getYearsIncludingLeapInfo
     */
    public function testLeapYear($year, $isLeapYear)
    {
        $year = new Year($year);

        $this->assertEquals(
            $isLeapYear,
            $year->isLeap(),
            sprintf(
                'Expected %u to be %s year, got %s',
                $year->getYear(),
                ($isLeapYear) ? 'leap' : 'normal',
                ($year->isLeap()) ? 'leap' : 'normal'
            )
        );
    }

    public function getYearsIncludingLeapInfo()
    {
        return array(
            array(2015, false),
            array(2016, true),
            array(2000, true),
            array(2100, false),
        );
    }
}
