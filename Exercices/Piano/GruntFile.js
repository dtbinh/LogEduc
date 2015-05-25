module.exports = function( grunt ) {
    // Load all tasks
    //require('load-grunt-tasks')(grunt);

    // Paths
    var PathConfig = {
        dev: '/'
    };

    // Set scripts
    var scripts = [
        '<%= config.dev %>**/_jquery-2.0.3.min.js', // JQuery
        '<%= config.dev %>**/howler.js', // Howler for HTML5 Audio
        '<%= config.dev %>**/_general.js' // General settings
    ];

    grunt.initConfig({

        // Config path
        config: PathConfig,

        // Less
        less: {
            dev: {
                files: {
                    "./assets/css/style.css": "./assets/css/less/style.less"
                }
            }
        }

    });

    grunt.loadNpmTasks('assemble-less');

    grunt.registerTask( 'build', ['less'] );

};