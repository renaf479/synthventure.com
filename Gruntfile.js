module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);
	
	grunt.initConfig({
		/** Adds CSS vendor prefixes **/
		autoprefixer: {
			build: {
				files: {'build/css/main.css': ['build/css/sass.css']}
			}
		},
	    /** Wipes BUILD folder when finished **/
	    clean: {
	    	build: {
		    	src: ['build']	
	    	},
			css: {
				src: ['build/css', 'build/scss']
			},
			js: {
				src: ['build/js']
			},
			templates: {
				src: ['build/templates']
			}
		},
		/** Combines JS files **/
		concat: {
			build: {
				options: {
					separator: ';'
				},
				files: {
					'build/js/main.js': ['build/js/**/*.js']
				}
			},
			sass: {
				files: {
					'build/scss/concat.scss': ['build/scss/**/*.scss']
				}
			}
		},
		/** Copies SRC to BUILD folder **/
		copy: {
			build: {
				cwd: 'src',
				src: ['**'],
				dest: 'build',
				expand: true
			},
			jsBuild: {
				cwd: 'src/js',
				src: ['**/*.js'],
				dest: 'build/js',
				expand: true
			},
			cssBuild: {
				cwd: 'src/scss',
				src: ['**/*.scss'],
				dest: 'build/scss',
				expand: true
			},
			cssDev: {
				files: {'public_html/css/main.css': ['build/css/main.css']}
			},
			jsDev: {
				files: {'public_html/js/main.js': ['build/js/main.js']}
			}
	    },
		/** Minifies CSS **/
		cssmin: {
			sass: {
				files: {
					'build/scss/cssmin.scss': ['build/scss/**/*.scss']
				}
			},
			deploy: {
				files: {
					'build/css/main.min.css': ['build/css/main.css']
				}
			}
		},
		/** Combines and minifes Angular templates */
	    ngtemplates: {
			synthApp: {
				cwd:		'src/templates',
				src:        '**/*.html',
				dest:       'src/js/app/templates.js',
				options: {
					htmlmin: {
						collapseBooleanAttributes:      true,
						collapseWhitespace:             true,
						removeAttributeQuotes:          true,
						removeComments:                 true,
						removeEmptyAttributes:          true,
						removeRedundantAttributes:      true,
						removeScriptTypeAttributes:     true,
						removeStyleLinkTypeAttributes:  true
					}
				}
			}
		},
		//SASS
		sass: {
			build: {
				files: {
					'build/css/sass.css': ['build/scss/concat.scss']
				}
			}
		},
		/** Minifies JS **/
		uglify: {
			build: {
				options: {
					mangle: false
				},
				files: {
					'build/js/main.min.js': ['build/js/main.js']
				}
			}
		},
		watch: {
			stylesheets: {
				files: 'src/scss/**/*.scss',
				tasks: ['stylesheets']
			},
			scripts: {
				files: 'src/js/**/*.js',
				tasks: ['scripts']
			},
			templates: {
				files: ['src/templates/**/*.html'],
				tasks: ['templates']
			},
			copy: {
				files: ['src/**'],
				tasks: ['copy']
			}
		},
	});
    
    grunt.registerTask(
		'default', 
		'Watches the project for changes, automatically builds them', 
		['build', 'watch']
	);
    
    grunt.registerTask(
		'stylesheets', 
		'Compiles the stylesheets.', 
		['clean:css', 'copy:cssBuild', 'concat:sass', 'sass', 'autoprefixer', 'copy:cssDev']
	);
	
	grunt.registerTask(
		'scripts', 
		'Compiles the JavaScript files.', 
		['clean:js', 'copy:jsBuild', 'concat', 'copy:jsDev', 'clean:js']
	);

	grunt.registerTask(
		'templates',
		'Combines and minifies AngularJS template partials',
		['ngtemplates']
	);
    
    grunt.registerTask(
		'build', 
		'Compiles all of the assets and copies the files to the build directory.', 
		['clean', 'ngtemplates', 'stylesheets', 'scripts']
	);
	
	grunt.registerTask(
		'deploy',
		'Minifies files for live deploy',
		[]
	);
}