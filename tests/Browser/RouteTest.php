<?php

namespace Orchestra\Testbench\Tests\Browser;

use Laravel\Dusk\Browser;
use Orchestra\Testbench\Dusk\TestCase;

class RouteTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  Illuminate\Foundation\Application    $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.url', 'http://127.0.0.1:8000');

        $app['router']->get('hello', ['as' => 'hi', 'uses' => function () {
            return 'hello world';
        }]);

        $app['router']->get('config', ['as' => 'hi', 'uses' => function () {
            return config('new_config_item');
        }]);
    }

    public static function setUpBeforeClass()
    {
        static::serve();
    }

    public static function tearDownAfterClass()
    {
        static::stopServing();
    }

    /** @test */
    public function can_use_dusk()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('hello')
                ->assertSee('hello world');
        });
    }

    /** @test */
    public function can_use_multiple_browsers()
    {
        $this->browse(function (Browser $browser, Browser $browserTwo) {
            $browser->visit('hello')
                ->assertSee('hello world');

            $browserTwo->visit('hello')
                ->assertSee('hello world');
        });
    }

    /** @test */
    public function can_tweak_the_application_within_a_test()
    {
        $this->tweakApplication(function ($app) {
            $app['config']->set('new_config_item', 'Fantastic!');
        });

        $this->assertEquals('Fantastic!', config('new_config_item'));

        $this->browse(function (Browser $browser, Browser $browserTwo) {
            $browser->visit('config')
                ->assertSee('Fantastic!');
        });

        $this->removeApplicationTweaks();
    }
}
