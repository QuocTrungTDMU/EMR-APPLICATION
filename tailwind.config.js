/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/css/**/*.css",
        "./app/View/Components/**/*.php",
        "./resources/views/components/**/*.blade.php"
    ],
    theme: {
        extend: {

            colors: {
                primary: {
                    50: '#eff6ff',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                }
            },

            boxShadow: {
                'custom-blue': '0 22px 29px 0 rgba(7, 108, 236, 0.1)',
                'medik': '0 22px 29px 0 rgba(7, 108, 236, 0.1)',
            },
            colors: {
                'medik-blue': '#076cec',
            },

            animation: {
                'gentle-shake': 'gentleShake 3s ease-in-out infinite',
                'icon-shake': 'iconShake 2s ease-in-out infinite',
                'icon-wiggle': 'iconWiggle 1.5s ease-in-out infinite',
                'icon-vibrate': 'iconVibrate 0.5s ease-in-out infinite',
                'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                'slide-in-up': 'slideInUp 0.8s ease-out',
            },
            keyframes: {
                gentleShake: {
                    '0%, 100%': {
                        transform: 'translateX(0) rotate(0deg)'
                    },
                    '10%': {
                        transform: 'translateX(-2px) rotate(-1deg)'
                    },
                    '20%': {
                        transform: 'translateX(2px) rotate(1deg)'
                    },
                    '30%': {
                        transform: 'translateX(-2px) rotate(-1deg)'
                    },
                    '40%': {
                        transform: 'translateX(2px) rotate(1deg)'
                    },
                    '50%': {
                        transform: 'translateX(-1px) rotate(-0.5deg)'
                    },
                    '60%': {
                        transform: 'translateX(1px) rotate(0.5deg)'
                    },
                    '70%': {
                        transform: 'translateX(-1px) rotate(-0.5deg)'
                    },
                    '80%': {
                        transform: 'translateX(1px) rotate(0.5deg)'
                    },
                    '90%': {
                        transform: 'translateX(-1px) rotate(-0.5deg)'
                    },
                },
                // ✅ ICON SHAKE ANIMATION
                iconShake: {
                    '0%, 100%': {
                        transform: 'rotate(0deg) scale(1)'
                    },
                    '10%': {
                        transform: 'rotate(-3deg) scale(1.05)'
                    },
                    '20%': {
                        transform: 'rotate(3deg) scale(1.05)'
                    },
                    '30%': {
                        transform: 'rotate(-3deg) scale(1.05)'
                    },
                    '40%': {
                        transform: 'rotate(3deg) scale(1.05)'
                    },
                    '50%': {
                        transform: 'rotate(-2deg) scale(1.02)'
                    },
                    '60%': {
                        transform: 'rotate(2deg) scale(1.02)'
                    },
                    '70%': {
                        transform: 'rotate(-2deg) scale(1.02)'
                    },
                    '80%': {
                        transform: 'rotate(2deg) scale(1.02)'
                    },
                    '90%': {
                        transform: 'rotate(-1deg) scale(1.01)'
                    },
                },
                // ✅ ICON WIGGLE ANIMATION
                iconWiggle: {
                    '0%, 100%': {
                        transform: 'rotate(0deg) translateX(0)'
                    },
                    '25%': {
                        transform: 'rotate(-5deg) translateX(-2px)'
                    },
                    '50%': {
                        transform: 'rotate(5deg) translateX(2px)'
                    },
                    '75%': {
                        transform: 'rotate(-3deg) translateX(-1px)'
                    },
                },
                // ✅ ICON VIBRATE ANIMATION
                iconVibrate: {
                    '0%, 100%': {
                        transform: 'translateX(0) translateY(0)'
                    },
                    '10%': {
                        transform: 'translateX(-1px) translateY(-1px)'
                    },
                    '20%': {
                        transform: 'translateX(1px) translateY(1px)'
                    },
                    '30%': {
                        transform: 'translateX(-1px) translateY(1px)'
                    },
                    '40%': {
                        transform: 'translateX(1px) translateY(-1px)'
                    },
                    '50%': {
                        transform: 'translateX(-1px) translateY(-1px)'
                    },
                    '60%': {
                        transform: 'translateX(1px) translateY(1px)'
                    },
                    '70%': {
                        transform: 'translateX(-1px) translateY(1px)'
                    },
                    '80%': {
                        transform: 'translateX(1px) translateY(-1px)'
                    },
                    '90%': {
                        transform: 'translateX(-1px) translateY(-1px)'
                    },
                },
                pulseGlow: {
                    '0%, 100%': {
                        boxShadow: '0 4px 15px rgba(0, 0, 0, 0.2)',
                    },
                    '50%': {
                        boxShadow: '0 4px 25px rgba(59, 130, 246, 0.4)',
                    },
                },
                slideInUp: {
                    from: {
                        opacity: '0',
                        transform: 'translateY(50px)',
                    },
                    to: {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
            },


            animation: {
                'heart-beat': 'heartBeat 2s ease-in-out infinite',
                'float': 'float 3s ease-in-out infinite',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'bounce-slow': 'bounce 2s infinite',
                'fade-in-up': 'fadeInUp 1s ease-out',
                'fade-in-left': 'fadeInLeft 1s ease-out 0.2s both',
                'fade-in-right': 'fadeInRight 1s ease-out 0.4s both',
                'scale-in': 'scaleIn 0.8s ease-out 0.6s both',
            },
            keyframes: {
                heartBeat: {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.1)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                    '33%': { transform: 'translateY(-10px) rotate(2deg)' },
                    '66%': { transform: 'translateY(-5px) rotate(-1deg)' },
                },
                fadeInUp: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(50px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                fadeInLeft: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(-50px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    },
                },
                fadeInRight: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(50px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    },
                },
                scaleIn: {
                    '0%': {
                        opacity: '0',
                        transform: 'scale(0.8)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'scale(1)'
                    },
                },
            },
            backgroundImage: {
                'hero-pattern': "url('https://html.tf.dreamitsolution.net/mediic1/assets/images/slider/hero-bg.png')",
            },
            colors: {
                'primary': '#002570',
                'secondary': '#007eff',
                'body-text': '#97a9bf',
            }





        },
    },
    plugins: [],
}