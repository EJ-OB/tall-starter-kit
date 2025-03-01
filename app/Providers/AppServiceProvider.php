<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Livewire\Livewire;
use function Livewire\on;
use function Livewire\store;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        on('dehydrate', function (Component $component) {
            if (! Livewire::isLivewireRequest()) {
                return;
            }

            if (store($component)->has('redirect')) {
                return;
            }

            if (count(session()->get('laravel.toasts') ?? []) <= 0) {
                return;
            }

            $component->dispatch('toast:sent');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
