let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

const app = 'app';
const resources = 'resources';
const assets = `${resources}/assets`;
const dist = 'dist';
const node = 'node_modules';

mix.setPublicPath(dist);
mix.setResourceRoot('../');

// BrowserSync
mix.browserSync({
  host: 'localhost',
  proxy: 'http://dev.test-wp.ca/wp/bcc',
  port: 3000,
  files: [
    `${app}/**/*.php`,
    `${resources}/**/*.php`,
    `${dist}/**/*.css`,
    `${dist}/**/*.js`,
  ],
});

// Sass
mix.sass(`${assets}/styles/main.scss`, `${dist}/styles/main.css`)
  .sass(`${assets}/styles/editor.scss`, `${dist}/styles/editor-style.css`)

// Javascript required on every page
mix.autoload({
  jquery: ['$', 'window.jQuery', 'jQuery'],
  'bootstrap/dist/js/bootstrap.js': ['Bootstrap'],
  'popper.js/dist/umd/popper.js': ['Popper'],
});

// compiled Javascript
mix.js(`${assets}/scripts/main.js`, `${dist}/scripts`)
  .js(`${assets}/scripts/customizer.js`, `${dist}/scripts`)

// Assets
mix.copy(`${assets}/fonts`, `${dist}/fonts`, false)
  .copy(`${node}/font-awesome/fonts`, `${dist}/fonts`, false)
  .copy(`${assets}/images`, `${dist}/images`, false);

// Options
mix.options({
  processCssUrls: false,
});

// Source maps when not in production.
if (!mix.inProduction()) {
  mix.sourceMaps();
}

// Hash and version files in production.
if (mix.inProduction()) {
  mix.version();
}

// Add Isotope support.
// mix.webpackConfig({
//   resolve: {
//     alias: {
//       'masonry': 'masonry-layout',
//       'isotope': 'isotope-layout',
//     },
//   },
// });

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.ts(src, output); <-- Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
