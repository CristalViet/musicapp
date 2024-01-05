/*
 Navicat Premium Data Transfer

 Source Server         : PHP_MYSQL
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : musicapp

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 03/01/2024 17:55:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for artist_song_list
-- ----------------------------
DROP TABLE IF EXISTS `artist_song_list`;
CREATE TABLE `artist_song_list`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `song_id` bigint UNSIGNED NOT NULL,
  `artist_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `artist_song_list_artist_id_foreign`(`artist_id` ASC) USING BTREE,
  INDEX `artist_song_list_song_id_foreign`(`song_id` ASC) USING BTREE,
  CONSTRAINT `artist_song_list_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `artist_song_list_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artist_song_list
-- ----------------------------

-- ----------------------------
-- Table structure for artists
-- ----------------------------
DROP TABLE IF EXISTS `artists`;
CREATE TABLE `artists`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `artist_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:nam 2:nữ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artists
-- ----------------------------
INSERT INTO `artists` VALUES (1, 'Hai Tông', 'VKU.com', '', '2023-12-10 08:33:22', '2023-12-10 08:33:22', 'Lê Đức Anh Việt', '1');
INSERT INTO `artists` VALUES (2, '12aq', 'VKU.com', 'avatars/0trC1rSGR0pX68YsDdFDp3mje4yLfQtR6QX7dxmP.jpg', '2024-01-01 21:04:59', '2024-01-01 21:04:59', 'Văn', '1');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for genre_song_list
-- ----------------------------
DROP TABLE IF EXISTS `genre_song_list`;
CREATE TABLE `genre_song_list`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `song_id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `genre_song_list_genre_id_foreign`(`genre_id` ASC) USING BTREE,
  INDEX `genre_song_list_song_id_foreign`(`song_id` ASC) USING BTREE,
  CONSTRAINT `genre_song_list_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `genre_song_list_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genre_song_list
-- ----------------------------

-- ----------------------------
-- Table structure for genres
-- ----------------------------
DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genres
-- ----------------------------
INSERT INTO `genres` VALUES (2, 'Nhạc trẻ', '2023-12-10 07:23:15', '2023-12-10 07:23:15');
INSERT INTO `genres` VALUES (3, 'Nhạc Trữ Tình', '2023-12-10 07:23:25', '2023-12-10 07:23:25');
INSERT INTO `genres` VALUES (4, 'Nhạc Nhật', '2023-12-10 07:23:43', '2023-12-10 07:23:43');
INSERT INTO `genres` VALUES (5, 'Nhạc không lời', '2023-12-10 07:24:00', '2023-12-10 07:24:00');

-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `likes_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of likes
-- ----------------------------
INSERT INTO `likes` VALUES (67, 1, 2, '2024-01-02 06:25:41', '2024-01-02 06:25:41');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_11_15_213813_create_playlists_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_11_25_151759_songs', 2);
INSERT INTO `migrations` VALUES (8, '2023_11_25_151738_artists', 3);
INSERT INTO `migrations` VALUES (9, '2023_11_25_152032_artist_song_list', 4);
INSERT INTO `migrations` VALUES (10, '2023_11_28_035343_genres', 5);
INSERT INTO `migrations` VALUES (11, '2023_11_28_035507_genre_song_list', 6);
INSERT INTO `migrations` VALUES (12, '2023_11_28_221935_song_playlist', 7);
INSERT INTO `migrations` VALUES (13, '2023_12_10_074657_add_name_column_to_artists_table', 8);
INSERT INTO `migrations` VALUES (14, '2023_12_10_081253_add_genre_column_to_artists_table', 9);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for playlists
-- ----------------------------
DROP TABLE IF EXISTS `playlists`;
CREATE TABLE `playlists`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `playlist_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `playlists_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `playlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlists
-- ----------------------------
INSERT INTO `playlists` VALUES (4, 'Project', 1, '12213', '', '2023-12-31 18:39:52', '2023-12-31 18:39:52');
INSERT INTO `playlists` VALUES (5, 'Việt', 1, 'Nhạc cực hay', 'playlist_img/j6RgFmowbEDHGPUtsepvyhKO2p2x9iXsnUuwpCZU.jpg', '2024-01-02 03:27:49', '2024-01-02 03:27:49');
INSERT INTO `playlists` VALUES (6, 'Project', 1, 'qưe', '', '2024-01-02 09:09:09', '2024-01-02 09:09:09');

-- ----------------------------
-- Table structure for song_playlists
-- ----------------------------
DROP TABLE IF EXISTS `song_playlists`;
CREATE TABLE `song_playlists`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `playlist_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `song_playlist_playlist_id_foreign`(`playlist_id` ASC) USING BTREE,
  INDEX `song_playlist_song_id_foreign`(`song_id` ASC) USING BTREE,
  CONSTRAINT `song_playlist_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `song_playlist_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of song_playlists
-- ----------------------------
INSERT INTO `song_playlists` VALUES (3, 4, 1, '2023-12-31 18:39:52', '2023-12-31 18:39:52');
INSERT INTO `song_playlists` VALUES (5, 5, 1, '2024-01-02 03:27:49', '2024-01-02 03:27:49');
INSERT INTO `song_playlists` VALUES (7, 5, 3, '2024-01-02 03:27:49', '2024-01-02 03:27:49');
INSERT INTO `song_playlists` VALUES (8, 6, 3, '2024-01-02 09:09:09', '2024-01-02 09:09:09');
INSERT INTO `song_playlists` VALUES (9, 6, 4, '2024-01-02 09:09:09', '2024-01-02 09:09:09');

-- ----------------------------
-- Table structure for songs
-- ----------------------------
DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `song_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `song_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `songs_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES (1, 'Test', NULL, 2, 'songs/46cBSnIFJ4JTV3myJKcybHHDLYJNLbIa6KwOo2Ve.mp3', '', '2023-12-10 09:00:10', '2023-12-10 09:00:10');
INSERT INTO `songs` VALUES (3, 'Nhạc rất ok', NULL, 1, 'songs/pMD7vwJ89lGwHcHwqH1hh4qQOLjr06Lv0rTelZgn.mp3', '', '2024-01-02 03:27:10', '2024-01-02 03:27:10');
INSERT INTO `songs` VALUES (4, 'Testx', NULL, 1, 'songs/0Ez2HK7ZN5TPuS2ZZWkNQepfjRL5kGnmyMdlFJgx.mp3', '', '2024-01-02 08:06:16', '2024-01-02 08:06:16');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint NOT NULL,
  `role` tinyint NOT NULL DEFAULT 1,
  `status` tinyint NULL DEFAULT NULL,
  `avatarLink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Lê Đức Anh', 'vietvaky@gmail.com', 1, 2, NULL, 'avatars/QPCjYA75IHPKVbtbVrufxgwhIzWTpLoR7MVzftzo.jpg', NULL, '$2y$12$HGuUr.RmDmFB0Ue7yfS5RORoO0zfJ/RFqqWO1ujX5oeWwadCuKPzu', NULL, '2023-12-10 07:19:21', '2023-12-10 07:19:21');
INSERT INTO `users` VALUES (2, 'Hai Tông', 'vietvaky2@gmail.com', 0, 1, NULL, 'avatars/IGce52qhK7ATHOmmEK9TsMyfP5mNOewJqfduisuf.jpg', NULL, '$2y$12$Nv2KUspGfiH3LC8ciYO0b./Lw05nO3DMAQs.xbzJ0uBN7ExjzSmG6', NULL, '2023-12-10 08:49:12', '2023-12-10 08:49:12');

-- ----------------------------
-- Table structure for views
-- ----------------------------
DROP TABLE IF EXISTS `views`;
CREATE TABLE `views`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `song_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `views_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of views
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
