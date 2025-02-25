<x-layouts.app.sidebar>
    @isset($breadcrumbs)
        <flux:header>
            <flux:breadcrumbs>
                {{ $breadcrumbs }}
            </flux:breadcrumbs>

            <div class="h-6"></div>
        </flux:header>
    @endisset

    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
