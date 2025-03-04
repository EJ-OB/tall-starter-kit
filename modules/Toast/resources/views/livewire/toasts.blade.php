@use(Modules\Toast\Enums\ToastVariant)

<div>
    @if($toasts->isNotEmpty())
        <div x-cloak class="flex flex-col-reverse z-50 fixed top-0 right-0 min-w-72 max-w-72 mt-8 me-8 gap-y-2" role="status">
            @foreach ($toasts as $toast)
                {{ $toast }}
            @endforeach
        </div>
    @endif
</div>
