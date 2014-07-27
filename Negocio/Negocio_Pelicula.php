<?php


class Negocio_Pelicula{

var $objD_Gestionar_Pelicula;
	
	function Negocio_Pelicula(){
		require('../../Datos/D_Gestionar_Pelicula.php');
		$this->objD_Gestionar_Pelicula = new Datos_Gestionar_Pelicula();
	}
	
	function Insertar_Pelicula($nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
		if($nombre == "") {
			echo"<script>
					alert('Ingrese el Nombre de la Pelicula!!');
				</script>";
				
			echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
		}else{
			if($director == "") {
				echo"<script>
					alert('Ingrese el Nombre del Director de la Pelicula!!');
					</script>";				
	
				echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
			}else{
				if($genero == "") {
					echo"<script>
						alert('Ingrese el Nombre de la Pelicula!!');
						</script>";
				
					echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
				}else{
					if($imagen == ""){
						echo"<script
								alert('Seleccione una Imagen!!');
							</script>";
				
						echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
					}else{
						if($sinopsis == "") {
							echo"<script>
								alert('Ingrese la Sinopsis de la Pelicula!!');
								</script>";
					
							echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
						}else{
							if($trailer == "") {
								echo"<script>
									alert('Ingrese una ubicación web del Trailer!!');
									</script>";
					
								echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
							}else{
								if($this->objD_Gestionar_Pelicula->Insertar_Pelicula($nombre,$director,$genero,$imagen,$sinopsis,$trailer)) {
									echo"<script>alert('Inserción Realizada con Exito!!');
										</script>";
									echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
								}
							}
						}					
					}
				}
			}
		}
	}
	
	
	
	function Insertar_Horario_Pelicula($id_pelicula=0,$id_negocio=0,$horario="",$fecha_inicio="",$fecha_fin=""){
		if($horario == "") {
			echo"<script>
				alert('Elija un Horario!!');
				</script>";
		
			echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
		}else{
			if($fecha_inicio == "") {
				echo"<script>
					alert('Seleccione una Fecha de Inicio de la Pelicula!!');
					</script>";
		
				echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
			}else{
				if($fecha_fin == "") {
					echo"<script>
						alert('Fecha de Finalización en Cartelera de la Pelicula!!');
						</script>";
		
					echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
				}else{
					if($this->objD_Gestionar_Pelicula->Insertar_Horario_Pelicula($id_pelicula,$id_negocio,$horario,$fecha_inicio,$fecha_fin)){
						echo"<script>alert('Inserción Realizada con Exito!!');
							</script>";
						echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
					}
				}
			}
		}
	}
	
	function Tabla_Pelicula() {
		
		$consulta = $this->objD_Gestionar_Pelicula->Mostrar_Tabla_Pelicula();
		
		  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  				<thead>
					<tr>
						<th>N&#176;</th>
						<th>Cine</th>
						<th>Pelicula</th>
						<th>Director</th>
						<th>Genero</th>
						<th>Imagen</th>
						<th>Sinopsis</th>
						<th>Trailer</th>
						<th>Horario</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Finalizacion</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>';
		$contador = 1;
		if($consulta) {
			while($Tabla_Pelicula = mysql_fetch_array($consulta)) {
				echo' <tr>
					<td align="middle">';echo $contador;echo'</td>
					<td align="middle">';echo $Tabla_Pelicula['cine'];echo'</td>
					<td align="middle">';echo $Tabla_Pelicula['nombre'];echo'</td>
					<td align="middle">';echo $Tabla_Pelicula['director'];echo'</td>
					<td align="middle">';echo $Tabla_Pelicula['genero'];echo'</td>
					
					<td align="middle">
						<img src="../../img/Imagen_Pelicula/';echo $Tabla_Pelicula['imagen'];echo'"></img>
					</td>  
					
					<td align="middle">';echo substr($Tabla_Pelicula['sinopsis'],0,50);echo'</td>
					
					<td align="middle">
						<a href="';echo $Tabla_Pelicula['trailer'];echo'" target="_blank">';echo $Tabla_Pelicula['trailer'];echo'</a>
					</td>
					
					<td align="middle">';echo $Tabla_Pelicula['horario'];echo'</td>    
					<td align="middle">';echo $Tabla_Pelicula['fecha_inicio'];echo'</td>
					<td align="middle">';echo $Tabla_Pelicula['fecha_fin'];echo'</td>
					
					<td align="middle">
						<span class="modi">
							<a href="Pelicula.php?
									id_pelicula=';
								echo base64_encode($Tabla_Pelicula['id_pelicula']);
								echo'&id_negocio=';
								echo  base64_encode($Tabla_Pelicula['id_negocio']);
								echo'&nombre=';
								echo base64_encode($Tabla_Pelicula['nombre']);
								echo'&director=';
								echo base64_encode($Tabla_Pelicula['director']);
								echo'&genero=';
								echo base64_encode($Tabla_Pelicula['genero']);
								echo'&imagen=';
								echo base64_encode($Tabla_Pelicula['imagen']);
								echo'&sinopsis=';
								echo base64_encode($Tabla_Pelicula['sinopsis']);
								echo'&trailer=';
								echo base64_encode($Tabla_Pelicula['trailer']);
								echo'&horario=';
								echo base64_encode($Tabla_Pelicula['horario']);
								echo'&fecha_inicio=';
								echo base64_encode($Tabla_Pelicula['fecha_inicio']);
								echo'&fecha_fin=';
								echo base64_encode($Tabla_Pelicula['fecha_fin']);
								
								echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" />
							</a>
						</span>
					</td>
	
					<td align="middle">
						<span class="dele">
							<a href="Pelicula.php?
									id_pelicula=';
								echo base64_encode($Tabla_Pelicula['id_pelicula']);
								echo'&nombre=">
								<img src="../../img/delete.png" title="Eliminar" alt="Eliminar" />
							</a>
						</span>
					</td>
				
				</tr> ';
				
				$contador++;
			}
		}
		
		echo'</tbody>
    	</table> ';

	}
	
	function Eliminar_Pelicula($id_pelicula) {
		if($this->objD_Gestionar_Pelicula->Eliminar_Pelicula($id_pelicula) == true){
			echo "<script>
					alert('Eliminacion Realizada con Exito!!');
				 </script>";
			echo "<meta http-equiv=refresh content=1;URL = Pelicula.php>"; 
		}
	}
	
	function Mostrar_Ultimo_id_pelicula(){
		$consulta = $this->objD_Gestionar_Pelicula->Mostrar_Ultimo_id_pelicula();
	}

}
?>

