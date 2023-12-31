-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: athena
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_09_19_102551_create_listings_table',1),(6,'2023_09_21_111006_create_posts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Art',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_created_by_foreign` (`created_by`),
  CONSTRAINT `posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Vincent Van Gogh',1,'Self Portrait','This, the last of Van Gogh\'s self-portraits and one of the greatest, was painted only months before his death.',0,'images/posts/suOMc71Ly3Sk5bicn0Mle0K0DVfjZclTd2AKZOqP.jpg','2023-10-03 01:37:19','2023-10-03 01:37:19'),(2,'Vincent Van Gogh',1,'Landscape with Olive Trees','Van Gogh\'s passionateness fills the entire landscape - ground, trees, mountains, clouds - with a tumultuous heaving motion.',0,'images/posts/2JtQHKuBzJNm2lYePCHpUUo20RkgYU7IgMuvNqHy.jpg','2023-10-03 01:38:27','2023-10-03 01:38:27'),(3,'Vincent Van Gogh',1,'The Night Cafe','Vincent van Gogh painted The Night Caf├⌐ (original French title: Le Caf├⌐ de nuit) in Arles in September 1888',0,'images/posts/QnRst5ZdRlAzm0CHbP7vusMetI9jvNtrOj6Iiszg.jpg','2023-10-03 01:38:59','2023-10-03 01:38:59'),(4,'Vincent Van Gogh',1,'The Potato Eaters','Conceived as a summation of Van Gogh\'s work and study up to that time, The Potato Eaters also expresses most strongly and fully his social and moral feeling.',0,'images/posts/kXmqxbtZla8ORcy8MN621pNXY37FQF3o1elUTpcm.jpg','2023-10-03 01:40:03','2023-10-03 01:40:03'),(5,'Vincent Van Gogh',1,'Red Vineyards at Arles','The Red Vineyard at Arles, which Vincent van Gogh was unusually pleased with, is the only work he sold during his lifetime, and was bought for 400 francs by Anna Boch (1848-1936)',0,'images/posts/gToAfyLhO6EoqxUUY0eLKDzg5G24BSsMHx3zPFFt.jpg','2023-10-03 01:40:54','2023-10-03 01:40:54'),(6,'Vincent Van Gogh',1,'Wheatfield with Crows','Wheatfield with Crows is one of Van Gogh\'s re-created memories of the north and is believed to be the last work of Van Gogh.',0,'images/posts/144SRVdh6eJd6v7tmFcrEYbV6Ef7rRxg07W31hC4.jpg','2023-10-03 01:41:36','2023-10-03 01:41:36'),(7,'Vincent Van Gogh',1,'At Eternity\'s Gate','The painting was completed in early May at a time when he was convalescing from a severe relapse in his health and some two months before his death, generally accepted as a suicide.',0,'images/posts/ru7qF4SgGNSbyBPmFJH0lnQHvL56ZK0Bc8GoeJp2.jpg','2023-10-03 01:44:49','2023-10-03 01:44:49'),(8,'Vincent Van Gogh',1,'Almond Blossom','Almond Blossom was painted immediately before one of his attacks.',0,'images/posts/Zijs9Ic915tQKHvQ9lOsukBVwzxuOZp1KfRdBo7z.jpg','2023-10-03 01:45:42','2023-10-03 01:45:42'),(9,'Vincent Van Gogh',1,'Irises','In 1889 Van Gogh entered Saint-Paulde-Mausole, an asylum at Saint-Remy, originally a 12th-century Augustinian monastery, some twenty kilometers north of Aries.',0,'images/posts/89Y7bak6krrElvYWligc7WuxqmZYkewgYrCMspM0.jpg','2023-10-03 01:46:16','2023-10-03 01:46:16'),(10,'Vincent Van Gogh',1,'The Starry Night Over The Rhone','\"I need a starry night with cypresses or maybe above a field of ripe wheat.\"',0,'images/posts/qYzkD6NIgoJa9gvcYLdHudkhXHoKRDZ7K6a0E0t7.jpg','2023-10-03 01:48:10','2023-10-03 01:48:10'),(11,'Vincent Van Gogh',1,'Sunflowers','Some of Vincent van Gogh\'s most famous works are his Sunflower series. He painted a total of eleven of these canvases.',0,'images/posts/wg1EaHupQcNpvALs5oe1Oj38yXOggh22171nhxsj.jpg','2023-10-03 01:48:48','2023-10-03 01:48:48'),(12,'Vincent Van Gogh',1,'The Starry Night','Widely hailed as Van Gogh\'s magnum opus, this Vincent van Gogh night stars painting depicts the view outside his sanatorium room window at night, although it was painted from memory during the day.',0,'images/posts/fJudl2yLRndEJb7ocqDyjuwqk7KMD0ObdPNqOEXL.jpg','2023-10-03 01:51:09','2023-10-03 01:51:09'),(13,'KwangHo Shin',3,'Untitled Canvas 01','The profile picture',0,'images/posts/fksGONM94OFHzOwIKVVvLqYvok7VmxoCkzFkJOM9.jpg','2023-10-03 02:46:30','2023-10-03 02:46:30'),(14,'KwangHo Shin',3,'Untitled Canvas 02','2019',0,'images/posts/xPW8moZGVOm2140S4ehfrsmyXlY6dFV8lY0LQ8xm.jpg','2023-10-03 02:46:48','2023-10-03 02:46:48'),(15,'KwangHo Shin',3,'Untitled Canvas 03','2020',0,'images/posts/JtY9MjpuTieBSUXUbHoZ7ctLx5GgRra8UxUOWJCr.jpg','2023-10-03 02:47:05','2023-10-03 02:47:05'),(16,'KwangHo Shin',3,'Untitled Canvas 04','2019',0,'images/posts/SHJujpS8wGSsL0r1psD4OvMOPsPUySYLNxoY2wD4.jpg','2023-10-03 02:47:40','2023-10-03 02:47:40'),(17,'KwangHo Shin',3,'Untitled Canvas 05','2021',0,'images/posts/OU19pp5I4vzYcsYatQM4xN9eQ3Ib2KJEi6C3nYQ9.jpg','2023-10-03 02:47:53','2023-10-03 02:47:53'),(18,'KwangHo Shin',3,'Untitled Canvas 06','2022',0,'images/posts/iXIby4idJVOYcMvu9bVkkNsr2t5tsaHd3EmM5Tou.jpg','2023-10-03 02:48:36','2023-10-03 02:48:36'),(19,'KwangHo Shin',3,'Untitled Canvas 07','2017',0,'images/posts/d2eKtildLufZdydTlsmNpatcwoME100uNBpYnVF1.jpg','2023-10-03 02:48:55','2023-10-03 02:48:55'),(20,'KwangHo Shin',3,'Untitled Canvas 08','2018',0,'images/posts/PY63apSOZJaPeZDZQeF1VTl6rL163EaORCMnVrqU.jpg','2023-10-03 02:49:22','2023-10-03 02:49:22'),(21,'KwangHo Shin',3,'Untitled Canvas 09','2018',0,'images/posts/ACOV7NlFnESmE92lQsVWz21Pc8Q9rsBgldfxxkNs.jpg','2023-10-03 02:49:56','2023-10-03 02:49:56'),(22,'KwangHo Shin',3,'Untitled Canvas 10','2020',0,'images/posts/qzGbjHa52VXs0pKwodNtpcYq5Mkrr4L3lv3o8Rqm.jpg','2023-10-03 02:50:50','2023-10-03 02:50:50'),(23,'KwangHo Shin',3,'Untitled Canvas 11','2021',0,'images/posts/ARH4IHzzDQVMQK3oQgQuYshqSHWeXjPNHqvmog3m.jpg','2023-10-03 02:51:03','2023-10-03 02:51:03'),(24,'KwangHo Shin',3,'Untitled Canvas 12','2019',0,'images/posts/74eE7irLPyyNVXhK32ioDKeCNuHDk9vgyKnkMyf7.jpg','2023-10-03 02:51:17','2023-10-03 02:51:17'),(25,'KwangHo Shin',3,'Untitled Canvas 13','2023',0,'images/posts/Y2oZoKje3WR3cwk7nLoFjNxxhq1RBcj7rdrjATD0.jpg','2023-10-03 02:54:32','2023-10-03 02:54:32'),(26,'Miscellaneous',2,'The Excavations at Pompeii','\"His art contained a whole world of color and light, so true and real it was palpable\"',0,'images/posts/e1v4z7MnIB2pbfi0GxpLmX2m56yD0Xv9uC0rYMdX.jpg','2023-10-03 02:57:00','2023-10-03 02:57:00'),(27,'Miscellaneous',2,'Gari Melchers : Penelope, 1910','Drawing on his association with Belgian art circles and his friendship with the French Symbolist painter Puvis de Chavannes, Melchers began to invest scenes of everyday life with spiritual overtones.',0,'images/posts/BBzgJzPYFWMV1oDlBmb5ZBNdA6nWWJv1Wv0ryjzF.jpg','2023-10-03 02:58:55','2023-10-03 02:58:55'),(28,'Miscellaneous',2,'Frank Dicksee : Harmony','The painting depicts a young man staring adoringly into the eyes of a girl playing the organ.',0,'images/posts/45QjuaGpIW8crYuCOXTKgDINRrufXNK2ueNnvG5e.jpg','2023-10-03 02:59:59','2023-10-03 02:59:59'),(29,'Miscellaneous',2,'Luca Giordano : The Fall of the Rebel Angels','Prolific, extremely versatile, and successful, Italian Baroque painter, Luca Giordano worked in Naples and Rome, Florence and Venice, before spending a decade in Spain at the court of Charles II.',0,'images/posts/2l42D0VDdFXpTa62yuvgBx8OVO1OSfYPoN9jpl1W.jpg','2023-10-03 03:00:45','2023-10-03 03:00:45'),(30,'Miscellaneous',2,'L├⌐on Cogniet : The Massacre of the Innocents','Present painting by L├⌐on Cognietis here based on the Biblical story of the Massacre of the Innocents.',0,'images/posts/xWgpfgP85J4qoZjmF2stHGKhzMOIWjjmomOUna9f.jpg','2023-10-03 03:01:19','2023-10-03 03:01:19'),(31,'Miscellaneous',2,'Franz Sedlacek : Ghosts in a Tree','Franz Sedlacek was an Austrian painter. He belonged to a tradition known as Magic Realism and Fantastic Surrealism, some varieties of New Objectivity.',0,'images/posts/YvwaPWv4019zUoVui17sFLKruz7sBNO1NrgXZ1bE.jpg','2023-10-03 03:02:35','2023-10-03 03:02:35'),(32,'Miscellaneous',2,'├ëmile Jean-Horace Vernet : The Ballad of Lenore','His present painting is based on Gothic Romantic ballad \'Lenore\' by the German author Gottfried August B├╝rger, published in 1774.',0,'images/posts/NVlSZvIEuUnN22uPMk0G6YOL5Bw2Y5dKuQWjiC1x.jpg','2023-10-03 03:03:20','2023-10-03 03:03:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Vincent Van Gogh',NULL,'vincent@gmail.com','$2y$10$19duAbHncB2Qj0pCExHQtehmrgFSsyQmy/vl2dl3KsidX.EB1mfWG',NULL,NULL,'2023-10-03 00:25:54','2023-10-03 00:25:54'),(2,'Miscellaneous',NULL,'mis@gmail.com','$2y$10$ndl1acCqbdl2WPSIjKqV9.lV949ofN/Z948xrT6amU5EHZjVDR2LW',NULL,NULL,'2023-10-03 01:35:23','2023-10-03 01:35:23'),(3,'KwangHo Shin',NULL,'kwang@gmail.com','$2y$10$lbv3zMWieuf2xkBt1SKGIO7JmBSpyxmBUH7Qa71YWQ5SUBN3LTaBS',NULL,NULL,'2023-10-03 01:36:06','2023-10-03 01:36:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-03 16:52:30
