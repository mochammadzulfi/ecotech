-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ecotech
CREATE DATABASE IF NOT EXISTS `ecotech` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ecotech`;

-- Dumping structure for table ecotech.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.cache: ~0 rows (approximately)

-- Dumping structure for table ecotech.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.cache_locks: ~0 rows (approximately)

-- Dumping structure for table ecotech.certificates
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.certificates: ~3 rows (approximately)
REPLACE INTO `certificates` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
	(1, 'BPJS Ketenagakerjaan', 'certificates/bpjs.png', NULL, NULL),
	(2, 'BKI', 'certificates/bki.png', NULL, NULL),
	(3, 'ISO 9001:2015', 'certificates/iso.png', NULL, NULL);

-- Dumping structure for table ecotech.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.clients: ~4 rows (approximately)
REPLACE INTO `clients` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
	(1, 'Garudafood', 'clients/garudafood.png', NULL, NULL),
	(2, 'Meratus', 'clients/meratus.png', NULL, NULL),
	(3, 'Temas', 'clients/temas.png', NULL, NULL),
	(4, 'Tanto', 'clients/tanto.png', NULL, NULL);

-- Dumping structure for table ecotech.expertises
CREATE TABLE IF NOT EXISTS `expertises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) NOT NULL,
  `title_id` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `desc_id` text NOT NULL,
  `desc_en` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.expertises: ~3 rows (approximately)
REPLACE INTO `expertises` (`id`, `icon`, `title_id`, `title_en`, `desc_id`, `desc_en`, `created_at`, `updated_at`) VALUES
	(1, 'icons/repair.png', 'Perawatan & Perbaikan', 'Maintenance & Repair', 'Layanan perawatan dan perbaikan boiler industri.', 'Industrial boiler maintenance and repair services.', NULL, NULL),
	(2, 'icons/install.png', 'Instalasi Sistem', 'System Installation', 'Instalasi sistem boiler dan pendukung.', 'Complete boiler system installation.', NULL, NULL),
	(3, 'icons/sparepart.png', 'Suku Cadang', 'Spare Parts Supply', 'Penyediaan suku cadang boiler.', 'Boiler spare parts supply.', NULL, NULL);

-- Dumping structure for table ecotech.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ecotech.home_contents
CREATE TABLE IF NOT EXISTS `home_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hero_title_id` varchar(255) NOT NULL,
  `hero_title_en` varchar(255) NOT NULL,
  `hero_subtitle_id` text NOT NULL,
  `hero_subtitle_en` text NOT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.home_contents: ~1 rows (approximately)
REPLACE INTO `home_contents` (`id`, `hero_title_id`, `hero_title_en`, `hero_subtitle_id`, `hero_subtitle_en`, `hero_image`, `created_at`, `updated_at`) VALUES
	(1, 'Solusi Boiler Profesional', 'Professional Boiler Solution', 'Efisiensi, keselamatan, dan keandalan untuk memaksimalkan output produksi Anda. \n                 Kami menyediakan layanan rekayasa termodinamika yang komprehensif.', 'Efficiency, safety and reliability aimed at maximizing your production output. \n                 We provide comprehensive thermodynamic engineering services.', 'hero/hero-main.jpg', '2026-01-09 07:37:56', '2026-01-09 07:37:56');

-- Dumping structure for table ecotech.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.job_batches: ~0 rows (approximately)

-- Dumping structure for table ecotech.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.jobs: ~0 rows (approximately)

-- Dumping structure for table ecotech.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.migrations: ~11 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_01_09_143508_create_home_contents_table', 1),
	(5, '2026_01_09_144544_create_stats_table', 2),
	(6, '2026_01_09_145029_create_clients_table', 2),
	(7, '2026_01_09_145324_create_expertises_table', 2),
	(8, '2026_01_10_024232_create_precision_sections_table', 3),
	(9, '2026_01_10_024342_create_precision_sections_table', 3),
	(10, '2026_01_10_031149_create_projects_table', 4),
	(11, '2026_01_10_035326_create_certificates_table', 5),
	(12, '2026_01_10_041439_create_cta_sections_table', 6);

