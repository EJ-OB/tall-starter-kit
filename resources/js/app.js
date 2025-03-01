import { Toast } from "./toast/Toast.js";
import AlpineDatatables from './datatables/index.js';

window.Toast = Toast;

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
    ]);
});
