<x-layouts.app.sidebar>
    <flux:header class="hidden lg:flex">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item icon="home" href="{{ route('dashboard') }}" />

            @isset($breadcrumbs)
                {{ $breadcrumbs }}
            @endisset
        </flux:breadcrumbs>
    </flux:header>

    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
