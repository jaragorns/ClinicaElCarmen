<?php
$this->pageTitle=Yii::app()->name . ' - Galeria';
$this->breadcrumbs=array(
	'Galeria',
);
?>
	<div class="row">
		<h1 class="center-title">Galeria</h1>
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
<!-- JsM
			<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
		      	<ol class="carousel-indicators">
			        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
			        <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
			        <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
		      	</ol>
		      	<div class="carousel-inner">
		        	<div class="item active">
		          		<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca11.jpg" alt="Vista 1 del Patio Central">
		          		<div class="carousel-caption">
		            		<h3>Vista 1 del Patio Central</h3>
		            		<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
		          		</div>
		        	</div>
		        	<div class="item">
		          		<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca2.jpg"  alt="Vista 2 del Patio Central.">
		          		<div class="carousel-caption">
		            		<h3>Vista 2 del Patio Central</h3>
		            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		          		</div>
		        	</div>
		        	<div class="item">
		          		<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/cecca3.jpg" alt="Vista 3 del Patio Central.">
		          		<div class="carousel-caption">
		            		<h3>Vista 3 del Patio Central</h3>
		            		<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
		          		</div>
		        	</div>
		      	</div>
		      	<a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
		        	<span class="glyphicon glyphicon-chevron-left"></span>
		      	</a>
		      	<a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
		        	<span class="glyphicon glyphicon-chevron-right"></span>
		      	</a>
		    </div>
JsM-->				
		<script>
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

