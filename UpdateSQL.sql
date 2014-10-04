INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('124', 'GroupSparepartView', 'Group Sparepart View', 'group_sparepart', '0');
UPDATE `distribution_db`.`permission_tab` SET `purl`='group_product/group_product_delete' WHERE `pid`='122';
UPDATE `distribution_db`.`permission_tab` SET `purl`='group_product/group_product_update' WHERE `pid`='121';
UPDATE `distribution_db`.`permission_tab` SET `purl`='group_product/group_product_add' WHERE `pid`='120';
UPDATE `distribution_db`.`permission_tab` SET `purl`='group_product' WHERE `pid`='119';
UPDATE `distribution_db`.`permission_tab` SET `purl`='group_product/*' WHERE `pid`='123';
INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('125', 'GroupSparepartAdd', 'Group Sparepart Add', 'group_sparepart/group_sparepart_add', '124');
INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('126', 'GroupSparepartUpdate', 'Group Sparepart Update', 'group_sparepart/group_sparepart_update', '124');
INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('127', 'GroupSparepartDelete', 'Group Sparepart Delete', 'group_sparepart/group_sparepart_delete', '124');
INSERT INTO `distribution_db`.`permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES ('128', 'ExecuteAllGroupSparepart', 'Execute All Group Sparepart', 'group_sparepart/*', '0');

INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '124', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '125', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '126', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '127', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '1', '128', '1');
INSERT INTO `distribution_db`.`access_tab` (`agid`, `apid`, `aaccess`) VALUES ('2', '124', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '125', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '126', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '127', '1');
INSERT INTO `distribution_db`.`access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES ('', '2', '128', '1');

