ALTER TABLE `attachment` ADD COLUMN `thumb` varchar(300)  NOT NULL AFTER `resurse_id`;
ALTER TABLE `tag` ADD COLUMN `resurse_id` BIGINT UNSIGNED NOT NULL AFTER `valoare`;
ALTER TABLE `categorie_resurse` MODIFY COLUMN `nume` VARCHAR(100)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE  `attachment` ADD  `durata` INT NOT NULL COMMENT  'Durata in secunde' AFTER  `marime`;
UPDATE  `tip_resurse` SET  `nume` =  'Marturie audio',
`cod` =  'marturie-audio' WHERE  `tip_resurse`.`id` =9;
INSERT INTO `tip_resurse` (`id`, `nume`, `cod`) VALUES (NULL, 'Diverse audio', 'diverse-audio');

TRUNCATE TABLE  `categorie_resurse`;
INSERT INTO `categorie_resurse` (`id`, `nume`) VALUES (NULL, 'Fara categorie');

ALTER TABLE  `resurse` CHANGE  `categorie_id`  `categorie_id` INT( 11 ) NOT NULL;

ALTER TABLE  `resurse` ADD  `meniu_id` INT NULL AFTER  `categorie_id`;

ALTER TABLE  `user` ADD  `public` BIT( 1 ) NOT NULL;

INSERT INTO  `pc-nou`.`drepturi` (`id` ,`nume` ,`cod`) VALUES (NULL ,  'Administrare resurse',  'administrare-resurse'), (NULL ,  'Buletin',  'buletin');

ALTER TABLE  `attachment` CHANGE  `marime`  `marime` DECIMAL( 10, 2 ) NOT NULL;
