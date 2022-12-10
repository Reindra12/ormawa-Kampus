-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Nov 2022 pada 19.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ormawa_unuja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_kegiatan` int(11) NOT NULL,
  `verifikasi` enum('m','t','s') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desas`
--

CREATE TABLE `desas` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jenis_kegiatans`
--

CREATE TABLE `detail_jenis_kegiatans` (
  `id_detail_jenis_kegiatan` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kegiatans`
--

CREATE TABLE `detail_kegiatans` (
  `id_detail_kegiatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ormawas`
--

CREATE TABLE `detail_ormawas` (
  `id_detail_ormawa` int(11) NOT NULL,
  `nama_ormawa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_ormawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatans`
--

CREATE TABLE `jenis_kegiatans` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskripsi_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `jam_kegiatan` time NOT NULL,
  `id_ormawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id_kegiatan`, `nama_kegiatan`, `diskripsi_kegiatan`, `gambar_kegiatan`, `tgl_kegiatan`, `jam_kegiatan`, `id_ormawa`) VALUES
(1, 'PENCULIKAN', 'KEGIATAN PENCULIKAN', 'assets/images/categories/YZJHhtB3ujCJHz7t7caXjqjg4PWbsmvncl4QEUT8.png', '2021-03-21', '13:11:00', 2),
(2, 'PENCULIKAN', 'KEGIATAN PENCULIKAN', 'assets/images/categories/fRMFvk8x75e9b1eQlPYx7TpVb2erqtkpwEmhvNqa.png', '2021-03-21', '13:11:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` int(11) NOT NULL,
  `telp` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `ospek` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ospek` year(4) NOT NULL,
  `user` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(186, '2022_10_25_111558_create_jenis__kegiatans_table', 1),
(187, '2022_10_25_114305_create_ormawas_table', 1),
(433, '2014_10_12_000000_create_users_table', 2),
(434, '2014_10_12_100000_create_password_resets_table', 2),
(435, '2019_08_19_000000_create_failed_jobs_table', 2),
(436, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(437, '2022_10_22_160316_create_images_table', 2),
(438, '2022_10_22_172817_create_photos_table', 2),
(439, '2022_10_25_091305_create_ormawas_table', 2),
(440, '2022_10_25_092436_create_kegiatans_table', 2),
(441, '2022_10_25_103541_create_jabatans_table', 2),
(442, '2022_10_25_111558_create_jenis_kegiatans_table', 2),
(443, '2022_10_25_112830_create_provinsis_table', 2),
(444, '2022_10_25_112918_create_kabupatens_table', 2),
(445, '2022_10_25_112919_create_kecamatans_table', 2),
(446, '2022_10_25_112920_create_desas_table', 2),
(447, '2022_10_25_120526_create_fakultas_table', 2),
(448, '2022_10_25_120527_create_prodis_table', 2),
(449, '2022_10_25_120528_create_mahasiswas_table', 2),
(450, '2022_10_25_143344_create_categories_table', 2),
(451, '2022_10_26_095641_create_detail_kegiatans_table', 2),
(452, '2022_10_27_114604_create_detail_ormawas_table', 2),
(453, '2022_10_27_120220_create_detail_jenis_kegiatans_table', 2),
(454, '2022_10_27_133354_create_pengaturans_table', 2),
(455, '2022_10_27_133636_create_penguruses_table', 2),
(456, '2022_10_27_133800_create_berkas_table', 2),
(457, '2022_10_29_070621_add_gambar_jenis_kegiatan__to_jenis_kegiatans_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ormawas`
--

CREATE TABLE `ormawas` (
  `id_ormawa` int(11) NOT NULL,
  `nama_ormawa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ormawas`
--

INSERT INTO `ormawas` (`id_ormawa`, `nama_ormawa`, `status`, `user`, `password`) VALUES
(1, 'TEKNIK INFORMATIKA', 'y', 'informatika', '$2y$10$FCMxDbwCXtOuAqQmb7NpU.pWuGuIxaHftp2SU8/BPM3IZi3lTbSUS'),
(2, 'TEKNIK ELEKTRO', 'y', 'ELEKTRO', '$2y$10$IeaGeHozDqibml7SmJsaDu5tXoQEvJCC4yZ967NR2F7gwtvF2r7VW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id_pengaturan` int(11) NOT NULL,
  `total_point` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguruses`
--

CREATE TABLE `penguruses` (
  `id_pengurus` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsis`
--

CREATE TABLE `provinsis` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','t') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Indra', 'indra@gmail.com', NULL, '$2y$10$tXcVY2nus1gVtY3pXutrGOm9qiXdspmV6K8T6ghCpwizr4c7h/tM.', NULL, '2022-10-29 00:26:11', '2022-10-29 00:26:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `berkas_id_detail_kegiatan_foreign` (`id_detail_kegiatan`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `desas_id_kecamatan_foreign` (`id_kecamatan`);

--
-- Indeks untuk tabel `detail_jenis_kegiatans`
--
ALTER TABLE `detail_jenis_kegiatans`
  ADD PRIMARY KEY (`id_detail_jenis_kegiatan`),
  ADD KEY `detail_jenis_kegiatans_id_jenis_kegiatan_foreign` (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `detail_kegiatans`
--
ALTER TABLE `detail_kegiatans`
  ADD PRIMARY KEY (`id_detail_kegiatan`),
  ADD KEY `detail_kegiatans_id_kegiatan_foreign` (`id_kegiatan`),
  ADD KEY `detail_kegiatans_id_mahasiswa_foreign` (`id_mahasiswa`),
  ADD KEY `detail_kegiatans_id_jenis_kegiatan_foreign` (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `detail_ormawas`
--
ALTER TABLE `detail_ormawas`
  ADD PRIMARY KEY (`id_detail_ormawa`),
  ADD KEY `detail_ormawas_id_prodi_foreign` (`id_prodi`),
  ADD KEY `detail_ormawas_id_ormawa_foreign` (`id_ormawa`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_kegiatans`
--
ALTER TABLE `jenis_kegiatans`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `kabupatens_id_provinsi_foreign` (`id_provinsi`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `kecamatans_id_kabupaten_foreign` (`id_kabupaten`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `kegiatans_id_ormawa_foreign` (`id_ormawa`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `mahasiswas_id_kabupaten_foreign` (`id_kabupaten`),
  ADD KEY `mahasiswas_id_desa_foreign` (`id_desa`),
  ADD KEY `mahasiswas_id_prodi_foreign` (`id_prodi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ormawas`
--
ALTER TABLE `ormawas`
  ADD PRIMARY KEY (`id_ormawa`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `penguruses`
--
ALTER TABLE `penguruses`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `penguruses_id_ormawa_foreign` (`id_ormawa`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `prodis_id_fakultas_foreign` (`id_fakultas`);

--
-- Indeks untuk tabel `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desas`
--
ALTER TABLE `desas`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_jenis_kegiatans`
--
ALTER TABLE `detail_jenis_kegiatans`
  MODIFY `id_detail_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_kegiatans`
--
ALTER TABLE `detail_kegiatans`
  MODIFY `id_detail_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_ormawas`
--
ALTER TABLE `detail_ormawas`
  MODIFY `id_detail_ormawa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_kegiatans`
--
ALTER TABLE `jenis_kegiatans`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT untuk tabel `ormawas`
--
ALTER TABLE `ormawas`
  MODIFY `id_ormawa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penguruses`
--
ALTER TABLE `penguruses`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_id_detail_kegiatan_foreign` FOREIGN KEY (`id_detail_kegiatan`) REFERENCES `detail_kegiatans` (`id_detail_kegiatan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD CONSTRAINT `desas_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatans` (`id_kecamatan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_jenis_kegiatans`
--
ALTER TABLE `detail_jenis_kegiatans`
  ADD CONSTRAINT `detail_jenis_kegiatans_id_jenis_kegiatan_foreign` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatans` (`id_jenis_kegiatan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kegiatans`
--
ALTER TABLE `detail_kegiatans`
  ADD CONSTRAINT `detail_kegiatans_id_jenis_kegiatan_foreign` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatans` (`id_jenis_kegiatan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_kegiatans_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatans` (`id_kegiatan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_kegiatans_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswas` (`id_mahasiswa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_ormawas`
--
ALTER TABLE `detail_ormawas`
  ADD CONSTRAINT `detail_ormawas_id_ormawa_foreign` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawas` (`id_ormawa`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_ormawas_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id_prodi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD CONSTRAINT `kabupatens_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsis` (`id_provinsi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD CONSTRAINT `kecamatans_id_kabupaten_foreign` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupatens` (`id_kabupaten`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_id_ormawa_foreign` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawas` (`id_ormawa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desas` (`id_desa`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswas_id_kabupaten_foreign` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupatens` (`id_kabupaten`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswas_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id_prodi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penguruses`
--
ALTER TABLE `penguruses`
  ADD CONSTRAINT `penguruses_id_ormawa_foreign` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawas` (`id_ormawa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD CONSTRAINT `prodis_id_fakultas_foreign` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
