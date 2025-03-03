<?php

namespace Modules\Toast\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Livewire\Livewire;
use Modules\Toast\Livewire\Toasts;
use Nwidart\Modules\Traits\PathNamespace;

use function Livewire\on;
use function Livewire\store;

class ToastServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Toast';

    protected string $nameLower = 'toast';

    public function register(): void
    {
        Livewire::component('toasts', Toasts::class);

        on('dehydrate', function (Component $component): void {
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

    public function boot(): void
    {
        $this->registerViews();
    }

    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        $componentNamespace = $this->module_namespace($this->name, $this->app_path(config('modules.paths.generator.component-class.path')));
        Blade::componentNamespace($componentNamespace, $this->nameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
