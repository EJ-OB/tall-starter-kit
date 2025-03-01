@use(App\Enums\ToastVariant)

<div class="flex flex-col-reverse z-50 fixed top-0 right-0 min-w-72 max-w-72 mt-8 me-8 gap-y-2 overflow-hidden" role="status">
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Danger', 'variant' => ToastVariant::Danger]) }}
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Custom Icon', 'variant' => ToastVariant::Success, 'icon' => 'bars-3']) }}
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Danger', 'message' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'variant' => ToastVariant::Danger]) }}
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Info', 'message' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'variant' => ToastVariant::Info]) }}
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Success', 'message' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'variant' => ToastVariant::Success]) }}
    {{ \App\Toast\Toast::make(['id' => '123', 'title' => 'Warning', 'message' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'variant' => ToastVariant::Warning]) }}
    @foreach ($toasts as $toast)
        {{ $toast }}
    @endforeach
</div>
