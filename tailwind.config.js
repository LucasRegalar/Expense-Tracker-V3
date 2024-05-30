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
        'main-green': '#28BE8C',
      },
      fontFamily: {
        "body": ['AgenorNeue', 'sans-serif']
      },
    },
  },
  plugins: [],
}

