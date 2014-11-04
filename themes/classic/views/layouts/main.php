<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title><?php echo CHtml::encode($this->pageTitle);?></title>

    <meta charset="UTF-8">
    <!-- CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.css" rel="stylesheet" type="text/css" >  
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/width-full.css" rel="stylesheet" media="screen" title="default">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/style.css" rel="stylesheet" media="screen">

     <!-- Scripts -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-2.1.1.js"></script>
    <!--<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.js"></script>   -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.cookie.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/lightbox-2.6.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/holder.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/app.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/styleswitcher.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/syntax/shCore.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/syntax/shBrushXml.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/syntax/shBrushJScript.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/comment-reply.min.js?ver=3.9.1" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/e-201430.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/slippry.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/eeditable.js"></script>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/slippry.css" rel="stylesheet" media="screen">
    
        <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
        
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        
    <!-- icon -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/img/favicon.jpg" rel="shortcut icon" type="image/x-icon" />
    <style>
      #map_canvas {
        width: 420px;
        height: 320px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {

       // var myLatlng = new google.maps.LatLng(-25.363882,131.044922);

        var mapCanvas = document.getElementById('map_canvas');
        var mapOptions = {
            center: new google.maps.LatLng(8.032565, -72.262005),
            zoom: 17,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT 
            },
            scaleControl: true,
            overviewMapControlOptions:{opened:true},
            mapTypeId: google.maps.MapTypeId.ROADMAP
            
        }
        
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
              position: new google.maps.LatLng(8.032825, -72.262085),
              map: map,
              title: 'Clínica El Carmen C.A.'
          });
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
    <div class="boxed">
        <header id="header" class="hidden-xs">
            <div class="container">
                <div id="header-title">
                    <h1 class="animated fadeInDown"><a href="<?php echo Yii::app()->baseUrl;?>/index.php">Clínica <span>El Carmen C.A.</span></a></h1>
                    <p class="animated fadeInLeft">J-09001746-1 San Juan de Cólon - Edo. Táchira</p>
                </div>
            </div> <!-- container -->
        </header> <!-- header -->

        <nav class="navbar navbar-static-top navbar-mind" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand visible-xs" href="<?php echo Yii::app()->theme->baseUrl;?>../../../index.php">Clínica <span>El Carmen C.A.</span></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-inverse"></i>
                    </button>
                </div>
                <?php 
                if(Yii::app()->user->getState('nombres')==""){ ?>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <ul id="menu-mainmenu" class="nav navbar-nav">
                        <li id="menu-item-1" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-1 dropdown">
                            <a title="Inicio" href="#" data-toggle="dropdown" class="dropdown-toggle">Inicio <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11">
                                    <a title="Misión y Visión" href="<?php echo Yii::app()->baseUrl;?>/site/MisionVision">Misión y Visión</a>
                                </li>
                                <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                                    <a title="Junta Directiva" href="<?php echo Yii::app()->baseUrl;?>/site/JuntaDirectiva">Junta Directiva</a>
                                </li>
                             </ul>
                        </li>
                        <li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2 dropdown">
                            <a title="Nuestros Servicios" href="<?php echo Yii::app()->baseUrl;?>/site/NuestrosServicios">Nuestros Servicios</a>
                        </li>
                        <li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3 dropdown">
                            <a title="Directorio Médico" href="<?php echo Yii::app()->baseUrl;?>/site/DirectorioMedico">Directorio Médico</a>
                        </li>
                        <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4 dropdown">
                            <a title="Seguros Asociados" href="<?php echo Yii::app()->baseUrl;?>/site/SegurosAsociados">Seguros Asociados</a>
                        </li>
                        <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5">
                            <a title="Galeria" href="<?php echo Yii::app()->baseUrl;?>/site/Galeria">Galeria</a>
                        </li>
                        <li id="menu-item-6" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6">
                            <a title="Contáctenos" href="<?php echo Yii::app()->baseUrl;?>/site/Contactenos">Contáctenos</a>
                        </li>
                    </ul> <!-- nav nabvar-nav -->
                    <!-- Logeo -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrar</a>
                            <div class="dropdown-menu dropdown-login animated fadeInUp">
                                <form role="form" name="loginform" id="login-form" action="/ClinicaElCarmen/site/login.html" method="post">
                                    <h4 class="section-title">Datos de Ingreso</h4>
                                    <div class="form-group">
                                        <div class="input-group login-input">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Usuario" name="LoginForm[username]" id="LoginForm_username">
                                        </div>
                                        <br>
                                        <div class="input-group login-input">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Contraseña" name="LoginForm[password]" id="LoginForm_password">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"  name="rememberme" id="rememberme" value="forever" tabindex="90"> Recuerdame
                                            </label>
                                        </div>
                                        <input type="hidden" name="redirect_to" value="#" />
                                        <input type="hidden" name="testcookie" value="1" />
                                        <button type="submit" class="btn btn-primary pull-right" name="wp-submit" id="wp-submit">Entrar</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>      
                            </div>
                        </li> <!-- dropdown -->
                    </ul> <!-- nav nabvar-nav -->
                
                <?php 
                }if(Yii::app()->user->getState('nombres')!=""){ ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Usuario</a>
                            <div class="dropdown-menu dropdown-profile animated fadeInUp">
                                <h4><?php echo Yii::app()->user->getState('nombres').' '.Yii::app()->user->getState('apellidos');?></h4>
                                <h6><?php echo Yii::app()->user->getState('cargo')." - ".Yii::app()->user->role;?></h6>
                                <a href="<?php echo Yii::app()->baseUrl.'/usuarios/'.Yii::app()->user->id;?>">Perfil</a> | <a href="<?php echo Yii::app()->baseUrl;?>/site/logout"?>Salir</a>
                            </div>
                        </li> <!-- dropdown -->
                     </ul> <!-- nav nabvar-nav -->
                
                    <!-- Menu segun tareas, roles o usuario -->
                    <?php 
                    if(Yii::app()->user->role=="Superadmin"){ ?>
                        <ul id="menu-mainmenu" class="nav navbar-nav">
                            <li id="menu-item-1" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-1 dropdown">
                                <a title="Usuarios" href="<?php echo Yii::app()->baseUrl;?>" data-toggle="dropdown" class="dropdown-toggle">Usuarios <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11">
                                        <a title="Registrar Usuario" href="<?php echo Yii::app()->baseUrl;?>/usuarios/create">Registrar Usuario</a>
                                    </li>
                                    <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                                        <a title="Gestionar Usuarios" href="<?php echo Yii::app()->baseUrl;?>/usuarios/admin">Gestionar Usuarios</a>
                                    </li>
                                 </ul>
                            </li>
                            <!--
                            <li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-2 dropdown">
                                <a title="Roles" href="<?php echo Yii::app()->baseUrl;?>/roles" data-toggle="dropdown" class="dropdown-toggle">Roles <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21">
                                        <a title="Agregar Roles" href="<?php echo Yii::app()->baseUrl;?>/roles/create">Agregar Roles</a>
                                    </li>
                                    <li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22">
                                        <a title="Gestionar Roles" href="<?php echo Yii::app()->baseUrl;?>/roles/admin">Gestionar Roles</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-3 dropdown">
                                <a title="Authitem" href="<?php echo Yii::app()->baseUrl;?>/authitem" data-toggle="dropdown" class="dropdown-toggle">Authitem <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-31" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
                                        <a title="Agregar Authitem" href="<?php echo Yii::app()->baseUrl;?>/authitem/create">Agregar Authitem</a>
                                    </li>
                                    <li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
                                        <a title="Gestionar Authitem" href="<?php echo Yii::app()->baseUrl;?>/authitem/admin">Gestionar Authitem</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-4 dropdown">
                                <a title="Authassignment" href="<?php echo Yii::app()->baseUrl;?>/Authassignment" data-toggle="dropdown" class="dropdown-toggle">Authassignment <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41">
                                        <a title="Agregar Authassignment" href="<?php echo Yii::app()->baseUrl;?>/authassignment/create">Agregar Authassignment</a>
                                    </li>
                                    <li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42">
                                        <a title="Gestionar Authassignment" href="<?php echo Yii::app()->baseUrl;?>/authassignment/admin">Gestionar Authassignment</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-5 dropdown">
                                <a title="Authitemchild" href="<?php echo Yii::app()->baseUrl;?>/authitemchild" data-toggle="dropdown" class="dropdown-toggle">Authitemchild <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-51" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51">
                                        <a title="Agregar Authitemchild" href="<?php echo Yii::app()->baseUrl;?>/authitemchild/create">Agregar Authitemchild</a>
                                    </li>
                                    <li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52">
                                        <a title="Gestionar Authitemchild" href="<?php echo Yii::app()->baseUrl;?>/authitemchild/admin">Gestionar Authitemchild</a>
                                    </li>
                                 </ul>
                            </li>
                            -->
                            <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-6 dropdown">
                                <a title="Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos" data-toggle="dropdown" class="dropdown-toggle">Bancos <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-61" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-61">
                                        <a title="Agregar Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos/create">Agregar Bancos</a>
                                    </li>
                                    <li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62">
                                        <a title="Gestionar Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos/admin">Gestionar Bancos</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-7 dropdown">
                                <a title="Comprobantes" href="<?php echo Yii::app()->baseUrl;?>/comprobantes" data-toggle="dropdown" class="dropdown-toggle">Comprobantes <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71">
                                        <a title="Agregar Comprobante" href="<?php echo Yii::app()->baseUrl;?>/comprobantes/create">Agregar Comprobantes</a>
                                    </li>
                                    <li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72">
                                        <a title="Gestionar Comprobantes" href="<?php echo Yii::app()->baseUrl;?>/comprobantes/admin">Gestionar Comprobantes</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php 
                    }if(Yii::app()->user->role=="Presidente"){ ?>
                        <ul id="menu-mainmenu" class="nav navbar-nav">
                            <li id="menu-item-1" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-1 dropdown">
                                <a title="Usuarios" href="<?php echo Yii::app()->baseUrl;?>" data-toggle="dropdown" class="dropdown-toggle">Usuarios <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11">
                                        <a title="Registrar Usuario" href="<?php echo Yii::app()->baseUrl;?>/usuarios/create">Registrar Usuario</a>
                                    </li>
                                    <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                                        <a title="Gestionar Usuarios" href="<?php echo Yii::app()->baseUrl;?>/usuarios/admin">Gestionar Usuarios</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-6 dropdown">
                                <a title="Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos" data-toggle="dropdown" class="dropdown-toggle">Bancos <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-61" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-61">
                                        <a title="Agregar Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos/create">Agregar Bancos</a>
                                    </li>
                                    <li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62">
                                        <a title="Gestionar Bancos" href="<?php echo Yii::app()->baseUrl;?>/bancos/admin">Gestionar Bancos</a>
                                    </li>
                                 </ul>
                            </li>
                            <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-7 dropdown">
                                <a title="Comprobantes" href="<?php echo Yii::app()->baseUrl;?>/comprobantes" data-toggle="dropdown" class="dropdown-toggle">Comprobantes <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72">
                                        <a title="Gestionar Comprobantes" href="<?php echo Yii::app()->baseUrl;?>/comprobantes/admin">Gestionar Comprobantes</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                <?php } ?>
            </div> <!-- container -->
        </nav> <!-- navbar navbar-static-top navbar-mind -->

        <?php if(isset($this->breadcrumbs) and $this->breadcrumbs!==array()):?>
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                        )); ?><!-- breadcrumbs -->
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class='info' style='text-align:left;'>
            <?php 
                $flashMessages = Yii::app()->user->getFlashes();
                if($flashMessages){
                    echo '<ul class="flashes">';
                    foreach ($flashMessages as $key => $message) {
                        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
                    }
                    echo '</ul>';
                }
            ?>          
        </div>
        
        <?php echo $content;?>          

        <aside id="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="footer-widget-title">Sitemap</h3>
                            <ul id="menu-footer" class="list-unstyled three_cols">
                                <li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100">
                                    <a title="Inicio"href="<?php echo Yii::app()->baseUrl;?>/index.php">Inicio</a>
                                </li>
                                <li id="menu-item-200" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-200">
                                    <a title="Nuestros Servicios" href="<?php echo Yii::app()->baseUrl;?>/site/NuestrosServicios">Servicios</a>
                                </li>
                                <li id="menu-item-300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300">
                                    <a title="Directorio Médico" href="<?php echo Yii::app()->baseUrl;?>/site/DirectorioMedico">Directorio</a>
                                </li>
                                <li id="menu-item-400" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-400">
                                    <a title="Seguros Asociados" href="<?php echo Yii::app()->baseUrl;?>/site/SegurosAsociados">Seguros</a>
                                </li>
                                <li id="menu-item-500" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-500">
                                    <a title="Galeria" href="<?php echo Yii::app()->baseUrl;?>/site/Galeria">Galeria</a>
                                </li>
                                <li id="menu-item-600" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-600">
                                    <a title="Contáctenos" href="<?php echo Yii::app()->baseUrl;?>/site/Contactenos">Contactenos</a>
                                </li>
                            </ul>                    
                        <h3 class="footer-widget-title">Dirección</h3>
                        <address>
                            <p>Carrera 6 Nª 6-55 y 6-65.<br> San Juan de Colón.<br> Estado Táchira - Venezuela.<br>
                            <i class="fa fa-envelope"></i><a href="mailto:clinicaelcarmen.ca@gmail.com"> clinicaelcarmen.ca@gmail.com</a><br>
                            TELEFONOS:<br>
                            <i class="fa fa-phone"></i> <a href="callto://+(58)2772913292">(0277) 291-3292</a><br>
                            <i class="fa fa-phone"></i> <a href="callto://+(58)2772911558">(0277) 291-1558</a><br>
                            <i class="fa fa-phone"></i> <a href="callto://+(58)2772915610">(0277) 291-5610</a><br>
                            <i class="fa fa-phone"></i> <a href="callto://+(58)2772915914">(0277) 291-5914</a><br>
                        </address>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Ubicación</h3>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-body">
                                        <p title="Ubicación de la Clínica El Carmen C.A.">
                                            <i class="fa fa-map-marker"></i> La Clínica El Carmen C.A, se encuentra ubicada en la 
                                            Zona Norte del Estado Táchira del Municipio Ayacucho muy cercana de las principales poblaciones de: 
                                            Coloncito, la Fría, La Grita, San Félix, Michelena, Lobatera, así como también a las poblaciones del 
                                            Sur del Estado Zulia: (Guayabo, Machiques).
                                        </p>
                                    </div>
                                </li>
                            </ul> 
                            <h3 class="footer-widget-title">Cobranzas</h3>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-body">
                                        <p title="Departamento de Cobranza de la Clinica El Carmen C.A.">
                                            <i class="fa fa-user"></i> Persona Contacto: Lorena Medina 
                                            <br><i class="fa fa-envelope"></i><a href="mailto:cobranzascecca@gmail.com"> cobranzascecca@gmail.com</a>  
                                            <br>TELEFONOS:<br>
                                            <i class="fa fa-phone"></i> <a href="callto://+(58)2772915610">(0277) 291-5610</a><br>
                                            <i class="fa fa-phone"></i> <a href="callto://+(58)4247577856">(0424) 757-7856</a><br>
                                        </p>
                                    </div>
                                </li>
                            </ul>                        
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Mapa</h3>
                            <div id="map_canvas"></div>
                            
                        </div>
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </aside> <!-- footer-widgets -->

        <footer id="footer">
            <p>© 2014 <a href="https://www.linkedin.com/in/jsm1108">Jaragorns</a>, Inc. All rights reserved.</p>
        </footer>
    </div> <!-- boxed -->

    <div id="back-top" style="display: block;">
        <a href="#header"><i class="fa fa-chevron-up"></i></a>
    </div>

   
</body>
</html>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 10000).slideUp("slow");',
    CClientScript::POS_READY
);
?>