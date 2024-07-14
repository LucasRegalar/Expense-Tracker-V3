/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    './resources/**/*.php',
    './resources/**/*.html',
  ],
  theme: {
    extend: {
      colors: {
        'primary-text': '#e4e6eb',
        'secondary-text': '#b0b3b8',
        'primary-card': '#18191a',
        'secondary-card': '#242526',
        'border-card': '#3a3b3c',
        'main-red': '#d93879',
        'hover-red': '#ab2158',
        'main-green': '#24a87c',
        'hover-green': '#1b7e5d',
      },
      fontFamily: {
        "body": ['AgenorNeue', 'sans-serif']
      },
      fontSize: {
        "2xs": '0.625rem',
      }
    },
  },
  plugins: [],
}

