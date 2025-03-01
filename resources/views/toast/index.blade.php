@use(App\Enums\ToastVariant)

<div
    x-data="{ toast: @js($toast) }"
    x-init="
        setTimeout(
            () =>
                window.dispatchEvent(
                    new CustomEvent('toast:closed', {
                        detail: {
                            id: toast.id
                        }
                    }),
                ),
            1000,
        )
    "
    @class(Arr::toCssClasses([
        'text-sm p-3 w-full border rounded-lg',
        'text-zinc-700 dark:text-zinc-300 border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900',
        'shadow dark:shadow-none',
        'flex items-center' => ! $message,
    ]))
>
    <div class="inline-flex items-center gap-x-1 whitespace-nowrap">
        <flux:icon
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
            }"
        />
        <h3 class="font-semibold">{{ $title }}</h3>
    </div>

    @if($message)
        <p>{{ $message }}</p>
    @endif
</div>
