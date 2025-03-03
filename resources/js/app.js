import $ from 'jquery';

window.jQuery = window.$ = $;

import AlpineDatatables from './datatables/index.js';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
    ]);
});
