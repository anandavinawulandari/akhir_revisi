-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 14.29
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhir3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `kode_alternatif` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `riwayat_c1` varchar(255) NOT NULL,
  `pekerjaan_c2` varchar(255) NOT NULL,
  `penghasilan_c3` varchar(255) NOT NULL,
  `jml_tanggungan_c4` varchar(255) NOT NULL,
  `nilai_c5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bobot_riwayat` int(11) DEFAULT NULL,
  `bobot_pekerjaan` int(11) DEFAULT NULL,
  `bobot_penghasilan` int(11) DEFAULT NULL,
  `bobot_jml_tanggungan` int(11) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`kode_alternatif`, `nis`, `riwayat_c1`, `pekerjaan_c2`, `penghasilan_c3`, `jml_tanggungan_c4`, `nilai_c5`, `created_at`, `updated_at`, `bobot_riwayat`, `bobot_pekerjaan`, `bobot_penghasilan`, `bobot_jml_tanggungan`, `bobot_nilai`) VALUES
('A10', '9880', 'C11', 'C22', 'C31', 'C41', 'C52', '2023-04-24 05:08:52', '2023-06-02 09:53:21', 4, 3, 4, 4, 3),
('A11', '9867', 'C12', 'C23', 'C32', 'C42', 'C52', '2023-06-09 08:04:55', '2023-06-09 08:04:55', 3, 2, 3, 3, 3),
('A12', '9899', 'C14', 'C22', 'C32', 'C42', 'C52', '2023-06-09 09:32:06', '2023-06-09 09:47:56', 1, 3, 3, 3, 3),
('A13', '9871', 'C12', 'C21', 'C31', 'C41', 'C52', '2023-06-26 06:25:57', '2023-06-26 06:25:57', 3, 4, 4, 4, 3),
('A2', '9872', 'C14', 'C23', 'C31', 'C42', 'C53', '2023-04-24 05:06:58', '2023-04-24 05:06:58', 1, 2, 4, 3, 2),
('A3', '9873', 'C11', 'C22', 'C32', 'C42', 'C51', '2023-04-24 05:07:10', '2023-04-24 05:07:10', 4, 3, 3, 3, 4),
('A4', '9874', 'C13', 'C21', 'C31', 'C41', 'C53', '2023-04-24 05:07:23', '2023-04-24 05:07:23', 2, 4, 4, 4, 2),
('A5', '9875', 'C12', 'C22', 'C31', 'C43', 'C52', '2023-04-24 05:07:33', '2023-04-24 05:07:33', 3, 3, 4, 2, 3),
('A6', '9876', 'C14', 'C24', 'C32', 'C44', 'C51', '2023-04-24 05:07:43', '2023-06-08 21:36:16', 1, 1, 3, 1, 4),
('A7', '9877', 'C12', 'C22', 'C31', 'C42', 'C52', '2023-04-24 05:07:58', '2023-04-24 05:07:58', 3, 3, 4, 3, 3),
('A8', '9878', 'C14', 'C21', 'C31', 'C42', 'C51', '2023-04-24 05:08:08', '2023-06-08 21:48:15', 1, 4, 4, 3, 4),
('A9', '9887', 'C12', 'C23', 'C31', 'C42', 'C51', '2023-06-08 21:18:29', '2023-06-08 21:18:29', 3, 2, 4, 3, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kode_hasil` int(11) NOT NULL,
  `kode_alternatif` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `kode_subkriteria` varchar(255) DEFAULT NULL,
  `nilai_rangking` float DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kode_hasil`, `kode_alternatif`, `nis`, `kode_kriteria`, `kode_subkriteria`, `nilai_rangking`, `status`, `created_at`, `updated_at`) VALUES
