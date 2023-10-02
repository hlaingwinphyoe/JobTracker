/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/components/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    colors: {
      "primary-100": "#D4FADB",
      "primary-200": "#ABF5C0",
      "primary-300": "#7BE3A3",
      "primary-400": "#55C78C",
      "primary-500": "#27A26F",
      "primary-600": "#1C8B68",
      "primary-700": "#13745F",
      "primary-800": "#0C5D54",
      "primary-900": "#074D4C",

      "secondary-100": "#F2EFF3",
      "secondary-200": "#E5E0E8",
      "secondary-300": "#B6B1BA",
      "secondary-400": "#726E75",
      "secondary-500": "#19181a",
      "secondary-600": "#131116",
      "secondary-700": "#0E0C12",
      "secondary-800": "#0A070F",
      "secondary-900": "#06040C",

      "tertiary-100": "#eff6ff",
      "tertiary-200": "#dbeafe",
      "tertiary-300": "#bfdbfe",
      "tertiary-400": "#60a5fa",
      "tertiary-500": "#3b82f6",
      "tertiary-600": "#2563eb",
      "tertiary-700": "#1d4ed8",
      "tertiary-800": "#3730a3",
      "tertiary-900": "#312e81",

      "toast-success": "#00cccc",
    },
    screens: {
      sm: "640px",
      // => @media (min-width: 640px) { ... }

      md: "768px",
      // => @media (min-width: 768px) { ... }

      lg: "1024px",
      // => @media (min-width: 1024px) { ... }

      xl: "1280px",
      // => @media (min-width: 1280px) { ... }

      "2xl": "1536px",
      // => @media (min-width: 1536px) { ... }

      minsm: { min: "641px" },
      minmd: { min: "769px" },
      minlg: { min: "1025px" },
      minxl: { min: "1281px" },
      min2xl: { min: "1537px" },
    },
    container: {
      padding: "1rem",
    },
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
