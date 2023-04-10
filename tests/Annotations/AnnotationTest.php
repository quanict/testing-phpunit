<?php declare(strict_types=1);

use BsdTraning\UnitTest\Services\Invoice;
use BsdTraning\UnitTest\Services\Money;
use BsdTraning\UnitTest\Services\BankAccount;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\CodeCoverageIgnore;

#[CoversClass(Invoice::class)]
#[UsesClass(Money::class)]
#[CoversNothing]
#[CodeCoverageIgnore]
class AnnotationTest extends TestCase
{
    /**
     * @covers BankAccount
     * @uses   Money
     */
    public function testMoneyCanBeDepositedInAccount(): void
    {
        // ...
    }
}