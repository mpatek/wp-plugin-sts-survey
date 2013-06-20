<?php
class STS_Survey_Controller extends swpMVCBaseController {

	public function __construct()
    {
        parent::__construct();
        $this->_templatedir = dirname( __FILE__ ) . '/../templates/';
    }

    /**
     * Display a researcher sign-in screen.
     *
     * todo: complete this
     */
    public function sign_in()
    {
    	echo 'sign in here';
    }

    /**
     * Display the survey form.
     *
     * todo: complete this
     */
    public function survey( $researcher_code )
    {
    	echo 'survey: ' . $researcher_code;
    }

}
