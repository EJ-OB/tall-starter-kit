<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid grid-cols-1 gap-1 max-w-72">
            <x-date-picker placeholder="Select a date" direction="left" show-selections multiple clearable />

            <livewire:LivewireDatePicker />

            <flux:button x-data="{}" x-on:click="new Toast().info().title('Toast').message('Info toast').send()">
                Info
            </flux:button>

            <flux:button x-data="{}" x-on:click="new Toast().success().title('Toast').message('Success toast').send()">
                Success
            </flux:button>

            <flux:button x-data="{}" x-on:click="new Toast().warning().title('Toast').message('Warning toast').send()">
                Warning
            </flux:button>

            <flux:button x-data="{}" x-on:click="new Toast().danger().title('Toast').message('Danger toast').send()">
                Danger
            </flux:button>

            <flux:button x-data="{}" x-on:click="$toast('Your changes have been saved.')">
                Using $toast() alpine magic
            </flux:button>

            <livewire:ToastTrigger />
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
