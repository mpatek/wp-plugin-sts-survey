DELETE FROM wp_sts_survey_questions;
LOAD DATA LOCAL INFILE '../data/questions-final.txt'
INTO TABLE wp_sts_survey_questions 
(id, ord, title, question);

DELETE FROM wp_sts_survey_researchers;
LOAD DATA LOCAL INFILE '../data/researchers-final.txt'
INTO TABLE wp_sts_survey_researchers
(id, code, name, email, login_hash);

DELETE FROM wp_sts_survey_sources;
LOAD DATA LOCAL INFILE '../data/sources-final.txt'
INTO TABLE wp_sts_survey_sources
(researcher_id, ord, paper_id, source);
