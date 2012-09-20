CREATE TABLE IF NOT EXISTS `detalii_eveniment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `resurse_id` bigint(20) unsigned NOT NULL,
  `ora_inceput` int(2) unsigned NOT NULL,
  `ora_sfarsit` int(2) unsigned DEFAULT NULL,
  `repeta` varchar(10) DEFAULT NULL COMMENT 'Valori posibile: saptamanal, lunar, anual sau NULL',
  `eveniment` int(1) unsigned NOT NULL COMMENT 'Valori posibile: 1 - true; 0 - false;',
  `invitat_predica` varchar(300) DEFAULT NULL,
  `invitat_lauda` varchar(300) DEFAULT NULL,
  `organizator` varchar(200) DEFAULT NULL,
  `site_organizator` varchar(150) DEFAULT NULL,
  `newsletter` int(1) NOT NULL COMMENT 'Valori posibile: 1 - true; 0 - false;',
  `live` int(1) NOT NULL COMMENT 'Valori posibile: 1 - true; 0 - false;',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Detaliile evenimentului - ca prelungire a tabelei resurse' AUTO_INCREMENT=1 ;