ALTER TABLE `TBLCNTRLUSRS` CHANGE `cmppssusr` `cmppssusr` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

/*Consultas Nuevas*/
ALTER TABLE `TBLDTSINCFOTR` ADD `cmptitlnstrs` VARCHAR(120) NOT NULL AFTER `cmpidprtinc`; /*-----*/

INSERT INTO tbldtsservcstip(`cmpnombrsrvco`,`cmpstdservco`)VALUES('Agencia Publicitaria',1)

INSERT INTO tbldtsservcsopcn(`cmpclsiconserv`,`cmpnombservco`,`cmpidservco`,`cmpstdservcio`)VALUES('icon-printer','Impresión Digital',1,1)

/* Cambios Temporada Octubre 26 */
ALTER TABLE `TBLDTSINCFOTR` ADD `cmpnmbrpgn` VARCHAR(50) NOT NULL AFTER `cmpcntndinc`;

/* Cambio 14 de Noviembre */

ALTER TABLE `tbldtsservcsopcn` ADD `cmpcontndsrvc` TEXT NOT NULL AFTER `cmpnombservco`;