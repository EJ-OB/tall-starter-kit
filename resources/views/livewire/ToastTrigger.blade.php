<?php

use Modules\Toast\Toast;

$toast = function () {
    Toast::make()
        ->icon('check')
        ->variant(\Modules\Toast\Enums\ToastVariant::Success)
        ->title('Operation successful')
        ->send();

    $this->redirectRoute('users.index');
};
?>

<div>
    <flux:button wire:click="toast">
        Trigger toast from a livewire component and redirect
    </flux:button>
</div>
