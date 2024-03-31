-- Author: Zhonghan Tang
CREATE DATABASE IF NOT EXISTS elon;

USE elon;

CREATE TABLE IF NOT EXISTS twitter_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    birthdate DATE,
    password VARCHAR(255), -- Assuming passwords will be stored as plaintext for this example
    email VARCHAR(255)  NULL, -- New column added
    month VARCHAR(255)  NULL, -- New column added
    day INT  NULL, -- New column added
    year INT  NULL, -- New column added
    description VARCHAR(255) NULL, -- New column added
    image BLOB -- Adjust size as needed based on the maximum size of your images
);

CREATE TABLE IF NOT EXISTS follow (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    followeduserid INT,
    status ENUM('True', 'False'),
    FOREIGN KEY (userid) REFERENCES twitter_user(id),
    FOREIGN KEY (followeduserid) REFERENCES twitter_user(id)
);

CREATE TABLE IF NOT EXISTS tweets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT,
    userid INT,
    FOREIGN KEY (userid) REFERENCES twitter_user(id)
);

CREATE TABLE IF NOT EXISTS likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    tweetid INT,
    status ENUM('True', 'False'),
    FOREIGN KEY (userid) REFERENCES twitter_user(id),
    FOREIGN KEY (tweetid) REFERENCES tweets(id)
);

