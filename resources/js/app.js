import AlpineDatatables from './datatables/index.js';
import ToastComponent from './toast/component/toast.js';
import ToastMagic from "./toast/component/toast-magic.js";

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
        ToastComponent,
        ToastMagic,
    ]);
});
