<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Testing\TestableLivewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro(
            'notify',
            fn ($message, $type = 'success', $title = 'Notification', $duration = 5000) => $this->dispatchBrowserEvent('notify', [
                'message' => $message,
                'type' => $type,
                'title' => $title,
                'duration' => $duration,
            ])
        );

        TestableLivewire::macro('assertNotification', function (
            string $message,
            string $type = 'success',
            string $title = 'Notification',
            int $duration = 5000
        ) {
            return $this->assertDispatchedBrowserEvent('notify', [
                'message' => $message,
                'type' => $type,
                'title' => $title,
                'duration' => $duration,
            ]);
        });
    }
}
