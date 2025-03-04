<?php

new class extends \Livewire\Volt\Component
{
    /**
     * TODO: Create DateRange wireable/synth object to translate date range string to array and vice versa
     * TODO: DateRange extends CarbonPeriod
     */
    public $date;

    public function updatedDate(): void
    {
        //
    }
}
?>

<div>
    <x-date-picker
        wire:model.live="date"
        placeholder="Select a date"
        direction="left"
        show-selections
        multiple
        clearable
        autocomplete="off"
    />
</div>
