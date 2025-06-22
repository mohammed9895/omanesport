import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'brand-sky': '#58c3e3',
                'brand-pink': '#e9446e',
                'brand-dark': '#2c2051',
            },
        },
    },
}
