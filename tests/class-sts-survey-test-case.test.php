<?php
class STS_Survey_Test_Case extends WP_UnitTestCase
{
    /**
     * Get results of controller action.
     */
    public function get_controller_output( $controller, $action, $params = array() )
    {
        ob_start();
        call_user_func_array( array( $controller, $action ), $params );
        return ob_get_clean();
    }

    /**
     * Assert that the output contains a redirect.
     */
    public function assertRedirect(
        $url,
        $output,
        $message = 'Expected redirect to url <string:#1> not found in <string:#2>.'
    )
    {
        $redir = "Doing Redirect: <$url>";
        $this->assertContains( $redir, $output );
    }

    /**
     * Test the controller sign in.
     */
    public function test_sign_in()
    {
        $controller = new STS_Survey_Controller();
        $output = $this->get_controller_output( $controller, 'sign_in' );
        $this->assertContains( 'SciTech Strategies Survey', $output );
        $this->assertContains( 'Researcher Sign-In', $output );
        $this->assertContains( 'Please enter your code', $output );
        $this->assertContains( 'Sign in', $output );

        // test error.
        $_POST = array( 'researcher_code' => 'foobar' );
        $output = $this->get_controller_output( $controller, 'sign_in' );
        $this->assertContains( 'SciTech Strategies Survey', $output );
        $this->assertContains( 'Researcher Sign-In', $output );
        $this->assertContains( 'Please enter your code', $output );
        $this->assertContains( 'Sign in', $output );
        // error message.
        $this->assertContains(
        	'Researcher not found. Please try again', $output
        	);
        // try a working code.
        $code = '2a3e';
        $_POST = array( 'researcher_code' => $code );
        $output = $this->get_controller_output( $controller, 'sign_in' );
        $redir = $controller->link(
        	get_class( $controller ),
        	'survey',
        	array( $code )
        	);
        $this->assertRedirect( $redir, $output );
    }

    /**
     * Test the survey.
     */
    public function test_survey()
    {
    	// empty code -- redirect
    	$controller = new STS_Survey_Controller();
    	$sign_in_url = $controller->link(
    		get_class( $controller ),
    		'sign_in'
    		);
    	$output = $this->get_controller_output( $controller, 'survey' );
    	$this->assertRedirect( $sign_in_url, $output );

    	// bad code -- redirect
    	$output = $this->get_controller_output( $controller, 'survey', array( 'foobar' ) );
    	$this->assertRedirect( $sign_in_url, $output );

    	// good code -- show survey
        $code = '2a3e';
        $output = $this->get_controller_output( $controller, 'survey', array( $code ) );
    	$questions = STS_Survey_Question::all();
    	$this->assertEquals( 6, count( $questions ) );

    	// questions are displayed?
    	$this->assertContains( 'Definitions:', $output );
    	foreach ( $questions as $question ) {

    		$this->assertTrue( ! empty( $question->title ) );
    		$this->assertContains( $question->title, $output );
    		$this->assertTrue( ! empty( $question->question ) );
    		$this->assertContains( $question->question, $output );

    	}

    	// scale info is displayed?
    	$this->assertContains( 'Scale:', $output );
    	$this->assertContains( '0', $output );
    	$this->assertContains( 'Not at all', $output );
    	$this->assertContains( '25', $output );
    	$this->assertContains( 'Modest', $output );
    	$this->assertContains( '50', $output );
    	$this->assertContains( 'Substantial', $output );
    	$this->assertContains( '75', $output );
    	$this->assertContains( 'Prominent', $output );
    	$this->assertContains( '100', $output );
    	$this->assertContains( 'Complete', $output );

    	// researcher info displayed?
    	$this->assertContains( 'Highly-Influential Scientist:', $output );
    	$this->assertContains( 'Akira, Shizuo', $output );

    	// survey instructions displayed?
    	$this->assertContains( 'Please rate your papers below on each feature using the 0-100 scale.', $output );
    	$this->assertContains( 'Please add and rate what you consider to be your most important paper (2005-2008) at the bottom if it is missing from the list.', $output );

    	// example scores displayed?
    	$this->assertContains( 'Example of scores for an article', $output );
    	$this->assertContains( '20', $output );
    	$this->assertContains( '90', $output );
    	$this->assertContains( '30', $output );
    	$this->assertContains( '60', $output );
    	$this->assertContains( '15', $output );
    	$this->assertContains( '55', $output );

    	// papers displayed?
    	$this->assertContains( 'CELL, v. 124', $output );
    	$this->assertContains( 'IMMUNOL, v. 175', $output );

        STS_Survey_Response::delete_all( array( 'conditions' => '1=1' ) );
        // try posting a response
        $_POST = array(
            'response-1-1' => 30,
            'response-5-3' => 20,
            );
        $output = $this->get_controller_output( $controller, 'survey', array( $code ) );
        $this->assertEquals( 'success', $output );

        $researcher = STS_Survey_Researcher::find_by_login_hash( $code );
        $response = STS_Survey_Response::find_by_researcher_id( $researcher->id );
        $this->assertEquals( 30, $response->response[1][1] );
        $this->assertEquals( 20, $response->response[5][3] );

        // some invalid values?
                STS_Survey_Response::delete_all( array( 'conditions' => '1=1' ) );
        // try posting a response
        $_POST = array(
            'response-1-7' => -17,
            'response-7-8' => 120,
            'response-9-8' => 4,
            'response-10-4' => 'foo',
            );
        $output = $this->get_controller_output( $controller, 'survey', array( $code ) );
        $this->assertEquals( 'success', $output );

        $researcher = STS_Survey_Researcher::find_by_login_hash( $code );
        $response = STS_Survey_Response::find_by_researcher_id( $researcher->id );
        $this->assertEquals( 0, $response->response[1][7] );
        $this->assertEquals( 100, $response->response[7][8] );
        $this->assertEquals( 4, $response->response[9][8] );
        $this->assertEquals( 0, $response->response[10][4] );

        // additional source/responses should be saved.
        $_POST = array(
            'addl-source' => 'Some Source Info Here',
            'addl-response-1' => 6,
            'addl-response-2' => -7,
            'addl-response-5' => 120,
            );
        $output = $this->get_controller_output( $controller, 'survey', array( $code ) );
        $this->assertEquals( 'success', $output );

        $researcher = STS_Survey_Researcher::find_by_login_hash( $code );
        $response = STS_Survey_Response::find_by_researcher_id( $researcher->id );
        $this->assertEquals( 'Some Source Info Here', $response->response['addl_source'] );
        $this->assertEquals( 6, $response->response['addl_response'][1] );
        $this->assertEquals( 0, $response->response['addl_response'][2] );
        $this->assertEquals( 100, $response->response['addl_response'][5] );

    }
}
