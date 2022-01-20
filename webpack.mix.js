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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/admin/plugins/jqvmap/jqvmap.min.css',
    'resources/admin/dist/css/adminlte.min.css',
    'resources/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/admin/plugins/daterangepicker/daterangepicker.css',
    'resources/admin/plugins/summernote/summernote-bs4.min.css',
],'public/admin/css/all.css');


mix.scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/jquery-ui/jquery-ui.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/plugins/chart.js/Chart.min.js',
    'resources/admin/plugins/sparklines/sparkline.js',
    'resources/admin/plugins/jqvmap/jquery.vmap.min.js',
    'resources/admin/plugins/jqvmap/maps/jquery.vmap.usa.js',
    'resources/admin/plugins/jquery-knob/jquery.knob.min.js',
    'resources/admin/plugins/moment/moment.min.js',
    'resources/admin/plugins/daterangepicker/daterangepicker.js',
    'resources/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/admin/plugins/summernote/summernote-bs4.min.js',
    'resources/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/admin/dist/js/adminlte.js',
    'resources/admin/dist/js/demo.js',
    'resources/admin/dist/js/pages/dashboard.js',
],'public/admin/js/all.js');

mix.styles([
    'resources/frontTemplate/assets/vendors/mdi/css/materialdesignicons.min.css',
    'resources/frontTemplate/assets/vendors/aos/dist/aos.css/aos.css',
    'resources/frontTemplate/assets/css/style.css',
], 'public/front/css/all.css');

mix.scripts([
    'resources/frontTemplate/assets/vendors/js/vendor.bundle.base.js',
    'resources/frontTemplate/assets/vendors/aos/dist/aos.js/aos.js',
    'resources/frontTemplate/assets/js/demo.js',
    'resources/frontTemplate/assets/js/jquery.easeScroll.js',
], 'public/front/js/all.js');
