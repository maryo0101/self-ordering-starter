import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // ← これを追加！
        './vendor/revolution/self-ordering/resources/views/**/*.blade.php'
    ],


    theme: {
        extend: {
            colors: {
                orange: {
                    500: '#f97316',  // オレンジ色
                    600: '#ea580c',  // ホバー時に使うオレンジ色
                    700: '#c2410c',  // アクティブ時に使うオレンジ色
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'gradient-to-r': 'linear-gradient(to right, var(--tw-gradient-stops))', // 追加したグラデーション
            },
        },
    },

    plugins: [forms],
};

