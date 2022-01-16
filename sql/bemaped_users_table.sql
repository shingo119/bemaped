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
-- テーブルの構造 `bemaped_users_table`
--

CREATE TABLE `bemaped_users_table` (
  `id` int(11) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `explan` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `back_ground` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `life_flg` int(8) NOT NULL DEFAULT '0',
  `indate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `bemaped_users_table`
--

INSERT INTO `bemaped_users_table` (`id`, `u_name`, `u_email`, `u_pw`, `explan`, `icon`, `back_ground`, `life_flg`, `indate`) VALUES
(1, 'horagarasu', 'test@test.test', '$2y$10$7cH7lix18Eyy5mzDUZ5JEetmRUdWVGcsUiUs9AK2HYbRF6OhBqOlu', 'TESTでホラガラスのアカウント作ってみました', '202112150828006ad436112b55be27a8f78fa3caa94c9b.png', '202112150828006ad436112b55be27a8f78fa3caa94c9b.jpg', 0, '2021-12-03 19:41:28'),
(2, 'yano', 'test@test.te', '$2y$10$pKRK0iDh8W.Vwz3oP8zznuV8O6VLZnJqLIYxB8vH/LCjzd1xcEAlS', '裏垢です。', '', '', 0, '2021-12-10 09:22:24'),
(5, '矢野慎吾', 'test@test', '$2y$10$NW9/NMzJkhLyMwGL.4JJtuMzJ37igVDhmK0hBOsZQoDIMWkSSnu82', 'どうも、矢野慎吾です！bemapedというサービスを作ったのは私です！', '20211215215622227bc05e6bab2ed0ed5a154bc9df8668.JPG', '20211215215623227bc05e6bab2ed0ed5a154bc9df8668.jpg', 0, '2021-12-10 09:35:52'),
(6, 'みーもぐ', 'mi-mogu@test.test', '$2y$10$Gju0K8opplwweFbNweLhKOrl5fMq1EE9A5/sKrrhbawJy7Y8NFSMq', '富山のグルメやスポットを紹介している【みーもぐ】と申します。\r\nインスタフォロワー2.8万人突破！\r\n富山の飲食店に行きまくっております。\r\n\r\n生まれ育った富山の美味しい・楽しいを一人でも多くの方に届けられるよう\r\n動画を配信していきたいと思っています♪\r\n\r\nチャンネル登録やコメント、大変励みになります…\r\nぜひよろしくお願いします＾＾', '20211215125415c01d2e0b12939bbc12d024e5332cca00.png', '20211215125416c01d2e0b12939bbc12d024e5332cca00.png', 0, '2021-12-12 14:06:31'),
(7, 'ヒカキン', 'hikakin@test.test', '$2y$10$A4H8IXeyqJJOD.xIWRA17OkzzYIn2uXcdvjIFXDG61YpkyWI.28BG', 'HikakinTVはヒカキンが日常の面白いものを紹介するチャンネルです。\r\n◆プロフィール◆\r\nYouTubeにてHIKAKIN、HikakinTV、HikakinGames、HikakinBlogと\r\n４つのチャンネルを運営し、動画の総アクセス数は100億回を突破、\r\nチャンネル登録者数は計1800万人以上、YouTubeタレント事務所uuum株式会社ファウンダー兼最高顧問。', '20211215151031d991844998f550e6ea3dddc3dd26e53c.png', '20211215151032d991844998f550e6ea3dddc3dd26e53c.png', 0, '2021-12-13 07:13:26'),
(8, 'susuruTV', 'susuru@test.test', '$2y$10$IxHHRG5hwNYFogHnqpthVuyyFkuVdleeF9jVxThOnb5.NumdsZ16e', 'ずるずる、どうもSUSURUです！「毎日ラーメン健康生活」をテーマに、ラーメンをすする動画を毎日18:30に配信しています。日々ラーメンをすすり続け、現在2000日以上連続配信中です！全国の美味しいラーメンをすすりたい、紹介したいという気持ちで毎日続けておりますので宜しければチャンネル登録よろしくお願いします！生粋のラーメンYouTuber、SUSURUによる「毎日ラーメン健康生活」を追うチャンネル。「毎日ラーメン健康生活」とはラーメン大好きSUSURUが毎日ラーメンを食べても健康でいれることを証明していく生活。現在2000日以上、毎日ラーメンをすすり続けている。日本全国のラーメンをすする為、ラーメン図鑑としてもお使いいただけます。都道府県別再生リストや、二郎系ラーメン、家系ラーメン、といったジャンル別再生リストもございますのでご活用ください！世界のRamenも追っていきたい！！', '202112151425019bfbfcdc7e0dfb36d09e0480d03daa77.png', '202112151425029bfbfcdc7e0dfb36d09e0480d03daa77.png', 0, '2021-12-13 07:15:19'),
(12, 'marumeshi', 'marumeshi@test.test', '$2y$10$QxCYynOI.UlnSA81W4NZSO5di3RIobT3hnMNOdx0qP4XrDfCqNd36', '食べることが大好きな\r\n2人組がお送りします٩( \'ω\' )و٩( \'ω\' )و \r\n\r\nまるめしでは、\r\n日本全国の美味しいご飯を紹介して行きます。\r\n（旅行も大好きなので、いつかは海外のご飯も紹介できたら良いなぁ…と思っています）\r\n\r\nチャンネル登録よろしくお願いします。', '20211215212855c1d936a484a38e76d4df5410eabe5c5e.png', '20211215212856c1d936a484a38e76d4df5410eabe5c5e.png', 0, '2021-12-16 06:13:16'),
(13, 'MAIBARU', 'maibaru@test.test', '$2y$10$k09BDmNb/V8Q8xKwkgxOIuQMCuuhRKvGvt9D4u97ZCUcEiltvh7O2', 'こんにちは、MAIBARUです\r\n\r\nこのチャンネルは私MAIBARUと撮影担当YUUが\r\n気ままに運営するタイ旅行チャンネルです。\r\n人気の観光地から地方の秘境まで、ゆるっと発信中\r\n週末に不定期更新しています\r\n\r\nかなりゆるめのテイストですが、お気に召せば幸いです\r\nチャンネル登録や動画にコメントを頂けるととてもよろこびます', '2021121521355938953b51ebea7a3c5d36f1975ef2828b.png', '2021121521360038953b51ebea7a3c5d36f1975ef2828b.png', 0, '2021-12-16 06:33:41'),
(14, 'FUJIWARA LIFE', 'FUJIWARA_LIFE@test.test', '$2y$10$S5Ye29whS3usupymAQo18elIICJR4ybqfK8J5nZCo4hLu05GBhVoa', NULL, NULL, NULL, 0, '2022-01-16 12:40:07');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
