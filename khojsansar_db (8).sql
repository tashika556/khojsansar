-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khojsansar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `mission_image_one` varchar(255) NOT NULL,
  `mission_image_two` varchar(255) NOT NULL,
  `mission_details` longtext NOT NULL,
  `vision_image_one` varchar(255) NOT NULL,
  `vision_image_two` varchar(255) NOT NULL,
  `vision_details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `details`, `cover_image`, `mission_image_one`, `mission_image_two`, `mission_details`, `vision_image_one`, `vision_image_two`, `vision_details`, `created_at`, `updated_at`) VALUES
(1, '<p>Welcome to <strong>KhojSansar Nepal</strong>, your premier destination for discovering the vibrant culinary landscape of Nepal! We are dedicated to connecting food enthusiasts, travelers, and locals with the best restaurants across the country. Our platform is designed to make your dining experience seamless and enjoyable, offering comprehensive information at your fingertips.</p>', '1726989666.jpg', '1726989666.jpg', '1726989666.jpg', '<p>Our mission is to enhance the way people explore and experience dining in Nepal. We aim to provide a user-friendly platform that allows you to find, review, and share your favorite dining spots, whether you&rsquo;re looking for a cozy local eatery or a fine dining restaurant.</p>', '1726989666.jpg', '1726989666.jpg', '<p>We envision a thriving food culture in Nepal, where every restaurant, big or small, gets the recognition it deserves. By fostering connections between diners and restaurant owners, we aim to contribute to the growth of Nepal&rsquo;s culinary scene and create a community of food lovers.</p>', '2024-09-22 01:26:23', '2024-09-22 01:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$cdVRkT5kX1eiFZrzPkUGyeOYr6qwo5EEbp.r2b.QxteiGW5akbdj.', '2024-08-25 10:18:12', '2024-09-29 00:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `authorizes`
--

CREATE TABLE `authorizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authorize_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorizes`
--

INSERT INTO `authorizes` (`id`, `authorize_name`, `created_at`, `updated_at`) VALUES
(1, 'Proprietor', '2024-09-01 23:31:12', '2024-09-01 23:31:12'),
(2, 'Manager', '2024-09-01 23:31:26', '2024-09-01 23:31:26'),
(3, 'Staff', '2024-09-01 23:31:37', '2024-09-01 23:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `details`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 'The Importance of Professional Photos for Your Restaurant\'s Online Presence', '<p>In today&rsquo;s digital age, first impressions often happen online. When customers are searching for a place to dine, the photos they see can be a deciding factor in whether they choose your restaurant or move on to the next. This makes having high-quality, professional photos an essential part of your restaurant&#39;s online presence. Here&rsquo;s why investing in professional photography can make a significant difference for your business:</p>\r\n\r\n<ul>\r\n	<li><strong>Attracts More Customers</strong></li>\r\n</ul>\r\n\r\n<p>Professional photos capture the essence of your restaurant, from the delicious dishes to the inviting ambiance. When potential customers see mouth-watering images of your menu items, they are more likely to be tempted to visit. High-quality photos can make your food look more appetizing, creating an emotional connection and encouraging people to experience it in person.</p>\r\n\r\n<ul>\r\n	<li><strong>Enhances Credibility and Trust</strong></li>\r\n</ul>\r\n\r\n<p>Clear, well-lit images of your restaurant&rsquo;s interior, dishes, and staff convey professionalism and attention to detail. Customers are more likely to trust a restaurant that takes pride in presenting itself well. A professional photoshoot ensures that every element of your business is shown in the best light, helping to establish credibility and attract customers who are confident about the quality of your offerings.</p>\r\n\r\n<ul>\r\n	<li><strong>Boosts Engagement on Social Media and Websites</strong></li>\r\n</ul>\r\n\r\n<p>In the world of social media, visuals are everything. Restaurants with high-quality photos tend to receive more likes, shares, and comments, which translates into increased visibility. When your website or social media profiles feature stunning images, they not only keep visitors engaged but also encourage them to explore your menu or make a reservation. This increased engagement can ultimately lead to more foot traffic and sales.</p>\r\n\r\n<ul>\r\n	<li><strong>Improves Your Restaurant&rsquo;s SEO</strong></li>\r\n</ul>\r\n\r\n<p>Did you know that professional photos can improve your search engine ranking? Quality images with proper descriptions and tags make your website more appealing to search engines, which can help your restaurant appear higher in search results. This means more people can discover your restaurant when searching for dining options in your area.</p>\r\n\r\n<ul>\r\n	<li><strong>Helps Your Restaurant Stand Out in a Competitive Market</strong></li>\r\n</ul>\r\n\r\n<p>With so many dining options available, it&rsquo;s crucial to differentiate your restaurant from the competition. Professional photos can highlight your unique features, whether it&rsquo;s your beautifully presented dishes, cozy atmosphere, or exceptional service. By showcasing what makes your restaurant special, you increase the chances of attracting customers who are looking for a memorable dining experience.</p>\r\n\r\n<p><strong>How KhojSansar Nepal Can Help ??</strong></p>\r\n\r\n<p>At KhojSansar Nepal, we understand the impact that professional photography can have on your restaurant&rsquo;s success. Our expert photographers specialize in capturing the essence of your restaurant, helping you create a strong online presence that attracts more customers. With our photoshoot service, you can showcase your dishes, ambiance, and overall brand in a way that sets you apart from the competition.</p>\r\n\r\n<p><strong>Don&rsquo;t let your restaurant go unnoticed!</strong> Invest in professional photos and let KhojSansar Nepal help you make a lasting impression on potential customers.&nbsp;</p>', '1726984512.jpg', '2024-09-22 00:08:23', '2024-09-22 00:10:12'),
(2, 'Top Tips for Choosing the Perfect Restaurant in Nepal', '<p>Finding the ideal restaurant to satisfy your cravings can be a delightful yet daunting task, especially with the diverse culinary landscape in Nepal. Whether you&#39;re a local resident or a traveler exploring new flavors, these tips will help you navigate the options and make an informed choice for your next dining experience.</p>\r\n\r\n<ul>\r\n	<li><strong>Consider the Cuisine</strong></li>\r\n</ul>\r\n\r\n<p>Nepal boasts a rich variety of cuisines, from traditional Nepali dishes to international flavors. Start by deciding what type of food you&rsquo;re in the mood for. Are you craving authentic momos, flavorful curries, or perhaps a cozy Italian meal? Use KhojSansar Nepal to filter restaurants by cuisine type to find exactly what you want.</p>\r\n\r\n<ul>\r\n	<li><strong>Check Reviews and Ratings</strong></li>\r\n</ul>\r\n\r\n<p>Before choosing a restaurant, take the time to read reviews and ratings from other diners. Customer feedback can provide valuable insights into the quality of food, service, and overall experience. Look for consistent positive reviews and be cautious of places with frequent complaints. KhojSansar Nepal aggregates reviews to make this process easier.</p>\r\n\r\n<ul>\r\n	<li><strong>Look for Ambiance and Setting</strong></li>\r\n</ul>\r\n\r\n<p>The ambiance of a restaurant plays a significant role in your dining experience. Consider whether you&#39;re looking for a casual eatery, a romantic spot, or a family-friendly environment. Photos and descriptions on KhojSansar Nepal can help you visualize the atmosphere before you go.</p>\r\n\r\n<ul>\r\n	<li><strong>Evaluate Location and Accessibility</strong></li>\r\n</ul>\r\n\r\n<p>Location is key when choosing a restaurant. Consider how far you&#39;re willing to travel and whether the restaurant is easily accessible. If you&rsquo;re in a new city, check out local neighborhoods and choose a place that&rsquo;s convenient for you. KhojSansar Nepal allows you to search for restaurants by location, helping you find nearby options.</p>\r\n\r\n<ul>\r\n	<li><strong>Explore Menu Options</strong></li>\r\n</ul>\r\n\r\n<p>A restaurant&#39;s menu can be a deciding factor in your choice. Look for places that offer a variety of dishes that appeal to your tastes. If you&#39;re dining with a group, consider a restaurant that has something for everyone. KhojSansar Nepal provides digital menus, making it easy to browse options before making a reservation.</p>\r\n\r\n<ul>\r\n	<li><strong>Inquire About Special Offers</strong></li>\r\n</ul>\r\n\r\n<p>Many restaurants offer special deals, discounts, or promotions. Before settling on a place, check if they have any ongoing offers that could enhance your dining experience. KhojSansar Nepal keeps you updated on special promotions, making it easy to find great value.</p>\r\n\r\n<ul>\r\n	<li><strong>Ask for Recommendations</strong></li>\r\n</ul>\r\n\r\n<p>Sometimes, the best way to find a fantastic restaurant is through word-of-mouth recommendations. Ask friends, family, or locals for their favorite spots. You can also explore KhojSansar Nepal for curated lists and featured restaurants that have been highly recommended by others.</p>\r\n\r\n<ul>\r\n	<li><strong>Trust Your Instincts</strong></li>\r\n</ul>\r\n\r\n<p>Ultimately, your gut feeling matters. If a place catches your eye or you have a good vibe about it, don&rsquo;t hesitate to give it a try. Dining out is not just about the food; it&rsquo;s also about the overall experience.</p>\r\n\r\n<p><strong>In Conclusion</strong> Choosing the perfect restaurant in Nepal doesn&rsquo;t have to be a challenge. By following these tips and utilizing KhojSansar Nepal&rsquo;s comprehensive resources, you&rsquo;ll be well-equipped to discover the best dining experiences the country has to offer. Enjoy your culinary journey!</p>', '1726984600.jpg', '2024-09-22 00:11:40', '2024-09-22 00:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` bigint(20) UNSIGNED NOT NULL,
  `summary` longtext NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` bigint(20) UNSIGNED NOT NULL,
  `district` bigint(20) UNSIGNED NOT NULL,
  `municipality` bigint(20) UNSIGNED NOT NULL,
  `ward` varchar(255) NOT NULL,
  `tole` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `phone_one` varchar(255) NOT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `email_one` varchar(255) NOT NULL,
  `email_two` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `openeveryday` tinyint(1) NOT NULL DEFAULT 0,
  `coverimage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `customer`, `summary`, `address`, `state`, `district`, `municipality`, `ward`, `tole`, `latitude`, `longitude`, `website_url`, `phone_one`, `phone_two`, `email_one`, `email_two`, `logo`, `openeveryday`, `coverimage`, `created_at`, `updated_at`) VALUES
