CREATE DATABASE IF NOT EXISTS ContentTeamDatabase;

use ContentTeamDatabase;

CREATE USER IF NOT EXISTS 'databaseUser'@'localhost' IDENTIFIED BY 'user123';

GRANT ALL PRIVILEGES ON ContentTeamDatabase.* TO databaseUser@localhost;

CREATE TABLE IF NOT EXISTS UserTable(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(25) NOT NULL,
password VARCHAR(25) NOT NULL,
isAdmin BINARY NOT NULL,
isActive BINARY NOT NULL);

CREATE TABLE IF NOT EXISTS WebPages(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Title VARCHAR(25),
ParentPage INT DEFAULT 0,
SortOrder INT DEFAULT 2,
isActive BINARY NOT NULL
);
--0 is false, 1 is true

CREATE TABLE IF NOT EXISTS ContentTable(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ParentPageId INT,
Header VARCHAR(25),
Content VARCHAR(225),
SortOrder INT
);

--Sample Data
INSERT INTO UserTable(username, password, isAdmin, isActive) VALUES ('adminUser', 'adminpswd', 1, 1);
INSERT INTO UserTable(username, password, isAdmin, isActive) VALUES ('RandomGuy', 'randompass', 0, 1);

INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Home', 0, 0, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Hobbies', 0, 2, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('About', 0, 1, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Mission', 3, 0, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Fishing', 2, 0, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Crochet', 2, 1, 1);
INSERT INTO WebPages(Title, ParentPage, SortOrder, isActive) VALUES ('Piano', 2, 2, 1);