<?php

use Modules\Toast\Toast;

$toast = fn () => Toast::make()
    ->icon('check')
    ->variant(\Modules\Toast\Enums\ToastVariant::Success)
    ->title('Operation successful')
    ->send();
?>

<div>
    <flux:button wire:click="toast">
        Trigger toast from a livewire component
    </flux:button>
</div>
