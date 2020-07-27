<?php

namespace App\Providers;


use Illuminate\Support\Facades\Event;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        'App\Events\MessagePublished' => [
            'App\Listeners\EventListener',
        ],

        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\YouTube\YouTubeExtendSocialite@handle',
            'SocialiteProviders\Twitch\TwitchExtendSocialite@handle',
            'SocialiteProviders\Instagram\InstagramExtendSocialite@handle',
            'SocialiteProviders\ThirtySevenSignals\ThirtySevenSignalsExtendSocialite@handle',
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

//        parent::boot();

        //
    }
}
