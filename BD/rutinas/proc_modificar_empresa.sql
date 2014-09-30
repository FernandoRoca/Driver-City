-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_modificar_empresa`(
	IN idempresa INT,
	IN nombre VARCHAR(200),
	IN logo TEXT,
	IN descripcion TEXT
)
BEGIN
	IF(logo = "") THEN
		UPDATE	empresa SET
				nombre = nombre,
				descripcion = descripcion
					WHERE id_empresa = idempresa; 
	ELSE
		UPDATE	empresa SET
				nombre = nombre,
				logo = logo,
				descripcion = descripcion
					WHERE id_empresa = idempresa;
	END IF;
END