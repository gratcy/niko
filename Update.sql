ALTER TABLE `distribution_db`.`products_tab` 
DROP COLUMN `pdisc`;

ALTER TABLE `distribution_db`.`sales_tab` 
CHANGE COLUMN `sarea` `sarea` VARCHAR(10) NULL ;

ALTER TABLE `distribution_db`.`sparepart_tab` 
DROP COLUMN `spid`;

ALTER TABLE `distribution_db`.`sparepart_tab` 
ADD COLUMN `sgroupproduct` INT(10) NULL AFTER `sluid`;
