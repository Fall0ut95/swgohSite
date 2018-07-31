-- CREATE DATABASE test;

-- use test;

-- CREATE TABLE users (
-- 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	firstname VARCHAR(30) NOT NULL,
-- 	lastname VARCHAR(30) NOT NULL,
-- 	email VARCHAR(50) NOT NULL,
-- 	age INT(3),
-- 	location VARCHAR(50),
-- 	date TIMESTAMP
-- );

CREATE DATABASE swgoh_gid;

use swgoh_gid;

-- CREATE TABLE player (
-- 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	username VARCHAR(40) NOT NULL,
-- 	guildid INT(11),
-- 	gp DECIMAL(10,2),
-- 	collectionscore DECIMAL(5,2),
-- 	arenaaverage DECIMAL(10,2),
-- 	created TIMESTAMP,
-- 	updated TIMESTAMP
-- );

-- CREATE TABLE guild (
-- 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	guildid INT(11) NOT NULL,
-- 	guildname VARCHAR(40) NOT NULL
-- );

-- CREATE TABLE toon (
-- 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	toonname VARCHAR(40) NOT NULL,
-- 	baseid VARCHAR(40),
-- 	power INT(11),
-- 	description TEXT,
-- 	url VARCHAR(75)
-- );

-- CREATE TABLE player_toon (
-- 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- 	toonid INT(11),
-- 	playerid INT(11),
-- 	playername VARCHAR(40),
-- 	gearlevel INT(11),
-- 	power INT(11),
-- 	rarity INT(11),
-- 	combattype INT(11)
-- );

CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(90) NOT NULL,
	password VARCHAR(120) NOT NULL,
	name VARCHAR(90) NOT NULL
);
