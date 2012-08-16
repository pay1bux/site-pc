CREATE TABLE  `pc-nou`.`meniu` (
`id` INT NOT NULL AUTO_INCREMENT ,
`tip_id` INT NOT NULL ,
`nume` VARCHAR( 50 ) NOT NULL ,
`cod` VARCHAR( 50 ) NOT NULL ,
`parinte` INT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT =  'Meniuri si submeniuri';