/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      backgroundColor: {
        'red-primary': '#DB1919',
        'gray-secondary': '#E0E6ED',
      },
      fontFamily: {
        'quicksand': 'Quicksand, sans-serif',
        'ibm-plex-mono': 'IBM Plex Mono, monospace'
      },
      colors: {
        'red-primary': '#DB1919'
      }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}