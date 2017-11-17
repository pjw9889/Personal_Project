# 실시간 온도 값 저장
CREATE TABLE `iot_data_log` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `temperature` float DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=6319 DEFAULT CHARSET=utf8;

# 사용자 구분용
CREATE TABLE `user_info` (
  `id` varchar(30) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `push_id` varchar(255) NOT NULL,
  `pwd` varchar(41) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# 사용자가 온도를 맞추라고 명령했을때 값이 여기에 저장됨.
CREATE TABLE `user_request` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `req_temp` float NOT NULL,
  `is_done` tinyint(1) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `id_idx` (`id`),
  CONSTRAINT `req_id_frk` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

