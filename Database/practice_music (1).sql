-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 07:13 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `idalbum` int NOT NULL,
  `totalsongs` int DEFAULT NULL,
  `album_name` varchar(100) DEFAULT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`idalbum`, `totalsongs`, `album_name`, `link`) VALUES
(1, 5, 'pop', 'albums.php?album=pop'),
(2, 3, 'Rock', 'albums.php?album=Rock'),
(3, 2, 'Punjabi', 'albums.php?album=Punjabi'),
(4, 2, 'Divine', 'albums.php?album=Divine'),
(5, 3, 'Vilen', 'albums.php?album=Vilen');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_songs` int DEFAULT NULL,
  `no_albums` int DEFAULT NULL,
  `most_played` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_name`, `no_songs`, `no_albums`, `most_played`) VALUES
('Eminem', 2, 1, NULL),
('Divine', 3, 2, NULL),
('Martin Garix', 2, 2, NULL),
('Rosalia', 2, 2, NULL),
('Rihanna', 1, 1, NULL),
('Elish', 1, 1, NULL),
('Sukhvinder Singh', 1, 1, NULL),
('Ap Dhillon', 1, 1, NULL),
('Vilen', 2, 1, NULL),
('Arijit Singh', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `genre_name` varchar(255) NOT NULL,
  `genre_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`, `genre_link`) VALUES
(1, 'instrumental', 'genres.php?genre=instrumental'),
(2, 'Hindi', 'genres.php?genre=Hindi'),
(3, 'English', 'genre.php?genre=English'),
(4, 'Romantic', 'genre.php?genre=Romantic'),
(5, 'Rap', 'genres.php?genre=Rap');

-- --------------------------------------------------------

--
-- Table structure for table `media_playlist`
--

CREATE TABLE `media_playlist` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media_playlist`
--

INSERT INTO `media_playlist` (`id`, `name`) VALUES
(1, 'test'),
(2, 'test'),
(3, 'test1'),
(4, 'test1'),
(5, 'test2'),
(6, 'test3');

-- --------------------------------------------------------

--
-- Table structure for table `media_playlist_files`
--

CREATE TABLE `media_playlist_files` (
  `media` int NOT NULL,
  `playlist` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media_playlist_files`
--

