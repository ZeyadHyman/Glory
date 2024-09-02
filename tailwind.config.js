import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                pulse: {
                    "0%": { transform: "scale(1)" },
                    "50%": { transform: "scale(1.1)" },
                    "100%": { transform: "scale(1)" },
                },
            },
            animation: {
                fadeIn: "fadeIn 1s ease-in-out",
                pulse: "pulse 1s ease-in-out infinite",
            },
        },
    },
    safelist: [
        {
            pattern:
                /bg-(red|green|blue|orange|yellow|purple|pink|indigo|teal|cyan|emerald|fuchsia|gray|slate|zinc|neutral|stone|amber|lime|sky|violet|rose)-(50|100|200|300|400|500|600|700|800|900)/,
        },
        {
            pattern:
                /border-(red|green|blue|orange|yellow|purple|pink|indigo|teal|cyan|emerald|fuchsia|gray|slate|zinc|neutral|stone|amber|lime|sky|violet|rose)-(50|100|200|300|400|500|600|700|800|900)/,
        },
    ],
    plugins: [forms, "prettier-plugin-tailwindcss"],
};
