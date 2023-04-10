<?php

namespace BsdTraning\UnitTest\Models;

class User
{
    const MIN_PASS_LENGTH = 4;

    private array $user = [];

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function getUser(): array
    {
        return $this->user;
    }

    public function setPassword($password): bool
    {
        if (strlen($password) < self::MIN_PASS_LENGTH) {
            return false;
        }

        $this->user['password'] = $this->cryptPassword($password);

        return true;
    }

    private function cryptPassword($password): string
    {
        return md5($password);
    }
}