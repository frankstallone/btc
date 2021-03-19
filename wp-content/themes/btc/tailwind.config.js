module.exports = {
  important: true,
  purge: {
    content: [
      './app/**/*.php',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      // backgroundImage: (theme) => ({
      //   'mark-repeat':
      //     'url(/wp-content/themes/btc/public/svg/btc-pattern-fun.svg)',
      // }),
      // boxShadow: {
      //   lgYellow:
      //     '0 10px 15px -3px rgba(78, 26, 5, 0.1), 0 4px 6px -2px rgba(78, 26, 5, 0.05)',
      // },
      minHeight: {
        80: '80vh',
      },
      fontFamily: {
        display: ['Guerrer', 'sans-serif'],
        sans: ['BRHendrix', 'sans-serif'],
      },
      fontSize: {
        '8xl': '6rem',
        '9xl': '8rem',
      },
      colors: {
        // Converted to HSL variables: https://github.com/adamwathan/tailwind-css-variable-text-opacity-demo
        bigWaves: {
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--bigWaves-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--bigWaves-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--bigWaves-hsl-900))`;
          },
        },
        quicksilver: {
          25: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-25), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-25), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-25))`;
          },
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--quicksilver-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--quicksilver-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--quicksilver-hsl-900))`;
          },
        },
        goldRush: {
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--goldRush-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--goldRush-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--goldRush-hsl-900))`;
          },
        },
        emeraldCity: {
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--emeraldCity-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--emeraldCity-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--emeraldCity-hsl-900))`;
          },
        },
        rubySlippers: {
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--rubySlippers-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--rubySlippers-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--rubySlippers-hsl-900))`;
          },
        },
        alpenglow: {
          50: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-50), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-50), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-50))`;
          },
          100: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-100), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-100), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-100))`;
          },
          200: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-200), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-200), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-200))`;
          },
          300: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-300), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-300), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-300))`;
          },
          400: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-400), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-400), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-400))`;
          },
          500: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-500), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-500), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-500))`;
          },
          600: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-600), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-600), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-600))`;
          },
          700: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-700), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-700), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-700))`;
          },
          800: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-800), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-800), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-800))`;
          },
          900: ({ opacityVariable, opacityValue }) => {
            if (opacityValue !== undefined) {
              return `hsla(var(--alpenglow-hsl-900), ${opacityValue})`;
            }
            if (opacityVariable !== undefined) {
              return `hsla(var(--alpenglow-hsl-900), var(${opacityVariable}, 1))`;
            }
            return `hsl(var(--alpenglow-hsl-900))`;
          },
        },
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            h1: {
              color: theme('colors.quicksilver.800'),
              fontWeight: '600',
            },
            h2: {
              color: theme('colors.quicksilver.700'),
              fontWeight: '600',
            },
            h3: {
              color: theme('colors.quicksilver.600'),
              fontWeight: '600',
            },
            h4: {
              color: theme('colors.quicksilver.600'),
              fontWeight: '600',
            },
            h5: {
              color: theme('colors.quicksilver.600'),
              fontWeight: '600',
            },
            h6: {
              color: theme('colors.quicksilver.600'),
              fontWeight: '600',
            },
          },
        },
      }),
    },
  },
  variants: {
    extend: {
      backgroundColor: ['active'],
      gridColumn: ['last'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    // ...
  ],
};
