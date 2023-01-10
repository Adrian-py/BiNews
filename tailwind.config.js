/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            phone: "414px",
            "desktop-s": "1280px",
            "desktop-m": "1536",
        },
        extend: {
            padding: {
                "hor-mob": "1rem",
                hor: "5.55rem",
            },
            fontFamily: {
                spectral: ["Spectral", "serif"],
            },
            fontSize: {
                "headline-xl": "5.5rem",
                "headline-l": "4rem",
                "headline-m": "2.5rem",
                "headline-s": "1.75rem",
                "headline-xs": "1.25rem",
                "label-s": "0.875rem",
                "label-m": "1rem",
                "body-l": "1.125rem",
                "body-m": "1rem",
                "support-overline": "0.75rem",
                "support-links": "1rem",
            },
            colors: {
                "primary-900": "#1FBCFF",
                "primary-600": "#0097DA",
                "primary-300": "#1FBCFF",
                "primary-50": "#70D4FF",
                "secondary-900": "#B85F00",
                "secondary-600": "#F77F00",
                "secondary-300": "#FF9C33",
                "secondary-50": "#FFBA70",
                "neutrals-400": "#001D29",
                "neutrals-200": "#003952",
                "neutrals-25": "rgba(0,57,82,0.25)",
                "white-100": "#FFFFFF",
                "white-80": "rgba(255,255,255,0.8)",
                "warning-100": "#FE3D3D",
            },
        },
    },
    plugins: [],
};
