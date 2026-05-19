import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { bunny } from 'laravel-vite-plugin/fonts'
import tailwindcss from '@tailwindcss/vite'
import inertia from '@inertiajs/vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/ts/app.ts'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        inertia(),
        tailwindcss(),
    ],
    server: {
        allowedHosts: ['.laravel.test'],
        cors: true,
        host: process.env.HOST,
        port: process.env.PORT ?? 5173,
        hmr: {
            host: process.env.HOST,
            protocol: 'ws',
            clientPort: 80,
            overlay: false,
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
