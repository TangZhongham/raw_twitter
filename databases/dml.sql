-- Author: Zhonghan Tang
-- DML for test Data

USE elon;

-- Sample data population for the user table
INSERT INTO twitter_user (name, birthdate, password, email, month, day, year, description, image) VALUES
('John Doe', '1990-05-15', 'password123', 'john@example.com', 'May', 15, 1990, 'Lorem ipsum dolor sit amet.', NULL),
('Alice Smith', '1985-09-20', 'qwerty', 'alice@example.com', 'September', 20, 1985, 'Consectetur adipiscing elit.', NULL),
('Bob Johnson', '1995-02-10', 'abc123', 'bob@example.com', 'February', 10, 1995, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL),
('Emily Brown', '1992-11-30', 'password456', 'emily@example.com', 'November', 30, 1992, 'Ut enim ad minim veniam.', NULL),
('Michael Wilson', '1988-07-25', 'p@ssw0rd', 'michael@example.com', 'July', 25, 1988, 'Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL);

-- Sample data population for the follow table
INSERT INTO follow (userid, followeduserid, status) VALUES
(1, 2, 'True'),
(1, 3, 'False'),
(2, 3, 'True'),
(3, 1, 'False'),
(4, 5, 'True');

-- Sample data population for the tweets table
INSERT INTO tweets (text, userid) VALUES
('Just had the best coffee ever! ☕', 1),
('Loving the weather today! 🌞', 2),
('Excited for the weekend! 🎉', 3),
('Exploring new places with friends. 🗺️', 4),
('Movie night with family! 🎥', 5),
('Can''t wait for the next adventure! 🌄', 1),
('Feeling productive today. 💪', 2),
('Trying out a new recipe for dinner. 🍽️', 3),
('Relaxing at home after a long day. 🛋️', 4),
('Counting down the days until vacation! 🏖️', 5),
('Thinking about my goals for the week. 📝', 1),
('Reflecting on the past year. 🕰️', 2),
('Enjoying a quiet moment of solitude. 🌿', 3),
('Dreaming of future travels. ✈️', 4),
('Grateful for the little things in life. 🙏', 5);

-- Sample data population for the likes table
INSERT INTO likes (userid, tweetid, status) VALUES
(1, 1, 'True'),
(1, 2, 'False'),
(2, 3, 'True'),
(3, 1, 'False'),
(4, 2, 'True');
