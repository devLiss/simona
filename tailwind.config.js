const { blueGray } = require('tailwindcss/colors')
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [

        './resources/**/*.blade.php',

        './resources/**/*.js',

        './resources/**/*.vue',

      ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors:{
        gray:blueGray,
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
