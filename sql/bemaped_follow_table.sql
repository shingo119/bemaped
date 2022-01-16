-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 1 月 16 日 15:18
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bemaped_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bemaped_follow_table`
--

CREATE TABLE `bemaped_follow_table` (
  `id` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `be_followed` int(11) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `bemaped_follow_table`
--

INSERT INTO `bemaped_follow_table` (`id`, `followed`, `be_followed`, `indate`) VALUES
(4, 6, 8, '2021-12-14 17:14:39'),
(5, 1, 6, '2021-12-15 14:57:46'),
(7, 1, 8, '2021-12-16 01:51:15'),
(8, 8, 6, '2021-12-16 05:42:22'),
(9, 12, 8, '2021-12-16 06:25:00'),
(10, 12, 6, '2021-12-16 06:25:19'),
(11, 5, 6, '2021-12-16 06:57:15'),
(13, 5, 12, '2021-12-16 06:57:46'),
(14, 5, 13, '2021-12-16 06:58:07'),
(15, 13, 6, '2021-12-16 12:00:04'),
(16, 5, 8, '2021-12-16 12:20:21'),
(17, 14, 12, '2022-01-16 23:55:36');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
