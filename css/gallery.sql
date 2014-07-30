-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2013 at 02:51 AM
-- Server version: 5.6.14
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` text,
  `username` varchar(40) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `photo_id`, `user_id`, `date_start`, `comments`, `username`) VALUES
(1, 19, 20, '2013-12-10 22:49:35', 'hahahhaha', 'Panda'),
(2, 19, 20, '2013-12-10 22:49:57', 'hahahhaha', 'Panda'),
(3, 19, 21, '2013-12-10 23:49:58', 'dsadas', 'guanhua'),
(4, 19, 21, '2013-12-10 23:50:03', 'dsadsa', 'guanhua'),
(5, 19, 21, '2013-12-10 23:50:14', 'woca le', 'guanhua'),
(6, 19, 21, '2013-12-10 23:50:24', 'woca le', 'guanhua'),
(7, 19, 21, '2013-12-10 23:51:25', 'vbgjn', 'guanhua'),
(8, 19, 21, '2013-12-10 23:51:31', '', 'guanhua'),
(9, 19, 21, '2013-12-10 23:55:24', 'dsadas', 'guanhua'),
(10, 19, 21, '2013-12-10 23:55:31', 'tttt', 'guanhua'),
(11, 20, 21, '2013-12-10 23:55:52', 'huhuhu', 'guanhua'),
(12, 20, 21, '2013-12-11 00:03:10', 'ggg', 'guanhua'),
(13, 20, 21, '2013-12-11 00:03:14', '', 'guanhua'),
(14, 20, 21, '2013-12-11 00:04:06', '', 'guanhua'),
(15, 20, 21, '2013-12-11 00:04:18', '', 'guanhua'),
(16, 20, 21, '2013-12-11 00:04:54', 'ddd', 'guanhua'),
(17, 20, 21, '2013-12-11 00:05:04', 'eee', 'guanhua'),
(18, 18, 21, '2013-12-11 00:23:36', 'ddd', 'guanhua'),
(19, 20, 21, '2013-12-11 01:26:32', 'dasdas', 'guanhua'),
(20, 20, 21, '2013-12-11 01:26:38', 'ppppp', 'guanhua'),
(21, 23, 21, '2013-12-11 01:29:45', '99999', 'guanhua'),
(22, 22, 21, '2013-12-11 04:09:54', 'Fantasitic!!', 'guanhua'),
(23, 34, 21, '2013-12-11 05:59:57', 'Nice Bokeh!!! Good job. Lol.', 'guanhua'),
(24, 45, 23, '2013-12-11 06:03:05', 'Nice one!', 'xinyu'),
(25, 39, 23, '2013-12-11 06:03:26', 'Where is it?\r\n', 'xinyu'),
(26, 45, 21, '2013-12-11 17:43:59', 'dasdsa', 'guanhua'),
(27, 35, 21, '2013-12-11 19:20:05', 'comment', 'guanhua'),
(28, 36, 21, '2013-12-11 19:35:55', 'dsa', 'guanhua'),
(29, 36, 21, '2013-12-11 19:36:00', 'dsad', 'guanhua'),
(30, 42, 21, '2013-12-11 19:44:09', 'dsadas', 'guanhua'),
(31, 38, 21, '2013-12-11 19:44:41', 'dsadas', 'guanhua'),
(32, 33, 21, '2013-12-11 19:45:10', 'dasdsaas', 'guanhua'),
(33, 45, 21, '2013-12-11 19:46:36', 'dsada', 'guanhua'),
(34, 43, 21, '2013-12-11 19:50:07', 'we comment', 'guanhua'),
(35, 38, 21, '2013-12-11 19:55:29', 'long exposure', 'guanhua'),
(36, 45, 21, '2013-12-11 20:07:16', 'dsadsa', 'guanhua'),
(37, 34, 21, '2013-12-11 20:11:20', 'dsadas', 'guanhua'),
(38, 34, 21, '2013-12-11 20:11:44', 'dsadas', 'guanhua'),
(39, 41, 21, '2013-12-11 20:12:26', 'a pple', 'guanhua'),
(40, 41, 21, '2013-12-11 20:12:36', 'good job', 'guanhua'),
(41, 34, 21, '2013-12-11 20:12:49', 'awesome', 'guanhua'),
(42, 34, 21, '2013-12-11 20:13:04', '''''''', 'guanhua'),
(43, 47, 24, '2013-12-11 21:37:54', 'vivid!!', 'boss'),
(44, 44, 25, '2013-12-11 21:39:19', 'Nice', 'teddy'),
(45, 39, 21, '2013-12-11 23:22:39', 'Japan ', 'guanhua'),
(46, 48, 26, '2013-12-12 00:19:46', 'wow', 'james'),
(47, 39, 21, '2013-12-12 01:47:55', 'test', 'guanhua'),
(48, 39, 21, '2013-12-12 01:56:25', '<script language = "JavaScript">alert("test");</script>', 'guanhua'),
(49, 39, 21, '2013-12-12 01:57:34', '<script language="JavaScript">location.replace("http://www.foxnews.com");</script>', 'guanhua');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mail` text NOT NULL,
  `subject` text NOT NULL,
  PRIMARY KEY (`email_id`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `sender`, `receiver`, `send_date`, `mail`, `subject`) VALUES
