import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/statikbe/laravel-filament-flexible-content-blocks/resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './config/filament-flexible-content-blocks.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.violet,
                secondary: colors.orange,
                gray: colors.slate,
            }
        },
    },

    plugins: [forms, typography],
};
