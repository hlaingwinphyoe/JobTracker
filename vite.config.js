import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: [
              ...refreshPaths,
              'app/Livewire/**',
            ],
        }),
    ],
    resolve: {
        vue: "vue/dist/vue.esm-bundler.js",
        alias: {
          "@": path.resolve(__dirname, "./resources"),
        },
      },
});
