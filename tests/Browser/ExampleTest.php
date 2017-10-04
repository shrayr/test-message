<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL') .'/register')
                ->type('Taylor', 'name')
                ->type('vsxo@mail.ru', 'email')
                ->type('qwerty', 'password')
                ->type('qwerty', 'password_confirmation')
                ->press('Register')
                ->seePageIs(env('APP_URL') . '/home');
        });
        $this->assertTrue(true);

    }

}
