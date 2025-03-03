<?php

use Modules\Toast\Providers\ToastServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\HorizonServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    ToastServiceProvider::class,
];
