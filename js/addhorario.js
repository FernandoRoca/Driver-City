// JavaScript Document

function addhorarios(addhorario) {
	if(addhorario > 0 && addhorario <= 5){
            for(var i = 0; i < addhorario;i++){ 				
		<input type="text" value="<?php echo $horario?>" name="Horario" />
            }
	}else{
		<?php
			alert("Solo se permiten adicionar un maximo de 5 Horarios");
		?>
	}
}