(2, 6, 21, '2013-12-11 04:49:43', 'We got a panda show!', 'Hello'),
(3, 21, 6, '2013-12-11 05:36:32', 'dsads', 'dsada'),
(4, 21, 6, '2013-12-11 05:36:43', 'dsada', 'dsad'),
(5, 21, 6, '2013-12-11 05:38:50', 'Hey. Shall we hang out tomorrow?\r\n\r\nLove\r\nJacob', 'Treat you a dinner'),
(6, 23, 21, '2013-12-11 06:06:35', 'Hey, are you available tomorrow. I got two movie tickets for 47 romans.', 'Hi   '),
(8, 25, 21, '2013-12-11 15:14:40', 'Please help me with php!!!!', 'help'),
(10, 24, 21, '2013-12-11 15:28:47', 'Hey, dude. Long time no see. Heard you have done well on your project, keep going.', 'Nice Work on CS 546'),
(11, 21, 6, '2013-12-12 01:44:47', 'dsadsadsa', 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photoname` varchar(200) NOT NULL,
  `description` text,
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `location` text,
  `album_id` int(11) DEFAULT NULL,
  `visibility` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `date_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`photo_id`),
  KEY `album_id` (`album_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `photoname`, `description`, `user_id`, `username`, `location`, `album_id`, `visibility`, `link`, `date_upload`) VALUES
(33, 'sample1', '', 21, 'guanhua', '', 5, 0, 'profilepho/1.jpg', '2013-12-11 05:47:57'),
(34, 'sample2', '', 21, 'guanhua', '', 5, 0, 'profilepho/2.jpg', '2013-12-11 05:49:07'),
(35, 'sample3', '', 21, 'guanhua', '', 5, 0, 'profilepho/3.jpg', '2013-12-11 05:49:26'),
(36, 'sample4', '', 21, 'guanhua', '', 5, 0, 'profilepho/4.jpg', '2013-12-11 05:49:43'),
(37, 'sample5', '', 21, 'guanhua', '', 5, 0, 'profilepho/5.jpg', '2013-12-11 05:50:04'),
(38, 'sample6', '', 21, 'guanhua', '', 5, 0, 'profilepho/6.jpg', '2013-12-11 05:50:21'),
(39, 'sample7', '', 21, 'guanhua', '', 5, 0, 'profilepho/7.jpg', '2013-12-11 05:50:43'),
(40, 'sample8', '', 21, 'guanhua', '', 4, 0, 'profilepho/8.jpg', '2013-12-11 05:50:58'),
(41, 'sample9', '', 21, 'guanhua', '', 2, 1, 'profilepho/9.jpg', '2013-12-11 05:51:15'),
(42, 'bottles', '', 21, 'guanhua', '', 6, 1, 'profilepho/11352.jpg', '2013-12-11 05:51:50'),
(43, 'Fararri', 'cool sports car', 21, 'guanhua', '', 7, 1, 'profilepho/11258.jpg', '2013-12-11 05:52:15'),
(44, 'roma', '', 21, 'guanhua', '', 5, 0, 'profilepho/11348.jpg', '2013-12-11 05:52:33'),
(45, 'candy', 'cute candies', 23, 'xinyu', '', 7, 0, 'profilepho/11422.jpg', '2013-12-11 06:02:29'),
(46, 'car', '', 21, 'guanhua', '', 3, 2, 'profilepho/11258.jpg', '2013-12-11 15:42:09'),
(47, 'idk', '', 24, 'boss', '', 7, 0, 'profilepho/9638.jpg', '2013-12-11 21:37:24'),
(48, 'hahah', '', 25, 'teddy', '', 9, 0, 'profilepho/9656.jpg', '2013-12-11 21:38:57'),
(49, '90', 'idk', 26, 'james', 'NJ', 5, 0, 'profilepho/7282.jpg', '2013-12-12 00:17:29'),
(50, '1', '1', 27, 'lll', '1', 1, 0, 'profilepho/album1.php', '2013-12-12 00:35:43'),
(53, 'sample', '111', 31, 'batman', '11', 1, 0, 'profilepho/lab.php', '2013-12-12 01:42:01'),
(54, 'sda', 'sda', 31, 'batman', 'dsa', 1, 1, 'profilepho/11352.jpg', '2013-12-12 01:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `follower` int(11) NOT NULL,
  `followee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`follower`, `followee`) VALUES
