const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const autoprefixer = require('autoprefixer');
const globImporter = require('node-sass-glob-importer');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
  mode: 'development',
  entry: {
    main: './src/js/app.js'
  },
  output: {
    path: path.resolve(__dirname, 'dist/js/'),
    filename: 'bundle.min.js'
  },
  stats: {
    hash: false,
    version: false,
    assets: false,
    entrypoints: false,
    modules: false
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /.(scss|css)$/,
        include: path.resolve(__dirname, 'src/scss/'),
        exclude: /node_modules/,
        use: [
          {
            loader: 'cache-loader'
          },
          {
            loader: MiniCssExtractPlugin.loader
          },
          {
            loader: 'css-loader',
            options: {
              sourceMap: true
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: [autoprefixer()],
              sourceMap: true
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: {
                importer: globImporter()
              }
            }
          }
        ]
      },
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'src/js/'),
        exclude: /(node_modules)/,
        use: [
          {
            loader: 'cache-loader'
          },
          {
            loader: 'babel-loader',
            options: {
              sourceMap: true,
              presets: ['@babel/preset-env']
            }
          }
        ]
      },
      {
        test: /\.(woff(2)?|ttf|eot|svg|otf)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        include: path.resolve(__dirname, 'src/fonts/'),
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: '../fonts'
            }
          }
        ]
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]',
          outputPath: '../images/',
          publicPath: '../images/'
        }
      }
    ]
  },
  optimization: {
    removeAvailableModules: false,
    removeEmptyChunks: false,
    splitChunks: false,
    minimizer: [
      new CssMinimizerPlugin(),
      new UglifyJsPlugin({
        sourceMap: true,
        include: /\.min\.js$/,
        parallel: true
      })
    ],
    minimize: true
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/bundle.min.css'
    }),
    new CssMinimizerPlugin(),
    new CopyPlugin({
      patterns: [
        {
          from: 'src/images',
          to: '../images'
        }
      ]
    })
  ]
};
