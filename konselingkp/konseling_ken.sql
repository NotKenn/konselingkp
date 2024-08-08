-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 06:25 PM
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
-- Database: `konseling_ken`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_25_135829_create_students_table', 1),
(7, '2023_09_30_194235_create_note_individus_table', 1),
(8, '2023_10_01_195850_create_note_kelompoks_table', 1),
(9, '2023_10_01_202217_create_tbl_kasuses_table', 1),
(10, '2023_10_01_202309_create_tbl_prestasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noteindividu`
--

CREATE TABLE `noteindividu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `students_id` bigint(20) UNSIGNED NOT NULL,
  `konselingSebelumnya` varchar(255) NOT NULL,
  `isNew` varchar(255) NOT NULL,
  `jenisKonseling` varchar(255) NOT NULL,
  `tglKonseling` date NOT NULL,
  `deskripsiUmum` varchar(255) NOT NULL,
  `deskripsiMasalah` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `rencanaTindakLanjut` varchar(255) NOT NULL,
  `tglRTL` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `noteindividu`
--

INSERT INTO `noteindividu` (`id`, `user_id`, `students_id`, `konselingSebelumnya`, `isNew`, `jenisKonseling`, `tglKonseling`, `deskripsiUmum`, `deskripsiMasalah`, `tindakan`, `catatan`, `rencanaTindakLanjut`, `tglRTL`, `status`) VALUES
(6, 1, 123212121301231, '6', 'Yes', 'Pribadi', '2024-08-01', '-', '-', '-', 'SUR', '-', '2024-08-05', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `notekelompok`
--

CREATE TABLE `notekelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `targetKonselingKelompok` varchar(255) NOT NULL,
  `tglRencanaPelaksanaan` date NOT NULL,
  `materi` varchar(255) NOT NULL,
  `tglRealisasiPelaksanaan` date NOT NULL,
  `evaluasiProses` varchar(255) NOT NULL,
  `evaluasiAkhir` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `descHambatan` varchar(255) NOT NULL,
  `descAltSolusi` varchar(255) NOT NULL,
  `descRTL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notekelompok`
--

INSERT INTO `notekelompok` (`id`, `user_id`, `targetKonselingKelompok`, `tglRencanaPelaksanaan`, `materi`, `tglRealisasiPelaksanaan`, `evaluasiProses`, `evaluasiAkhir`, `status`, `descHambatan`, `descAltSolusi`, `descRTL`) VALUES
(1, 1, 'Kelas VII TA 2019/2020', '2024-04-09', 'Pengabdian kepada masyarakat', '2024-08-08', 'Baik', 'Sangat Baik', 'Selesai', '-', '-', '-'),
(2, 1, '12312aaaa', '2025-05-20', 'aaaaa', '2025-05-20', 'aaaa', 'aaa', 'Selesai', 'aa', 'aa', 'aa');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NISN` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tglLahir` date NOT NULL,
  `noHP` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `statusKeaktifanSiswa` varchar(255) NOT NULL,
  `namaAyah` varchar(255) NOT NULL,
  `noHPAyah` varchar(255) NOT NULL,
  `pekerjaanAyah` varchar(255) NOT NULL,
  `alamatAyah` varchar(255) NOT NULL,
  `isAyahAlive` varchar(255) NOT NULL,
  `namaIbu` varchar(255) NOT NULL,
  `noHPIbu` varchar(255) NOT NULL,
  `pekerjaanIbu` varchar(255) NOT NULL,
  `alamatIbu` varchar(255) NOT NULL,
  `isIbuAlive` varchar(255) NOT NULL,
  `statusMaritalOrtu` varchar(255) NOT NULL,
  `isTinggalBersamaOrtu` varchar(255) NOT NULL,
  `namaWali` varchar(255) NOT NULL,
  `noHPWali` varchar(255) NOT NULL,
  `pekerjaanWali` varchar(255) NOT NULL,
  `alamatWali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `NISN`, `Nama`, `tempatLahir`, `tglLahir`, `noHP`, `Alamat`, `statusKeaktifanSiswa`, `namaAyah`, `noHPAyah`, `pekerjaanAyah`, `alamatAyah`, `isAyahAlive`, `namaIbu`, `noHPIbu`, `pekerjaanIbu`, `alamatIbu`, `isIbuAlive`, `statusMaritalOrtu`, `isTinggalBersamaOrtu`, `namaWali`, `noHPWali`, `pekerjaanWali`, `alamatWali`) VALUES
(1, 432432432, 'Adit', 'Batam', '2023-10-18', '465465', 'fdsfds', 'Aktif', 'Asep', '0811111111', 'Karyawan', 'Jalan Yos Sudarso Nomor 3', 'Hidup', 'Yuni', '08121212121', 'Ibu Rumah Tangga', 'Jalan Yos Sudarso Nomor 3', 'Hidup', 'Nikah', 'Yes', '-', '-', '-', '-'),
(2, 123123123, 'Budi', 'skldfjslfkj', '2012-10-10', '0182012834', 'lkjhlkhlkh', 'Aktif', 'lkfjhsd', '0808', 'lkjflsdjkf', 'dsjkfhkfh', 'Hidup', 'kajshdjk', '098098', 'fsdkjfhk', 'jhkjh', 'Hidup', 'Nikah', 'Yes', '-', '-', '-', '-'),
(9, 123212121301231, 'Suryo Pramono Liegestu', 'Singapura', '2003-05-20', '081371601975', 'Anggrek Mas 1 Blok F 23 A', 'Aktif', 'qweqweqweqw', '1231313131', 'asdasd', 'aaa1111', 'Hidup', 'asdadasd', '12311111', 'IRT', 'asdsadsadas', 'Hidup', 'Nikah', 'Yes', '-', '-', '-', '-'),
(10, 121209, 'aaaa', 'aaa', '2222-02-22', '21313132131231', 'adsfa1111', 'Aktif', 'qweqweqweqwyiolh', '68967876867', 'hjklhj;h', 'hjlhjklhj', 'Hidup', 'hjklhjklhkjlh', '787969696', 'hkjlhjlhjkl', 'hjklhjlkhjl', 'Hidup', 'Nikah', 'Yes', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasus`
--

CREATE TABLE `tbl_kasus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NISN` bigint(20) UNSIGNED NOT NULL,
  `tglKasus` date NOT NULL,
  `penjelasan` varchar(255) NOT NULL,
  `penanganan` varchar(255) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `penanganKasus` varchar(225) NOT NULL,
  `rencanaTindakLanjut` varchar(225) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kasus`
--

INSERT INTO `tbl_kasus` (`id`, `NISN`, `tglKasus`, `penjelasan`, `penanganan`, `kelas`, `penanganKasus`, `rencanaTindakLanjut`, `status`) VALUES
(2, 123212121301231, '2013-02-01', 'Mencoret Dinding Sekolah', 'Hukum berdiri di depan kelas', 'VII-I', 'Pak Budi', '-', 'Selesai'),
(3, 432432432, '2013-09-21', 'Melawan Guru saat Menjelaskan', 'Dihukum di kantor guru', 'IX-III', 'Pak Taufik', '-', 'Selesai'),
(5, 432432432, '2024-08-01', 'q', 'weqw', '12 MIA', 'qweqe', 'DO', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NISN` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `tglPrestasi` date NOT NULL,
  `namaPrestasi` varchar(255) NOT NULL,
  `tingkatPrestasi` varchar(255) NOT NULL,
  `peringkatPrestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id`, `NISN`, `kelas`, `tglPrestasi`, `namaPrestasi`, `tingkatPrestasi`, `peringkatPrestasi`) VALUES