-- Dumping structure for table ecotech.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table ecotech.precision_items
CREATE TABLE IF NOT EXISTS `precision_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `precision_section_id` bigint(20) unsigned NOT NULL,
  `label_id` varchar(255) NOT NULL,
  `label_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `precision_items_precision_section_id_foreign` (`precision_section_id`),
  CONSTRAINT `precision_items_precision_section_id_foreign` FOREIGN KEY (`precision_section_id`) REFERENCES `precision_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.precision_items: ~4 rows (approximately)
REPLACE INTO `precision_items` (`id`, `precision_section_id`, `label_id`, `label_en`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Survey & Analisis', 'Survey & Analysis', NULL, NULL),
	(2, 1, 'Retubing', 'Retubing', NULL, NULL),
	(3, 1, 'Insulasi', 'Insulation', NULL, NULL),
	(4, 1, 'Pembersihan', 'Cleaning', NULL, NULL);

-- Dumping structure for table ecotech.precision_sections
CREATE TABLE IF NOT EXISTS `precision_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `desc_id` text NOT NULL,
  `desc_en` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.precision_sections: ~1 rows (approximately)
REPLACE INTO `precision_sections` (`id`, `title_id`, `title_en`, `desc_id`, `desc_en`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Presisi Teknis & Keunggulan Rekayasa', 'Technical Precision & Engineering Excellence', 'Kami menghadirkan presisi teknis dan keunggulan rekayasa untuk memastikan\n         kinerja sistem boiler yang optimal dan berkelanjutan.', 'We deliver technical precision and engineering excellence to ensure\n         optimal and sustainable boiler system performance.', 'precision/boiler.jpg', '2026-01-09 19:59:52', '2026-01-09 19:59:52');

-- Dumping structure for table ecotech.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `category_en` varchar(255) NOT NULL,
  `location_id` varchar(255) NOT NULL,
  `location_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.projects: ~4 rows (approximately)
REPLACE INTO `projects` (`id`, `title_id`, `title_en`, `category_id`, `category_en`, `location_id`, `location_en`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Proyek A', 'Project A', 'Perawatan Boiler', 'Boiler Maintenance', 'Bandung, Indonesia', 'Bandung, Indonesia', 'projects/project-1.jpg', NULL, NULL),
	(2, 'Proyek B', 'Project B', 'Instalasi Sistem', 'System Installation', 'Surabaya, Indonesia', 'Surabaya, Indonesia', 'projects/project-2.jpg', NULL, NULL),
	(3, 'Proyek C', 'Project C', 'Retubing Boiler', 'Boiler Retubing', 'Bekasi, Indonesia', 'Bekasi, Indonesia', 'projects/project-3.jpg', NULL, NULL),
	(4, 'Proyek D', 'Project D', 'Penyediaan Suku Cadang', 'Spare Parts Supply', 'Karawang, Indonesia', 'Karawang, Indonesia', 'projects/project-4.jpg', NULL, NULL);

-- Dumping structure for table ecotech.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.sessions: ~0 rows (approximately)

-- Dumping structure for table ecotech.stats
CREATE TABLE IF NOT EXISTS `stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `label_id` varchar(255) NOT NULL,
  `label_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.stats: ~3 rows (approximately)
REPLACE INTO `stats` (`id`, `icon`, `value`, `label_id`, `label_en`, `created_at`, `updated_at`) VALUES
	(1, 'icons/support.png', '24/7', 'Dukungan Teknis', 'Technical Support', NULL, NULL),
	(2, 'icons/project.png', '500+', 'Proyek Selesai', 'Project Completed', NULL, NULL),
	(3, 'icons/experience.png', '10+', 'Tahun Pengalaman', 'Years Experience', NULL, NULL);

-- Dumping structure for table ecotech.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecotech.users: ~1 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Test User', 'test@example.com', '2026-01-09 07:37:56', '$2y$12$jOY.lpfCd4QwJNsVAKdIt.ZJgGS3grKzNg4FbDtH/Uqfyx3c1GsaS', 'eAgFybCBGK', '2026-01-09 07:37:56', '2026-01-09 07:37:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
