--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 17.05.2019 1:18:53
-- Версия сервера: 5.6.41
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE task_manager;

--
-- Удалить таблицу `comments`
--
DROP TABLE IF EXISTS comments;

--
-- Удалить таблицу `discussion`
--
DROP TABLE IF EXISTS discussion;

--
-- Удалить таблицу `task`
--
DROP TABLE IF EXISTS task;

--
-- Удалить таблицу `ticket`
--
DROP TABLE IF EXISTS ticket;

--
-- Удалить таблицу `team_project`
--
DROP TABLE IF EXISTS team_project;

--
-- Удалить таблицу `project`
--
DROP TABLE IF EXISTS project;

--
-- Удалить таблицу `user`
--
DROP TABLE IF EXISTS user;

--
-- Установка базы данных по умолчанию
--
USE task_manager;

--
-- Создать таблицу `user`
--
CREATE TABLE user (
  id_user int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  auth_key tinytext NOT NULL,
  password_hash varchar(255) NOT NULL,
  password_reset_token varchar(255) DEFAULT NULL,
  email varchar(50) NOT NULL,
  status smallint(6) NOT NULL DEFAULT 10,
  created_at int(11) NOT NULL,
  updated_at int(11) NOT NULL,
  id_group int(11) UNSIGNED DEFAULT NULL,
  fullname varchar(255) DEFAULT NULL,
  photo varchar(255) DEFAULT NULL,
  role varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (id_user)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `email` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX email (email);

--
-- Создать индекс `password_resset_token` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX password_resset_token (password_reset_token);

--
-- Создать индекс `username` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX username (username);

--
-- Создать таблицу `project`
--
CREATE TABLE project (
  id_project int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_user int(11) UNSIGNED NOT NULL,
  pr_name tinytext NOT NULL,
  pr_type enum ('new', 'support', 'internal') DEFAULT 'new',
  pr_sratus enum ('open', 'on hold', 'closed', 'cancelled') NOT NULL DEFAULT 'open',
  pr_desc text NOT NULL,
  pr_update timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id_project)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `FK_project_user_id_user` для объекта типа таблица `project`
--
ALTER TABLE project
ADD INDEX FK_project_user_id_user (id_user);

--
-- Создать таблицу `team_project`
--
CREATE TABLE team_project (
  id_user int(11) UNSIGNED DEFAULT NULL,
  id_project int(11) UNSIGNED DEFAULT NULL
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_team_project_id_project` для объекта типа таблица `team_project`
--
ALTER TABLE team_project
ADD INDEX UK_team_project_id_project (id_project);

--
-- Создать индекс `UK_team_project_id_user` для объекта типа таблица `team_project`
--
ALTER TABLE team_project
ADD INDEX UK_team_project_id_user (id_user);

--
-- Создать внешний ключ
--
ALTER TABLE team_project
ADD CONSTRAINT FK_team_project_project_id_project FOREIGN KEY (id_project)
REFERENCES project (id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать внешний ключ
--
ALTER TABLE team_project
ADD CONSTRAINT FK_team_project_user_id_user FOREIGN KEY (id_user)
REFERENCES user (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать таблицу `ticket`
--
CREATE TABLE ticket (
  id_tickets int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_project int(11) UNSIGNED NOT NULL,
  id_user int(11) UNSIGNED NOT NULL,
  id_status enum ('new', 'closed', 'cancelled', 'resolved', 'fixed') DEFAULT 'new',
  type enum ('request a change', 'report a bug', 'ask a question', 'raise an issue') DEFAULT NULL,
  subject tinytext NOT NULL,
  ticket_desc text DEFAULT NULL,
  PRIMARY KEY (id_tickets)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE ticket
ADD CONSTRAINT FK_ticket_team_project_id_project FOREIGN KEY (id_project)
REFERENCES team_project (id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать внешний ключ
--
ALTER TABLE ticket
ADD CONSTRAINT FK_ticket_team_project_id_user FOREIGN KEY (id_user)
REFERENCES team_project (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать таблицу `task`
--
CREATE TABLE task (
  id_task int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_user int(11) UNSIGNED NOT NULL,
  id_project int(11) UNSIGNED NOT NULL,
  task_name tinytext NOT NULL,
  priority enum ('low', 'medium', 'hight') NOT NULL DEFAULT 'medium',
  task_status enum ('open', 're-open', 'on hold', 'completed', 'cancelled') NOT NULL DEFAULT 'open',
  assigned_to tinytext NOT NULL,
  task_desc text NOT NULL,
  start_date date DEFAULT NULL,
  create_date timestamp NULL DEFAULT '0000-00-00 00:00:00',
  finish_date date DEFAULT NULL,
  PRIMARY KEY (id_task)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE task
ADD CONSTRAINT FK_task_team_project_id_project FOREIGN KEY (id_project)
REFERENCES team_project (id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать внешний ключ
--
ALTER TABLE task
ADD CONSTRAINT FK_task_team_project_id_user FOREIGN KEY (id_user)
REFERENCES team_project (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать таблицу `discussion`
--
CREATE TABLE discussion (
  id_disc int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_project int(11) UNSIGNED NOT NULL,
  id_user int(11) UNSIGNED NOT NULL,
  disc_name tinytext NOT NULL,
  discription text DEFAULT NULL,
  PRIMARY KEY (id_disc)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE discussion
ADD CONSTRAINT FK_discussion_team_project_id_project FOREIGN KEY (id_project)
REFERENCES team_project (id_project) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать внешний ключ
--
ALTER TABLE discussion
ADD CONSTRAINT FK_discussion_team_project_id_user FOREIGN KEY (id_user)
REFERENCES team_project (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать таблицу `comments`
--
CREATE TABLE comments (
  id_comm int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  type tinytext NOT NULL,
  material_id int(11) UNSIGNED NOT NULL,
  user_id int(11) UNSIGNED NOT NULL,
  name text NOT NULL,
  text_comm text NOT NULL,
  date timestamp NULL DEFAULT '0000-00-00 00:00:00',
  public text DEFAULT NULL,
  moder text DEFAULT NULL,
  PRIMARY KEY (id_comm)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE comments
ADD CONSTRAINT FK_comments_team_project_id_user FOREIGN KEY (user_id)
REFERENCES team_project (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'bjbkb', '11', '11', NULL, '11', 10, 1, 10, NULL, NULL, NULL, 'user'),
(2, 'admin', 'UXLceGhDhsEoR4LJJzVYdd0dw7l1rggX', '$2y$13$YD2.wo7kNEQwpChWX4w/bOpUnLDht.rU87VJvg2AosVZB6tRrzxDi', NULL, 'admin@admin.ru', 10, 1558041535, 1558041535, NULL, NULL, NULL, 'user');

-- 
-- Вывод данных для таблицы project
--
INSERT INTO project VALUES
(1, 1, '11', 'support', 'on hold', '1', '2019-05-01 00:00:00'),
(2, 1, 'ысыфмвым', 'internal', 'open', 'лплпр', NULL);

-- 
-- Вывод данных для таблицы team_project
--
INSERT INTO team_project VALUES
(1, 1);

-- 
-- Вывод данных для таблицы ticket
--
-- Таблица task_manager.ticket не содержит данных

-- 
-- Вывод данных для таблицы task
--
-- Таблица task_manager.task не содержит данных

-- 
-- Вывод данных для таблицы discussion
--
-- Таблица task_manager.discussion не содержит данных

-- 
-- Вывод данных для таблицы comments
--
-- Таблица task_manager.comments не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;