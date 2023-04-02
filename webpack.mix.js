let mix = require("laravel-mix");


mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .alias({
        "@": "resources/js",
    });

if (mix.inProduction()) {
    mix.version();
}