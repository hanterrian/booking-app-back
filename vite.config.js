import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    server: {
        https: false,
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel([
            'resources/js/app.js',
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
