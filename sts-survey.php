<?php
/*
Plugin Name: SciTech Strategies Survey
Version: 0.1-alpha
Description: Survey of top biomedical researchers
Author: scitech
Author URI: http://mapofscience.com/
Plugin URI: http://mapofscience.com/
Domain Path: /languages
*/

class STS_Survey {

	private static $instance;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new STS_Survey;
            self::$instance->setup_constants();
			self::$instance->includes();
			self::$instance->setup_actions();
		}
		return self::$instance;
	}

    /**
     * Do a redirect.
     *
     * Unit testable.
     */
    public function redirect($url) {
        if ( defined( 'STS_SURVEY_PHPUNIT' ) ) {
            echo "Doing Redirect: <$url>";
        }
        else {
            header( 'Location: ' . $url );
        }
    }

    /**
     * Set up plugin-wide constants.
     */
    public function setup_constants()
    {
        $this->plugin_url = plugins_url('/', __FILE__);
    }

	/**
	 * Include dependencies.
	 */
	public function includes() {
        require_once dirname( __FILE__ ) . '/models/models.php';
        require_once dirname( __FILE__ ) . '/controllers/class-sts-survey-controller.php';
	}
    
    /**
     * Set up actions.
     */
    public function setup_actions()
    {
        add_filter( 'swp_mvc_routes', array( $this, 'get_routes' ) );
    }
    
    /**
     * Get routes.
     */
    public function get_routes( $routes )
    {
        $routes[] = array(
            'controller' => 'STS_Survey_Controller',
            'method' => 'sign_in',
            'route' => '/sign-in',
        );
        $routes[]= array(
        	'controller' => 'STS_Survey_Controller',
        	'method' => 'survey',
        	'route' => '/survey/:p',
    	);
        return $routes;
 	}

}

function STS_Survey() {
	return STS_Survey::get_instance();
}
add_action( 'swp_mvc_init', 'STS_Survey' );