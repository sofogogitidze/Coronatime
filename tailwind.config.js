/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily:{
                'sansation' : ['Sansation', "sans-serif"]
            },
            backgroundImage: {
                'new-cases': "url('/public/images/new_cases.png')",
                'recovered': "url('/public/images/recovered.png')",
                'death' : "url('/public/images/death.png')",
            },
            colors: {
                'custom-blue' : '#2029F3',
                'custom-green': '#0FBA68',
                'custom-yellow' : '#EAD621',
                'custom-red': '#ec5656',
            }
        },
    },
    plugins: [
    ],
}
