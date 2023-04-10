<?php


namespace BsdTraning\UnitTest\Tests;

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Artisan;
//use Orchestra\Testbench\TestCase;
use BsdTraning\UnitTest\Console\TestCommand;

class CommandTest extends TestCase
{
    /** @test **/
    public function it_does_a_certain_thing()
    {
        Application::starting(function ($artisan) {
            $artisan->add(app(TestCommand::class));
        });

        // Running the command
        Artisan::call('test-command:run');

        // Assertions...
    }
}