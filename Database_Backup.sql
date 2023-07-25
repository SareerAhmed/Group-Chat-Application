/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - group_chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_application`;

/*Table structure for table `chat_message` */

DROP TABLE IF EXISTS `chat_message`;

CREATE TABLE `chat_message` (
  `chat_message` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `message_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`chat_message`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat_message` */

insert  into `chat_message`(`chat_message`,`message`,`user_id`,`message_time`) values 
(1,'hello world!....',1,'1681280646'),
(2,'welcome to HIST',2,'1681280705'),
(3,'hy hello',1,'1681280720'),
(4,'hy',1,'1681281843'),
(5,'hello',1,'1681282374'),
(6,'hello peter',1,'1681282408'),
(7,'hello',2,'1681284951'),
(8,'Hello Peter How are you?',4,'1681285284'),
(9,'Yes Hina I`m Good..',2,'1681285307'),
(10,'hello',1,'1681290500'),
(11,'Welcome To HIST...',4,'1681293912');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_profile` varchar(200) NOT NULL,
  `is_online` int(11) NOT NULL DEFAULT 0,
  `log_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`last_name`,`email`,`password`,`user_profile`,`is_online`,`log_time`) values 
(1,'Sherry','Santos','sherry@gmail.com','12345','3.png',0,'1681293802'),
(2,'Peter','Wilson','peter123@gmail.com','12345','1.png',0,'1681287150'),
(3,'Ali','Khan','ali123@yahoo.com','12345','2.png',0,'1681285174'),
(4,'Hina','Khan','hina12@yahoo.com','12345','4.png',1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
