/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],
    theme: {
        extend: {

            boxShadow: {
                'custom-blue': '0 22px 29px 0 rgba(7, 108, 236, 0.1)',
                'medik': '0 22px 29px 0 rgba(7, 108, 236, 0.1)',
            },
            colors: {
                'medik-blue': '#076cec',
            }

        },
    },
    plugins: [],
}