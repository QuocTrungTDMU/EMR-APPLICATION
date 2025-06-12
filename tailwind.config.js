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