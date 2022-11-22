const CopyWebpackPlugin = require('copy-webpack-plugin');
const mode = process.env.NODE_ENV;

module.exports = {
  css: {
    loaderOptions: {
      sass: {
        prependData: `\n@import "@/themes/red/base.scss";\n`,
      },
    },
  },
  chainWebpack: config => {
    const mode = config.store.get('mode');
    if (mode === 'production') {
      // // remove development only plugins
      config.plugins.delete('html');
      config.plugins.delete('preload');
      config.plugins.delete('prefetch');

      // add separate entrypoints for type of page
      config
        .entry('free-games')
        .add('./src/entrypoints/free-games.js')
        .end();
      config
        .entry('game-review')
        .add('./src/entrypoints/game-review.js')
        .end();

      // remove development entrypoint
      config.entryPoints.delete('app');

      // copy assets to public folder
      config.plugin('copy').use(CopyWebpackPlugin, [
        {
          patterns: [
            {
              from: 'src/images',
              to: '../images/',
            },
          ],
        },
      ]);
    }
  },
  configureWebpack: {
    devtool: false,
    optimization: {
      splitChunks: false,
    },
  },
  publicPath: mode === 'production' ? '/_arcade/dist' : '/',
  filenameHashing: false,
  outputDir: '../dist',
  runtimeCompiler: true,
};
