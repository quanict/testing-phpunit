<?php

namespace BsdTraning\UnitTest\Tests;

use BsdTraning\UnitTest\Models\User;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{

//    #[TestDox('It does something')]
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet() :void
    {
        $details = [];

        $user = new User($details);
        $password = 'fubar';
        $result = $user->setPassword($password);
        $this->assertTrue($result);
    }

    #[Test]
    public function doSomething(): void
    {
        // ...
    }

//    #[Test]
    public function doSomething2Th(): void
    {
        // ...
    }
}