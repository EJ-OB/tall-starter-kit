<?php

namespace App\Models\Concerns;

use App\Models\AuthLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @template TDeclaringModel of Model
 */
trait HasAuthLogs
{
    /**
     * @return MorphMany<AuthLog, TDeclaringModel>
     */
    public function authLogs(): MorphMany
    {
        return $this->morphMany(AuthLog::class, 'auth_loggable')->latest('login_at');
    }
}
