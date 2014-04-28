module.exports = function(grunt){

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
	
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
        	build: {
        		files: {
        			'css/main.min.css': ['build/css/**/*.css']
        		}
        	}
        },
        uglify: {
		    build: {
		        files: {
		            'js/main.min.js': ['build/js/**/*.js'],             
		        }
		    },
		    options: {
		     	mangle: false
			}
		},
		watch: {
			scripts: {
				files: ['build/js/**/*.js', 'build/css/**/*.css'],
				tasks: ['uglify', 'cssmin'],
				options: {
				  spawn: false
				}
			}
		}
    });

    grunt.registerTask('default', []);

};
