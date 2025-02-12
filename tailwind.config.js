import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            boxShadow: {
                'header-outset': '0 4px 8px rgba(78, 78, 78, 0.8)',
                'menu-outset': '4px 0 8px rgba(78, 78, 78, 0.8)',
                'form-shadow-inset': 'inset 0 0 10px rgba(0, 0, 0, 0.8)',
                'form-shadow-outset': '0 0 8px rgba(78, 78, 78, 0.8)',
                'form-shadow-outset2': '0 0 8px rgba(21, 36, 120, 0.8)',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
