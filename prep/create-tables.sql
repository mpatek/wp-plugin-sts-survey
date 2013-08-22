DROP TABLE IF EXISTS wp_sts_survey_researchers;
CREATE TABLE wp_sts_survey_researchers (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	code INT UNSIGNED NOT NULL,
	login_hash VARCHAR(255) NOT NULL,
	UNIQUE KEY id (id),
    UNIQUE KEY email (email),
    KEY code (code),
    UNIQUE KEY login_hash (login_hash)
);

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
);

DROP TABLE IF EXISTS wp_sts_survey_questions;
CREATE TABLE wp_sts_survey_questions (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	title VARCHAR(32) NOT NULL,
	question TEXT NOT NULL,
	ord INT UNSIGNED NOT NULL,
	UNIQUE KEY id (id),
	KEY ord (ord)
);

DROP TABLE IF EXISTS wp_sts_survey_responses;
CREATE TABLE wp_sts_survey_responses (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	researcher_id INT UNSIGNED NOT NULL,
	response TEXT NOT NULL,
	UNIQUE KEY id (id),
	KEY researcher_id (researcher_id)
);
