CREATE DATABASE anketa DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE anketa;
CREATE TABLE otazky (id_otazky INTEGER NOT NULL auto_increment, otazka VARCHAR(100), PRIMARY KEY (id_otazky));
CREATE TABLE odpovedi (id_odpovedi INTEGER NOT NULL auto_increment, id_otazky INTEGER NOT NULL, odpoved VARCHAR(100), pocet_hlasu INTEGER, PRIMARY KEY (id_odpovedi));
CREATE USER anketa@localhost IDENTIFIED BY '1234';

GRANT SELECT, INSERT ON anketa.otazky TO anketa@localhost;

GRANT SELECT, INSERT, UPDATE ON anketa.odpovedi TO anketa@localhost;
