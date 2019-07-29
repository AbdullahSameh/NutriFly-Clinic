-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 02:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `apartment` int(11) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `mobile2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city`, `area`, `street`, `building`, `floor`, `apartment`, `landmark`, `mobile`, `mobile2`) VALUES
(6, 1, 'cairo', 'helwan', '2', '101', 3, 3, 'omar el khatb', '01113509117', '01279730956'),
(7, 1, 'cairo', 'helwan', '2', '101', 3, 3, 'omar el khatb', '01113509117', '01279730956');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `name_ar`, `status`) VALUES
(1, '6dbab52ab576bcf33107d2ecac75f397268f6f83_2e1e4341ab557f78fa78ab89809839c7e62aafb4.jpeg', 'Diet &amp; Fitness', 'رشاقة وتخسيس', 'enabled'),
(2, 'f8ed6214b9aeeb0db271411eb7f5913bc9dee871_fdf517e4fece68273fdd7e8ec9cdc4fa19495328.jpeg', 'Immunity', 'المناعة', 'enabled'),
(3, '8324618c91184769bbd189366c8c1fbf285d31a9_d612fd5863f0cd2f6a67f945a02cd370e4728ea0.jpg', 'Beauty', 'الجمال', 'enabled'),
(4, '16dd602554b77c01f24a80b9a25f657f6206a5c9_8ba9342b96b2fe14625a338182a1c28cc2ef3664.jpeg', 'Athletes', 'الرياضيين', 'enabled'),
(5, 'ae5df817a7a2995daf9f334e1e1bbae12d3222ba_1c8ed164c9dce8e6f3cebccdafaa352ccc1c5a72.jpeg', 'Bone health', 'صحة العظام', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `nutrtion_plan`
--

CREATE TABLE `nutrtion_plan` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `carrent_weight` int(11) NOT NULL,
  `desired_weight` int(11) NOT NULL,
  `health_status` text NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `mobile2` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nutrtion_plan`
--

INSERT INTO `nutrtion_plan` (`id`, `first_name`, `last_name`, `email`, `gender`, `age`, `height`, `carrent_weight`, `desired_weight`, `health_status`, `mobile`, `mobile2`, `created_at`) VALUES
(1, 'Ahmed', 'Amin', 'amin@healthy.com', 'male', 30, 180, 100, 80, 'بسسيسيبسيبي', '01113509117', '01279730956', '2019-07-23 20:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `paid` int(11) NOT NULL DEFAULT '0',
  `cancel` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `weight` int(11) NOT NULL,
  `feature` text NOT NULL,
  `warning` varchar(255) NOT NULL,
  `how_to_use` varchar(255) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `weight`, `feature`, `warning`, `how_to_use`, `ingredient`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(8, 'مناعة اقوى ', 2, 'منتج طبيعى لتقوية مناعة الجسم', 300, 40, 'يمتاز المنتج بقدرتة على زيادة مناعة الجسم وتنقيتة من السموم \r\nحيث يتم جمع هذا المنتج من الطبيعة من بيوت النحل 																											', 'ممنوع على الحوامل والمرضعات والاشخاص الذين لديهم مرض الربو																															', 'تناول نصف ملعقة شاى من المنتج على كوب زبادى يوميا قبل النوم لمدة 3 شهور 																														', 'propolise', 100, 'e50296e8382aac93abfdacdad60c09a04c6ef1a9_9086c42a316cd79a1af26e17d9cf80a2a336855b.jpg', '2019-07-25 19:53:49', '2019-07-25 19:53:49'),
(9, 'بروتين بلس ', 4, 'لمنع الكسل والخمول ', 300, 40, '', 'Do not use if you are pregnant or nursing. Not intended for children less than 5 years old or people who have a history of allergy or asthma.																																', 'Stir 5 to 20 gm of Pollen Grains in a glass of cold fat-free milk or soy milk sweetened with some fruit juice or honey and drink instantly. Use daily in the morning for 3 months. Repeat this course when an energy boost is needed.																										', 'Untreated pure bee pollen.', 100, '45b0930bca084778234945b1984eb65bcb9cc5c1_80e7c9cb1a24d5680f07cb9a0c5e8bc46fbb332e.jpg', '2019-07-25 19:54:46', '2019-07-25 19:54:46'),
(11, 'cookies', 1, 'cookies with a delicious taste  helping  for weight loss', 85, 200, 'cookies rich in vitamin E for give you energy and also rich in fiber for good healthy  stomach 	\r\nand there are a lot of flavor such as orange , coconut , cinnamon , vanilla , chocolate 																																																										', 'لا يوجد', 'serving size 3 cookies 30 gm																																																															', 'whole grains , oats, wheet germ ', 30, '31b0d4babe5779f448fd1da2ee8411e24feb111d_585892221d06b659435096ad64825e1aa58ef572.jpg', '2019-07-25 19:55:41', '2019-07-25 19:55:41'),
(18, 'هوت شوكليت دايت ', 1, 'بديل صحى لمشروب الشيكولاتة العادى ', 150, 200, 'بديل صحى لمشروب الشيكولاتة العادى ويساعد على الاحساس بالشبع لفترة طويلة\r\nويزيد معدل الحرق بالجسم 																								', 'لا يوجد																								', 'مدون على العبوة																								', 'كاكاو _ قهوة خضراء مخصصة للتخسيس ', 20, '649745837e31a7f97a677a811915afde1132f76c_dfd715c7a3727f843fbb770277e2261b0383a23e.jpg', '2019-07-25 19:56:19', '2019-07-25 19:56:19'),
(20, 'جنين القمح الطبيعى', 1, 'افضل 10 اغذية بالعالم ', 150, 200, 'افضل 10 اغذية بالعالم 																', 'لا يوجد																', 'حسب تعليمات اخصائى التغذية																', 'جنين القمح الطبيعى', 20, '51b22f7f09629aa190d108fc1de696958e995a3c_256632c526ac20a1714f69d156a7bc98e50f6bea.jpg', '2019-07-25 19:56:58', '2019-07-25 19:56:58'),
(21, 'شوربة حارقة للدهون', 1, 'مجموعة من افضل النباتات الطبيعية التى تساعد على حرق الدهون خاصة دهون البطن _ ايضا هامة لنظام الكيتو دايت', 150, 200, 'مجموعة من افضل النباتات الطبيعية التى تساعد على حرق الدهون خاصة دهون البطن																								', 'لا يوجد																								', 'حسب تعليمات اخصائى التغذية																								', 'مدون على العبوة', 20, 'bb5c132548f8b7caf280b6f510343bda8ab1e4a7_659ac492955c90ed6a373bd2fbbdbb0936c59582.jpg', '2019-07-25 19:59:10', '2019-07-25 19:59:10'),
(26, 'فيتامين د', 1, 'مكمل غذائى', 500, 100, 'مفيد فى حالات \r\nضعف المناعة \r\nضعف معدل حرق الجسم\r\nالاكتئاب \r\nلين العظام								', 'لا يوجد								', 'حسب تعليمات الدكتور المختص								', 'فيتامين د', 20, 'a986beda1ee5939fb60efa420a396fb49a6df7da_8efadf6183779b02f051d8d86ad9ea373e2a036e.jpg', '2019-07-25 19:59:33', '2019-07-25 19:59:33'),
(27, 'عسل الجنسنج', 1, 'مكمل غذائى', 300, 250, 'استخدم فى الطب الصينى \r\nلتحسين الطاقة والنشاط بالجسم\r\nوزيادة المناعة \r\nومفيد جدا للرياضيين																', 'ممنوع على الحمل والرضاعة والاطفال اقل من 12 سنة \r\nومرضى الضغط المرتفع																', 'ملعقة صغيرة مع عصير او زبادى يوميا صباحا																', 'جنسنويد', 30, '1afa7c72f21de443e941e483855eb756b72a3a89_5f3d44681b5ee806a35d04cdff6b0fd9a66bde69.jpg', '2019-07-25 20:00:16', '2019-07-25 20:00:16'),
(28, 'عسل حارق الدهون ', 1, 'مكمل غذائى', 300, 250, 'مجموعة من الاعشاب الطبيعية \r\nالتى تحسن من معدل الحرق بالجسم								', 'الحمل والرضاعة والاطفال اقل من 12 سنة ومرضى الضغط المرتفع								', 'ملعقة صغيرة مع زبادى او عصير يوميا صباحا\r\nويستخدم لمدة 3 شهور								', 'مجموعة من الاعشاب الطبيعية ', 30, 'f9fd649e118764f8e39fbb85dcfc7f53edc98c6e_3b811fc89a1d5baabfdb46bd1bdac17f5d5c3f90.jpg', '2019-07-25 20:00:53', '2019-07-25 20:00:53'),
(29, 'عصير دايت', 1, 'مكمل غذائى', 150, 70, 'يعطى احساس بالشبع لفترة اكثر من 5 ساعات 								', 'لا يوجد								', 'كيس على لتر ماء ويشرب منه على مدار اليوم كل 3 ساعات								', 'فيتامين سى وكروميوم', 30, '3f53d1ceb6a00414af7497cdf21b4faf4314cb3b_8f1a6b41935024459de9f1d837437ad569a2b949.jpg', '2019-07-25 20:01:23', '2019-07-25 20:01:23'),
(30, 'Toffee Diet', 1, 'توفى دايت ', 150, 20, 'توفى دايت تعطى احساس بالشبع اثناء اليوم 								', 'لا يوجد								', 'مرتين قبل الغداء وقبل العشاء ب ربع ساعة								', 'مكونات طبيعية مدعمه بنباتات تعطى احساسا بالشبع', 20, '67985183b22857434aeb90d969b52213e10f9fd1_fbd774024774563e897d2a298cae68be28abe94f.jpg', '2019-07-25 20:02:39', '2019-07-25 20:02:39'),
(31, 'Slim bar', 1, 'بديل صحى للوجبات الخفيفة', 150, 5, 'منتج طبيعى بديل صحى للوجبات الخفيفة ويعطى احساسا بالشبع طوال اليوم								', 'لا يوجد								', 'مرة او مرتين باليوم بين الوجبات \r\nمع كوب ماء لتعطى احساسا بالشبع								', 'مكونات طبيعية', 20, 'f6836760d38f8a22f4a8e28c8c02d15541245dbe_359e67ab63a91953db2fdddc74fd98721d791328.jpg', '2019-07-25 20:03:07', '2019-07-25 20:03:07'),
(32, 'مناعة اقوى', 2, 'تقوية مناعة الاطفال', 300, 250, 'منتج طبيعى لزيادة مناعة الاطفال والكبار 								', 'مرضى حساسية الصدر او الربو								', 'ملعقة صغيرة يوميا مع الزبادى او العصير قبل النوم \r\nلمدة 3 شهور								', 'مكونات طبيعية', 30, '68208c9d318b649950526704e75e76dec1551a2d_99781f830e2224955ef129af72eec818a84daf0e.jpg', '2019-07-25 20:03:30', '2019-07-25 20:03:30'),
(33, 'قهوة سكوبية', 1, 'قهوة حرق الدهون', 150, 150, 'تزيد من معدل حرق الجسم اضعاف الحرق العادى \r\nاضافة لزيادة مناعة الجسم								', 'لا يوجد								', 'مرة باليوم نصف ملعقة صغيرة على كوب ماء مغلى بدون سكر او بسكر دايت								', 'خلاصة القهوة الخضراء', 30, '889852c755eb42a502e201ed1f93168a23e32693_b2a2ba524a8b4820b0191a0eabcc775c72a4d098.jpg', '2019-07-25 20:03:54', '2019-07-25 20:03:54'),
(34, 'باور 5000', 4, 'منتج طبيعى لزيادة الطاقة والنشاط', 300, 40, 'منتج طبيعى لزيادة الطاقة والنشاط وتحسين معدلات الاداء خاصة للرجال								', 'الحمل والرضاعة ومرضى الضغط المرتفع والاطفال اقل من 12 سنة								', 'نصف ملعقة صغيرة يوميا صباحا على \r\nالزبادى او العصير او الماء 								', 'مكونات طبيعية', 300, 'a5d8136fc9874325aa4ad9f8628e3b8b8f9166b8_3af71d9b4e6c5deb4e7425b6b4f361151fff4ca4.jpg', '2019-07-25 20:04:36', '2019-07-25 20:04:36'),
(35, 'فيتامين د', 5, 'لصحة العظام', 500, 100, 'لصحة العظام وزيادة المناعة وتحسين حرق الدهون', 'لا يوجد', 'حسب تعليمات المختص', 'فيتامين د', 20, '3ebb8097c4c2852aa2ace857adfd5586a0495eb3_458f3e618a04edc48b98e709ebfabcc9f7f94cfa.jpg', '2019-07-25 20:09:07', '2019-07-25 20:09:07'),
(36, 'فيتامين سى', 3, 'لنضارة البشرة', 600, 125, 'لنضارة البشرة وشد الجلد								', 'لا يوجد								', 'حسب تعليمات المختص								', 'فيتامين سى', 5, '9568f328d478d4d040825e19b40ffebf91e446cb_6cea345f7c57f0710697e2450afc2829a5240d98.jpg', '2019-07-25 20:13:49', '2019-07-25 20:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(30, 'site_name', 'NutriFly Clinic'),
(31, 'site_email', 'info@nutrifly.clinic.com'),
(32, 'site_mobile', '+0201111561646'),
(33, 'site_mobile2', '+0201111565649'),
(34, 'site_description', 'For centuries in china as a rich source of antioxidants which support general health For centuries in china as a rich source of antioxidants which support general health For centuries in china																																								'),
(35, 'maintenance', 'enabled'),
(36, 'maintenance_message', 'For centuries in china as a rich source of antioxidants which support general health For centuries in china as a rich source of antioxidants which support general health For centuries in china																																								');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `story_title` varchar(255) NOT NULL,
  `story_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `story_title`, `story_name`, `details`, `image`, `status`, `created_at`) VALUES
