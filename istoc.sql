-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2022, 17:30:41
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `istoc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `admin_kadi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `admin_posta` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `admin_durum` tinyint(1) NOT NULL DEFAULT 1,
  `admin_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`adminid`, `admin_kadi`, `admin_posta`, `admin_sifre`, `admin_durum`, `admin_tarih`) VALUES
(1, 'istoc', 'istoc@istoc.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1, '2022-05-22 09:11:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `sitebaslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `siteurl` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `sitedurum` tinyint(1) NOT NULL DEFAULT 1,
  `tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `sitebaslik`, `siteurl`, `sitedurum`, `tel`, `eposta`, `adres`) VALUES
(1, 'istocs', 'http://localhost/istoc/', 1, '0212 659 4500', 'yonetim@istoc.com.tr.', 'İstoç Ticaret Merkezi, Mahmutbey, 2414. Sk No:3, 34218 Bağcılar/İstanbul');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bayiler`
--

CREATE TABLE `bayiler` (
  `id` int(11) NOT NULL,
  `bayikod` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bayiadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bayimail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bayisifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bayidurum` tinyint(1) NOT NULL DEFAULT 2,
  `bayitarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `bayitel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bayivergino` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bayivergidairesi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bayisite` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bayiler`
--

INSERT INTO `bayiler` (`id`, `bayikod`, `bayiadi`, `bayimail`, `bayisifre`, `bayidurum`, `bayitarih`, `bayitel`, `bayivergino`, `bayivergidairesi`, `bayisite`) VALUES
(3, '628a55e483b45', 'KARDESLER HIRDAVAT', 'kardeslerhir@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1, '2022-05-22 15:25:24', '0212 659 39 40', '7910596954', 'Yenibosna Vergi Dairesi', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `mesajisim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mesajposta` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mesajkonu` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `mesajicerik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `mesajdurum` tinyint(1) NOT NULL DEFAULT 2,
  `mesajtarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `mesajisim`, `mesajposta`, `mesajkonu`, `mesajicerik`, `mesajdurum`, `mesajtarih`) VALUES
(3, 'Göktuğ', 'göktug_2001@gmail.com', 'Sistem', 'Sistem kayt yaparken hata veriyor.', 2, '2022-05-22 10:41:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urunbaslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunfiyat` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunstok` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunekleyen` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunbaslik`, `urunfiyat`, `urunstok`, `urunekleyen`) VALUES
(2, 'Mikser', '50', '100', '628a55e483b45'),
(3, 'Matkap(BOSGH)', '500', '20', '628a55e483b45'),
(4, 'Darbeli Matkap(Mager)', '600', '20', '628a55e483b45');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bayiler`
--
ALTER TABLE `bayiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bayiler`
--
ALTER TABLE `bayiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
