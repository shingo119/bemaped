-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 13, 2022 at 07:21 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemaped_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bemaped_data_table`
--

CREATE TABLE `bemaped_data_table` (
  `id` int(11) NOT NULL,
  `movie_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `video_id` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` double(17,14) NOT NULL,
  `lon` double(17,14) NOT NULL,
  `indate` datetime NOT NULL,
  `u_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bemaped_data_table`
--

INSERT INTO `bemaped_data_table` (`id`, `movie_title`, `video_id`, `tag`, `lat`, `lon`, `indate`, `u_id`) VALUES
(1, '〔富山グルメ〕魚津の人気ラーメン店の神トッピングは多分コレ', 'LXqUuF7sbuM', '#魚津の人気ラーメン店 #神トッピングは #これだ', 36.83277130126953, 137.41815185546875, '2021-12-11 16:02:53', 6),
(3, '〔富山グルメ〕ミシュラン獲得のお寿司屋さん！感動の嵐が巻き起こった', '5ejYjl63AfU', '', 36.67717742919922, 137.20721435546875, '2021-12-12 04:30:32', 6),
(4, '〔射水グルメ〕パキスタンカレーを堪能！', 'y2tb9ALdmM8', '#富山グルメ #富山カレー #アルバラカ', 36.75175476074219, 137.08551025390625, '2021-12-12 04:32:18', 6),
(5, '絶景露天風呂と贅沢バイキング、トドメの高級日本酒飲み放題！', 'EwLr8YoyqvM', '#ミシュラン三つ星 #黒部宇奈月温泉 #贅沢三昧', 36.81706237792969, 137.58427429199220, '2021-12-12 10:34:30', 6),
(6, '【めちゃうま】麺線整いすぎて見とれてしまう、パーフェクトな一杯をすする 麺笑 巧真【飯テロ】SUSURU TV.第2199回', 'cVWxy9DpGTk', '#麺笑巧真 #八王子 #ラーメン', 35.65976715087891, 139.34184265136720, '2021-12-13 07:16:20', 8),
(8, '【絶対王者】日本一のつけ麺！これをすすらないと今年終われない、とみ田のつけ麺をすする 中華蕎麦 とみ田【飯テロ】', 'OZklX7rxlrM', '#中華蕎麦とみ田 #千葉 #ラーメン', 35.78176256864247, 139.90094882761085, '2021-12-13 11:43:00', 8),
(9, '〔富山グルメ〕ミシュラン獲得のお寿司屋さん！感動の嵐が巻き起こった', '5ejYjl63AfU', '', 36.67716456939119, 137.20723237097442, '2021-12-14 17:39:02', 6),
(10, '【じもん】高円寺のソウルフード激辛ラーメンを晋平太とすする じもん【飯テロ】SUSURU TV.第2198回', 'NyZXG-cz3lc', '#じもん #晋平太 #ラーメン', 35.70336864469922, 139.64918174514906, '2021-12-15 22:35:29', 8),
(11, '【おかわり無料家系】完飲必至の東京代表家系で食べ過ぎてしまいました をすする　武蔵家 中野本店', 'jbwM80czi0k', '#武蔵家 #中野 #ラーメン', 35.69766948666345, 139.66902270420900, '2021-12-15 22:37:13', 8),
(12, '【無茶した】カロリー爆弾！超絶ジャンクな二郎系をすする 用心棒本号 東大前【飯テロ】', 'dFfMBp6maz8', '#毎日ラーメン生活 #SUSURU_TV #ラーメン', 35.71748467726623, 139.75764575108394, '2021-12-15 22:39:38', 8),
(13, '初日から行列の二郎系ラーメンをすする 蒲田 ラーメン 宮郎【飯テロ】', '4dpTHMDUiiE', '#毎日ラーメン生活 #SUSURU_TV', 35.56187660208226, 139.71250118647970, '2021-12-15 22:41:52', 8),
(14, '【超絶濃厚】濃厚すぎてレンゲが立ってしまうほどのドロドロスープの衝撃。をすする 超絶濃厚鶏そば きりすて御麺【飯テロ】', 'NUWLwl8g2xo', '#超絶濃厚鶏そばきりすて御麺 #不動前 #ラーメン', 35.62430304739695, 139.71021052627805, '2021-12-16 05:45:51', 8),
(15, '【ラーメン好き必食】恐ろしいほどの老舗町中華で激安ラーメン&半チャーハンをすする 平和軒【飯テロ】', 'f9i2Z5CRzFU', '#平和軒 #大崎 #ラーメン', 35.62093467007313, 139.72429891870120, '2021-12-16 05:48:36', 8),
(16, '【つけ麺】一粒で二度美味しい。2種類の麺が合い盛りのつけ麺と超極太麺をすする 麺や 麦ゑ紋【飯テロ】', 'hQutZTR9EXI', '#麺や麦ゑ紋 #新宿 #ラーメン', 35.69612507605375, 139.69836970596550, '2021-12-16 05:50:14', 8),
(17, '【神楽坂】絶品グルメ食べ歩き！黒毛和牛贅沢重「翔山亭」&メロン専門店「果房メロンとロマン」&メレンゲ菓子「メルベイユ」&フルーツサンド「ハピマルフルーツ神楽坂」', 'cVlkit8NCrs', '#東京グルメ #神楽坂グルメ #神楽坂カフェ', 35.70189684966379, 139.74104778857426, '2021-12-16 06:15:11', 12),
(18, '【恵比寿】お出汁とネギが激うま！鴨すき鍋「とりなご 恵比寿店」', '4mT4gF9HoPo', '#東京グルメ #恵比寿グルメ #鴨すき', 35.64504137556677, 139.71692892358402, '2021-12-16 06:17:17', 12),
(19, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', '2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', 35.70957461636522, 139.66652461319208, '2021-12-16 06:19:35', 12),
(20, '【代官山】羽釜で炊いた”おひつめし”が絶品「ごはんや一芯」＆さつまいも天ぷらの塩アイス「Tempura Motoyoshi いも」', 'ckpnxsbyRgI', '#東京グルメ #代官山ランチ #ご飯が美味しいお店', 35.64718591948328, 139.70175640673835, '2021-12-16 06:20:59', 12),
(21, '【代々木上原】ロンドン伝統の絶品ミートパイ「dish（ディッシュ）」', 'rJVqhSgK2QU', '#東京グルメ #代々木上原カフェ #アップルパイ', 35.66934590120415, 139.68107696783923, '2021-12-16 06:23:50', 12),
(22, '絶対リピートしちゃう最高の秘島リゾートに週末トリップ｜タイ・クート島', 'Gf0R6iX-Nfg', '#タイ旅行 #海外旅行 #Vlog', 11.65194159053314, 102.56874884336600, '2021-12-16 06:38:05', 13),
(23, 'まだ誰も知らない…都心近くの森林リゾートを8000円で独り占め！チャリで行くバーンガジャオの旅【タイ・バンコク】บางกะเจ้า Bang krachao', 'qWZzkMjNf-o', '#タイ旅行 #バンコク #vlog', 13.66943852466792, 100.56809710646388, '2021-12-16 06:43:08', 13),
(24, 'タイの超穴場リゾート・マーク島　カヤックでしか辿り着けない奇跡の浜辺が美しすぎた ｜เกาะหมาก Koh Mak', 'FVlTOZMPj-s', '#タイ旅行 #マーク島 #KohMak', 11.81925452391637, 102.47903914974842, '2021-12-16 06:48:57', 13),
(25, 'バンコク・スクンビットに森の結界ホテル　これは別世界…｜AriyasomVilla（アリヤソムヴィラ）', '5V1noy4WXZI', '#タイ旅行  #バンコク #タイ', 13.74789033257170, 100.55165677614453, '2021-12-16 06:54:14', 13),
(26, '本当は秘密にしたい…1泊1700円の最強ゲストハウス｜タイ・クート島｜เกาะกูด', 'tN7hO9iqu54', '#タイ旅行  #เกาะกูด', 11.59469818411189, 102.56536203319720, '2021-12-16 11:58:41', 13),
(27, '【富山グルメ】一口餃子がウリ！新店のランチがコスパ◎だった', 'a5HLZKBJ8L8', '#新店 #餃子とラーメン #大盛りにすればヨカタ', 36.68761259984785, 137.21318120710026, '2022-01-16 12:33:17', 6),
(28, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介:1.THE KNOT TOKYO Shinjuku', 'ljyx2OPIsKE', '', 35.68860140847194, 139.68846163626503, '2022-01-16 12:43:49', 14),
(29, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 2.vito coffee', 'ljyx2OPIsKE', '', 35.69597045725897, 139.69685430280342, '2022-01-16 12:46:05', 14),
(30, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 3.新宿御苑', 'ljyx2OPIsKE', '', 35.68668943834047, 139.70815084173412, '2022-01-16 12:54:23', 14),
(31, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 4.Brooklyn Parlor ', 'ljyx2OPIsKE', '', 35.69010223056910, 139.70594167220142, '2022-01-16 12:55:52', 14),
(32, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 5.BOOK AND BED TOKYO', 'ljyx2OPIsKE', '', 35.69542100412398, 139.70058583724045, '2022-01-16 22:45:26', 14),
(33, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:１IDOL', 'cy8HgxntI7k', '', 35.66190615404709, 139.71249674655067, '2022-01-16 23:30:08', 14),
(34, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:２ A to Z cafe', 'cy8HgxntI7k', '', 35.66251923296611, 139.71225260592567, '2022-01-16 23:31:40', 14),
(35, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:３ GOKU BURGER ゴク バーガー', 'cy8HgxntI7k', '', 35.66691485211211, 139.70822428561320, '2022-01-16 23:33:17', 14),
(36, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:４　café Madu　カフェ・マディ', 'cy8HgxntI7k', '', 35.66267018097813, 139.71212600869245, '2022-01-16 23:34:44', 14),
(37, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:５　YPSILON　イプシロン ', 'cy8HgxntI7k', '', 35.66112795571868, 139.71413564192795, '2022-01-16 23:36:05', 14),
(38, '【原宿オシャレカフェ５選】 デートにもオススメ:1. dotcom space tokyo', 'jg5c5BoS2Fc', '#原宿 ＃原宿カフェ ＃原宿vlog', 35.67180473904188, 139.70343923079517, '2022-01-16 23:38:35', 14),
(39, '【原宿オシャレカフェ５選】 デートにもオススメ: 2.rag & bone coffee', 'jg5c5BoS2Fc', '', 35.66664236779875, 139.70711659895923, '2022-01-16 23:45:57', 14),
(40, '【原宿オシャレカフェ５選】 デートにもオススメ:番外編.MUUN seoul', 'jg5c5BoS2Fc', '', 35.67152409334646, 139.70870351302170, '2022-01-16 23:48:31', 14),
(41, '【原宿オシャレカフェ５選】 デートにもオススメ:3.natural stance', 'jg5c5BoS2Fc', '', 35.66990284700583, 139.70774673623154, '2022-01-16 23:49:54', 14),
(42, '【原宿オシャレカフェ５選】 デートにもオススメ:4.EATALY HARAJUKU', 'jg5c5BoS2Fc', '', 35.67053458160733, 139.70296905840053, '2022-01-16 23:51:07', 14),
(43, '【原宿オシャレカフェ５選】 デートにもオススメ:5.Cafe Luigi', 'jg5c5BoS2Fc', '', 35.66898350496331, 139.70661758584083, '2022-01-16 23:52:29', 14),
(44, '【原宿グルメ】超モチモチ！たらこスパゲティ専門店「東京たらこスパゲティ 原宿表参道店」', 'uIvNRdpuGJQ', '#2020年7月オープン #たらこパスタ #炙りたらこのお出汁スパゲティ', 35.66734699983360, 139.70579361123150, '2022-01-16 23:57:49', 12),
(45, '【渋谷グルメ】旨味あふれる「生ハンバーグ」を初体験！「極味や（きわみや）渋谷パルコ店」', 'BHKGceBgvJE', '#東京グルメ #生ハンバーグ #極味や', 35.66226595950544, 139.69917582487160, '2022-01-16 23:59:41', 12),
(46, '【吉祥寺】コスパ最強の炭火焼ハンバーグ「挽肉と米」', 'EERJdhLTOUI', '#吉祥寺グルメ #炭火焼ハンバーグ #炊き立てご飯', 35.70582585121649, 139.57775711220805, '2022-01-17 00:01:04', 12),
(47, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', '2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', 35.70958332802943, 139.66654968378967, '2022-01-17 00:02:33', 12),
(48, '【渋谷】絶品！フレンチトースト&あんバターサンド「ビストロ ロジウラ(Bistro Rojiura)」', 'LoDakRbVqMA', '#渋谷グルメ #渋谷カフェ #東京グルメ', 35.66241637255629, 139.69732951139500, '2022-01-17 00:04:53', 12),
(49, 'カレーうどんと言えば吉宗！高岡の人気店', 'Nr10-DUx4Rw', '#富山グルメ #高岡グルメ #吉宗', 36.75643461723699, 137.02694768659248, '2022-01-26 12:04:05', 6),
(51, 'test', '6MOVRp8Fx6s', '#test', 35.74900283107591, 139.59582119093093, '2022-02-11 17:04:01', 1),
(57, '【最強富士丸系】この一杯中毒！受け継がれた名店の魂に感動', '646ln0zCB4g', '#ラーメン #No11', 35.74497348987640, 139.70789916408458, '2022-02-13 16:19:19', 15);

-- --------------------------------------------------------

--
-- Table structure for table `bemaped_follow_table`
--

CREATE TABLE `bemaped_follow_table` (
  `id` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `be_followed` int(11) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bemaped_follow_table`
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

