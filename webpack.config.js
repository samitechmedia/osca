const path = require('path');
const Dotenv = require('dotenv-webpack');

module.exports = {
    mode: 'production',
    optimization: {
        minimize: true
    },
    entry: {
        adobe: ['./Sources/Js/analytics/init.js'],
        loadlazy: ['./Sources/_queen/Js/load-lazy.js'],
        swiper: ['./Sources/_queen/Js/swiper.js']
    },
    output: {
        filename: '[name].min.js',
        path: path.resolve(__dirname, 'js'),
    },
    plugins: [
        new Dotenv()
    ]
};
