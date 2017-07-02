<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //Register events and their listeners

        //Actor events
        'App\Events\Actor\IndexEvent' => [
            'App\Listeners\Actor\HandleIndexEvent',
        ],
        'App\Events\Actor\ShowEvent' => [
            'App\Listeners\Actor\HandleShowEvent',
        ],
        'App\Events\Actor\PopularEvent' => [
            'App\Listeners\Actor\HandlePopularEvent',
        ],
        'App\Events\Actor\SearchEvent' => [
            'App\Listeners\Actor\HandleSearchEvent',
        ],

        //Movies events
        'App\Events\Movie\IndexEvent' => [
            'App\Listeners\Movie\HandleIndexEvent',
        ],
        'App\Events\Movie\ShowEvent' => [
            'App\Listeners\Movie\HandleShowEvent',
        ],
        'App\Events\Movie\PopularEvent' => [
            'App\Listeners\Movie\HandlePopularEvent',
        ],
        'App\Events\Movie\SearchEvent' => [
            'App\Listeners\Movie\HandleSearchEvent',
        ],

        //Multi events
        'App\Events\Multi\IndexEvent' => [
            'App\Listeners\Multi\HandleIndexEvent',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