(24, 'A10', '9880', NULL, NULL, 86.25, 'LOLOS', '2023-04-24 05:11:43', '2023-06-09 08:09:27'),
(27, 'A4', '9874', NULL, NULL, 77.5, 'LOLOS', '2023-04-24 05:11:43', '2023-06-09 06:52:48'),
(28, 'A5', '9875', NULL, NULL, 70, 'TIDAK LOLOS', '2023-04-24 05:11:43', '2023-06-09 06:52:48'),
(29, 'A6', '9876', NULL, NULL, 47.5, 'TIDAK LOLOS', '2023-04-24 05:11:43', '2023-06-09 06:52:48'),
(30, 'A7', '9877', NULL, NULL, 75, 'LOLOS', '2023-04-24 05:11:44', '2023-06-09 06:52:48'),
(31, 'A8', '9878', NULL, NULL, 71.25, 'LOLOS', '2023-04-24 05:11:44', '2023-06-09 06:52:48'),
(33, 'A2', '9872', NULL, NULL, 53.75, 'TIDAK LOLOS', '2023-05-06 07:06:31', '2023-06-09 06:52:48'),
(38, 'A3', '9873', NULL, NULL, 88.75, 'LOLOS', '2023-05-30 08:35:06', '2023-06-09 06:52:48'),
(40, 'A9', '9887', NULL, NULL, 71.25, 'LOLOS', '2023-06-08 21:28:17', '2023-06-09 06:52:48'),
(42, 'A11', '9867', NULL, NULL, 91.6667, 'LOLOS', '2023-06-09 08:05:04', '2023-06-28 22:18:21'),
(44, 'A12', '9899', NULL, NULL, 83.3333, 'LOLOS', '2023-06-09 09:32:12', '2023-06-28 22:18:21'),
(45, 'A13', '9871', NULL, NULL, 86.25, 'LOLOS', '2023-06-26 06:27:11', '2023-06-26 06:28:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(255) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `bobot_kriteria` int(11) DEFAULT NULL,
  `jenis_atribut` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `kriteria`, `bobot_kriteria`, `jenis_atribut`, `created_at`, `updated_at`) VALUES
