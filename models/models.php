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

}

class STS_Survey_Source extends swpMVCBaseModel
{
    public static function tablename()
    {
        return 'wp_sts_survey_sources';
    }

}
