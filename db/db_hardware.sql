-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2018 pada 07.48
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hardware`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_cabang`
--

CREATE TABLE `mst_cabang` (
  `kode_cabang` varchar(10) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kode_propinsi` varchar(10) NOT NULL,
  `kode_kabupaten_kota` varchar(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_cabang`
--

INSERT INTO `mst_cabang` (`kode_cabang`, `nama_cabang`, `alamat`, `kode_propinsi`, `kode_kabupaten_kota`, `no_telepon`, `tanggal_entri`) VALUES
('KDCB.00001', 'PT. BINTANG NIAGA JAYA (HO)', 'JL. MAYOR OKING JAYAATMAJA NO. 102', '32', '32.01', '0218765447', '2018-06-02'),
('KDCB.00002', 'PT. BINTANG NIAGA JAYA', 'JL. MAYOR OKING JAYAATMAJA NO. 102', '32', '32.01', '0218765447', '2018-06-02'),
('KDCB.00003', 'PT. BINTANG MOTOR JAYA 01', 'CIKARANG', '32', '32.16', '0218765447', '2018-07-28'),
('KDCB.00004', 'PT. BINTANG MOTOR JAYA 02', 'CIREBON', '32', '32.09', '0218765447', '2018-07-28'),
('KDCB.00005', 'PT. BINTANG MOTOR JAYA 03', 'CINERE', '32', '32.76', '0218765447', '2018-07-28'),
('KDCB.00006', 'PT. BINTANG MOTOR JAYA 04', 'BUARAN', '31', '31.75', '0218765447', '2018-07-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_divisi`
--

CREATE TABLE `mst_divisi` (
  `kode_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_divisi`
--

INSERT INTO `mst_divisi` (`kode_divisi`, `nama_divisi`, `tanggal_entri`) VALUES
('KDVS.00001', 'IT', '2018-04-23'),
('KDVS.00002', 'FINANCE', '2018-04-23'),
('KDVS.00003', 'ACCOUNTING', '2018-04-23'),
('KDVS.00004', 'HRD', '2018-04-23'),
('KDVS.00005', 'H2 HO', '2018-04-23'),
('KDVS.00006', 'H3 HO', '2018-04-23'),
('KDVS.00007', 'BUSINESS DEVELOPMENT', '2018-04-23'),
('KDVS.00008', 'H1', '2018-04-23'),
('KDVS.00009', 'H2', '2018-04-23'),
('KDVS.00010', 'H3', '2018-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_hardware`
--

CREATE TABLE `mst_hardware` (
  `kode_hardware` varchar(10) NOT NULL,
  `nama_hardware` varchar(150) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `kode_merk` varchar(10) NOT NULL,
  `kode_tipe` varchar(10) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_hardware`
--

INSERT INTO `mst_hardware` (`kode_hardware`, `nama_hardware`, `kode_kategori`, `kode_merk`, `kode_tipe`, `tanggal_entri`) VALUES
('KDHW.00001', 'PRINTER EPSON L120', 'KTGR.00001', 'MRK.000001', 'KDTP.00001', '2018-06-04'),
('KDHW.00002', 'PRINTER HP LASERJET PRO M102W', 'KTGR.00001', 'MRK.000002', 'KDTP.00004', '2018-07-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kabupaten_kota`
--

CREATE TABLE `mst_kabupaten_kota` (
  `kode_kabupaten_kota` varchar(10) NOT NULL,
  `nama_kabupaten_kota` varchar(50) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_kabupaten_kota`
--

INSERT INTO `mst_kabupaten_kota` (`kode_kabupaten_kota`, `nama_kabupaten_kota`, `tanggal_entri`) VALUES
('16.01', 'KABUPATEN OGAN KOMERING ULU', '2018-03-19'),
('16.02', 'KABUPATEN OGAN KOMERING ILIR', '2018-03-19'),
('16.03', 'KABUPATEN MUARA ENIM', '2018-03-19'),
('16.04', 'KABUPATEN LAHAT', '2018-04-23'),
('16.05', 'KABUPATEN MUSI RAWAS', '2018-03-19'),
('16.06', 'KABUPATEN MUSI BANYUASIN', '2018-03-19'),
('16.07', 'KABUPATEN BANYUASIN', '2018-03-19'),
('16.08', 'KABUPATEN OGAN KOMERING ULU TIMUR', '2018-03-19'),
('16.09', 'KABUPATEN OGAN KOMERING ULU SELATAN', '2018-03-19'),
('16.10', 'KABUPATEN OGAN ILIR', '2018-03-19'),
('16.11', 'KABUPATEN EMPAT LAWANG', '2018-03-19'),
('16.12', 'KABUPATEN PENUKAL ARAB LEMATANG ILIR', '2018-03-19'),
('16.13', 'KABUPATEN MUSI RAWAS UTARA', '2018-03-19'),
('16.71', 'KOTA PALEMBANG', '2018-03-19'),
('16.72', 'KOTA PAGAR ALAM', '2018-03-19'),
('16.73', 'KOTA LUBUK LINGGAU', '2018-03-19'),
('16.74', 'KOTA PRABUMULIH', '2018-03-19'),
('31.01', 'KABUPATEN KEP. SERIBU', '2018-06-02'),
('31.71', 'KOTA JAKARTA PUSAT', '2018-06-02'),
('31.72', 'KOTA JAKARTA UTARA', '2018-06-02'),
('31.73', 'KOTA JAKARTA BARAT', '2018-06-02'),
('31.74', 'KOTA JAKARTA SELATAN', '2018-06-02'),
('31.75', 'KOTA JAKARTA TIMUR', '2018-06-02'),
('32.01', 'KABUPATEN BOGOR', '2018-03-19'),
('32.02', 'KABUPATEN SUKABUMI', '2018-03-19'),
('32.03', 'KABUPATEN CIANJUR', '2018-03-19'),
('32.04', 'KABUPATEN BANDUNG', '2018-03-19'),
('32.05', 'KABUPATEN GARUT', '2018-03-19'),
('32.06', 'KABUPATEN TASIKMALAYA', '2018-03-19'),
('32.07', 'KABUPATEN CIAMIS', '2018-03-19'),
('32.08', 'KABUPATEN KUNINGAN', '2018-03-19'),
('32.09', 'KABUPATEN CIREBON', '2018-03-19'),
('32.10', 'KABUPATEN MAJALENGKA', '2018-03-19'),
('32.11', 'KABUPATEN SUMEDANG', '2018-03-19'),
('32.12', 'KABUPATEN INDRAMAYU', '2018-03-19'),
('32.13', 'KABUPATEN SUBANG', '2018-03-19'),
('32.14', 'KABUPATEN PURWAKARTA', '2018-03-19'),
('32.15', 'KABUPATEN KARAWANG', '2018-03-19'),
('32.16', 'KABUPATEN BEKASI', '2018-03-19'),
('32.17', 'KABUPATEN BANDUNG BARAT', '2018-03-19'),
('32.18', 'KABUPATEN PANGANDARAN', '2018-03-19'),
('32.71', 'KOTA BOGOR', '2018-03-19'),
('32.72', 'KOTA SUKABUMI', '2018-03-19'),
('32.73', 'KOTA BANDUNG', '2018-03-19'),
('32.74', 'KOTA CIREBON', '2018-03-19'),
('32.75', 'KOTA BEKASI', '2018-03-19'),
('32.76', 'KOTA DEPOK', '2018-03-19'),
('32.77', 'KOTA CIMAHI', '2018-03-19'),
('32.78', 'KOTA TASIKMALAYA', '2018-03-19'),
('32.79', 'KOTA BANJAR', '2018-03-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kategori`
--

CREATE TABLE `mst_kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_kategori`
--

INSERT INTO `mst_kategori` (`kode_kategori`, `nama_kategori`, `tanggal_entri`) VALUES
('KTGR.00001', 'PRINTER', '2018-04-16'),
('KTGR.00002', 'CPU', '2018-04-16'),
('KTGR.00003', 'UPS', '2018-06-04'),
('KTGR.00004', 'LAPTOP', '2018-06-04'),
('KTGR.00005', 'MONITOR', '2018-06-04'),
('KTGR.00006', 'KEYBOARD', '2018-06-04'),
('KTGR.00007', 'MOUSE', '2018-06-04'),
('KTGR.00008', 'SCANNER', '2018-06-04'),
('KTGR.00009', 'PABX', '2018-07-25'),
('KTGR.00010', 'HARDDISK', '2018-07-25'),
('KTGR.00011', 'FLASH DISK', '2018-07-25'),
('KTGR.00012', 'HDD EXTERNAL', '2018-07-25'),
('KTGR.00013', 'PROJECTOR', '2018-07-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merk`
--

CREATE TABLE `mst_merk` (
  `kode_merk` varchar(10) NOT NULL,
  `nama_merk` varchar(50) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_merk`
--

INSERT INTO `mst_merk` (`kode_merk`, `nama_merk`, `tanggal_entri`) VALUES
('MRK.000001', 'EPSON', '2018-04-17'),
('MRK.000002', 'HP', '2018-04-23'),
('MRK.000003', 'LENOVO', '2018-06-03'),
('MRK.000004', 'DELL', '2018-06-03'),
('MRK.000005', 'ACER', '2018-06-03'),
('MRK.000006', 'CANON', '2018-06-03'),
('MRK.000007', 'PANASONIC', '2018-06-03'),
('MRK.000008', 'EATON', '2018-06-03'),
('MRK.000009', 'PASCAL', '2018-06-03'),
('MRK.000010', 'APC', '2018-06-03'),
('MRK.000011', 'INFOCUS', '2018-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_pengepul`
--

CREATE TABLE `mst_pengepul` (
  `kode_pengepul` varchar(10) NOT NULL,
  `nama_pengepul` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_propinsi` varchar(10) NOT NULL,
  `kode_kabupaten_kota` varchar(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_pengepul`
--

INSERT INTO `mst_pengepul` (`kode_pengepul`, `nama_pengepul`, `alamat`, `kode_propinsi`, `kode_kabupaten_kota`, `no_telepon`, `tanggal_entri`) VALUES
('KDPN.00001', 'SUKIRNO', 'CILANGKAP', '32', '32.76', '0218765446', '2018-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_pic_it`
--

CREATE TABLE `mst_pic_it` (
  `id` varchar(10) NOT NULL,
  `nama_pic_it` varchar(150) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_pic_it`
--

INSERT INTO `mst_pic_it` (`id`, `nama_pic_it`, `no_telepon`, `alamat_email`, `tanggal_entri`) VALUES
('KDPIC.0001', 'RIYAN HARGIYANTO', '089612345678', 'riyan@bintangmotor.com', '2018-07-28'),
('KDPIC.0002', 'DUWI PRASETYO', '089697555869', 'duwi@bintangmotor.com', '2018-07-27'),
('KDPIC.0003', 'ASEP TEDI PERMANA', '089697555869', 'asep@bintangmotor.com', '2018-07-01'),
('KDPIC.0004', 'MUHAMAD FAJAR HAFIEZ', '089697555869', 'fajar@bintangmotor.com', '2018-07-21'),
('KDPIC.0005', 'WIWIT HARYADI', '089697555869', 'wiwit@bintangmotor.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_posession`
--

CREATE TABLE `mst_posession` (
  `kode_posession` varchar(10) NOT NULL,
  `nama_posession` varchar(20) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_posession`
--

INSERT INTO `mst_posession` (`kode_posession`, `nama_posession`, `tanggal_entri`) VALUES
('KDPS.00001', 'IT01', '2018-07-25'),
('KDPS.00002', 'IT02', '2018-07-25'),
('KDPS.00003', 'IT03', '2018-07-25'),
('KDPS.00004', 'IT04', '2018-07-25'),
('KDPS.00005', 'IT04', '2018-07-25'),
('KDPS.00006', 'IT06', '2018-07-25'),
('KDPS.00007', 'IT07', '2018-07-25'),
('KDPS.00008', 'BD01', '2018-07-25'),
('KDPS.00009', 'BD02', '2018-07-25'),
('KDPS.00010', 'BD03', '2018-07-25'),
('KDPS.00011', 'BD04', '2018-07-25'),
('KDPS.00012', 'BD05', '2018-07-25'),
('KDPS.00013', 'BD06', '2018-07-25'),
('KDPS.00014', 'FINANCE01', '2018-07-25'),
('KDPS.00015', 'FINANCE02', '2018-07-25'),
('KDPS.00016', 'FINANCE03', '2018-07-25'),
('KDPS.00017', 'FINANCE04', '2018-07-25'),
('KDPS.00018', 'FINANCE05', '2018-07-25'),
('KDPS.00019', 'FINANCE06', '2018-07-25'),
('KDPS.00020', 'FINANCE07', '2018-07-25'),
('KDPS.00021', 'STNK HO', '2018-07-25'),
('KDPS.00022', 'ACCOUNTING01', '2018-07-28'),
('KDPS.00023', 'ACCOUNTING02', '2018-07-28'),
('KDPS.00024', 'ACCOUNTING03', '2018-07-28'),
('KDPS.00025', 'ACCOUNTING04', '2018-07-28'),
('KDPS.00026', 'ACCOUNTING05', '2018-07-28'),
('KDPS.00027', 'ACCOUNTING06', '2018-07-28'),
('KDPS.00028', 'ACCOUNTING07', '2018-07-28'),
('KDPS.00029', 'ACCOUNTING08', '2018-07-28'),
('KDPS.00030', 'ACCOUNTING09', '2018-07-28'),
('KDPS.00031', 'ACCOUNTING10', '2018-07-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_propinsi`
--

CREATE TABLE `mst_propinsi` (
  `kode_propinsi` varchar(10) NOT NULL,
  `nama_propinsi` varchar(30) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_propinsi`
--

INSERT INTO `mst_propinsi` (`kode_propinsi`, `nama_propinsi`, `tanggal_entri`) VALUES
('11', 'ACEH', '2018-04-23'),
('12', 'SUMATERA UTARA', '2018-03-19'),
('13', 'SUMATERA BARAT', '2018-04-17'),
('14', 'RIAU', '2018-03-09'),
('15', 'JAMBI', '2018-03-09'),
('16', 'SUMATERA SELATAN', '2018-03-09'),
('17', 'BENGKULU', '2018-03-09'),
('18', 'LAMPUNG', '2018-03-09'),
('19', 'KEPUALAUAN BANGKA BELITUNG', '2018-03-09'),
('21', 'KEPULAUAN RIAU', '2018-03-09'),
('31', 'DKI JAKARTA', '2018-03-09'),
('32', 'JAWA BARAT', '2018-03-09'),
('33', 'JAWA TENGAH', '2018-03-09'),
('34', 'DI YOGYAKARTA', '2018-03-09'),
('35', 'JAWA TIMUR', '2018-03-09'),
('36', 'BANTEN', '2018-03-09'),
('51', 'BALI', '2018-03-09'),
('52', 'NUSA TENGGARA BARAT', '2018-03-09'),
('53', 'NUSA TENGGARA TIMUR', '2018-03-09'),
('61', 'KALIMANTAN BARAT', '2018-03-09'),
('62', 'KALIMANTAN TENGAH', '2018-03-09'),
('63', 'KALIMANTAN SELATAN', '2018-03-09'),
('64', 'KALIMANTAN TIMUR', '2018-03-09'),
('71', 'SULAWESI UTARA', '2018-03-09'),
('72', 'SULAWESI TENGAH', '2018-03-09'),
('73', 'SULAWESI SELATAN', '2018-03-09'),
('74', 'SULAWESI TENGGARA', '2018-03-09'),
('75', 'GORONTALO', '2018-03-09'),
('76', 'SULAWESI BARAT', '2018-03-09'),
('81', 'MALUKU', '2018-03-09'),
('82', 'MALUKU UTARA', '2018-03-09'),
('91', 'PAPUA', '2018-03-09'),
('92', 'PAPUA BARAT', '2018-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_tipe`
--

CREATE TABLE `mst_tipe` (
  `kode_tipe` varchar(10) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_tipe`
--

INSERT INTO `mst_tipe` (`kode_tipe`, `nama_tipe`, `tanggal_entri`) VALUES
('KDTP.00001', 'L120', '0000-00-00'),
('KDTP.00002', 'L200', '0000-00-00'),
('KDTP.00003', 'L230', '0000-00-00'),
('KDTP.00004', 'LASERJET PRO M102W', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`id`, `username`, `password`, `nama_lengkap`, `alamat_email`, `no_telepon`, `tanggal_entri`) VALUES
(3, 'kama', '$2y$10$95/th91zTAnU7lg/b3iTVunId6hnfMQ4LWw4Vuq4DziW7AWLUpmoW', 'Kama Satya Nugraha', 'kama@gmail.com', 'NomorTelepon', '2018-07-23'),
(4, 'administrator', '$2y$10$mIwGHMLJX3eC3IJTrGmWV.bx8MgZe9B3CWT.po/Iny2mo0v5zw6Ai', 'Administrator', 'it@bintangmotor.com', 'NomorTelepon', '2018-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_vendor`
--

CREATE TABLE `mst_vendor` (
  `kode_vendor` varchar(10) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kode_propinsi` varchar(10) NOT NULL,
  `kode_kabupaten_kota` varchar(10) NOT NULL,
  `website` varchar(20) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat_email` varchar(50) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_vendor`
--

INSERT INTO `mst_vendor` (`kode_vendor`, `nama_vendor`, `alamat`, `kode_propinsi`, `kode_kabupaten_kota`, `website`, `no_telepon`, `alamat_email`, `tanggal_entri`) VALUES
('KDVN.00001', 'MEGA PERKASA COMPUTER', 'KELAPA DUA', '32', '32.76', 'www.mpc.co.id', '0218765447', 'mpc@gmail.com', '0000-00-00'),
('KDVN.00002', 'JIIFO KOMPUTER', 'HARCO MANGGA DUA', '31', '31.71', '', '0218765446', 'jiifo@gmail.com', '2018-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_pengadaan_hardware`
--

CREATE TABLE `trx_pengadaan_hardware` (
  `kode_pengadaan_hardware` varchar(15) NOT NULL,
  `tanggal_pengadaan_hardware` date NOT NULL,
  `tanggal_kadaluwarsa_hardware` date NOT NULL,
  `kode_cabang` varchar(10) NOT NULL,
  `kode_divisi` varchar(10) NOT NULL,
  `kode_posession` varchar(10) NOT NULL,
  `kode_hardware` varchar(10) NOT NULL,
  `kode_vendor` varchar(10) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_pengadaan_hardware`
--

INSERT INTO `trx_pengadaan_hardware` (`kode_pengadaan_hardware`, `tanggal_pengadaan_hardware`, `tanggal_kadaluwarsa_hardware`, `kode_cabang`, `kode_divisi`, `kode_posession`, `kode_hardware`, `kode_vendor`, `tanggal_entri`) VALUES
('PNG.HW.0000001', '2018-07-01', '2018-07-01', 'KDCB.00001', 'KDVS.00001', 'KDPS.00001', 'KDHW.00002', 'KDVN.00001', '2018-07-29'),
('PNG.HW.0000002', '2018-07-29', '2018-07-29', 'KDCB.00002', 'KDVS.00002', 'KDPS.00020', 'KDHW.00002', 'KDVN.00001', '2018-07-29'),
('PNG.HW.0000003', '2018-07-06', '2018-07-06', 'KDCB.00001', 'KDVS.00003', 'KDPS.00024', 'KDHW.00001', 'KDVN.00001', '2018-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_penjualan_hardware`
--

CREATE TABLE `trx_penjualan_hardware` (
  `kode_penjualan_hardware` varchar(15) NOT NULL,
  `tanggal_penjualan_hardware` date NOT NULL,
  `kode_cabang` varchar(10) NOT NULL,
  `kode_divisi` varchar(10) NOT NULL,
  `kode_posession` varchar(10) NOT NULL,
  `kode_hardware` varchar(10) NOT NULL,
  `kode_pengepul` varchar(10) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_penjualan_hardware`
--

INSERT INTO `trx_penjualan_hardware` (`kode_penjualan_hardware`, `tanggal_penjualan_hardware`, `kode_cabang`, `kode_divisi`, `kode_posession`, `kode_hardware`, `kode_pengepul`, `tanggal_entri`) VALUES
('PRW.HW.0000001', '2018-07-29', 'KDCB.00001', 'KDVS.00002', 'KDPS.00001', 'KDHW.00001', 'KDPN.00001', '2018-07-29'),
('PRW.HW.0000002', '2018-07-17', 'KDCB.00001', 'KDVS.00003', 'KDPS.00025', 'KDHW.00002', 'KDPN.00001', '2018-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_perawatan_hardware`
--

CREATE TABLE `trx_perawatan_hardware` (
  `kode_perawatan_hardware` varchar(15) NOT NULL,
  `tanggal_perawatan_hardware` date NOT NULL,
  `kode_cabang` varchar(10) NOT NULL,
  `kode_divisi` varchar(10) NOT NULL,
  `kode_posession` varchar(10) NOT NULL,
  `kode_hardware` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id` varchar(10) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_perawatan_hardware`
--

INSERT INTO `trx_perawatan_hardware` (`kode_perawatan_hardware`, `tanggal_perawatan_hardware`, `kode_cabang`, `kode_divisi`, `kode_posession`, `kode_hardware`, `keterangan`, `id`, `tanggal_entri`) VALUES
('PRW.HW.0000001', '2018-07-01', 'KDCB.00001', 'KDVS.00002', 'KDPS.00014', 'KDHW.00001', 'TAMBAH TINTA', 'KDPIC.0005', '2018-07-29'),
('PRW.HW.0000002', '2018-07-29', 'KDCB.00001', 'KDVS.00002', 'KDPS.00020', 'KDHW.00001', 'TAMBAH TINTA DAN RESET PRINTER', 'KDPIC.0004', '2018-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_peremajaan_hardware`
--

CREATE TABLE `trx_peremajaan_hardware` (
  `kode_peremajaan_hardware` varchar(15) NOT NULL,
  `tanggal_peremajaan_hardware` date NOT NULL,
  `tanggal_kadaluwarsa_hardware` date NOT NULL,
  `kode_cabang` varchar(10) NOT NULL,
  `kode_divisi` varchar(10) NOT NULL,
  `kode_posession` varchar(10) NOT NULL,
  `kode_hardware` varchar(10) NOT NULL,
  `kode_vendor` varchar(10) NOT NULL,
  `tanggal_entri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_peremajaan_hardware`
--

INSERT INTO `trx_peremajaan_hardware` (`kode_peremajaan_hardware`, `tanggal_peremajaan_hardware`, `tanggal_kadaluwarsa_hardware`, `kode_cabang`, `kode_divisi`, `kode_posession`, `kode_hardware`, `kode_vendor`, `tanggal_entri`) VALUES
('PRM.HW.0000001', '2018-07-29', '2018-07-29', 'KDCB.00001', 'KDVS.00001', 'KDPS.00003', 'KDHW.00001', 'KDVN.00002', '2018-07-29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_cabang`
--
ALTER TABLE `mst_cabang`
  ADD PRIMARY KEY (`kode_cabang`),
  ADD KEY `kode_propinsi` (`kode_propinsi`),
  ADD KEY `kode_kabupaten_kota` (`kode_kabupaten_kota`);

--
-- Indeks untuk tabel `mst_divisi`
--
ALTER TABLE `mst_divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indeks untuk tabel `mst_hardware`
--
ALTER TABLE `mst_hardware`
  ADD PRIMARY KEY (`kode_hardware`),
  ADD KEY `kode_kategori` (`kode_kategori`),
  ADD KEY `kode_merk` (`kode_merk`),
  ADD KEY `kode_tipe` (`kode_tipe`);

--
-- Indeks untuk tabel `mst_kabupaten_kota`
--
ALTER TABLE `mst_kabupaten_kota`
  ADD PRIMARY KEY (`kode_kabupaten_kota`);

--
-- Indeks untuk tabel `mst_kategori`
--
ALTER TABLE `mst_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `mst_merk`
--
ALTER TABLE `mst_merk`
  ADD PRIMARY KEY (`kode_merk`);

--
-- Indeks untuk tabel `mst_pengepul`
--
ALTER TABLE `mst_pengepul`
  ADD PRIMARY KEY (`kode_pengepul`),
  ADD KEY `kode_propinsi` (`kode_propinsi`),
  ADD KEY `kode_kabupaten_kota` (`kode_kabupaten_kota`);

--
-- Indeks untuk tabel `mst_pic_it`
--
ALTER TABLE `mst_pic_it`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_posession`
--
ALTER TABLE `mst_posession`
  ADD PRIMARY KEY (`kode_posession`);

--
-- Indeks untuk tabel `mst_propinsi`
--
ALTER TABLE `mst_propinsi`
  ADD PRIMARY KEY (`kode_propinsi`);

--
-- Indeks untuk tabel `mst_tipe`
--
ALTER TABLE `mst_tipe`
  ADD PRIMARY KEY (`kode_tipe`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_vendor`
--
ALTER TABLE `mst_vendor`
  ADD PRIMARY KEY (`kode_vendor`),
  ADD KEY `kode_propinsi` (`kode_propinsi`),
  ADD KEY `kode_kabupaten_kota` (`kode_kabupaten_kota`);

--
-- Indeks untuk tabel `trx_pengadaan_hardware`
--
ALTER TABLE `trx_pengadaan_hardware`
  ADD PRIMARY KEY (`kode_pengadaan_hardware`),
  ADD KEY `kode_cabang` (`kode_cabang`),
  ADD KEY `kode_cabang_2` (`kode_cabang`),
  ADD KEY `kode_divisi` (`kode_divisi`),
  ADD KEY `kode_posession` (`kode_posession`),
  ADD KEY `kode_hardware` (`kode_hardware`),
  ADD KEY `kode_vendor` (`kode_vendor`);

--
-- Indeks untuk tabel `trx_penjualan_hardware`
--
ALTER TABLE `trx_penjualan_hardware`
  ADD PRIMARY KEY (`kode_penjualan_hardware`),
  ADD KEY `kode_cabang` (`kode_cabang`),
  ADD KEY `kode_divisi` (`kode_divisi`),
  ADD KEY `kode_posession` (`kode_posession`),
  ADD KEY `kode_hardware` (`kode_hardware`),
  ADD KEY `kode_pengepul` (`kode_pengepul`);

--
-- Indeks untuk tabel `trx_perawatan_hardware`
--
ALTER TABLE `trx_perawatan_hardware`
  ADD PRIMARY KEY (`kode_perawatan_hardware`),
  ADD KEY `kode_cabang` (`kode_cabang`),
  ADD KEY `kode_divisi` (`kode_divisi`),
  ADD KEY `kode_posession` (`kode_posession`),
  ADD KEY `kode_hardware` (`kode_hardware`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `trx_peremajaan_hardware`
--
ALTER TABLE `trx_peremajaan_hardware`
  ADD PRIMARY KEY (`kode_peremajaan_hardware`),
  ADD KEY `kode_cabang` (`kode_cabang`),
  ADD KEY `kode_divisi` (`kode_divisi`),
  ADD KEY `kode_posession` (`kode_posession`),
  ADD KEY `kode_hardware` (`kode_hardware`),
  ADD KEY `kode_vendor` (`kode_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mst_cabang`
--
ALTER TABLE `mst_cabang`
  ADD CONSTRAINT `mst_cabang_ibfk_1` FOREIGN KEY (`kode_propinsi`) REFERENCES `mst_propinsi` (`kode_propinsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mst_cabang_ibfk_2` FOREIGN KEY (`kode_kabupaten_kota`) REFERENCES `mst_kabupaten_kota` (`kode_kabupaten_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mst_hardware`
--
ALTER TABLE `mst_hardware`
  ADD CONSTRAINT `mst_hardware_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `mst_kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mst_hardware_ibfk_2` FOREIGN KEY (`kode_merk`) REFERENCES `mst_merk` (`kode_merk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mst_hardware_ibfk_3` FOREIGN KEY (`kode_tipe`) REFERENCES `mst_tipe` (`kode_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mst_pengepul`
--
ALTER TABLE `mst_pengepul`
  ADD CONSTRAINT `mst_pengepul_ibfk_1` FOREIGN KEY (`kode_propinsi`) REFERENCES `mst_propinsi` (`kode_propinsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mst_pengepul_ibfk_2` FOREIGN KEY (`kode_kabupaten_kota`) REFERENCES `mst_kabupaten_kota` (`kode_kabupaten_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mst_vendor`
--
ALTER TABLE `mst_vendor`
  ADD CONSTRAINT `mst_vendor_ibfk_1` FOREIGN KEY (`kode_propinsi`) REFERENCES `mst_propinsi` (`kode_propinsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mst_vendor_ibfk_2` FOREIGN KEY (`kode_kabupaten_kota`) REFERENCES `mst_kabupaten_kota` (`kode_kabupaten_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_pengadaan_hardware`
--
ALTER TABLE `trx_pengadaan_hardware`
  ADD CONSTRAINT `trx_pengadaan_hardware_ibfk_1` FOREIGN KEY (`kode_cabang`) REFERENCES `mst_cabang` (`kode_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pengadaan_hardware_ibfk_2` FOREIGN KEY (`kode_divisi`) REFERENCES `mst_divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pengadaan_hardware_ibfk_3` FOREIGN KEY (`kode_posession`) REFERENCES `mst_posession` (`kode_posession`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pengadaan_hardware_ibfk_4` FOREIGN KEY (`kode_hardware`) REFERENCES `mst_hardware` (`kode_hardware`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pengadaan_hardware_ibfk_5` FOREIGN KEY (`kode_vendor`) REFERENCES `mst_vendor` (`kode_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_penjualan_hardware`
--
ALTER TABLE `trx_penjualan_hardware`
  ADD CONSTRAINT `trx_penjualan_hardware_ibfk_1` FOREIGN KEY (`kode_cabang`) REFERENCES `mst_cabang` (`kode_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_penjualan_hardware_ibfk_2` FOREIGN KEY (`kode_divisi`) REFERENCES `mst_divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_penjualan_hardware_ibfk_3` FOREIGN KEY (`kode_posession`) REFERENCES `mst_posession` (`kode_posession`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_penjualan_hardware_ibfk_4` FOREIGN KEY (`kode_hardware`) REFERENCES `mst_hardware` (`kode_hardware`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_penjualan_hardware_ibfk_5` FOREIGN KEY (`kode_pengepul`) REFERENCES `mst_pengepul` (`kode_pengepul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_perawatan_hardware`
--
ALTER TABLE `trx_perawatan_hardware`
  ADD CONSTRAINT `trx_perawatan_hardware_ibfk_1` FOREIGN KEY (`kode_cabang`) REFERENCES `mst_cabang` (`kode_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_perawatan_hardware_ibfk_2` FOREIGN KEY (`kode_divisi`) REFERENCES `mst_divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_perawatan_hardware_ibfk_3` FOREIGN KEY (`kode_posession`) REFERENCES `mst_posession` (`kode_posession`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_perawatan_hardware_ibfk_4` FOREIGN KEY (`kode_hardware`) REFERENCES `mst_hardware` (`kode_hardware`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_perawatan_hardware_ibfk_5` FOREIGN KEY (`id`) REFERENCES `mst_pic_it` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_peremajaan_hardware`
--
ALTER TABLE `trx_peremajaan_hardware`
  ADD CONSTRAINT `trx_peremajaan_hardware_ibfk_1` FOREIGN KEY (`kode_cabang`) REFERENCES `mst_cabang` (`kode_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_peremajaan_hardware_ibfk_2` FOREIGN KEY (`kode_divisi`) REFERENCES `mst_divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_peremajaan_hardware_ibfk_3` FOREIGN KEY (`kode_posession`) REFERENCES `mst_posession` (`kode_posession`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_peremajaan_hardware_ibfk_4` FOREIGN KEY (`kode_hardware`) REFERENCES `mst_hardware` (`kode_hardware`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_peremajaan_hardware_ibfk_5` FOREIGN KEY (`kode_vendor`) REFERENCES `mst_vendor` (`kode_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
