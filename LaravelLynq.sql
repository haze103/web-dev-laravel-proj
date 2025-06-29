-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.42 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table laravelproj.cache: ~2 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel_cache_superadmin@gmail.com|127.0.0.1', 'i:3;', 1751222226),
	('laravel_cache_superadmin@gmail.com|127.0.0.1:timer', 'i:1751222226;', 1751222226);

-- Dumping data for table laravelproj.cache_locks: ~0 rows (approximately)

-- Dumping data for table laravelproj.contacts: ~2 rows (approximately)
INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone_number`, `company`, `position`, `sales_representative_id`, `created_by`) VALUES
	(1, '2025-06-29 10:16:17', '2025-06-29 10:16:17', 'John Carls', 'kalbo@gmail.com', '09625307548', 'tite', 'cowgirl', 1, 3),
	(2, '2025-06-29 10:32:51', '2025-06-29 10:32:51', 'kalbo', 'kalbo@gmail.com', '1231231232', 'kalbo lang', 'patalikod', 1, 3);

-- Dumping data for table laravelproj.failed_jobs: ~0 rows (approximately)

-- Dumping data for table laravelproj.jobs: ~0 rows (approximately)

-- Dumping data for table laravelproj.job_batches: ~0 rows (approximately)

-- Dumping data for table laravelproj.leads: ~3 rows (approximately)
INSERT INTO `leads` (`id`, `created_at`, `updated_at`, `name`, `company`, `created_by`, `assigned_to`, `stage`, `closing_date`, `amount`, `status`) VALUES
	(1, '2025-06-29 10:34:15', '2025-06-29 10:35:17', 'adlh', 'oihasd', 3, 1, 'lost', '2025-06-30', 100.00, 'cold'),
	(2, '2025-06-29 10:35:44', '2025-06-29 10:35:44', 'alskdn', 'askdn', 3, 1, 'won', '2025-06-30', 13212.00, 'active'),
	(4, '2025-06-29 10:41:57', '2025-06-29 10:41:57', 'asd', 'asd', 4, 1, 'won', '2025-06-30', 1231.00, 'cold');

-- Dumping data for table laravelproj.migrations: ~7 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_06_24_061715_create_leads_table', 1),
	(5, '2025_06_28_074043_create_contacts_table', 1),
	(6, '2025_06_28_074647_create_tasks_table', 1),
	(7, '2025_06_29_090421_create_permission_tables', 1);

-- Dumping data for table laravelproj.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table laravelproj.model_has_roles: ~4 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 3),
	(4, 'App\\Models\\User', 1);

-- Dumping data for table laravelproj.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table laravelproj.permissions: ~0 rows (approximately)

-- Dumping data for table laravelproj.roles: ~4 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'web', '2025-06-29 10:13:06', '2025-06-29 10:13:06'),
	(2, 'Admin', 'web', '2025-06-29 10:13:06', '2025-06-29 10:13:06'),
	(3, 'Sales Manager', 'web', '2025-06-29 10:13:06', '2025-06-29 10:13:06'),
	(4, 'Sales Representative', 'web', '2025-06-29 10:13:06', '2025-06-29 10:13:06');

-- Dumping data for table laravelproj.role_has_permissions: ~0 rows (approximately)

-- Dumping data for table laravelproj.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('bnvhEOqmxOz6edJOIO1qT5BJxeorwfXlXbzTUUUJ', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSFRSeFRDZFFNckhrZWd6UTJaTXdYdjQ5aEtmUUw3VlNtYWlLdFlNNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzUxMjIyNDA4O319', 1751222577);

-- Dumping data for table laravelproj.tasks: ~0 rows (approximately)

-- Dumping data for table laravelproj.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'User', 'test@example.com', '2025-06-29 10:13:05', '$2y$12$ageyGN8dU6h.sAOVptob2OD4BKwbq.3fkt5GnjH6rHsV5rzxzz4cm', '7SapcKqFUj', 'Sales Representative', 'Active', '2025-06-29 10:13:05', '2025-06-29 10:13:05'),
	(2, 'Super', 'Admin', 'superadmin@lynq.com', NULL, '$2y$12$IeTKp0xU2DZbin469YmLnOHvy5D7V3EMXDftnY3RyoRagYVyubJgK', NULL, 'Super Admin', 'Active', '2025-06-29 10:13:06', '2025-06-29 10:13:06'),
	(3, 'tae', 'ka', 'demo@gmail.com', NULL, '$2y$12$4EGgPMsNZpkQOvxDe45kpuNqrYHFUj4hJG8C4LQfAPh5bDSCwQp9q', NULL, 'Sales Manager', 'Active', '2025-06-29 10:14:46', '2025-06-29 10:31:48'),
	(4, 'john', 'c', 'johnc@gmail.com', NULL, '$2y$12$JzpYRW1aSUdByvrHUokhXeBnPfgvPRKaiZ4957Dtxf/mFRuslc7sy', NULL, 'Admin', 'Inactive', '2025-06-29 10:39:44', '2025-06-29 10:39:44');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
