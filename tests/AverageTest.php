<?php

use BsdTraning\UnitTest\Helper\Average;
use PHPUnit\Framework\TestCase;

/**
 * Class AverageTest
 * https://github.com/drmonkeyninja/phpunit-simple-example
 */
class AverageTest extends TestCase
{
    protected $Average;

    public function setUp() : void
    {
        $this->Average = new Average();
    }

    public function testCalculationOfMean()
    {
        $numbers = [3, 7, 6, 1, 5];
        $this->assertEquals(4.4, $this->Average->mean($numbers));
    }

    public function testCalculationOfMedian()
    {
        $numbers = [3, 7, 6, 1, 5];
        $this->assertEquals(5, $this->Average->median($numbers));
    }
}