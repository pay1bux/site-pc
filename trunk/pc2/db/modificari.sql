ALTER TABLE `attachment` ADD COLUMN `thumb` varchar(300)  NOT NULL AFTER `resurse_id`;
ALTER TABLE `tag` ADD COLUMN `resurse_id` BIGINT UNSIGNED NOT NULL AFTER `valoare`;
ALTER TABLE `categorie_resurse` MODIFY COLUMN `nume` VARCHAR(100)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE  `attachment` ADD  `durata` INT NOT NULL COMMENT  'Durata in secunde' AFTER  `marime`;
UPDATE  `pc-nou`.`tip_resurse` SET  `nume` =  'Marturieaudio',
`cod` =  'marturie-audio' WHERE  `tip_resurse`.`id` =9;
INSERT INTO `pc-nou`.`tip_resurse` (`id`, `nume`, `cod`) VALUES (NULL, 'Diverse audio', 'diverse-audio');
