import defaultTheme from 'tailwindcss/defaultTheme';

// tailwind.config.js
export default {
  theme: {
    extend: {
      colors: {
        'fixhome-primary': '#4f46e5', // Indigo like the original
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
    },
  },
  content: ['./resources/**/*.blade.php', './resources/**/*.js'],
  plugins: [],
};
