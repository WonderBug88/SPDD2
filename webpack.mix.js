const mix = require("laravel-mix");
let path = require("path");
mix.webpackConfig({
    resolve: {
        extensions: [".js", ".json", ".vue"],
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
        },
    },
    output: {
        publicPath: "/laravel-new/public/",
    },
});

module.exports = {
    mode: "production",
    optimization: {
        nodeEnv: "production",
        minimize: true,
        splitChunks: {
            chunks: "all",
        },
    },
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
