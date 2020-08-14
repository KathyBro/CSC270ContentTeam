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
--0 is false, 1 is true;

CREATE TABLE IF NOT EXISTS ContentTable(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ParentPageId INT,
Header VARCHAR(25),
Content VARCHAR(225),
SortOrder INT
);

--Sample Data;

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

INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (4, 'Our Mission', 'Our mission is to be able to expand the knowledge of  hobbies and to get a good grade with this assignment. You can change your mission at any time. Maybe our mission is to just only say that hobbies exist.', 0);


INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (4, 'Our Mission', 'Our mission is to be able to expand the knowledge of  hobbies and to get a good grade with this assignment. You can change your mission at any time. Maybe our mission is to just only say that hobbies exist.', 0);


INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (6, 'Description', 'Crocheting is similar to knitting and is often confused from it. However, there are key differences. Crocheting requires only having one hook being used. There are different types of hooks because there are different types of yarn.', 0);


INSERT INTO ContentTable (ParentPageId, Header, Content, SortOrder) VALUES (6, 'Item List', 'Yarn, crochet hook, and probably two hands', 0);

INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (7, "Play Piano", "Want to find a hobby that is relaxing and fun? Try learning your favoirte song on piano!", 0);
INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (7, "What you'll need", "You'll need a piano of course! You can look online to purchase one and depending on what kind of piano you want it will determine the cost", 0);
INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (7, "Music Sheets & Tutorials", "Next you'll need to find a song you want to learn on piano, you can buy music sheets or you can look up piano tutorials online for free", 0);

VALUES (5, "Fishing Is Fun", "Fishing is a fun activity for the whole family! It's as easy has casting out a line and kicking back into a lawn chair. The only thing to worry about is bad weather and snags!", 0);
INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (5, "Getting Started", "First, you have to know what you're trying to catch. Different areas require different rigs. A lake pole will snap if you use it in the ocean! And a catfish pole will make catching trout a no fun sport.", 0);
INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (5, "Bait & Tackle", "Tackle is the same way, bait and lures should be selected for the fish you're aiming for: Bass love shiny lures that look like real fish, Trout bite on shiny spoons, and catfish love the stench of bait!", 0);
INSERT INTO contenttable (`ParentPageId`,`Header`,`Content`,`SortOrder`) 
VALUES (5, "", "Remember to find an appropriate tackle setup that is weighted correclty for your pole, reel, line, hooks, weights, and baits. Remember: a Bad setup will cost you money, time, and most importantly: Fish!", 0);