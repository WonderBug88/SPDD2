const primary = "#5ca466";
const secondary = "#666666";

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ['"Poppins"', "sans-serif"],
        },
        extend: {
            backgroundColor: { primary },
            colors: { primary, secondary },
            borderColor: { primary },
        },
    },
    plugins: [],
};
