export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],

    darkMode: "class",

    theme: {
        extend: {
            colors: {
                "primary": "#012d1d",
                "primary-container": "#1b4332",
                "secondary": "#2c694e",
                "secondary-container": "#aeeecb",
                "background": "#f9f9f8",
                "surface": "#f9f9f8",
                "surface-container": "#edeeed",
                "surface-container-low": "#f3f4f3",
                "surface-container-high": "#e7e8e7",
                "surface-container-highest": "#e1e3e2",
                "surface-container-lowest": "#ffffff",
                "surface-tint": "#3f6653",
                "surface-variant": "#e1e3e2",
                "surface-dim": "#d9dad9",
                "surface-bright": "#f9f9f8",

                "on-surface": "#191c1c",
                "on-surface-variant": "#414844",
                "on-background": "#191c1c",
                "on-primary": "#ffffff",
                "on-primary-container": "#86af99",
                "on-secondary": "#ffffff",
                "on-secondary-container": "#316e52",

                "outline": "#717973",
                "outline-variant": "#c1c8c2",

                "secondary-fixed": "#b1f0ce",
                "secondary-fixed-dim": "#95d4b3",

                "primary-fixed": "#c1ecd4",
                "primary-fixed-dim": "#a5d0b9",

                "tertiary": "#152b1c",
                "tertiary-container": "#2a4131",

                "error": "#ba1a1a",
                "error-container": "#ffdad6",
            },

            spacing: {
                "xs": "8px",
                "sm": "16px",
                "md": "24px",
                "lg": "32px",
                "xl": "48px",
                "base": "4px",
                "gutter": "20px",
                "container-max": "1280px",
            },

            fontFamily: {
                "body-md": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "body-lg": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "label-md": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "label-lg": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "headline-md": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "headline-lg": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "display-md": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
                "display-lg": ["Noto Sans Arabic", "Plus Jakarta Sans", "sans-serif"],
            },

            fontSize: {
                "body-md": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
                "label-md": ["12px", { lineHeight: "1.4", fontWeight: "500" }],
                "label-lg": ["14px", { lineHeight: "1.4", fontWeight: "600" }],
                "headline-md": ["22px", { lineHeight: "1.3", fontWeight: "600" }],
                "headline-lg": ["28px", { lineHeight: "1.3", fontWeight: "600" }],
                "display-md": ["36px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                "display-lg": ["48px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
            },
        },
    },

    plugins: [],
};