-- --------------------------------------------------------

--
-- Table structure for table `bemaped_users_table`
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
-- Dumping data for table `bemaped_users_table`
--

INSERT INTO `bemaped_users_table` (`id`, `u_name`, `u_email`, `u_pw`, `explan`, `icon`, `back_ground`, `life_flg`, `indate`) VALUES
(1, 'horagarasu', 'test@test.test', '$2y$10$7cH7lix18Eyy5mzDUZ5JEetmRUdWVGcsUiUs9AK2HYbRF6OhBqOlu', 'TESTでホラガラスのアカウント作ってみました', '2022012502554729ab65a843d74d23faf3c1755ce800ef.png', '2022012502554829ab65a843d74d23faf3c1755ce800ef.png', 0, '2021-12-03 19:41:28'),
(2, 'yano', 'test@test.te', '$2y$10$pKRK0iDh8W.Vwz3oP8zznuV8O6VLZnJqLIYxB8vH/LCjzd1xcEAlS', '裏垢です。', '', '', 0, '2021-12-10 09:22:24'),
(5, '矢野慎吾', 'test@test', '$2y$10$NW9/NMzJkhLyMwGL.4JJtuMzJ37igVDhmK0hBOsZQoDIMWkSSnu82', 'どうも、矢野慎吾です！bemapedというサービスを作ったのは私です！', '20211215215622227bc05e6bab2ed0ed5a154bc9df8668.JPG', '20211215215623227bc05e6bab2ed0ed5a154bc9df8668.jpg', 0, '2021-12-10 09:35:52'),
(6, 'みーもぐ', 'mi-mogu@test.test', '$2y$10$Gju0K8opplwweFbNweLhKOrl5fMq1EE9A5/sKrrhbawJy7Y8NFSMq', '富山のグルメやスポットを紹介している【みーもぐ】と申します。\r\nインスタフォロワー2.8万人突破！\r\n富山の飲食店に行きまくっております。\r\n\r\n生まれ育った富山の美味しい・楽しいを一人でも多くの方に届けられるよう\r\n動画を配信していきたいと思っています♪\r\n\r\nチャンネル登録やコメント、大変励みになります…\r\nぜひよろしくお願いします＾＾', '20211215125415c01d2e0b12939bbc12d024e5332cca00.png', '20211215125416c01d2e0b12939bbc12d024e5332cca00.png', 0, '2021-12-12 14:06:31'),
(7, 'ヒカキン', 'hikakin@test.test', '$2y$10$A4H8IXeyqJJOD.xIWRA17OkzzYIn2uXcdvjIFXDG61YpkyWI.28BG', 'HikakinTVはヒカキンが日常の面白いものを紹介するチャンネルです。\r\n◆プロフィール◆\r\nYouTubeにてHIKAKIN、HikakinTV、HikakinGames、HikakinBlogと\r\n４つのチャンネルを運営し、動画の総アクセス数は100億回を突破、\r\nチャンネル登録者数は計1800万人以上、YouTubeタレント事務所uuum株式会社ファウンダー兼最高顧問。', '20211215151031d991844998f550e6ea3dddc3dd26e53c.png', '20211215151032d991844998f550e6ea3dddc3dd26e53c.png', 0, '2021-12-13 07:13:26'),
(8, 'susuruTV', 'susuru@test.test', '$2y$10$IxHHRG5hwNYFogHnqpthVuyyFkuVdleeF9jVxThOnb5.NumdsZ16e', 'ずるずる、どうもSUSURUです！「毎日ラーメン健康生活」をテーマに、ラーメンをすする動画を毎日18:30に配信しています。日々ラーメンをすすり続け、現在2000日以上連続配信中です！全国の美味しいラーメンをすすりたい、紹介したいという気持ちで毎日続けておりますので宜しければチャンネル登録よろしくお願いします！生粋のラーメンYouTuber、SUSURUによる「毎日ラーメン健康生活」を追うチャンネル。「毎日ラーメン健康生活」とはラーメン大好きSUSURUが毎日ラーメンを食べても健康でいれることを証明していく生活。現在2000日以上、毎日ラーメンをすすり続けている。日本全国のラーメンをすする為、ラーメン図鑑としてもお使いいただけます。都道府県別再生リストや、二郎系ラーメン、家系ラーメン、といったジャンル別再生リストもございますのでご活用ください！世界のRamenも追っていきたい！！', '202112151425019bfbfcdc7e0dfb36d09e0480d03daa77.png', '202112151425029bfbfcdc7e0dfb36d09e0480d03daa77.png', 0, '2021-12-13 07:15:19'),
(12, 'marumeshi', 'marumeshi@test.test', '$2y$10$QxCYynOI.UlnSA81W4NZSO5di3RIobT3hnMNOdx0qP4XrDfCqNd36', '食べることが大好きな\r\n2人組がお送りします٩( \'ω\' )و٩( \'ω\' )و \r\n\r\nまるめしでは、\r\n日本全国の美味しいご飯を紹介して行きます。\r\n（旅行も大好きなので、いつかは海外のご飯も紹介できたら良いなぁ…と思っています）\r\n\r\nチャンネル登録よろしくお願いします。', '20211215212855c1d936a484a38e76d4df5410eabe5c5e.png', '20211215212856c1d936a484a38e76d4df5410eabe5c5e.png', 0, '2021-12-16 06:13:16'),
(13, 'MAIBARU', 'maibaru@test.test', '$2y$10$k09BDmNb/V8Q8xKwkgxOIuQMCuuhRKvGvt9D4u97ZCUcEiltvh7O2', 'こんにちは、MAIBARUです\r\n\r\nこのチャンネルは私MAIBARUと撮影担当YUUが\r\n気ままに運営するタイ旅行チャンネルです。\r\n人気の観光地から地方の秘境まで、ゆるっと発信中\r\n週末に不定期更新しています\r\n\r\nかなりゆるめのテイストですが、お気に召せば幸いです\r\nチャンネル登録や動画にコメントを頂けるととてもよろこびます', '2021121521355938953b51ebea7a3c5d36f1975ef2828b.png', '2021121521360038953b51ebea7a3c5d36f1975ef2828b.png', 0, '2021-12-16 06:33:41'),
(15, 'kato', 'katonyonko@yahoo.co.jp', '$2y$10$0eq3IOsepV2eGzIashxR1u29brhmTtaBcCZE2C8fCBvhCQrCxwUmq', NULL, NULL, NULL, 0, '2022-02-13 16:14:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bemaped_data_table`
--
ALTER TABLE `bemaped_data_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bemaped_data_table`
--
ALTER TABLE `bemaped_data_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
