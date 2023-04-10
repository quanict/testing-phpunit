<?php

namespace BsdTraning\UnitTest\Tests;

use BsdTraning\UnitTest\Models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
    {
        $details = [];

        $user = new User($details);
        $password = 'fubar';
        $result = $user->setPassword($password);
        $this->assertTrue($result);
    }
}