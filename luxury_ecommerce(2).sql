-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxury_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_02cfc3942e3cf7de0677e0d491d09e58', 'i:1;', 1748819746),
('laravel_cache_02cfc3942e3cf7de0677e0d491d09e58:timer', 'i:1748819746;', 1748819746),
('laravel_cache_0b5ed025495008a307f6b06dd1e4cce2', 'i:1;', 1748823230),
('laravel_cache_0b5ed025495008a307f6b06dd1e4cce2:timer', 'i:1748823230;', 1748823230),
('laravel_cache_1d98503b55cf6fe8782f23055b07c770', 'i:2;', 1748693816),
('laravel_cache_1d98503b55cf6fe8782f23055b07c770:timer', 'i:1748693816;', 1748693816),
('laravel_cache_246ae19cce9125d99ca0ed71d4f42d43', 'i:2;', 1748820139),
('laravel_cache_246ae19cce9125d99ca0ed71d4f42d43:timer', 'i:1748820139;', 1748820139),
('laravel_cache_379db7114fd57b1bab77d17f0ed64fd0', 'i:2;', 1748818829),
('laravel_cache_379db7114fd57b1bab77d17f0ed64fd0:timer', 'i:1748818829;', 1748818829),
('laravel_cache_admin@pearlprestige.com|127.0.0.1', 'i:2;', 1748693816),
('laravel_cache_admin@pearlprestige.com|127.0.0.1:timer', 'i:1748693816;', 1748693816),
('laravel_cache_admin@test.com|127.0.0.1', 'i:1;', 1748692968),
('laravel_cache_admin@test.com|127.0.0.1:timer', 'i:1748692968;', 1748692968),
('laravel_cache_b2ec88d0c43df059b66b02dcbce52f2f', 'i:1;', 1748692968),
('laravel_cache_b2ec88d0c43df059b66b02dcbce52f2f:timer', 'i:1748692968;', 1748692968),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1748823577),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a:timer', 'i:1748823577;', 1748823577),
('laravel_cache_user01@gmail.com|127.0.0.1', 'i:2;', 1748818829),
('laravel_cache_user01@gmail.com|127.0.0.1:timer', 'i:1748818829;', 1748818829);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'women', 'Elegant fashion for women', NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(2, 'Men', 'men', 'Sophisticated fashion for men', NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(3, 'Accessories', 'accessories', 'Luxury accessories and finishing touches', NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_183744_create_categories_table', 1),
(5, '2025_05_30_183831_create_subcategories_table', 1),
(6, '2025_05_30_183847_create_products_table', 1),
(7, '2025_05_30_183912_create_shopping_carts_table', 1),
(8, '2025_05_30_183929_create_orders_table', 1),
(9, '2025_05_30_183950_create_order_items_table', 1),
(10, '2025_05_30_184843_add_two_factor_columns_to_users_table', 1),
(11, '2025_05_30_193142_create_personal_access_tokens_table', 1),
(12, '2025_05_30_195703_add_is_admin_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `shipping_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`shipping_address`)),
  `billing_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`billing_address`)),
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `subtotal`, `tax_amount`, `shipping_amount`, `total_amount`, `status`, `shipping_address`, `billing_address`, `payment_method`, `payment_status`, `shipped_at`, `delivered_at`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'ORD-ENRROXRU', 3, 4690.00, 375.20, 0.00, 5065.20, 'processing', '{\"first_name\":\"user01\",\"last_name\":\"fhfn\",\"email\":\"user01@gmail.com\",\"phone\":\"45646456\",\"address\":\"cgxgmcgm\",\"city\":\"gjxgmxgm\",\"state\":\"xgmxgm\",\"zip\":\"3434\",\"country\":\"US\"}', '{\"first_name\":\"user01\",\"last_name\":\"fhfn\",\"email\":\"user01@gmail.com\",\"phone\":\"45646456\",\"address\":\"cgxgmcgm\",\"city\":\"gjxgmxgm\",\"state\":\"xgmxgm\",\"zip\":\"3434\",\"country\":\"US\"}', 'credit_card', 'completed', NULL, NULL, NULL, '2025-05-30 16:15:54', '2025-05-30 16:16:06'),
(2, 'ORD-2025-LXSNM5IV', 3, 34475.00, 2758.00, 0.00, 37233.00, 'pending', '{\"first_name\":\"user01\",\"last_name\":\"fgs\",\"email\":\"user01@gmail.com\",\"phone\":\"452\",\"address\":\"fbsfb\",\"city\":\"srgs\",\"state\":\"gsfg\",\"zip\":\"5425\",\"country\":\"US\"}', '{\"first_name\":\"user01\",\"last_name\":\"fgs\",\"email\":\"user01@gmail.com\",\"phone\":\"452\",\"address\":\"fbsfb\",\"city\":\"srgs\",\"state\":\"gsfg\",\"zip\":\"5425\",\"country\":\"US\"}', 'credit_card', 'pending', NULL, NULL, NULL, '2025-05-31 13:49:39', '2025-05-31 13:49:39'),
(3, 'ORD-2025-PKPQZIDR', 8, 4620.00, 369.60, 0.00, 4989.60, 'pending', '{\"first_name\":\"mihi\",\"last_name\":\"dfad\",\"email\":\"mihi@gmail.com\",\"phone\":\"34234\",\"address\":\"dvz\",\"city\":\"bzcbb\",\"state\":\"ffbf\",\"zip\":\"34234\",\"country\":\"UK\"}', '{\"first_name\":\"mihi\",\"last_name\":\"dfad\",\"email\":\"mihi@gmail.com\",\"phone\":\"34234\",\"address\":\"dvz\",\"city\":\"bzcbb\",\"state\":\"ffbf\",\"zip\":\"34234\",\"country\":\"UK\"}', 'paypal', 'pending', NULL, NULL, NULL, '2025-06-01 18:10:42', '2025-06-01 18:10:42'),
(4, 'ORD-2025-7OHWYSG5', 10, 27370.00, 2189.60, 0.00, 29559.60, 'pending', '{\"first_name\":\"user\",\"last_name\":\"fd\",\"email\":\"user@gmail.com\",\"phone\":\"3434\",\"address\":\"dfadf\",\"city\":\"fdfs\",\"state\":\"dsdgs\",\"zip\":\"5254\",\"country\":\"LK\"}', '{\"first_name\":\"user\",\"last_name\":\"fd\",\"email\":\"user@gmail.com\",\"phone\":\"3434\",\"address\":\"dfadf\",\"city\":\"fdfs\",\"state\":\"dsdgs\",\"zip\":\"5254\",\"country\":\"LK\"}', 'credit_card', 'pending', NULL, NULL, NULL, '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(5, 'ORD-2025-UBKH2QTF', 10, 2540.00, 203.20, 0.00, 2743.20, 'pending', '{\"first_name\":\"user\",\"last_name\":\"fgfg\",\"email\":\"user@gmail.com\",\"phone\":\"3466\",\"address\":\"dadga\",\"city\":\"gfgs\",\"state\":\"sg\",\"zip\":\"525\",\"country\":\"CA\"}', '{\"first_name\":\"user\",\"last_name\":\"fgfg\",\"email\":\"user@gmail.com\",\"phone\":\"3466\",\"address\":\"dadga\",\"city\":\"gfgs\",\"state\":\"sg\",\"zip\":\"525\",\"country\":\"CA\"}', 'credit_card', 'pending', NULL, NULL, NULL, '2025-06-01 18:47:57', '2025-06-01 18:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `product_snapshot` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_snapshot`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `size`, `color`, `product_snapshot`, `created_at`, `updated_at`) VALUES
(5, 2, 44, 4, 5000.00, 20000.00, '42', '', '{\"id\":44,\"name\":\"LV Trainer Sneaker\",\"slug\":\"lv-trainer-sneaker-1\",\"description\":\"A stylish and versatile sneaker perfect for urban environments. Featuring breathable mesh, cushioned soles, and a sleek minimalist design, Urban Stride offers all-day comfort for walking, commuting, or casual outings.\",\"short_description\":null,\"price\":\"5000.00\",\"sale_price\":null,\"sku\":\"PE0008\",\"stock_quantity\":20,\"images\":[\"\\/images\\/products\\/1748718578_0_683b53f266369.png\",\"\\/images\\/products\\/1748718578_1_683b53f266c2c.png\",\"\\/images\\/products\\/1748718578_2_683b53f267041.png\",\"\\/images\\/products\\/1748718578_3_683b53f2673fe.png\"],\"sizes\":[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"],\"colors\":null,\"category_id\":2,\"subcategory_id\":4,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T19:09:38.000000Z\",\"updated_at\":\"2025-05-31T19:09:38.000000Z\"}', '2025-05-31 13:49:39', '2025-05-31 13:49:39'),
(6, 2, 32, 1, 505.00, 505.00, '', '', '{\"id\":32,\"name\":\"Key Pouch M\",\"slug\":\"key-pouch-m\",\"description\":\"The new Pochette Cl\\u00e9s M joins the House\\u2019s iconic collection that debuted in 1984. This sleek addition is made from signature Monogram coated canvas, embellished with an elegant gold-tone chain and zip-pull across the top. A perfect travel companion, it is sized to store a passport and comes with a large card slot. Slip it into a bag or carry it by hand.\",\"short_description\":null,\"price\":\"505.00\",\"sale_price\":null,\"sku\":\"PV0001\",\"stock_quantity\":10,\"images\":[\"\\/images\\/products\\/1748716221_0_683b4abd8d2bf.png\",\"\\/images\\/products\\/1748716221_1_683b4abd8d85d.png\",\"\\/images\\/products\\/1748716221_2_683b4abd8df63.png\",\"\\/images\\/products\\/1748716221_3_683b4abd8e35f.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":8,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T18:30:21.000000Z\",\"updated_at\":\"2025-05-31T18:30:21.000000Z\"}', '2025-05-31 13:49:39', '2025-05-31 13:49:39'),
(7, 2, 38, 1, 500.00, 500.00, '', '', '{\"id\":38,\"name\":\"eLVes Louis Vuitton\",\"slug\":\"elves-louis-vuitton\",\"description\":\"Order your Louis Vuitton fragrance and receive a complimentary sample so you can discover the fragrance before wearing or gifting it. That way, should you wish to, you can return your unopened bottle for reimbursement.\",\"short_description\":null,\"price\":\"500.00\",\"sale_price\":null,\"sku\":\"PP0003\",\"stock_quantity\":45,\"images\":[\"\\/images\\/products\\/1748716912_0_683b4d70cf5ac.png\",\"\\/images\\/products\\/1748716912_1_683b4d70cfc6f.png\",\"\\/images\\/products\\/1748716912_2_683b4d70d0074.png\",\"\\/images\\/products\\/1748716912_3_683b4d70d0711.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":6,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T18:41:52.000000Z\",\"updated_at\":\"2025-05-31T18:41:52.000000Z\"}', '2025-05-31 13:49:39', '2025-05-31 13:49:39'),
(8, 2, 41, 1, 830.00, 830.00, '', '', '{\"id\":41,\"name\":\"LV Dimension 40mm Reversible Belt\",\"slug\":\"lv-dimension-40mm-reversible-belt\",\"description\":\"The LV Dimension Monogram H\\u00e9ritage 40mm Reversible belt is the latest interpretation of the classic style, now embellished in a textured tribute to the House codes. The buckle, a pair of initials, gleams against the earthy-hued palette: a solid leather on one side of the strap, and on the reverse, coated canvas sporting the Monogram.\",\"short_description\":null,\"price\":\"830.00\",\"sale_price\":null,\"sku\":\"PB0002\",\"stock_quantity\":20,\"images\":[\"\\/images\\/products\\/1748717191_0_683b4e87abe84.png\",\"\\/images\\/products\\/1748717191_1_683b4e87ac572.png\",\"\\/images\\/products\\/1748717191_2_683b4e87ac910.png\",\"\\/images\\/products\\/1748717191_3_683b4e87acd79.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":7,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T18:46:31.000000Z\",\"updated_at\":\"2025-05-31T18:46:31.000000Z\"}', '2025-05-31 13:49:39', '2025-05-31 13:49:39'),
(9, 3, 47, 1, 2080.00, 2080.00, 'S', '', '{\"id\":47,\"name\":\"Monogram Canvas Jeans\",\"slug\":\"monogram-canvas-jeans-1\",\"description\":\"These classic straight-cut jeans are reimagined with a laidback feel in structured cotton canvas in a casual uneven finish, with the iconic Monogram motif featuring in relief on the back. Tonal topstitching highlights the construction, while silver-toned hardware adds a contrasting accent. Signed with a leather Louis Vuitton patch on the waistband. Main Material : 100% Cotton Beige Made in Italy\",\"short_description\":null,\"price\":\"2080.00\",\"sale_price\":null,\"sku\":\"PC0002\",\"stock_quantity\":99,\"images\":[\"\\/images\\/products\\/1748757811_0_683bed33293a8.png\",\"\\/images\\/products\\/1748757811_1_683bed3329efa.png\",\"\\/images\\/products\\/1748757811_2_683bed332a77b.png\",\"\\/images\\/products\\/1748757811_3_683bed332b066.png\"],\"sizes\":[\"S\",\"M\",\"L\",\"XL\",\"2XL\"],\"colors\":null,\"category_id\":1,\"subcategory_id\":1,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:03:31.000000Z\",\"updated_at\":\"2025-06-01T06:03:40.000000Z\"}', '2025-06-01 18:10:42', '2025-06-01 18:10:42'),
(10, 3, 57, 1, 2540.00, 2540.00, '39', '', '{\"id\":57,\"name\":\"Damier 3D Light Denim Shorts\",\"slug\":\"damier-3d-light-denim-shorts-1\",\"description\":\"These organic cotton denim shorts in pale, washed indigo are a summer essential. They are adorned with the iconic textured 3D Damier jacquard incorporating Marque L.Vuitton D\\u00e9pos\\u00e9e signatures, while a pearl-effect button and rivets add a dandy accent. This timeless signature piece is easy to mix and match and has a matching shirt for a total look.\",\"short_description\":null,\"price\":\"2540.00\",\"sale_price\":null,\"sku\":\"PN0003\",\"stock_quantity\":69,\"images\":[\"\\/images\\/products\\/1748759546_0_683bf3fa33493.png\",\"\\/images\\/products\\/1748759546_1_683bf3fa34b06.png\",\"\\/images\\/products\\/1748759546_2_683bf3fa3510f.png\",\"\\/images\\/products\\/1748759546_3_683bf3fa35793.png\"],\"sizes\":[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"],\"colors\":null,\"category_id\":2,\"subcategory_id\":3,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:32:26.000000Z\",\"updated_at\":\"2025-06-01T06:32:26.000000Z\"}', '2025-06-01 18:10:42', '2025-06-01 18:10:42'),
(11, 4, 46, 1, 2960.00, 2960.00, 'S', '', '{\"id\":46,\"name\":\"Stripe Accent Knit Polo Dress\",\"slug\":\"stripe-accent-knit-polo-dress-1\",\"description\":\"This knitted polo dress is chic and contemporary in a trompe l\\u2019oeil design resembling a trim two-piece. It is spun from a plush wool-cashmere blend featuring a scaled-up openwork Monogram motif for a subtle allover signature, while graphic black stitching lends a nautical air to the flat collar, short sleeves, belt and hemline. Main Material : 70% Wool, 28% Cashmere, 1% Polyamide, 1% Elastane Milky White Made in Italy\",\"short_description\":null,\"price\":\"2960.00\",\"sale_price\":null,\"sku\":\"PC0001\",\"stock_quantity\":100,\"images\":[\"\\/images\\/products\\/1748757697_0_683becc129ea9.png\",\"\\/images\\/products\\/1748757697_1_683becc12af8f.png\",\"\\/images\\/products\\/1748757697_2_683becc12b65d.png\",\"\\/images\\/products\\/1748757697_3_683becc12c173.png\"],\"sizes\":[\"S\",\"M\",\"L\",\"XL\",\"2XL\"],\"colors\":null,\"category_id\":1,\"subcategory_id\":1,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:01:37.000000Z\",\"updated_at\":\"2025-06-01T06:01:37.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(12, 4, 54, 2, 4500.00, 9000.00, '', '', '{\"id\":54,\"name\":\"Coussin Backpack PM\",\"slug\":\"coussin-backpack-pm-1\",\"description\":\"A first for the Coussin line, this new backpack PM version strikes the perfect balance of functional and chic. Designed for women on the go, it is crafted from supple leather embossed with the House\\u2019s signature Monogram and is adorned with an iconic LV padlock. The Coussin chain stands out with a gold-toned finish, and can be removed if desired. Use the front zipped pocket to keep small essentials within easy reach.\",\"short_description\":null,\"price\":\"4500.00\",\"sale_price\":null,\"sku\":\"PL0002\",\"stock_quantity\":63,\"images\":[\"\\/images\\/products\\/1748759250_0_683bf2d219232.png\",\"\\/images\\/products\\/1748759250_1_683bf2d21a316.png\",\"\\/images\\/products\\/1748759250_2_683bf2d21ac8a.png\",\"\\/images\\/products\\/1748759250_3_683bf2d21f7ee.png\"],\"sizes\":null,\"colors\":null,\"category_id\":1,\"subcategory_id\":2,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:27:30.000000Z\",\"updated_at\":\"2025-06-01T06:27:30.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(13, 4, 57, 1, 2540.00, 2540.00, '41', '', '{\"id\":57,\"name\":\"Damier 3D Light Denim Shorts\",\"slug\":\"damier-3d-light-denim-shorts-1\",\"description\":\"These organic cotton denim shorts in pale, washed indigo are a summer essential. They are adorned with the iconic textured 3D Damier jacquard incorporating Marque L.Vuitton D\\u00e9pos\\u00e9e signatures, while a pearl-effect button and rivets add a dandy accent. This timeless signature piece is easy to mix and match and has a matching shirt for a total look.\",\"short_description\":null,\"price\":\"2540.00\",\"sale_price\":null,\"sku\":\"PN0003\",\"stock_quantity\":68,\"images\":[\"\\/images\\/products\\/1748759546_0_683bf3fa33493.png\",\"\\/images\\/products\\/1748759546_1_683bf3fa34b06.png\",\"\\/images\\/products\\/1748759546_2_683bf3fa3510f.png\",\"\\/images\\/products\\/1748759546_3_683bf3fa35793.png\"],\"sizes\":[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"],\"colors\":null,\"category_id\":2,\"subcategory_id\":3,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:32:26.000000Z\",\"updated_at\":\"2025-06-01T23:40:42.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(14, 4, 50, 3, 2600.00, 7800.00, '44', '', '{\"id\":50,\"name\":\"Velvet Vogue\",\"slug\":\"velvet-vogue\",\"description\":\"A luxurious pair of high heels crafted from premium velvet fabric. Designed with a soft insole and elegant silhouette, Velvet Vogue adds a sophisticated touch to evening gowns and upscale events while ensuring graceful comfort.\",\"short_description\":null,\"price\":\"2600.00\",\"sale_price\":null,\"sku\":\"PE0009\",\"stock_quantity\":50,\"images\":[\"\\/images\\/products\\/1748758542_0_683bf00e850df.png\",\"\\/images\\/products\\/1748758542_1_683bf00e862ea.png\",\"\\/images\\/products\\/1748758542_2_683bf00e86941.png\",\"\\/images\\/products\\/1748758542_3_683bf00e870af.png\"],\"sizes\":[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"],\"colors\":null,\"category_id\":2,\"subcategory_id\":4,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:15:42.000000Z\",\"updated_at\":\"2025-06-01T06:15:42.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(15, 4, 34, 1, 3400.00, 3400.00, '', '', '{\"id\":34,\"name\":\"Mini Soft Trunk\",\"slug\":\"mini-soft-trunk\",\"description\":\"A monochromatic palette of greys and blacks brings an up-to-the-minute vibe to this Mini Soft Trunk in Damoflage Black coated canvas, trimmed in cowhide leather. With its subtly pixelated Damier checkerboard, this compact bag incarnates Pharrell Williams\\u2019 unique vision. Rolled-leather top handles and a removable, adjustable shoulder strap give carry options. Appearance may vary slightly from photos, depending on the placement of the pattern.\",\"short_description\":null,\"price\":\"3400.00\",\"sale_price\":null,\"sku\":\"PV0003\",\"stock_quantity\":11,\"images\":[\"\\/images\\/products\\/1748716406_0_683b4b76822ec.png\",\"\\/images\\/products\\/1748716406_1_683b4b7682ace.png\",\"\\/images\\/products\\/1748716406_2_683b4b7682f40.png\",\"\\/images\\/products\\/1748716406_3_683b4b7683326.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":8,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T18:33:26.000000Z\",\"updated_at\":\"2025-05-31T18:33:26.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(16, 4, 38, 2, 500.00, 1000.00, '', '', '{\"id\":38,\"name\":\"eLVes Louis Vuitton\",\"slug\":\"elves-louis-vuitton\",\"description\":\"Order your Louis Vuitton fragrance and receive a complimentary sample so you can discover the fragrance before wearing or gifting it. That way, should you wish to, you can return your unopened bottle for reimbursement.\",\"short_description\":null,\"price\":\"500.00\",\"sale_price\":null,\"sku\":\"PP0003\",\"stock_quantity\":44,\"images\":[\"\\/images\\/products\\/1748716912_0_683b4d70cf5ac.png\",\"\\/images\\/products\\/1748716912_1_683b4d70cfc6f.png\",\"\\/images\\/products\\/1748716912_2_683b4d70d0074.png\",\"\\/images\\/products\\/1748716912_3_683b4d70d0711.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":6,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-05-31T18:41:52.000000Z\",\"updated_at\":\"2025-05-31T19:19:39.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(17, 4, 62, 1, 670.00, 670.00, '', '', '{\"id\":62,\"name\":\"LV Initiales 40mm Reversible Belt\",\"slug\":\"lv-initiales-40mm-reversible-belt\",\"description\":\"The iconic LV Initiales 40mm Reversible Belt is reinterpreted by Pharrell Williams with the Fall-Winter 2024 Show\\u2019s standout Cowmooflage motif. Printed on canvas in rich brown tones incorporating Marque L. Vuitton D\\u00e9pos\\u00e9 signatures, it can also be styled with a plain white leather side for a summery modern look. A palladium-colored LV buckle completes this fashion-forward design.\",\"short_description\":null,\"price\":\"670.00\",\"sale_price\":null,\"sku\":\"PB0003\",\"stock_quantity\":80,\"images\":[\"\\/images\\/products\\/1748818228_0_683cd9345e04b.png\",\"\\/images\\/products\\/1748818228_1_683cd9345eabd.png\",\"\\/images\\/products\\/1748818228_2_683cd9345f005.png\",\"\\/images\\/products\\/1748818228_3_683cd9345f45e.png\"],\"sizes\":null,\"colors\":null,\"category_id\":3,\"subcategory_id\":7,\"is_featured\":true,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T22:50:28.000000Z\",\"updated_at\":\"2025-06-01T22:54:19.000000Z\"}', '2025-06-01 18:44:41', '2025-06-01 18:44:41'),
(18, 5, 57, 1, 2540.00, 2540.00, '39', '', '{\"id\":57,\"name\":\"Damier 3D Light Denim Shorts\",\"slug\":\"damier-3d-light-denim-shorts-1\",\"description\":\"These organic cotton denim shorts in pale, washed indigo are a summer essential. They are adorned with the iconic textured 3D Damier jacquard incorporating Marque L.Vuitton D\\u00e9pos\\u00e9e signatures, while a pearl-effect button and rivets add a dandy accent. This timeless signature piece is easy to mix and match and has a matching shirt for a total look.\",\"short_description\":null,\"price\":\"2540.00\",\"sale_price\":null,\"sku\":\"PN0003\",\"stock_quantity\":67,\"images\":[\"\\/images\\/products\\/1748759546_0_683bf3fa33493.png\",\"\\/images\\/products\\/1748759546_1_683bf3fa34b06.png\",\"\\/images\\/products\\/1748759546_2_683bf3fa3510f.png\",\"\\/images\\/products\\/1748759546_3_683bf3fa35793.png\"],\"sizes\":[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"],\"colors\":null,\"category_id\":2,\"subcategory_id\":3,\"is_featured\":false,\"is_active\":true,\"sort_order\":0,\"created_at\":\"2025-06-01T06:32:26.000000Z\",\"updated_at\":\"2025-06-02T00:14:41.000000Z\"}', '2025-06-01 18:47:57', '2025-06-01 18:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sizes`)),
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`colors`)),
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `short_description`, `price`, `sale_price`, `sku`, `stock_quantity`, `images`, `sizes`, `colors`, `category_id`, `subcategory_id`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(32, 'Key Pouch M', 'key-pouch-m', 'The new Pochette Clés M joins the House’s iconic collection that debuted in 1984. This sleek addition is made from signature Monogram coated canvas, embellished with an elegant gold-tone chain and zip-pull across the top. A perfect travel companion, it is sized to store a passport and comes with a large card slot. Slip it into a bag or carry it by hand.', NULL, 505.00, NULL, 'PV0001', 9, '[\"\\/images\\/products\\/1748716221_0_683b4abd8d2bf.png\",\"\\/images\\/products\\/1748716221_1_683b4abd8d85d.png\",\"\\/images\\/products\\/1748716221_2_683b4abd8df63.png\",\"\\/images\\/products\\/1748716221_3_683b4abd8e35f.png\"]', NULL, NULL, 3, 8, 0, 1, 0, '2025-05-31 13:00:21', '2025-05-31 13:49:39'),
(33, 'Mini Bumbag', 'mini-bumbag', 'Limited-edition colorway available exclusively in the Americas.\r\n\r\nPerfect for the season ahead, this edition of the Mini Bumbag embodies casual-chic. It is crafted from canvas elevated with the House’s iconic Damier Azur pattern, which is inspired by the easygoing elegance of the French Riviera. With multiple zipped pockets, it offers plenty of storage for everyday essentials and can be worn cross-body or over one shoulder.', NULL, 2120.00, NULL, 'PV0002', 10, '[\"\\/images\\/products\\/1748716319_0_683b4b1f5c9f3.png\",\"\\/images\\/products\\/1748716319_1_683b4b1f5cfca.png\",\"\\/images\\/products\\/1748716319_2_683b4b1f5d4ac.png\",\"\\/images\\/products\\/1748716319_3_683b4b1f5d8f0.png\"]', NULL, NULL, 3, 8, 0, 1, 0, '2025-05-31 13:01:59', '2025-05-31 13:01:59'),
(34, 'Mini Soft Trunk', 'mini-soft-trunk', 'A monochromatic palette of greys and blacks brings an up-to-the-minute vibe to this Mini Soft Trunk in Damoflage Black coated canvas, trimmed in cowhide leather. With its subtly pixelated Damier checkerboard, this compact bag incarnates Pharrell Williams’ unique vision. Rolled-leather top handles and a removable, adjustable shoulder strap give carry options. Appearance may vary slightly from photos, depending on the placement of the pattern.', NULL, 3400.00, NULL, 'PV0003', 10, '[\"\\/images\\/products\\/1748716406_0_683b4b76822ec.png\",\"\\/images\\/products\\/1748716406_1_683b4b7682ace.png\",\"\\/images\\/products\\/1748716406_2_683b4b7682f40.png\",\"\\/images\\/products\\/1748716406_3_683b4b7683326.png\"]', NULL, NULL, 3, 8, 0, 1, 0, '2025-05-31 13:03:26', '2025-06-01 18:44:41'),
(35, 'Christopher MM', 'christopher-mm', 'This Christopher MM backpack is made from Epi XL leather with a hand-brushed patina effect. The irregular aspect of the patina and the embossing on the leather bring a rugged feel to the backpack. The two side pockets and silver-tone front buckles make it immediately recognizable. Inside there’s a pocket for a tablet computer.', NULL, 5100.00, NULL, 'PV0004', 12, '[\"\\/images\\/products\\/1748716472_0_683b4bb8c6e3c.png\",\"\\/images\\/products\\/1748716472_1_683b4bb8c7471.png\",\"\\/images\\/products\\/1748716472_2_683b4bb8c7b3c.png\",\"\\/images\\/products\\/1748716472_3_683b4bb8c8006.png\"]', NULL, NULL, 3, 8, 1, 1, 0, '2025-05-31 13:04:32', '2025-06-01 17:23:51'),
(36, 'Imagination', 'imagination', 'Available exclusively on louisvuitton.com and in selected Louis Vuitton stores.\r\n\r\nOrder your Louis Vuitton fragrance and receive a complimentary sample so you can discover the fragrance before wearing or gifting it. That way, should you wish to, you can return your unopened bottle for reimbursement.', NULL, 345.00, NULL, 'PP0001', 100, '[\"\\/images\\/products\\/1748716652_0_683b4c6cec86a.png\",\"\\/images\\/products\\/1748716652_1_683b4c6ced09e.png\",\"\\/images\\/products\\/1748716652_2_683b4c6ced5df.png\",\"\\/images\\/products\\/1748716652_3_683b4c6ced997.png\"]', NULL, NULL, 3, 6, 0, 1, 0, '2025-05-31 13:07:32', '2025-05-31 13:07:32'),
(37, 'Attrape-Rêves', 'attrape-reves', 'Cocoa as airy-light as a wondrous journey somewhere between dream and reality\r\nLike the Northern Lights appearing out of nowhere, Attrape-Rêves is the fragrant embodiment of supernatural phenomena forever embedded in the memory of some far-flung exploration. Inspired by such waking dreams, the Master Perfumer Jacques Cavallier Belletrud imagines a trail like a', NULL, 345.00, NULL, 'PP0002', 50, '[\"\\/images\\/products\\/1748716827_0_683b4d1b1b5e3.png\",\"\\/images\\/products\\/1748716827_1_683b4d1b1c409.png\",\"\\/images\\/products\\/1748716827_2_683b4d1b1d2af.png\",\"\\/images\\/products\\/1748716827_3_683b4d1b1d682.png\"]', NULL, NULL, 3, 6, 0, 1, 0, '2025-05-31 13:10:27', '2025-05-31 13:10:27'),
(38, 'eLVes Louis Vuitton', 'elves-louis-vuitton', 'Order your Louis Vuitton fragrance and receive a complimentary sample so you can discover the fragrance before wearing or gifting it. That way, should you wish to, you can return your unopened bottle for reimbursement.', NULL, 500.00, NULL, 'PP0003', 42, '[\"\\/images\\/products\\/1748716912_0_683b4d70cf5ac.png\",\"\\/images\\/products\\/1748716912_1_683b4d70cfc6f.png\",\"\\/images\\/products\\/1748716912_2_683b4d70d0074.png\",\"\\/images\\/products\\/1748716912_3_683b4d70d0711.png\"]', NULL, NULL, 3, 6, 0, 1, 0, '2025-05-31 13:11:52', '2025-06-01 18:44:41'),
(39, 'Spell on You', 'spell-on-you', 'Order your Louis Vuitton fragrance and receive a complimentary sample so you can discover the fragrance before wearing or gifting it. That way, should you wish to, you can return your unopened bottle for reimbursement.', NULL, 450.00, NULL, 'PP0004', 20, '[\"\\/images\\/products\\/1748716994_0_683b4dc268b0c.png\",\"\\/images\\/products\\/1748716994_1_683b4dc269417.png\",\"\\/images\\/products\\/1748716994_2_683b4dc269888.png\",\"\\/images\\/products\\/1748716994_3_683b4dc26a0ab.png\"]', NULL, NULL, 3, 6, 0, 1, 0, '2025-05-31 13:13:14', '2025-05-31 13:13:14'),
(40, 'LV Flower 40mm Reversible Belt', 'lv-flower-40mm-reversible-belt', 'The LV Flower 40mm Reversible belt suffuses the House\'s time-honored elements with modernity. The canvas side is coated with the graphic Damier Héritage motif, interspersed with the \"Marque Louis Vuitton Déposée\" signature, and on the other, the LV Flower emblem is embossed on leather. Conspicuous in its size, the buckle is simply alluring, with chunky initials paired alongside a single flower.', NULL, 715.00, NULL, 'PB0001', 500, '[\"\\/images\\/products\\/1748717091_0_683b4e23ebe5e.png\",\"\\/images\\/products\\/1748717091_1_683b4e23ec598.png\",\"\\/images\\/products\\/1748717091_2_683b4e23ec948.png\",\"\\/images\\/products\\/1748717091_3_683b4e23ecfdc.png\"]', NULL, NULL, 3, 7, 0, 1, 0, '2025-05-31 13:14:51', '2025-05-31 13:14:51'),
(41, 'LV Dimension 40mm Reversible Belt', 'lv-dimension-40mm-reversible-belt', 'The LV Dimension Monogram Héritage 40mm Reversible belt is the latest interpretation of the classic style, now embellished in a textured tribute to the House codes. The buckle, a pair of initials, gleams against the earthy-hued palette: a solid leather on one side of the strap, and on the reverse, coated canvas sporting the Monogram.', NULL, 830.00, NULL, 'PB0002', 19, '[\"\\/images\\/products\\/1748717191_0_683b4e87abe84.png\",\"\\/images\\/products\\/1748717191_1_683b4e87ac572.png\",\"\\/images\\/products\\/1748717191_2_683b4e87ac910.png\",\"\\/images\\/products\\/1748717191_3_683b4e87acd79.png\"]', NULL, NULL, 3, 7, 0, 1, 0, '2025-05-31 13:16:31', '2025-05-31 13:49:39'),
(42, 'Major Loafer', 'major-loafer-1', 'A luxurious pair of high heels crafted from premium velvet fabric. Designed with a soft insole and elegant silhouette, Velvet Vogue adds a sophisticated touch to evening gowns and upscale events while ensuring graceful comfort.', NULL, 3300.00, NULL, 'PE0006', 50, '[\"\\/images\\/products\\/1748718439_0_683b53679b929.png\",\"\\/images\\/products\\/1748718439_1_683b53679bfe1.png\",\"\\/images\\/products\\/1748718439_2_683b53679c2f0.png\",\"\\/images\\/products\\/1748718439_3_683b53679c545.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 4, 0, 1, 0, '2025-05-31 13:35:26', '2025-05-31 13:37:19'),
(43, 'Varenne Chelsea Boot', 'varenne-chelsea-boot-1', 'Refined Chelsea boots crafted from premium leather for the modern gentleman.', NULL, 1700.00, NULL, 'PE0007', 100, '[\"\\/images\\/products\\/1748718518_0_683b53b6d8390.png\",\"\\/images\\/products\\/1748718518_1_683b53b6d8cca.png\",\"\\/images\\/products\\/1748718518_2_683b53b6d908a.png\",\"\\/images\\/products\\/1748718518_3_683b53b6d94c3.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 4, 0, 1, 0, '2025-05-31 13:38:38', '2025-05-31 13:38:38'),
(44, 'LV Trainer Sneaker', 'lv-trainer-sneaker-1', 'A stylish and versatile sneaker perfect for urban environments. Featuring breathable mesh, cushioned soles, and a sleek minimalist design, Urban Stride offers all-day comfort for walking, commuting, or casual outings.', NULL, 5000.00, NULL, 'PE0008', 16, '[\"\\/images\\/products\\/1748718578_0_683b53f266369.png\",\"\\/images\\/products\\/1748718578_1_683b53f266c2c.png\",\"\\/images\\/products\\/1748718578_2_683b53f267041.png\",\"\\/images\\/products\\/1748718578_3_683b53f2673fe.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 4, 0, 1, 0, '2025-05-31 13:39:38', '2025-05-31 13:49:39'),
(46, 'Stripe Accent Knit Polo Dress', 'stripe-accent-knit-polo-dress-1', 'This knitted polo dress is chic and contemporary in a trompe l’oeil design resembling a trim two-piece. It is spun from a plush wool-cashmere blend featuring a scaled-up openwork Monogram motif for a subtle allover signature, while graphic black stitching lends a nautical air to the flat collar, short sleeves, belt and hemline. Main Material : 70% Wool, 28% Cashmere, 1% Polyamide, 1% Elastane Milky White Made in Italy', NULL, 2960.00, NULL, 'PC0001', 99, '[\"\\/images\\/products\\/1748757697_0_683becc129ea9.png\",\"\\/images\\/products\\/1748757697_1_683becc12af8f.png\",\"\\/images\\/products\\/1748757697_2_683becc12b65d.png\",\"\\/images\\/products\\/1748757697_3_683becc12c173.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 1, 1, 0, 1, 0, '2025-06-01 00:31:37', '2025-06-01 18:44:41'),
(47, 'Monogram Canvas Jeans', 'monogram-canvas-jeans-1', 'These classic straight-cut jeans are reimagined with a laidback feel in structured cotton canvas in a casual uneven finish, with the iconic Monogram motif featuring in relief on the back. Tonal topstitching highlights the construction, while silver-toned hardware adds a contrasting accent. Signed with a leather Louis Vuitton patch on the waistband. Main Material : 100% Cotton Beige Made in Italy', NULL, 2080.00, NULL, 'PC0002', 98, '[\"\\/images\\/products\\/1748757811_0_683bed33293a8.png\",\"\\/images\\/products\\/1748757811_1_683bed3329efa.png\",\"\\/images\\/products\\/1748757811_2_683bed332a77b.png\",\"\\/images\\/products\\/1748757811_3_683bed332b066.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 1, 1, 0, 1, 0, '2025-06-01 00:33:31', '2025-06-01 18:10:42'),
(48, 'Aquarelle Monogram Shirt Dress', 'aquarelle-monogram-shirt-dress-1', 'The House’s signature shirt dress is effortlessly elegant with long sleeves, a smart collar and a hidden button tab, while a slim D-ring belt adds definition to the waistline. Cut from soft, fluid silk twill, the iconic Monogram motif features as an allover print in a delicate watercolor effect. Main Material : 100% Silk Petrol Blue', NULL, 3500.00, NULL, 'PC0003', 98, '[\"\\/images\\/products\\/1748757892_0_683bed8440e2e.png\",\"\\/images\\/products\\/1748757892_1_683bed8441c82.png\",\"\\/images\\/products\\/1748757892_2_683bed8442286.png\",\"\\/images\\/products\\/1748757892_3_683bed844996c.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 1, 1, 0, 1, 0, '2025-06-01 00:34:52', '2025-06-01 00:34:52'),
(49, 'Monogram Denim Pleat Skirt', 'monogram-denim-pleat-skirt-1', 'Seasonal codes elevate this casual denim skirt with a chic spirit. It is cut in a classic straight shape, while sharp pleats around the hem introduce romantic volume. This season’s laser-printed Monogram motif features as an allover signature, informed by detailing on the House’s iconic trunks, while contrasting yellow topstitching introduces a timeless vintage touch. Main Material : 100% Cotton Monogram Brown Made in Italy', NULL, 2020.00, NULL, 'PC0004', 50, '[\"\\/images\\/products\\/1748757976_0_683bedd8bc776.png\",\"\\/images\\/products\\/1748757976_1_683bedd8bdcd6.png\",\"\\/images\\/products\\/1748757976_2_683bedd8be3a1.png\",\"\\/images\\/products\\/1748757976_3_683bedd8beabd.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 1, 1, 1, 1, 0, '2025-06-01 00:36:16', '2025-06-01 17:23:10'),
(50, 'Velvet Vogue', 'velvet-vogue', 'A luxurious pair of high heels crafted from premium velvet fabric. Designed with a soft insole and elegant silhouette, Velvet Vogue adds a sophisticated touch to evening gowns and upscale events while ensuring graceful comfort.', NULL, 2600.00, NULL, 'PE0009', 47, '[\"\\/images\\/products\\/1748758542_0_683bf00e850df.png\",\"\\/images\\/products\\/1748758542_1_683bf00e862ea.png\",\"\\/images\\/products\\/1748758542_2_683bf00e86941.png\",\"\\/images\\/products\\/1748758542_3_683bf00e870af.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 4, 0, 1, 0, '2025-06-01 00:45:42', '2025-06-01 18:44:41'),
(51, 'Short-Sleeved Classic Shirt', 'short-sleeved-classic-shirt-1', 'Perfect for warmer days, this tailored short-sleeved shirt in pale blue organic cotton has a tone-on-tone Monogram Pinstripes jacquard motif. An LV signs the top button while a discreet LV and Monogram Flowers label embellishes the bottom of the placket. This piece has a matching suit for an elegantly layered office look.', NULL, 5200.00, NULL, 'PN0001', 100, '[\"\\/images\\/products\\/1748758740_0_683bf0d4402ba.png\",\"\\/images\\/products\\/1748758740_1_683bf0d440f80.png\",\"\\/images\\/products\\/1748758740_2_683bf0d441749.png\",\"\\/images\\/products\\/1748758740_3_683bf0d442920.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 2, 3, 0, 1, 0, '2025-06-01 00:49:00', '2025-06-01 00:49:00'),
(52, 'Cotton Hoodie', 'cotton-hoodie-1', 'This casual hoodie in refined dark blue tones is distinguished with a crisp white printed Monogram motif inside the hood and on the ribbon-like draw cords. Golden eyelets and cord ends add a sophisticated accent. Crafted from pure organic cotton, this piece is ideal for traveling and makes a versatile staple for relaxed everyday looks.', NULL, 2850.00, NULL, 'PN0002', 0, '[\"\\/images\\/products\\/1748758842_0_683bf13aea4e4.png\",\"\\/images\\/products\\/1748758842_1_683bf13aeb652.png\",\"\\/images\\/products\\/1748758842_2_683bf13af02ca.png\",\"\\/images\\/products\\/1748758842_3_683bf13af0df6.png\"]', '[\"S\",\"M\",\"L\",\"XL\",\"2XL\"]', NULL, 2, 3, 0, 1, 0, '2025-06-01 00:50:42', '2025-06-01 00:50:42'),
(53, 'Neverfull GM', 'neverfull-gm-1', 'The Neverfull GM tote unites timeless design with heritage details. Made from supple Monogram canvas with natural cowhide trim, it is ultra-roomy but never bulky, with side laces that cinch for a sleek allure or loosen for a more casual look. Slim, comfortable handles slip easily over the shoulder or arm. Lined in colorful textile, it features a removable pouch which can serve as a clutch or an extra pocket.', NULL, 1260.00, NULL, 'PL0001', 85, '[\"\\/images\\/products\\/1748758919_0_683bf187017db.png\",\"\\/images\\/products\\/1748758919_1_683bf18702d5b.png\",\"\\/images\\/products\\/1748758919_2_683bf18703a35.png\",\"\\/images\\/products\\/1748758919_3_683bf18704178.png\"]', NULL, NULL, 1, 2, 0, 1, 0, '2025-06-01 00:51:59', '2025-06-01 00:51:59'),
(54, 'Coussin Backpack PM', 'coussin-backpack-pm-1', 'A first for the Coussin line, this new backpack PM version strikes the perfect balance of functional and chic. Designed for women on the go, it is crafted from supple leather embossed with the House’s signature Monogram and is adorned with an iconic LV padlock. The Coussin chain stands out with a gold-toned finish, and can be removed if desired. Use the front zipped pocket to keep small essentials within easy reach.', NULL, 4500.00, NULL, 'PL0002', 61, '[\"\\/images\\/products\\/1748759250_0_683bf2d219232.png\",\"\\/images\\/products\\/1748759250_1_683bf2d21a316.png\",\"\\/images\\/products\\/1748759250_2_683bf2d21ac8a.png\",\"\\/images\\/products\\/1748759250_3_683bf2d21f7ee.png\"]', NULL, NULL, 1, 2, 0, 1, 0, '2025-06-01 00:57:30', '2025-06-01 18:44:41'),
(55, 'Side Trunk GM', 'side-trunk-gm-1', 'A celebration of the House’s iconic heritage, this Side Trunk GM is the perfect blend of bold and refined with its new chain extension. Sized to store everyday essentials and more... it is crafted from Monogram canvas with gold-toned hardware and contrasting leather trims. Note the signature details, from the S-lock closure to the trunk-inspired corners.', NULL, 4450.00, NULL, 'PL0003', 50, '[\"\\/images\\/products\\/1748759337_0_683bf329678aa.png\",\"\\/images\\/products\\/1748759337_1_683bf329689ea.png\",\"\\/images\\/products\\/1748759337_2_683bf329692ab.png\",\"\\/images\\/products\\/1748759337_3_683bf32969783.png\"]', NULL, NULL, 1, 2, 0, 1, 0, '2025-06-01 00:58:57', '2025-06-01 00:58:57'),
(57, 'Damier 3D Light Denim Shorts', 'damier-3d-light-denim-shorts-1', 'These organic cotton denim shorts in pale, washed indigo are a summer essential. They are adorned with the iconic textured 3D Damier jacquard incorporating Marque L.Vuitton Déposée signatures, while a pearl-effect button and rivets add a dandy accent. This timeless signature piece is easy to mix and match and has a matching shirt for a total look.', NULL, 2540.00, NULL, 'PN0003', 66, '[\"\\/images\\/products\\/1748759546_0_683bf3fa33493.png\",\"\\/images\\/products\\/1748759546_1_683bf3fa34b06.png\",\"\\/images\\/products\\/1748759546_2_683bf3fa3510f.png\",\"\\/images\\/products\\/1748759546_3_683bf3fa35793.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 3, 0, 1, 0, '2025-06-01 01:02:26', '2025-06-01 18:47:57'),
(58, 'Monogram Embossed Skate Pants', 'monogram-embossed-skate-pants-1', 'Drawing on the Louis Vuitton savoir-faire, these skate pants are adorned with this season’s allover embossed Monogram and accented with a pearly button and rivets and a nubuck Damier jacqueron. Their versatile silhouette flatters all morphologies, while their mid-brown color is easy to mix and match, bringing an elegant signature accent to a look. A matching overshirt makes a distinguished set.', NULL, 3200.00, NULL, 'PN0004', 70, '[\"\\/images\\/products\\/1748759632_0_683bf450664c8.png\",\"\\/images\\/products\\/1748759632_1_683bf45066ea4.png\",\"\\/images\\/products\\/1748759632_2_683bf45067597.png\",\"\\/images\\/products\\/1748759632_3_683bf45067d34.png\"]', '[\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]', NULL, 2, 3, 1, 1, 0, '2025-06-01 01:03:52', '2025-06-01 17:23:29'),
(61, 'Christopher white', 'christopher-white', 'The irregular aspect of the patina and the embossing on the leather bring a rugged feel to the backpack. The two side pockets and silver-tone front buckles make it immediately recognizable. Inside there’s a pocket for a tablet computer.', NULL, 2600.00, NULL, 'PL0004', 60, '[\"\\/images\\/products\\/1748812289_0_683cc201521ac.png\",\"\\/images\\/products\\/1748812289_1_683cc20152a3b.png\",\"\\/images\\/products\\/1748812289_2_683cc20152ea8.png\",\"\\/images\\/products\\/1748812289_3_683cc20153311.png\"]', NULL, NULL, 1, 2, 0, 1, 0, '2025-06-01 15:41:29', '2025-06-01 17:22:53'),
(62, 'LV Initiales 40mm Reversible Belt', 'lv-initiales-40mm-reversible-belt', 'The iconic LV Initiales 40mm Reversible Belt is reinterpreted by Pharrell Williams with the Fall-Winter 2024 Show’s standout Cowmooflage motif. Printed on canvas in rich brown tones incorporating Marque L. Vuitton Déposé signatures, it can also be styled with a plain white leather side for a summery modern look. A palladium-colored LV buckle completes this fashion-forward design.', NULL, 670.00, NULL, 'PB0003', 79, '[\"\\/images\\/products\\/1748818228_0_683cd9345e04b.png\",\"\\/images\\/products\\/1748818228_1_683cd9345eabd.png\",\"\\/images\\/products\\/1748818228_2_683cd9345f005.png\",\"\\/images\\/products\\/1748818228_3_683cd9345f45e.png\"]', NULL, NULL, 3, 7, 1, 1, 0, '2025-06-01 17:20:28', '2025-06-01 18:44:41'),
(63, 'LV Flower  Reversible Belt', 'lv-flower-reversible-belt', 'The LV Flower 40mm Reversible belt suffuses the House\'s time-honored elements with modernity. The canvas side is coated with the graphic Damier Héritage motif, interspersed with the \"Marque Louis Vuitton Déposée\" signature, and on the other, the LV Flower emblem is embossed on leather. Conspicuous in its size, the buckle is simply alluring, with chunky initials paired alongside a single flower.', NULL, 550.00, NULL, 'PB0004', 90, '[\"\\/images\\/products\\/1748818310_0_683cd9864150f.png\",\"\\/images\\/products\\/1748818310_1_683cd98642276.png\",\"\\/images\\/products\\/1748818310_2_683cd986426f4.png\",\"\\/images\\/products\\/1748818310_3_683cd98642af2.png\"]', NULL, NULL, 3, 7, 0, 1, 0, '2025-06-01 17:21:50', '2025-06-01 17:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pdYFkPRJDBwgMRu3oZPMCcYSLlOtTnjU2DcwSA7M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnh0bW1sNWZnSU9hWjV3UFl2Wjc3cUh4SklsQzdkZnRqRVJ4YVdZRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1748823551);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `user_id`, `session_id`, `product_id`, `quantity`, `size`, `color`, `created_at`, `updated_at`) VALUES
(17, NULL, 'BOeiPUOERugr06MGcjSVJKNcwuyzYpHbtnuGI5Qn', 46, 1, 'S', '', '2025-06-01 15:00:39', '2025-06-01 15:00:39'),
(18, 3, NULL, 46, 1, 'S', '', '2025-06-01 15:01:45', '2025-06-01 15:01:45'),
(19, 3, NULL, 44, 1, '39', '', '2025-06-01 15:01:52', '2025-06-01 15:01:52'),
(25, NULL, 'ZqFgiZGoTHfVp24K2QnN48GoPW78XVSAUVz3Zgfk', 53, 1, '', '', '2025-06-01 18:22:35', '2025-06-01 18:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 'clothing', 1, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(2, 'Bags', 'bags', 1, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(3, 'Clothing', 'clothing', 2, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(4, 'Shoes', 'shoes', 2, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(5, 'Jewelry', 'jewelry', 3, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(6, 'Perfumes', 'perfumes', 3, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(7, 'Belts', 'belts', 3, NULL, NULL, 1, '2025-05-30 15:19:19', '2025-05-30 15:19:19'),
(8, 'Volet', 'volet', 3, '', NULL, 1, '2025-05-31 07:38:17', '2025-05-31 07:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin User', 'admin@pearlprestige.com', '2025-05-30 15:19:19', '$2y$10$/MsQ39GV/VF6l2hJvpDEUeB.kqeX4R0dmaZqrcdjdBo8RcVMscPGO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-30 15:19:19', '2025-05-30 15:19:19', 1),
(2, 'Test Customer', 'customer@test.com', '2025-05-30 15:19:19', '$2y$12$danTGExUrNYo5i2gkT5zwefRnHUdVsn6LwmMDVpFOj4yRsJgMRiBa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-30 15:19:19', '2025-05-30 15:19:19', 0),
(3, 'user01', 'user01@gmail.com', NULL, '$2y$12$7wezGLV0tx.GDWAMvUhQ8.8TeFZ/e7cc58wyrZfI/e27da8WA33P.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-30 16:14:59', '2025-05-30 16:14:59', 0),
(7, 'adminn1', 'adminn1@gmail.com', NULL, '$2y$12$SM0Pjj9trA5CxuVK01Usoe2EhIJxEODLmaKT6bGErsshrrvUXarKm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-31 08:31:08', '2025-05-31 08:31:08', 1),
(8, 'mihi', 'mihi@gmail.com', NULL, '$2y$12$p3CntU1gs3RAIe7dKNLRzeVKIu3x.wWr09f7F9362bpazEGjqmW/y', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-01 17:30:07', '2025-06-01 17:30:07', 0),
(9, 'admin', 'admin@gmail.com', NULL, '$2y$12$QbL/6U.W8kmgIbUM.BRzFOBjQOT94h.iyXBWFKYAxUmldo5MnaCOO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-01 18:15:25', '2025-06-01 18:15:25', 1),
(10, 'user', 'user@gmail.com', NULL, '$2y$12$mUY40U30xCc3hjOFlOY3sOMFrIIsFolHNVhzh3rtxFw/Y1gTQXu2y', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-01 18:23:33', '2025-06-01 18:23:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
