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
      boxShadow: {
        lgYellow:
          '0 10px 15px -3px rgba(78, 26, 5, 0.1), 0 4px 6px -2px rgba(78, 26, 5, 0.05)',
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
        bigWaves: {
          50: 'var(--bigWaves-50)',
          100: 'var(--bigWaves-100)',
          200: 'var(--bigWaves-200)',
          300: 'var(--bigWaves-300)',
          400: 'var(--bigWaves-400)',
          500: 'var(--bigWaves-500)',
          600: 'var(--bigWaves-600)',
          700: 'var(--bigWaves-700)',
          800: 'var(--bigWaves-800)',
          900: 'var(--bigWaves-900)',
        },
        quicksilver: {
          25: 'var(--quicksilver-25)',
          50: 'var(--quicksilver-50)',
          100: 'var(--quicksilver-100)',
          200: 'var(--quicksilver-200)',
          300: 'var(--quicksilver-300)',
          400: 'var(--quicksilver-400)',
          500: 'var(--quicksilver-500)',
          600: 'var(--quicksilver-600)',
          700: 'var(--quicksilver-700)',
          800: 'var(--quicksilver-800)',
          900: 'var(--quicksilver-900)',
        },
        goldRush: {
          50: 'var(--goldRush-50)',
          100: 'var(--goldRush-100)',
          200: 'var(--goldRush-200)',
          300: 'var(--goldRush-300)',
          400: 'var(--goldRush-400)',
          500: 'var(--goldRush-500)',
          600: 'var(--goldRush-600)',
          700: 'var(--goldRush-700)',
          800: 'var(--goldRush-800)',
          900: 'var(--goldRush-900)',
        },
        emeraldCity: {
          50: 'var(--emeraldCity-50)',
          100: 'var(--emeraldCity-100)',
          200: 'var(--emeraldCity-200)',
          300: 'var(--emeraldCity-300)',
          400: 'var(--emeraldCity-400)',
          500: 'var(--emeraldCity-500)',
          600: 'var(--emeraldCity-600)',
          700: 'var(--emeraldCity-700)',
          800: 'var(--emeraldCity-800)',
          900: 'var(--emeraldCity-900)',
        },
        rubySlippers: {
          50: 'var(--rubySlippers-50)',
          100: 'var(--rubySlippers-100)',
          200: 'var(--rubySlippers-200)',
          300: 'var(--rubySlippers-300)',
          400: 'var(--rubySlippers-400)',
          500: 'var(--rubySlippers-500)',
          600: 'var(--rubySlippers-600)',
          700: 'var(--rubySlippers-700)',
          800: 'var(--rubySlippers-800)',
          900: 'var(--rubySlippers-900)',
        },
        alpenglow: {
          50: 'var(--alpenglow-50)',
          100: 'var(--alpenglow-100)',
          200: 'var(--alpenglow-200)',
          300: 'var(--alpenglow-300)',
          400: 'var(--alpenglow-400)',
          500: 'var(--alpenglow-500)',
          600: 'var(--alpenglow-600)',
          700: 'var(--alpenglow-700)',
          800: 'var(--alpenglow-800)',
          900: 'var(--alpenglow-900)',
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
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    // ...
  ],
};
