import ToastComponent from "./toast-component.js";
import ToastMagic from "./toast-magic.js";

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        ToastComponent,
        ToastMagic,
    ]);
});
