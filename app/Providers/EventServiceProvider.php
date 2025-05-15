<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Revolution\Ordering\Events\OrderEntry;
use App\Listeners\SendOrderNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * イベントとそのリスナーのマッピング
     *
     * @var array
     */
    protected $listen = [
        OrderEntry::class => [
            SendOrderNotification::class,
        ],
    ];

    public function boot(): void
    {
        //
    }
}
