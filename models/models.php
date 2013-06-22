<?php
class STS_Survey_Researcher extends swpMVCBaseModel
{
    public static function tablename()
    {
        return 'wp_sts_survey_researchers';
    }

}

class STS_Survey_Question extends swpMVCBaseModel
{
    public static function tablename()
    {
        return 'wp_sts_survey_questions';
    }

}

class STS_Survey_Response extends swpMVCBaseModel
{
    public static function tablename()
    {
        return 'wp_sts_survey_responses';
    }

    public function set_response($response)
    {
        $this->assign_attribute('response', json_encode($response, true));
    }

    public function get_response()
    {
        $response_str = $this->read_attribute('response');
        if (!$response_str) {
            return null;
        }
        return json_decode($response_str, true);
    }

}

class STS_Survey_Source extends swpMVCBaseModel
{
    public static function tablename()
    {
        return 'wp_sts_survey_sources';
    }

}
