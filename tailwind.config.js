const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  
  theme: {
    extend: {
      colors: {
        'fixhome-primary': '#4f46e5', // Custom primary color
      },
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans], // Use Inter as primary sans font
      },
      animation: {
        'float-slow': 'float 8s ease-in-out infinite', 
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-20px)' },
        },
      },
    },
  },

  plugins: [],
};