(1, 'Sambo Story', 'Sambo ', '								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.																																																																						', '193a9773d130a0d7c5e92f12b04602a574565bcd_55854b92127916681b4823e2b9c3696026902e1a.jpg', 'enabled', '2019-07-25 01:44:09'),
(4, 'Amin Story', 'Amin ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.																																																															', 'a056af6e1259fee24b8a2a322e748fc6e213c1f1_1bff5ce17b5b479bec1ac8970ee6b9880d33a837.jpg', 'enabled', '2019-04-21 22:19:36'),
(6, 'Story  Story', 'Ahmed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.																																																																																			', '2c362cf51b9c79ebb635aaf7bb32323fb59551f4_6691738d2c86d170f6bc072d52afc58002961106.jpg', 'enabled', '2019-05-08 14:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `country` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `ip` varchar(35) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_group_id`, `first_name`, `last_name`, `email`, `password`, `image`, `country`, `gender`, `birthday`, `created_at`, `ip`, `code`) VALUES
(1, 1, 'Ahmed', 'Amin', 'amin@healthy.com', '$2y$10$0zNPDC6/eeLhOgCOIBU0xukL5uMRF0DYKAHhFk4xSUAGftXqfbZkW', '1759064a56f767f85b448a9a832a0ac1570d11ee_8418b299a1bf078a5e06e2e1b005f2408811fac8.png', 'egypt', 'male', 1544569200, 1544831678, '::1', '0ad0d0093a5e13d5643433c5623f3504286b1a44'),
(2, 1, 'Abdo', 'Sambo', 'abdo@healthy.com', '$2y$10$AxlwySVfViOHTk8aiSyMIecpQzPzkbqWYGaQ7E73gKmczYRvn.HAK', '45edffaaf73ea41bede272e30dbba5b4a6f70b8b_ed30afea81ca5a500e8e69ab16b14e422bb4aedd.png', 'egypt', 'male', 1737241200, 1550717852, '::1', '6995f01fe941ff91ca9921a992e25b781c7f530e'),
(5, 1, 'Aya', 'Abdo', 'aya@healthy.com', '$2y$10$2yQWLhsOO0XUsbXKTuosKuKUMGqumAOwq5YEY0HXhYQzPta2vQmIW', 'b820e86b367973cfd1acee27ffd4c3f123ed1004_fb39b621195d7850793a64b188c5826ef4449502.png', 'egypt', 'female', 1545260400, 1556484409, '::1', '5c9d72188c66bf80341da059af70cbab8a73cf12'),
(10, 2, 'Ahmedsssss', 'Aminaaaa', 'sambo@blog.com', '$2y$10$Co8PJtWqJxU30wjjmwRenO5ffTi/pxD45iXCpehCK3Ij543l4Xj3a', 'user.jpg', 'egypt', 'male', 1548975600, 1564195771, '::1', 'e10d27a4facc8badf877fa68b6a22fcd3928b1fe');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`) VALUES
(1, 'Super Administrators'),
(2, 'Usres');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL,
  `user_groups_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `user_groups_id`, `page`) VALUES
