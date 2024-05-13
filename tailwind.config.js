import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                accent: {"50":"#fff5f0","100":"#ffd6c2","200":"#feb795","300":"#fe9868","400":"#fd783c","500":"#fb580f","600":"#db4603","700":"#b03802","800":"#862b01","900":"#5a1d00","950":"#2f0f00"}
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                '10xl': '8rem',
            },
            fontFamily: {
                'montserrat': ['Montserrat'],
                'abhaya-libre': ['Abhaya Libre'],
                'alegraya-sans': ['Alegreya Sans'],
            },
            letterSpacing: {
                widest: '.25em',
            }
        },
    },

    plugins: [forms, typography],
};
