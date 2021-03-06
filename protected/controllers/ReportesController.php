<?php

class ReportesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('vacaciones','Autocomplete','proveedores','facturas', 
								'AutocompletePro', 'medicamentos', 'solicitudes','inventario','AutocompleteMed',
								'asignaciones', 'descargas'),
				'roles'=>array('Superadmin','Jefe_Farmacia','Accionista','Administrador_Admin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('AutocompletePro'),
				'roles'=>array('Farmaceuta'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionVacaciones()
	{
		$mensaje = ""; 
		$bandU = false;
		$bandFechas = false; 

		if(!empty($_GET['id_usuario']) && (isset($_GET['all']) && $_GET['all']==0) && !empty($_GET['fecha_inicio']) && !empty($_GET['fecha_fin'])){

			$id_usuario = $_GET['id_usuario'];
			$fecha_inicio = date_format(date_create($_GET['fecha_inicio']), 'Y-m-d');
			$fecha_fin = date_format(date_create($_GET['fecha_fin']), 'Y-m-d');
			
			$sql = "SELECT * FROM vacaciones WHERE id_usuario=".$id_usuario." AND fecha_inicio BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' ORDER BY nombres";
			$data = Vacaciones::model()->findAllBySql($sql); 
			$tam = count($data);

			if(!empty($data)){
				$html = '
					<table width="100%">
						<tr>
							<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
							<td class="titulo"><b>Reporte de Vacaciones <br> </b></td>
						</tr>
					</table>
					<br><br>
					<table width="100%" cellSpacing=3 cellPadding=5>
						<tr>
							<td class="tamLetra"><b>Empleado: </b>'.Usuarios::model()->findByAttributes(array('id'=>$id_usuario))->NombreCompleto.'</td>
						</tr>
						<tr>
							<td class="tamLetra"><b>Período:</b> '.$_GET['fecha_inicio'].' - '.$_GET['fecha_fin'].' </td>
						</tr>
					</table>
					<br><br><br><br>
					<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
						<tr>
							<th class="header">Fecha Inicio</th>
							<th class="header">Fecha Fin</th>
							<td class="header">D&iacute;as</th>
						</tr>';
						for($i=0; $i<$tam; $i++){
							$dias = date_diff(date_create($data[$i]["fecha_inicio"]),date_create($data[$i]["fecha_fin"]));
							
							$html.='
						<tr>
							<td class="central">'.date_format(date_create($data[$i]["fecha_inicio"]),"d-m-Y").'</td>
							<td class="central">'.date_format(date_create($data[$i]["fecha_fin"]),"d-m-Y").'</td>
							<td class="central">'.$dias->format('%d').'</td>
						</tr>';
						}
					$html.='
					</table>
				'; 

				$mPDF1 = Yii::app()->ePdf->mpdf('','A4',9,'',15,15,15,15,'','');
				$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
				$nombre = "Vacaciones_".$id_usuario.".pdf";
		        $mPDF1->WriteHTML($stylesheet, 1);
				$mPDF1->WriteHTML($html);
				$mPDF1->Output($nombre,'I'); 
			}else{
				Yii::app()->user->setFlash('notice','No hay registro de vacaciones');
				$this->destruir($_GET['id_usuario']); 
				$this->destruir($_GET['fecha_inicio']); 
				$this->destruir($_GET['fecha_fin']); 
				$this->render('vacaciones');
			}			
		}
		if (isset($_GET['all']) && $_GET['all']==1 && !empty($_GET['fecha_inicio']) && !empty($_GET['fecha_fin'])) {
			$fecha_inicio = date_format(date_create($_GET['fecha_inicio']), 'Y-m-d');
			$fecha_fin = date_format(date_create($_GET['fecha_fin']), 'Y-m-d');
			
			$sql = "SELECT * FROM vacaciones WHERE fecha_inicio BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'";
			$data = Vacaciones::model()->findAllBySql($sql); 
			$tam = count($data);
			print_r($sql);
			if(!empty($data)){
				$html = '
					<table width="100%">
						<tr>
							<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
							<td class="titulo"><b>Reporte de Vacaciones <br> </b></td>
						</tr>
					</table>
					<br><br>
					<table width="100%" cellSpacing=3 cellPadding=5>
						<tr>
							<td class="tamLetra"><b>Período:</b> '.$_GET['fecha_inicio'].' - '.$_GET['fecha_fin'].' </td>
						</tr>
					</table>
					<br><br><br><br>
					<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
						<tr>
							<th class="header">Empleado</th>
							<th class="header">Fecha Inicio</th>
							<th class="header">Fecha Fin</th>
							<td class="header">D&iacute;as</th>
						</tr>';
						for($i=0; $i<$tam; $i++){
							$dias = date_diff(date_create($data[$i]["fecha_inicio"]),date_create($data[$i]["fecha_fin"]));
							
							$html.='
						<tr>
							<td class="central">'.Usuarios::model()->findByAttributes(array('id'=>$data[$i]["id_usuario"]))->NombreCompleto.'</td>
							<td class="central">'.date_format(date_create($data[$i]["fecha_inicio"]),"d-m-Y").'</td>
							<td class="central">'.date_format(date_create($data[$i]["fecha_fin"]),"d-m-Y").'</td>
							<td class="central">'.$dias->format('%d').'</td>
						</tr>';
						}
					$html.='
					</table>
				'; 

				$mPDF1 = Yii::app()->ePdf->mpdf('','A4',9,'',15,15,15,15,'','');
				$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
				$nombre = "Vacaciones_generales.pdf";
		        $mPDF1->WriteHTML($stylesheet, 1);
				$mPDF1->WriteHTML($html);
				$mPDF1->Output($nombre,'I'); 
			}else{
				Yii::app()->user->setFlash('notice','No hay registro de vacaciones');
				$this->destruir($_GET['id_usuario']); 
				$this->destruir($_GET['fecha_inicio']); 
				$this->destruir($_GET['fecha_fin']); 
				$this->render('vacaciones');
			}
		}
		else{
			$this->render('vacaciones');				
		}

	}

	public function actionProveedores(){

		$data = Proveedores::model()->findAll(); 
		$tam = count($data);
	
		if(!empty($data)){
			$html = '
				<table width="100%">
					<tr>
						<td class="logoH"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="260"></td>
						<td class="titulo"><b>Reporte de Proveedores<br> </b></td>
					</tr>
				</table>
				<br><br>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Nombre</th>
						<th class="header">RIF</th>
						<td class="header">Tel&eacute;fono</th>
						<td class="header">Direcci&oacute;n</th>
						<td class="header">E-mail</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="central">'.$data[$i]["nombre"].'</td>
						<td class="central">'.$data[$i]["rif"].'</td>
						<td class="central">'.$data[$i]["telefono"].'</td>
						<td class="central">'.$data[$i]["direccion"].'</td>
						<td class="central">'.$data[$i]["email"].'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Proveedores.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 
		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Proveedores');
			$this->redirect("/ClinicaElCarmen/Proveedores/admin"); 
			
		}			
	}

	public function actionFacturas(){

		//reporte general o todos los proveedores sin rango de fecha
		if(isset($_GET["all"]) && ($_GET["all"]==1 || $_GET["allPro"]==1) && empty($_GET["ffd"]) && empty($_GET["ffh"])){
			$sql = "SELECT * FROM facturas ORDER BY fecha_factura, id_proveedor";
			$this->crearPdfFacturas($sql); 
		}
		//proveedor especifico sin rango de fechas
		if(isset($_GET["id_pro"]) && !empty($_GET["id_pro"]) && $_GET["all"]==0 && empty($_GET["ffd"]) && empty($_GET["ffh"])){
			$sql = "SELECT * FROM facturas WHERE id_proveedor=".$_GET["id_pro"] ; 
			$this->crearPdfFacturas($sql); 
		}
		//proveedor especifico en rango de fechas
		if(isset($_GET["id_pro"]) && !empty($_GET["id_pro"]) && $_GET["all"]==0 && $_GET["allPro"]==0 && !empty($_GET["ffd"]) && !empty($_GET["ffh"])){
			
			$fecha_inicio = date_format(date_create($_GET['ffd']), 'Y-m-d');
			$fecha_fin = date_format(date_create($_GET['ffh']), 'Y-m-d');

			$sql = "SELECT * FROM facturas WHERE id_proveedor=".$_GET["id_pro"]." AND 	fecha_factura BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' "; 

			$this->crearPdfFacturas($sql); 
		}
		//todos los proveedores en un rango de fechas, reporte general en rango de fechas
		if( (isset($_GET["ffd"])  && empty($_GET["id_pro"]) && !empty($_GET["ffd"]) && !empty($_GET["ffh"])) || (isset($_GET["ffd"])  && $_GET["allPro"]==1 && !empty($_GET["ffd"]) && !empty($_GET["ffh"]) ) ){
			
			$fecha_inicio = date_format(date_create($_GET['ffd']), 'Y-m-d');
			$fecha_fin = date_format(date_create($_GET['ffh']), 'Y-m-d');

			$sql = "SELECT * FROM facturas WHERE fecha_factura BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' ORDER BY id_proveedor"; 
			$this->crearPdfFacturas($sql); 
		}

		$this->render('facturas');
	}

	public function crearPdfFacturas($sql){
		$data = Facturas::model()->findAllBySql($sql); 
		$tam = count($data);

		if(!empty($data)){

			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte General de Facturas <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Num Factura</th>
						<th class="header">Proveedor</th>
						<th class="header">Fecha Factura</th>
						<td class="header">Total</th>
						<td class="header">Retenci&oacute;n</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="central">'.$data[$i]["num_factura"].'</td>
						<td class="central">'.Proveedores::model()->findByAttributes(array('id_proveedor'=>$data[$i]["id_proveedor"]))->nombre.'</td>
						<td class="central">'.date_format(date_create($data[$i]["fecha_factura"]),"d-m-Y").'</td>
						<td class="central">'.$data[$i]["monto"].'</td>
						<td class="central">'.strtr($data[$i]["retencion"], array("1" => "75%","2" => "100%","3" => "S/R")).'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Facturas.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de facturas');
			unset($_GET["all"]);
			unset($_GET["ffh"]);
			unset($_GET["ffd"]);
			unset($_GET["allPro"]);
			unset($_GET["name"]);

			$this->redirect('facturas');
		}
	}

	public function actionMedicamentos(){

		$campos=" ";
		$bandNom = false; 
		$bandCom = false;
		$bandMed = false; 
		$bandCan = false; 
		$bandPc = false; 
		$bandPs = false; 
		$bandIva = false; 

		if(isset($_GET["nom"]) && $_GET["nom"]==1){
			$campos.=" nombre";
			$bandNom = true; 
		}		
		if(isset($_GET["com"]) && $_GET["com"]==1){
			$campos.=", componente";
			$bandCom = true; 
		}
		if(isset($_GET["med"]) && $_GET["med"]==1){
			$campos.=", unidad_medida";
			$bandMed = true; 
		}
		if(isset($_GET["can"]) && $_GET["can"]==1){
			$campos.=", cantidad";
			$bandCan = true; 
		}
		if(isset($_GET["pc"]) && $_GET["pc"]==1){
			$campos.=", precio_contado";
			$bandPc = true; 
		}			
		if(isset($_GET["ps"]) && $_GET["ps"]==1){
			$campos.=", precio_seguro";
			$bandPs = true; 
		}
		if(isset($_GET["iva"]) && $_GET["iva"]==1){
			$campos.=", iva";
			$bandIva = true; 
		}

		if($bandNom || $bandCom || $bandMed || $bandCan || $bandPc || $bandPs || $bandIva)
			$this->crearPdfMedicamentos($campos, $bandCom, $bandMed, $bandCan, $bandPc, $bandPs, $bandIva);

		$this->render('medicamentos'); 
	}

	public function crearPdfMedicamentos($campos, $bandCom, $bandMed, $bandCan, $bandPc, $bandPs, $bandIva){
		$sql = " SELECT nombre, ".$campos." FROM medicamentos ORDER BY nombre"; 
		$data = Medicamentos::model()->findAllBySql($sql); 
		$tam = count($data);

		if(!empty($data)){

			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte General de Facturas <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Nombre</th>';
						if($bandCom)
						$html.='<th class="header">Complemento</th>';
						if($bandMed)
						$html.='<th class="header">Unidad de Medida</th>';
						if($bandCan)
						$html.='<th class="header">Cantidad</th>';
						if($bandPc)
						$html.='<th class="header">Precio de Contado</th>';
						if($bandPs)
						$html.='<th class="header">Precio de Seguro</th>';
						if($bandIva)
						$html.='<th class="header">% IVA</th>';
					$html.='
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="nombre">'.$data[$i]["nombre"].'</td>';
						if($bandCom)
						$html.='<td class="componente">'.$data[$i]["componente"].'</td>';
						if($bandMed)
						$html.='<td class="unidad">'.UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>$data[$i]["unidad_medida"]))->abreviatura.'</td>';
						if($bandCan)
						$html.='<td class="cantidad">'.$data[$i]["cantidad"].'</td>';
						if($bandPc)
						$html.='<td class="unidad">'.$data[$i]["precio_contado"].'</td>';
						if($bandPs)
						$html.='<td class="unidad">'.$data[$i]["precio_seguro"].'</td>';
						if($bandIva)
						$html.='<td class="cantidad">'.$data[$i]["iva"].'</td>';
					$html.='</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Medicamentos.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Medicamentos');
			$this->redirect('medicamentos');
		}
	}

	public function actionSolicitudes(){
		$sql = "";
		$sql0 = "";
		$sql1 = ""; 
		$sql2 = ""; 
		$sql3 = ""; 
		//si solo selecciono reporte general
		if(isset($_GET["all"]) && $_GET["all"]==1){
			$sql0 = "SELECT * FROM solicitudes"; 

			//si colocó rango de fechas
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql0 = "SELECT * FROM solicitudes WHERE fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
			}

			$bandPendiente = false; 
			$bandProceso = false; 
			$bandProcesadas = false; 

			//si selecciona algun estado filtra por ese estado y verifica si hay rango de fechas
			if( $_GET["allPen"]==1 ){
				$sql1= " SELECT * FROM solicitudes WHERE estado = 0"; 

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql1 = "SELECT * FROM solicitudes WHERE estado = 0 AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandPendiente = true; 
			}				
			if( $_GET["allenPro"]==1 ){
				$sql2= " SELECT * FROM solicitudes WHERE estado = 1"; 

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql2 = "SELECT * FROM solicitudes WHERE estado = 1 AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProceso = true; 
			}
			if( $_GET["allPro"]==1 ){
				$sql3= " SELECT * FROM solicitudes WHERE estado = 2"; 

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql3 = "SELECT * FROM solicitudes WHERE estado = 2 AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProcesadas = true; 
			}

			if($bandPendiente)
				$sql = $sql1;
			if($bandProceso)
				$sql = $sql2;
			if($bandProcesadas)
				$sql = $sql3;
			if($bandPendiente && $bandProceso)
				$sql = $sql1 ." UNION ".$sql2;
			if($bandPendiente && $bandProcesadas)
				$sql = $sql1 ." UNION ".$sql3;
			if($bandProceso && $bandProcesadas)
				$sql = $sql2 ." UNION ".$sql3;
			if($bandPendiente && $bandProceso && $bandProcesadas) 
				$sql = $sql1 ." UNION ".$sql2. " UNION ".$sql3;
			if($bandPendiente==false && $bandProceso==false && $bandProcesadas==false) 
				$sql = $sql0;
			
			$this->crearPdfSolicitudes($sql); 
		}
		if(isset($_GET["reaPor"]) && !empty($_GET["reaPor"])){
			$sql0 = "SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE b.id_estacion = ".$_GET["reaPor"]; 

			//si colocó rango de fechas
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql0 = "SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE b.id_estacion = ".$_GET["reaPor"]." AND a.fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
			}

			$bandPendiente = false; 
			$bandProceso = false; 
			$bandProcesadas = false; 

			//si selecciona algun estado filtra por ese estado y verifica si hay rango de fechas
			if( $_GET["rpPen"]==1 ){
				$sql1= " SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 0 AND b.id_estacion = ".$_GET["reaPor"]; 

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql1 = "SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 0 AND b.id_estacion = ".$_GET["reaPor"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandPendiente = true; 
			}				
			if( $_GET["rpenPro"]==1 ){
				$sql2= " SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 1 AND b.id_estacion = ".$_GET["reaPor"];

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql2 = "SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 1 AND b.id_estacion = ".$_GET["reaPor"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProceso = true; 
			}
			if( $_GET["rpPro"]==1 ){
				$sql3= " SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 2 AND b.id_estacion = ".$_GET["reaPor"];
				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql3 =  "SELECT a.* FROM solicitudes as a JOIN guardias as b 
					ON a.guardias_id_guardia = b.id_guardia 
					 WHERE a.estado = 2 AND b.id_estacion = ".$_GET["reaPor"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProcesadas = true; 
			}

			if($bandPendiente)
				$sql = $sql1;
			if($bandProceso)
				$sql = $sql2;
			if($bandProcesadas)
				$sql = $sql3;
			if($bandPendiente && $bandProceso)
				$sql = $sql1 ." UNION ".$sql2;
			if($bandPendiente && $bandProcesadas)
				$sql = $sql1 ." UNION ".$sql3;
			if($bandProceso && $bandProcesadas)
				$sql = $sql2 ." UNION ".$sql3;
			if($bandPendiente && $bandProceso && $bandProcesadas) 
				$sql = $sql1 ." UNION ".$sql2. " UNION ".$sql3;
			if($bandPendiente==false && $bandProceso==false && $bandProcesadas==false) 
				$sql = $sql0;
			
			$this->crearPdfSolicitudes($sql); 
		}

		if(isset($_GET["reaA"]) && !empty($_GET["reaA"])){
			$sql0 = "SELECT * FROM solicitudes WHERE estacion_id_estacion = ".$_GET["reaA"]; 

			//si colocó rango de fechas
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql0 = "SELECT * FROM solicitudes WHERE estacion_id_estacion = ".$_GET["reaA"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
			}

			$bandPendiente = false; 
			$bandProceso = false; 
			$bandProcesadas = false; 

			//si selecciona algun estado filtra por ese estado y verifica si hay rango de fechas
			if( $_GET["raPen"]==1 ){
				$sql1= " SELECT * FROM solicitudes WHERE estado = 0 AND estacion_id_estacion = ".$_GET["reaA"]; 

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql1 = "SELECT * FROM solicitudes WHERE estado = 0 AND estacion_id_estacion = ".$_GET["reaA"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandPendiente = true; 
			}				
			if( $_GET["raenPro"]==1 ){
				$sql2= " SELECT * FROM solicitudes WHERE estado = 1 AND estacion_id_estacion = ".$_GET["reaA"];

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql2 = "SELECT * FROM solicitudes WHERE estado = 1 AND estacion_id_estacion = ".$_GET["reaA"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProceso = true; 
			}
			if( $_GET["raPro"]==1 ){
				$sql3= " SELECT * FROM solicitudes WHERE estado = 2 AND estacion_id_estacion = ".$_GET["reaA"];

				if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql3 = "SELECT * FROM solicitudes WHERE estado = 2 AND estacion_id_estacion = ".$_GET["reaA"]." AND fecha_solicitud BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
				$bandProcesadas = true; 
			}

			if($bandPendiente)
				$sql = $sql1;
			if($bandProceso)
				$sql = $sql2;
			if($bandProcesadas)
				$sql = $sql3;
			if($bandPendiente && $bandProceso)
				$sql = $sql1 ." UNION ".$sql2;
			if($bandPendiente && $bandProcesadas)
				$sql = $sql1 ." UNION ".$sql3;
			if($bandProceso && $bandProcesadas)
				$sql = $sql2 ." UNION ".$sql3;
			if($bandPendiente && $bandProceso && $bandProcesadas) 
				$sql = $sql1 ." UNION ".$sql2. " UNION ".$sql3;
			if($bandPendiente==false && $bandProceso==false && $bandProcesadas==false) 
				$sql = $sql0;
			
			$this->crearPdfSolicitudes($sql); 
		}


		$this->render('solicitudes'); 
	}

	public function crearPdfSolicitudes($sql){
		$data = Solicitudes::model()->findAllBySql($sql); 
		$tam = count($data);

		if(!empty($data)){
			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte de Solicitudes <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Fecha de Solicitud</th>
						<th class="header">Solicitado A</th>
						<th class="header">Realizado Por</th>
						<th class="header">Estado</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="fecha">'.date_format(date_create($data[$i]["fecha_solicitud"]), "d-m-Y").'</td>
						<td class="fecha">'.Estaciones::model()->findByAttributes(array("id_estacion"=>$data[$i]["estacion_id_estacion"]))->nombre.'</td>
						<td class="reaP">'.Usuarios::model()->findByAttributes(array("id"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data[$i]["guardias_id_guardia"]))->id_usuario))->NombreCompleto.' ( '.Estaciones::model()->findByAttributes(array("id_estacion"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data[$i]["guardias_id_guardia"]))->id_estacion))->nombre.' ) </td>
						<td class="fecha">'.strtr($data[$i]["estado"],array("0"=>"Pendiente", "1"=>"En Proceso", "2"=>"Procesada")).'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Solicitudes.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Solicitudes');
			$this->redirect("solicitudes"); 	
		}
	}

	public function actionInventario(){

		if(isset($_GET["all"]) && $_GET["all"]==1){
			$sql = "SELECT a.cantidad, a.id_medicamento, a.id_estacion, b.nombre FROM stock as a, medicamentos as b WHERE a.id_medicamento = b.id_medicamento AND a.cantidad>0 ORDER BY a.id_estacion, b.nombre ASC"; 
			$this->crearPdfInventario($sql); 
		}

		if(isset($_GET["servicio"]) && !empty($_GET["servicio"])) {
			$sql = "SELECT a.cantidad, a.id_medicamento, a.id_estacion, b.nombre FROM stock as a, medicamentos as b WHERE a.id_medicamento = b.id_medicamento AND a.id_estacion = ".$_GET["servicio"]." AND a.cantidad>0 ORDER BY a.id_estacion, b.nombre ASC"; 
			if(!empty($_GET["id_medicamento"])){
				$sql = "SELECT a.cantidad, a.id_medicamento, a.id_estacion, b.nombre FROM stock as a, medicamentos as b WHERE a.id_medicamento = b.id_medicamento AND a.id_medicamento = ".$_GET["id_medicamento"]." AND a.id_estacion = ".$_GET["servicio"]." AND a.cantidad>0 ORDER BY a.id_estacion, b.nombre ASC"; 
			}
			$this->crearPdfInventario($sql); 
		}
		if(isset($_GET["id_medicamento"]) && !empty($_GET["id_medicamento"])) {
			$sql = "SELECT a.cantidad, a.id_medicamento, a.id_estacion, b.nombre FROM stock as a, medicamentos as b WHERE a.id_medicamento = b.id_medicamento AND a.id_medicamento = ".$_GET["id_medicamento"]." AND a.cantidad>0 ORDER BY a.id_estacion, b.nombre ASC"; 
			$this->crearPdfInventario($sql); 
		}

		$this->render('inventario'); 
	}

	public function crearPdfInventario($sql){
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$dataReader = $command->query();
		$data = $dataReader->readAll();
		
		$tam = count($data);

		if(!empty($data)){
			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte de Inventario <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Medicamento</th>
						<th class="header">Cantidad</th>
						<th class="header">Servicio</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="nombre">'.$data[$i]["nombre"].'</td>
						<td class="unidad">'.$data[$i]["cantidad"].'</td>
						<td class="componente">'.Estaciones::model()->findByAttributes(array("id_estacion"=>$data[$i]["id_estacion"]))->nombre.'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Inventario.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Inventario');
			$this->redirect("inventario"); 	
		}

	}

	public function actionAsignaciones(){

		if(isset($_GET["all"]) && $_GET["all"]==1){
			$sql = "SELECT * FROM bitacora_stock";
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql = "SELECT *  FROM bitacora_stock WHERE CAST(fecha as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
			}
			$this->crearPdfAsignaciones($sql);
		}
		if(isset($_GET["id_usuario"]) && !empty($_GET["id_usuario"])){
			$sql = "SELECT * FROM bitacora_stock WHERE id_usuario = ".$_GET["id_usuario"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql = "SELECT * FROM bitacora_stock WHERE id_usuario = ".$_GET["id_usuario"]." AND CAST(fecha as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
			$this->crearPdfAsignaciones($sql);
		}
		if(isset($_GET["reaPor"]) && !empty($_GET["reaPor"])){
			$sql = "SELECT * FROM bitacora_stock WHERE id_estacion_origen = ".$_GET["reaPor"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql = "SELECT * FROM bitacora_stock WHERE id_estacion_origen = ".$_GET["reaPor"]." AND CAST(fecha as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
			$this->crearPdfAsignaciones($sql);
		}
		if(isset($_GET["reaA"]) && !empty($_GET["reaA"])){
			$sql = "SELECT * FROM bitacora_stock WHERE id_estacion_destino = ".$_GET["reaA"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql = "SELECT * FROM bitacora_stock WHERE id_estacion_destino = ".$_GET["reaA"]." AND CAST(fecha as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
			$this->crearPdfAsignaciones($sql);
		}
		if(isset($_GET["id_medicamento"]) && !empty($_GET["id_medicamento"])){
			$sql = "SELECT * FROM bitacora_stock WHERE id_medicamento = ".$_GET["id_medicamento"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
					$sql = "SELECT * FROM bitacora_stock WHERE id_medicamento = ".$_GET["id_medicamento"]." AND CAST(fecha as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' "; 
				}
			$this->crearPdfAsignaciones($sql);
		}
		$this->render('asignaciones'); 
	}

	public function crearPdfAsignaciones($sql){
		$data = BitacoraStock::model()->findAllBySql($sql); 
		$tam = count($data);

		if(!empty($data)){
			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte de Asignaciones <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Usuario</th>
						<th class="header">Servicio Origen</th>
						<th class="header">Servicio Destino</th>
						<th class="header">Medicamento</th>
						<th class="header">Cantidad</th>
						<th class="header">Fecha</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="fecha">'.Usuarios::model()->findByAttributes(array("id"=>$data[$i]["id_usuario"]))->NombreCompleto.'</td>
						<td class="servicio">'.Estaciones::model()->findByAttributes(array("id_estacion"=>$data[$i]["id_estacion_origen"]))->nombre.'</td>
						<td class="servicio">'.Estaciones::model()->findByAttributes(array("id_estacion"=>$data[$i]["id_estacion_destino"]))->nombre.'</td>
						<td class="medicamento">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->nombre.'</td>
						<td class="cantidadAS">'.$data[$i]["cantidad"].' ('.UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->unidad_medida))->descripcion.')</td>
						<td class="fecha">'.date_format(date_create($data[$i]["fecha"]), "d-m-Y g:ia") .'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Asignaciones.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Asignaciones');
			$this->redirect("asignaciones"); 	
		}
	}

	public function actionDescargas(){

		if(isset($_GET["all"]) && $_GET["all"]==1){
			$sql = "SELECT * FROM bitacora_descargas";
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql = "SELECT * FROM bitacora_descargas WHERE CAST(fecha_hora as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' ";
			}
			$this->crearPdfDescargas($sql); 
		}

		if(isset($_GET["servicio"]) && !empty($_GET["servicio"])){
			$sql = "SELECT a.* FROM bitacora_descargas as a JOIN stock as b ON a.id_stock = b.id_stock WHERE b.id_estacion = ".$_GET["servicio"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql = "SELECT a.* FROM bitacora_descargas as a JOIN stock as b ON a.id_stock = b.id_stock WHERE b.id_estacion=".$_GET["servicio"]." AND CAST(a.fecha_hora as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' ";
			}
			$this->crearPdfDescargas($sql); 
		}
		if(isset($_GET["id_usuario"]) && !empty($_GET["id_usuario"])){
			$sql = "SELECT a.* FROM bitacora_descargas as a JOIN guardias as b ON a.id_guardia = b.id_guardia WHERE b.id_usuario = ".$_GET["id_usuario"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql = "SELECT a.* FROM bitacora_descargas as a JOIN guardias as b ON a.id_guardia = b.id_guardia WHERE b.id_usuario=".$_GET["id_usuario"]." AND CAST(a.fecha_hora as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' ";
			}
			$this->crearPdfDescargas($sql); 
		}
		if(isset($_GET["id_medicamento"]) && !empty($_GET["id_medicamento"])){
			$sql = "SELECT a.* FROM bitacora_descargas as a JOIN stock as b ON a.id_stock = b.id_stock WHERE b.id_medicamento = ".$_GET["id_medicamento"];
			if(!empty($_GET["ffd"]) && !empty($_GET["ffh"])){
				$sql = "SELECT a.* FROM bitacora_descargas as a JOIN stock as b ON a.id_stock = b.id_stock WHERE b.id_medicamento=".$_GET["id_medicamento"]." AND CAST(a.fecha_hora as DATE) BETWEEN '".date_format(date_create($_GET['ffd']), 'Y-m-d')."' AND '".date_format(date_create($_GET['ffh']), 'Y-m-d')."' ";
			}
			$this->crearPdfDescargas($sql); 
		}

		$this->render('descargas');
	}

	public function crearPdfDescargas($sql){
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$dataReader = $command->query();
		$data = $dataReader->readAll();

		$tam = count($data);

		if(!empty($data)){
			$html = '
				<table width="100%">
					<tr>
						<td class="logo"><img src="'.Yii::app()->theme->baseUrl.'/img/pre.png" height="120" width="160"></td>
						<td class="titulo"><b>Reporte de Asignaciones <br> </b></td>
					</tr>
				</table>
				<br><br>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
					<tr>
						<th class="header">Servicio</th>
						<th class="header">Usuario</th>
						<th class="header">Medicamento</th>
						<th class="header">Cantidad</th>
						<th class="header">Fecha</th>
					</tr>';
					for($i=0; $i<$tam; $i++){
						$html.='
					<tr>
						<td class="fecha">'.Estaciones::model()->findByAttributes(array("id_estacion"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data[$i]["id_guardia"]))->id_estacion))->nombre.'</td>
						<td class="servicio">'.Usuarios::model()->findByAttributes(array("id"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data[$i]["id_guardia"]))->id_usuario))->NombreCompleto.'</td>
						<td class="medicamento">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>Stock::model()->findByAttributes(array("id_stock"=>$data[$i]["id_stock"]))->id_medicamento))->nombre.'</td>
						<td class="cantidadAS">'.$data[$i]["cantidad"].' ('.UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>Stock::model()->findByAttributes(array("id_stock"=>$data[$i]["id_stock"]))->id_medicamento))->unidad_medida))->descripcion.')</td>
						<td class="fecha">'.date_format(date_create($data[$i]["fecha_hora"]), "d-m-Y g:ia") .'</td>
					</tr>';
					}
				$html.='
				</table>
			'; 

			$mPDF1 = Yii::app()->ePdf->mpdf('','A4-L',9,'',15,15,15,15,'','');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/reportes.css');
			$nombre = "Reporte_Descargas.pdf";
	        $mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML($html);
			$mPDF1->Output($nombre,'I'); 

		}else{
			Yii::app()->user->setFlash('notice','No hay registro de Descargas');
			$this->redirect("descargas"); 	
		}
	}

	public function actionAutocomplete($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->compare('LOWER(nombres)', strtolower($_GET['term']), true);
		$criteria->order = 'nombres';
		$criteria->limit = 10; 
		$data = Usuarios::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
	   			$arr[] = array(
	    			'id_usuario' => $item->id,
	    			'value' => $item->NombreCompleto,
	   			);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'id' => '',
	   			'value' => 'El usuario no existe, por favor verifíque.',
	   			'label' => 'El usuario no existe, por favor verifíque.',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}

	public function actionAutocompleteMed($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		$data = Medicamentos::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
	   			$arr[] = array(
	    			'id_medicamento' => $item->id_medicamento,
	    			'value' => $item->nombre,
	   			);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'id' => '',
	   			'value' => 'El medicamento no existe, por favor verifíque.',
	   			'label' => 'El medicamento no existe, por favor verifíque.',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}

	public function actionAutocompletePro($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		$data = Proveedores::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
	   			$arr[] = array(
	    			'id_pro' => $item->id_proveedor,
	    			'value' => $item->nombre,
	   			);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'id' => '',
	   			'value' => 'El proveedor no existe, por favor verifíque.',
	   			'label' => 'El proveedor no existe, por favor verifíque.',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}
	
	public function destruir($var){
		$var = "";
		unset($var);
	}

	/**
	 * Performs the AJAX validation.
	 * @param Guardias $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guardias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
