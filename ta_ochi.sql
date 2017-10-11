-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24 Agu 2017 pada 15.20
-- Versi Server: 10.2.8-MariaDB-10.2.8+maria~xenial-log
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_ochi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_19_170303_entrust_setup_tables', 2),
(4, '2017_07_20_152453_create_tb_product', 3),
(5, '2017_07_20_152455_create_tb_keluhan', 3),
(6, '2017_07_20_160852_create_pekerja_keluhan', 4),
(13, '2017_07_22_191932_create_table_laporan', 5),
(14, '2017_07_30_183254_create_table_file_laporan', 5),
(19, '2017_08_23_155232_create_tabel_tb_room_chat', 6),
(21, '2017_08_23_155905_create_tabel_tb_chat', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user-view', 'View User', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(2, 'user-create', 'Create User', 'fasefaesfse', '2017-07-19 17:00:00', '2017-07-19 12:51:25'),
(3, 'user-edit', 'Edit User', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(4, 'user-delete', 'Delete User', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(5, 'permission-view', 'Permission View', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(6, 'permission-create', 'Permission Create', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(7, 'permission-edit', 'Permission Edit', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(8, 'permission-delete', 'Delete Permission', NULL, '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(9, 'role-view', 'View Role', 'View Role', '2017-07-19 12:12:50', '2017-07-19 12:12:50'),
(10, 'role-create', 'Create Role', 'Create Role', '2017-07-19 12:13:40', '2017-07-19 12:13:40'),
(11, 'role-edit', 'Edit Role', 'Edit Role', '2017-07-19 12:14:00', '2017-07-19 12:14:00'),
(12, 'role-delete', 'Delete Role', 'Delete Role', '2017-07-19 12:14:26', '2017-07-19 12:14:26'),
(17, 'laporan-view', 'View Laporan', 'View Laporan', '2017-07-20 09:17:14', '2017-07-22 11:56:16'),
(18, 'laporan-create', 'Create Laporan', 'Create Laporan', '2017-07-20 09:17:33', '2017-07-22 11:56:34'),
(19, 'laporan-edit', 'Edit Laporan', 'Edit Laporan', '2017-07-20 09:17:53', '2017-07-22 11:56:48'),
(20, 'laporan-delete', 'Delete Laporan', 'Delete Laporan', '2017-07-20 09:19:03', '2017-07-22 11:57:09'),
(21, 'laporan-kerjakan', 'Kerjakan Laporan', 'Kerjakan Laporan', '2017-07-20 10:05:36', '2017-07-22 15:26:47'),
(26, 'laporan-verif', 'Verified Laporan', 'Verified Laporan', '2017-07-27 00:05:44', '2017-07-27 00:05:44'),
(27, 'laporan-show', 'Show Laporan', 'Show Laporan', '2017-07-31 00:34:25', '2017-07-31 00:34:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(17, 1),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(18, 1),
(18, 5),
(18, 7),
(19, 5),
(19, 7),
(20, 1),
(20, 5),
(20, 7),
(21, 5),
(21, 7),
(26, 4),
(26, 6),
(27, 1),
(27, 4),
(27, 5),
(27, 6),
(27, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Administrator', '2017-07-19 17:00:00', '2017-07-19 17:00:00'),
(4, 'kajur', 'Kajur', 'Kepala Jurusan', '2017-07-19 14:14:55', '2017-07-22 11:54:44'),
(5, 'staff', 'Staff', 'Perkerja', '2017-07-20 10:16:27', '2017-07-22 11:55:10'),
(6, 'kalab', 'Ka Lab', 'Kepala Lab', '2017-08-11 01:51:04', '2017-08-11 01:51:04'),
(7, 'teknisi', 'Teknisi Lab', 'Teknisi Lab', '2017-08-11 01:54:05', '2017-08-11 01:54:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 4),
(3, 5),
(4, 5),
(5, 5),
(6, 6),
(7, 7),
(8, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `room_chat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id`, `body`, `author_id`, `room_chat_id`, `created_at`, `updated_at`) VALUES
(1, 'Saya menunggu jawaban bapak.. Karena hari ini mau di kumpulkan laporan nya.', 1, 1, '2017-08-23 12:18:47', '2017-08-23 12:18:47'),
(2, 'Saya menunggu jawaban bapak.. Karena hari ini mau di kumpulkan laporan nya.', 1, 1, '2017-08-23 12:19:00', '2017-08-23 12:19:00'),
(3, 'Saya menunggu jawaban bapak.. Karena hari ini mau di kumpulkan laporan nya.', 1, 1, '2017-08-23 12:19:16', '2017-08-23 12:19:16'),
(4, 'Saya menunggu jawaban bapak.. Karena hari ini mau di kumpulkan laporan nya.', 1, 1, '2017-08-23 12:19:48', '2017-08-23 12:19:48'),
(5, 'Saya menunggu jawaban bapak.. Karena hari ini mau di kumpulkan laporan nya.', 1, 1, '2017-08-23 12:20:07', '2017-08-23 12:20:07'),
(6, 'ia ini baru saya buka..', 2, 1, '2017-08-23 13:06:45', '2017-08-23 13:06:45'),
(7, 'baru lihat saya. nanti akan saya kerjakan lagi', 2, 1, '2017-08-23 13:07:03', '2017-08-23 13:07:03'),
(8, 'nanti jangan lupa di buat fotocopy nya..', 1, 3, '2017-08-23 17:59:17', '2017-08-23 17:59:17'),
(9, 'iya nanti di usahakan pak..', 2, 3, '2017-08-23 17:59:54', '2017-08-23 17:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file_laporan`
--

CREATE TABLE `tb_file_laporan` (
  `id` int(10) UNSIGNED NOT NULL,
  `laporan_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_file_laporan`
--

INSERT INTO `tb_file_laporan` (`id`, `laporan_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, 2, 'Screenshot from 2017-08-08 15-01-12.png', '2017-08-10 23:00:58', '2017-08-10 23:00:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jenis_tugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int(11) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id`, `user_id`, `jenis_tugas`, `durasi`, `role_id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, 'asfaefasef', 2, 7, '1', '<p>asfasefasefasef</p>', '2017-08-10 22:56:26', '2017-08-10 22:56:26'),
(2, 7, 'sfeaef', 3, 7, '4', '<p>asefasef</p>', '2017-08-10 22:58:45', '2017-08-11 20:37:55'),
(3, 4, 'fasefase', 2, 5, '1', '<p>fsaefaeae</p>', '2017-08-10 23:09:44', '2017-08-10 23:09:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_room_chat`
--

CREATE TABLE `tb_room_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `penerima_id` int(10) UNSIGNED NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_room_chat`
--

INSERT INTO `tb_room_chat` (`id`, `author_id`, `penerima_id`, `subj`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Ini percobaan pertama', 'Kenapa itu tugas nya blm di kerjakan??', '2017-08-23 11:43:45', '2017-08-23 11:43:45'),
(2, 1, 7, 'Ini tambahan', 'ada tambahan pekerjaan', '2017-08-23 12:36:19', '2017-08-23 12:36:19'),
(3, 1, 2, 'Pekerjaan kemarin', 'Pak silakan di lanjutkan laporan yang sudah di buat kemarin.', '2017-08-23 17:58:45', '2017-08-23 17:58:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$FY09HxLFqXMi65IQMt4Rye4FJTFbSYmkKDriJUTSuvDkl01eRR0rS', 'GwqAVCo6SfnYJJtFQprq8EoC1xB8niJIteBdFDH33fWABmcn2mz52H5DRzof', '2017-07-19 10:08:05', '2017-07-19 12:31:23'),
(2, 'Ir.Imam Asrowardi, S.Kom., M.Kom., IPM.', 'kajur@gmail.com', '$2y$10$Cijc2PytLt7gn4NGI6Y4tOaaBOpzCunSSOVCD4smbLGc8IsSDNQWy', 'Ms7wS3GYqTSZY8TCwvWSkgxQ6qTefkio8rk2k45RMWEb72G0aDkM622vmgyj', '2017-07-19 10:11:05', '2017-08-03 01:42:57'),
(3, 'Wanto Wiyadi', 'wanto@gmail.com', '$2y$10$Cijc2PytLt7gn4NGI6Y4tOaaBOpzCunSSOVCD4smbLGc8IsSDNQWy', 'ojYQyvwSnYCXhw1rsLmeZMqMNagfOtvpW3ExvpMlDXtV62KouXki8LrccXgG', '2017-07-20 10:17:46', '2017-08-03 01:44:43'),
(4, 'Yuni Rochimi, S.Kom.', 'yuni@gmail.com', '$2y$10$t4DjjfBqEVhdorE4Eg77H.PhSSzP2MJmTRSUyVBUv0kcvyx/xTxeS', 'wGt2c2PcMRvf37dgz2TvRvqcarn359t7gH180DmjaunLm8TQjguo4TcfqIhI', '2017-07-22 02:00:37', '2017-08-03 01:46:38'),
(5, 'Helaliah', 'helailah@gmail.com', '$2y$10$Cijc2PytLt7gn4NGI6Y4tOaaBOpzCunSSOVCD4smbLGc8IsSDNQWy', NULL, '2017-08-03 01:48:37', '2017-08-03 01:48:37'),
(6, 'Eko Subyantoro, S.Kom., M.Kom', 'kalab@gmail.com', '$2y$10$ZUJo/dMzkxknHGsERulWgOflEo.7d3nRxOPd.0PkO1I2UKzr6IZOi', 'Wu7PstutqsuF7y0503qKyXpu5cs85lzaRp3BR1UgHSb8vQVnUMhDO1WvF3zF', '2017-08-11 01:52:28', '2017-08-11 01:52:28'),
(7, 'Andi Saptono', 'andi@gmail.com', '$2y$10$1STHa8RK9zK6D1Q4YAkf7eNS3793zojv.z9578DO8CkKr7bCBNU0C', 'jMPjCHsP59H0EbJgAEzCwrwq1TxLdIvOQgEpRtvi2QDZeeCnKfLubO4uTOfL', '2017-08-11 01:53:02', '2017-08-11 01:53:02'),
(8, 'Test', 'teknisi.test@gmail.com', '$2y$10$5WdyRgwR2DAV1oBE9yfg1ub7KqEJKveZEMX3VcyDIH5SfAK/mOge2', 'oVJnWao6ETSYfm09Tkc9CIjerkw7Lehml2MrfgfywRqh6l2XGmjSR6ujJMxh', '2017-08-10 01:58:02', '2017-08-10 01:58:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_chat_room_chat_id_foreign` (`room_chat_id`),
  ADD KEY `tb_chat_author_id_foreign` (`author_id`);

--
-- Indexes for table `tb_file_laporan`
--
ALTER TABLE `tb_file_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_file_laporan_laporan_id_foreign` (`laporan_id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_laporan_user_id_foreign` (`user_id`),
  ADD KEY `tb_laporan_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_room_chat`
--
ALTER TABLE `tb_room_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_room_chat_author_id_foreign` (`author_id`),
  ADD KEY `tb_room_chat_penerima_id_foreign` (`penerima_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_file_laporan`
--
ALTER TABLE `tb_file_laporan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_room_chat`
--
ALTER TABLE `tb_room_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_chat_room_chat_id_foreign` FOREIGN KEY (`room_chat_id`) REFERENCES `tb_room_chat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_file_laporan`
--
ALTER TABLE `tb_file_laporan`
  ADD CONSTRAINT `tb_file_laporan_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `tb_laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_room_chat`
--
ALTER TABLE `tb_room_chat`
  ADD CONSTRAINT `tb_room_chat_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_room_chat_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
