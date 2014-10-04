INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('129', 'BranchViewAsBranch', 'Branch View As Branch', 'branch', '1');
INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('130', 'ProductViewAsBranch', 'Group Sparepart Add', 'product', '9');

INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '129', '0');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '130', '0');

INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '129', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '130', '1');

ALTER TABLE `distribution_db`.`sparepart_tab` 
ADD COLUMN `sgeneral` TINYINT(1) NULL DEFAULT 0 AFTER `snocomponent`;
