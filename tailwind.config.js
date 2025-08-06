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
                "font-jakarta": ["Plus Jakarta Sans", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                "text-primary": "#111c2d",
                "color-black": "#080C2E",
            },
        },
        container: {
            padding: {
                DEFAULT: "20px",
                // lg: "50px",
                // sm: '20px',
                // md: '20px',
                // lg: '20px',
                xl: "50px",
                "2xl": "6rem",
            },
            screens: {
                sm: "600px",
                md: "728px",
                lg: "984px",
                xl: "1240px",
                "2xl": "1496px",
            },
            center: true,
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
