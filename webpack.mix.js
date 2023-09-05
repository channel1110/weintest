const { VueLoaderPlugin } = require('vue-loader');
const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .vue() // Laravel Mix 6 이상에서 사용 가능
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    plugins: [
        new VueLoaderPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    }
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
