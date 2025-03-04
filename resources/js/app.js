import $ from 'jquery';

window.jQuery = window.$ = $;

import moment from "moment";

window.moment = moment;

import AlpineDatatables from './datatables/index.js';
import DataPicker from "./data-picker/index.js";

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin([
        AlpineDatatables,
        DataPicker,
    ]);
});
