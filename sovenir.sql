-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 05.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sovenir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin123', 'hd elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jambi', 25000),
(2, 'Palembang', 30000),
(3, 'Batang Hari', 19000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(13, 'robby.afrilianto1104@gmail.com', '123', 'Robby Afrilianto', '082236073957', 'Jl. Sunan kalijaga jambi\r\nJl. Sunan kalijaga Jambi'),
(14, 'tjutwilujengistikaroh99@gmail.com', '123', 'ajeng', '082269869012', 'Bulian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(50, 13, 0, '2020-10-03', 3399000, 'sudah kirim pembayaran'),
(51, 13, 3, '2020-10-03', 1758000, ''),
(52, 13, 2, '2020-10-07', 1769000, ''),
(53, 13, 3, '2020-10-07', 469000, ''),
(54, 13, 1, '2020-10-07', 775000, ''),
(55, 13, 0, '2020-10-11', 3489000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 4, 1),
(2, 1, 6, 1),
(3, 16, 4, 2),
(4, 17, 4, 2),
(5, 18, 6, 1),
(6, 19, 4, 1),
(7, 20, 4, 1),
(8, 21, 4, 1),
(9, 22, 4, 1),
(10, 23, 4, 1),
(11, 24, 4, 1),
(12, 0, 4, 1),
(13, 0, 4, 1),
(14, 0, 6, 1),
(15, 0, 7, 1),
(16, 0, 7, 1),
(17, 0, 4, 1),
(18, 0, 6, 1),
(19, 0, 4, 1),
(20, 0, 4, 1),
(21, 0, 4, 1),
(22, 25, 7, 1),
(23, 0, 4, 1),
(24, 26, 4, 1),
(25, 27, 6, 1),
(26, 0, 4, 1),
(27, 0, 4, 2),
(28, 0, 7, 2),
(29, 0, 4, 1),
(30, 0, 6, 1),
(31, 0, 4, 1),
(32, 0, 4, 1),
(33, 0, 6, 1),
(34, 0, 8, 1),
(35, 0, 6, 1),
(36, 28, 8, 1),
(37, 0, 7, 1),
(38, 0, 6, 1),
(39, 0, 4, 2),
(40, 0, 9, 1),
(41, 0, 4, 1),
(42, 0, 6, 1),
(43, 29, 4, 1),
(44, 30, 8, 1),
(45, 31, 4, 2),
(46, 32, 4, 1),
(47, 33, 6, 1),
(48, 34, 4, 1),
(49, 35, 19, 1),
(50, 36, 8, 1),
(51, 37, 8, 1),
(52, 38, 6, 1),
(53, 39, 9, 1),
(54, 40, 9, 1),
(55, 41, 6, 1),
(56, 42, 7, 1),
(57, 44, 6, 1),
(58, 45, 6, 1),
(59, 46, 6, 1),
(60, 47, 9, 1),
(61, 48, 6, 1),
(62, 49, 24, 1),
(63, 49, 6, 1),
(64, 50, 1, 1),
(65, 51, 2, 1),
(66, 52, 2, 1),
(67, 53, 5, 1),
(68, 54, 5, 1),
(69, 54, 8, 1),
(70, 55, 2, 1),
(71, 55, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(2, 'Mesin Cuci Toshiba', 1739000, 27000, 'mesin_cuci_toshiba.jpg', '			9 kg, Garansi 5 tahun, Part 2 tahun, Garansi resmi pabrik, 370 pencuci, Pengiring 135 wat, 220 vol.																', 14),
(3, 'Tv Polytron 32 In', 1750000, 5800, 'tv_polytron.jpg', 'LED TV\r\n- 32 Inch\r\n- Cinemax LED\r\n- Resolusi HD (1366x768p)\r\n- A+ Display panel\r\n- 300 nit brightness\r\n- 8 modes picture setting\r\n- USB movie\r\n- With speaker\r\n- 2 x HDMI\r\n- 1 x VGA/PC Input\r\n- 1 x Audio Out\r\n- 1 x USB Movie\r\n- 1 x AV / Component Input\r\n- Daya 55 Watt', 9),
(4, 'Speaker Polytron Pma 9506', 655000, 5600, 'speaker_polytron_pma_9506.jpg', 'Nama Produk : Polytron Multimedia Audio\r\nTipe : PMA 9300\r\nWarna : Gold, Putih dan Hitam\r\nGaransi Resmi : 1 Tahun\r\n2.1 Channel\r\nBluetooth\r\nBazzoke\r\nUSB MP3 Player\r\nSD / MMC MP3 Player\r\nUSB Input\r\nSD / MMC Input\r\nBuilt in FM Radio\r\nAmbience Light\r\nTerminal Line IN\r\nTerminal AUX IN\r\nPower Output : 35 Watt RMS\r\nDaya : 30 Watt\r\nTegangan : 220VAC 50Hz\r\nKotak : 34.5 x 32 x 34.5 cm\r\nBerat : 5.6 kg\r\n', 10),
(5, 'DVD Player Samsung', 450000, 1000, 'dvd_player_samsung.png', '', 8),
(6, 'Ac Panasonic 1Pk', 5550000, 1000, 'ac_panasonic.jpg', 'Bergaransi, baru dan masih segel.HARGA TERLAMPIR BELUM TERMASUK ONGKOS PASANG AC\r\n\r\nPENJELASAN FITUR\r\nAC dengan teknologi inverter yang hemar listrik dengan sertifikasi bintang 4. Dilengkapi turbo yang mampu mendinginkan secara cepat. Di desain minimalisi sehingga cocok untuk ruangan yang minimalis. Jadikan AC andalah untuk keluarga. Freon R410A\r\n\r\nCOCOK UNTUK\r\nBesaran pk: 1pk\r\nLuas ruangan: 12-23 m2\r\nWatt: 690\r\nBtu/h: 8530\r\nDiameter pipa cairan dan gas: 1/4\" dan 3/8\"\r\nBerat indoor dan outdoor: 8kg dan 19kg\r\nUkuran tinggi x lebar x tebal: 30cm X 87 cm X 23.6cm\r\n\r\nGARANSI\r\n1 tahun sparepart\r\n3 tahun kompresor\r\n\r\n', 5),
(7, 'Vacuum Cleaner', 985000, 8000, 'vacuum_cleaner.jpg', 'penyedot debu vacuum cleaner panasonic cg-300', 25),
(8, 'NEW MIYAKO Rice Cooker Magic Com MINI PSG-607 0,6 L', 300000, 200, 'rice_cooker.jpg', 'Rice Cooker Serbaguna (Multi Cooker) Miyako PSG-607 PSG 607 PSG607\r\n\r\nFungsi Utama / Unique Selling Point :\r\n- Serbaguna! Dapat memasak Nasi atau Mie (Hanya memasak, tidak bisa menghangatkan)\r\n- Kapasitas Nasi 0,63 L\r\n- Daya 300 Watt\r\n- Tegangan 220 VAC-50 Hz\r\n- Panci aluminium coating teflon ( anti lengket )\r\n\r\nDimensi produk : Diameter panci : 17cm ; Tinggi 10.5cm\r\nGaransi: 1 Tahun Service\r\n', 49),
(28, 'Ac Sharp freon R32 1,5 PK', 4080000, 800, 'ac_sharp.jpg', 'SPESIFIKASI AC:\r\nAC SPLIT\r\nBERSARAN PK : 1.1/2 PK\r\nDAYA MAXIMAL : 1090 Watt\r\nPOWER : 12000 BTU/H\r\nREFRIGERANT : R32\r\nDIMENSI IN :877 x 292 x 222 mm\r\nBERAT : 10 kg\r\nDIMENSI OUT : 730 x 540 x 250 mm\r\nBERAT : 25 kg\r\nUKURAN PIPA : 1/4 1/2\r\nGARANSI 10 TAHUN KOMPRESSOR & 1 TAHUN SPAREPART', 25),
(29, 'Mesin Cuci Sharp 8kg 2 Tabung', 1350000, 19000, 'mesin_cuci_sharp.jpg', 'Sharp ES-T75NT Mesin Cuci [2 Tabung/7 Kg] merupakan mesin cuci dengan teknologi Super Aquamagic dan Super Low Wattage Yang didesain khusus untuk menjaga kualitas hasil cucian dengan konsumsi listrik seminimal mungkin.Memiliki fitur Single Pulsator yang Sempurna membersihkan kotoran pada cucian. Pulsator putaran yang lebih kuat dan lebih mudah sehingga tidal merusak pakaian dan hasil cucian tetap bersih.', 25);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
