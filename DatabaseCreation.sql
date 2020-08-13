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
Title VARCHAR(25) UNIQUE,
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

INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (1, 'Home', 0, 0, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (2, 'Hobbies', 0, 2, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (3, 'About', 0, 1, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (4, 'Mission', 3, 0, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (5, 'Fishing', 2, 0, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (6, 'Crochet', 2, 1, 1);
INSERT INTO WebPages(id, Title, ParentPage, SortOrder, isActive) VALUES (7, 'Piano', 2, 2, 1);

INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (1, 'Welcome Hobbyists', 'Welcome to our website! Here you can find info on hobbies! Look in about for ways to contact us for more hobbies!', 0);
INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (3, 'About Us', 'Thank you very much for coming to our website!', 0);
INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (3, '', 'You can contact us by phone with with 55-HOBBY or email us at HobbyContent@hobby.net', 1);