<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

readonly class OtherDeviceLogoutListener implements ShouldQueue
{
    public function __construct(protected Request $request) {}

    public function handle(OtherDeviceLogout $event): void
    {
        if (! $event->user instanceof User) {
            return;
        }

        $authLogs = $event->user->authLogs()
            ->whereIpAddress($this->request->ip())
            ->whereUserAgent($this->request->userAgent())
            ->whereLoginSuccessful(true)
            ->first();

        if (! $authLogs) {
            $authLogs = $event->user->authLogs()->make([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
            ])->touch('created_at');
        }

        $event->user->authLogs()
            ->whereKeyNot($authLogs->getKey())
            ->whereNull('logout_at')
            ->update(['logout_at' => now()]);
    }
}
