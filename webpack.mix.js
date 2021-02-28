const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
   'resources/js/app.js',
  

], 'public/js/app.js')

// .scripts([

//    'adminlte/plugins/sweetalert2/sweetalert2.all.js',
//    'adminlte/plugins/jquery/jquery.min.js',
//    'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'

// ], 'public/js/plantilla.js')

// .styles([

//    'asset/styles/main_styles.css',
//    'asset/styles/responsive.css',
//    'adminlte/plugins/sweetalert2/sweetalert2.min.css',

// ], 'public/css/plantilla.css')

// .sass([
//    'resources/sass/app.scss',
//    '',
// ], 'public/css/plantilla.css')

   
