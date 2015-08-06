# PolishHolidays
Polish Holidays library - allows to check if given date is a Polish Holiday

# Example usage

```php
<?php
include './vendor/autoload.php';

use \Accesto\PolishHolidays\Calendar;

$calendar = Calendar::createWithPolishHolidays();
 
var_dump($calendar->getHoliday(new \DateTime("2015-06-04")));

/**
 class Accesto\PolishHolidays\Calendar\EasterHoliday#191 (2) {
   private $easterDayOffset =>
   int(60)
   protected $name =>
   string(12) "Boże Ciało"
 }
 */

```