/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP3
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : core

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 08/11/2019 23:16:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fake_table
-- ----------------------------
DROP TABLE IF EXISTS `fake_table`;
CREATE TABLE `fake_table`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of fake_table
-- ----------------------------
INSERT INTO `fake_table` VALUES (1, 'Icha Farida', 'rfujiati@gmail.co.id', 'Ki. Yap Tjwan Bing No. 552, Prabumulih 76532, BaBel', '(+62) 889 5065 9044', '2018-11-15 01:17:37', '2019-07-16 13:53:27');
INSERT INTO `fake_table` VALUES (2, 'Laila Yuniar', 'laksmiwati.titi@yahoo.co.id', 'Gg. Kalimantan No. 758, Madiun 87583, Gorontalo', '(+62) 567 4167 0028', '2019-08-24 17:39:37', '2019-07-03 21:28:25');
INSERT INTO `fake_table` VALUES (3, 'Eka Wastuti', 'mdamanik@yahoo.com', 'Kpg. B.Agam Dlm No. 397, Sukabumi 71897, SulSel', '0356 6199 941', '2019-06-18 03:20:42', '2019-07-07 02:24:08');
INSERT INTO `fake_table` VALUES (4, 'Almira Palastri S.Gz', 'nsiregar@yahoo.co.id', 'Kpg. Jagakarsa No. 410, Tarakan 89083, DIY', '025 3522 3157', '2019-04-10 04:28:50', '2018-10-05 10:55:21');
INSERT INTO `fake_table` VALUES (5, 'Warsita Irfan Maulana S.H.', 'kasusra.mandala@yulianti.biz', 'Jln. Imam Bonjol No. 879, Sibolga 29403, Bali', '(+62) 23 1913 6638', '2018-10-06 10:26:26', '2019-09-17 02:30:52');
INSERT INTO `fake_table` VALUES (6, 'Laras Mardhiyah', 'laksana.suryatmi@mangunsong.ac.id', 'Jln. Bakau Griya Utama No. 682, Administrasi Jakarta Selatan 37540, SulSel', '0880 2543 2754', '2019-08-22 00:16:08', '2019-08-07 01:51:49');
INSERT INTO `fake_table` VALUES (7, 'Kunthara Sitorus', 'maimunah23@marpaung.sch.id', 'Psr. Sumpah Pemuda No. 272, Balikpapan 45748, Aceh', '(+62) 338 8886 820', '2019-07-21 21:56:57', '2019-05-23 13:44:53');
INSERT INTO `fake_table` VALUES (8, 'Yance Nuraini', 'icha.permadi@simanjuntak.desa.id', 'Kpg. Bahagia No. 574, Tomohon 69690, NTB', '(+62) 851 717 139', '2019-05-12 03:20:19', '2019-03-07 21:30:47');
INSERT INTO `fake_table` VALUES (9, 'Kayla Wulandari', 'wlailasari@wibisono.biz', 'Gg. Baabur Royan No. 350, Bima 40531, MalUt', '0302 1358 0107', '2019-02-13 20:49:43', '2018-11-19 04:01:12');
INSERT INTO `fake_table` VALUES (10, 'Ajimin Situmorang M.Ak', 'lalita80@suartini.net', 'Kpg. Gatot Subroto No. 342, Balikpapan 61910, JaTeng', '0812 6572 2065', '2018-12-06 04:37:07', '2019-05-05 01:36:36');
INSERT INTO `fake_table` VALUES (11, 'Chelsea Hartati', 'sprasetya@prastuti.go.id', 'Jln. Baladewa No. 821, Padang 42483, KepR', '(+62) 298 4325 419', '2018-11-21 14:40:08', '2018-12-28 01:06:56');
INSERT INTO `fake_table` VALUES (12, 'Gandi Marpaung', 'widiastuti.wahyu@gmail.com', 'Dk. Yos Sudarso No. 885, Bandung 13397, Bali', '0259 8800 9913', '2018-10-20 09:56:48', '2019-04-13 05:46:06');
INSERT INTO `fake_table` VALUES (13, 'Nasim Enteng Anggriawan S.Farm', 'galur29@narpati.go.id', 'Psr. Salak No. 909, Tegal 36102, Gorontalo', '0679 1999 5306', '2019-04-14 21:03:22', '2018-12-14 03:05:44');
INSERT INTO `fake_table` VALUES (14, 'Hesti Rahayu', 'asirwanda.puspita@mahendra.tv', 'Jr. Bacang No. 482, Payakumbuh 63013, Gorontalo', '(+62) 845 2025 5533', '2019-02-13 22:25:04', '2019-08-10 23:15:37');
INSERT INTO `fake_table` VALUES (15, 'Kiandra Melani S.E.I', 'hasna70@gmail.com', 'Psr. Laswi No. 592, Bengkulu 92800, SulTeng', '(+62) 518 1764 754', '2019-01-11 23:44:34', '2019-02-12 09:29:48');
INSERT INTO `fake_table` VALUES (16, 'Usyi Lestari', 'ramadan.queen@gmail.com', 'Ki. Suniaraja No. 451, Pekalongan 71327, JaTeng', '(+62) 817 9553 8998', '2019-08-27 22:50:49', '2019-03-11 20:56:48');
INSERT INTO `fake_table` VALUES (17, 'Azalea Winarsih', 'smayasari@prasetya.sch.id', 'Psr. Bak Mandi No. 678, Cirebon 78475, DKI', '(+62) 23 6463 906', '2019-07-02 18:13:00', '2019-08-17 00:40:28');
INSERT INTO `fake_table` VALUES (18, 'Mila Haryanti', 'karimah62@yahoo.co.id', 'Dk. Dipatiukur No. 486, Bukittinggi 92849, NTT', '0836 1291 373', '2019-03-03 02:09:34', '2019-08-23 08:39:16');
INSERT INTO `fake_table` VALUES (19, 'Maya Halima Suryatmi M.Kom.', 'raina.suryono@puspita.go.id', 'Ds. Nakula No. 741, Parepare 98295, KalTeng', '0370 3783 192', '2019-06-02 23:37:34', '2019-07-25 10:44:04');
INSERT INTO `fake_table` VALUES (20, 'Raden Hidayanto', 'cawisono50@sihombing.mil.id', 'Jr. Daan No. 697, Bima 81225, Banten', '0319 3492 071', '2019-09-14 13:31:43', '2018-09-30 19:31:44');
INSERT INTO `fake_table` VALUES (21, 'Vino Gandi Winarno M.Pd', 'cindy86@sirait.or.id', 'Jln. Karel S. Tubun No. 807, Yogyakarta 34236, KepR', '(+62) 425 4136 3619', '2018-11-19 17:39:56', '2019-07-19 11:53:14');
INSERT INTO `fake_table` VALUES (22, 'Harsana Raharja Nababan S.E.', 'nasab.suryono@gmail.co.id', 'Psr. Yogyakarta No. 286, Prabumulih 57233, SulTeng', '0543 8924 6671', '2019-05-20 05:57:15', '2019-09-02 12:36:50');
INSERT INTO `fake_table` VALUES (23, 'Mulyanto Sitompul M.Ak', 'cornelia.hutagalung@gmail.com', 'Gg. Antapani Lama No. 914, Subulussalam 98576, DKI', '(+62) 717 0028 468', '2019-07-05 06:35:30', '2019-07-11 12:51:05');
INSERT INTO `fake_table` VALUES (24, 'Lala Raisa Rahmawati', 'ade.andriani@nurdiyanti.sch.id', 'Psr. Bagonwoto  No. 307, Kupang 36811, SulTra', '0896 5223 302', '2018-11-11 22:29:13', '2019-02-23 07:20:15');
INSERT INTO `fake_table` VALUES (25, 'Yance Siska Safitri S.Gz', 'juli.andriani@habibi.in', 'Psr. Uluwatu No. 917, Payakumbuh 62852, DIY', '(+62) 884 397 922', '2019-09-11 16:33:53', '2019-06-25 10:22:07');
INSERT INTO `fake_table` VALUES (26, 'Prayogo Nasrullah Kusumo S.I.Kom', 'eka46@nuraini.org', 'Psr. Warga No. 420, Kediri 54346, SumBar', '(+62) 523 7692 7587', '2019-09-17 00:03:33', '2019-01-19 04:18:31');
INSERT INTO `fake_table` VALUES (27, 'Gawati Novi Riyanti', 'pwibowo@situmorang.com', 'Jr. R.E. Martadinata No. 753, Kendari 90950, Jambi', '(+62) 27 7049 8180', '2019-07-21 10:13:28', '2018-10-04 09:11:34');
INSERT INTO `fake_table` VALUES (28, 'Utama Paiman Salahudin', 'rahmawati.daliono@susanti.in', 'Gg. Bappenas No. 19, Administrasi Jakarta Utara 88528, Maluku', '0256 8632 223', '2019-03-30 07:33:53', '2019-06-05 22:09:26');
INSERT INTO `fake_table` VALUES (29, 'Syahrini Irma Purnawati', 'estiono.lailasari@rahayu.web.id', 'Kpg. Bahagia No. 680, Batam 78023, SumSel', '(+62) 833 2829 077', '2019-01-15 23:19:14', '2018-10-03 22:49:35');
INSERT INTO `fake_table` VALUES (30, 'Heru Santoso', 'latika47@maryadi.or.id', 'Psr. Ekonomi No. 844, Surabaya 91356, SulSel', '0433 8691 0752', '2019-06-03 09:04:15', '2019-03-03 10:11:48');
INSERT INTO `fake_table` VALUES (31, 'Talia Uyainah', 'purwanti.gading@yolanda.co.id', 'Dk. Basoka Raya No. 491, Tegal 48827, Aceh', '0752 3221 972', '2019-03-16 19:05:37', '2019-07-01 16:27:45');
INSERT INTO `fake_table` VALUES (32, 'Melinda Hartati', 'budiman.victoria@laksmiwati.biz.id', 'Ds. Bara Tambar No. 271, Dumai 45045, JaTim', '(+62) 760 5956 442', '2019-09-09 03:53:52', '2019-04-16 18:31:59');
INSERT INTO `fake_table` VALUES (33, 'Estiono Mahendra S.Gz', 'tira.adriansyah@palastri.name', 'Dk. Muwardi No. 574, Solok 88201, MalUt', '(+62) 29 7636 0069', '2019-06-05 20:27:29', '2019-01-09 19:41:03');
INSERT INTO `fake_table` VALUES (34, 'Faizah Uyainah S.Ked', 'olga80@sudiati.org', 'Ds. Baung No. 427, Pangkal Pinang 25582, KalTim', '(+62) 24 9440 5242', '2019-09-11 22:44:03', '2019-05-10 03:47:10');
INSERT INTO `fake_table` VALUES (35, 'Ikin Kusumo S.Gz', 'umar19@yahoo.com', 'Ki. Ir. H. Juanda No. 893, Administrasi Jakarta Barat 40590, MalUt', '0461 2906 329', '2019-04-10 10:12:43', '2018-11-10 08:22:20');
INSERT INTO `fake_table` VALUES (36, 'Indah Hartati', 'jyuliarti@yahoo.co.id', 'Jr. Jamika No. 777, Mojokerto 15931, SumUt', '(+62) 753 4548 9179', '2019-07-30 04:33:59', '2018-10-08 20:57:15');
INSERT INTO `fake_table` VALUES (37, 'Zaenab Nadia Maryati', 'epermata@yahoo.com', 'Ki. Baing No. 946, Samarinda 87794, KalSel', '(+62) 710 5252 545', '2019-03-11 22:26:15', '2019-09-20 13:07:38');
INSERT INTO `fake_table` VALUES (38, 'Ibrani Uwais', 'reza41@prasetya.org', 'Jr. Abdul No. 60, Serang 94709, KepR', '(+62) 438 3911 0000', '2018-11-13 22:04:21', '2019-07-19 07:10:34');
INSERT INTO `fake_table` VALUES (39, 'Wani Unjani Nasyidah S.IP', 'yolanda.shakila@gmail.co.id', 'Jln. Kebangkitan Nasional No. 97, Padang 18874, KalTim', '0233 0408 5167', '2018-12-29 15:33:51', '2019-07-01 12:52:00');
INSERT INTO `fake_table` VALUES (40, 'Sakura Uyainah', 'permata.zulaikha@yahoo.com', 'Dk. Ciumbuleuit No. 323, Jayapura 76563, JaTim', '0878 4059 693', '2018-10-30 01:01:48', '2019-09-01 04:41:00');
INSERT INTO `fake_table` VALUES (41, 'Citra Intan Novitasari', 'mutia41@yahoo.co.id', 'Dk. Tambak No. 539, Lhokseumawe 37052, DKI', '(+62) 955 8979 8153', '2019-01-24 12:53:37', '2019-09-04 03:32:41');
INSERT INTO `fake_table` VALUES (42, 'Raden Thamrin', 'csaptono@yahoo.co.id', 'Jr. Dipenogoro No. 248, Jayapura 48660, KalSel', '0322 5421 3560', '2019-04-24 08:34:26', '2019-01-27 20:29:12');
INSERT INTO `fake_table` VALUES (43, 'Bajragin Ilyas Mangunsong S.IP', 'arta.wacana@yahoo.com', 'Psr. Imam No. 757, Gunungsitoli 17307, KalSel', '(+62) 958 6593 637', '2018-12-06 14:05:00', '2019-04-27 18:19:30');
INSERT INTO `fake_table` VALUES (44, 'Zulfa Yuliarti', 'artanto71@permata.name', 'Ds. Sumpah Pemuda No. 673, Lhokseumawe 53185, Lampung', '(+62) 471 2918 739', '2019-08-22 13:12:00', '2018-12-04 09:54:24');
INSERT INTO `fake_table` VALUES (45, 'Titi Mayasari', 'hana.prabowo@gmail.com', 'Jr. Sudiarto No. 527, Kupang 49488, DIY', '(+62) 20 7168 7341', '2019-01-27 01:30:27', '2018-12-26 19:13:24');
INSERT INTO `fake_table` VALUES (46, 'Laila Mayasari', 'qmelani@gmail.co.id', 'Jln. Cihampelas No. 560, Jayapura 42729, Banten', '(+62) 802 641 623', '2019-01-20 12:44:15', '2019-05-20 01:45:05');
INSERT INTO `fake_table` VALUES (47, 'Cahyono Cahyo Ramadan', 'awahyudin@sinaga.or.id', 'Ki. Pacuan Kuda No. 816, Bogor 98440, SulTeng', '0432 4535 2430', '2019-02-19 20:35:47', '2019-04-28 12:19:37');
INSERT INTO `fake_table` VALUES (48, 'Zalindra Namaga', 'xsalahudin@uyainah.com', 'Kpg. Fajar No. 276, Cimahi 14604, Aceh', '(+62) 744 4484 498', '2019-06-02 00:40:00', '2019-08-05 12:19:51');
INSERT INTO `fake_table` VALUES (49, 'Jaiman Rahmat Salahudin', 'maryati.gamblang@prasasta.co.id', 'Ds. Abdul. Muis No. 298, Tasikmalaya 45476, Maluku', '(+62) 814 6501 8484', '2019-03-30 03:08:22', '2019-01-04 16:50:28');
INSERT INTO `fake_table` VALUES (50, 'Ismail Teddy Napitupulu S.Pt', 'bambang06@yuliarti.net', 'Dk. Tambak No. 868, Cilegon 88921, DIY', '0691 4642 3920', '2019-05-04 17:44:28', '2018-11-04 03:25:00');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `update_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, 'admin', '2019-10-30 21:50:47', '2019-10-30 21:50:49');

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `disk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `media_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent` int(11) NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, NULL, 'Users', 'access', 'bars', '2019-09-28 19:44:49', '2019-09-28 20:13:02');
INSERT INTO `menu` VALUES (2, NULL, 'User', 'user', 'user', '2019-09-28 19:47:31', '2019-09-28 19:47:31');
INSERT INTO `menu` VALUES (3, NULL, 'root', 'asd', 'asd', '2019-09-28 19:48:11', '2019-09-28 19:48:11');
INSERT INTO `menu` VALUES (4, NULL, 'Data Master', '#!', 'database', '2019-09-28 19:56:17', '2019-10-30 15:05:43');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_09_20_161425_create_media_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_09_28_122826_fake_table', 2);
INSERT INTO `migrations` VALUES (5, '2019_09_28_164703_create_menu', 3);
INSERT INTO `migrations` VALUES (6, '2019_09_28_165521_menu', 4);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group` int(11) NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `group`(`group`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'admin', 'admin@admin.com', '$2y$10$IHD5f0XFo2Vw3H37DjeRTe3vgD2seDNm2a.8/FMoZEqIJbsPucTmS', 'XEXiYt2lyI2Typ4pxa0ltlHHqr6TaDjm2LtjOsPDg9gHOBN66zM0gPjwYv2r', '2019-10-12 03:08:53', '2019-10-12 03:08:53');

SET FOREIGN_KEY_CHECKS = 1;