(1, 5, 'Fugiat non voluptati', 'Anim accusamus incid', 2, 16, 163, '45', 'Eius sit sed totam e', '27.6866', '83.4323', '', '', '', '', '', '', 0, '', '2024-09-08 03:54:19', '2024-09-08 03:54:19'),
(2, 4, 'Make your tea-time a choco-delight with our Chocolate Tea!', 'Kumaripati, Lalitpur', 3, 24, 285, '11', 'Kumaripati', '27.671400514493165', '85.31858238314533', 'https://www.facebook.com/Chiyaghar/', '+977 9812346578', NULL, 'chiyaghar@gmail.com', NULL, '1727667329.png', 0, '1726572597.jpg', '2024-09-08 05:11:28', '2024-09-29 21:50:29'),
(3, 6, 'Business summary goes here.', '123 Main St, City, Country', 1, 2, 3, '4', 'Main Tole', '27.7172', '85.324', 'https://www.example.com', '1234567890', '0987654321', 'example@example.com', 'example2@example.com', '1727672738.png', 1, '1727672738.png', '2024-09-29 23:20:38', '2024-10-07 00:25:20'),
(4, 7, 'Business summary goes here.', '123 Main St, City, Country', 1, 2, 3, '4', 'Main Tole', '27.7172', '85.324', 'https://www.example.com', '1234567890', '0987654321', 'example@example.com', 'example2@example.com', '1727685759.png', 0, '1727685759.png', '2024-09-30 02:57:39', '2024-09-30 03:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `business_facilities`
--

CREATE TABLE `business_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_facilities`
--

INSERT INTO `business_facilities` (`id`, `facility`, `business`, `created_at`, `updated_at`) VALUES
(5, 1, 2, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 1, 4, NULL, NULL),
(9, 2, 4, NULL, NULL),
(10, 3, 4, NULL, NULL),
(14, 4, 3, NULL, NULL),
(15, 5, 3, NULL, NULL),
(16, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_menus`
--

CREATE TABLE `business_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_topic` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `caption` longtext NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_menus`
--

INSERT INTO `business_menus` (`id`, `menu_topic`, `business`, `title`, `price`, `caption`, `photo`, `created_at`, `updated_at`) VALUES
(191, 1, 2, 'Est sunt voluptatem', '888', 'Voluptatem et conseq', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:10'),
(192, 2, 2, 'Dolore at eaque est', '461', 'Suscipit commodo inv', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:11'),
(193, 3, 2, 'Quae dolorem consect', '160', 'Incididunt molestiae', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:11'),
(194, 4, 2, 'Inventore et expedit', '578', 'Ea qui voluptatem di', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:11'),
(195, 5, 2, 'Qui recusandae Mini', '410', 'Non laborum esse re', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:11'),
(197, 7, 2, 'Sint ut quae Nam ve', '125', 'Minus doloremque et', NULL, '2024-09-17 06:10:11', '2024-09-17 06:15:12'),
(198, 1, 2, 'Sed exercitation ess', '98', 'Explicabo Officiis', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:10'),
(199, 2, 2, 'Recusandae Iure ali', '238', 'Necessitatibus incid', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:11'),
(200, 3, 2, 'Sit ex cillum conseq', '218', 'Et ex aut ducimus m', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:11'),
(201, 4, 2, 'Nobis id culpa aut', '511', 'Minim reprehenderit', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:11'),
(202, 5, 2, 'Sed Nam velit eius', '553', 'Aliqua Nesciunt ad', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:11'),
(204, 7, 2, 'Voluptatibus vitae e', '846', 'Beatae ea sunt dist', NULL, '2024-09-17 06:10:19', '2024-09-17 06:15:12'),
(205, 1, 2, 'Voluptas ea unde nih', '359', 'Ab laboriosam sapie', NULL, '2024-09-17 06:15:11', '2024-09-17 06:15:11'),
(206, 2, 2, 'Tenetur cum in exerc', '513', 'Ut omnis numquam des', NULL, '2024-09-17 06:15:11', '2024-09-17 06:15:11'),
(207, 3, 2, 'Quia voluptatem Ape', '957', 'Facere commodi dolor', NULL, '2024-09-17 06:15:11', '2024-09-17 06:15:11'),
(208, 4, 2, 'Voluptatem sed labor', '507', 'Accusantium mollitia', NULL, '2024-09-17 06:15:11', '2024-09-17 06:15:11'),
(209, 5, 2, 'Velit incidunt ut e', '505', 'Voluptatem culpa dol', NULL, '2024-09-17 06:15:11', '2024-09-17 06:15:11'),
(211, 7, 2, 'Qui adipisicing sed', '949', 'Esse totam sed ipsa', NULL, '2024-09-17 06:15:12', '2024-09-17 06:15:12'),
(212, 6, 2, 'Khaja set', 'Rs. 200', 'spicy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_services`
--

CREATE TABLE `business_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_services`
--

INSERT INTO `business_services` (`id`, `service`, `business`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(2, 7, 2, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 11, 2, NULL, NULL),
(5, 9, 2, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 2, 3, NULL, NULL),
(11, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Typical / Ethnic', '2024-09-01 00:17:12', '2024-09-01 00:18:02'),
(2, 'Cafeteria', '2024-09-01 00:17:25', '2024-09-01 00:17:25'),
(3, 'Coffee Shop / House', '2024-09-01 00:20:15', '2024-09-01 00:20:15'),
(4, 'Pub', '2024-09-01 00:20:21', '2024-09-01 00:20:21'),
(5, 'Automat / Fast Food', '2024-09-01 00:20:40', '2024-09-01 00:20:40'),
(6, 'Café', '2024-09-01 00:20:47', '2024-09-01 00:20:47'),
(7, 'Contemporary Dinner', '2024-09-01 00:20:59', '2024-09-01 00:20:59'),
(8, 'Concession Stand', '2024-09-01 00:21:05', '2024-09-01 00:21:05'),
(9, 'Ice Cream Parlor', '2024-09-01 00:21:11', '2024-09-01 00:21:11'),
(10, 'Sandwich Bar', '2024-09-01 00:21:16', '2024-09-01 00:21:16'),
(11, 'Pizza Bar', '2024-09-01 00:21:21', '2024-09-01 00:21:21'),
(12, 'Bakery', '2024-09-01 00:21:26', '2024-09-01 00:21:26'),
(13, 'Sweet shop', '2024-09-01 00:21:31', '2024-09-01 00:21:31'),
(14, 'Farm / Hygienic', '2024-09-01 00:21:36', '2024-09-01 00:21:36'),
(15, 'Banquet', '2024-09-01 00:21:41', '2024-09-01 00:21:41'),
(16, 'Tea House', '2024-09-01 00:21:48', '2024-09-01 00:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_one` varchar(255) NOT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `email_one` varchar(255) NOT NULL,
  `email_two` varchar(255) DEFAULT NULL,
  `phone_one` varchar(255) NOT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) NOT NULL DEFAULT 'https://www.facebook.com/',
  `twitter_url` varchar(255) NOT NULL DEFAULT 'https://www.twitter.com/',
  `instagram_url` varchar(255) NOT NULL DEFAULT 'https://www.instagram.com/',
  `youtube_url` varchar(255) NOT NULL DEFAULT 'https://www.youtube.com/',
  `map_url` longtext NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address_one`, `address_two`, `email_one`, `email_two`, `phone_one`, `phone_two`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `map_url`, `opening_hours`, `banner`, `created_at`, `updated_at`) VALUES
(1, 'Kumaripati - 5 Lalitpur Metropolitan City', 'Lalitpur, Nepal', 'info@khojsansarnepal.com', NULL, '+977-01-5453000', '+977-9803030780', 'https://www.facebook.com/khojsansarnepal', 'https://www.twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27689223729!2d85.29111335911601!3d27.709031933219393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1674801198719!5m2!1sen!2snp', 'From 12.30 To 23.00', '1726737886_slider02.jpg', '2024-09-19 03:15:48', '2024-09-22 21:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authorize` bigint(20) UNSIGNED NOT NULL,
  `business` varchar(255) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `permanent_state` bigint(20) UNSIGNED NOT NULL,
  `permanent_district` bigint(20) UNSIGNED NOT NULL,
  `permanent_municipality` bigint(20) UNSIGNED NOT NULL,
  `permanent_ward` varchar(255) NOT NULL,
  `permanent_tole` varchar(255) NOT NULL,
  `temporary_state` bigint(20) UNSIGNED DEFAULT NULL,
  `temporary_district` bigint(20) UNSIGNED DEFAULT NULL,
  `temporary_municipality` bigint(20) UNSIGNED DEFAULT NULL,
  `temporary_ward` varchar(255) DEFAULT NULL,
  `temporary_tole` varchar(255) DEFAULT NULL,
  `temporary_city` varchar(255) DEFAULT NULL,
  `permanent_city` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cell` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `admin_verified` tinyint(1) NOT NULL DEFAULT 0,
  `admin_rejected` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL,
  `rejection_reason` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `authorize`, `business`, `category`, `first_name`, `middle_name`, `last_name`, `permanent_state`, `permanent_district`, `permanent_municipality`, `permanent_ward`, `permanent_tole`, `temporary_state`, `temporary_district`, `temporary_municipality`, `temporary_ward`, `temporary_tole`, `temporary_city`, `permanent_city`, `address`, `email`, `phone`, `cell`, `user_name`, `password`, `cpassword`, `otp`, `admin_verified`, `admin_rejected`, `agree`, `rejection_reason`, `created_at`, `updated_at`) VALUES
(4, 1, 'Chiya Ghar', 6, 'Ramesh', NULL, 'Maharjan', 3, 24, 285, '11', 'Kumaripati', 1, 12, 115, '12', 'Shrinagar', '', '', 'Jawlakhel, Lalitpur', 'tassingh56@gmail.com', '+1 (915) 134-8344', '+1 (125) 455-5994', 'dutiwoco', '$2y$12$RRkFJqV0eVMem0nG27CoUOnuICSYh5HfDaRvH8qZMyXGc2cxYw4jy', '$2y$12$s7m7qNixJ.OxEkdOq12ZXOSkNdDvJPI1PqdRb5qQ3rpguMtmzH5QO', 'KSN11090324dutiwoco04', 1, 0, 1, NULL, '2024-09-03 02:50:09', '2024-09-25 04:22:48'),
(5, 2, 'Farzi', 14, 'rycigyxize', 'rycigyxize', 'rycigyxize', 2, 19, 208, '34', 'kuvozyrywy', 1, 12, 115, '21', 'Shrinagar', '', '', '', 'runu@mailinator.com', '+1 (223) 381-5048', '+1 (376) 612-6868', 'nogoxelom', '$2y$12$hsxxXPaabh3Uvr0E339Wm.86zBNxD59ojuoiiRGNHuTdOr6DQuOC2', '$2y$12$4qislx1FhwLCPTN7i7gYreA1GHtnshVNRQY.YWMXFUB5RIHz4UNya', 'KSN34090824nogoxelom05', 1, 0, 1, NULL, '2024-09-08 03:01:05', '2024-09-08 03:45:07'),
(6, 1, 'Business Name', 2, 'John', NULL, 'Doe', 1, 5, 12, '3', 'Park Street', 2, 8, 15, '4', NULL, 'hey', 'Maitidevi', 'Address', 'john@example.com', '1234567890', NULL, 'ven45', '$2y$12$82cNT1aWATvKIcCREEM1z.QOLUAdA3z/HnbR52VYd3H2oEw8Pn18i', '$2y$12$c2nqDHF/r52D4tFWOhM/eOi0d5lTBSNZFzI3eSXfZfM4/AzHbUqUm', 'KSN19092624ven4506', 1, 0, 1, NULL, '2024-09-25 21:58:41', '2024-09-30 23:56:35'),
(7, 1, '1', 2, 'a', NULL, 'a', 1, 5, 12, '3', 'Park Street', 2, 8, 15, '4', 'a', NULL, 'City Name', 'aa', 'dd@gmail.com', '1234567290', '32332131', 'johndoe', '$2y$12$6623n2iPulX8POyTHfQVruXKNnPN9K7C/UnRDfx2OmtRMSzEXUTYW', '$2y$12$8qDXAtha.Yq4u3bNHd58ee.3wlYgbf1hRBz9w9WijVJWbuRySLytq', NULL, 0, 0, 1, NULL, '2024-09-26 03:25:58', '2024-09-30 01:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Bhojpur', 1, NULL, NULL),
(2, 'Dhankuta', 1, NULL, NULL),
(3, 'Ilam', 1, NULL, NULL),
(4, 'Jhapa', 1, NULL, NULL),
(5, 'Khotang', 1, NULL, NULL),
(6, 'Morang', 1, NULL, NULL),
(7, 'Okhaldhunga', 1, NULL, NULL),
(8, 'Panchthar', 1, NULL, NULL),
(9, 'Sankhuwasabha', 1, NULL, NULL),
(10, 'Solukhumbu', 1, NULL, NULL),
(11, 'Sunsari', 1, NULL, NULL),
(12, 'Taplejung', 1, NULL, NULL),
(13, 'Terhrathum', 1, NULL, NULL),
(14, 'Udayapur', 1, NULL, NULL),
(15, 'Parsa', 2, NULL, NULL),
(16, 'Bara', 2, NULL, NULL),
(17, 'Rautahat', 2, NULL, NULL),
(18, 'Sarlahi', 2, NULL, NULL),
(19, 'Mahottari', 2, NULL, NULL),
(20, 'Dhanusha', 2, NULL, NULL),
(21, 'Siraha', 2, NULL, NULL),
(22, 'Saptari', 2, NULL, NULL),
(23, 'Kathmandu', 3, NULL, NULL),
(24, 'Lalitpur', 3, NULL, NULL),
(25, 'Bhaktapur', 3, NULL, NULL),
(26, 'Kavrepalanchok\r\n', 3, NULL, NULL),
(27, 'Sindhupalchowk', 3, NULL, NULL),
(28, 'Dolakha', 3, NULL, NULL),
(29, 'Dhading', 3, NULL, NULL),
(30, 'Nuwakot', 3, NULL, NULL),
(31, 'Makwanpur', 3, NULL, NULL),
(32, 'Rasuwa', 3, NULL, NULL),
(33, 'Ramechhap', 3, NULL, NULL),
(34, 'Chitwan', 3, NULL, NULL),
(35, 'Sindhuli', 3, NULL, NULL),
(36, 'Kaski', 4, NULL, NULL),
(37, 'Gorkha', 4, NULL, NULL),
(38, 'Nawalparasi East', 4, NULL, NULL),
(39, 'Parbat', 4, NULL, NULL),
(40, 'Tanahu', 4, NULL, NULL),
(41, 'Baglung', 4, NULL, NULL),
(42, 'Myagdi', 4, NULL, NULL),
(43, 'Lamjung', 4, NULL, NULL),
(44, 'Syangja', 4, NULL, NULL),
(45, 'Manang', 4, NULL, NULL),
(46, 'Mustang', 4, NULL, NULL),
(47, 'Nawalparasi West\r\n', 5, NULL, NULL),
(48, 'Dang', 5, NULL, NULL),
(49, 'Gulmi', 5, NULL, NULL),
(50, 'Kapilvastu', 5, NULL, NULL),
(51, 'Arghakhanchi', 5, NULL, NULL),
(52, 'Palpa', 5, NULL, NULL),
(53, 'Rukum East', 5, NULL, NULL),
(54, 'Pyuthan', 5, NULL, NULL),
(55, 'Banke', 5, NULL, NULL),
(56, 'Bardiya', 5, NULL, NULL),
(57, 'Rupandehi', 5, NULL, NULL),
(58, 'Rolpa', 5, NULL, NULL),
(59, 'Rukum West', 6, NULL, NULL),
(60, 'Mugu', 6, NULL, NULL),
(61, 'Dailekh', 6, NULL, NULL),
(62, 'Dolpa', 6, NULL, NULL),
(63, 'Jumla', 6, NULL, NULL),
(64, 'Jajarkot', 6, NULL, NULL),
(65, 'Kalikot', 6, NULL, NULL),
(66, 'Salyan', 6, NULL, NULL),
(67, 'Surkhet', 6, NULL, NULL),
(68, 'Humla', 6, NULL, NULL),
(69, 'Kailali', 7, NULL, NULL),
(70, 'Kanchanpur', 7, NULL, NULL),
(71, 'Achham', 7, NULL, NULL),
(72, 'Dadeldhura', 7, NULL, NULL),
(73, 'Doti', 7, NULL, NULL),
(74, 'Darchula', 7, NULL, NULL),
(75, 'Bajhang', 7, NULL, NULL),
(76, 'Bajura', 7, NULL, NULL),
(77, 'Baitadi', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facility_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility_name`, `facility_logo`, `created_at`, `updated_at`) VALUES
(1, 'Free Wifi', '1725168033.png', '2024-08-31 23:24:29', '2024-08-31 23:35:33'),
(2, 'Delivery', '1725168273.png', '2024-08-31 23:39:33', '2024-08-31 23:39:33'),
(3, 'Parking', '1725168413.png', '2024-08-31 23:41:53', '2024-08-31 23:41:53'),
(4, 'Welcome Drinks', '1725168521.png', '2024-08-31 23:43:41', '2024-08-31 23:43:41'),
(5, 'Welcome Snacks', '1725168926.png', '2024-08-31 23:50:26', '2024-08-31 23:50:26'),
(6, 'Separate Toilet', '1725169008.png', '2024-08-31 23:51:48', '2024-08-31 23:51:48'),
(7, 'Smoking Zone', '1725169088.png', '2024-08-31 23:53:08', '2024-08-31 23:53:08'),
(8, 'Staff Area', '1725169178.png', '2024-08-31 23:54:38', '2024-08-31 23:54:38'),
(9, 'Private Dining', '1725169196.png', '2024-08-31 23:54:56', '2024-08-31 23:54:56'),
(10, 'Lounge', '1725169281.png', '2024-08-31 23:56:21', '2024-08-31 23:56:21'),
(11, 'Cloak Room', '1725169383.png', '2024-08-31 23:58:03', '2024-08-31 23:58:03'),
(12, 'Reception', '1725169442.png', '2024-08-31 23:59:02', '2024-08-31 23:59:02'),
(13, 'Buffet', '1725169522.png', '2024-09-01 00:00:22', '2024-09-01 00:00:22'),
(14, 'Service Bar', '1725169598.png', '2024-09-01 00:01:38', '2024-09-01 00:01:38'),
(15, 'Dispense Bar', '1725169742.png', '2024-09-01 00:04:02', '2024-09-01 00:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos_videos`
--

CREATE TABLE `gallery_photos_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `photosvideos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_photos_videos`
--

INSERT INTO `gallery_photos_videos` (`id`, `business`, `photosvideos`, `created_at`, `updated_at`) VALUES
(72, 2, '1727066142_slider02.jpg', '2024-09-22 22:50:42', '2024-09-22 22:50:42'),
(73, 2, '1727066142_slider03.jpg', '2024-09-22 22:50:42', '2024-09-22 22:50:42'),
(74, 2, '1727066143_slider01.jpg', '2024-09-22 22:50:43', '2024-09-22 22:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `khojsansar_services`
--

CREATE TABLE `khojsansar_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `banner` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khojsansar_services`
--

INSERT INTO `khojsansar_services` (`id`, `title`, `details`, `banner`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant', 'KhojSansar Nepal is your ultimate guide to discovering the best restaurants across the country. Whether you\'re craving traditional Nepali cuisine or looking for international flavors, our platform allows you to explore a wide variety of dining options. You can search for restaurants by location, cuisine type, or popularity, and access detailed information, including menus, photos, contact details, and customer reviews, making it easy to choose the perfect spot for any occasion.', '1726980017.jpg', '1726980017.png', '2024-09-21 22:37:57', '2024-09-21 22:55:17'),
(2, 'Digital Menu', 'KhojSansar Nepal offers a convenient digital menu service that lets you browse restaurant menus right from your device. No more guesswork about what’s being served – explore detailed menu options, complete with item descriptions, prices, and photos, before you even step foot in the restaurant. This feature helps you make informed choices and ensures that you find dishes that suit your taste and dietary preferences, making your dining experience smoother and more enjoyable.', '1726980146.jpg', '1726980146.png', '2024-09-21 22:57:26', '2024-09-21 22:57:26'),
(3, 'Photoshoot', 'KhojSansar Nepal provides professional photoshoot services to help restaurants showcase their ambiance, dishes, and overall dining experience in the best light. Our expert photographers capture high-quality images that highlight the unique features of each restaurant, from the beautifully plated meals to the inviting interior design. These stunning visuals not only enhance your restaurant\'s online presence but also attract more customers by giving them a glimpse of what to expect when they visit.', '1726980264.jpg', '1726980264.png', '2024-09-21 22:59:25', '2024-09-21 22:59:25'),
(4, 'Event Management', 'KhojSansar Nepal offers comprehensive event management services tailored to restaurants and eateries. Whether you\'re planning a grand opening, a food festival, a themed dining experience, or a private gathering, our team handles every detail to ensure a successful event. From coordinating with vendors to arranging decorations, entertainment, and promotions, we take the hassle out of organizing events, allowing restaurants to focus on delivering an exceptional experience to their guests.', '1726980452.jpg', '1726980452.png', '2024-09-21 23:02:32', '2024-09-21 23:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `main_location_banner_restaurants`
--

CREATE TABLE `main_location_banner_restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_location_banner_restaurants`
--

INSERT INTO `main_location_banner_restaurants` (`id`, `cover_image`, `district_id`, `created_at`, `updated_at`) VALUES
(1, '1726994283.jpg', 23, '2024-09-22 02:53:03', '2024-09-22 02:53:03'),
(2, '1726994829.jpg', 24, '2024-09-22 03:02:09', '2024-09-22 03:02:09'),
(3, '1726994940.jpg', 25, '2024-09-22 03:04:00', '2024-09-22 03:04:00'),
(4, '1726994997.jpg', 36, '2024-09-22 03:04:57', '2024-09-22 03:04:57'),
(8, '1726995561.jpg', 34, '2024-09-22 03:14:21', '2024-09-22 03:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_topic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_topic`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', '2024-09-09 00:00:35', '2024-09-09 00:23:57'),
(2, 'Veg Snacks', '2024-09-09 00:24:08', '2024-09-09 00:24:08'),
(3, 'Non Veg Snacks', '2024-09-09 00:24:19', '2024-09-09 00:24:19'),
(4, 'Khaja', '2024-09-09 00:24:26', '2024-09-09 00:24:26'),
(5, 'Khana', '2024-09-09 00:24:31', '2024-09-09 00:24:31'),
(6, 'Chinese', '2024-09-09 00:24:42', '2024-09-09 00:24:42'),
(7, 'Thai', '2024-09-09 00:24:48', '2024-09-09 00:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `menu_pdfs`
--

CREATE TABLE `menu_pdfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_pdfs`
--

INSERT INTO `menu_pdfs` (`id`, `business`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 2, 'menu_pdfs/zfMDOQCVMw0QciuwaALzIXw7Lj0MvNERfYhOLTHv.pdf', '2024-09-18 04:12:36', '2024-09-30 05:25:10'),
(2, 4, 'menu_pdfs/CYPhhe9Wx5K1tw6RM6STaXzNkfwVqtGbm0IeMz2t.pdf', '2024-09-30 05:14:48', '2024-09-30 05:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_08_25_082235_create_admins_table', 1),
(2, '2024_08_28_071102_create_provinces_table', 2),
(3, '2024_08_28_071118_create_districts_table', 3),
(4, '2024_08_28_071130_create_municipalities_table', 4),
(5, '2024_08_29_054629_create_customers_table', 5),
(6, '2024_08_29_072850_create_customers_table', 6),
(7, '2024_08_29_085920_create_customers_table', 7),
(8, '2024_08_29_085956_create_customers_table', 8),
(9, '2024_08_29_090125_create_customers_table', 9),
(10, '2024_08_29_094728_create_services_table', 10),
(11, '2024_08_29_094736_create_facilities_table', 11),
(12, '2024_08_29_094840_create_categories_table', 12),
(13, '2024_09_01_033628_create_facilities_table', 13),
(14, '2024_09_01_055728_create_services_table', 14),
(15, '2024_09_01_055700_create_categories_table', 15),
(16, '2024_09_02_050246_create_authorizes_table', 16),
(17, '2024_09_02_052619_create_customers_table', 17),
(18, '2024_09_02_055424_create_customers_table', 18),
(19, '2024_09_03_044049_create_customers_table', 19),
(20, '2024_09_03_051103_create_customers_table', 20),
(21, '2024_09_03_073304_create_customers_table', 21),
(22, '2024_09_04_090108_create_contacts_table', 22),
(23, '2024_08_29_084916_create_businesses_table', 23),
(24, '2024_09_08_110140_create_business_services_table', 24),
(25, '2024_09_08_113532_create_business_facilities_table', 25),
(26, '2024_08_29_094751_create_menus_table', 26),
(27, '2024_09_09_061530_create_business_menus_table', 27),
(28, '2024_08_29_094831_create_specials_table', 28),
(29, '2024_09_10_104631_create_slider_photos_videos_table', 29),
(30, '2024_09_10_104641_create_gallery_photos_videos_table', 30),
(31, '2024_09_03_100219_create_payment_methods_table', 31),
(32, '2024_08_29_094316_create_payments_table', 32),
(33, '2024_09_16_040628_create_payments_table', 33),
(34, '2024_09_16_040931_create_payments_table', 34),
(35, '2024_09_16_044217_create_payments_table', 35),
(36, '2024_09_17_034749_create_specials_table', 36),
(37, '2024_09_18_055937_create_reviewers_table', 37),
(38, '2024_09_17_120518_create_reviews_table', 38),
(39, '2024_09_18_093634_create_menu_pdfs_table', 39),
(40, '2024_09_04_090128_create_testimonials_table', 40),
(41, '2024_09_04_090137_create_site_settings_table', 41),
(42, '2024_09_19_082247_create_contacts_table', 42),
(43, '2024_09_19_095045_create_partners_table', 43),
(44, '2024_09_19_111309_create_khojsansar_services_table', 44),
(45, '2024_09_22_052649_create_blogs_table', 45),
(46, '2024_09_22_063049_create_abouts_table', 46),
(47, '2024_09_22_063129_create_main_location_banner_restaurants_table', 47),
(48, '2024_09_23_035430_create_reviews_table', 48),
(49, '2024_09_24_083727_create_reviews_table', 49),
(50, '2024_09_25_073619_create_password_resets_table', 50);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipality_name` varchar(255) NOT NULL,
  `municipality_shortname` varchar(255) DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `municipality_name`, `municipality_shortname`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Shadananda Municipality', NULL, 1, NULL, NULL),
(2, 'Salpa Silichho Gaunpalika', NULL, 1, NULL, NULL),
(3, 'Temkemaiyum Gaunpalika', NULL, 1, NULL, NULL),
(4, 'Bhojpur Municipality', NULL, 1, NULL, NULL),
(5, 'Arun Gaunpalika', NULL, 1, NULL, NULL),
(6, 'Pauwa Dunma Gaunpalika', NULL, 1, NULL, NULL),
(7, 'Ramprasad Rai Gaunpalika', NULL, 1, NULL, NULL),
(8, 'Hatuwagadhi Gaunpalika', NULL, 1, NULL, NULL),
(9, 'Aamchowk Gaunpalika', NULL, 1, NULL, NULL),
(10, 'Mahalaxmi Municipality', NULL, 2, NULL, NULL),
(11, 'Pakhribas Municipality', NULL, 2, NULL, NULL),
(12, 'Chhathar Jorpati Gaunpalika', NULL, 2, NULL, NULL),
(13, 'Dhankuta Municipality', NULL, 2, NULL, NULL),
(14, 'Shahidbhumi Municipality', NULL, 2, NULL, NULL),
(15, 'Sangurigadhi Gaunpalika', NULL, 2, NULL, NULL),
(16, 'Chaubise Gaunpalika', NULL, 2, NULL, NULL),
(17, 'Mai Jogmai Gaunpalika', NULL, 3, NULL, NULL),
(18, 'Sandakpur Gaunpalika', NULL, 3, NULL, NULL),
(19, 'Ilam Municipality', NULL, 3, NULL, NULL),
(20, 'Deumai Municipality', NULL, 3, NULL, NULL),
(21, 'Fakfokathum Gaunpalika', NULL, 3, NULL, NULL),
(22, 'Mangsebung Gaunpalika', NULL, 3, NULL, NULL),
(23, 'Chulachuli Gaunpalika', NULL, 3, NULL, NULL),
(24, 'Mai Municipality', NULL, 3, NULL, NULL),
(25, 'Suryodaya Municipality', NULL, 3, NULL, NULL),
(26, 'Rong Gaunpalika', NULL, 3, NULL, NULL),
(27, 'Mechinagar Municipality', NULL, 4, NULL, NULL),
(28, 'Buddhashanti Gaunpalika', NULL, 4, NULL, NULL),
(29, 'Arjundhara Municipality', NULL, 4, NULL, NULL),
(30, 'Kankai Municipality', NULL, 4, NULL, NULL),
(31, 'Shivasatakshi Municipality', NULL, 4, NULL, NULL),
(32, 'Kamal Gaunpalika', NULL, 4, NULL, NULL),
(33, 'Damak Municipality', NULL, 4, NULL, NULL),
(34, 'Gauradaha Municipality', NULL, 4, NULL, NULL),
(35, 'Gauriganj Gaunpalika', NULL, 4, NULL, NULL),
(36, 'Jhapa Gaunpalika', NULL, 4, NULL, NULL),
(37, 'Barhadashi Gaunpalika', NULL, 4, NULL, NULL),
(38, 'Birtamod Municipality', NULL, 4, NULL, NULL),
(39, 'Haldibari Gaunpalika', NULL, 4, NULL, NULL),
(40, 'Bhadrapur Municipality', NULL, 4, NULL, NULL),
(41, 'Kanchanakawal Gaunpalika', NULL, 4, NULL, NULL),
(42, 'Kepilasgadhi Gaunpalika', NULL, 5, NULL, NULL),
(43, 'Aiselukharka Gaunpalika', NULL, 5, NULL, NULL),
(44, 'Rawa Besi Gaunpalika', NULL, 5, NULL, NULL),
(45, 'Halesi Tuwachung Municipality', NULL, 5, NULL, NULL),
(46, 'Diktel Rupakot Majhuwagadhi Municipality', NULL, 5, NULL, NULL),
(47, 'Sakela Gaunpalika', NULL, 5, NULL, NULL),
(48, 'Diprung Chuichumma Gaunpalika', NULL, 5, NULL, NULL),
(49, 'Khotehang Gaunpalika', NULL, 5, NULL, NULL),
(50, 'Jante Dhunga Gaunpalika', NULL, 5, NULL, NULL),
(51, 'Barahi Pokhari Gaunpalika', NULL, 5, NULL, NULL),
(52, 'Biratnagar Metropolitan City', NULL, 6, NULL, NULL),
(53, 'Miklajung Gaunpalika', NULL, 6, NULL, NULL),
(54, 'Letang Municipality', NULL, 6, NULL, NULL),
(55, 'Kerabari Gaunpalika', NULL, 6, NULL, NULL),
(56, 'Sundarharaicha Municipality', NULL, 6, NULL, NULL),
(57, 'Belbari Municipality', NULL, 6, NULL, NULL),
(58, 'Kanepokhari Gaunpalika', NULL, 6, NULL, NULL),
(59, 'Pathari Shanishchare Municipality', NULL, 6, NULL, NULL),
(60, 'Urlabari Municipality', NULL, 6, NULL, NULL),
(61, 'Ratuwamai Municipality', NULL, 6, NULL, NULL),
(62, 'Sunwarshi Municipality', NULL, 6, NULL, NULL),
(63, 'Rangeli Municipality', NULL, 6, NULL, NULL),
(64, 'Gramthan Gaunpalika', NULL, 6, NULL, NULL),
(65, 'Budhiganga Gaunpalika', NULL, 6, NULL, NULL),
(66, 'Katahari Gaunpalika', NULL, 6, NULL, NULL),
(67, 'Dhanapalthan Gaunpalika', NULL, 6, NULL, NULL),
(68, 'Jahada Gaunpalika', NULL, 6, NULL, NULL),
(69, 'Chishankhu Gadhi Gaunpalika', NULL, 7, NULL, NULL),
(70, 'Siddhicharan Municipality', NULL, 7, NULL, NULL),
(71, 'Molung Gaunpalika', NULL, 7, NULL, NULL),
(72, 'Khiji Demba Gaunpalika', NULL, 7, NULL, NULL),
(73, 'Likhu Gaunpalika', NULL, 7, NULL, NULL),
(74, 'Champadevi Gaunpalika', NULL, 7, NULL, NULL),
(75, 'Sunkoshi Gaunpalika', NULL, 7, NULL, NULL),
(76, 'Manebhanjyang Gaunpalika', NULL, 7, NULL, NULL),
(77, 'Yangbarak Gaunpalika', NULL, 8, NULL, NULL),
(78, 'Hilihan Gaunpalika', NULL, 8, NULL, NULL),
(79, 'Falelung Gaunpalika', NULL, 8, NULL, NULL),
(80, 'Phidim Municipality', NULL, 8, NULL, NULL),
(81, 'Falgunanda Gaunpalika', NULL, 8, NULL, NULL),
(82, 'Kummayak Gaunpalika', NULL, 8, NULL, NULL),
(83, 'Tumbewa Gaunpalika', NULL, 8, NULL, NULL),
(84, 'Miklajung Gaunpalika', NULL, 8, NULL, NULL),
(85, 'Bhotkhola Gaunpalika', NULL, 9, NULL, NULL),
(86, 'Makalu Gaunpalika', NULL, 9, NULL, NULL),
(87, 'Silichong Gaunpalika', NULL, 9, NULL, NULL),
(88, 'Chichila Gaunpalika', NULL, 9, NULL, NULL),
(89, 'Sabhapokhari Gaunpalika', NULL, 9, NULL, NULL),
(90, 'Khandabari Municipality', NULL, 9, NULL, NULL),
(91, 'Panchakhapan Municipality', NULL, 9, NULL, NULL),
(92, 'Chainapur Municipality', NULL, 9, NULL, NULL),
(93, 'Madi Municipality', NULL, 9, NULL, NULL),
(94, 'Dharmadevi Municipality', NULL, 9, NULL, NULL),
(95, 'Khumbu Pasanglhamu Gaunpalika', NULL, 10, NULL, NULL),
(96, 'Mahakulung Gaunpalika', NULL, 10, NULL, NULL),
(97, 'Sotang Gaunpalika', NULL, 10, NULL, NULL),
(98, 'Mapya Dudhkoshi Gaunpalika', NULL, 10, NULL, NULL),
(99, 'Thulung Dudhkoshi Gaunpalika', NULL, 10, NULL, NULL),
(100, 'Necha Salyan Gaunpalika', NULL, 10, NULL, NULL),
(101, 'Solu Dhudhakunda Municipality', NULL, 10, NULL, NULL),
(102, 'Likhu Pike Gaunpalika', NULL, 10, NULL, NULL),
(103, 'Dharan Sub-Metropolitan City', NULL, 11, NULL, NULL),
(104, 'Barahachhetra Municipality', NULL, 11, NULL, NULL),
(105, 'Koshi Gaunpalika', NULL, 11, NULL, NULL),
(106, 'Bhokraha Narsingh Gaunpalika', NULL, 11, NULL, NULL),
(107, 'Ramdhuni Municipality', NULL, 11, NULL, NULL),
(108, 'Itahari Sub-Metropolitan City', NULL, 11, NULL, NULL),
(109, 'Duhabi Municipality', NULL, 11, NULL, NULL),
(110, 'Gadhi Gaunpalika', NULL, 11, NULL, NULL),
(111, 'Inaruwa Municipality', NULL, 11, NULL, NULL),
(112, 'Harinagar Gaunpalika', NULL, 11, NULL, NULL),
(113, 'Dewangunj Gaunpalika', NULL, 11, NULL, NULL),
(114, 'Barju Gaunpalika', NULL, 11, NULL, NULL),
(115, 'Phaktanlung Gaunpalika', NULL, 12, NULL, NULL),
(116, 'Mikwakhola Gaunpalika', NULL, 12, NULL, NULL),
(117, 'Meringden Gaunpalika', NULL, 12, NULL, NULL),
(118, 'Maiwakhola Gaunpalika', NULL, 12, NULL, NULL),
(119, 'Aatharai Tribeni Gaunpalika', NULL, 12, NULL, NULL),
(120, 'Phungling Municipality', NULL, 12, NULL, NULL),
(121, 'Pathivara Yangwarak Gaunpalika', NULL, 12, NULL, NULL),
(122, 'Sirijanga Gaunpalika', NULL, 12, NULL, NULL),
(123, 'Sidingba Gaunpalika', NULL, 12, NULL, NULL),
(124, 'Aatharai Gaunpalika', NULL, 13, NULL, NULL),
(125, 'Phedap Gaunpalika', NULL, 13, NULL, NULL),
(126, 'Menchhayayem Gaunpalika', NULL, 13, NULL, NULL),
(127, 'Myanglung Municipality', NULL, 13, NULL, NULL),
(128, 'Laligurans Municipality', NULL, 13, NULL, NULL),
(129, 'Chhathar Gaunpalika', NULL, 13, NULL, NULL),
(130, 'Belaka Municipality', NULL, 14, NULL, NULL),
(131, 'Chaudandigadhi Municipality', NULL, 14, NULL, NULL),
(132, 'Triyuga Municipality', NULL, 14, NULL, NULL),
(133, 'Rautamai Gaunpalika', NULL, 14, NULL, NULL),
(134, 'Limchunbung Gaunpalika', NULL, 14, NULL, NULL),
(135, 'Tapli Gaunpalika', NULL, 14, NULL, NULL),
(136, 'Katari Municipality', NULL, 14, NULL, NULL),
(137, 'Udayapurgadhi Gaunpalika', NULL, 14, NULL, NULL),
(138, 'Birgunj Metropolitan City', NULL, 15, NULL, NULL),
(139, 'Thori Gaunpalika', NULL, 15, NULL, NULL),
(140, 'Jirabhawani Gaunpalika', NULL, 15, NULL, NULL),
(141, 'Jagarnathpur Gaunpalika', NULL, 15, NULL, NULL),
(142, 'Paterwa Sugauli Gaunpalika', NULL, 15, NULL, NULL),
(143, 'Sakhuwa Prasauni Gaunpalika', NULL, 15, NULL, NULL),
(144, 'Parsagadhi Municipality', NULL, 15, NULL, NULL),
(145, 'Bahudarmai Municipality', NULL, 15, NULL, NULL),
(146, 'Pokhariya Municipality', NULL, 15, NULL, NULL),
(147, 'Kalikamai Gaunpalika', NULL, 15, NULL, NULL),
(148, 'Dhobini Gaunpalika', NULL, 15, NULL, NULL),
(149, 'Chhipaharmai Gaunpalika', NULL, 15, NULL, NULL),
(150, 'Pakaha Mainpur Gaunpalika', NULL, 15, NULL, NULL),
(151, 'Bindabasini Gaunpalika', NULL, 15, NULL, NULL),
(152, 'Jitpur Simara Sub-Metropolitan City', NULL, 16, NULL, NULL),
(153, 'Kaliya Sub-Metropolitan City', NULL, 16, NULL, NULL),
(154, 'Nijagadh Municipality', NULL, 16, NULL, NULL),
(155, 'Kolhabi Municipality', NULL, 16, NULL, NULL),
(156, 'Parawanipur Gaunpalika', NULL, 16, NULL, NULL),
(157, 'Prasauni Gaunpalika', NULL, 16, NULL, NULL),
(158, 'Bishrampur Gaunpalika', NULL, 16, NULL, NULL),
(159, 'Pheta Gaunpalika', NULL, 16, NULL, NULL),
(160, 'Karaiyamai Gaunpalika', NULL, 16, NULL, NULL),
(161, 'Baragadhi Gaunpalika', NULL, 16, NULL, NULL),
(162, 'Aadarsha Kotwal Gaunpalika', NULL, 16, NULL, NULL),
(163, 'Simroungadh Municipality', NULL, 16, NULL, NULL),
(164, 'Pacharauta Municipality', NULL, 16, NULL, NULL),
(165, 'Mahagadhimai Municipality', NULL, 16, NULL, NULL),
(166, 'Devtal Gaunpalika', NULL, 16, NULL, NULL),
(167, 'Subarna Gaunpalika', NULL, 16, NULL, NULL),
(168, 'Chandrapur Municipality', NULL, 17, NULL, NULL),
(169, 'Gujara Municipality', NULL, 17, NULL, NULL),
(170, 'Phatuwa Bijayapur Municipality', NULL, 17, NULL, NULL),
(171, 'Katahariya Municipality', NULL, 17, NULL, NULL),
(172, 'Brindaban Municipality', NULL, 17, NULL, NULL),
(173, 'Gadhimai Municipality', NULL, 17, NULL, NULL),
(174, 'Madhav Narayan Municipality', NULL, 17, NULL, NULL),
(175, 'Garuda Municipality', NULL, 17, NULL, NULL),
(176, 'Dewahi Gonahi Municipality', NULL, 17, NULL, NULL),
(177, 'Maulapur Municipality', NULL, 17, NULL, NULL),
(178, 'Boudhimai Municipality', NULL, 17, NULL, NULL),
(179, 'Paroha Municipality', NULL, 17, NULL, NULL),
(180, 'Rajpur Municipality', NULL, 17, NULL, NULL),
(181, 'Yamunamai Gaunpalika', NULL, 17, NULL, NULL),
(182, 'Durga Bhagawati Gaunpalika', NULL, 17, NULL, NULL),
(183, 'Rajdevi Municipality', NULL, 17, NULL, NULL),
(184, 'Gaur Municipality', NULL, 17, NULL, NULL),
(185, 'Ishanath Municipality', NULL, 17, NULL, NULL),
(186, 'Lalbandi Municipality', NULL, 18, NULL, NULL),
(187, 'Hariwan Municipality', NULL, 18, NULL, NULL),
(188, 'Bagmati Municipality', NULL, 18, NULL, NULL),
(189, 'Barahathawa Municipality', NULL, 18, NULL, NULL),
(190, 'Haripur Municipality', NULL, 18, NULL, NULL),
(191, 'Ishworpur Municipality', NULL, 18, NULL, NULL),
(192, 'Haripurwa Municipality', NULL, 18, NULL, NULL),
(193, 'Parsa Gaunpalika', NULL, 18, NULL, NULL),
(194, 'Brahmapuri Gaunpalika', NULL, 18, NULL, NULL),
(195, 'Chandranagar Gaunpalika', NULL, 18, NULL, NULL),
(196, 'Kabilashi Municipality', NULL, 18, NULL, NULL),
(197, 'Chakraghatta Gaunpalika', NULL, 18, NULL, NULL),
(198, 'Basbariya Gaunpalika', NULL, 18, NULL, NULL),
(199, 'Dhanakaul Gaunpalika', NULL, 18, NULL, NULL),
(200, 'Ramnagar Gaunpalika', NULL, 18, NULL, NULL),
(201, 'Balara Municipality', NULL, 18, NULL, NULL),
(202, 'Godaita Municipality', NULL, 18, NULL, NULL),
(203, 'Bishnu Gaunpalika', NULL, 18, NULL, NULL),
(204, 'Kaudena Gaunpalika', NULL, 18, NULL, NULL),
(205, 'Malangawa Municipality', NULL, 18, NULL, NULL),
(206, 'Bardibas Municipality', NULL, 19, NULL, NULL),
(207, 'Gaushala Municipality', NULL, 19, NULL, NULL),
(208, 'Sonama Gaunpalika', NULL, 19, NULL, NULL),
(209, 'Aurahi Municipality', NULL, 19, NULL, NULL),
(210, 'Bhangaha Municipality', NULL, 19, NULL, NULL),
(211, 'Loharpatti Municipality', NULL, 19, NULL, NULL),
(212, 'Balawa Municipality', NULL, 19, NULL, NULL),
(213, 'Ram Gopalpur Municipality', NULL, 19, NULL, NULL),
(214, 'Samsi Gaunpalika', NULL, 19, NULL, NULL),
(215, 'Manara Shisawa Municipality', NULL, 19, NULL, NULL),
(216, 'Ekadara Gaunpalika', NULL, 19, NULL, NULL),
(217, 'Mahottari Gaunpalika', NULL, 19, NULL, NULL),
(218, 'Pipara Gaunpalika', NULL, 19, NULL, NULL),
(219, 'Matihani Municipality', NULL, 19, NULL, NULL),
(220, 'Jaleshwor Municipality', NULL, 19, NULL, NULL),
(221, 'Janakpurdham Sub-Metropolitan City', NULL, 20, NULL, NULL),
(222, 'Ganeshman Charnath Municipality', NULL, 20, NULL, NULL),
(223, 'Dhanushadham Municipality', NULL, 20, NULL, NULL),
(224, 'Mithila Municipality', NULL, 20, NULL, NULL),
(225, 'Bateshwor Gaunpalika', NULL, 20, NULL, NULL),
(226, 'Chhireshwornath Municipality', NULL, 20, NULL, NULL),
(227, 'Laxminiya Gaunpalika', NULL, 20, NULL, NULL),
(228, 'Mithila Bihari Municipality', NULL, 20, NULL, NULL),
(229, 'Hansapur Municipality', NULL, 20, NULL, NULL),
(230, 'Sabaila Municipality', NULL, 20, NULL, NULL),
(231, 'Shahidnagar Municipality', NULL, 20, NULL, NULL),
(232, 'Kamala Municipality', NULL, 20, NULL, NULL),
(233, 'Janak Nandini Gaunpalika', NULL, 20, NULL, NULL),
(234, 'Bideha Municipality', NULL, 20, NULL, NULL),
(235, 'Aurahi Gaunpalika', NULL, 20, NULL, NULL),
(236, 'Dhanauji Gaunpalika', NULL, 20, NULL, NULL),
(237, 'Nagarain Municipality', NULL, 20, NULL, NULL),
(238, 'Mukhiyapatti Musaharmiya Gaunpalika', NULL, 20, NULL, NULL),
(239, 'Lahan Municipality', NULL, 21, NULL, NULL),
(240, 'Dhangadhimai Municipality', NULL, 21, NULL, NULL),
(241, 'Golbazar Municipality', NULL, 21, NULL, NULL),
(242, 'Mirchaiya Municipality', NULL, 21, NULL, NULL),
(243, 'Karjanha Municipality', NULL, 21, NULL, NULL),
(244, 'Kalyanpur Municipality', NULL, 21, NULL, NULL),
(245, 'Naraha Gaunpalika', NULL, 21, NULL, NULL),
(246, 'Bishnupur Gaunpalika', NULL, 21, NULL, NULL),
(247, 'Arnama Gaunpalika', NULL, 21, NULL, NULL),
(248, 'Sukhipur Municipality', NULL, 21, NULL, NULL),
(249, 'Laxmipur Patari Gaunpalika', NULL, 21, NULL, NULL),
(250, 'Sakhuwa Nankarkatti Gaunpalika', NULL, 21, NULL, NULL),
(251, 'Bhagawanpur Gaunpalika', NULL, 21, NULL, NULL),
(252, 'Nawarajpur Gaunpalika', NULL, 21, NULL, NULL),
(253, 'Bariyarpatti Gaunpalika', NULL, 21, NULL, NULL),
(254, 'Aurahi Gaunpalika', NULL, 21, NULL, NULL),
(255, 'Siraha Municipality', NULL, 21, NULL, NULL),
(256, 'Saptakoshi Municipality', NULL, 22, NULL, NULL),
(257, 'Kanchanrup Municipality', NULL, 22, NULL, NULL),
(258, 'Agnisair Krishna Sabaran Gaunpalika', NULL, 22, NULL, NULL),
(259, 'Rupani Gaunpalika', NULL, 22, NULL, NULL),
(260, 'Shambhunath Municipality', NULL, 22, NULL, NULL),
(261, 'Khadak Municipality', NULL, 22, NULL, NULL),
(262, 'Surunga Municipality', NULL, 22, NULL, NULL),
(263, 'Balan-Bihul Gaunpalika', NULL, 22, NULL, NULL),
(264, 'Bode Barsain Municipality', NULL, 22, NULL, NULL),
(265, 'Dakneshwori Municipality', NULL, 22, NULL, NULL),
(266, 'Rajgadh Gaunpalika', NULL, 22, NULL, NULL),
(267, 'Bishnupur Gaunpalika', NULL, 22, NULL, NULL),
(268, 'Rajbiraj Municipality', NULL, 22, NULL, NULL),
(269, 'Mahadewa Gaunpalika', NULL, 22, NULL, NULL),
(270, 'Tirahut Gaunpalika', NULL, 22, NULL, NULL),
(271, 'Hanumannagar Kankalini Municipality', NULL, 22, NULL, NULL),
(272, 'Tilathi Koiladi Gaunpalika', NULL, 22, NULL, NULL),
(273, 'Chhinnamasta Gaunpalika', NULL, 22, NULL, NULL),
(274, 'Kathmandu Metropolitian City', 'KMC', 23, NULL, NULL),
(275, 'Kageshwori Manohara Municipality', NULL, 23, NULL, NULL),
(276, 'Kirtipur Municipality', NULL, 23, NULL, NULL),
(277, 'Gokarneshwor Municipality', NULL, 23, NULL, NULL),
(278, 'Chandragiri Municipality', NULL, 23, NULL, NULL),
(279, 'Tokha Municipality', NULL, 23, NULL, NULL),
(280, 'Tarakeshwar Municipality', NULL, 23, NULL, NULL),
(281, 'Dakshinkali Municipality', NULL, 23, NULL, NULL),
(282, 'Nagarjun Municipality', NULL, 23, NULL, NULL),
(283, 'Budhanilkantha Municipality', NULL, 23, NULL, NULL),
(284, 'Shankharapur Municipality', NULL, 23, NULL, NULL),
(285, 'Lalitpur Metropolitian City', 'LMC', 24, NULL, NULL),
(286, 'Mahalaxmi Municipality', NULL, 24, NULL, NULL),
(287, 'Godawari Municipality', NULL, 24, NULL, NULL),
(288, 'Konjyosom Gaunpalika', NULL, 24, NULL, NULL),
(289, 'Mahankal Gaunpalika', NULL, 24, NULL, NULL),
(290, 'Bagmati Gaunpalika', NULL, 24, NULL, NULL),
(291, 'Bhaktapur Municipality', 'BMC', 25, NULL, NULL),
(292, 'Changunarayan Municipality', NULL, 25, NULL, NULL),
(293, 'Madhyapur Thimi Municipality', NULL, 25, NULL, NULL),
(294, 'Suryabinayak Municipality', NULL, 25, NULL, NULL),
(295, 'Chauri Deurali Gaunpalika', NULL, 26, NULL, NULL),
(296, 'Bhumlu Gaunpalika', NULL, 26, NULL, NULL),
(297, 'Mandan Deupur Municipality', NULL, 26, NULL, NULL),
(298, 'Banepa Municipality', NULL, 26, NULL, NULL),
(299, 'Dhulikhel Municipality', NULL, 26, NULL, NULL),
(300, 'Panchkhal Municipality', NULL, 26, NULL, NULL),
(301, 'Temal Gaunpalika', NULL, 26, NULL, NULL),
(302, 'Namobuddha Municipality', NULL, 26, NULL, NULL),
(303, 'Panauti Municipality', NULL, 26, NULL, NULL),
(304, 'Bethanchowk Gaunpalika', NULL, 26, NULL, NULL),
(305, 'Roshi Gaunpalika', NULL, 26, NULL, NULL),
(306, 'Mahabharat Gaunpalika', NULL, 26, NULL, NULL),
(307, 'Khanikhola Gaunpalika', NULL, 26, NULL, NULL),
(308, 'Bhotekoshi Gaunpalika', NULL, 27, NULL, NULL),
(309, 'Jugal Gaunpalika', NULL, 27, NULL, NULL),
(310, 'Panchpokhari Thangpal Gaunpalika', NULL, 27, NULL, NULL),
(311, 'Helambu Gaunpalika', NULL, 27, NULL, NULL),
(312, 'Melanchi Municipality', NULL, 27, NULL, NULL),
(313, 'Indrawoti Gaunpalika', NULL, 27, NULL, NULL),
(314, 'Choutara Sangachowkgadhi Municipality', NULL, 27, NULL, NULL),
(315, 'Balephi Gaunpalika', NULL, 27, NULL, NULL),
(316, 'Bahrabise Municipality', NULL, 27, NULL, NULL),
(317, 'Tripurasundari Gaunpalika', NULL, 27, NULL, NULL),
(318, 'Lisankhu Pakhar Gaunpalika', NULL, 27, NULL, NULL),
(319, 'Sunkoshi Gaunpalika', NULL, 27, NULL, NULL),
(320, 'Bhimeshwor Municipality', NULL, 28, NULL, NULL),
(321, 'Gaurishankar Gaunpalika', NULL, 28, NULL, NULL),
(322, 'Bigul Gaunpalika', NULL, 28, NULL, NULL),
(323, 'Kalinchowk Gaunpalika', NULL, 28, NULL, NULL),
(324, 'Jiri Municipality', NULL, 28, NULL, NULL),
(325, 'Baiteshwor Gaunpalika', NULL, 28, NULL, NULL),
(326, 'Tamakoshi Gaunpalika', NULL, 28, NULL, NULL),
(327, 'Melung Gaunpalika', NULL, 28, NULL, NULL),
(328, 'Shailung Gaunpalika', NULL, 28, NULL, NULL),
(329, 'Dhunibenshi Municipality', NULL, 29, NULL, NULL),
(330, 'Rubi Valley Gaunpalika', NULL, 29, NULL, NULL),
(331, 'Khaniyabas Gaunpalika', NULL, 29, NULL, NULL),
(332, 'Ganga Jamuna Gaunpalika', NULL, 29, NULL, NULL),
(333, 'Nilkhantha Municipality', NULL, 29, NULL, NULL),
(334, 'Tripurasundari Gaunpalika', NULL, 29, NULL, NULL),
(335, 'Netrawati Dabjong Gaunpalika', NULL, 29, NULL, NULL),
(336, 'Jwalamukhi Gaunpalika', NULL, 29, NULL, NULL),
(337, 'Siddhalek Gaunpalika', NULL, 29, NULL, NULL),
(338, 'Benighat Rorang Gaunpalika', NULL, 29, NULL, NULL),
(339, 'Gajuri Gaunpalika', NULL, 29, NULL, NULL),
(340, 'Galchhi Gaunpalika', NULL, 29, NULL, NULL),
(341, 'Thakre Gaunpalika', NULL, 29, NULL, NULL),
(342, 'Bidur Municipality', NULL, 30, NULL, NULL),
(343, 'Dupcheshwor Gaunpalika', NULL, 30, NULL, NULL),
(344, 'Tadi Gaunpalika', NULL, 30, NULL, NULL),
(345, 'Suryagadhi Gaunpalika', NULL, 30, NULL, NULL),
(346, 'Belkotgadhi Municipality', NULL, 30, NULL, NULL),
(347, 'Kispang Gaunpalika', NULL, 30, NULL, NULL),
(348, 'Myagang Gaunpalika', NULL, 30, NULL, NULL),
(349, 'Tarakeshwor Gaunpalika', NULL, 30, NULL, NULL),
(350, 'Likhu Gaunpalika', NULL, 30, NULL, NULL),
(351, 'Panchakanya Gaunpalika', NULL, 30, NULL, NULL),
(352, 'Shivapuri Gaunpalika', NULL, 30, NULL, NULL),
(353, 'Kakani Gaunpalika', NULL, 30, NULL, NULL),
(354, 'Hetauda Sub-Metropolitian City', NULL, 31, NULL, NULL),
(355, 'Thaha Municipality', NULL, 31, NULL, NULL),
(356, 'Indrasarowar Gaunpalika', NULL, 31, NULL, NULL),
(357, 'Kailash Gaunpalika', NULL, 31, NULL, NULL),
(358, 'Raksirang Gaunpalika', NULL, 31, NULL, NULL),
(359, 'Manahari Gaunpalika', NULL, 31, NULL, NULL),
(360, 'Bhimphedi Gaunpalika', NULL, 31, NULL, NULL),
(361, 'Makawanpurgadhi Gaunpalika', NULL, 31, NULL, NULL),
(362, 'Bakaiya Gaunpalika', NULL, 31, NULL, NULL),
(363, 'Bagmati Gaunpalika', NULL, 31, NULL, NULL),
(364, 'Gosaikunda Gaunpalika', NULL, 32, NULL, NULL),
(365, 'Aamachhodingmo Gaunpalika', NULL, 32, NULL, NULL),
(366, 'Uttargaya Gaunpalika', NULL, 32, NULL, NULL),
(367, 'Kalika Gaunpalika', NULL, 32, NULL, NULL),
(368, 'Naukunda Gaunpalika', NULL, 32, NULL, NULL),
(369, 'Ramechhap Municipality', NULL, 33, NULL, NULL),
(370, 'Manthali Municipality', NULL, 33, NULL, NULL),
(371, 'Umakunda Gaunpalika', NULL, 33, NULL, NULL),
(372, 'Gokulganga Gaunpalika', NULL, 33, NULL, NULL),
(373, 'Likhu Tamakoshi Gaunpalika', NULL, 33, NULL, NULL),
(374, 'Khandadevi Gaunpalika', NULL, 33, NULL, NULL),
(375, 'Doramba Gaunpalika', NULL, 33, NULL, NULL),
(376, 'Sunapati Gaunpalika', NULL, 33, NULL, NULL),
(377, 'Bharatpur Metropolitian City', NULL, 34, NULL, NULL),
(378, 'Rapti Municipality', NULL, 34, NULL, NULL),
(379, 'Kalika Municipality', NULL, 34, NULL, NULL),
(380, 'Ichchha Kamana Gaunpalika', NULL, 34, NULL, NULL),
(381, 'Ratnanagar Municipality', NULL, 34, NULL, NULL),
(382, 'Khairahani Municipality', NULL, 34, NULL, NULL),
(383, 'Madi Municipality', NULL, 34, NULL, NULL),
(384, 'Dudhouli Municipality', NULL, 35, NULL, NULL),
(385, 'Kamalamai Municipality', NULL, 35, NULL, NULL),
(386, 'Phikkal Gaunpalika', NULL, 35, NULL, NULL),
(387, 'Tinpatan Gaunpalika', NULL, 35, NULL, NULL),
(388, 'Golanjor Gaunpalika', NULL, 35, NULL, NULL),
(389, 'Sunkoshi Gaunpalika', NULL, 35, NULL, NULL),
(390, 'Ghyanglekha Gaunpalika', NULL, 35, NULL, NULL),
(391, 'Marin Gaunpalika', NULL, 35, NULL, NULL),
(392, 'Hariharpurgaghi Gaunpalika', NULL, 35, NULL, NULL),
(393, 'Pokhara Metropolitian City', NULL, 36, NULL, NULL),
(394, 'Madi Gaunpalika', NULL, 36, NULL, NULL),
(395, 'Machhapuchchhre Gaunpalika', NULL, 36, NULL, NULL),
(396, 'Annapurna Gaunpalika', NULL, 36, NULL, NULL),
(397, 'Rupa Gaunpalika', NULL, 36, NULL, NULL),
(398, 'Gorkha Municipality', NULL, 37, NULL, NULL),
(399, 'Chumanubri Gaunpalika', NULL, 37, NULL, NULL),
(400, 'Ajirkot Gaunpalika', NULL, 37, NULL, NULL),
(401, 'Barpak Sulikot Gaunpalika', NULL, 37, NULL, NULL),
(402, 'Dharche Gaunpalika', NULL, 37, NULL, NULL),
(403, 'Aarughat Gaunpalika', NULL, 37, NULL, NULL),
(404, 'Bhimsenthapa Gaunpalika', NULL, 37, NULL, NULL),
(405, 'Siranchowk Gaunpalika', NULL, 37, NULL, NULL),
(406, 'Palungtar Municipality', NULL, 37, NULL, NULL),
(407, 'Shahid Lakhan Gaunpalika', NULL, 37, NULL, NULL),
(408, 'Gandaki Gaunpalika', NULL, 37, NULL, NULL),
(409, 'Gaidakot Municipality', NULL, 38, NULL, NULL),
(410, 'Bulingtar Gaunpalika', NULL, 38, NULL, NULL),
(411, 'Baudikali Gaunpalika', NULL, 38, NULL, NULL),
(412, 'Hupsekot Gaunpalika', NULL, 38, NULL, NULL),
(413, 'Devchuli Municipality', NULL, 38, NULL, NULL),
(414, 'Kawasoti Municipality', NULL, 38, NULL, NULL),
(415, 'Madhya Bindu Municipality', NULL, 38, NULL, NULL),
(416, 'Binayi Tribeni Gaunpalika', NULL, 38, NULL, NULL),
(417, 'Modi Gaunpalika', NULL, 39, NULL, NULL),
(418, 'Jaljala Gaunpalika', NULL, 39, NULL, NULL),
(419, 'Kushma Municipality', NULL, 39, NULL, NULL),
(420, 'Phalebas Municipality', NULL, 39, NULL, NULL),
(421, 'Mahashila Gaunpalika', NULL, 39, NULL, NULL),
(422, 'Bihadi Gaunpalika', NULL, 39, NULL, NULL),
(423, 'Paiyu Gaunpalika', NULL, 39, NULL, NULL),
(424, 'Bhanu Municipality', NULL, 40, NULL, NULL),
(425, 'Byas Municipality', NULL, 40, NULL, NULL),
(426, 'Myagde Gaunpalika', NULL, 40, NULL, NULL),
(427, 'Shuklagandaki Municipality', NULL, 40, NULL, NULL),
(428, 'Bhimad Municipality', NULL, 40, NULL, NULL),
(429, 'Ghiring Gaunpalika', NULL, 40, NULL, NULL),
(430, 'Rhishing Gaunpalika', NULL, 40, NULL, NULL),
(431, 'Devghat Gaunpalika', NULL, 40, NULL, NULL),
(432, 'Bandipur Gaunpalika', NULL, 40, NULL, NULL),
(433, 'Aanbu Khaireni Gaunpalika', NULL, 40, NULL, NULL),
(434, 'Baglung Municipality', NULL, 41, NULL, NULL),
(435, 'Kathekhola Gaunpalika', NULL, 41, NULL, NULL),
(436, 'Tarakhola Gaunpalika', NULL, 41, NULL, NULL),
(437, 'Tamankhola Gaunpalika', NULL, 41, NULL, NULL),
(438, 'Dhorpatan Municipality', NULL, 41, NULL, NULL),
(439, 'Nisikhola Gaunpalika', NULL, 41, NULL, NULL),
(440, 'Badigad Gaunpalika', NULL, 41, NULL, NULL),
(441, 'Galkot Municipality', NULL, 41, NULL, NULL),
(442, 'Bareng Gaunpalika', NULL, 41, NULL, NULL),
(443, 'Jaimuni Municipality', NULL, 41, NULL, NULL),
(444, 'Beni Municipality', NULL, 42, NULL, NULL),
(445, 'Annapurna Gaunpalika', NULL, 42, NULL, NULL),
(446, 'Raghuganga Gaunpalika', NULL, 42, NULL, NULL),
(447, 'Dhawalagiri Gaunpalika', NULL, 42, NULL, NULL),
(448, 'Malika Gaunpalika', NULL, 42, NULL, NULL),
(449, 'Mangala Gaunpalika', NULL, 42, NULL, NULL),
(450, 'Besisahar Municipality', NULL, 43, NULL, NULL),
(451, 'Dordi Gaunpalika', NULL, 43, NULL, NULL),
(452, 'Marshyangdi Gaunpalika', NULL, 43, NULL, NULL),
(453, 'Kwhola Sothar Gaunpalika', NULL, 43, NULL, NULL),
(454, 'Madhya Nepal Municipality', NULL, 43, NULL, NULL),
(455, 'Sundarbazar Municipality', NULL, 43, NULL, NULL),
(456, 'Rainas Municipality', NULL, 43, NULL, NULL),
(457, 'Dudhapokhari Gaunpalika', NULL, 43, NULL, NULL),
(458, 'Putalibazar Municipality', NULL, 44, NULL, NULL),
(459, 'Phedikhola Gaunpalika', NULL, 44, NULL, NULL),
(460, 'Aandhikhola Gaunpalika', NULL, 44, NULL, NULL),
(461, 'Arjun Choupari Gaunpalika', NULL, 44, NULL, NULL),
(462, 'Bhirkot Municipality', NULL, 44, NULL, NULL),
(463, 'Biruwa Gaunpalika', NULL, 44, NULL, NULL),
(464, 'Harinas Gaunpalika', NULL, 44, NULL, NULL),
(465, 'Chapakot Municipality', NULL, 44, NULL, NULL),
(466, 'Walling Municipality', NULL, 44, NULL, NULL),
(467, 'Galyang Municipality', NULL, 44, NULL, NULL),
(468, 'Kaligandaki Gaunpalika', NULL, 44, NULL, NULL),
(469, 'Narpa Bhumi Gaunpalika', NULL, 45, NULL, NULL),
(470, 'Manang Ngisyang Gaunpalika', NULL, 45, NULL, NULL),
(471, 'Chame Gaunpalika', NULL, 45, NULL, NULL),
(472, 'Nason Gaunpalika', NULL, 45, NULL, NULL),
(473, 'Lo Ghekar Damodarkunda Gaunpalika', NULL, 46, NULL, NULL),
(474, 'Gharpajhong Gaunpalika', NULL, 46, NULL, NULL),
(475, 'Varagung Muktichhetra Gaunpalika', NULL, 46, NULL, NULL),
(476, 'Lomanthang Gaunpalika', NULL, 46, NULL, NULL),
(477, 'Thasang Gaunpalika', NULL, 46, NULL, NULL),
(478, 'Bardaghat Municipality', NULL, 47, NULL, NULL),
(479, 'Sunawal Municipality', NULL, 47, NULL, NULL),
(480, 'Ramgram Municipality', NULL, 47, NULL, NULL),
(481, 'Palhinandan Gaunpalika', NULL, 47, NULL, NULL),
(482, 'Sarawal Gaunpalika', NULL, 47, NULL, NULL),
(483, 'Pratapapur Gaunpalika', NULL, 47, NULL, NULL),
(484, 'Susta Gaunpalika', NULL, 47, NULL, NULL),
(485, 'Ghorahi Sub-Metropolitan City', NULL, 48, NULL, NULL),
(486, 'Tulsipur Sub-Metropolitan City', NULL, 48, NULL, NULL),
(487, 'Bangalachuli Gaunpalika', NULL, 48, NULL, NULL),
(488, 'Shantinagar Gaunpalika', NULL, 48, NULL, NULL),
(489, 'Babai Gaunpalika', NULL, 48, NULL, NULL),
(490, 'Dangisharan Gaunpalika', NULL, 48, NULL, NULL),
(491, 'Lamahi Municipality', NULL, 48, NULL, NULL),
(492, 'Rapti Gaunpalika', NULL, 48, NULL, NULL),
(493, 'Gadhawa Gaunpalika', NULL, 48, NULL, NULL),
(494, 'Rajpur Gaunpalika', NULL, 48, NULL, NULL),
(495, 'Musikot Municipality', NULL, 49, NULL, NULL),
(496, 'Kali Gandaki Gaunpalika', NULL, 49, NULL, NULL),
(497, 'Satyawoti Gaunpalika', NULL, 49, NULL, NULL),
(498, 'Chandrakot Gaunpalika', NULL, 49, NULL, NULL),
(499, 'Isma Gaunpalika', NULL, 49, NULL, NULL),
(500, 'Malika Gaunpalika', NULL, 49, NULL, NULL),
(501, 'Madane Gaunpalika', NULL, 49, NULL, NULL),
(502, 'Dhurkot Gaunpalika', NULL, 49, NULL, NULL),
(503, 'Resunga Municipality', NULL, 49, NULL, NULL),
(504, 'Gulmi Durbar Gaunpalika', NULL, 48, NULL, NULL),
(505, 'Chhatrakot Gaunpalika', NULL, 49, NULL, NULL),
(506, 'Ruruchhetra Gaunpalika', NULL, 49, NULL, NULL),
(507, 'Banganga Municipality', NULL, 50, NULL, NULL),
(508, 'Buddhabhumi Municipality', NULL, 50, NULL, NULL),
(509, 'Shivaraj Municipality', NULL, 50, NULL, NULL),
(510, 'Bijayanagar Gaunpalika', NULL, 50, NULL, NULL),
(511, 'Krishnanagar Municipality', NULL, 50, NULL, NULL),
(512, 'Maharajganj Municipality', NULL, 50, NULL, NULL),
(513, 'Kapilbastu Municipality', NULL, 50, NULL, NULL),
(514, 'Yasodhara Gaunpalika', NULL, 50, NULL, NULL),
(515, 'Mayadevi Gaunpalika', NULL, 50, NULL, NULL),
(516, 'Shuddhodhan Gaunpalika', NULL, 50, NULL, NULL),
(517, 'Bhumikasthan Municipality', NULL, 51, NULL, NULL),
(518, 'Chhatradev Gaunpalika', NULL, 51, NULL, NULL),
(519, 'Malarani Gaunpalika', NULL, 51, NULL, NULL),
(520, 'Sandhikharka Municipality', NULL, 51, NULL, NULL),
(521, 'Panini Gaunpalika', NULL, 51, NULL, NULL),
(522, 'Shitaganga Municipality', NULL, 51, NULL, NULL),
(523, 'Rampur Municipality', NULL, 52, NULL, NULL),
(524, 'Purbakhola Gaunpalika', NULL, 52, NULL, NULL),
(525, 'Rambha Gaunpalika', NULL, 52, NULL, NULL),
(526, 'Baganaskali Gaunpalika', NULL, 52, NULL, NULL),
(527, 'Tansen Municipality', NULL, 52, NULL, NULL),
(528, 'Ribdikot Gaunpalika', NULL, 52, NULL, NULL),
(529, 'Rainadevi Chhahara Gaunpalika', NULL, 52, NULL, NULL),
(530, 'Tinau Gaunpalika', NULL, 52, NULL, NULL),
(531, 'Mathagadhi Gaunpalika', NULL, 52, NULL, NULL),
(532, 'Nisdi Gaunpalika', NULL, 52, NULL, NULL),
(533, 'Putha Uttanganga Gaunpalika', NULL, 53, NULL, NULL),
(534, 'Sisne Gaunpalika', NULL, 53, NULL, NULL),
(535, 'Bhoome Gaunpalika', NULL, 53, NULL, NULL),
(536, 'Gaumukhi Gaunpalika', NULL, 54, NULL, NULL),
(537, 'Naubahini Gaunpalika', NULL, 54, NULL, NULL),
(538, 'Jhimaruk Gaunpalika', NULL, 54, NULL, NULL),
(539, 'Pyuthan Municipality', NULL, 54, NULL, NULL),
(540, 'Sworgadwari Municipality', NULL, 54, NULL, NULL),
(541, 'Mandavi Gaunpalika', NULL, 54, NULL, NULL),
(542, 'Mallarani Gaunpalika', NULL, 54, NULL, NULL),
(543, 'Aairawati Gaunpalika', NULL, 54, NULL, NULL),
(544, 'Sarumarani Gaunpalika', NULL, 54, NULL, NULL),
(545, 'Nepalganj Sub-Metropolitan City', NULL, 55, NULL, NULL),
(546, 'Rapti Sonari Gaunpalika', NULL, 55, NULL, NULL),
(547, 'Kohalpur Municipality', NULL, 55, NULL, NULL),
(548, 'Baijanath Gaunpalika', NULL, 55, NULL, NULL),
(549, 'Khajura Gaunpalika', NULL, 55, NULL, NULL),
(550, 'Janaki Gaunpalika', NULL, 55, NULL, NULL),
(551, 'Duduwa Gaunpalika', NULL, 55, NULL, NULL),
(552, 'Narainapur Gaunpalika', NULL, 55, NULL, NULL),
(553, 'Bansgadhi Municipality', NULL, 56, NULL, NULL),
(554, 'Barbardiya Municipality', NULL, 56, NULL, NULL),
(555, 'Thakurbaba Municipality', NULL, 56, NULL, NULL),
(556, 'Geruwa Gaunpalika', NULL, 56, NULL, NULL),
(557, 'Rajapur Municipality', NULL, 56, NULL, NULL),
(558, 'Madhuwan Municipality', NULL, 56, NULL, NULL),
(559, 'Gulariya Municipality', NULL, 56, NULL, NULL),
(560, 'Baijanath Gaunpalika', NULL, 55, NULL, NULL),
(561, 'Butwal Sub-Metropolitian City', NULL, 57, NULL, NULL),
(562, 'Devdaha Municipality', NULL, 57, NULL, NULL),
(563, 'Sainamaina Municipality', NULL, 57, NULL, NULL),
(564, 'Kanchan Gaunpalika', NULL, 57, NULL, NULL),
(565, 'Gaidahawa Gaunpalika', NULL, 57, NULL, NULL),
(566, 'Suddhodhan Gaunpalika', NULL, 57, NULL, NULL),
(567, 'Siyari Gaunpalika', NULL, 57, NULL, NULL),
(568, 'Tilottama Municipality', NULL, 57, NULL, NULL),
(569, 'Om Satiya Gaunpalika', NULL, 57, NULL, NULL),
(570, 'Rohini Gaunpalika', NULL, 57, NULL, NULL),
(571, 'Siddharthanagar Municipality', NULL, 57, NULL, NULL),
(572, 'Mayadevi Gaunpalika', NULL, 57, NULL, NULL),
(573, 'Lumbini Sanskritik Municipality', NULL, 57, NULL, NULL),
(574, 'Kotahimai Gaunpalika', NULL, 57, NULL, NULL),
(575, 'Sammarimai Gaunpalika', NULL, 57, NULL, NULL),
(576, 'Marchawari Gaunpalika', NULL, 57, NULL, NULL),
(577, 'Sunchhahari Gaunpalika', NULL, 58, NULL, NULL),
(578, 'Thawang Gaunpalika', NULL, 58, NULL, NULL),
(579, 'Pariwartan Gaunpalika', NULL, 58, NULL, NULL),
(580, 'Gangadev Gaunpalika', NULL, 58, NULL, NULL),
(581, 'Madi Gaunpalika', NULL, 58, NULL, NULL),
(582, 'Tribeni Gaunpalika', NULL, 58, NULL, NULL),
(583, 'Rolpa Municipality', NULL, 58, NULL, NULL),
(584, 'Runtigadhi Gaunpalika', NULL, 58, NULL, NULL),
(585, 'Sunil Smriti Gaunpalika', NULL, 58, NULL, NULL),
(586, 'Lungri Gaunpalika', NULL, 58, NULL, NULL),
(587, 'Aathabisakot Municipality', NULL, 59, NULL, NULL),
(588, 'Sanibheri Gaunpalika', NULL, 59, NULL, NULL),
(589, 'Banphikot Gaunpalika', NULL, 59, NULL, NULL),
(590, 'Musikot Municipality', NULL, 59, NULL, NULL),
(591, 'Tribeni Gaunpalika', NULL, 59, NULL, NULL),
(592, 'Chaurjahari Municipality', NULL, 59, NULL, NULL),
(593, 'Chhayanath Rara Municipality', NULL, 60, NULL, NULL),
(594, 'Mugumakarmarog Gaunpalika', NULL, 60, NULL, NULL),
(595, 'Soru Gaunpalika', NULL, 60, NULL, NULL),
(596, 'Khatyad Gaunpalika', NULL, 60, NULL, NULL),
(597, 'Aathbis Municipality', NULL, 61, NULL, NULL),
(598, 'Naumule Gaunpalika', NULL, 61, NULL, NULL),
(599, 'Mahabu Gaunpalika', NULL, 61, NULL, NULL),
(600, 'Bhairabi Gaunpalika', NULL, 61, NULL, NULL),
(601, 'Thantikandh Gaunpalika', NULL, 61, NULL, NULL),
(602, 'Chamunda Bindrasaini Municipality', NULL, 61, NULL, NULL),
(603, 'Dullu Municipality', NULL, 61, NULL, NULL),
(604, 'Narayan Municipality', NULL, 61, NULL, NULL),
(605, 'Bhagawatimai Gaunpalika', NULL, 61, NULL, NULL),
(606, 'Dungeshwor Gaunpalika', NULL, 61, NULL, NULL),
(607, 'Gurans Gaunpalika', NULL, 61, NULL, NULL),
(608, 'Tripurasundari Municipality', NULL, 62, NULL, NULL),
(609, 'Dolpo Buddha Gaunpalika', NULL, 62, NULL, NULL),
(610, 'Shey Phoksundo Gaunpalika', NULL, 62, NULL, NULL),
(611, 'Jagadulla Gaunpalika', NULL, 62, NULL, NULL),
(612, 'Mudkechula Gaunpalika', NULL, 62, NULL, NULL),
(613, 'Thulibheri Municipality', NULL, 62, NULL, NULL),
(614, 'Kaike Gaunpalika', NULL, 62, NULL, NULL),
(615, 'Chharka Tangsong Gaunpalika', NULL, 62, NULL, NULL),
(616, 'Chhedagad Municipality', NULL, 64, NULL, NULL),
(617, 'Barekot Gaunpalika', NULL, 64, NULL, NULL),
(618, 'Kuse Gaunpalika', NULL, 64, NULL, NULL),
(619, 'Junichande Gaunpalika', NULL, 64, NULL, NULL),
(620, 'Shivalaya Gaunpalika', NULL, 64, NULL, NULL),
(621, 'Bheri Malika Municipality', NULL, 64, NULL, NULL),
(622, 'Nalgad Municipality', NULL, 64, NULL, NULL),
(623, 'Raskot Municipality', NULL, 65, NULL, NULL),
(624, 'Palata Gaunpalika', NULL, 65, NULL, NULL),
(625, 'Pachal Jharana Gaunpalika', NULL, 65, NULL, NULL),
(626, 'Sanni Tribeni Gaunpalika', NULL, 65, NULL, NULL),
(627, 'Naraharinath Gaunpalika', NULL, 65, NULL, NULL),
(628, 'Khandachakra Municipality', NULL, 65, NULL, NULL),
(629, 'Tilagupha Municipality', NULL, 65, NULL, NULL),
(630, 'Mahawai Gaunpalika', NULL, 65, NULL, NULL),
(631, 'Shuva Kalika Gaunpalika', NULL, 65, NULL, NULL),
(632, 'Banagad Kupinde Municipality', NULL, 66, NULL, NULL),
(633, 'Darma Gaunpalika', NULL, 66, NULL, NULL),
(634, 'Kumakh Gaunpalika', NULL, 66, NULL, NULL),
(635, 'Siddha Kumakh Gaunpalika', NULL, 66, NULL, NULL),
(636, 'Bagachour Municipality', NULL, 66, NULL, NULL),
(637, 'Chhatreshwori Gaunpalika', NULL, 66, NULL, NULL),
(638, 'Sharada Municipality', NULL, 66, NULL, NULL),
(639, 'Kalimati Gaunpalika', NULL, 66, NULL, NULL),
(640, 'Tribeni Gaunpalika', NULL, 66, NULL, NULL),
(641, 'Kapurkot Gaunpalika', NULL, 66, NULL, NULL),
(642, 'Birendranagar Municipality', NULL, 67, NULL, NULL),
(643, 'Simta Gaunpalika', NULL, 67, NULL, NULL),
(644, 'Chingad Gaunpalika', NULL, 67, NULL, NULL),
(645, 'Lekabeshi Municipality', NULL, 67, NULL, NULL),
(646, 'Gurbhakot Municipality', NULL, 67, NULL, NULL),
(647, 'Bheriganga Municipality', NULL, 67, NULL, NULL),
(648, 'Barahatal Gaunpalika', NULL, 67, NULL, NULL),
(649, 'Panchapuri Municipality', NULL, 67, NULL, NULL),
(650, 'Chaukune Gaunpalika', NULL, 67, NULL, NULL),
(651, 'Chankheli Gaunpalika', NULL, 68, NULL, NULL),
(652, 'Kharpunath Gaunpalika', NULL, 68, NULL, NULL),
(653, 'Simkot Gaunpalika', NULL, 68, NULL, NULL),
(654, 'Namkha Gaunpalika', NULL, 68, NULL, NULL),
(655, 'Sarkegad Gaunpalika', NULL, 68, NULL, NULL),
(656, 'Adanchuli Gaunpalika', NULL, 68, NULL, NULL),
(657, 'Tanjakot Gaunpalika', NULL, 68, NULL, NULL),
(658, 'Dhangadhi Sub-Metropolitian City', NULL, 69, NULL, NULL),
(659, 'Mohanyal Gaunpalika', NULL, 69, NULL, NULL),
(660, 'Chure Gaunpalika', NULL, 69, NULL, NULL),
(661, 'Godawari Municipality', NULL, 69, NULL, NULL),
(662, 'Gauriganga Municipality', NULL, 69, NULL, NULL),
(663, 'Ghodaghodi Municipality', NULL, 69, NULL, NULL),
(664, 'Bardagoriya Gaunpalika', NULL, 69, NULL, NULL),
(665, 'Lamki Chuha Municipality', NULL, 69, NULL, NULL),
(666, 'Janaki Gaunpalika', NULL, 69, NULL, NULL),
(667, 'Joshipur Gaunpalika', NULL, 69, NULL, NULL),
(668, 'Tikapur Municipality', NULL, 69, NULL, NULL),
(669, 'Bhajani Municipality', NULL, 69, NULL, NULL),
(670, 'Kailari Gaunpalika', NULL, 69, NULL, NULL),
(671, 'Krishnapur Municipality', NULL, 70, NULL, NULL),
(672, 'Shuklaphanta Municipality', NULL, 70, NULL, NULL),
(673, 'Bedkot Municipality', NULL, 70, NULL, NULL),
(674, 'Bhimdatta Municipality', NULL, 70, NULL, NULL),
(675, 'Dodhara Chandani Municipality', NULL, 70, NULL, NULL),
(676, 'Laljhadi Gaunpalika', NULL, 70, NULL, NULL),
(677, 'Punarbas Municipality', NULL, 70, NULL, NULL),
(678, 'Belouri Municipality', NULL, 70, NULL, NULL),
(679, 'Beldandi Gaunpalika', NULL, 70, NULL, NULL),
(680, 'Panchdebal Binayak Municipality', NULL, 71, NULL, NULL),
(681, 'Ramaroshan Gaunpalika', NULL, 71, NULL, NULL),
(682, 'Mellekh Gaunpalika', NULL, 71, NULL, NULL),
(683, 'Sanphebagar Municipality', NULL, 71, NULL, NULL),
(684, 'Chaurpati Gaunpalika', NULL, 71, NULL, NULL),
(685, 'Mangalsen Municipality', NULL, 71, NULL, NULL),
(686, 'Bannigadhi Jayagadh Gaunpalika', NULL, 71, NULL, NULL),
(687, 'Kamal bazar Municipality', NULL, 71, NULL, NULL),
(688, 'Dhakari Gaunpalika', NULL, 71, NULL, NULL),
(689, 'Turmakhand Gaunpalika', NULL, 71, NULL, NULL),
(690, 'Parashuram Municipality', NULL, 72, NULL, NULL),
(691, 'Nawadurga Gaunpalika', NULL, 72, NULL, NULL),
(692, 'Amargadhi Municipality', NULL, 72, NULL, NULL),
(693, 'Ajayameru Gaunpalika', NULL, 72, NULL, NULL),
(694, 'Bhageshwor Gaunpalika', NULL, 72, NULL, NULL),
(695, 'Aalital Gaunpalika', NULL, 72, NULL, NULL),
(696, 'Ganyapdhura Gaunpalika', NULL, 72, NULL, NULL),
(697, 'Shikhar Municipality', NULL, 73, NULL, NULL),
(698, 'Purbichouki Gaunpalika', NULL, 73, NULL, NULL),
(699, 'Sayal Gaunpalika', NULL, 73, NULL, NULL),
(700, 'Aadarsha Gaunpalika', NULL, 73, NULL, NULL),
(701, 'Dipayal Silgadhi Municipality', NULL, 73, NULL, NULL),
(702, 'K.I. Singh Gaunpalika', NULL, 73, NULL, NULL),
(703, 'Bogatan Phudsil Gaunpalika', NULL, 73, NULL, NULL),
(704, 'Badi Kedar Gaunpalika', NULL, 73, NULL, NULL),
(705, 'Jorayal Gaunpalika', NULL, 73, NULL, NULL),
(706, 'Shailyashikhar Municipality', NULL, 74, NULL, NULL),
(707, 'Byas Gaunpalika', NULL, 74, NULL, NULL),
(708, 'Duhun Gaunpalika', NULL, 74, NULL, NULL),
(709, 'Mahakali Municipality', NULL, 74, NULL, NULL),
(710, 'Naugad Gaunpalika', NULL, 74, NULL, NULL),
(711, 'Apihimal Gaunpalika', NULL, 74, NULL, NULL),
(712, 'Marma Gaunpalika', NULL, 74, NULL, NULL),
(713, 'Malikarjun Gaunpalika', NULL, 74, NULL, NULL),
(714, 'Lekam Gaunpalika', NULL, 74, NULL, NULL),
(715, 'Bungal Municipality', NULL, 75, NULL, NULL),
(716, 'Saipal Gaunpalika', NULL, 75, NULL, NULL),
(717, 'Surma Gaunpalika', NULL, 75, NULL, NULL),
(718, 'Talkot Gaunpalika', NULL, 75, NULL, NULL),
(719, 'Masta Gaunpalika', NULL, 75, NULL, NULL),
(720, 'Jayaprithbi Municipality', NULL, 75, NULL, NULL),
(721, 'Chhabis Pathibhara Gaunpalika', NULL, 75, NULL, NULL),
(722, 'Durgathali Gaunpalika', NULL, 75, NULL, NULL),
(723, 'Kedarsyun Gaunpalika', NULL, 75, NULL, NULL),
(724, 'Bitthadchir Gaunpalika', NULL, 75, NULL, NULL),
(725, 'Thalara Gaunpalika', NULL, 75, NULL, NULL),
(726, 'Khaptad Chhanna Gaunpalika', NULL, 75, NULL, NULL),
(727, 'Badimalika Municipality', NULL, 76, NULL, NULL),
(728, 'Himali Gaunpalika', NULL, 76, NULL, NULL),
(729, 'Gaumul Gaunpalika', NULL, 76, NULL, NULL),
(730, 'Budhinanda Municipality', NULL, 76, NULL, NULL),
(731, 'Swamikartik Khapar Gaunpalika', NULL, 76, NULL, NULL),
(732, 'Jagannath Gaunpalika', NULL, 76, NULL, NULL),
(733, 'Khaptad Chhededaha Gaunpalika', NULL, 76, NULL, NULL),
(734, 'Budhiganga Municipality', NULL, 76, NULL, NULL),
(735, 'Tribeni Municipality', NULL, 76, NULL, NULL),
(736, 'Patan Municipality', NULL, 77, NULL, NULL),
(737, 'Dilasaini Gaunpalika', NULL, 77, NULL, NULL),
(738, 'Dogada Kedar Gaunpalika', NULL, 77, NULL, NULL),
(739, 'Puchaundi Municipality', NULL, 77, NULL, NULL),
(740, 'Surnaya Gaunpalika', NULL, 77, NULL, NULL),
(741, 'Dasharathchand Municipality', NULL, 77, NULL, NULL),
(742, 'Pancheshwor Gaunpalika', NULL, 77, NULL, NULL),
(743, 'Shivanath Gaunpalika', NULL, 77, NULL, NULL),
(744, 'Melauli Municipality', NULL, 77, NULL, NULL),
(745, 'Sigas Gaunpalika', NULL, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `logo`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Digisoft Developers Pvt. Ltd.', '1726742453_digisoft.png', 'https://www.digisoftdev.info/', '2024-09-19 04:55:53', '2024-09-19 05:13:57'),
(2, 'Archiesoft Technology', '1726743711_archiesoftt.png', 'https://archiesoft.com.np/', '2024-09-19 05:16:28', '2024-09-19 05:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `payment_receipt` varchar(255) NOT NULL,
  `payment_confirmation` tinyint(1) NOT NULL DEFAULT 0,
  `admin_payment_confirmation` tinyint(1) NOT NULL DEFAULT 0,
  `rejection_reason` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `business`, `payment_receipt`, `payment_confirmation`, `admin_payment_confirmation`, `rejection_reason`, `created_at`, `updated_at`) VALUES
(4, 2, '1727081465.jpg', 1, 0, NULL, '2024-09-15 23:13:04', '2024-09-29 06:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_photo` varchar(255) NOT NULL,
  `accountholder_bank_name` varchar(255) NOT NULL,
  `accountholder_name` varchar(255) NOT NULL,
  `accountholder_number` varchar(255) NOT NULL,
  `accountholder_branch` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `qr_photo`, `accountholder_bank_name`, `accountholder_name`, `accountholder_number`, `accountholder_branch`, `created_at`, `updated_at`) VALUES
(1, 'qr_photos/LZH0gYPrOTolvxoOBVC2snnFtNtCU13VTd2yPKV9.png', 'Global IME Bank', 'Khoj Sansar Nepal', '321412434444', 'Kumaripati', '2024-09-15 06:01:34', '2024-09-15 21:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 'Koshi Pradesh', NULL, NULL),
(2, 'Madhesh Pradesh', NULL, NULL),
(3, 'Bagmati Pradesh', NULL, NULL),
(4, 'Gandaki Pradesh', NULL, NULL),
(5, 'Lumbini Pradesh', NULL, NULL),
(6, 'Karnali Pradesh', NULL, NULL),
(7, 'Sudurpachchim Pradesh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `business_id`, `name`, `email`, `review`, `rating`, `approved`, `rejected`, `created_at`, `updated_at`) VALUES
(1, 2, 'Lana Peterson', 'tyveb@mailinator.com', 'Your restaurant is so bad. Poor Service.', 1, 0, 1, '2024-09-24 02:58:34', '2024-09-24 03:32:09'),
(2, 2, 'Ryan Parsons', 'febilixus@mailinator.com', 'The service, ambience and the food is wow. Love it.', 4, 1, 0, '2024-09-24 03:32:41', '2024-09-24 03:32:56'),
(3, 2, 'Thaddeus Howard', 'vinybuwij@mailinator.com', 'Good', 5, 1, 0, '2024-09-24 04:22:59', '2024-09-24 04:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_logo`, `created_at`, `updated_at`) VALUES
(1, 'Buffet Service', '1725172163.png', '2024-09-01 00:39:23', '2024-09-01 00:48:23'),
(2, 'Cafeteria Service', '1725172383.png', '2024-09-01 00:48:03', '2024-09-01 00:48:30'),
(3, 'French Service', '1725172662.png', '2024-09-01 00:52:42', '2024-09-01 00:52:42'),
(4, 'Room Service', '1725172751.png', '2024-09-01 00:54:11', '2024-09-01 00:54:11'),
(5, 'American Service', '1725173058.png', '2024-09-01 00:55:46', '2024-09-01 00:59:18'),
(6, 'Attentive', '1725173175.png', '2024-09-01 01:01:15', '2024-09-01 01:01:15'),
(7, 'Efficiency', '1725173285.png', '2024-09-01 01:03:05', '2024-09-01 01:03:05'),
(8, 'Regular check-ons', '1725173493.png', '2024-09-01 01:06:33', '2024-09-01 01:06:33'),
(9, 'English service', '1725173705.png', '2024-09-01 01:10:05', '2024-09-01 01:10:05'),
(10, 'Farewell with a smile', '1725173713.png', '2024-09-01 01:10:13', '2024-09-01 01:10:13'),
(11, 'Food Court', '1725173871.png', '2024-09-01 01:12:51', '2024-09-01 01:12:51'),
(12, 'Russian service', '1725173953.png', '2024-09-01 01:14:13', '2024-09-01 01:14:13'),
(13, 'Self-Service', '1725174060.png', '2024-09-01 01:16:00', '2024-09-01 01:16:00'),
(14, 'Silver Service', '1725174186.png', '2024-09-01 01:18:06', '2024-09-01 01:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `slider_images` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_title`, `logo`, `caption`, `slider_images`, `created_at`, `updated_at`) VALUES
(1, 'KhojSansar Nepal', '1726729984_logo-khoj.png', 'AnyTime, AnyWhere & AnyThing', '[\"1726726877_slider01.jpg\",\"1726726885_slider02.jpg\",\"1726726885_slider03.jpg\"]', '2024-09-18 23:23:16', '2024-09-29 06:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `slider_photos_videos`
--

CREATE TABLE `slider_photos_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `photosvideos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_photos_videos`
--

INSERT INTO `slider_photos_videos` (`id`, `business`, `photosvideos`, `created_at`, `updated_at`) VALUES
(94, 2, '1727066131_slider03.jpg', '2024-09-22 22:50:31', '2024-09-22 22:50:31'),
(95, 2, '1727066132_slider01.jpg', '2024-09-22 22:50:32', '2024-09-22 22:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business` bigint(20) UNSIGNED NOT NULL,
  `special_name` varchar(255) NOT NULL,
  `short_detail` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `business`, `special_name`, `short_detail`, `price`, `photo`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kothey Momo', 'Delicious, yummy with 4 different pickles.', 'Rs. 200', 'special_photos/uumAisCJ86yn0JTgHABAH4IoJx0GLS6jCIvEM5od.jpg', '2024-09-16 22:20:26', '2024-09-22 04:40:55'),
(2, 2, 'Pineapple Pizza', 'Sweet But Hot & Spicy', 'Rs. 400', NULL, '2024-09-16 22:20:26', '2024-09-16 22:20:26'),
(3, 2, 'Hell Chips', 'Too Fire', 'Rs. 300', NULL, '2024-09-16 22:20:26', '2024-09-16 22:20:26'),
(4, 2, 'Banana Momo', 'Get a taste of delicious vegan food', 'Rs. 200', NULL, '2024-09-16 22:21:34', '2024-09-16 22:30:25'),
(5, 2, 'Korean Food Family Pack', 'Full Meal', 'Rs. 3000', NULL, '2024-09-16 22:21:34', '2024-09-16 22:30:49'),
(9, 3, 'Special Dish', 'Short Detail', 'Price', NULL, '2024-10-08 05:04:03', '2024-10-08 05:04:03'),
(10, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:05:34', '2024-10-08 05:05:34'),
(11, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:05:49', '2024-10-08 05:05:49'),
(12, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:05:51', '2024-10-08 05:05:51'),
(13, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:05:52', '2024-10-08 05:05:52'),
(14, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:05:53', '2024-10-08 05:05:53'),
(15, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:07:26', '2024-10-08 05:07:26'),
(16, 3, 'Special Dish,nth,urs', 'Short Detail,hey', 'rs.200,rs.100', NULL, '2024-10-08 05:07:33', '2024-10-08 05:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `photo`, `address`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Tashika Singh', NULL, 'Balaju, Kathmandu', 'KhojSansar Nepal has completely transformed how I explore restaurants across the country! Whether I\'m looking for a cozy cafe in Kathmandu or a hidden gem in Pokhara, the platform provides all the details I need in one place. It\'s so easy to find the perfect dining spot, check ratings, and even see the latest offers. Truly a must-have for foodies and travelers alike!', '2024-09-18 22:12:50', '2024-09-18 22:12:50'),
(2, 'Buddhi Dangol', NULL, 'Khokana, Lalitpur', 'KhojSansar Nepal is my go-to platform for finding the best restaurants around the country! It’s incredibly convenient to search by location and explore detailed info about each place. Whether I’m planning a trip or just looking for a new spot in town, KhojSansar Nepal never disappoints. Highly recommend it for anyone who loves discovering great food!', '2024-09-18 22:26:27', '2024-09-18 22:26:27'),
(3, 'Aditi Pradhan', NULL, 'Gwarko, Lalitpur', 'I love how KhojSansar Nepal makes restaurant hunting so effortless! From local favorites to hidden gems, I can quickly find all the info I need, like menus, reviews, and special offers. It’s the perfect companion for food lovers who want to explore the diverse dining scene across Nepal!', '2024-09-18 22:27:25', '2024-09-18 22:27:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorizes`
--
ALTER TABLE `authorizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_customer_foreign` (`customer`),
  ADD KEY `businesses_state_foreign` (`state`),
  ADD KEY `businesses_district_foreign` (`district`),
  ADD KEY `businesses_municipality_foreign` (`municipality`);

--
-- Indexes for table `business_facilities`
--
ALTER TABLE `business_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_facilities_facility_foreign` (`facility`),
  ADD KEY `business_facilities_business_foreign` (`business`);

--
-- Indexes for table `business_menus`
--
ALTER TABLE `business_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_menus_menu_topic_foreign` (`menu_topic`),
  ADD KEY `business_menus_business_foreign` (`business`);

--
-- Indexes for table `business_services`
--
ALTER TABLE `business_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_services_service_foreign` (`service`),
  ADD KEY `business_services_business_foreign` (`business`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `customers_otp_unique` (`otp`),
  ADD KEY `customers_permanent_district_foreign` (`permanent_district`),
  ADD KEY `customers_permanent_state_foreign` (`permanent_state`),
  ADD KEY `customers_permanent_municipality_foreign` (`permanent_municipality`),
  ADD KEY `customers_temporary_district_foreign` (`temporary_district`),
  ADD KEY `customers_temporary_state_foreign` (`temporary_state`),
  ADD KEY `customers_temporary_municipality_foreign` (`temporary_municipality`),
  ADD KEY `customers_authorize_foreign` (`authorize`),
  ADD KEY `customers_category_foreign` (`category`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_photos_videos`
--
ALTER TABLE `gallery_photos_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_photos_videos_business_foreign` (`business`);

--
-- Indexes for table `khojsansar_services`
--
ALTER TABLE `khojsansar_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_location_banner_restaurants`
--
ALTER TABLE `main_location_banner_restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_location_banner_restaurants_district_id_foreign` (`district_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_pdfs`
--
ALTER TABLE `menu_pdfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_pdfs_business_foreign` (`business`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_district_id_foreign` (`district_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_business_foreign` (`business`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_business_id_foreign` (`business_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_photos_videos`
--
ALTER TABLE `slider_photos_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_photos_videos_business_foreign` (`business`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specials_business_foreign` (`business`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authorizes`
--
ALTER TABLE `authorizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_facilities`
--
ALTER TABLE `business_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `business_menus`
--
ALTER TABLE `business_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `business_services`
--
ALTER TABLE `business_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery_photos_videos`
--
ALTER TABLE `gallery_photos_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `khojsansar_services`
--
ALTER TABLE `khojsansar_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_location_banner_restaurants`
--
ALTER TABLE `main_location_banner_restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_pdfs`
--
ALTER TABLE `menu_pdfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_photos_videos`
--
ALTER TABLE `slider_photos_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_customer_foreign` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `businesses_district_foreign` FOREIGN KEY (`district`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `businesses_municipality_foreign` FOREIGN KEY (`municipality`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `businesses_state_foreign` FOREIGN KEY (`state`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `business_facilities`
--
ALTER TABLE `business_facilities`
  ADD CONSTRAINT `business_facilities_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`),
  ADD CONSTRAINT `business_facilities_facility_foreign` FOREIGN KEY (`facility`) REFERENCES `facilities` (`id`);

--
-- Constraints for table `business_menus`
--
ALTER TABLE `business_menus`
  ADD CONSTRAINT `business_menus_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`),
  ADD CONSTRAINT `business_menus_menu_topic_foreign` FOREIGN KEY (`menu_topic`) REFERENCES `menus` (`id`);

--
-- Constraints for table `business_services`
--
ALTER TABLE `business_services`
  ADD CONSTRAINT `business_services_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`),
  ADD CONSTRAINT `business_services_service_foreign` FOREIGN KEY (`service`) REFERENCES `services` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_authorize_foreign` FOREIGN KEY (`authorize`) REFERENCES `authorizes` (`id`),
  ADD CONSTRAINT `customers_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `customers_permanent_district_foreign` FOREIGN KEY (`permanent_district`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `customers_permanent_municipality_foreign` FOREIGN KEY (`permanent_municipality`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `customers_permanent_state_foreign` FOREIGN KEY (`permanent_state`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `customers_temporary_district_foreign` FOREIGN KEY (`temporary_district`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `customers_temporary_municipality_foreign` FOREIGN KEY (`temporary_municipality`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `customers_temporary_state_foreign` FOREIGN KEY (`temporary_state`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `gallery_photos_videos`
--
ALTER TABLE `gallery_photos_videos`
  ADD CONSTRAINT `gallery_photos_videos_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_location_banner_restaurants`
--
ALTER TABLE `main_location_banner_restaurants`
  ADD CONSTRAINT `main_location_banner_restaurants_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `menu_pdfs`
--
ALTER TABLE `menu_pdfs`
  ADD CONSTRAINT `menu_pdfs_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`);

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_email_foreign` FOREIGN KEY (`email`) REFERENCES `customers` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_photos_videos`
--
ALTER TABLE `slider_photos_videos`
  ADD CONSTRAINT `slider_photos_videos_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specials`
--
ALTER TABLE `specials`
  ADD CONSTRAINT `specials_business_foreign` FOREIGN KEY (`business`) REFERENCES `businesses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
