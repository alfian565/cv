-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2019 pada 05.52
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbarang`
--

CREATE TABLE `tblbarang` (
  `kode_barang` int(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_jenis` int(100) NOT NULL,
  `harga_net` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbarang`
--

INSERT INTO `tblbarang` (`kode_barang`, `nama_barang`, `kode_jenis`, `harga_net`, `harga_jual`, `stok`) VALUES
(99, 'TEST', 0, 700, 900, 0),
(100, 'Mie Instan', 1, 2500, 3000, 500),
(101, 'Pilus Garuda', 1, 8000, 9000, 100),
(102, 'Roti', 1, 4500, 5000, 200),
(103, 'Snack Lays', 1, 8000, 9000, 400),
(104, 'Pocky', 1, 10000, 12000, 500),
(105, 'Apel', 2, 4000, 5000, 100),
(106, 'Semangka', 2, 5000, 5000, 100),
(107, 'Melon', 2, 10000, 12000, 100),
(108, 'Durian', 2, 20000, 21000, 100),
(109, 'Anggur', 2, 15000, 16000, 100),
(110, 'Teh Pucuk Harum', 3, 2500, 3000, 100),
(111, 'Kopi Good Day Capuccino', 3, 4000, 5000, 100),
(112, 'Susu Ultramilk', 3, 6000, 7000, 100),
(113, 'Sabun', 4, 2000, 3000, 100),
(114, 'Shampoo', 4, 5000, 6000, 100),
(115, 'Pasta Gigi', 4, 10000, 12000, 100),
(116, 'Wortel', 5, 8000, 9000, 100),
(117, 'Bayam', 5, 4000, 5000, 100),
(118, 'Brokoli', 5, 8000, 9000, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbarangmasuk`
--

CREATE TABLE `tblbarangmasuk` (
  `NoNota` int(100) NOT NULL,
  `TglMasuk` date NOT NULL,
  `IDDistributor` int(100) NOT NULL,
  `IDPetugas` int(100) NOT NULL,
  `Total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldetailbrgmasuk`
--

CREATE TABLE `tbldetailbrgmasuk` (
  `NoNota` int(100) NOT NULL,
  `KodeBarang` varchar(100) NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldetailpenjualan`
--

CREATE TABLE `tbldetailpenjualan` (
  `NoFaktur` int(100) NOT NULL,
  `KodeBarang` int(100) NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldistributor`
--

CREATE TABLE `tbldistributor` (
  `IDDistributor` int(100) NOT NULL,
  `NamaDistributor` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `KotaAsal` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telpon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbldistributor`
--

INSERT INTO `tbldistributor` (`IDDistributor`, `NamaDistributor`, `Alamat`, `KotaAsal`, `Email`, `Telpon`) VALUES
(1010, 'Bambang Sumanto', 'Jl. Ikan Nila No.21', 'Malang', 'bambangsumanto10@gmail.com', '089789988987'),
(1011, 'Subarjo Jono', 'Jl. Jakarta No.10', 'Surabaya', 'subarjojono2@gmail.com', '0898282828282'),
(1012, 'Isnanto', 'Jl. Perahu layar No.1', 'Jakarta', 'isnanto2102@gmail.com', '0892299292299');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljenis`
--

CREATE TABLE `tbljenis` (
  `KodeJenis` int(100) NOT NULL,
  `Jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbljenis`
--

INSERT INTO `tbljenis` (`KodeJenis`, `Jenis`) VALUES
(1, 'Makanan'),
(2, 'Buah'),
(3, 'Minuman'),
(4, 'Peralatan Mandi'),
(5, 'Sayur'),
(6, 'Make Up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpenjualan`
--

CREATE TABLE `tblpenjualan` (
  `NoFaktur` int(100) NOT NULL,
  `TglPenjualan` date NOT NULL,
  `IDPetugas` int(100) NOT NULL,
  `Bayar` int(100) NOT NULL,
  `Sisa` int(100) NOT NULL,
  `Total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpetugas`
--

CREATE TABLE `tblpetugas` (
  `IDPetugas` int(100) NOT NULL,
  `NamaPetugas` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Telpon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpetugas`
--

INSERT INTO `tblpetugas` (`IDPetugas`, `NamaPetugas`, `Alamat`, `Email`, `password`, `Telpon`) VALUES
(2030, 'Roberto', 'Jl. Nakula No.12', 'robertoo0@gmail.com', '', '08292928282828'),
(2031, 'Ridwan Van Deri', 'Jl. Kapal Selam No.99', 'ridwan2@gmail.com', '', '0829292922929'),
(2032, '', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tblbarangmasuk`
--
ALTER TABLE `tblbarangmasuk`
  ADD PRIMARY KEY (`NoNota`);

--
-- Indeks untuk tabel `tbldistributor`
--
ALTER TABLE `tbldistributor`
  ADD PRIMARY KEY (`IDDistributor`);

--
-- Indeks untuk tabel `tbljenis`
--
ALTER TABLE `tbljenis`
  ADD PRIMARY KEY (`KodeJenis`);

--
-- Indeks untuk tabel `tblpenjualan`
--
ALTER TABLE `tblpenjualan`
  ADD PRIMARY KEY (`NoFaktur`);

--
-- Indeks untuk tabel `tblpetugas`
--
ALTER TABLE `tblpetugas`
  ADD PRIMARY KEY (`IDPetugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblbarangmasuk`
--
ALTER TABLE `tblbarangmasuk`
  MODIFY `NoNota` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbldistributor`
--
ALTER TABLE `tbldistributor`
  MODIFY `IDDistributor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT untuk tabel `tbljenis`
--
ALTER TABLE `tbljenis`
  MODIFY `KodeJenis` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tblpenjualan`
--
ALTER TABLE `tblpenjualan`
  MODIFY `NoFaktur` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblpetugas`
--
ALTER TABLE `tblpetugas`
  MODIFY `IDPetugas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2033;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
