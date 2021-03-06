DROP TABLE IF EXISTS `#__callback_callback`;

CREATE TABLE IF NOT EXISTS `#__callback_callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД записи',
  `status_id` int(11) NOT NULL COMMENT ' ИД статуса звонка',
  `name` varchar(50) NOT NULL COMMENT 'Имя заказчика',
  `telnum` varchar(10) NOT NULL COMMENT 'номер телефона',
  `time_create` datetime NOT NULL COMMENT 'дата и время создания заявки',
  `time_close` datetime NOT NULL COMMENT 'дата и время закрытия заявки',
  `theme` varchar(50) NOT NULL COMMENT 'тема разговора',
  `text` text NOT NULL COMMENT 'содержание разговора',
  `user_id` int(11) NOT NULL COMMENT 'ИД менеджера',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `#__callback_status`;

CREATE TABLE IF NOT EXISTS `#__callback_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД статуса звонка',
  `name` varchar(50) NOT NULL COMMENT 'наименование статуса',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Статус заказ обратного звонка' AUTO_INCREMENT=1 ;

INSERT INTO `#__callback_status` (`id`, `name`) VALUES
(1, 'Заказ'),
(2, 'Исполнен');