CREATE DATABASE newspaper_db;

USE newspaper_db;

DROP TABLE IF EXISTS Article_Content, Article_Tags, Comments, Tags, Users;

CREATE TABLE Article_Content (
  article_ID INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_ID INT(10),
  comments_ID INT(10),
  news_title VARCHAR(255),
  news_timestamp TIMESTAMP,
  image_url VARCHAR(255),
  news_body LONGTEXT,
  status VARCHAR(255),
  deleted BOOLEAN,
  delete_date TIMESTAMP,
  FOREIGN KEY (user_ID) REFERENCES Users(User_ID),
  FOREIGN KEY (comments_ID) REFERENCES Comments(comment_ID)
);


CREATE TABLE Article_Tags (
  tag_ID INT(10) AUTO_INCREMENT,
  article_ID INT(10),
  FOREIGN KEY (tag_ID) REFERENCES Tags(tag_ID),
  FOREIGN KEY (article_ID) REFERENCES Article_Content(article_ID)
);


CREATE TABLE Comments (
  comment_ID INT(10) PRIMARY KEY AUTO_INCREMENT,
  user_ID INT(10),
  article_ID INT(10),
  comment_body LONGTEXT,
  created_at TIMESTAMP,
  status VARCHAR(255),
  FOREIGN KEY (user_ID) REFERENCES Users(User_ID),
  FOREIGN KEY (article_ID) REFERENCES Article_Content(article_ID)
);


CREATE TABLE Tags (
  tag_ID INT(10) PRIMARY KEY NOT NULL,
  tag_name VARCHAR(255)
);


CREATE TABLE Users (
  User_ID INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  username VARCHAR(30) UNIQUE,
  hashed_password VARCHAR(255),
  salt VARCHAR(255),
  user_FN VARCHAR(255),
  user_LN VARCHAR(255),
  user_email VARCHAR(50) UNIQUE,
  user_role VARCHAR(255),
  deleted BOOLEAN,
  delete_date TIMESTAMP
);
