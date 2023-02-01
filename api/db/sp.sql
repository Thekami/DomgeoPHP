DROP PROCEDURE IF EXISTS SP_GETMUNICIPIOS;
--DELIMITER ;;
CREATE PROCEDURE SP_GETMUNICIPIOS(IN _cveEdo INT)
BEGIN
	IF _cveEdo = 0 THEN
		SELECT id, cveEdo, cveMun, nombre FROM municipio;
	ELSE
		SELECT id, cveEdo, cveMun, nombre FROM municipio WHERE cveEdo = _cveEdo;
	END IF;
END
--;;
--DELIMITER ;

DROP PROCEDURE IF EXISTS SP_GETLOCALIDADES;
--DELIMITER ;;
CREATE PROCEDURE SP_GETLOCALIDADES(IN _cveEdo INT, IN _cveMun INT)
BEGIN
	IF _cveEdo != 0 AND _cveMun = 0 THEN
		SELECT id, cveEdo, cveMun, cveLoc, nombre FROM localidad WHERE cveEdo = _cveEdo;
	ELSE IF _cveEdo != 0 AND _cveMun != 0 THEN
		SELECT id, cveEdo, cveMun, cveLoc, nombre FROM localidad WHERE cveEdo = _cveEdo and cveMun = _cveMun;
	ELSE IF (_cveEdo = 0 OR _cveMun = 0) OR _cveEdo = 0 OR _cveMun != 0 THEN
		SELECT id, cveEdo, cveMun, cveLoc, nombre FROM localidad
	END IF;
END
--;;
--DELIMITER ;


DROP VIEW IF EXISTS vwGetEstados;
CREATE VIEW vwGetEstados AS
SELECT cveEdo, nombre FROM estado