('C1', 'Riwayat Bantuan', 25, 'Cost', NULL, '2023-06-09 06:25:11'),
('C2', 'Pekerjaan orangtua', 25, 'Benefit', NULL, NULL),
('C3', 'Penghasilan orangtua', 20, 'Cost', NULL, NULL),
('C4', 'Jumlah tanggungan orangtua', 20, 'Benefit', NULL, NULL),
('C5', 'Nilai', 10, 'Benefit', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_31_052327_create_tabel_user', 2),
(6, '2023_02_17_151834_create_tabel_kriteria', 3),
(7, '2023_02_17_153343_create_kriteria_table', 4),
(8, '2023_02_17_160951_create_subkriteria_table', 5),
(9, '2023_02_17_161117_create_alternatif_table', 6),
(10, '2023_02_18_023806_create_kriteria_table', 7),
(11, '2023_02_18_024216_create_subkriteria_table', 8),
(12, '2023_02_18_084655_create_hasil_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesdik`
--

CREATE TABLE `pesdik` (
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `penghasilan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `jml_tanggungan` varchar(255) DEFAULT NULL,
  `riwayat` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pesdik`
--

INSERT INTO `pesdik` (`nis`, `nama`, `jk`, `ttl`, `alamat`, `kelas`, `no_hp`, `nilai`, `penghasilan`, `pekerjaan`, `jml_tanggungan`, `riwayat`, `tahun_ajaran`, `file`, `created_at`, `updated_at`) VALUES
('9867', 'Robi Fastio', 'L', '2003-07-10', 'Kunjang', '2D', '085655394431', 'C52', 'C32', 'C23', 'C42', 'C12', '2021/2022', 'kk_1686323056.png', '2023-06-09 08:04:16', '2023-06-09 08:04:16'),
('9871', 'Agus Budiono', 'L', '2023-04-03', 'Kalianyar', '1A', '085655394431', 'C52', 'C31', 'C21', 'C41', 'C12', '2022/2023', 'kk.png', '2023-04-02 14:15:45', '2023-04-02 14:15:45'),
('9872', 'Rafif Andrianto', 'L', '2023-04-03', 'Banyuarang', '1B', '085655394431', 'C53', 'C31', 'C23', 'C42', 'C14', '2022/2023', 'kk.png', '2023-04-02 14:17:06', '2023-04-02 14:17:06'),
('9873', 'Raisa Alfianti', 'P', '2004-04-03', 'Kalianyar', '1D', '085655394431', 'C51', 'C32', 'C22', 'C42', 'C11', '2022/2023', 'kk.png', '2023-04-02 14:19:00', '2023-04-02 14:19:00'),
('9874', 'Dewi Anindita', 'P', '2023-04-03', 'Kunjang', '1A', '085655394431', 'C53', 'C31', 'C21', 'C41', 'C13', '2022/2023', 'kk.png', '2023-04-02 14:20:27', '2023-04-02 14:20:27'),
('9875', 'Andre Setiawan', 'L', '2023-04-03', 'Kunjang', '1A', '085655394431', 'C52', 'C31', 'C22', 'C43', 'C12', '2022/2023', 'kk.png', '2023-04-02 14:21:41', '2023-04-02 14:21:41'),
('9876', 'Rofik Ardiansyah', 'L', '2023-04-03', 'Kuwik', '1H', '085655394431', 'C51', 'C32', 'C24', 'C44', 'C14', '2022/2023', 'kk.png', '2023-04-02 14:22:59', '2023-04-02 14:22:59'),
('9877', 'Rini Puspita', 'P', '2023-04-05', 'Kediri', '1I', '085655394431', 'C52', 'C31', 'C22', 'C42', 'C12', '2022/2023', 'kk.png', '2023-04-04 13:39:26', '2023-04-04 13:39:26'),
('9878', 'Arghie Hanafi', 'L', '2023-04-06', 'Kuwik', '1I', '085655394431', 'C51', 'C31', 'C21', 'C43', 'C14', '2022/2023', 'kk.png', '2023-04-05 11:38:04', '2023-04-05 11:38:04'),
('9880', 'Sinta Alfian', 'P', '2023-04-06', 'Kunjang', '1A', '085655394431', 'C52', 'C31', 'C22', 'C41', 'C11', '2022/2023', 'kk.png', '2023-04-05 11:41:28', '2023-04-05 11:41:28'),
('9887', 'Namira', 'P', '2003-03-09', 'Kunjang', '1E', '085655394431', 'C51', 'C31', 'C23', 'C42', 'C12', '2022/2023', 'kk.png', '2023-06-08 20:57:13', '2023-06-08 20:57:13'),
('9899', 'Adinda Yuniar', 'P', '2003-06-01', 'Kunjang', '2F', '085655394431', 'C52', 'C32', 'C22', 'C42', 'C14', '2021/2022', 'kk.png', '2023-06-09 08:08:11', '2023-06-09 08:08:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kode_subkriteria` varchar(255) NOT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `subkriteria` varchar(255) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL,
  `batasan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`kode_subkriteria`, `kode_kriteria`, `subkriteria`, `bobot_nilai`, `batasan`, `created_at`, `updated_at`) VALUES
('C11', 'C1', 'Memiliki KIP/KIS/KKS dan terdaftar sebagai anggota PKH', 4, 'Sangat Prioritas', NULL, NULL),
('C12', 'C1', 'Memiliki SKTM (Surat Keterangan Tidak Mampu)', 3, 'Prioritas', NULL, NULL),
('C13', 'C1', 'Tidak memiliki KIP/KIS/KKS dan terdaftar sebagai anggota PKH', 2, 'Kurang Prioritas', NULL, NULL),
('C14', 'C1', 'Tidak memiliki KIP/KIS/KKS dan tidak terdaftar sebagai anggota PKH', 1, 'Tidak Prioritas', NULL, NULL),
('C21', 'C2', 'Tidak Bekerja', 4, 'Sangat Prioritas', NULL, NULL),
('C22', 'C2', 'Petani/Buruh/Pedagang\r\n', 3, 'Prioritas', NULL, NULL),
('C23', 'C2', 'Wiraswasta', 2, 'Kurang Prioritas', NULL, NULL),
('C24', 'C2', 'PNS/TNI/POLRI', 1, 'Tidak Prioriatas', NULL, NULL),
('C31', 'C3', '< 1000000', 4, 'Sangat Prioritas', NULL, NULL),
('C32', 'C3', '1000001 - 3000000', 3, 'Prioritas', NULL, NULL),
('C33', 'C3', '3000001 - 4999999', 2, 'Kurang Prioritas', NULL, NULL),
('C34', 'C3', '> 5000000', 1, 'Tidak Prioritas', NULL, NULL),
('C41', 'C4', '> 4 orang', 4, 'Sangat Prioritas', NULL, NULL),
('C42', 'C4', '2 - 3 orang', 3, 'Prioritas', NULL, NULL),
('C43', 'C4', '1 orang', 2, 'Kurang Prioritas', NULL, NULL),
('C44', 'C4', 'Tidak ada', 1, 'Tidak Prioritas', NULL, NULL),
('C51', 'C5', '> 85', 4, 'Sangat Prioritas', NULL, NULL),
('C52', 'C5', '75 - 84', 3, 'Prioritas', NULL, NULL),
('C53', 'C5', '50 - 74', 2, 'Kurang Prioritas', NULL, NULL),
('C54', 'C5', '< 50', 1, 'Tidak Prioritas', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsipassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `nis`, `remember_token`, `created_at`, `updated_at`, `deskripsipassword`) VALUES
(30, 'Raisa Alfianti', 'raisa12@gmail.com', NULL, '$2y$10$9KI/LW0RDk5FsAKbgIMsTOwenXEVaahKtMMppRjtiXrAS3jXYdv1K', 'pesdik', '9873', NULL, '2023-05-27 20:50:53', '2023-05-27 20:50:53', 'raisa12'),
(31, 'Agus Budiono', 'agusbudi@gmail.com', NULL, '$2y$10$5hmoYuzMiE61Ano96BGauOoKBavNCVfjMFW8p5K1/Qw1JbwPd7NHG', 'pesdik', '9871', NULL, '2023-05-27 21:08:54', '2023-05-27 21:08:54', 'agusbudi123'),
(32, 'Namira', 'namira@gmail.com', NULL, '$2y$10$vGEOhglst30O1fFYXPx1GuiG0Wwvfq4stLjJhfy5pYZ4trxrN4pLq', 'pesdik', '9887', NULL, '2023-06-08 20:53:25', '2023-06-08 20:53:25', 'namira123'),
(33, 'Rafif Andrianto', 'rafifandri@gmail.com', NULL, '$2y$10$LHJgQ1R7JwjaMY7w9FwMWePnUAmHgQJphr68Z7OU3wMOpk2HEDeKS', 'pesdik', '9872', NULL, '2023-06-09 06:15:01', '2023-06-09 06:15:01', 'rafif45'),
(34, 'Dewi Anindita', 'dewianndt@gmail.com', NULL, '$2y$10$HS8hF5G8DhAvYWNu3raFae1X4ujkzC3LcQ8jgpvwoiLUOkREq6Y9.', 'pesdik', '9874', NULL, '2023-06-09 06:17:17', '2023-06-09 06:17:17', 'dewi123'),
(35, 'Andre Setiawan', 'andresetiawan@gmail.com', NULL, '$2y$10$3xFZdCpPrEvDPKKQKywM1.EkboAsLUbbZWhX2uRYXL6uy2SqRHshi', 'pesdik', '9875', NULL, '2023-06-09 06:18:55', '2023-06-09 06:18:55', 'andre45'),
(36, 'Rini Puspita', 'rinipuspita@gmail.com', NULL, '$2y$10$JS4xPiVV6UpRruUBrQhDYOBsFUsUglKo6pFBsGEvvTfUV7LNhC28S', 'pesdik', '9877', NULL, '2023-06-09 06:20:24', '2023-06-09 06:20:24', 'rinipuspita'),
(37, 'Arghie Hanafi', 'arghie42@gmail.com', NULL, '$2y$10$Y53lMMdD8ct5RBvLe88hneM8RWe6VYTAYob1LLvZB1fNRkLdYbPuq', 'pesdik', '9878', NULL, '2023-06-09 06:22:16', '2023-06-09 06:22:16', 'arghie42'),
(38, 'Sinta Alfian', 'alfiansinta@gmail.com', NULL, '$2y$10$GWMAf4e1qswwLOGFg227QulA8woLq4kDrzIuVTRCLfYkGmXYUymX2', 'pesdik', '9880', NULL, '2023-06-09 06:23:06', '2023-06-09 06:23:06', 'sinta9887'),
(39, 'Rofik Ardiansyah', 'rofikardi@gmail.com', NULL, '$2y$10$KP4SAhIfaoN2Kh/FyqNVm.oMFrnZvHuaNHJ9Mu/Nmupn3hv0oZYZG', 'pesdik', '9876', NULL, '2023-06-09 06:24:20', '2023-06-09 06:24:20', 'rofik9876'),
(40, 'Robi Fastio', 'robifastio@gmail.com', NULL, '$2y$10$C/DuvOKN/BrUelQKbI.TPub7kP32p3Y8xbBM98fhLm3GXb/rLWsvu', 'pesdik', '9867', NULL, '2023-06-09 07:01:21', '2023-06-09 07:01:21', 'robi9867'),
(43, 'Adinda Yuniar', 'adindayuni@gmail.com', NULL, '$2y$10$2xUzklPOCH29wNQuM7uNru/uf9Xt2q0XJk69FI32QmuTTZqDTw7S2', 'pesdik', '9899', NULL, '2023-06-28 20:36:17', '2023-06-28 20:36:17', 'adinda123'),
(45, 'Ananda Vina Wulandari', 'anandavinawln@gmail.com', NULL, '$2y$10$KljPi1Pt3pG.W2bjDvPjuuUojrYcriRmb.NRMk4KA2MMOMBDlwnAO', 'pesdik', '123', NULL, '2023-06-28 22:02:31', '2023-06-28 22:02:31', 'ananda123'),
(50, 'admin', 'adminsmp@gmail.com', NULL, '$2y$10$WahXYRqylLMcm8WzCYrFeu4YNyGDPKIJUxHTxkG1oEK2x6GfntEbm', 'admin', '9', NULL, '2023-05-27 20:49:58', '2023-05-27 20:49:58', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kode_alternatif`) USING BTREE,
  ADD KEY `FK_ALTERNATIF` (`nis`) USING BTREE;

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_hasil`) USING BTREE,
  ADD KEY `FK_HASIL` (`kode_alternatif`) USING BTREE,
  ADD KEY `FK_HASIL_2` (`nis`) USING BTREE,
  ADD KEY `FK_HASIL_3` (`kode_kriteria`) USING BTREE,
  ADD KEY `FK_HASIL_4` (`kode_subkriteria`) USING BTREE;

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indeks untuk tabel `pesdik`
--
ALTER TABLE `pesdik`
  ADD PRIMARY KEY (`nis`) USING BTREE;

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kode_subkriteria`) USING BTREE,
  ADD KEY `FK_SUBKRITERIA` (`kode_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tabel_user_email_unique` (`email`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `FK_USERR` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `FK_ALTERNATIF` FOREIGN KEY (`nis`) REFERENCES `pesdik` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `FK_HASIL` FOREIGN KEY (`kode_alternatif`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HASIL_2` FOREIGN KEY (`nis`) REFERENCES `pesdik` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HASIL_3` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HASIL_4` FOREIGN KEY (`kode_subkriteria`) REFERENCES `subkriteria` (`kode_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `FK_SUBKRITERIA` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
