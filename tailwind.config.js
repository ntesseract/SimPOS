import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import tailwindConfig from './tailwind.config.js';

// export default {
//   plugins: [
//     tailwindcss(tailwindConfig),
//     autoprefixer,
//   ],
// };
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        bluesky: {
          light: '#E6F0FA',
          DEFAULT: '#7AB8F0',
          dark: '#1E88E5',
        },
      },
    },
  },
  plugins: [],
}