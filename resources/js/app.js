import AlpineDatatables from './datatables/index.js';
import ToastComponent from './toast/component/toast.js';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
        ToastComponent,
    ]);
});
