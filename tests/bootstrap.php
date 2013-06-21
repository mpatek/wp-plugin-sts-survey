<?php
$path = dirname( __FILE__ ) . '/wp-tests/bootstrap.php';
if ( file_exists( $path ) ) {
    define( 'STS_SURVEY_PHPUNIT', true );
    $GLOBALS['wp_tests_options'] = array(
        'active_plugins' => array( 'wp-plugin-sts-survey/sts-survey.php' ),
    );
    require_once $path;
    require_once '../swpmvc/swpmvc.php';
    require_once 'sts-survey.php';
    $survey = Sts_Survey();
    SwpMVCCore::instance()->router->routes = 
        $survey->get_routes( SwpMVCCore::instance()->router->routes );
}
else {
    exit( "Couldn't find $path\n" );
}
