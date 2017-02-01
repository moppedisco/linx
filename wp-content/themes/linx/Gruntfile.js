'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        watch: {
            sass: {
                files: ['library/**/*.{scss,sass}'],
                tasks: ['sass','autoprefixer']
            },
            js: {
                files: 'library/js/*.js',
                tasks: ['uglify']
            }
        },
        googlefonts: {
          build: {
            options: {
              fontPath: 'library/fonts/',
              cssFile: 'library/fonts/fonts.scss',
              fonts: [
                {
                  family: 'Roboto',
                  styles: [
                    300,400, "400italic", 500, 700
                  ]
                }
              ]
            }
          }
        },
        jshint: {
            files: [
                'library/js/app.js'
            ],
            options: {
                expr: true,
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },
        // sass
        sass: {
          // dist: {
          //   options: {
          //     style: 'compressed'
          //   },
          //   files: [{
          //       expand: true,
          //       cwd: 'library/scss',
          //       src: [
          //           '*.scss'
          //       ],
          //       dest: 'library/css',
          //       ext: '.min.css'
          //   }]
          // },
          dev: {
            options: {
              style: 'expanded',
            },
            files: [{
                expand: true,
                cwd: 'library/scss',
                src: [
                    '*.scss'
                ],
                dest: 'library/css',
                ext: '.css'
            }]
          }
        },
        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4'],
                map: true
            },
            files: {
                expand: true,
                flatten: true,
                src: 'library/css/*.css',
                dest: 'library/css'
            },
        },

        // uglify to concat, minify, and make source maps
        uglify: {
          // dist: {
          //     options: {
          //         report: 'gzip'
          //     },
          //     files: {
          //         'library/js/main.min.js' : [
          //             'library/app.js',
          //             // 'library/vendor/**/*.js'
          //         ]
          //     }
          // },
          dev: {
              options: {
                  beautify: true,
                  compress: false,
                  mangle: false
              },
              files: {
                  'library/js/scripts.min.js' : [
                      'library/libs/**/*.js',
                      'library/js/app.js',
                  ]
              }
          }
        }

    });

    // grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks("grunt-contrib-imagemin");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-google-fonts");
    grunt.loadNpmTasks("grunt-autoprefixer");


    grunt.registerTask('googlefont', ['googlefonts']);
    grunt.registerTask('default', [
        'jshint',
        'uglify:dev',
        // 'uglify:dist',
        'sass:dev',
        // 'sass:dist',
        'autoprefixer',
        // 'copy:main',
        'watch'
    ]);

};
