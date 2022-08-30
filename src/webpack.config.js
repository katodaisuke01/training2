const PATH = require('path');

module.exports = {
  mode: "development",
  // entry: './public/js/src/entry-point.js',
  entry: {
    "entry-points": './public/js/src/entry-point.js'
  },
  output: {
    filename: "[name].bundled.js",
    path: PATH.join(__dirname, 'public/js/dist')
  },
  module: {
    rules: [
      {
        test: /\.m?js|\.es6$/,
        use: [
          {
            loader: 'sass-loader',
            options: {
              /* 省略 */
             implementation: require('sass'),
             sassOptions: {
               fiber: require('fibers'),
             },
            },
          },
        ]
      }
    ]
  },
  target: ["web", "es5"]
}
"use strict";
 
const gulp = require('gulp');
const sass = require('gulp-dart-sass');
 
const config = {
    path: {
        sass: {
            src: './src/sass/*.scss',
            dest: './css/'
        }
    }
};
 
function style() {
    return gulp.src(config.path.sass.src)
        .pipe(sass({
            outputStyle: 'compressed',
        }))
        .pipe(gulp.dest(config.path.sass.dest));
}
 
exports.default = function() {
  gulp.watch(config.path.sass.src, style);
}