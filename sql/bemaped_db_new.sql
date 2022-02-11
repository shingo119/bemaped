-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 11 日 08:06
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
-- テーブルの構造 `bemaped_data_table`
--

CREATE TABLE `bemaped_data_table` (
  `id` int(11) NOT NULL,
  `movie_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `movie_url` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` double(17,14) NOT NULL,
  `lon` double(17,14) NOT NULL,
  `ifram` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `ifram2` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `u_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `bemaped_data_table`
--

INSERT INTO `bemaped_data_table` (`id`, `movie_title`, `movie_url`, `tag`, `lat`, `lon`, `ifram`, `ifram2`, `indate`, `u_id`) VALUES
(1, '〔富山グルメ〕魚津の人気ラーメン店の神トッピングは多分コレ', 'https://youtu.be/LXqUuF7sbuM', '#魚津の人気ラーメン店 #神トッピングは #これだ', 36.83277130126953, 137.41815185546875, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/LXqUuF7sbuM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/LXqUuF7sbuM?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-11 16:02:53', 6),
(3, '〔富山グルメ〕ミシュラン獲得のお寿司屋さん！感動の嵐が巻き起こった', 'https://youtu.be/5ejYjl63AfU', '', 36.67717742919922, 137.20721435546875, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/5ejYjl63AfU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/5ejYjl63AfU?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-12 04:30:32', 6),
(4, '〔射水グルメ〕パキスタンカレーを堪能！', 'https://youtu.be/y2tb9ALdmM8', '#富山グルメ #富山カレー #アルバラカ', 36.75175476074219, 137.08551025390625, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/y2tb9ALdmM8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/y2tb9ALdmM8?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-12 04:32:18', 6),
(5, '絶景露天風呂と贅沢バイキング、トドメの高級日本酒飲み放題！', 'https://youtu.be/EwLr8YoyqvM', '#ミシュラン三つ星 #黒部宇奈月温泉 #贅沢三昧', 36.81706237792969, 137.58427429199220, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/EwLr8YoyqvM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/EwLr8YoyqvM?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-12 10:34:30', 6),
(6, '【めちゃうま】麺線整いすぎて見とれてしまう、パーフェクトな一杯をすする 麺笑 巧真【飯テロ】SUSURU TV.第2199回', 'https://youtu.be/cVWxy9DpGTk', '#麺笑巧真 #八王子 #ラーメン', 35.65976715087891, 139.34184265136720, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cVWxy9DpGTk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/cVWxy9DpGTk?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-13 07:16:20', 8),
(8, '【絶対王者】日本一のつけ麺！これをすすらないと今年終われない、とみ田のつけ麺をすする 中華蕎麦 とみ田【飯テロ】', 'https://youtu.be/OZklX7rxlrM', '#中華蕎麦とみ田 #千葉 #ラーメン', 35.78176256864247, 139.90094882761085, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/OZklX7rxlrM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/OZklX7rxlrM?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-13 11:43:00', 8),
(9, '〔富山グルメ〕ミシュラン獲得のお寿司屋さん！感動の嵐が巻き起こった', 'https://youtu.be/5ejYjl63AfU', '', 36.67716456939119, 137.20723237097442, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/5ejYjl63AfU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/5ejYjl63AfU?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-14 17:39:02', 6),
(10, '【じもん】高円寺のソウルフード激辛ラーメンを晋平太とすする じもん【飯テロ】SUSURU TV.第2198回', 'https://youtu.be/NyZXG-cz3lc', '#じもん #晋平太 #ラーメン', 35.70336864469922, 139.64918174514906, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/NyZXG-cz3lc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/NyZXG-cz3lc?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-15 22:35:29', 8),
(11, '【おかわり無料家系】完飲必至の東京代表家系で食べ過ぎてしまいました をすする　武蔵家 中野本店', 'https://youtu.be/jbwM80czi0k', '#武蔵家 #中野 #ラーメン', 35.69766948666345, 139.66902270420900, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jbwM80czi0k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/jbwM80czi0k?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-15 22:37:13', 8),
(12, '【無茶した】カロリー爆弾！超絶ジャンクな二郎系をすする 用心棒本号 東大前【飯テロ】', 'https://youtu.be/dFfMBp6maz8', '#毎日ラーメン生活 #SUSURU_TV #ラーメン', 35.71748467726623, 139.75764575108394, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/dFfMBp6maz8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/dFfMBp6maz8?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-15 22:39:38', 8),
(13, '初日から行列の二郎系ラーメンをすする 蒲田 ラーメン 宮郎【飯テロ】', 'https://youtu.be/4dpTHMDUiiE', '#毎日ラーメン生活 #SUSURU_TV', 35.56187660208226, 139.71250118647970, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/4dpTHMDUiiE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/4dpTHMDUiiE?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-15 22:41:52', 8),
(14, '【超絶濃厚】濃厚すぎてレンゲが立ってしまうほどのドロドロスープの衝撃。をすする 超絶濃厚鶏そば きりすて御麺【飯テロ】', 'https://youtu.be/NUWLwl8g2xo', '#超絶濃厚鶏そばきりすて御麺 #不動前 #ラーメン', 35.62430304739695, 139.71021052627805, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/NUWLwl8g2xo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/NUWLwl8g2xo?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 05:45:51', 8),
(15, '【ラーメン好き必食】恐ろしいほどの老舗町中華で激安ラーメン&半チャーハンをすする 平和軒【飯テロ】', 'https://youtu.be/f9i2Z5CRzFU', '#平和軒 #大崎 #ラーメン', 35.62093467007313, 139.72429891870120, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/f9i2Z5CRzFU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/f9i2Z5CRzFU?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 05:48:36', 8),
(16, '【つけ麺】一粒で二度美味しい。2種類の麺が合い盛りのつけ麺と超極太麺をすする 麺や 麦ゑ紋【飯テロ】', 'https://youtu.be/hQutZTR9EXI', '#麺や麦ゑ紋 #新宿 #ラーメン', 35.69612507605375, 139.69836970596550, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/hQutZTR9EXI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/hQutZTR9EXI?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 05:50:14', 8),
(17, '【神楽坂】絶品グルメ食べ歩き！黒毛和牛贅沢重「翔山亭」&メロン専門店「果房メロンとロマン」&メレンゲ菓子「メルベイユ」&フルーツサンド「ハピマルフルーツ神楽坂」', 'https://youtu.be/cVlkit8NCrs', '#東京グルメ #神楽坂グルメ #神楽坂カフェ', 35.70189684966379, 139.74104778857426, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cVlkit8NCrs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/cVlkit8NCrs?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:15:11', 12),
(18, '【恵比寿】お出汁とネギが激うま！鴨すき鍋「とりなご 恵比寿店」', 'https://youtu.be/4mT4gF9HoPo', '#東京グルメ #恵比寿グルメ #鴨すき', 35.64504137556677, 139.71692892358402, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/4mT4gF9HoPo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/4mT4gF9HoPo?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:17:17', 12),
(19, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', 'https://youtu.be/2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', 35.70957461636522, 139.66652461319208, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/2U1qks82eT4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/2U1qks82eT4?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:19:35', 12),
(20, '【代官山】羽釜で炊いた”おひつめし”が絶品「ごはんや一芯」＆さつまいも天ぷらの塩アイス「Tempura Motoyoshi いも」', 'https://youtu.be/ckpnxsbyRgI', '#東京グルメ #代官山ランチ #ご飯が美味しいお店', 35.64718591948328, 139.70175640673835, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ckpnxsbyRgI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/ckpnxsbyRgI?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:20:59', 12),
(21, '【代々木上原】ロンドン伝統の絶品ミートパイ「dish（ディッシュ）」', 'https://youtu.be/rJVqhSgK2QU', '#東京グルメ #代々木上原カフェ #アップルパイ', 35.66934590120415, 139.68107696783923, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/rJVqhSgK2QU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/rJVqhSgK2QU?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:23:50', 12),
(22, '絶対リピートしちゃう最高の秘島リゾートに週末トリップ｜タイ・クート島', 'https://youtu.be/Gf0R6iX-Nfg', '#タイ旅行 #海外旅行 #Vlog', 11.65194159053314, 102.56874884336600, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/Gf0R6iX-Nfg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/Gf0R6iX-Nfg?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:38:05', 13),
(23, 'まだ誰も知らない…都心近くの森林リゾートを8000円で独り占め！チャリで行くバーンガジャオの旅【タイ・バンコク】บางกะเจ้า Bang krachao', 'https://youtu.be/qWZzkMjNf-o', '#タイ旅行 #バンコク #vlog', 13.66943852466792, 100.56809710646388, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/qWZzkMjNf-o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/qWZzkMjNf-o?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:43:08', 13),
(24, 'タイの超穴場リゾート・マーク島　カヤックでしか辿り着けない奇跡の浜辺が美しすぎた ｜เกาะหมาก Koh Mak', 'https://youtu.be/FVlTOZMPj-s', '#タイ旅行 #マーク島 #KohMak', 11.81925452391637, 102.47903914974842, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/FVlTOZMPj-s\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/FVlTOZMPj-s?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:48:57', 13),
(25, 'バンコク・スクンビットに森の結界ホテル　これは別世界…｜AriyasomVilla（アリヤソムヴィラ）', 'https://youtu.be/5V1noy4WXZI', '#タイ旅行  #バンコク #タイ', 13.74789033257170, 100.55165677614453, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/5V1noy4WXZI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/5V1noy4WXZI?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 06:54:14', 13),
(26, '本当は秘密にしたい…1泊1700円の最強ゲストハウス｜タイ・クート島｜เกาะกูด', 'https://youtu.be/tN7hO9iqu54', '#タイ旅行  #เกาะกูด', 11.59469818411189, 102.56536203319720, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/tN7hO9iqu54\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/tN7hO9iqu54?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-12-16 11:58:41', 13),
(27, '【富山グルメ】一口餃子がウリ！新店のランチがコスパ◎だった', 'https://youtu.be/a5HLZKBJ8L8', '#新店 #餃子とラーメン #大盛りにすればヨカタ', 36.68761259984785, 137.21318120710026, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/a5HLZKBJ8L8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/a5HLZKBJ8L8?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2022-01-16 12:33:17', 6),
(28, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介:1.THE KNOT TOKYO Shinjuku', 'https://youtu.be/ljyx2OPIsKE', '', 35.68860140847194, 139.68846163626503, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ljyx2OPIsKE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 12:43:49', 14),
(29, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 2.vito coffee', 'https://youtu.be/ljyx2OPIsKE', '', 35.69597045725897, 139.69685430280342, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ljyx2OPIsKE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 12:46:05', 14),
(30, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 3.新宿御苑', 'https://youtu.be/ljyx2OPIsKE', '', 35.68668943834047, 139.70815084173412, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ljyx2OPIsKE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 12:54:23', 14),
(31, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 4.Brooklyn Parlor ', 'https://youtu.be/ljyx2OPIsKE', '', 35.69010223056910, 139.70594167220142, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ljyx2OPIsKE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 12:55:52', 14),
(32, '【新宿デートスポット５選】カフェやランチ、ホテルやオススメ場所紹介: 5.BOOK AND BED TOKYO', 'https://youtu.be/ljyx2OPIsKE', '', 35.69542100412398, 139.70058583724045, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/ljyx2OPIsKE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 22:45:26', 14),
(33, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:１IDOL', 'https://youtu.be/cy8HgxntI7k', '', 35.66190615404709, 139.71249674655067, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cy8HgxntI7k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:30:08', 14),
(34, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:２ A to Z cafe', 'https://youtu.be/cy8HgxntI7k', '', 35.66251923296611, 139.71225260592567, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cy8HgxntI7k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:31:40', 14),
(35, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:３ GOKU BURGER ゴク バーガー', 'https://youtu.be/cy8HgxntI7k', '', 35.66691485211211, 139.70822428561320, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cy8HgxntI7k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:33:17', 14),
(36, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:４　café Madu　カフェ・マディ', 'https://youtu.be/cy8HgxntI7k', '', 35.66267018097813, 139.71212600869245, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cy8HgxntI7k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:34:44', 14),
(37, '【表参道オシャレランチ５選】美味しいのに安いお昼/ デートにもオススメ:５　YPSILON　イプシロン ', 'https://youtu.be/cy8HgxntI7k', '', 35.66112795571868, 139.71413564192795, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/cy8HgxntI7k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:36:05', 14),
(38, '【原宿オシャレカフェ５選】 デートにもオススメ:1. dotcom space tokyo', 'https://youtu.be/jg5c5BoS2Fc', '#原宿 ＃原宿カフェ ＃原宿vlog', 35.67180473904188, 139.70343923079517, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:38:35', 14),
(39, '【原宿オシャレカフェ５選】 デートにもオススメ: 2.rag & bone coffee', 'https://youtu.be/jg5c5BoS2Fc', '', 35.66664236779875, 139.70711659895923, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:45:57', 14),
(40, '【原宿オシャレカフェ５選】 デートにもオススメ:番外編.MUUN seoul', 'https://youtu.be/jg5c5BoS2Fc', '', 35.67152409334646, 139.70870351302170, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:48:31', 14),
(41, '【原宿オシャレカフェ５選】 デートにもオススメ:3.natural stance', 'https://youtu.be/jg5c5BoS2Fc', '', 35.66990284700583, 139.70774673623154, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:49:54', 14),
(42, '【原宿オシャレカフェ５選】 デートにもオススメ:4.EATALY HARAJUKU', 'https://youtu.be/jg5c5BoS2Fc', '', 35.67053458160733, 139.70296905840053, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:51:07', 14),
(43, '【原宿オシャレカフェ５選】 デートにもオススメ:5.Cafe Luigi', 'https://youtu.be/jg5c5BoS2Fc', '', 35.66898350496331, 139.70661758584083, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/jg5c5BoS2Fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:52:29', 14),
(44, '【原宿グルメ】超モチモチ！たらこスパゲティ専門店「東京たらこスパゲティ 原宿表参道店」', 'https://youtu.be/uIvNRdpuGJQ', '#2020年7月オープン #たらこパスタ #炙りたらこのお出汁スパゲティ', 35.66734699983360, 139.70579361123150, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/uIvNRdpuGJQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:57:49', 12),
(45, '【渋谷グルメ】旨味あふれる「生ハンバーグ」を初体験！「極味や（きわみや）渋谷パルコ店」', 'https://youtu.be/BHKGceBgvJE', '#東京グルメ #生ハンバーグ #極味や', 35.66226595950544, 139.69917582487160, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/BHKGceBgvJE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-16 23:59:41', 12),
(46, '【吉祥寺】コスパ最強の炭火焼ハンバーグ「挽肉と米」', 'https://youtu.be/EERJdhLTOUI', '#吉祥寺グルメ #炭火焼ハンバーグ #炊き立てご飯', 35.70582585121649, 139.57775711220805, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/EERJdhLTOUI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-17 00:01:04', 12),
(47, '【中野】予約困難！超人気のマグロ専門店「マグロマート」', 'https://youtu.be/2U1qks82eT4', '#中野グルメ #マグロ #マグロマート', 35.70958332802943, 139.66654968378967, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/2U1qks82eT4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-17 00:02:33', 12),
(48, '【渋谷】絶品！フレンチトースト&あんバターサンド「ビストロ ロジウラ(Bistro Rojiura)」', 'https://youtu.be/LoDakRbVqMA', '#渋谷グルメ #渋谷カフェ #東京グルメ', 35.66241637255629, 139.69732951139500, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/LoDakRbVqMA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2022-01-17 00:04:53', 12),
(49, 'カレーうどんと言えば吉宗！高岡の人気店', 'https://youtu.be/Nr10-DUx4Rw', '#富山グルメ #高岡グルメ #吉宗', 36.75643461723699, 137.02694768659248, '<iframe width=\"800\" height=\"450\" src=\"https://www.youtube.com/embed/Nr10-DUx4Rw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://www.youtube.com/embed/Nr10-DUx4Rw?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2022-01-26 12:04:05', 6),
(51, 'test', 'https://youtu.be/6MOVRp8Fx6s', '#test', 35.74900283107591, 139.59582119093093, '<iframe width=\"560\" height=\"315\" src=\"https://youtu.be/6MOVRp8Fx6s\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe width=\"300\" height=\"170\" src=\"https://youtu.be/6MOVRp8Fx6s?autoplay=1&mute=1&loop=1&fs=0&modestbranding=1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2022-02-11 17:04:01', 1);

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
(1, 'horagarasu', 'test@test.test', '$2y$10$7cH7lix18Eyy5mzDUZ5JEetmRUdWVGcsUiUs9AK2HYbRF6OhBqOlu', 'TESTでホラガラスのアカウント作ってみました', '2022012502554729ab65a843d74d23faf3c1755ce800ef.png', '2022012502554829ab65a843d74d23faf3c1755ce800ef.png', 0, '2021-12-03 19:41:28'),
(2, 'yano', 'test@test.te', '$2y$10$pKRK0iDh8W.Vwz3oP8zznuV8O6VLZnJqLIYxB8vH/LCjzd1xcEAlS', '裏垢です。', '', '', 0, '2021-12-10 09:22:24'),
(5, '矢野慎吾', 'test@test', '$2y$10$NW9/NMzJkhLyMwGL.4JJtuMzJ37igVDhmK0hBOsZQoDIMWkSSnu82', 'どうも、矢野慎吾です！bemapedというサービスを作ったのは私です！', '20211215215622227bc05e6bab2ed0ed5a154bc9df8668.JPG', '20211215215623227bc05e6bab2ed0ed5a154bc9df8668.jpg', 0, '2021-12-10 09:35:52'),
(6, 'みーもぐ', 'mi-mogu@test.test', '$2y$10$Gju0K8opplwweFbNweLhKOrl5fMq1EE9A5/sKrrhbawJy7Y8NFSMq', '富山のグルメやスポットを紹介している【みーもぐ】と申します。\r\nインスタフォロワー2.8万人突破！\r\n富山の飲食店に行きまくっております。\r\n\r\n生まれ育った富山の美味しい・楽しいを一人でも多くの方に届けられるよう\r\n動画を配信していきたいと思っています♪\r\n\r\nチャンネル登録やコメント、大変励みになります…\r\nぜひよろしくお願いします＾＾', '20211215125415c01d2e0b12939bbc12d024e5332cca00.png', '20211215125416c01d2e0b12939bbc12d024e5332cca00.png', 0, '2021-12-12 14:06:31'),
(7, 'ヒカキン', 'hikakin@test.test', '$2y$10$A4H8IXeyqJJOD.xIWRA17OkzzYIn2uXcdvjIFXDG61YpkyWI.28BG', 'HikakinTVはヒカキンが日常の面白いものを紹介するチャンネルです。\r\n◆プロフィール◆\r\nYouTubeにてHIKAKIN、HikakinTV、HikakinGames、HikakinBlogと\r\n４つのチャンネルを運営し、動画の総アクセス数は100億回を突破、\r\nチャンネル登録者数は計1800万人以上、YouTubeタレント事務所uuum株式会社ファウンダー兼最高顧問。', '20211215151031d991844998f550e6ea3dddc3dd26e53c.png', '20211215151032d991844998f550e6ea3dddc3dd26e53c.png', 0, '2021-12-13 07:13:26'),
(8, 'susuruTV', 'susuru@test.test', '$2y$10$IxHHRG5hwNYFogHnqpthVuyyFkuVdleeF9jVxThOnb5.NumdsZ16e', 'ずるずる、どうもSUSURUです！「毎日ラーメン健康生活」をテーマに、ラーメンをすする動画を毎日18:30に配信しています。日々ラーメンをすすり続け、現在2000日以上連続配信中です！全国の美味しいラーメンをすすりたい、紹介したいという気持ちで毎日続けておりますので宜しければチャンネル登録よろしくお願いします！生粋のラーメンYouTuber、SUSURUによる「毎日ラーメン健康生活」を追うチャンネル。「毎日ラーメン健康生活」とはラーメン大好きSUSURUが毎日ラーメンを食べても健康でいれることを証明していく生活。現在2000日以上、毎日ラーメンをすすり続けている。日本全国のラーメンをすする為、ラーメン図鑑としてもお使いいただけます。都道府県別再生リストや、二郎系ラーメン、家系ラーメン、といったジャンル別再生リストもございますのでご活用ください！世界のRamenも追っていきたい！！', '202112151425019bfbfcdc7e0dfb36d09e0480d03daa77.png', '202112151425029bfbfcdc7e0dfb36d09e0480d03daa77.png', 0, '2021-12-13 07:15:19'),
(12, 'marumeshi', 'marumeshi@test.test', '$2y$10$QxCYynOI.UlnSA81W4NZSO5di3RIobT3hnMNOdx0qP4XrDfCqNd36', '食べることが大好きな\r\n2人組がお送りします٩( \'ω\' )و٩( \'ω\' )و \r\n\r\nまるめしでは、\r\n日本全国の美味しいご飯を紹介して行きます。\r\n（旅行も大好きなので、いつかは海外のご飯も紹介できたら良いなぁ…と思っています）\r\n\r\nチャンネル登録よろしくお願いします。', '20211215212855c1d936a484a38e76d4df5410eabe5c5e.png', '20211215212856c1d936a484a38e76d4df5410eabe5c5e.png', 0, '2021-12-16 06:13:16'),
(13, 'MAIBARU', 'maibaru@test.test', '$2y$10$k09BDmNb/V8Q8xKwkgxOIuQMCuuhRKvGvt9D4u97ZCUcEiltvh7O2', 'こんにちは、MAIBARUです\r\n\r\nこのチャンネルは私MAIBARUと撮影担当YUUが\r\n気ままに運営するタイ旅行チャンネルです。\r\n人気の観光地から地方の秘境まで、ゆるっと発信中\r\n週末に不定期更新しています\r\n\r\nかなりゆるめのテイストですが、お気に召せば幸いです\r\nチャンネル登録や動画にコメントを頂けるととてもよろこびます', '2021121521355938953b51ebea7a3c5d36f1975ef2828b.png', '2021121521360038953b51ebea7a3c5d36f1975ef2828b.png', 0, '2021-12-16 06:33:41');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bemaped_data_table`
--
ALTER TABLE `bemaped_data_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bemaped_data_table`
--
ALTER TABLE `bemaped_data_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- テーブルの AUTO_INCREMENT `bemaped_follow_table`
--
ALTER TABLE `bemaped_follow_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `bemaped_users_table`
--
ALTER TABLE `bemaped_users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
