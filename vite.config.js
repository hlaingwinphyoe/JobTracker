import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
  plugins: [
    vue({
      // For npm run build <img src="/images/logo.png"> will not work without the code below
      template: {
        transformAssetUrls: {
          includeAbsolute: false,
        },
      },
    }),
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: [...refreshPaths, "app/Livewire/**"],
    }),
  ],
  resolve: {
    vue: "vue/dist/vue.esm-bundler.js",
    alias: {
      "@": path.resolve(__dirname, "./resources"),
    },
  },
});
