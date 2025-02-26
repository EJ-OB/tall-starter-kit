<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

readonly class LogoutListener implements ShouldQueue
{
    public function __construct(protected Request $request) {}

    public function handle(Logout $event): void
    {
        if (! $event->user instanceof User) {
            return;
        }

        $authLogs = $event->user->authLogs()
            ->whereIpAddress($this->request->ip())
            ->whereUserAgent($this->request->userAgent())
            ->whereLoginSuccessful(true)
            ->orderByDesc('login_at')
            ->first();

        if (! $authLogs) {
            $authLogs = $event->user->authLogs()->make([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'created_at' => now(),
            ]);
        }

        $authLogs->fill(['logout_at' => now()])->save();
    }
}
