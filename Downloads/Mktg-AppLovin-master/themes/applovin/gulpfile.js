const gulp = require("gulp");
const { src, dest, watch } = require("gulp");
const minifyJs = require("gulp-uglify");
const sourceMaps = require("gulp-sourcemaps");
const log = require("fancy-log");
const through2 = require("through2");
const fs = require("fs");
const eslint = require("gulp-eslint");

// Critical CSS task start
gulp.task("critical", async () => {
    const { generate } = await import("critical");
    
    try {
        const result = await generate({
            src: "https://applovin.com", // Use live URL
            target: {
                css: "./dist/css/critical.css" // Output path
            },
            inline: false, // Don't inline CSS
            extract: false, // Don't extract full CSS
            dimensions: [
                {
                    height: 900,
                    width: 1300
                },
                {
                    height: 1600,
                    width: 900
                }
            ]
        });

        // Write the critical CSS to a file
        fs.writeFileSync("./dist/css/critical.css", result.css || "");
        log.info("Critical CSS generated successfully!");
    } catch (err) {
        log.error("Critical CSS generation failed:", err.message);
    }
});
// Critical CSS task end

// Minify JS files in the root ./js folder, excluding ./js/util/
const minifyIndividualJs = () => {
    return src(["./dist/js/*.js"]) // Target dist/js folder after babel task
        .pipe(sourceMaps.init())  // Initialize sourcemaps
        .pipe(minifyJs())         // Minify each file
        .pipe(sourceMaps.write()) // Write sourcemaps
        .pipe(dest("./dist/js/"));     // Output back to the ./dist/js/ folder
};

// Watch for changes in the root ./js folder, excluding the ./js/util/ folder
const devWatch = () => {
    watch(["./js/*.js', '!./js/util/**/*.js"], minifyIndividualJs);
};

exports.minifyIndividualJs = minifyIndividualJs;
exports.devWatch = devWatch;
// Minify JS task end

// Autoprefixer task start
const rename = require("gulp-rename");

gulp.task("autoprefixer", () => {
    const autoprefixer = require("autoprefixer");
    const sourcemaps = require("gulp-sourcemaps");
    const postcss = require("gulp-postcss");

    const browserslistConfig = [
        "> 0.3%",
        "last 4 versions",
        "not dead",
    ];

    return gulp.src(["./style.css", "./tailwind_output.css", "./dist/css/legacy-style.css"])
        .pipe(sourcemaps.init())
        .pipe(postcss([autoprefixer({ overrideBrowserslist: browserslistConfig })]))
        .pipe(sourcemaps.write("."))
        .pipe(rename({ suffix: ".pre" })) // Rename the files if desired
        .pipe(gulp.dest("./dist/css/"));
});
// Autoprefixer task end

// Accesability testing task start
    const pa11y = require("pa11y");

// Array of pages to test
const pagesToTest = [
    "https://applovin.com/", // Live URL
];

gulp.task("accessibility", async () => {
    for (const pageUrl of pagesToTest) {
        console.log(`\nTesting accessibility for: ${pageUrl}`);
        try {
            const results = await pa11y(pageUrl, {
                includeNotices: true,
                includeWarnings: true,
                log: {
                    debug: console.log, // Log debug messages
                    error: console.error, // Log error messages
                    info: console.info // Log info messages
                }
            });
            
            if (results.issues.length > 0) {
                console.log(`\nFound ${results.issues.length} issues on ${pageUrl}:`);
                results.issues.forEach(issue => {
                    console.log(`\n${issue.type.toUpperCase()}: ${issue.message}`); // Log issue type and message
                    console.log(`Context: ${issue.context}`); // Log context
                    console.log(`Selector: ${issue.selector}`); // Log selector
                    console.log(`Code: ${issue.code}`); // Log code
                });
            } else {
                console.log(`No accessibility issues found on ${pageUrl}`); // Log no issues found
            }
        } catch (error) {
            console.error(`Error testing ${pageUrl}:`, error.message); // Log error message
        }
        }
});
// Accesability testing task end

// PHP Linting task start
const { exec } = require("child_process");

// Paths to PHP files in your theme
const phpFiles = "./**/*.php";

// Define a task to run PHP_CodeSniffer
gulp.task("phpcs", (done) => {
    exec(`phpcs --standard=WordPress ${phpFiles}`, (err, stdout, stderr) => {
        if (stdout) console.log(stdout); // Output PHPCS results
        if (stderr) console.error(stderr); // Log any errors
        done(err);
    });
});

// Optional: Add a watch task for PHP files
gulp.task("watch-php", () => {
    gulp.watch(phpFiles, gulp.series("phpcs"));
});
// PHP Linting task end

// ESLint task start
gulp.task("lint:js", () => {
    return src([
        "./js/**/*.js",          // Include all JS files in js directory and subdirectories
        "!./js/lib/**/*.js",     // Include lib directory
        "!./js/util/**/*.js",    // Exclude util directory
    ], { base: "./js/" })        // Set base directory to js folder
        .pipe(eslint({
            fix: true,           // Enable auto-fixing
            useEslintrc: true    // Use .eslintrc.json configuration
        }))
        .pipe(eslint.format())
        .pipe(eslint.failAfterError())
        .pipe(through2.obj(function(file, enc, cb) {
            // Only pass through the file if it was fixed
            if (file.eslint && file.eslint.fixed) {
                cb(null, file);
            } else {
                cb(null);
    }
        }))
        .pipe(dest("./js/")); // Write only fixed files back to js directory
});

// Watch JS files for linting
gulp.task("watchJsLint", () => {
    watch([
        "./js/**/*.js",          // Include all JS files in js directory and subdirectories
        "!./js/lib/**/*.js",     // Include lib directory
        "!./js/util/**/*.js",    // Exclude util directory
    ], gulp.series("lint:js"));
});

// Watch linting task  
gulp.task("watch", gulp.parallel("watch-php", "watchJsLint"));



// Babel task start
const babel = require("gulp-babel");

gulp.task("babel", () => {
    return src(["./js/*.js", "./js/lib/**/*.js"], { base: "./js" }) // Add base option to preserve directory structure
        .pipe(babel()) // Transpile JS files
        .pipe(dest("./dist/js")); // Output to ./dist/js/ while maintaining structure
});

// Watch for changes in the root ./js folder and lib folder
const devWatchBabel = () => {
    watch(["./js/*.js", "./js/lib/**/*.js"], gulp.series("babel"));
};

exports.devWatchBabel = devWatchBabel;// Babel task end

