<?php

namespace Modules\Users\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Users';

    public function map(): void
    {
        Route::middleware('web')->group(module_path($this->name, '/routes/web.php'));
    }
}
