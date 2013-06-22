<?php
class STS_Survey_Controller extends swpMVCBaseController {

    private $max_response = 100;
    private $min_response = 0;

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
        $show_error_message = false;
        if ( isset( $_POST['researcher_code'] ) ) {
            $code = trim( $_POST['researcher_code'] );
            if ( $code ) {
                $researcher = STS_Survey_Researcher::find_by_login_hash( $code );
                if ( $researcher ) {
                    $redir = $this->link(
                        get_class( $this ),
                        'survey',
                        array( $code )
                        );
                    STS_Survey()->redirect($redir);
                }
                else {
                    $show_error_message = true;
                }
            }
        }

        $template = $this->template( 'sign-in' );
        if ( $show_error_message ) {
            $template->replace( 'error_message', $template->copy( 'error_message' ));
        }
        else {
            $template->replace( 'error_message', '' );
        }

        return $this->decorate_template( $template, 'Researcher Sign In' );
    }

    /**
     * Display the survey form.
     *
     * todo: complete this
     */
    public function survey( $researcher_code = null )
    {
        $sign_in_url = $this->link( get_class($this), 'sign_in' );
        $researcher_code = trim( $researcher_code );
        $researcher = null;
        if ( empty ($researcher_code ) ) {
            return STS_Survey()->redirect( $sign_in_url );
        }
        else {
            $researcher = STS_Survey_Researcher::find_by_login_hash( $researcher_code );
            if ( ! $researcher ) {
                return STS_Survey()->redirect( $sign_in_url );
            }
        }

        $response = STS_Survey_Response::find_by_researcher_id(
            $researcher->id
            );
        if ( ! $response ) {
            $response = new STS_Survey_Response();
        }

        // check for response data
        if ( ! empty( $_POST ) ) {
            $response_arr = array();
            foreach ( $_POST as $k => $v ) {

                if ( preg_match ( '/^response-(\d+)-(\d+)$/', $k, $matches ) ) {
                    $paper_id = $matches[1];
                    $question_id = $matches[2];
                    $v = min( $this->max_response, max ( $this->min_response, intval($v) ) );
                    $response_arr[$paper_id][$question_id] = intval( $v );
                }

            }
            if ( $response_arr ) {
                $response->researcher_id = $researcher->id;
                $response->response = $response_arr;
                $result = $response->save();
                if ( $result ) {
                    echo 'success';
                    return;
                }
                else {
                    echo 'failure';
                    return;
                }
            }

        }

        $template = $this->template( 'survey' );

        $questions = STS_Survey_Question::all(
            array( 'order' => 'ord ASC' )
        );

        $definitions = '';
        foreach ($questions as $question) {
            $def_item = $template->copy( 'definition_item' );
            $def_item->replace( 'term', $question->title );
            $def_item->replace( 'definition', $question->question );
            $definitions .= $def_item;
        }
        $template->replace( 'definition_item', $definitions );

        $template->replace( 'researcher', $researcher->name );

        $question_titles = '';
        foreach ($questions as $question) {
            $question_title = $template->copy('question_title');
            $question_title->replace( 'question', $question->title );
            $question_titles .= $question_title;
        }
        $template->replace( 'question_title', $question_titles );

        $sources = STS_Survey_Source::find_all_by_researcher_id(
            $researcher->id, array('order' => 'ord ASC')
            );
        $sources_str = '';
        foreach ($sources as $source) {
            $source_tpl = $template->copy('source');
            $source_tpl->replace('ord', $source->ord);
            $source_tpl->replace('title', $source->source);
            $responses_str = '';
            foreach ($questions as $question) {
                $response_tpl = $source_tpl->copy('response');
                $input = "response-$source->id-$question->id";
                $response_tpl->replace('input', $input);
                if ( isset( $response->response[$source->id][$question->id] ) ) {
                    $response_tpl->replace(
                        'value',
                        $response->response[$source->id][$question->id]
                        );
                }
                else {
                    $response_tpl->replace( 'value', 0 );
                }
                $responses_str .= $response_tpl;
            }
            $source_tpl->replace( 'response', $responses_str );
            $sources_str .= $source_tpl;
        }
        $template->replace( 'source', $sources_str );
        $template->replace( 'home_url', home_url() );
        return $this->decorate_template( $template, 'Survey' );
    }

    /**
     * Decorate template with header/footer.
     *
     * title will appear in <title></title> tag
     */
    private function decorate_template($template, $title)
    {
        #mdpCG_set_page_title($title);
        $header = $this->template('header');
        $header->replace('plugin_dir_uri', STS_Survey()->plugin_url);
        echo $header;
        echo $template;
        echo $this->template('footer');
    }


}
