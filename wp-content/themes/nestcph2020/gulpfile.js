var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({ camelize: true });

function styles() {
    return gulp.src('stylesheets/main.scss')
      .pipe(plugins.plumber())
      .pipe(plugins.sass({ style: 'expanded' }))
      .pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
      .pipe(gulp.dest('stylesheets/'))
      .pipe(plugins.cleanCss({ keepSpecialComments: 1 }))
      .pipe(plugins.rename('style.css'))
      .pipe(gulp.dest('./'))
      .pipe(plugins.notify({ message: 'Styles task complete' }));
}

function watch() {
    gulp.watch('stylesheets/**/*.scss', styles);
}

exports.default = function() {
    styles();
    watch();
}
