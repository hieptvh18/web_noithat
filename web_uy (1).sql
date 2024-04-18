-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 05:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_uy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'Giải pháp thương hiệu', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 1, 8, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(3, 'Thiết kế thương hiệu', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 1, 5, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(5, 'Thiết kế website', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 1, 9, '2024-04-03 08:05:08', '2024-04-03 08:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test hiep', 'hieptvh18@gmail.com', '0123123123', 'asdasdsa', 2, '2024-04-12 22:21:49', '2024-04-13 02:09:16'),
(2, 'test hiep123', 'hieptvhph14543@fpt.edu.vna', '012312312333', 'asdasd', 1, '2024-04-12 22:22:25', '2024-04-12 22:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_25_052702_create_rooms_table', 1),
(6, '2022_07_26_003543_create_categories_table', 1),
(7, '2022_07_27_053058_create_products_table', 1),
(8, '2022_07_27_055444_update_products_table', 1),
(9, '2022_07_27_064428_create_product_user_table', 1),
(10, '2022_07_31_014401_create_options_table', 1),
(11, '2022_07_31_014519_create_product_options_table', 1),
(12, '2022_07_31_145249_update_options_table', 1),
(13, '2022_07_31_151100_create_option_details_table', 1),
(14, '2022_08_01_020515_add_column_quantity_distortion_products_table', 1),
(15, '2022_08_01_061406_create_product_option_details_table', 1),
(16, '2022_08_06_103137_create_orders_table', 1),
(17, '2022_08_06_103620_create_order_detail_table', 1),
(18, '2022_08_06_131120_update_add_column_order_detail_table', 1),
(19, '2024_04_11_143517_create_order_user_medias_table', 2),
(21, '2024_04_13_051013_create_contacts_table', 3),
(22, '2024_04_14_104119_add_note_field_to_order_detail_table', 4),
(23, '2024_04_15_221433_add_fields_to_orders_table', 5),
(24, '2024_04_16_201143_add_field_to_order_user_medias', 6);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_types` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `created_at`, `updated_at`, `display_types`) VALUES
(1, 'Delores Runte', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(2, 'Mr. Theo Kohler', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(3, 'Jared Olson', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(4, 'Anibal Hoppe', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(5, 'Fatima Bode', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(6, 'Prof. Jensen Walker IV', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(7, 'Mrs. Eliane Parisian', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(8, 'Ethel Smitham', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(12, 'Size', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0),
(15, 'Color', '2024-04-03 08:05:08', '2024-04-03 08:05:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `option_details`
--

CREATE TABLE `option_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `code_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_details`
--

INSERT INTO `option_details` (`id`, `name`, `option_id`, `code_color`, `created_at`, `updated_at`) VALUES
(1, 'Casper Considine PhD', 2, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(2, 'Dr. Alexandre Robel DVM', 15, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(3, 'Ms. Aimee Rice', 3, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(4, 'Leopoldo Kemmer', 2, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(5, 'Maci Friesen', 2, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(6, 'Floy Vandervort', 1, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(7, 'Nayeli Metz', 3, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(8, 'Buddy Conroy DDS', 6, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(9, 'Đỏ', 15, 'red', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(10, 'Medium', 12, NULL, '2024-04-03 08:05:08', '2024-04-03 08:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `status`, `note`, `created_at`, `updated_at`, `product_id`, `price`, `image`, `product_name`) VALUES
(1, 10, 'test hiep', 'hieptvhph14543@fpt.edu.vn', '0123123123', 'housesssssss', 0, 'asdasdasd', '2024-04-04 02:05:00', '2024-04-04 02:05:00', 0, 0, NULL, ''),
(2, 1, 'test hiep', 'admin@gmail.com', '0123123123', 'housesssssss', 2, 'ádasdasd', '2024-04-09 05:52:25', '2024-04-14 10:55:56', 0, 0, NULL, ''),
(5, 1, 'test hiep', 'hieptvh18@gmail.com', '0123123123', 'housesssssss', 1, 'fsdfsdf', '2024-04-14 03:47:52', '2024-04-14 15:13:18', 0, 0, NULL, ''),
(6, 1, 'Admin', 'admin@gmail.com', '+1.509.829.3639', NULL, 2, 'Sarn pham xin hop thoi trang', '2024-04-15 15:31:08', '2024-04-15 15:36:12', 11, 1800000, 'Banner Angito-03.png', ''),
(7, 1, 'Admin', 'admin@gmail.com', '+1.509.829.3639', NULL, 3, 'Banner xin dep', '2024-04-15 15:37:40', '2024-04-16 15:20:27', 11, 1800000, 'Banner Angito-03.png', 'Thiết kế banner mùa hè'),
(8, 12, 'hieptvh', 'hieptvhph14543@fpt.edu.vn', '0123123123', NULL, 1, 'lam giong design nay', '2024-04-16 15:32:45', '2024-04-16 15:35:30', 1, 180000, '1713067784_avata (2).jpg', 'Website bán hàng trực tuyến'),
(9, 1, 'Admin', 'admin@gmail.com', '+1.509.829.3639', NULL, 3, 'logo nhu hinh', '2024-04-18 03:29:14', '2024-04-18 03:51:38', 13, 2000000, 'LOGO (74).png', 'Thiết kế logo doanh nghiệp');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `atribute` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`, `atribute`, `image`, `note`) VALUES
(2, 9, 2, 3, 180000, '2024-04-09 05:52:25', '2024-04-09 05:52:25', 'Size:-|Color :', 'https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg', ''),
(3, 11, 5, 1, 1800000, '2024-04-14 03:47:52', '2024-04-14 03:47:52', 'Size:-|Color :', 'Banner Angito-03.png', 'fsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `order_user_medias`
--

CREATE TABLE `order_user_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_user_medias`
--

INSERT INTO `order_user_medias` (`id`, `order_id`, `files`, `created_at`, `updated_at`, `status`, `note`) VALUES
(2, 7, 'avata (1).jpg', '2024-04-16 13:51:57', '2024-04-16 15:18:46', 2, ''),
(3, 8, 'avata.jpg', '2024-04-16 15:35:52', '2024-04-16 15:35:52', 0, ''),
(4, 9, 'LOGO (74).png', '2024-04-18 03:36:50', '2024-04-18 03:39:38', 1, ''),
(5, 9, 'Banner Angito-03.png', '2024-04-18 03:45:32', '2024-04-18 03:45:45', 1, ''),
(6, 9, 'Screenshot from 2024-04-14 22-18-31.png', '2024-04-18 03:51:02', '2024-04-18 03:51:38', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `price_sale` varchar(255) DEFAULT '0',
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `intro_service` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `quantity_view` int(11) DEFAULT 0,
  `quantity_distortion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `quantity`, `price`, `price_sale`, `cate_id`, `description`, `intro_service`, `created_at`, `updated_at`, `status`, `quantity_view`, `quantity_distortion`) VALUES
(1, 'Website bán hàng trực tuyến', '1713067784_avata (2).jpg', 1000, '200000', '180000', 5, 'Est omnis consequatur in voluptatum facilis voluptas accusamus officia dolor aut consequuntur aliquid est ut eaque ipsum quia doloremque totam distinctio officiis est et ea quo incidunt animi eaque impedit.', 'Maiores doloribus culpa ipsam quasi atque dicta provident aut assumenda assumenda dolorem reiciendis est eos molestias vel ut quidem quidem reprehenderit non inventore sint facere rem unde beatae aut sequi consequatur et accusamus modi minus autem itaque non animi ipsum illum eligendi odio facilis unde dicta officia repudiandae et aliquid inventore dolor sapiente illum qui.', '2024-04-03 08:05:08', '2024-04-13 21:09:44', 1, 20, 0),
(7, 'Thiết kế bản vẽ website', '1713067371_1_0007_Lịch để bàn(In ấn)-29.jpg', 1000, '200000', '180000', 5, 'Quia est perspiciatis quaerat aspernatur est voluptas nostrum dolore quam est similique ipsam tenetur eos veritatis totam esse amet qui consequuntur illo magni quo doloremque optio veniam.', 'Corporis natus cum rerum dolorem officiis nulla saepe eligendi rem praesentium perspiciatis voluptatem eveniet sint repellat nam qui ut qui vel in voluptatem sed doloremque rerum rerum qui aut commodi ut accusantium veniam consequatur et dolore praesentium libero earum dolorem doloremque non quas aut corporis delectus eligendi nulla sint necessitatibus.', '2024-04-03 08:05:08', '2024-04-13 21:02:51', 1, 20, 0),
(8, 'Alexa Kovacek', '1713067717_avata (1).jpg', 1000, '200000', '180000', 3, 'Iusto omnis omnis ut numquam laboriosam voluptatem sint similique laborum sunt officia necessitatibus facilis ratione quod libero voluptatem fugiat commodi quas sit dolor asperiores explicabo laborum accusantium et commodi enim aperiam in facilis fugit.', 'Harum voluptatem inventore est eaque ipsam rem eos aspernatur voluptas quibusdam et molestias voluptas ducimus ea molestias consectetur eum ullam recusandae labore sit illo earum ipsam autem autem molestiae.', '2024-04-03 08:05:08', '2024-04-13 21:08:37', 1, 20, 0),
(9, 'Sử dụng app crm', 'https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg', 10, '200000', '180000', 1, 'Minima et ut hic qui ut delectus perspiciatis unde sint quaerat officia deleniti est ut alias corrupti qui molestias mollitia repudiandae blanditiis doloribus repudiandae voluptatibus.', 'Aliquam laborum dignissimos velit nemo eos voluptatibus necessitatibus distinctio distinctio similique voluptas ea amet commodi aut sint nostrum necessitatibus quisquam est et harum quis illo neque eos reprehenderit est dolores facere a quis fuga est vitae in enim placeat doloremque repudiandae dolorem quo est laborum et harum aliquam.', '2024-04-03 08:05:08', '2024-04-03 23:49:08', 1, 20, 0),
(11, 'Thiết kế banner mùa hè', 'Banner Angito-03.png', 11111, '2000000', '1800000', 3, '<p><span style=\"font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Đưa vào vận hành, dùng thử, kiểm tra rà soát tìm các chi tiết chưa thực sự tối ưu, từ đó sẽ phân tích, đo lượng tính hiệu quả.</span><br></p>', '<p><span style=\"font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Đưa vào vận hành, dùng thử, kiểm tra rà soát tìm các chi tiết chưa thực sự tối ưu, từ đó sẽ phân tích, đo lượng tính hiệu quả.</span><br></p>', '2024-04-09 06:06:06', '2024-04-09 06:06:06', 1, NULL, 0),
(12, 'Website bán hàng', 'avata.jpg', 10000, '3000000', '2000000', 5, '<p>Website bán hàng trực tuyến</p>', '<p>Website bán hàng trực tuyến<br></p>', '2024-04-09 06:34:23', '2024-04-09 06:34:23', 1, NULL, 0),
(13, 'Thiết kế logo doanh nghiệp', 'LOGO (74).png', 10000, '2000000', '2000000', 3, '<p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Khi bạn đang tìm nguồn cảm hứng cho một thiết kế logo mới thì việc đi tới phòng triển lãm logo hiện đại như một trong những nơi này là điều hoàn toàn tự nhiên.</p><p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Nhưng các nguyên tắc cho một&nbsp; thiết kế đẹp thì vô tận. Và nếu bạn chỉ tập trung vào các tác phẩm mới nhất thì bạn đang bỏ lỡ các thiết kế logo sáng tạo, nhiều chức năng và đẹp từ các designer nổi tiếng nhất của ngành công nghiệp này.</p><p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Trong bài viết này, chúng ta cùng nhìn lại 5 logos được tạo ra bởi những nhà sáng tạo tuyệt vời nhất của thế kỉ 20 và suy ngẫm những bài học nào họ đem đến cho designer ngày nay.</p>', '<p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Khi bạn đang tìm nguồn cảm hứng cho một thiết kế logo mới thì việc đi tới phòng triển lãm logo hiện đại như một trong những nơi này là điều hoàn toàn tự nhiên.</p><p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Nhưng các nguyên tắc cho một&nbsp; thiết kế đẹp thì vô tận. Và nếu bạn chỉ tập trung vào các tác phẩm mới nhất thì bạn đang bỏ lỡ các thiết kế logo sáng tạo, nhiều chức năng và đẹp từ các designer nổi tiếng nhất của ngành công nghiệp này.</p><p style=\"color: rgb(28, 37, 52); font-family: SVN-Gotham; font-size: 16px; background-color: rgb(255, 255, 255);\">Trong bài viết này, chúng ta cùng nhìn lại 5 logos được tạo ra bởi những nhà sáng tạo tuyệt vời nhất của thế kỉ 20 và suy ngẫm những bài học nào họ đem đến cho designer ngày nay.</p>', '2024-04-18 03:27:27', '2024-04-18 03:27:27', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `available_stock` varchar(255) NOT NULL,
  `code_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_option_details`
--

CREATE TABLE `product_option_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_option_id` bigint(20) UNSIGNED NOT NULL,
  `option_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_user`
--

INSERT INTO `product_user` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 12, 1, '2024-04-13 02:29:12', '2024-04-13 02:29:12'),
(14, 11, 1, '2024-04-13 02:38:02', '2024-04-13 02:38:02'),
(15, 7, 1, '2024-04-14 02:55:34', '2024-04-14 02:55:34'),
(16, 8, 1, '2024-04-14 03:23:57', '2024-04-14 03:23:57'),
(17, 1, 1, '2024-04-14 03:24:28', '2024-04-14 03:24:28'),
(18, 1, 12, '2024-04-16 15:32:20', '2024-04-16 15:32:20'),
(19, 13, 1, '2024-04-18 03:28:55', '2024-04-18 03:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barbara Schoen', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(2, 'Prof. Vena Johnston I', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(3, 'Susanna Padberg', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(4, 'Pearlie Bogan', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(5, 'Dusty Hoeger MD', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(6, 'Maria Reilly', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(7, 'Mr. Demarco Roob', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(8, 'Madisyn Bayer', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(9, 'Mrs. Damaris Maggio', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(10, 'Oda Runte', '2024-04-03 08:05:08', '2024-04-03 08:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `address`, `phone`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '353676445_637319731758160_9141838892827275616_n.jpg', 'Aut.-Nostrum.-Fuga.', '+1.509.829.3639', '2024-04-03 08:05:08', '$2y$10$UvCwrDeHjWlhmR3MbDX.3e04OhMaHzjsKaayYgf7gQB1iAcWMVdxa', 1, 1, '5DebbFmt27gTyr0vuCLU5X6CyRoq4JZAU3jdiGfYiARAI9AHGFi5I97FF4HB', '2024-04-03 08:05:08', '2024-04-09 05:56:49'),
(2, 'Zena Tremblay', 'beahan.jaylon@example.net', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Quia.-Veritatis.-Dolorem.', '+1-419-596-7539', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 0, 'rQSeJrobVE', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(3, 'Ms. Annabel O\'Keefe', 'ccorwin@example.org', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Dolor.-Dolorem.-Adipisci.', '1-302-706-5617', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 0, 'NTVrZPskje', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(4, 'Dell Bechtelar', 'meaghan.monahan@example.org', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Quos.-Labore.-Omnis.', '+1.631.768.5790', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 0, 'otSiHHZFlo', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(5, 'Maximus Kautzer DVM', 'kihn.janelle@example.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Pariatur.-Magnam.-Iste quas.', '225-573-3123', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 0, '9sy2M6IPOl', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(6, 'Jerrod Monahan', 'bode.cecil@example.net', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Beatae.-Sed nam.-Earum.', '+1-203-904-0210', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, 'fkpbvnILlN', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(7, 'Ms. Mollie Lebsack', 'qsawayn@example.org', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Ipsa.-Est nisi.-Corporis.', '+1-724-309-3691', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 0, 'uooV7HiRaU', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(8, 'Laurence Ondricka', 'lueilwitz.virgie@example.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Eveniet.-Maxime.-Qui.', '201.830.8855', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, 'fxurHkHSHt', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(9, 'Prof. Lucius Schroeder', 'amber70@example.net', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Assumenda.-Occaecati.-Sit quia.', '551-741-4707', '2024-04-03 08:05:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 1, 'luEtq0GhJ9', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(10, 'Favian Breitenberg', 'guest@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU', 'Ea at qui.-Ducimus.-Quibusdam.', '+1-570-873-4033', '2024-04-03 08:05:08', '$2y$10$9hynpkXEfwJmdeUKVAPaguxR1IOWq4cF0g8d2PDPxquivfdjOHkKK', 2, 1, 'A2vYsQ0ZBNPxFxFGVVbikluIntNeqDZCGtMjjfVS7IAlKoNCfTkgzXQhaAmp', '2024-04-03 08:05:08', '2024-04-03 08:05:08'),
(11, 'hieptvh18', 'hieptvh18@gmail.com', NULL, 'housesssssss', '0123123123', NULL, '$2y$10$Ev4QfRHDzL5yD1V2F6p9h.L7yKa8JovLhbpAeck9v3hP7Lq38DiF.', 1, 1, NULL, '2024-04-03 23:33:04', '2024-04-03 23:33:04'),
(12, 'hieptvh', 'hieptvhph14543@fpt.edu.vn', NULL, 'asdasd', '0123123123', NULL, '$2y$10$QhkKxFj13gsoHgxb26UITOYLR.ILE7Swaa3jtgD6bb3WISjGscygS', 2, 1, NULL, '2024-04-16 15:26:27', '2024-04-16 15:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_room_id_foreign` (`room_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_details`
--
ALTER TABLE `option_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_details_option_id_foreign` (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_user_medias`
--
ALTER TABLE `order_user_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`),
  ADD KEY `product_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `product_option_details`
--
ALTER TABLE `product_option_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_option_details_product_option_id_foreign` (`product_option_id`),
  ADD KEY `product_option_details_option_detail_id_foreign` (`option_detail_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_user_product_id_foreign` (`product_id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `option_details`
--
ALTER TABLE `option_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_user_medias`
--
ALTER TABLE `order_user_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_option_details`
--
ALTER TABLE `product_option_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `option_details`
--
ALTER TABLE `option_details`
  ADD CONSTRAINT `option_details_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_option_details`
--
ALTER TABLE `product_option_details`
  ADD CONSTRAINT `product_option_details_option_detail_id_foreign` FOREIGN KEY (`option_detail_id`) REFERENCES `option_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_option_details_product_option_id_foreign` FOREIGN KEY (`product_option_id`) REFERENCES `product_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
