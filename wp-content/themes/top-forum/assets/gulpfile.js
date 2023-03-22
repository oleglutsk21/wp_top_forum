
let path = {
    build: {
        css: "./css/",
        js: "./js"
    },
    src: {
        css: "./scss/styles.scss",
        js: "./js/script.js"

    },
    watch: {
        css: "./scss/**/*.scss",
        js: "./js/**/*.js", 
    },
    clean: "./css"
}

let {src, dest} = require('gulp'),
    gulp = require('gulp'),
    del = require("del"),
    scss = require('gulp-sass')(require('node-sass')),
    autoprefixer = require("gulp-autoprefixer"),
    group_media  = require("gulp-group-css-media-queries"),
    concat  = require ('gulp-concat'),
    uglify = require('gulp-uglify-es').default;
    


function css(params) {
    return src(path.src.css)
        .pipe(scss({ outputStyle: 'expanded' }).on('error', scss.logError))
        .pipe(
            group_media()
        )
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 5 versions"],
                cascade: true
            })
        )
        .pipe(dest(path.build.css))
}
function js() {
    return gulp.src([
        "./js/**/*.js",
        "!./js/script.min.js",
    ])
        .pipe(concat("script.min.js", {newLine: ';'}))
		.pipe(uglify())
        .pipe(gulp.dest('js'));
}

function watchFiles(params) {
    gulp.watch([path.watch.css], css);
    gulp.watch([path.watch.js, "!./js/script.min.js"], js);
}

function clean(params) {
    return del(path.clean);
}

let build = gulp.series(clean, gulp.parallel(css, js));
let watch = gulp.parallel(build, watchFiles);

exports.css = css;
exports.js = js;
exports.build = build;
exports.watch = watch;
exports.default = watch;