<x-layouts.app>
    <x-slot:breadcrumbs>
        <flux:breadcrumbs.item>User Management</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Users</flux:breadcrumbs.item>
    </x-slot:breadcrumbs>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <x-datatable :options="compact('data', 'columns', 'select')" />
    </div>
</x-layouts.app>
