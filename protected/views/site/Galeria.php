<?php
$this->pageTitle=Yii::app()->name . ' - Galeria';
$this->breadcrumbs=array(
	'Galeria',
);
?>
	<div class="row">
		<h1 class="center-title">Galeria</h1>
		<!-- JsM jQuerry 
			<ul id="css-demo">
				<li>
					<a href="#slide1">
				    	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca1.jpg" alt="Vista 1 del Patio Central">
				    </a>
				</li>
				<li>
					<a href="#slide2">
				    	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca2.jpg"  alt="Vista 2 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide3">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca3.jpg" alt="Vista 3 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide4">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca4.jpg" alt="Sala de Espera - Emergencia.">
				    </a>
				</li>
				<li>
				    <a href="#slide5">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca5.jpg" alt="Pasillo Lateral 1 - Oficinas Administrativas.">
				    </a>
				</li>
				<li>
				    <a href="#slide6">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca6.jpg" alt="Sala de Espera - Emergencia.">
				    </a>
				</li>
				<li>
				    <a href="#slide7">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca7.jpg" alt="Vista 4 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide8">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca8.jpg" alt="Pasillo Piso 3 - Habitaciones.">
				    </a>
				</li>
			</ul>
			
			JsM -->
			<ul id="jquery-demo">
			  	<li>
					<a href="#slide1">
				    	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca11.jpg" alt="Vista 1 del Patio Central">
				    </a>
				</li>
				<li>
					<a href="#slide2">
				    	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca2.jpg"  alt="Vista 2 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide3">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca3.jpg" alt="Vista 3 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide4">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca4.jpg" alt="Sala de Espera - Emergencia.">
				    </a>
				</li>
				<li>
				    <a href="#slide5">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca5.jpg" alt="Pasillo Lateral 1 - Oficinas Administrativas.">
				    </a>
				</li>
				<li>
				    <a href="#slide6">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca6.jpg" alt="Sala de Espera - Emergencia.">
				    </a>
				</li>
				<li>
				    <a href="#slide7">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca7.jpg" alt="Vista 4 del Patio Central.">
				    </a>
				</li>
				<li>
				    <a href="#slide8">
				      	<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca8.jpg" alt="Pasillo Piso 3 - Habitaciones.">
				    </a>
				</li>
			</ul>
			
		<script>
		/*JsM
			jQuery('#css-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box css-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: true, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'horizontal',
			  speed: 2000,

			});
			JsM*/
			jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: true, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: true,
			  transition: 'horizontal',
			  speed:1000
			});
			
		</script>
	</div>

