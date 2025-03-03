<?php

use App\Toast\Toast;

$toast = function () {
    Toast::make()
        ->icon('check')
        ->variant(\App\Enums\ToastVariant::Success)
        ->title('Operation successful')
        ->send();
}
?>

<div>
    <flux:button wire:click="toast">
        Trigger toast from a livewire component
    </flux:button>
</div>
