import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    server: {
        https: false,
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
    // build: {
    //     watch: {
    //         // https://rollupjs.org/guide/en/#watch-options
    //         include: [
    //             'resources/js/**',
    //             'resources/js/Pages/**',
    //             'routes/**',
    //             'resources/views/**'
    //         ]
    //     }
    // },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            // refresh: true,
            refresh: [
                'resources/js/**',
                'resources/js/Pages/**',
                'routes/**',
                'resources/views/**'
            ],
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
});
