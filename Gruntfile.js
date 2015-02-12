/*!
 * P6 Bootstrap theme's Gruntfile.
 */

module.exports = function(grunt) {
  'use strict';

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    vendor: grunt.file.readJSON('.bowerrc').directory,

    bootstrap: {
      js: [
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/affix.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/alert.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/button.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/carousel.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/collapse.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/tab.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/transition.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/modal.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js',
        '<%= vendor %>/bootstrap-sass/assets/javascripts/bootstrap/popover.js',
      ],
      scss: {
        main: '<%= vendor %>/bootstrap-sass/assets/stylesheets/bootstrap/_bootstrap.scss',
        vars: '<%= vendor %>/bootstrap-sass/assets/stylesheets/bootstrap/_variables.scss'
      }
    },

    copy: {
      firsttime: {
        files: [
          {
            expand: true,
            flatten: true,
            src: ['<%= vendor %>/bootstrap-sass/assets/fonts/bootstrap/*'],
            dest: 'fonts/bootstrap/'
          },
          {
            src: '<%= bootstrap.scss.vars %>',
            dest: 'sass/_bootstrap_variables.scss',
            timestamp: true
          }
        ]
      }
    },

    sass: {
      dist: {
        options: {
          loadPath: [
            '<%= vendor %>/bootstrap-sass/assets/stylesheets'
          ],
          precision: 8,
          trace: true,
          debugInfo: false,
          style: 'expanded' // nested, compact, compressed, expanded
        },
        files: {
          'css/style.css': 'sass/style.scss'
        }
      }
    },

    jshint: {
      options: {
        jshintrc: 'js/.jshintrc'
      },
      gruntfile: {
        options: {
          jshintrc: 'js/grunt.jshintrc'
        },
        src: ['Gruntfile.js', 'grunt/*.js']
      },
      core: {
        src: 'js/*.js'
      }
    },

    concat: {
      dist: {
        options: {
          sourceMap: true
        },
        files: {
          'js/script.js': [
            '<%= bootstrap.js %>',
            'javascripts/**/*.js',
            'javascripts/default.js'
          ]
        }
      }
    },

    uglify: {
      options: {
        preserveComments: 'some',
        sourceMap: false
      },
      dist: {
        files: {
          'js/script.min.js': ['js/script.js'],
        }
      }
    },

    connect: {
      server: {
        options: {
          port: 9001,
          base: './../../../../',
          open: 'http://0.0.0.0:9001/sites/all/themes/p6bootstrap/kitchen-sink.html'
        }
      }
    },

    watch: {
      grunt: {
        options: {
          reload: true
        },
        files: ['Gruntfile.js'],
        // tasks: ['jshint:gruntfile']
      },
      sass: {
        files: ['stylesheets/**/*.scss'],
        tasks: ['sass'],
        options: {
          livereload: true
        }
      },
      js: {
        files: ['js/**/*.js'],
        tasks: ['concat', 'uglify'],
        options: {
          livereload: true
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('firsttime', ['copy:firsttime']);
  grunt.registerTask('js', ['concat', 'uglify']);
  grunt.registerTask('build', ['sass', 'js']);
  grunt.registerTask('default', ['build', 'watch']);
  grunt.registerTask('server', ['connect:server:keepalive']);
};
