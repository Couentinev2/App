/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: false,
  
    content: [
      "./**/*.{php,html,js}", // Include all relevant files
      "!./node_modules/**/*", // Exclude everything inside node_modules
    ],

    theme: {
      screens: {
        'sm': '640px',
        // => @media (min-width: 640px) { ... }

        'md': '834px',
        // => @media (min-width: 640px) { ... }
  
        'lg': '1024px',
        // => @media (min-width: 1024px) { ... }
  
        'xl': '1280px',
        // => @media (min-width: 1280px) { ... }

        '2xl': '1536px',
        // => @media (min-width: 1536px) { ... }
      },
      extend: {
        backgroundImage: {
          'blue-purple-gradient': 'linear-gradient(to right, #105FFB 14%, #A15AF0 100%)',
        },
        colors: {
          'purple': 'rgba(100, 65, 226, 0.10)',
        },
      },
    },
    plugins: [
      function({ addUtilities }) {
        const newUtilities = {
          '.g-border-t-2': {
            borderTopWidth: '2px',
            borderStyle: 'solid',
            borderImage: 'linear-gradient(90deg, #105FFB 0%, #A15AF0 100.1%)',
            borderImageSlice: '1',
          },
        }
  
        addUtilities(newUtilities, ['responsive', 'hover'])
      },
    ],
  }
  