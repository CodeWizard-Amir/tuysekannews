/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      screens :{
        '3xl' : '1650px',
      }
    },
  },
  plugins: [],
}

