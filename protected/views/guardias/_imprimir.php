<?php
/* @var $this GuardiasController */
/* @var $data Guardias */
?>
<<<<<<< HEAD
<?php //echo "Mes: ".$_GET['mes']." - Año: ".$_GET['ano'];?>
<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
=======

<p class="note"><b>Debe seleccionar Mes y Año</b></p>
>>>>>>> origin/master

<form method="get" action="Imprimir">
<div class="_form">
	<div class="rowcontact">
		<label>Mes*</label>
	</div>
	<div class="media">
		<select name="mes">
		   <option selected value="">--Mes--</option>
		   <option value="1">Enero</option> 
		   <option value="2">Febrero</option> 
		   <option value="3">Marzo</option>
		   <option value="4">Abril</option> 
		   <option value="5">Mayo</option> 
		   <option value="6">Junio</option> 
		   <option value="7">Julio</option> 
		   <option value="8">Agosto</option> 
		   <option value="9">Septiembre</option>
		   <option value="10">Octubre</option>
		   <option value="11">Noviembre</option>
		   <option value="12">Diciembre</option>
		</select>
	</div>
	<div class="rowcontact">
		<label>Año*</label>
	</div>		
	<div class="media">
		<input type="text" size="4" name="ano"></input>
	</div>

	<div class="buttons">
		<input type="submit" value="Imprimir" class="btn btn-primary btn-large"></input>
	</div>
</div>
</form>