import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "192.168.1.8",
        port: "8000",
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            "@": "/resources",
            alpinejs: "alpinejs/dist/alpine.js",
        },
    },
});
