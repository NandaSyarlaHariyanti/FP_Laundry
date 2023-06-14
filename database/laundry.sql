-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2023 pada 07.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29


create database laundry;
use laundry; 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

	CREATE TABLE `users` (
 `username` varchar(10) NOT NULL,
 `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `email`, `no_hp`, `alamat`, `catatan`, `image`, `role`) VALUES
(1, 'Nanda', 'admin@binato.com', '+6285320357152', 'Ngujang - Tulungagung', 'Follow me, chuakss', '165Rizky Aidil.png', 'Admin'),
(2, 'Avi', 'avisibuk@gmail.com', '08520357152', 'Brantas - Kediri', 'Saya adalah seorang Programmer', '255FB_IMG_1545569895276.jpg', 'Karyawan'),
(3, 'Firstha', 'pistapare@gmail.con', '08520357152', 'Kampung Inggris - Pare', 'Saya adalah seorang Polwan', '705Profil bluesloveyou.png', 'Karyawan'),
(4, 'Zalfa', 'zalfatuban@gmail.con', '08520357000', 'Galagung - Tuban', 'Penguasa Pantai Tuban adalah saya', '705Profil bluesloveyou.png', 'Karyawan'),
(5, 'Annisa', 'anisatp@gmail.con', '08520357662', 'TP6 - Surabaya', 'Suka menjelajah Tunjungan Plaza 1-6', '705Profil bluesloveyou.png', 'Karyawan');

-- --------------------------------------------------------
--
-- Struktur dari tabel `paket_cuci`
--

CREATE TABLE `paket_cuci` (
  `id_paket` varchar(10) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga_kilo` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
INSERT INTO `paket_cuci` (`id_paket`, `paket`, `harga_kilo`, `deskripsi`) VALUES
('PKT001', 'Murah Meriah', 5000, 'Selesai 3 hari = Cuci + Kering Setrika'),
('PKT002', 'Cuci Komplit', 8000, 'Selesai 1 hari = Cuci + Kering + Setrika'),
('PKT003', 'Cuci Kering', 5000, 'Selesai 1 hari'),
('PKT004', 'Cuci Basah', 3500, 'Selesai 1 hari'),
('PKT005', 'Setrika', 5000, 'Selesai 1 hari'),
('PKT006', 'Cuci Ekspres', 15000, 'Selesai 6 jam = Cuci + Kering + Setrika'),
('PKT007', 'Cuci Kilat', 25000, 'Selesai 3 jam = Komplit + Bonus Kaus Laundry Ku'),
('PKT008', 'VIP', 75000, 'Selesai 2 jam = Komplit + Bonus Kaus & Celana Laundry Ku + Antar langsung'),
('PKT009', 'VVIP', 120000, 'Selesai 1 jam = Komplit + Bonus Kaus & Celana Laundru Ku + Tas Khusus Laundry Ku + Antar langsung ');

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `no_hp_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `alamat_pelanggan`, `no_hp_pelanggan`) VALUES
('PLG001', 'Ahmad Kurniawan', 'ahmadkurniawan', '12345', 'Perlanaan', '080000000000'),
('PLG002', 'Aiki Brilian', 'aikibrilian', '12345', 'Perdagangan Pasar I', '080000001111'),
('PLG003', 'Alviansyah', 'alviansyah', '12345', 'Tempel Jaya', '080000002222'),
('PLG004', 'Anisha Catur Wulandari', 'anishacatur', '12345', 'Mangkai Baru Dusun III', '080000003333'),
('PLG005', 'Anugrah Sang Putra', 'anugrahsang', '12345', 'Toumoan', '080000004444'),
('PLG006', 'Ayu Andari', 'ayuandari', '12345', 'Mangkai Baru Dusun IV', '080000005555'),
('PLG007', 'Bima Syahputra Purba', 'bimasyahputra', '12345', '-', '080000006666'),
('PLG008', 'Chairil Anwar', 'chairilanwar', '12345', '-', '080000007777'),
('PLG009', 'Deby Ridho Marauli Nasution', 'debyridho', '12345', 'Perdagangan ', '080000008888'),
('PLG010', 'Dina Ira Pandini Purba', 'dinaira', '12345', '-', '080000009999'),
('PLG011', 'Dinda Aristi', 'dindaaristi', '12345', 'Kucingan', '080011110000'),
('PLG012', 'Indah Irawati', 'indahirawati', '12345', '-', '080022220000'),
('PLG013', 'Iqbal Nur Adabi Nasution', 'iqbalnur', '12345', '-', '080033330000'),
('PLG014', 'Ivan Pramana', 'ivanpramana', '12345', '-', '080044440000'),
('PLG015', 'Melin Agus Triyanti', 'melinagus', '12345', 'Tempel Jaya', '080055550000'),
('PLG016', 'Muhammad Hanafi', 'muhammadhanafi', '12345', 'Perlanaan', '080066660000'),
('PLG017', 'Muhammad Iqbal', 'muhammadiqbal', '12345', '-', '080077770000'),
('PLG018', 'Muhammad Rizky Yudistio', 'muhammadrizky', '12345', 'Mangkai Lama', '080088880000'),
('PLG019', 'Muhammad Nanda Kurniawan', 'muhammadnanda', '12345', 'Perlanaan', '080099990000'),
('PLG020', 'Rehan Firnanda', 'rehanfirnanda', '12345', 'Mangkai Baru Dusun I', '080011111111'),
('PLG021', 'Ridhana Fiska', 'ridhanafiska', '12345', 'Mayang', '080011112222'),
('PLG022', 'Rizky Aidil', 'rizkyaidil', '12345', 'Mangkai Baru Dusun IV', '080011113333'),
('PLG023', 'Siti Kharisma Fitriana', 'sitikharisma', '12345', 'Mangkai Lama', '080011114444'),
('PLG024', 'Sri Romadhona', 'sriromadhona', '12345', 'Bukit Lima', '080011115555'),
('PLG025', 'Sultan Nico Nur', 'sultannico', '12345', 'Mangkai Lama', '080011116666'),
('PLG026', 'Tri Ayuni', 'triayuni', '12345', '-', '080011117777'),
('PLG027', 'Wahyu Fitrah', 'wahyufitrah', '12345', 'Dosin', '080011118888'),
('PLG028', 'Wendy Riswana', 'wendyriswana', '12345', '-', '080011119999'),
('PLG029', 'Widya Mailani', 'widyamailani', '12345', '-', '080022221111'),
('PLG030', 'Wirandani Galih Kusuma', 'wirandanigalih', '12345', 'Perlanaaan', '080022222222'),
('PLG031', 'Wisnu Falevi', 'wisnufalevi', '12345', '-', '080022223333');
--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_pelanggan`, `id_paket`, `qty`, `biaya`, `bayar`, `kembalian`) VALUES
('TRS001', '24 Nov 2020', 'PLG001', 'PKT001', 7, 35000, 50000, 15000),
('TRS002', '24 Nov 2020', 'PLG002', 'PKT001', 5, 25000, 50000, 25000),
('TRS003', '25 Nov 2020', 'PLG005', 'PKT002', 8, 64000, 70000, 6000),
('TRS004', '25 Nov 2020', 'PLG022', 'PKT009', 10, 1200000, 1200000, 0),
('TRS005', '26 Nov 2020', 'PLG025', 'PKT008', 5, 375000, 400000, 25000),
('TRS006', '27 Nov 2020', 'PLG031', 'PKT007', 2, 50000, 50000, 0),
('TRS007', '27 Nov 2020', 'PLG018', 'PKT005', 2, 10000, 10000, 0),
('TRS008', '28 Nov 2020', 'PLG027', 'PKT006', 3, 45000, 50000, 5000),
('TRS009', '28 Nov 2020', 'PLG014', 'PKT006', 5, 75000, 30000, -45000),
('TRS010', '29 Nov 2020', 'PLG003', 'PKT009', 10, 1200000, 1200000, 0),
('TRS011', '30 Nov 2020', 'PLG017', 'PKT007', 5, 125000, 0, -125000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `paket_cuci`
--
ALTER TABLE `paket_cuci`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_transaksi_paket_cuci` (`id_paket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_paket_cuci` FOREIGN KEY (`id_paket`) REFERENCES `paket_cuci` (`id_paket`),
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
