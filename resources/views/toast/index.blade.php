@use(App\Enums\ToastVariant)

<div
    wire:key="{{ "{$this->getId()}.notifications.{$toast->getId()}" }}"
    x-data="toastComponent({
        toast: @js($toast)
    })"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:leave-end="opacity-0 scale-95"

    @class(Arr::toCssClasses([
        'space-y-1',
        'transition ease-in-out duration-300',
        'text-sm p-4 w-full border rounded-xl',
        'text-zinc-700 dark:text-zinc-300 border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900',
        'shadow dark:shadow-none',
        'flex flex-col items-center' => ! $message,
    ]))
>
    <div class="w-full flex flex-row items-center gap-x-1 whitespace-nowrap">
        @if($icon || $variant)
            <flux:icon
                variant="micro"
                :icon="$icon ?? match($variant) {
                    ToastVariant::Danger => 'x-circle',
                    ToastVariant::Info => 'information-circle',
                    ToastVariant::Success => 'check-circle',
                    ToastVariant::Warning => 'exclamation-circle',
                }"
                :class="match($variant) {
                    ToastVariant::Danger => 'text-danger-500',
                    ToastVariant::Info => 'text-info-500',
                    ToastVariant::Success => 'text-success-500',
                    ToastVariant::Warning => 'text-warning-500',
                    null => '',
                }"
            />
        @endif

        @if ($title)
            <h3 class="font-semibold">{{ $title }}</h3>
        @elseif ($message)
            <p>{{ Str::words($message, 30) }}</p>
        @endif

        <flux:spacer />
        <flux:button x-on:click="close" icon="x-mark" variant="subtle" size="xs" />
    </div>

    @if ($title && $message)
        <p>{{ Str::words($message, 30) }}</p>
    @endif
</div>
