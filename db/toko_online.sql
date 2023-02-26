-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2022 pada 05.28
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `foto_admin`) VALUES
(1, 'elma', 'qwerty', 'Elma R. T. Kiu', 'WhatsApp Image 2021-05-13 at 14.23.41.jpeg'),
(2, 'aron', '122333', 'Aron Kiu', 'WhatsApp Image 2020-12-15 at 13.17.20.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(6) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Madame gie'),
(2, 'Maybelline'),
(3, 'Emina'),
(4, 'Revlon'),
(5, 'Sari ayu'),
(6, 'Viva'),
(7, 'Wardah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 20000),
(2, 'Kupang', 5000),
(4, 'Ambon', 30000),
(5, 'Surabaya', 25000),
(6, 'Medan', 30000),
(7, 'Bandung', 25000),
(8, 'Jogja', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'aron@gmail.com', '122333', 'Aron Kiu', '085238970733', 'oebufu'),
(2, 'daniel@gmail.com', '0303', 'Daniel A. Kiu', '085238970733', 'oebufu'),
(3, 'yohana@gmail.com', 'yohana', 'Yohana ', '123456789', 'jln.adi sucipto medan'),
(4, 'anita@gmail.com', 'abcde', 'anita', '43234234', 'fsgfsdgdsfg'),
(5, 'Ornensya@gmail.com', 'asdfg', 'Ornensya', '0123456781023', 'Jln.damai 2'),
(6, 'richard@gmail.com', '03112008', 'Richard Sasi', '9383763672882', 'oebufu'),
(7, 'ifan@gmail.com', 'ifan', 'ifan tolo', '111111', 'laut lepas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 18, 'Yanse H. Kiu - Oematan', 'BNI', 11303, '2021-05-10', '20210510204547b4ee7f7a83c521320c70815a1fbb6406.jpg'),
(2, 22, 'yohana', 'BNI', 356969, '2021-05-11', '202105110629033.jpg'),
(3, 23, 'yohana', 'BNI', 722635, '2021-05-11', '20210511070106819416.jpg'),
(4, 24, 'anita', 'BNI', 378272, '2021-05-11', '20210511094639819416.jpg'),
(5, 25, 'yohana', 'BNI', 11303, '2021-05-11', '20210511144027game.png'),
(6, 28, 'anita', 'BNI', 215000, '2021-05-12', '20210512031104TENUN IKAT.jpg'),
(7, 29, 'Ornensya', 'BNI', 246303, '2021-05-12', '202105120412008.jpg'),
(8, 30, 'yohana', 'BNI', 70000, '2021-05-13', '20210513121707â€”Pngtreeâ€”golden retro tall menu border_3552534e.png'),
(9, 32, 'Richard Sasi', 'NTT', 74320, '2021-05-13', '20210513122349TOLANAMON.jpg'),
(10, 34, 'yohana', 'NTT', 39766, '2021-05-14', '20210514111148WhatsApp Image 2021-05-13 at 14.23.41.jpeg'),
(12, 35, 'Yohana ', 'BNI', 24803, '2021-05-14', '20210514113715TENUN IKAT.jpg'),
(13, 37, 'Yohana ', 'NTT', 49320, '2021-05-14', '20210514170909Pantai-nemberala.jpg'),
(14, 38, 'ARON KIU', 'BNI', 49320, '2021-05-15', '20210515160023PANTAI TOLANAMON.jpg'),
(15, 40, 'yohana', 'NTT', 55623, '2021-05-16', '20210516184232NEMBRALA1.jpg'),
(16, 41, 'Petra Andri', 'bri', 11303, '2022-06-17', '202206170749263.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(35, 3, 2, '2021-05-14', 24803, 'Kupang', 5000, 'oebufu', 'Barang Dikirim', 'A1'),
(36, 3, 2, '2021-05-14', 123500, 'Kupang', 5000, 'oebufu', 'Pending', ''),
(37, 3, 2, '2021-05-14', 49320, 'Kupang', 5000, 'oebufu', 'Lunas', 'A6'),
(38, 1, 2, '2021-05-15', 49320, 'Kupang', 5000, 'oebufu', 'Lunas', 'A9'),
(39, 3, 2, '2021-05-16', 27160, 'Kupang', 5000, 'oebufu', 'Pending', ''),
(40, 3, 2, '2021-05-16', 55623, 'Kupang', 5000, 'oebufu', 'Lunas', 'A10'),
(41, 3, 2, '2022-01-21', 11303, 'Kupang', 5000, 'Oebufu', 'Sudah Kirim Pembayaran', ''),
(42, 3, 1, '2022-05-08', 26303, 'Jakarta', 20000, 'hjgiugoil', 'Pending', ''),
(43, 3, 2, '2022-05-08', 11303, 'Kupang', 5000, 'lio', 'Pending', ''),
(44, 3, 1, '2022-05-08', 26303, 'Jakarta', 20000, 'e', 'Pending', ''),
(45, 3, 1, '2022-05-08', 26303, 'Jakarta', 20000, 'b', 'Pending', ''),
(46, 2, 2, '2022-05-16', 49320, 'Kupang', 5000, 'bb', 'Pending', ''),
(47, 3, 1, '2022-06-03', 32606, 'Jakarta', 20000, 'egthn', 'Pending', ''),
(48, 3, 1, '2022-06-11', 52000, 'Jakarta', 20000, 'gtt', 'Pending', ''),
(49, 3, 2, '2022-06-17', 37000, 'Kupang', 5000, 'ghihio', 'Pending', ''),
(50, 3, 2, '2022-07-09', 11303, 'Kupang', 5000, 'Jl. Damai 2 Oebufu', 'Pending', ''),
(51, 3, 1, '2022-07-28', 26303, 'Jakarta', 20000, 'iohoht', 'Pending', ''),
(52, 3, 1, '2022-07-28', 47000, 'Jakarta', 20000, 'Jl. Damai 2 Oebufu', 'Pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(8, 13, 14, 1, 'Madame gie Sillhoutte Blended Brow', 8888, 46, 46, 8888),
(9, 13, 13, 1, 'Madame gie Sillhoutte Blended Brow', 454322, 64, 64, 454322),
(10, 14, 14, 1, 'Madame gie Sillhoutte Blended Brow', 80000, 46, 46, 80000),
(11, 14, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(12, 15, 14, 1, 'Madame gie Sillhoutte Blended Brow', 80000, 46, 46, 80000),
(13, 16, 10, 3, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 30, 18909),
(14, 17, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(15, 18, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(16, 20, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(17, 21, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(18, 22, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(19, 22, 12, 1, 'Madame gie Sillhoutte Blended Brow 2', 345666, 22, 22, 345666),
(20, 23, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(21, 23, 12, 2, 'Madame gie Sillhoutte Blended Brow 2', 345666, 22, 44, 691332),
(22, 24, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(23, 24, 12, 1, 'Madame gie Sillhoutte Blended Brow 2', 345666, 22, 22, 345666),
(24, 25, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(25, 26, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(26, 27, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(27, 28, 17, 2, 'Sari ayu 1', 105000, 50, 100, 210000),
(28, 29, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(29, 29, 17, 2, 'Sari ayu 1', 105000, 50, 100, 210000),
(30, 30, 20, 2, 'Revlon lips 1', 25000, 96, 192, 50000),
(31, 31, 10, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(32, 32, 12, 2, 'Madame gie eyeshedow Moondust 01', 22160, 22, 44, 44320),
(33, 33, 15, 1, 'Sweet cheek Blushed 02', 13500, 12, 12, 13500),
(34, 34, 10, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(35, 34, 12, 1, 'Madame gie eyeshedow Moondust 01', 22160, 22, 22, 22160),
(36, 35, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(37, 35, 4, 1, 'Sweet cheek Blushed 01', 13500, 46, 46, 13500),
(38, 36, 5, 1, 'Sweet cheek Blushed 02', 13500, 12, 12, 13500),
(39, 36, 7, 1, 'Sari ayu 1', 105000, 50, 50, 105000),
(40, 37, 2, 2, 'Madame gie eyeshedow Moondust 01', 22160, 22, 44, 44320),
(41, 38, 2, 2, 'Madame gie eyeshedow Moondust 01', 22160, 22, 44, 44320),
(42, 39, 2, 1, 'Madame gie eyeshedow Moondust 01', 22160, 22, 22, 22160),
(43, 40, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(44, 40, 2, 2, 'Madame gie eyeshedow Moondust 01', 22160, 22, 44, 44320),
(45, 41, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(46, 42, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(47, 43, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(48, 44, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(49, 45, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(50, 46, 2, 2, 'Madame gie eyeshedow Moondust 01', 22160, 22, 44, 44320),
(51, 47, 1, 2, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 20, 12606),
(52, 48, 3, 1, 'Madame  Gie Femma Banana Loose Powder', 32000, 64, 64, 32000),
(53, 49, 3, 1, 'Madame  Gie Femma Banana Loose Powder', 32000, 64, 64, 32000),
(54, 50, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(55, 51, 1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, 10, 6303),
(56, 52, 5, 2, 'Sweet cheek Blushed 02', 13500, 12, 24, 27000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `stok_produk` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`, `stok_produk`) VALUES
(1, 1, 'Madame gie Sillhoutte Blended Brow', 6303, 10, '			Blended brow											', '1.jpg', 10),
(2, 1, 'Madame gie eyeshedow Moondust 01', 22160, 22, '			Eyeshedow							', '3.jpg', 16),
(3, 1, 'Madame  Gie Femma Banana Loose Powder', 32000, 64, '			Powder							', '7.jpg', 18),
(4, 1, 'Sweet cheek Blushed 01', 13500, 46, '			Sweet cheek blushed						', '14.jpg', 20),
(5, 1, 'Sweet cheek Blushed 02', 13500, 12, '				Sweet cheek blushed 2					', '15.png', 18),
(6, 1, 'Madame Gie Gateway Make Up Kit 01', 22400, 8, '			Make up kit 1							', '12.jpg', 20),
(7, 5, 'Sari ayu 1', 105000, 50, '			Make up kit 						', '18.jpg', 20),
(8, 6, 'viva 01', 20000, 3, '			Massage cream					', '23.jpg', 20),
(9, 4, 'Revlon lips 1', 25000, 96, '						Lipstick				', '38.webp', 20),
(10, 7, 'Wardah body care 1', 30000, 600, '			Body care 1		', '15.png', 25),
(11, 6, 'Viva bodycare ', 19000, 500, '						Body care 1				', '10.jpg', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
