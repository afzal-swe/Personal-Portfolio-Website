-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2024 at 09:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_Description` text COLLATE utf8mb4_unicode_ci,
  `logn_Description` text COLLATE utf8mb4_unicode_ci,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `short_title`, `short_Description`, `logn_Description`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'I\'m A Backend Web Developer.', 'Hi, This is Md.Afzal Hossen As a Laravel Developer Expert Providing Quality Backend Working. Have been Working up to 2.5 years experience.', 'I love to work place & Backend Web Developing. Because I love to solve the Backend problem and find easy and better solutions to solve it. I always try my best to make good user site with the best user experience. I have been working as a Backend Web Developer.', '<p><strong><strong># Career Objective:</strong></strong></p>\r\n<p>I&rsquo;m looking for a challenging role in a reputable organization to utilize my technical, Laravel Developer for the growth of the organization as well as to enhance my knowledge about new and emerging trends in the IT Sector.</p>\r\n<p><strong># Career Summary:</strong></p>\r\n<p>I have been a working Web Developer for over two years +. I achieved in hand working experience in Laravel, REST API, Project Testing. Theme Development. I have also knowledge of JavaScript &amp; PHP.</p>\r\n<p><strong> # Special Qualification:</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>-&gt; Create Dynamic website in Laravel MVC Pattern.</li>\r\n<li>-&gt; Create Rest API for front-end.</li>\r\n<li>-&gt; Create Database of a project using eloquent query.</li>\r\n<li>-&gt; Find Bugs of projects and the way of solution.</li>\r\n<li>-&gt; API Support for Front-end Developer.</li>\r\n</ul>\r\n<p><strong> # Fields of Skill: </strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>-&gt; Web Developer</li>\r\n<li>-&gt; HTML5 &amp; CSS3</li>\r\n<li>-&gt; Bootstrap</li>\r\n<li>-&gt; SASS</li>\r\n<li>-&gt; JavaScript</li>\r\n<li>-&gt; JavaScript ES6/7</li>\r\n<li>-&gt; Jquery</li>\r\n<li>-&gt; PHP</li>\r\n<li>-&gt; MySql Database</li>\r\n<li>-&gt; Git</li>\r\n<li>-&gt; Github</li>\r\n<li>-&gt; Bitbucket</li>\r\n</ul>\r\n<p><strong># Description: </strong></p>\r\n<p>Hi,</p>\r\n<p>I&rsquo;m Md. Afzal Hossen, a highly motivated and about my Skills, well-qualified Laravel Web Developer with over 2.5 years +. I&rsquo;m very proficient in working with the following technologies.</p>\r\n<p><strong><span style=\"text-decoration: underline; color: #236fa1;\"> Front-end Technologies: -</span></strong> HTML5, CSS3, SASS, Bootstrap, JavaScript, ES6/7.</p>\r\n<p><strong><span style=\"text-decoration: underline; color: #236fa1;\">Backend Technologies: -</span></strong> Laravel (PHP).</p>\r\n<p><span style=\"color: #236fa1;\"><strong><span style=\"text-decoration: underline;\">Database: -</span></strong></span> MySql.</p>\r\n<p><span style=\"color: #236fa1;\"><strong><span style=\"text-decoration: underline;\">Others: -</span></strong></span> cPanel, Git, Github and bitbucket.</p>\r\n<hr />\r\n<p>&nbsp;</p>', 'backend/image/about/66c67f2a094e4.jpg', '2024-08-21 16:15:14', '2024-08-25 13:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `about_multi_images`
--

CREATE TABLE `about_multi_images` (
  `id` bigint UNSIGNED NOT NULL,
  `multi_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_multi_images`
--

INSERT INTO `about_multi_images` (`id`, `multi_image`, `created_at`, `updated_at`) VALUES
(6, 'backend/image/about/multi_image/66c7d1d69ae73.jpg', NULL, NULL),
(7, 'backend/image/about/multi_image/66c7cecb6c058.png', NULL, NULL),
(8, 'backend/image/about/multi_image/66c7c2bf46d82.png', NULL, NULL),
(9, 'backend/image/about/multi_image/66c7c2bf4ff9d.png', NULL, NULL),
(10, 'backend/image/about/multi_image/66c7c2bf5927e.png', NULL, NULL),
(11, 'backend/image/about/multi_image/66c7d773b1a2d.png', NULL, NULL),
(12, 'backend/image/about/multi_image/66c7d7670eaee.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `blog_title`, `blog_slug`, `blog_image`, `blog_tags`, `blog_description`, `status`, `created_at`, `updated_at`) VALUES
(9, '4', 'Computer Networking Basic Course', 'computer-networking-basic-course', 'backend/image/blog/66ca84992248c.jpg', 'Computer,Computer Newtork,Computer Networking,Computer Networking Bangla,Routing,Computer Routing,Vlan, Ospf, Rip,Rip1,Rip2,Dns,Static', 'This Blog come to the youtube channel , This tutorial makeing only for basic computer networking section.\r\nTopic :\r\n-> Basic Networking.\r\n-> Routing System.\r\n-> Bus Topology Configuration.\r\n-> Star Topology Configuration.\r\n-> Ring Topology Configuration.\r\n-> Mesh Topology Configuration.\r\n-> Hybrid Topology Configuration.\r\n-> Route Configuration.\r\n-> Static Routing.\r\n-> Route Rip Version-1 Configuration.\r\n-> Router Rip Version-2 Configuration.\r\n-> OSPF Router Configuration And\r\n-> DNS Configuration.\r\n# Youtube Link : https://youtu.be/cBhMc1UzupA', '1', '2024-08-24 19:10:49', '2024-08-24 19:19:28'),
(10, '4', 'Laravel Basic To Advance Interview Questions', 'laravel-basic-to-advance-interview-questions', 'backend/image/blog/66ca87659c2ee.jpg', 'Laravel,Laravel Interview,Laravel Interview Question,Laravel Basic Question,Laravel Bangla Interview,Interview Question,Bangla Interview Question,Interview Basic Question', 'Laravel Interview Questions Basic to Intermediate\r\nThis guide covers fundamental to intermediate questions and answers to help you prepare for Laravel interviews. Whether you\'re a beginner or have some experience, this section will ensure you have a solid understanding of the core concepts.', '1', '2024-08-24 19:22:45', NULL),
(11, '4', 'Computer Assembly Programming Language Basic Course', 'computer-assembly-programming-language-basic-course', 'backend/image/blog/66ca896d0575a.webp', 'Assembly,Assembly Language,Assembly Programming,Basic Assembly Language, How to assembly language', 'Computer Assembly Programming Language Basic Course, This course you can watching only youtube channel. \r\nI making Assembly Programming Language Basic tutorial play list .\r\nYoutube Link : https://www.youtube.com/@PROGRAMMINGTRUSTBD\r\nCourse Link : https://youtu.be/CiQ9UHhskFw\r\nThank You', '1', '2024-08-24 19:31:25', NULL),
(12, '5', 'Facebook Page', 'facebook-page', 'backend/image/blog/66ca8b8be3422.jpg', 'page,fb,facebook,facebook page,code artist.IT', 'This Page is my working activities .', '1', '2024-08-24 19:40:27', NULL),
(13, '5', 'twitter Page', 'twitter-page', 'backend/image/blog/66ca8d825bad6.jpg', 'asdf', 'asdf', '1', '2024-08-24 19:48:50', NULL),
(14, '4', 'new work', 'new-work', 'backend/image/blog/66ca8da35e2b4.png', 'sadfa', 'asdfsa', '1', '2024-08-24 19:49:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Youtube', 'youtube', '2024-08-24 18:51:39', NULL),
(5, 'Facebook', 'facebook', '2024-08-24 18:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', '01811178307', 'Bangla 1', 'sdafasf', '2024-08-25 14:43:30', NULL),
(2, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', '01811178307', 'Bangla 1', 'safasfa', '2024-08-25 14:46:17', NULL),
(4, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', '01811178307', NULL, 'asdfsa', '2024-08-25 20:09:43', NULL),
(5, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', '01811178307', 'sdafa', 'dsafas', '2024-08-25 20:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `title`, `short_title`, `created_at`, `updated_at`) VALUES
(1, 'Sakil', 'Happy clients feedback', 'We are motivated the satisfaction of our Client. Put your trust us and share about this project  and share my company activities\'.', '2024-08-27 01:42:09', NULL),
(2, 'Partho P', 'Happy clients feedbackK', '# We are motivated the satisfaction of our Client. Put your trust us and share about this project  and share my company activities\'.project name is 1ShotApparel.com', '2024-08-27 01:42:09', '2024-08-27 02:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `home_slide`
--

CREATE TABLE `home_slide` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_slide`
--

