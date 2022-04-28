const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

// change these variables to fit your project
const jsPath= './js';
const cssPath = './scss';
const outputPath = 'dist';
const localDomain = 'http://cit.local';
const entryPoints = {
  // 'app' is the output name, people commonly use 'bundle'
  // you can have more than 1 entry point
  'app': jsPath + '/app.js',
  // 'customizer': jsPath + '/customizer.js',
  // 'navigation': jsPath + '/navigation.js',
  'style': cssPath + '/style.scss',
};

module.exports = {
  entry: entryPoints,
  output: {
    path: path.resolve(__dirname, outputPath),
    filename: '[name].js',
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),

    // Uncomment this if you want to use CSS Live reload
    
    // new BrowserSyncPlugin({
    //   proxy: localDomain,
    //   files: [ outputPath + '/*.css' ],
    //   injectCss: true,
    // }, { reload: false, }),
    
  ],
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader, 
            options: {
                publicPath: ''
            }
          },
          'css-loader',
          'sass-loader'
        ]
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: "css-loader",
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: { indentedSyntax: true }
            }
          }
        ]
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024'
      }
    ]
  },
};