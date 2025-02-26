<?php

namespace App\Models\Concerns;

use App\Models\AuthLog;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAuthLogs
{
    public function authLogs(): MorphMany
    {
        return $this->morphMany(AuthLog::class, 'auth_loggable')->latest('login_at');
    }
}
