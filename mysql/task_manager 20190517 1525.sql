﻿--
-- Script was generated by Devart dbForge Studio 2019 for MySQL, Version 8.1.45.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 17.05.2019 15:25:02
-- Server version: 5.6.41
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE task_manager;

--
-- Drop table `comments`
--
DROP TABLE IF EXISTS comments;

--
-- Drop table `discussion`
--
DROP TABLE IF EXISTS discussion;

--
-- Drop table `task`
--
DROP TABLE IF EXISTS task;

--
-- Drop table `ticket`
--
DROP TABLE IF EXISTS ticket;

--
-- Drop table `team_project`
--
DROP TABLE IF EXISTS team_project;

--
-- Drop table `project`
--
DROP TABLE IF EXISTS project;

--
-- Drop table `user`
--
DROP TABLE IF EXISTS user;

--
-- Set default database
--
USE task_manager;

--
-- Create table `user`
--
CREATE TABLE user (
  id_user INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  auth_key TINYTEXT NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(50) NOT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  id_group INT(11) UNSIGNED DEFAULT NULL,
  fullname VARCHAR(255) DEFAULT NULL,
  photo VARCHAR(255) DEFAULT NULL,
  role VARCHAR(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (id_user)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create index `email` on table `user`
--
ALTER TABLE user 
  ADD UNIQUE INDEX email(email);

--
-- Create index `password_resset_token` on table `user`
--
ALTER TABLE user 
  ADD UNIQUE INDEX password_resset_token(password_reset_token);

--
-- Create index `username` on table `user`
--
ALTER TABLE user 
  ADD UNIQUE INDEX username(username);

--
-- Create table `project`
--
CREATE TABLE project (
  id_project INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_user INT(11) UNSIGNED NOT NULL,
  pr_name TINYTEXT NOT NULL,
  pr_type ENUM('new','support','internal') DEFAULT 'new',
  pr_sratus ENUM('open','on hold','closed','cancelled') NOT NULL DEFAULT 'open',
  pr_desc TEXT NOT NULL,
  pr_update TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id_project)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create index `FK_project_user_id_user` on table `project`
--
ALTER TABLE project 
  ADD INDEX FK_project_user_id_user(id_user);

--
-- Create table `team_project`
--
CREATE TABLE team_project (
  id_user INT(11) UNSIGNED DEFAULT NULL,
  id_project INT(11) UNSIGNED DEFAULT NULL
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create index `UK_team_project_id_project` on table `team_project`
--
ALTER TABLE team_project 
  ADD INDEX UK_team_project_id_project(id_project);

--
-- Create index `UK_team_project_id_user` on table `team_project`
--
ALTER TABLE team_project 
  ADD INDEX UK_team_project_id_user(id_user);

--
-- Create foreign key
--
ALTER TABLE team_project 
  ADD CONSTRAINT FK_team_project_project_id_project FOREIGN KEY (id_project)
    REFERENCES project(id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE team_project 
  ADD CONSTRAINT FK_team_project_user_id_user FOREIGN KEY (id_user)
    REFERENCES user(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `ticket`
--
CREATE TABLE ticket (
  id_tickets INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_project INT(11) UNSIGNED NOT NULL,
  id_user INT(11) UNSIGNED NOT NULL,
  id_status ENUM('new','closed','cancelled','resolved','fixed') DEFAULT 'new',
  type ENUM('request a change','report a bug','ask a question','raise an issue') DEFAULT NULL,
  subject TINYTEXT NOT NULL,
  ticket_desc TEXT DEFAULT NULL,
  PRIMARY KEY (id_tickets)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create foreign key
--
ALTER TABLE ticket 
  ADD CONSTRAINT FK_ticket_team_project_id_project FOREIGN KEY (id_project)
    REFERENCES team_project(id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE ticket 
  ADD CONSTRAINT FK_ticket_team_project_id_user FOREIGN KEY (id_user)
    REFERENCES team_project(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `task`
--
CREATE TABLE task (
  id_task INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_user INT(11) UNSIGNED NOT NULL,
  id_project INT(11) UNSIGNED NOT NULL,
  task_name TINYTEXT NOT NULL,
  priority ENUM('low','medium','hight') NOT NULL DEFAULT 'medium',
  task_status ENUM('open','re-open','on hold','completed','cancelled') NOT NULL DEFAULT 'open',
  assigned_to TINYTEXT NOT NULL,
  task_desc TEXT NOT NULL,
  start_date DATE DEFAULT NULL,
  create_date TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  finish_date DATE DEFAULT NULL,
  PRIMARY KEY (id_task)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create foreign key
--
ALTER TABLE task 
  ADD CONSTRAINT FK_task_team_project_id_project FOREIGN KEY (id_project)
    REFERENCES team_project(id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE task 
  ADD CONSTRAINT FK_task_team_project_id_user FOREIGN KEY (id_user)
    REFERENCES team_project(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `discussion`
--
CREATE TABLE discussion (
  id_disc INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_project INT(11) UNSIGNED NOT NULL,
  id_user INT(11) UNSIGNED NOT NULL,
  disc_name TINYTEXT NOT NULL,
  discription TEXT DEFAULT NULL,
  PRIMARY KEY (id_disc)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create foreign key
--
ALTER TABLE discussion 
  ADD CONSTRAINT FK_discussion_team_project_id_project FOREIGN KEY (id_project)
    REFERENCES team_project(id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE discussion 
  ADD CONSTRAINT FK_discussion_team_project_id_user FOREIGN KEY (id_user)
    REFERENCES team_project(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `comments`
--
CREATE TABLE comments (
  id_comm INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  type TINYTEXT NOT NULL,
  material_id INT(11) UNSIGNED NOT NULL,
  user_id INT(11) UNSIGNED NOT NULL,
  name TEXT NOT NULL,
  text_comm TEXT NOT NULL,
  date TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  public TEXT DEFAULT NULL,
  moder TEXT DEFAULT NULL,
  PRIMARY KEY (id_comm)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Create foreign key
--
ALTER TABLE comments 
  ADD CONSTRAINT FK_comments_team_project_id_user FOREIGN KEY (user_id)
    REFERENCES team_project(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'bjbkb', '11', '11', NULL, '11', 10, 1, 10, NULL, NULL, NULL, 'user'),
(2, 'admin', 'UXLceGhDhsEoR4LJJzVYdd0dw7l1rggX', '$2y$13$YD2.wo7kNEQwpChWX4w/bOpUnLDht.rU87VJvg2AosVZB6tRrzxDi', NULL, 'admin@admin.ru', 10, 1558041535, 1558041535, NULL, NULL, NULL, 'user'),
(3, 'dsavgs', 'NfVyLsVWfZLCOpGebJo3seqzANt7ATSD', '$2y$13$Uj/Q1rRriAscg8QK9NkjLuIF3HL6.h4SLVPdFY1YrLEjwwjGVVsBO', NULL, 'admin@aaa.aa', 10, 1558080112, 1558080112, NULL, NULL, NULL, 'user'),
(4, 'acfa', 'NOmWvMZ9GOwVdY_dSa6kRfCVZSRmP3YC', '$2y$13$KGCSDkYQbqlpWD3irSxPSupCy/D4VOLXDwkfyJ1pj9n.VxL7PMFYK', NULL, 'admin@admin.hntgf', 10, 1558080800, 1558080800, NULL, NULL, NULL, 'user'),
(5, 'administrator', '7rJNntdr4Ad_WAtLQhzlDZ0q6dFcs7wS', '$2y$13$ME.GIzD6GdiSiZCTw2dsQudFAxawz7zUVLkt9m/f/2s9/7gx.utFG', NULL, 'admin@mail.ru', 10, 1558094121, 1558094121, NULL, NULL, NULL, 'user');

-- 
-- Dumping data for table project
--
INSERT INTO project VALUES
(4, 5, 'Создание сайта Planberry', 'new', 'open', 'Создание корпоративного трекер менеджера на yii2', '2016-05-20 19:00:00'),
(5, 4, 'vrpos', 'support', 'on hold', 'Создание приложения для реализации виртуальных платежей', '2016-05-20 19:00:00');

-- 
-- Dumping data for table team_project
--
INSERT INTO team_project VALUES
(5, 4);

-- 
-- Dumping data for table ticket
--
INSERT INTO ticket VALUES
(1, 4, 5, 'new', 'request a change', 'Добавление админки на сайт', 'Добавление админки на сайт');

-- 
-- Dumping data for table task
--
INSERT INTO task VALUES
(1, 5, 4, 'Создание структуры бд в mysql', 'hight', 'open', 'Ivanov Ivan', 'Создание структуры бд в mysql', '2015-05-20', '2025-05-20 19:00:00', '2031-05-20');

-- 
-- Dumping data for table discussion
--
-- Table task_manager.discussion does not contain any data (it is empty)

-- 
-- Dumping data for table comments
--
-- Table task_manager.comments does not contain any data (it is empty)

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;