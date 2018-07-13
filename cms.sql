-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 juil. 2018 à 12:02
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JavaScript'),
(11, 'php'),
(12, 'phyton');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 6, 'hicham', 'hicham@hicham.com', 'hi i m working to my dream', 'approved', '2018-05-19'),
(5, 6, 'khalid', 'khalid@gmail.com', 'i m very happy to see you', 'approved', '2018-05-19'),
(7, 7, 'khalid', 'hicham@hicham.com', 'hhhhh kenitra', 'approved', '2018-05-19'),
(8, 7, 'ahmed', 'ahmed@gmail.com', 'hhhhhhhh very coool', 'approved', '2018-05-19');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_autor` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL,
  `count_view_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_autor`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`, `count_view_post`) VALUES
(6, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hamza', '', '2018-05-26', 'image1.jpg', '<p><strong>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</strong><br /><br /><br /><br /><br /><br /><br /><br /></p>     ', 'hicham,php', 4, 'draft', 0, 27),
(7, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-24', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', 'hicham,php', 4, 'draft', 0, 2),
(8, 1, 'Contrairement Ã  une opinion rÃ©pandue', '', 'malaki', '2018-06-05', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n              ', 'hicham,php', 4, 'draft', 0, 0),
(9, 1, 'Contrairement Ã  une opinion rÃ©pandue', '', 'hichamit', '2018-06-05', 'image2.jpg', ' bonjour tout le monde', 'html,ajax', 4, 'draft', 0, 0),
(10, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-26', 'image3.jpg', '', '', 0, 'draft', 0, 1),
(11, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-05-26', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 0, 'draft', 0, 1),
(12, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-26', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', '', 0, 'draft', 0, 0),
(13, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-05-26', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 0, 'draft', 0, 0),
(14, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-26', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', 'hicham,php', 0, 'draft', 0, 0),
(15, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-26', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', 'hicham,php', 0, 'draft', 0, 1),
(16, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-05-26', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 0, 'draft', 0, 1),
(17, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-05-26', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', '', 0, 'draft', 0, 0),
(18, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-05-26', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 0, 'draft', 0, 0),
(19, 1, 'Contrairement Ã  une opinion rÃ©pandue', '', 'hichamit', '2018-06-04', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n              ', 'php,html', 4, 'draft', 0, 0),
(20, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 0, 'draft', 0, 0),
(21, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 0, 'draft', 0, 0),
(22, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-06-01', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', '', 0, 'draft', 0, 0),
(23, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 0, 'draft', 0, 0),
(24, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-06-01', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', 'hicham,php', 0, 'draft', 0, 0),
(25, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', '', '2018-06-01', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n           ', 'hicham,php', 0, 'draft', 0, 0),
(26, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 0, 'published', 0, 20),
(27, 2, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', 'malaki', '2018-06-05', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 4, 'published', 0, 0),
(28, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', '', 0, 'published', 0, 1),
(30, 11, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', 'malaki', '2018-06-07', 'image2.jpg', '   ', 'html,ajax', 4, 'published', 0, 0),
(31, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'ayoub', '', '2018-06-01', 'image2.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 0, 'published', 0, 2),
(32, 1, 'Contrairement Ã  une opinion rÃ©pandue', 'hicham', 'malaki', '2018-06-04', 'image3.jpg', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />\r\n             ', 'hicham,php', 4, 'published', 0, 0),
(33, 1, 'Contrairement Ã  une opinion rÃ©pandue', '', 'hichamit', '2018-06-04', 'image1.jpg', '<p><strong>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</strong><br /><br /><br /><br /><br /><br /><br /><br /></p>      ', 'hicham,php', 4, 'published', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(15, 'hichamit', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'hicham', 'el khaldi', 'hicham@hicham.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(19, 'malaki', '$2y$12$Qs7VFFexSDU6nZYuxqXfA.qQaQXGq6.dFoEWRAemeMvQgT9RaMEEq', 'malak', 'malak', 'malaki@malak', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Structure de la table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `time`) VALUES
(1, 'an0emogqvh25ktogv8ao18uqi4', 1528121399),
(2, 'iode7o2n0dmqt6r8tuo6c1lj27', 1528121145);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
