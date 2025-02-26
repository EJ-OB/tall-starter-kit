@props([
    'options' => [],
    'columns' => [],
    'errorMode' => 'throw',
])

<div
    x-data="datatables({
        options: @js($options),
        errMode: @js($errorMode)
    })"
    class="rounded-xl border border-zinc-200 dark:border-zinc-700 p-4"
>
    <table x-ref="table"></table>
</div>
