const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
  purge: [
      './resources/**/*.blade.php',

      './resources/**/*.js',

      './resources/**/*.vue',
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {

    colors:{
        transpanent:'transpanent',
        current:'currentColor',
        gray:colors.coolGray,
        white: colors.white,
        teal: colors.teal,
        red:colors.red,
    },
    extend: {
        backgroundImage: theme => ({
            'logo-background':"url('img/abstract.png')",}),
       },
  },
  variants: {
    extend: {},
  },
  plugins: [  ],
}
