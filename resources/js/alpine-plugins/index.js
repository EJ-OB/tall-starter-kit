import AlpineDataTables from './datatables.js';

document.addEventListener('alpine:init', () => {
    Alpine.plugin([
        AlpineDataTables,
    ]);
});
