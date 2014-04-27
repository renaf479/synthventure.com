module.exports = function(grunt){

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
	
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
        	build: {
        		files: {
        			'css/main.min.css': ['css/build/**/*.css']
        		}
        	}
        },
        uglify: {
		    build: {
		        files: {
		            'js/main.min.js': ['js/build/**/*.js'],             
		        }
		    },
		    options: {
		     	mangle: false
			}
		},
		watch: {
			scripts: {
				files: ['js/build/**/*.js', 'css/build/**/*.css'],
				tasks: ['uglify', 'cssmin'],
				options: {
				  spawn: false
				}
			}
		}
    });

    grunt.registerTask('default', []);

};
