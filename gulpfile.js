
    const autoprefixer = require('gulp-autoprefixer');
    const babel = require('gulp-babel');
    const cleanCss = require('gulp-clean-css');
    const concat = require('gulp-concat');
    const del = require('del');
    const eslint = require('gulp-eslint');
    const gulp = require('gulp');
    const gulpStylelint = require('gulp-stylelint');
    const kraken = require('gulp-kraken');
    const mode = require('gulp-mode')();
    const rename = require('gulp-rename');
    const sass = require('gulp-sass');
    const sourcemaps = require('gulp-sourcemaps');
    const svgo = require('gulp-svgo')
    const terser = require('gulp-terser');
    const webpack = require('webpack-stream');


    /*-----------------------------------------------------------------------------*/
    /*-----------------------    PATHS AND OPTIONS     ----------------------------*/
    /*↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓*/


    const paths = {
        src: {
            css: './Sources/Css/redesign/**/*.scss',
            icons: './Sources/Icons/**/*.svg',
            js: './Sources/Js/redesign/**/*.js' /*TODO path to js*/
        },
        build: {
            css: './dist/css',
            dist: './dist',
            icons: './dist/icons',
            js: './dist/js'
        },
        stylesLint: [
            './Sources/_queen/Sass/**/**/*.scss'
        ],
        esLint: [
            './Sources/_queen/Js/**/**/*.js'
        ]
    };

    const options = {
        // CSS Optimizations
        cleanCss: {
            level: {
                2: {
                    mergeSemantically: true, // controls semantic merging; defaults to false
                    restructureRules: true // controls rule restructuring; defaults to false
                }
            }
        },
        // SVG Optimizations
        svgo: {
            plugins: [
                { removeComments: true }, // Useless
                { removeUselessDefs: false }, // Prevent everything inside svg from being removed
                { cleanupIDs: false }, // Prevent our ID's on symbols from being removed
                { removeTitle: false } // We need title for A11y
            ]
        },
        terser: {
            warnings: false,
            mangle: true,
        }
    };


    /*-----------------------------------------------------------------------------*/
    /*-----------------------    Clean Directories     ----------------------------*/
    /*↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓*/

    gulp.task("clean:dist", (done) => {

        del
            .sync([
                paths.build.dist + '/*'
            ]);

        done();
    });

    /*-----------------------------------------------------------------------------*/
    /*-----------------------        CSS PART          ----------------------------*/
    /*↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓*/

    /**
     * Styles
     */
    gulp.task("styles", (done) => {

        gulp
            .src(paths.src.css)

            .pipe(mode.development(sourcemaps.init()))

            .pipe(sass().on('error', sass.logError))
            .pipe(autoprefixer())

            .pipe(mode.production(cleanCss(options.cleanCss)))
            .pipe(mode.development(sourcemaps.write('./maps', {
                    sourceMappingURLPrefix: '/dist/css',
                })
            ))

            .pipe(gulp.dest(paths.build.css));

        done();
    });


    /**
     * Styles Linting
     */
    gulp.task("styles:lint", (done) => {

        gulp
            .src(paths.stylesLint)
            .pipe(gulpStylelint({
                reporters: [
                  {formatter: 'string', console: true}
                ],
                debug: true
              }));
        done();
    });


    /*-----------------------------------------------------------------------------*/
    /*-----------------------         JS PART          ----------------------------*/

    /**
     *
     * THIS WHOLE SCRIPTS PART NEEDS TO BE REDONE
     * THE GULP V3 VERSION HAD ALL OF THESE IN 1 FUNCTION
     * AS OF GULP V4 THE FUNCTION MUST RETURN A STREAM
     * SO HAVING MULTIPLE STREAMS IN A FUNCTION IS NOT VALID
     * HAVE MOVED TO SEPARATE FUNCTIONS FOR THE TIME BEING
     * UNTIL THE JAVASCRIPT IS RE-FACTORED AND WE CAN GROUP IN A BETTER MANNER
     *
     */


    /**
     * Webpack Stream
     */
    gulp.task("webpackStream", (done) => {

        gulp
            .src('??')
            .pipe(webpack(require('./webpack.config.js')))
            .pipe(gulp.dest(paths.build.js));

        done();
    });


    /**
     * Scripts
     */
    gulp.task("scripts", (done) => {

        const singleScripts = gulp
            .src([
                './Sources/Js/countTo.js',
                './Sources/Js/jackpot.js',
                './Sources/Js/redesign/mobile-menu.js',
                './Sources/Js/redesign/Vendors/jquery-3.1.1.js',
                './Sources/Js/redesign/Vendors/jquery.fancybox.js',
                './Sources/_queen/Js/**/*.js',
                '!./Sources/_queen/Js/load-lazy.js',
                '!./Sources/_queen/Js/swiper.js',
            ])
            .pipe(babel())
            .pipe(terser(options.terser).on('error', (e) => {
                console.log(e);
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(paths.build.js));

        const gamesScripts = gulp
            .src('./Sources/Js/games/**/*')
            .pipe(babel())
            .pipe(terser().on('error', (e) => {
                console.log(e);
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(paths.build.js + '/games'));

        const mainScripts = gulp
            .src([
                './Sources/Js/redesign/main.js',
            ])
            .pipe(concat('main.js'))
            .pipe(babel())
            .pipe(terser(options.terser).on('error', (e) => {
                console.log(e);
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(paths.build.js))

        done();

        const commonScripts = gulp
            .src([
                './Sources/Js/redesign/fake-anchor-btn.js',
                './Sources/Js/redesign/sidebar-links.js',
                './Sources/Js/redesign/smoothScroll.js',
            ])
            .pipe(concat('common.js'))
            .pipe(babel())
            .pipe(terser(options.terser).on('error', (e) => {
                console.log(e);
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(paths.build.js))

        done();

        return singleScripts, gamesScripts, mainScripts, commonScripts;
    });


    /**
     * Scripts Linting - Warns but does not fail
     */
    gulp.task("scripts:lint", (done) => {

        gulp
            .src(paths.esLint)
            .pipe(eslint())
            .pipe(eslint.format())

        done();
    });

    /*-----------------------------------------------------------------------------*/
    /*-----------------------     optimizing PART      ----------------------------*/

    /*↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓*/

    /**
     * Optimise Images with Kraken
     */
    gulp.task("optimise:images", (done) => {

        gulp
            .src('images/redesign/**/*.*')
            .pipe(kraken({
                key: 'bb797dbc18c0f64c89c7ca4630a3f115',
                secret: '71e9d60a2228fdc9aaec7fc93ebbeb5655bd50be',
                lossy: true
            }));

        done();
    });

    /**
     * Optimise and move svg icons to build directory
     */
    gulp.task("optimise:svgIcons", (done) => {

        gulp
            .src(paths.src.icons)
            .pipe(svgo(options.svgo))
            .pipe(gulp.dest(paths.build.icons))

        done();
    });


    /*↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑*/
    /*-----------------------     builds PART      ----------------------------*/

    /*-----------------------------------------------------------------------------*/

    const distTasks = [
        'styles',
        'scripts',
        'optimise:svgIcons',
        'webpackStream'
    ];

    // Dev Env Tasks
    const devTasks = [
        'styles:lint',
        'scripts:lint'
    ];

    // Prod build
    const build = gulp.series('clean:dist', gulp.parallel(distTasks), (done) => {
        done();
    });

    // Dev build
    const dev = gulp.series('clean:dist', gulp.parallel(distTasks, devTasks), (done) => {
        done();
    });

    // Run Prod
    gulp.task('default', build);

    // Run Dev
    gulp.task('dev', dev);
