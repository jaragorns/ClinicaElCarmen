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
				'actions'=>array('vacaciones','Autocomplete','vacio','proveedores','facturas', 
								'AutocompletePro', 'medicamentos'),
				'roles'=>array('Superadmin'),
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
			$bandCan = false; 
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
