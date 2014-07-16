module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);
	
	grunt.initConfig({
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
			cssDeploy: {
				files: {'public_html/wp-content/themes/synth/css/main.css': ['build/css/main.min.css']}
			},
			jsDeploy: {
				files: {'public_html/wp-content/themes/synth/js/main.js': ['build/js/main.min.js']}
			}
	    },
	    /** Wipes BUILD folder when finished **/
	    clean: {
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
		/** Adds CSS vendor prefixes **/
		autoprefixer: {
			build: {
				files: {'build/css/autoprefixer.css': ['build/css/sass.css']}
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
					'build/css/main.min.css': ['build/css/autoprefixer.css']
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
					'build/js/main.min.js': ['build/js/**/*.js']
				}
			}
		},
		/** Combines and minifes Angular templates */
	    ngtemplates: {
			codexApp: {
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
					'build/css/sass.css': ['build/scss/cssmin.scss']
				}
			}
		},
		watch: {
			stylesheets: {
				files: 'src/**/*.scss',
				tasks: ['stylesheets']
			},
			scripts: {
				files: 'src/**/*.js',
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
		['clean:css', 'copy:cssBuild', 'cssmin:sass', 'sass', 'autoprefixer', 'cssmin:deploy', 'copy:cssDeploy']
	);
	
	grunt.registerTask(
		'scripts', 
		'Compiles the JavaScript files.', 
		['clean:js', 'copy:jsBuild', 'uglify', 'copy:jsDeploy']
	);

	grunt.registerTask(
		'templates',
		'Combines and minifies AngularJS template partials',
		['ngtemplates']
	);
    
    grunt.registerTask(
		'build', 
		'Compiles all of the assets and copies the files to the build directory.', 
		['ngtemplates', 'stylesheets', 'scripts']
	);
}