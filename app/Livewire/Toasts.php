<?php

namespace App\Livewire;

use App\Toast\Toast;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Toasts extends Component
{
    public bool $isToastComponent = true;

    public Collection $toasts;

    public function mount(): void
    {
        $this->toasts = new Collection;
        $this->pullToastsFromSession();
    }

    public function render(): Renderable
    {
        return view('livewire.toasts');
    }

    #[On('toast:sent')]
    public function pullToastsFromSession(): void
    {
        foreach (session()->pull('laravel.toasts') ?? [] as $toast) {
            $toast = Toast::fromArray($toast);

            $this->toasts->put($toast->getId(), $toast);
        }
    }

    #[On('toast:js-sent')]
    public function pushToastFromJs(array $toast): void
    {
        $toast = Toast::fromArray($toast);

        $this->toasts->put($toast->getId(), $toast);
    }

    #[On('toast:closed')]
    public function removeToast(string $id): void
    {
        if (! $this->toasts->has($id)) {
            return;
        }

        $this->toasts->forget($id);
    }
}