INSERT INTO `media_playlist_files` (`media`, `playlist`) VALUES
(1, 3),
(2, 3),
(3, 3),
(3, 5),
(3, 6),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `course_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` int NOT NULL,
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `course_name`, `status`, `amount`, `order_date`) VALUES
('ORDS12110024', NULL, 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 10:42:35.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS15055781', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:15:21.0'),
('ORDS72719284', 'test', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:38:39.0'),
('ORDS72719284', '', 'Basic', 'TXN_SUCCESS', 129, '2021-04-23 11:38:39.0');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `cover_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `title`, `description`, `cover_image`) VALUES
(3, 2, 'My Playlist', 'Sample', '1605833940_h1.jpg'),
(24, 1, 'Jyot', 'this is the description', 'C:\\fakepath\\logoblog.PNG'),
(37, 1, 'Jyot3', 'this is the description', 'https://images.pexels.com/photos/838702/pexels-photo-838702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'),
(38, 2, 'mysongs', 'fav songs', 'https://images.pexels.com/photos/838702/pexels-photo-838702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_items`
--

CREATE TABLE `playlist_items` (
  `id` int NOT NULL,
  `playlist_id` int NOT NULL,
  `music_id` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist_items`
--

INSERT INTO `playlist_items` (`id`, `playlist_id`, `music_id`, `date_created`) VALUES
(1, 6, 105339, '2020-11-20 08:52:51'),
(2, 2, 105340, '2020-11-20 08:58:44'),
(3, 3, 105341, '2020-11-20 08:59:46'),
(4, 3, 105342, '2020-11-20 08:59:46'),
(5, 15, 105343, '2021-04-22 08:14:35'),
(6, 15, 105344, '2021-04-22 08:15:07'),
(7, 15, 105345, '2021-04-22 08:15:22'),
(8, 24, 105344, '2021-04-22 08:15:42'),
(9, 37, 105346, '2021-04-22 08:16:05'),
(10, 37, 105347, '2021-04-22 08:16:28'),
(11, 24, 105328, '2021-04-22 10:27:12'),
(15, 24, 105339, '2021-04-22 10:38:58'),
(17, 24, 105341, '2021-04-22 11:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `premiumplans`
--

CREATE TABLE `premiumplans` (
  `id` int NOT NULL,
  `name` varchar(11) NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `premiumplans`
--

INSERT INTO `premiumplans` (`id`, `name`, `amount`) VALUES
(1, 'Basic', 129),
(2, 'Standard', 299),
(3, 'Advanced', 599);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `mobile`, `password`, `cpassword`, `avatar`) VALUES
(1, 'test', 'test@test.com', '9429064588', 'test', 'test', 'avatar/1619284251.png'),
(2, 'test2', 'test@admin.com', '9429064588', 'test2', 'test2', 'avatar/1618923479.png'),
(3, 'jyot', 'jyot@test.com', '9489681111', 'jyot', 'jyot', 'avatar/1618216627.png');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `idsongs` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `singer` varchar(45) NOT NULL,
  `noplayed` varchar(45) NOT NULL,
  `song` varchar(100) NOT NULL,
  `album` varchar(45) NOT NULL,
  `path` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`idsongs`, `title`, `genre`, `singer`, `noplayed`, `song`, `album`, `path`, `link`) VALUES
(105328, 'Godzilla', 'instrumental', 'Eminem', '1', 'song20', 'pop', 'songs/song20.mp3', 'songs.php?id=105328'),
(105339, 'Heartache', 'instrumental', 'Divine', '0', 'song1', 'Rock', 'songs/song1.mp3', 'songs.php?id=105339'),
(105341, 'Savanna', 'instrumental', 'Martin Garix', '0', 'song3', 'Rock', 'songs/song3.mp3', 'songs.php?id=105341'),
(105342, 'HeartBreak', 'instrumental', 'Rosalia', '0', 'song4', 'Rock', 'songs/song4.mp3', 'songs.php?id=105342'),
(105343, 'Love The Way You Lie', 'English', 'Rihanna', '0', 'song13', 'pop', 'songs/song13.mp3', 'songs.php?id=105343'),
(105344, 'Lovely', 'English', 'Elish', '0', 'song12', 'pop', 'songs/song12.mp3', 'songs.php?id=105344'),
(105345, 'Ramto Jogi', 'Hindi', 'Sukhvinder Singh', '0', 'song8', 'Punjabi', 'songs/song8.mp3', 'songs.php?id=105345'),
(105346, 'Brown Mude', 'Hindi', 'Ap Dhillon', '0', 'song23', 'Punjabi', 'songs/song23.mp3', 'songs.php?id=105346'),
(105347, '359 AM', 'Rap', 'Divine', '0', 'song5', 'Divine', 'songs/song5.mp3', 'songs.php?id=105347'),
(105348, 'Not Afraid', 'English', 'Eminem', '0', 'song9', 'pop', 'songs/song9.mp3', 'songs.php?id=105348'),
(105349, 'TKN', 'English', 'Rosalia', '0', 'song7', 'pop', 'songs/song7.mp3', 'songs.php?id=105349'),
(105350, 'Chester', 'English', 'Divine', '0', 'song22', 'Divine', 'songs/song7.mp3', 'songs.php?id=105350'),
(105351, 'Animals', 'instrumental', 'Martin Garix', '0', 'song10', 'Metal', 'songs/song10.mp3', 'songs.php?id=105351'),
(105352, 'Chidya', 'Romantic', 'Vilen', '0', 'song11', 'Vilen', 'songs/song11.mp3', 'songs.php?id=105352'),
(105353, 'Rabta', 'Romantic', 'Arijit Singh', '0', 'song14', 'Vilen', 'songs/song14.mp3', 'songs.php?id=105353'),
(105354, 'Ek Raat', 'Romantic', 'Vilen', '0', 'song15', 'Vilen', 'songs/song15.mp3', 'songs.php?id=105354');

-- --------------------------------------------------------

--
-- Table structure for table `sung_by`
--

CREATE TABLE `sung_by` (
  `idsongs` int NOT NULL,
  `song_name` varchar(45) NOT NULL,
  `artist` varchar(45) NOT NULL,
  `album` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sung_by`
--

INSERT INTO `sung_by` (`idsongs`, `song_name`, `artist`, `album`) VALUES
(105347, '359 AM', 'Divine', 'Divine'),
(105351, 'Animals', 'Martin Garix', 'Metal'),
(105346, 'Brown Mude', 'Ap Dhillon', 'Punjabi'),
(105350, 'chester', 'Divine', 'Divine'),
(105352, 'Chidya', 'Vilen', 'Vilen'),
(105354, 'Ek Raat', 'Vilen', 'Vilen'),
(105328, 'Godzilla', 'Eminem', 'pop'),
(105339, 'Heartache', 'Divine', 'Rock'),
(105342, 'HeartBreak', 'Rosalia', 'Rock'),
(105343, 'Love The Way You Lie', 'Rihanna & Eminem', 'pop'),
(105344, 'Lovely', 'Elish', 'pop'),
(105348, 'Not Afraid', 'Eminem', 'pop'),
(105353, 'Rabta', 'Arijit Singh', 'Vilen'),
(105345, 'Ramto Jogi', 'Sukhvinder Singh', 'Punjabi'),
(105341, 'Savanna', 'Martin Garix', 'Rock'),
(105349, 'TKN', 'Rosalia', 'pop');

-- --------------------------------------------------------

--
-- Table structure for table `userinfodata`
--

CREATE TABLE `userinfodata` (
  `id` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userinfodata`
--

INSERT INTO `userinfodata` (`id`, `user`, `email`, `mobile`, `password`) VALUES
(1, 'test', 'jyotsoni0053@gmail.com', '+919429064588', '123'),
(11, 'jyot', 'jyotsoni0053@gmail.com', '+919429064588', '456'),
(12, 'test', 'jyotsoni0053@gmail.com', '+919429064588', 'adaf'),
(13, 'test', 'jyotsoni0053@gmail.com', '+919429064588', '124');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`idalbum`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `media_playlist`
--
ALTER TABLE `media_playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_items`
--
ALTER TABLE `playlist_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premiumplans`
--
ALTER TABLE `premiumplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`idsongs`);

--
-- Indexes for table `sung_by`
--
ALTER TABLE `sung_by`
  ADD PRIMARY KEY (`song_name`);

--
-- Indexes for table `userinfodata`
--
ALTER TABLE `userinfodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `idalbum` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media_playlist`
--
ALTER TABLE `media_playlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `playlist_items`
--
ALTER TABLE `playlist_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `premiumplans`
--
ALTER TABLE `premiumplans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `idsongs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105355;

--
-- AUTO_INCREMENT for table `userinfodata`
--
ALTER TABLE `userinfodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
