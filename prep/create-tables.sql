DROP TABLE IF EXISTS wp_sts_survey_researchers;
CREATE TABLE wp_sts_survey_researchers (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	code INT UNSIGNED NOT NULL,
	login_hash VARCHAR(255) NOT NULL,
	UNIQUE KEY id (id),
    UNIQUE KEY email (email),
    UNIQUE KEY code (code),
    UNIQUE KEY login_hash (login_hash)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS wp_sts_survey_sources;
CREATE TABLE wp_sts_survey_sources (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	researcher_id INT UNSIGNED NOT NULL,
	source TEXT NOT NULL,
	paper_id BIGINT,
	ord INT UNSIGNED NOT NULL,
	UNIQUE KEY id (id),
	KEY researcher_id (researcher_id),
	KEY ord (ord)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS wp_sts_survey_questions;
CREATE TABLE wp_sts_survey_questions (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	title VARCHAR(32) NOT NULL,
	question TEXT NOT NULL,
	ord INT UNSIGNED NOT NULL,
	UNIQUE KEY id (id),
	KEY ord (ord)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS wp_sts_survey_responses;
CREATE TABLE wp_sts_survey_responses (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	source_id INT UNSIGNED NOT NULL,
	question_id INT UNSIGNED NOT NULL,
	UNIQUE KEY id (id),
	KEY source_id (source_id),
	KEY question_id (question_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
