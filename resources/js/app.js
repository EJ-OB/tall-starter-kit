import AlpineDatatables from './datatables/index.js';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
    ]);
});