(21, 23),
(21, 25),
(26, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_init` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `whats_up` text,
  `prolink` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `date_init`, `email`, `gender`, `whats_up`, `prolink`) VALUES
(6, 'windy', '5402c2b5bda993d182097403d38df187', '2013-11-16 17:02:42', 'windy@keyman.com', NULL, NULL, ''),
(9, 'ron', '310dcbbf4cce62f762a2aaa148d556bd', '2013-11-16 17:15:56', 'ron@well.com', '', 'Hi everybody! I am ron!', ''),
(10, 'yang', '698d51a19d8a121ce581499d7b701668', '2013-11-16 17:25:22', 'yang@radiant.com', NULL, NULL, ''),
(11, 'mandy', '698d51a19d8a121ce581499d7b701668', '2013-11-16 17:30:44', 'm@aww.cn', NULL, NULL, ''),
(12, 'william', '698d51a19d8a121ce581499d7b701668', '2013-11-16 17:31:12', 'bill@gates.com', NULL, NULL, ''),
(13, 'Tome', '698d51a19d8a121ce581499d7b701668', '2013-11-16 17:53:41', 'tomcat@tom.com', NULL, NULL, ''),
(14, 'kk', '6512bd43d9caa6e02c990b0a82652dca', '2013-11-16 18:01:27', '2222', NULL, NULL, ''),
(15, 'Liu', '698d51a19d8a121ce581499d7b701668', '2013-11-16 18:07:27', 'siyuL@shabi.com', NULL, NULL, ''),
(16, 'erhu', 'bcbe3365e6ac95ea2c0343a2395834dd', '2013-11-17 04:45:29', 'erhu@gmail.com', '', 'erhu is erhuo', ''),
(17, 'pp', '6512bd43d9caa6e02c990b0a82652dca', '2013-11-19 15:55:32', 'fghjon@wlo.com', NULL, NULL, ''),
(18, 'NEW BEE', 'b2ca678b4c936f905fb82f2733f5297f', '2013-12-06 15:18:22', 'asd@qq.com', '', 'dsadasd', ''),
(19, 'daxinzi', '202cb962ac59075b964b07152d234b70', '2013-12-07 05:37:29', 'panda@erhu.com', '', '', ''),
(20, 'dsad', 'c6f057b86584942e415435ffb1fa93d4', '2013-12-08 04:51:51', '1@3.com', 'female', NULL, ''),
(21, 'guanhua', '7815696ecbf1c96e6894b779456d330e', '2013-12-10 03:56:32', 'guanhua@fgh.com', '', 'I am admin', 'profilepho/11348.jpg'),
(22, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2013-12-11 01:18:32', 'a@w.com', NULL, NULL, ''),
(23, 'xinyu', '47bce5c74f589f4867dbd57e9ca9f808', '2013-12-11 06:01:29', 'a@erhu.com', 'female', 'Went to the zoo yesterday. cool', 'profilepho/9638.jpg'),
(24, 'boss', 'ceb8447cc4ab78d2ec34cd9f11e4bed2', '2013-12-11 15:11:39', 'bs@do.com', 'male', 'Try another way of seeing things', 'profilepho/7282.jpg'),
(25, 'teddy', '962b2d2b8e72dc6771bca613d49b46fb', '2013-12-11 15:12:10', 'td@well.com', NULL, 'Why can''t I take long exposure picture?', 'profilepho/7407.jpg'),
(26, 'james', 'b4cc344d25a2efe540adbf2678e2304c', '2013-12-12 00:15:39', 'james@aol.com', '', 'hey', 'profilepho/11352.jpg'),
(27, 'lll', '698d51a19d8a121ce581499d7b701668', '2013-12-12 00:34:29', '111@m.com', '', '4 score and 7 years ago', NULL),
(28, '<h1>dydsb</h1>', 'af749571fe55caf54d8b78b298703d10', '2013-12-12 00:57:10', '1@1.com', '', '<h1>dyxjj</h1>', NULL),
(29, '<h1>1</h1>', 'ae2622b434dae839632c2fed5a4ab041', '2013-12-12 00:58:21', '2@2.com', '', '<h1>1</h1>1', NULL),
(30, '<script>a</script>', 'c4ca4238a0b923820dcc509a6f75849b', '2013-12-12 01:09:48', '121@sas.com', 'female', NULL, NULL),
(31, 'batman', '698d51a19d8a121ce581499d7b701668', '2013-12-12 01:41:06', '11@1.com', '', 'l t l b', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