INSERT INTO `home_slide` (`id`, `title`, `short_title`, `home_slide`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'Hi, This is Md.Afzal Hossen As a Laravel Developer Expert Providing Quality Backend Working. Have been Working up to 2.5 years experience.', 'backend/image/home_slider/1808027824047734.jpg', 'https://www.youtube.com/@PROGRAMMINGTRUSTBD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_20_072540_create_home_slide_table', 1),
(6, '2024_08_21_211505_create_abouts_table', 2),
(7, '2024_08_22_080755_create_about_multi_image_table', 3),
(8, '2024_08_22_123151_create_social_table', 4),
(9, '2024_08_22_185253_create_seos_table', 5),
(10, '2024_08_22_192122_create_website_settings_table', 6),
(14, '2024_08_23_080033_create_portfolio_table', 7),
(15, '2024_08_23_223429_create_blog_categories_table', 8),
(17, '2024_08_23_234452_create_blogs_table', 9),
(18, '2024_08_25_201456_create_contacts_table', 10),
(19, '2024_08_26_081416_add_to_column_project_portfolio_table', 11),
(20, '2024_08_26_083103_create_progress_bar_table', 12),
(21, '2024_08_26_123629_create_working_processes_table', 13),
(22, '2024_08_27_065144_create_feedback_table', 14),
(23, '2024_08_27_081743_create_partners_table', 15),
(25, '2024_08_27_112239_create_services_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'I\'m A Backend Web Developer.', '<p>I love to work place &amp; Backend Web Developing. Because I love to solve the Backend problem and find easy and better solutions to solve it. I always try my best to make good user site with the best user experience. I have been working as a Backend Web Developer.</p>', '2024-08-27 05:09:27', '2024-08-27 15:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_bar`
--

CREATE TABLE `progress_bar` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_bar`
--

INSERT INTO `progress_bar` (`id`, `name`, `percentage`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Html', '75', 'html', '1', '2024-08-26 04:45:31', NULL),
(3, 'CSS3', '75', 'css3', '1', '2024-08-26 04:59:03', NULL),
(4, 'Bootstrap5', '90', 'bootstrap5', '1', '2024-08-26 04:59:44', NULL),
(5, 'Jquery', '80', 'jquery', '1', '2024-08-26 05:00:31', NULL),
(6, 'JavaScript', '75', 'javascript', '1', '2024-08-26 05:00:46', NULL),
(7, 'PHP', '85', 'php', '1', '2024-08-26 05:01:11', NULL),
(8, 'Laravel', '80', 'laravel', '1', '2024-08-26 05:01:24', NULL),
(9, 'Ajax', '60', 'ajax', '1', '2024-08-26 05:01:50', NULL),
(10, 'MySql', '90', 'mysql', '1', '2024-08-26 05:02:02', NULL),
(11, 'Git & Bitbacket', '100', 'git-bitbacket', '1', '2024-08-26 05:02:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_portfolio`
--

CREATE TABLE `project_portfolio` (
  `id` bigint UNSIGNED NOT NULL,
  `portfolio_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_portfolio`
--

INSERT INTO `project_portfolio` (`id`, `portfolio_name`, `portfolio_title`, `portfolio_image`, `portfolio_description`, `slug`, `website_link`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Personnel Portfolio', 'Afzal - Personnel Portfolio', 'backend/image/portfolio/66ca93f6def93.png', 'This Is My Personnel Portfolio Site.', 'personnel-portfolio', NULL, '1', '1', '2024-08-24 20:16:22', NULL),
(4, 'Personnel Portfolio', 'Personnel Portfolio Admin Deshboard', 'backend/image/portfolio/66ca946486b0e.png', 'This is Portfolio Admin Dashboard Section.', 'personnel-portfolio', 'https://bn.wikipedia.org/wiki/%E0%A6%A6%E0%A7%88%E0%A6%A8%E0%A6%BF%E0%A6%95_%E0%A6%95%E0%A6%BE%E0%A6%B2%E0%A7%87%E0%A6%B0_%E0%A6%95%E0%A6%A3%E0%A7%8D%E0%A6%A0', '2', '1', '2024-08-24 20:18:12', '2024-08-26 02:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_analytics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_author`, `meta_title`, `meta_keyword`, `meta_description`, `google_analytics`, `google_verification`, `alexa_analytics`, `created_at`, `updated_at`) VALUES
(1, 'md.afzal hossen', 'afzal - portfolio site', 'afzal, portfolio, afzal portfolio, afzal blog, blog afzal , afzal web site', 'My name is Md.Afzal Hossen , this is my personal website.', 'eeeeeeee', 'eeee', 'eee', '2024-08-25 15:29:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `logn_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `short_description`, `logn_description`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web Developing', 'We are try our best effort. we are give this smart web site.', '<p>We are try our best effort. we are give this smart web site.</p>\r\n<p>-&gt;&nbsp;</p>\r\n<p>-&gt;</p>\r\n<p>-&gt;</p>\r\n<p>-&gt;</p>', 'backend/image/services/image/66cde5ab57f5d.png', 'backend/image/services/icon/66cde5abec43e.png', '1', '2024-08-27 08:41:47', NULL),
(2, 'Project Bugs Testing', 'Our company sensorily solved your project bags. if others any issues  in your project then we are sensorily solved in your project issues.', '<p>Our company sensorily solved your project bags. if others any issues &nbsp;in your project then we are sensorily solved in your project issues.</p>', 'backend/image/services/image/66cde7abf39af.png', 'backend/image/services/icon/66cde7ac0d030.png', '1', '2024-08-27 08:50:19', NULL),
(4, 'dsafasf', 'asdfasfasf', '<p>asdfsafas</p>', 'backend/image/services/image/66cdeaea4f651.png', 'backend/image/services/icon/66cdeaea557d9.png', '1', '2024-08-27 09:04:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `linkedin`, `facebook`, `twitter`, `instagram`, `github`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://www.linkedin.com/in/afzal-swe/', 'https://www.facebook.com/afzalswe/', 'Null', 'Null', 'https://github.com/afzal-swe', 'https://www.youtube.com/@PROGRAMMINGTRUSTBD', '2024-08-22 11:20:05', '2024-08-22 18:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Md.Afzal Hossen', 'afzal-swe', 'afzal.swe@gmail.com', 'backend/image/profile/66c610fd6db98.jpeg', '2024-08-21 16:07:16', '$2y$10$EJMN1x4KJ7vrm864fE/JoON4Sb.EKtO/t4Lzuhc3RYDWVr.V7nGK2', NULL, '2024-08-21 10:06:57', '2024-08-21 10:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `website_name`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'afzal - portfolio site', '+880 1811178307', '+880 1611178307', 'afzal.swe@gmail.com', 'mdafzalhossen16813@gmail.com', NULL, 'backend/image/website_settings/66c7a228a32ce.jpeg', 'Banasree Block-B, Road-5, House-21 Dhaka', 'I love to work place & Backend Web Developing. Because I love to solve the Backend problem and find easy and better solutions to solve it. I always try my best to make good user site with the best user experience.', '2024-08-22 14:17:04', '2024-08-22 18:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `working_process`
--

CREATE TABLE `working_process` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_process`
--

INSERT INTO `working_process` (`id`, `title`, `image`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Project Research', 'backend/image/working_process/66cd6b77de225.png', '<p>A research project for our team\'s is an extended essay that presents a question or statement for analysis and evaluation. During a research project, you will present your own ideas and research on a subject alongside analysing existing knowledge.&nbsp;</p>', 'project-research', '1', '2024-08-27 00:00:23', NULL),
(2, 'Discussion', 'backend/image/working_process/66cd6c2d266b5.png', '<p>The discussion section is where you will talk about your findings in detail. Here you need to relate your results to your hypothesis, explaining what you found out and the significance of the research.&nbsp;</p>\r\n<p>It is a good idea to talk about any areas with disappointing or surprising results and address the limitations within the research project. This will balance your project and steer you away from bias.</p>', 'discussion', '1', '2024-08-27 00:03:25', NULL),
(3, 'Developing Project', 'backend/image/working_process/66cd6c842bd92.png', '<p>Project development is a higher-order process than project management. It\'s about&nbsp;<strong>ensuring that a project team has all the resources it needs to accomplish the project goals</strong>. &ldquo;Resources&rdquo; is a catch-all term for literally anything the project might need &mdash; from software to people, money, and a defined plan.</p>', 'developing-project', '1', '2024-08-27 00:04:52', NULL),
(4, 'Complete Project', 'backend/image/working_process/66cd6d4f7d24d.png', '<p>At&nbsp;<em>Complete Projects</em> we excel at transformative projects across digital, finance, HR, and operations, including software implementations like CRMs and ERPs.</p>', 'complete-project', '1', '2024-08-27 00:08:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_multi_images`
--
ALTER TABLE `about_multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slide`
--
ALTER TABLE `home_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `progress_bar`
--
ALTER TABLE `progress_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_portfolio`
--
ALTER TABLE `project_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_process`
--
ALTER TABLE `working_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_multi_images`
--
ALTER TABLE `about_multi_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_slide`
--
ALTER TABLE `home_slide`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_bar`
--
ALTER TABLE `progress_bar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_portfolio`
--
ALTER TABLE `project_portfolio`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `working_process`
--
ALTER TABLE `working_process`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
