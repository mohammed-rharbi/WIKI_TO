
CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) 


INSERT INTO `categories` (`CategoryID`, `Name`, `created_at`) VALUES
(1, 'Technology', '2024-01-08 13:29:52'),
(2, 'Science', '2024-01-08 13:29:52'),
(3, 'History', '2024-01-08 13:29:52');


CREATE TABLE `tag` (
  `tagID` int(11) NOT NULL,
  `tagName` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;


INSERT INTO `tag` (`tagID`, `tagName`, `created_at`) VALUES
(1, 'Programming', '2024-01-08 13:29:52'),
(2, 'Biology', '2024-01-08 13:29:52'),
(3, 'Ancient Civilizations', '2024-01-08 13:29:52');


CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','author') DEFAULT 'author',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);



INSERT INTO `users` (`userID`, `userName`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'John Doe', 'john@example.com', 'password123', 'admin', '2024-01-08 13:29:52'),
(2, 'Alice Smith', 'alice@example.com', 'pass456', 'author', '2024-01-08 13:29:52'),
(3, 'Bob Johnson', 'bob@example.com', 'secret789', 'author', '2024-01-08 13:29:52');



CREATE TABLE `wikis` (
  `wikiID` int(11) NOT NULL,
  `wiki_Title` varchar(100) DEFAULT NULL,
  `wiki_content` text DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);



INSERT INTO `wikis` (`wikiID`, `wiki_Title`, `wiki_content`, `author`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Python', 'A beginner-friendly guide to Python programming.', 2, 1, '2024-01-08 13:29:52', '2024-01-08 13:29:52'),
(2, 'Evolutionary Theory', 'Exploring the mechanisms behind evolutionary processes.', 3, 2, '2024-01-08 13:29:52', '2024-01-08 13:29:52'),
(3, 'Ancient Egypt', 'A brief overview of Ancient Egyptian civilization.', 3, 3, '2024-01-08 13:29:52', '2024-01-08 13:29:52');



CREATE TABLE `wikitags` (
  `WikiID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
);


INSERT INTO `wikitags` (`WikiID`, `TagID`) VALUES
(1, 1),
(2, 2),
(3, 3);

