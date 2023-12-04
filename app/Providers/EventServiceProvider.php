<?php
namespace App\Providers;

use App\Events\LectionCreated;
use App\Listeners\SaveLectionToHistory;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        LectionCreated::class => [
            SaveLectionToHistory::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}