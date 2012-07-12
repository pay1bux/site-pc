CREATE TABLE  `autori_importanti` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`tip_id` INT NOT NULL ,
`nume` VARCHAR( 50 ) NOT NULL
) ENGINE = INNODB;

ALTER TABLE  `autori_importanti` ADD  `cod` VARCHAR( 50 ) NOT NULL;