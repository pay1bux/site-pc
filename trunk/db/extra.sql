-- De inserat in DB

ALTER TABLE `tag` ADD `resurse_id` INT( 11 ) NOT NULL AFTER `tip_tag_id`

INSERT INTO `pcnou`.`autor` (`id` ,`nume`)VALUES (NULL , 'Poarta Cerului');