(29, 4, '/admin'),
(31, 2, '/admin/login'),
(32, 2, '/admin/login/submit'),
(331, 1, '/admin/login'),
(332, 1, '/admin/login/submit'),
(333, 1, '/admin'),
(334, 1, '/admin/users'),
(335, 1, '/admin/users/add'),
(336, 1, '/admin/users/submit'),
(337, 1, '/admin/users/edit/:id'),
(338, 1, '/admin/users/save/:id'),
(339, 1, '/admin/users/delete/:id'),
(340, 1, '/admin/profile'),
(341, 1, '/admin/profile/update'),
(342, 1, '/admin/users-groups'),
(343, 1, '/admin/users-groups/add'),
(344, 1, '/admin/users-groups/submit'),
(345, 1, '/admin/users-groups/edit/:id'),
(346, 1, '/admin/users-groups/save/:id'),
(347, 1, '/admin/users-groups/delete/:id'),
(348, 1, '/admin/categories'),
(349, 1, '/admin/categories/add'),
(350, 1, '/admin/categories/submit'),
(351, 1, '/admin/categories/edit/:id'),
(352, 1, '/admin/categories/save/:id'),
(353, 1, '/admin/categories/delete/:id'),
(354, 1, '/admin/products'),
(355, 1, '/admin/products/add'),
(356, 1, '/admin/products/submit'),
(357, 1, '/admin/products/edit/:id'),
(358, 1, '/admin/products/save/:id'),
(359, 1, '/admin/products/delete/:id'),
(360, 1, '/admin/orders'),
(361, 1, '/admin/orders/show/:id'),
(362, 1, '/admin/orders/paid/:id'),
(363, 1, '/admin/orders/delete/:id'),
(364, 1, '/admin/stories'),
(365, 1, '/admin/stories/add'),
(366, 1, '/admin/stories/submit'),
(367, 1, '/admin/stories/edit/:id'),
(368, 1, '/admin/stories/save/:id'),
(369, 1, '/admin/stories/delete/:id'),
(370, 1, '/admin/plans'),
(371, 1, '/admin/plans/delete/:id'),
(372, 1, '/admin/settings'),
(373, 1, '/admin/settings/save'),
(374, 1, '/admin/logout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrtion_plan`
--
ALTER TABLE `nutrtion_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nutrtion_plan`
--
ALTER TABLE `nutrtion_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
