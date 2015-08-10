<?php

class GuardiasController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','imprimir'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Guardias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guardias']))
		{
			$model->attributes=$_POST['Guardias'];

			if ($model->validate()) {
				$sql="SELECT fecha_inicio, fecha_fin, datediff(fecha_fin, fecha_inicio) as dias, day(fecha_inicio) as diaIni, 
						 day(fecha_fin) as diaFin, month(fecha_inicio) as mesIni, month(fecha_fin) as mesFin, 
						 year(fecha_inicio) as anoIni, year(fecha_fin) as anoFin  
				  FROM vacaciones
				  WHERE id_usuario = ".$model->id_usuario."
				  		AND ".$model->mes." IN( select 
													DATE_FORMAT(m1, '%m')
													from
													(
													select 
													(fecha_inicio - INTERVAL DAYOFMONTH(fecha_inicio)-1 DAY) 
													+INTERVAL m MONTH as m1
													from
													(
													select @rownum:=@rownum+1 as m from
													    (select 1 union select 2 union select 3 union select 4) t1,
													    (select 1 union select 2 union select 3 union select 4) t2,
													    (select 1 union select 2 union select 3 union select 4) t3,
													    (select 1 union select 2 union select 3 union select 4) t4,
													    (select @rownum:=-1) t0
													) d1,vacaciones where id_usuario=".$model->id_usuario."
													) d2 , vacaciones
													where m1<=fecha_fin AND id_usuario=".$model->id_usuario."
													order by m1)
				  		AND ( year(fecha_inicio)=".$model->ano." OR year(fecha_fin)=".$model->ano.") ";	

				
			$vaca = Yii::app()->db->createCommand($sql)->queryRow();
			
			$Finicio = date_format(date_create($vaca['fecha_inicio']), 'd-m-Y');
			$Ffin = date_format(date_create($vaca['fecha_fin']), 'd-m-Y');

			$band=false; 

				if($vaca['dias']>0){//si esta de vaciones 
					Yii::app()->user->setFlash('notice','Enfermera de VACACIONES del '.$Finicio.' al '.$Ffin);
					if($vaca['mesIni'] == $vaca['mesFin'] && $vaca['anoIni']==$vaca['anoFin']){//meses iguales años iguales
						for ($i=$vaca['diaIni']; $i <=$vaca['diaFin'] ; $i++) { 
							$var = "dia_".$i;	
							$model->$var = 8; 
						}				
						$band = true;	
					}else{//meses diferentes
						if($model->mes==$vaca['mesIni'] && $model->ano==$vaca['anoIni'] ){ //primer mes de vaciones 
							for ($i=$vaca['diaIni']; $i <=31 ; $i++) { 
								$var = "dia_".$i;	
								$model->$var = 8; 
							}	
							$band = true;
						}elseif($model->mes==$vaca['mesFin'] && $model->ano==$vaca['anoFin']){//segundo mes 
							for ($i=1; $i <=$vaca['diaFin'] ; $i++) { 
								$var = "dia_".$i;	
								$model->$var = 8; 
							}
							$band = true;
						}
					}
									
					if ($band==true) {
						$model->save();
						Yii::app()->user->setFlash('success','Guardia creada.');
						$this->redirect(array('admin','mes'=>$model->mes,'ano'=>$model->ano));
					}
				}else{
					$model->save();
					Yii::app()->user->setFlash('success','Guardia creada.');
					$this->redirect(array('admin','mes'=>$model->mes,'ano'=>$model->ano));
				}
				
			}	
		}
				
			

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guardias']))
		{
			$model->attributes=$_POST['Guardias'];
			if($model->save()){
				Yii::app()->user->setFlash('success','Guardia Modificada.');
				$this->redirect(array('admin','mes'=>$model->mes,'ano'=>$model->ano));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Guardias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guardias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guardias']))
			$model->attributes=$_GET['Guardias'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Guardias the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Guardias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionImprimir()
	{
		if(isset($_GET['mes']) && isset($_GET['ano'])){
		
		$mes = $_GET['mes'];
		$ano = $_GET['ano'];

		switch ($mes) {
	    	case 1: $nomMes = "ENERO"; $cantDias = 31; break;
	    	case 2: $nomMes = "FEBRERO"; $cantDias = 28; break;
	    	case 3: $nomMes = "MARZO"; $cantDias = 31; break;
	    	case 4: $nomMes = "ABRIL"; $cantDias = 30; break;
	    	case 5: $nomMes = "MAYO"; $cantDias = 31; break;
	    	case 6: $nomMes = "JUNIO"; $cantDias = 30; break;
	    	case 7: $nomMes = "JULIO"; $cantDias = 31; break;
	    	case 8: $nomMes = "AGOSTO"; $cantDias = 31; break;
	    	case 9: $nomMes = "SEPTIEMBRE"; $cantDias = 30; break;
	    	case 10: $nomMes = "OCTUBRE"; $cantDias = 31; break;
	    	case 11: $nomMes = "NOVIEMBRE"; $cantDias = 30; break;	    
	    	case 12: $nomMes = "DICIEMBRE"; $cantDias = 31; break;	    
		}

		if($mes==2 && esBisiesto($ano)==1)
			$cantDias = 29; 

		//estacion Coord. Enfermeria
		$sqlEn = "SELECT * FROM guardias INNER JOIN usuarios ON id_usuario = id
									   INNER JOIN estaciones ON guardias.id_estacion = estaciones.id_estacion
						WHERE mes=".$mes." AND ano=".$ano." AND guardias.id_estacion = 1
						ORDER by guardias.id_estacion ";
		$dataEn = Yii::app()->db->createCommand($sqlEn)->queryAll();
		$numRegistrosEn = sizeof($dataEn);

		//estacion Pabellon
		$sqlP = "SELECT * FROM guardias INNER JOIN usuarios ON id_usuario = id
									   INNER JOIN estaciones ON guardias.id_estacion = estaciones.id_estacion
						WHERE mes=".$mes." AND ano=".$ano." AND guardias.id_estacion = 2
						ORDER by guardias.id_estacion ";
		$dataP = Yii::app()->db->createCommand($sqlP)->queryAll();
		$numRegistrosP = sizeof($dataP);

		//estacion Emergencia
		$sqlEm = "SELECT * FROM guardias INNER JOIN usuarios ON id_usuario = id
									   INNER JOIN estaciones ON guardias.id_estacion = estaciones.id_estacion
						WHERE mes=".$mes." AND ano=".$ano." AND guardias.id_estacion = 3
						ORDER by guardias.id_estacion ";
		$dataEm = Yii::app()->db->createCommand($sqlEm)->queryAll();
		$numRegistrosEm = sizeof($dataEm);

		//estacion Hospitalizacion 1
		$sqlH1 = "SELECT * FROM guardias INNER JOIN usuarios ON id_usuario = id
									   INNER JOIN estaciones ON guardias.id_estacion = estaciones.id_estacion
						WHERE mes=".$mes." AND ano=".$ano." AND guardias.id_estacion = 4
						ORDER by guardias.id_estacion ";
		$dataH1 = Yii::app()->db->createCommand($sqlH1)->queryAll();
		$numRegistrosH1 = sizeof($dataH1);

		//estacion Hospitalizacion 2
		$sqlH2 = "SELECT * FROM guardias INNER JOIN usuarios ON id_usuario = id
									   INNER JOIN estaciones ON guardias.id_estacion = estaciones.id_estacion
						WHERE mes=".$mes." AND ano=".$ano." AND guardias.id_estacion = 5
						ORDER by guardias.id_estacion ";
		$dataH2 = Yii::app()->db->createCommand($sqlH2)->queryAll();
		$numRegistrosH2 = sizeof($dataH2);


		$sqlTurnos = "SELECT abreviatura FROM turnos"; 
		$dataTurnos = Yii::app()->db->createCommand($sqlTurnos)->queryAll();
				
		$html='
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq">Clínica el Carmen C.A <br> RIF J-09001746-1</td>
					<td class="der">Horario de Trabajo <br> Enfermeria '.$nomMes.' - '.$ano.'</td>
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr><td class="izq2">'.$dataEn[0]['nombre'].'</td></tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq2">NOMBRE:</td>';
						for ($j=1; $j <= $cantDias ; $j++) { //coord. Enfermeria
							$html.='
								<td class="dia">'.$j.'</td>
							';
						}
					$html.='
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">';
				for ($i=0; $i < $numRegistrosEn; $i++) {  //coord. Enfermeria
					$html.='
					<tr>
						<td class="izq2">'.$dataEn[$i]['nombres'].' '.$dataEn[$i]['apellidos'].'</td>';
						for ($j=1; $j <= $cantDias ; $j++) { 					
							$html.='
								<td class="dia">'.turno($dataEn[$i]['dia_'.$j],$dataTurnos).'</td>
							';
						}
					$html.='
					</tr>
					';
				}
			$html.='
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr><td class="izq2">'.$dataP[0]['nombre'].'</td></tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq2">NOMBRE:</td>';
						for ($j=1; $j <= $cantDias ; $j++) { //pabellon
							$html.='
								<td class="dia">'.$j.'</td>
							';
						}
					$html.='
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">';
				for ($i=0; $i < $numRegistrosP; $i++) { //pabellon
					$html.='
					<tr>
						<td class="izq2">'.$dataP[$i]['nombres'].' '.$dataP[$i]['apellidos'].'</td>';
						for ($j=1; $j <= $cantDias ; $j++) { 					
							$html.='
								<td class="dia">'.turno($dataP[$i]['dia_'.$j],$dataTurnos).'</td>
							';
						}
					$html.='
					</tr>
					';
				}
			$html.='
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr><td class="izq2">'.$dataEm[0]['nombre'].'</td></tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq2">NOMBRE:</td>';
						for ($j=1; $j <= $cantDias ; $j++) { //Emergencia
							$html.='
								<td class="dia">'.$j.'</td>
							';
						}
					$html.='
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">';
				for ($i=0; $i < $numRegistrosEm; $i++) { //Emergencia
					$html.='
					<tr>
						<td class="izq2">'.$dataEm[$i]['nombres'].' '.$dataEm[$i]['apellidos'].'</td>';
						for ($j=1; $j <= $cantDias ; $j++) { 					
							$html.='
								<td class="dia">'.turno($dataEm[$i]['dia_'.$j],$dataTurnos).'</td>
							';
						}
					$html.='
					</tr>
					';
				}
			$html.='
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr><td class="izq2">'.$dataH1[0]['nombre'].'</td></tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq2">NOMBRE:</td>';
						for ($j=1; $j <= $cantDias ; $j++) { //Hospitalizacion1
							$html.='
								<td class="dia">'.$j.'</td>
							';
						}
					$html.='
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">';
				for ($i=0; $i < $numRegistrosH1; $i++) { //Hospitalizacion1
					$html.='
					<tr>
						<td class="izq2">'.$dataH1[$i]['nombres'].' '.$dataH1[$i]['apellidos'].'</td>';
						for ($j=1; $j <= $cantDias ; $j++) { 					
							$html.='
								<td class="dia">'.turno($dataH1[$i]['dia_'.$j],$dataTurnos).'</td>
							';
						}
					$html.='
					</tr>
					';
				}
			$html.='
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr><td class="izq2">'.$dataH2[0]['nombre'].'</td></tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">
				<tr>
					<td class="izq2">NOMBRE:</td>';
						for ($j=1; $j <= $cantDias ; $j++) { //Hospitalizacion2
							$html.='
								<td class="dia">'.$j.'</td>
							';
						}
					$html.='
				</tr>
			</table>
			<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;">';
				for ($i=0; $i < $numRegistrosH2; $i++) { //Hospitalizacion2
					$html.='
					<tr>
						<td class="izq2">'.$dataH2[$i]['nombres'].' '.$dataH2[$i]['apellidos'].'</td>';
						for ($j=1; $j <= $cantDias ; $j++) { 					
							$html.='
								<td class="dia">'.turno($dataH2[$i]['dia_'.$j],$dataTurnos).'</td>
							';
						}
					$html.='
					</tr>
					';
				}
			$html.='
			</table>
			';

		$mPDF1 = Yii::app()->ePdf->mpdf('landscape', 'A2','','',15,15,15,'','','');
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/guardias.css');
        $mPDF1->WriteHTML($stylesheet, 1);
		$mPDF1->WriteHTML($html);
		$mPDF1->Output(); 
		}else
			$this->render('imprimir');
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
function esBisiesto($year){
	   return date('L',mktime(1,1,1,1,1,$year));
} 
function turno($value, $dataTurnos)
{
	$numRegistros = sizeof($dataTurnos);

	for($i=0; $i<$numRegistros; $i++){
		if($value==$i+1) $turno = $dataTurnos[$i]; 
	}		
	return $turno['abreviatura'];
}
