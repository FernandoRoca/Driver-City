-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_modificar_pelicula`(
	IN idpelicula INT,
	IN idnegocio INT,
	IN nombre VARCHAR(500),
	IN director VARCHAR(500),
	IN genero VARCHAR(100),
	IN imagen TEXT,
	IN sinopsis TEXT,
	IN trailer TEXT
)
BEGIN
	IF(imagen = "") THEN
		UPDATE	pelicula SET
				id_negocio = idnegocio,
				nombre = nombre,
				director = director,
				genero = genero,
				sinopsis = sinopsis,
				trailer = trailer
					WHERE id_pelicula = idpelicula; 
	ELSE
		UPDATE	pelicula SET
				id_negocio = idnegocio,
				nombre = nombre,
				director = director,
				genero = genero,
				imagen = imagen,
				sinopsis = sinopsis,
				trailer = trailer
					WHERE id_pelicula = idpelicula;
	
	END IF;

END