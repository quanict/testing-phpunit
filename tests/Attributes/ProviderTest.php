<?php declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;

final class ProviderTest extends TestCase
{
//    #[Test]
    #[DataProvider('additionProvider')]
    #[TestDox('Adding $a to $b results in $expected')]
    public function testAdd(int $expected, int $a, int $b)
    {
        $this->assertSame($expected, $a + $b);
    }

    public static function additionProvider()
    {
        return [
            'data set 1' => [0, 0, 0],
            'data set 2' => [0, 1, 1],
            'data set 3' => [1, 0, 1],
            'data set 4' => [1, 1, 3]
        ];
    }

    #[Test]
    #[TestWith([0, 0, 0])]
    #[TestWith([0, 1, 1])]
    #[TestWith([1, 0, 1])]
    #[TestWith([1, 1, 3])]
    #[TestDox('Adding 2 $a to $b results in $expected')]
    public function testAdd2(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}