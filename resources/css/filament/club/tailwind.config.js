import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Club/**/*.php',
        './resources/views/filament/club/**/*.blade.php',
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
