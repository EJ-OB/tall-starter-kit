import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";
import collectModuleAssetsPaths from './vite-module-loader.js';

export default defineConfig({
    plugins: [
        laravel({
            input: await collectModuleAssetsPaths([
                'resources/css/app.css',
                'resources/js/app.js',
            ], 'modules'),
            refresh: [`resources/views/**/*`],
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
    },
});
