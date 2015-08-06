<?php


namespace Accesto\PolishHolidays\Tests;


use Accesto\PolishHolidays\Calendar;
use Prophecy\Argument;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calendar
     */
    private $calendar;

    private $newYearsEve;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     */
    protected function setUp()
    {
        $this->calendar = new Calendar();

        $newYearsEve = $this->prophesize('Accesto\PolishHolidays\Calendar\Holiday');
        $newYearsEve->getDate(Argument::type('Accesto\PolishHolidays\Calendar\Year'))->willReturn(new \DateTime('2015-01-01'));
        $this->newYearsEve = $newYearsEve->reveal();

        $this->calendar->addHoliday($this->newYearsEve);
    }

    public function testHolidayDay()
    {
        $this->assertSame($this->newYearsEve, $this->calendar->getHoliday(new \DateTime('2015-01-01')));
    }

    public function testNonHolidayDay()
    {
        $this->assertSame(null, $this->calendar->getHoliday(new \DateTime('2015-01-02')));
    }
}
