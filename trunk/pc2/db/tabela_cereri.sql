
CREATE TABLE IF NOT EXISTS `cereri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `localitate` varchar(100) NOT NULL,
  `continut` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cereri de rugaciune' AUTO_INCREMENT=1 ;