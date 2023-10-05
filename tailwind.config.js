/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
      ],
      theme: {
        extend: {
            colors: {
                'bd_primary-color': '#00c3a5',
                'bd_secondary-color': '#ccf3ed',
                'bd_sponsorships-color': '#a809a8e6',
            }
        },
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }
            'md': '768px',
            // => @media (min-width: 768px) { ... }
            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }
            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }
            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
            '2k': '1800px'
            // => @media (min-width: 1800px) { ... }
        }
      },
      plugins: [
          require('flowbite/plugin')
      ],
}

