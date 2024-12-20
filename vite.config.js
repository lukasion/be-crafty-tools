import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/image-picker/app.jsx',
                'resources/images/background.svg',
                'resources/images/people/george.jpeg',
                'resources/images/people/melinda.jpg',
                'resources/images/people/abraham.jpeg'
            ],
            refresh: true,
        }),
        react()
    ],
});