(2, 432432432, 'IX-III', '2014-06-10', 'OSN tingkat kota', 'Kota', '1'),
(3, 432432432, 'VI-I', '1011-10-10', 'Basic Cup - Catur', 'Kota', '1'),
(5, 432432432, '12 MIA', '2024-08-01', 'Lomba Coding', 'Provinsi', 'Satu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaUser` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namaUser`, `username`, `role`, `password`) VALUES
(1, 'admin', 'admin', 'Admin', '$2a$12$u10/WOZu1OWBcrlr2V7CIuoCnmDBEs.x5StW.K2rj19oVe0vXOiq2');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `noteindividu`
--
ALTER TABLE `noteindividu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`students_id`),
  ADD KEY `fkNISN` (`students_id`);

--
-- Indexes for table `notekelompok`
--
ALTER TABLE `notekelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NISN` (`NISN`);

--
-- Indexes for table `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `noteindividu`
--
ALTER TABLE `noteindividu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notekelompok`
--
ALTER TABLE `notekelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `noteindividu`
--
ALTER TABLE `noteindividu`
  ADD CONSTRAINT `fkNISN` FOREIGN KEY (`students_id`) REFERENCES `students` (`NISN`),
  ADD CONSTRAINT `fkuserid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notekelompok`
--
ALTER TABLE `notekelompok`
  ADD CONSTRAINT `FKUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  ADD CONSTRAINT `fkNISNN` FOREIGN KEY (`NISN`) REFERENCES `students` (`NISN`);

--
-- Constraints for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD CONSTRAINT `nisnFK` FOREIGN KEY (`NISN`) REFERENCES `students` (`NISN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
