import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    yellow: '#FFD700', // Gold/Yellow
                    dark: '#1a1a1a',   // Very dark gray
                    darker: '#111111', // Almost black
                    light: '#f3f4f6',  // Light gray for text
                    gray: '#2d2d2d',   // Card background
                }
            }
        },
    },

    plugins: [forms],
};
