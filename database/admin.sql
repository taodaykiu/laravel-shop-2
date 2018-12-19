-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,'2018-12-08 15:31:59'),(2,0,2,'系统管理','fa-tasks',NULL,NULL,'2018-12-16 16:05:50'),(3,2,3,'管理员','fa-users','auth/users',NULL,'2018-12-16 16:05:50'),(4,2,4,'角色管理','fa-user','auth/roles',NULL,'2018-12-16 16:05:50'),(5,2,5,'权限管理','fa-ban','auth/permissions',NULL,'2018-12-16 16:05:50'),(6,2,6,'菜单','fa-bars','auth/menu',NULL,'2018-12-16 16:05:50'),(7,2,7,'操作日志','fa-history','auth/logs',NULL,'2018-12-16 16:05:50'),(8,0,8,'用户管理','fa-users','/users','2018-12-08 15:49:56','2018-12-16 16:05:50'),(9,0,9,'商品管理','fa-cubes','/products','2018-12-09 08:15:51','2018-12-16 16:05:50'),(10,0,10,'订单管理','fa-rmb','/orders','2018-12-16 16:01:22','2018-12-16 16:05:50'),(11,0,0,'优惠券管理','fa-tags','/coupon_codes','2018-12-17 23:39:45','2018-12-18 16:37:38');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'所有权限','*','','*',NULL,'2018-12-08 16:17:41'),(2,'后台首页','dashboard','GET','/',NULL,'2018-12-08 16:28:51'),(3,'允许登录','auth.login','','/auth/login\r\n/auth/logout',NULL,'2018-12-08 16:21:57'),(4,'用户设置','auth.setting','GET,PUT','/auth/setting',NULL,'2018-12-08 16:16:26'),(5,'系统管理','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,'2018-12-08 16:21:20'),(6,'用户管理','users','','/users*','2018-12-08 16:13:24','2018-12-08 16:13:24'),(7,'商品管理','products','','/products*','2018-12-09 08:17:16','2018-12-09 08:17:16'),(8,'订单管理','orders','','/orders*','2018-12-19 02:12:03','2018-12-19 02:12:03'),(9,'优惠券管理','coupon_codes','','/coupon_codes*','2018-12-19 02:13:05','2018-12-19 02:13:05');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,6,NULL,NULL),(2,7,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'超级管理员','administrator','2018-12-08 11:48:17','2018-12-08 16:25:20'),(2,'运营','operator','2018-12-08 16:14:28','2018-12-08 16:14:28');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$GyYELI7NzK.tb4.z6AkzF.LgmRAmE.3lQQPnI0VjBww4m/6FiSZFi','Administrator',NULL,'U6CKsfYwPoeOlLuTTDF3wJgghKzMN58IMPO63zQ9niR1P7B4iuwl8I8rMxLE','2018-12-08 11:48:17','2018-12-08 11:48:17'),(2,'operator','$2y$10$lnhjaNAFPmJhetYn6B38e.2QzDQg6vvHgZhOC0dJ4xmqxd10rs1Ey','万小伟',NULL,'YLRkXNMAuffALgP6evTcx5200NoRpj4cZ1KKT2e8JiKjeWHs4TrfxzbzFNRn','2018-12-08 16:27:04','2018-12-08 16:27:04');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-19  8:15:04
