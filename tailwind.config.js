import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import "flowbite";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/dist/flowbite.min.js",
        "./node_modules/flowbite/dist/flowbite.min.css",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
