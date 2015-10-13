<?php

class SolicitudesController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','create','update','admin','delete','autocomplete','adminPendiente','viewPendiente','AjaxEditColumn', 'ajaxeditcolumnAsig'),
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

	public function actionViewPendiente($id)
	{
		$this->render('viewPendiente',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$deGuardia = $this->verificarGuardia(); 
		$model=new Solicitudes;

		if(!empty($deGuardia)){
			
			$items_0 = new ItemSolicitud;
			$items_1 = new ItemSolicitud;
			$items_2 = new ItemSolicitud;
			$items_3 = new ItemSolicitud;
			$items_4 = new ItemSolicitud;
			$items_5 = new ItemSolicitud;
			$items_6 = new ItemSolicitud;
			$items_7 = new ItemSolicitud;
			$items_8 = new ItemSolicitud;
			$items_9 = new ItemSolicitud;

			if(isset($_POST['Solicitudes'])){

				$model->attributes=$_POST['Solicitudes'];
				$items_0->attributes=$_POST['ItemSolicitud'][0];
				$items_1->attributes=$_POST['ItemSolicitud'][1];
				$items_2->attributes=$_POST['ItemSolicitud'][2];
				$items_3->attributes=$_POST['ItemSolicitud'][3];
				$items_4->attributes=$_POST['ItemSolicitud'][4];
				$items_5->attributes=$_POST['ItemSolicitud'][5];
				$items_6->attributes=$_POST['ItemSolicitud'][6];
				$items_7->attributes=$_POST['ItemSolicitud'][7];
				$items_8->attributes=$_POST['ItemSolicitud'][8];
				$items_9->attributes=$_POST['ItemSolicitud'][9];

				$model->fecha_solicitud = date("Y-m-d"); 
				$model->estado = 0; //Pendiente				

				if($model->validate()){
					//calcular el id de la nueva solicitud
					$id = Yii::app()->db->createCommand('SELECT MAX(id_solicitud) as id FROM solicitudes')->queryRow();
					$id = $id['id']+1;	
					
					$items_0->id_solicitud = $id;
					$items_1->id_solicitud = $id;
					$items_2->id_solicitud = $id;
					$items_3->id_solicitud = $id;
					$items_4->id_solicitud = $id;
					$items_5->id_solicitud = $id;
					$items_6->id_solicitud = $id;
					$items_7->id_solicitud = $id;
					$items_8->id_solicitud = $id;
					$items_9->id_solicitud = $id;

					$items_0->estado = 0; 
					$items_1->estado = 0; 
					$items_2->estado = 0; 
					$items_3->estado = 0; 
					$items_4->estado = 0; 
					$items_5->estado = 0; 
					$items_6->estado = 0; 
					$items_7->estado = 0; 
					$items_8->estado = 0; 
					$items_9->estado = 0; 

					$cont = 0; 
					$contMalos = 0; 
					$band = array(0,0,0,0,0,0,0,0,0,0);

					if($items_0->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_0)){
							$cont++;
							$band[0]=1;
						}else
							$contMalos++;
					}
					if($items_1->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_1)){
							$band[1]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_2->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_2)){
							$band[2]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_3->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_3)){
							$band[3]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_4->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_4)){
							$band[4]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_5->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_5)){
							$band[5]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_6->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_6)){
							$band[6]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_7->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_7)){
							$band[6]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_8->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_8)){
							$band[8]=1;
							$cont++;
						}else
							$contMalos++;					
					}
					if($items_9->validate()){
						if($this->validarMedicamento($model->estacion_id_estacion,$items_9)){
							$band[9]=1;
							$cont++;
						}else
							$contMalos++;					
					}

					
					if($contMalos==0 && $cont>0){
						$model->save();
						if($band[0]==1)	$items_0->save(); 
						if($band[1]==1)	$items_1->save(); 
						if($band[2]==1)	$items_2->save(); 
						if($band[3]==1)	$items_3->save(); 
						if($band[4]==1)	$items_4->save(); 
						if($band[5]==1)	$items_5->save(); 
						if($band[6]==1)	$items_6->save(); 
						if($band[7]==1)	$items_7->save(); 
						if($band[8]==1)	$items_8->save(); 
						if($band[9]==1)	$items_9->save(); 
						Yii::app()->user->setFlash('success','Solicitud Creada');
						$this->redirect(array('view','id'=>$model->id_solicitud));
					}							
					else if ($cont==0)
						Yii::app()->user->setFlash('error','Debe indicar al menos un medicamento');
					else
						echo "Acomodar la solicitud o continuar sin ese medicamento"; 
				}
								
			}
		}else{
			Yii::app()->user->setFlash('notice','Debe estar de guardia para poder realizar solicitudes');
			$this->redirect(array('admin'));			
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$this->render('create',array(
			'model'=>$model,
			'items_0'=>$items_0,
			'items_1'=>$items_1,
			'items_2'=>$items_2,
			'items_3'=>$items_3,
			'items_4'=>$items_4,
			'items_5'=>$items_5,
			'items_6'=>$items_6,
			'items_7'=>$items_7,
			'items_8'=>$items_8,
			'items_9'=>$items_9,
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

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_solicitud));
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
		$dataProvider=new CActiveDataProvider('Solicitudes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Solicitudes('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Solicitudes']))
			$model->attributes=$_GET['Solicitudes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminPendiente()
	{
		$model=new Solicitudes('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Solicitudes']))
			$model->attributes=$_GET['Solicitudes'];

		$this->render('adminPendiente',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Solicitudes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Solicitudes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Solicitudes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitudes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function verificarGuardia(){
	
		//asignacion zona horaria	
		date_default_timezone_set("America/Caracas");
		//consulto si la persona logueada esta de guardia hoy para poder hacer solicitudes
		$dia = "dia_".date("j");
		$hora = date("G:i"); //hora en minutos y segundos

		if(strtotime($hora) > strtotime("00:00") && strtotime($hora) < strtotime("07:00")){
			$dia = "dia_".(date("j")-1);
		}
		//cambiar el dia y el id
		//$sql = "SELECT id_guardia, id_usuario, id_estacion FROM guardias WHERE mes=".date('n')." AND ano=".date('Y')." AND id_usuario=".Yii::app()->user->id." AND ".$dia."!=1 "; 
		$sql = "SELECT id_guardia, id_usuario, id_estacion, ".$dia." 
				FROM guardias 
				WHERE mes=7
						AND ano=".date('Y')." 
						AND id_usuario=999765
						AND ".$dia."!=1 "; 

		$deGuardia = Guardias::model()->findAllBySql($sql);

		$pos = 0; 
		$band=false; 
		//buscar de acuerdo a la hora donde esta
				
		$hora = date("G:i"); //hora en minutos y segundos
		$turno = 1; 

		if(dentro_de_horario("07:00","13:00",$hora)==1)
			$turno = 2; 
		elseif(dentro_de_horario("13:00","19:00",$hora)==1)
			$turno = 3;
		elseif(dentro_de_horario("19:00","07:00",$hora)==1){
			$turno = 4;
		}elseif(dentro_de_horario("07:00","15:00",$hora)==1)
			$turno = 5;

		for($i=0; $i<count($deGuardia); $i++){
			if($deGuardia[$i]->$dia==$turno){
				//echo "ESTA de guardia EN ".$deGuardia[$i]->id_estacion;
				$pos = $i;
				$band = true; 
			}		
		}

		if($band)
			return $deGuardia[$pos];
		else
			return $deGuardia="";
	}

	public function validarMedicamento($id_estacion, $item){
		//busco que el medicamento seleccionado este disponible en el servicio
		$stock = Stock::model()->findByAttributes(array('id_estacion'=>$id_estacion,  
															'id_medicamento'=>$item->id_medicamento));
		
		//si la busqueda existe y la cantidad del medicamento es mayor que 0 
		if(!empty($stock) && $stock->cantidad>0){
			if(!empty($item->cantidad) && ($item->cantidad > $stock->cantidad)){
				echo "NO HAY SUFICIENTE <br>"; 
				return false; 
				//Yii::app()->user->setFlash('error','La cantidad solicitada de '.Medicamentos::model()->findByAttributes(array('id_medicamento'=>$item->id_medicamento))->nombre.' no está disponible en el Servicio');
			}else{
				$item->id_stock = $stock->id_stock;
				return true; 
			}
		}else{	
			//Yii::app()->user->setFlash('error','El medicamento '.Medicamentos::model()->findByAttributes(array('id_medicamento'=>$item->id_medicamento))->nombre.' no está disponible en el Servicio');
			echo "NO HAY <br>"; 
			$item->id_stock="";
			$item->cantidad="";
			$item->id_medicamento="";
			return false; 
		}
		
	}

	public function actionAjaxEditColumn(){
		$id_item_solicitud   = $_POST["keyvalue"];  
        $name       = $_POST["name"]; 		//ESTADO
        $old_value  = $_POST["old_value"];  //"0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"
        $new_value  = $_POST["new_value"];  //"0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"
 

	    //Do some stuff here, and return the value to be displayed..
        $model = ItemSolicitud::model()->findByPk($id_item_solicitud);
        
        //LO PUEDE CAMBIAR DE ESTADO (APROBADO) SOLO SI YA ASIGNADO UNA CANTIDAD EN EL CAMPO CANTIDAD
        // ES DECIR QUE ESTE EN LA BITACORA STOCK 
        if($name == "estado" && SolicitudesController::verificarGuardia()->id_estacion){

        	if($new_value == 1){ //SI APRUEBA LA SOLICITUD
        		$exist_bitacora = BitacoraStock::model()->findByAttributes(array('id_item_solicitud'=>$id_item_solicitud)); 
        		//si existe un registro en la bitacora para ese itemo
        		if(!empty($exist_bitacora)){


        		}else{
        			$new_value = 0;
        		}
        		//Hacer el cambio en Stock
        	}
        	$model->saveAttributes(array('estado'=>$new_value));

        	//BUSCAR TODAS LOS ITEM_SOLCITUD DE UNA SOLCITUD Y VER SUS ESTADOS CON EL FIN DE (UPDATE ESTADO DE LA SOLICITUD)
        	$items_solicitud = ItemSolicitud::model()->findAll(array('condition'=>'id_solicitud='.$model->id_solicitud));
	  	
		  	$cont_1 = 0;
		  	$cont_2 = 0;

		  	foreach ($items_solicitud as $key => $value) {
		  		if($value->estado=="0"){
		  			$cont_1++;	
		  		}else{
		  			$cont_2++;
		  		}
		  	}

		  	if($cont_1 > 0){
		  		$solicitud = Solicitudes::model()->findByPk($model->id_solicitud);
		  		$solicitud->saveAttributes(array('estado'=>1));
		  	}
		  	if($cont_2 == count($items_solicitud)){
		  		$solicitud = Solicitudes::model()->findByPk($model->id_solicitud);
		  		$solicitud->saveAttributes(array('estado'=>2));
		  	}
		  	
        }        
		echo $new_value;	
    }
    
    public function actionAjaxEditColumnAsig(){

		$id_item_solicitud   = $_POST["keyvalue"];  
        $name       = $_POST["name"]; 		
        $old_value  = $_POST["old_value"];  
        $new_value  = $_POST["new_value"];  

      	$model = ItemSolicitud::model()->findByPk($id_item_solicitud);
      	//modelo de tipo solicitud dnd tengo los datos necesarios para asignar excepto la estacion
        $modelSolicitud = Solicitudes::model()->findByAttributes(array('id_solicitud'=>$model->id_solicitud)); 
        //obtengo la estacion de quien me hizo la solicitud y a donde voy a asignar por medio de la guardia.
        $estacion = Guardias::model()->findByPk($modelSolicitud->guardias_id_guardia)->id_estacion;

      	//Creando registro en bitacora
       	$band = $this->registro_bitacora($model->id_medicamento, $new_value, $estacion, SolicitudesController::verificarGuardia()->id_estacion, $model->id_item_solicitud); 

       	if($band){
			echo $new_value;
		}else{
			$old_value = BitacoraStock::model()->findByAttributes(array('id_item_solicitud'=>$model->id_item_solicitud))->cantidad; 
			echo $old_value;
		}	
    }

    public function Asignar($id_medicamento, $cantidad_asignar, $estacion_destino, $estacion_origen)
	{
		
		if(Yii::app()->user->role=="Farmacia"){
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= 6";
		}else{
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= ".$estacion_origen;
		}
		$result = Stock::model()->findAllBySql($sql);

		//SI LA CANTIDAD A ASIGNAR ES MAYOR A LA EXISTENCIA
		if($cantidad_asignar > $result['0']['cantidad']){

		}else{ 
			//SE PROCEDE A BUSCAR SI EXISTE CANTIDAD DEL MEDICAMENTO EN LA ESTACION A ASIGNAR.
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= ".$estacion_destino;
			$cantidad_servicio = Stock::model()->findAllBySql($sql);

			$cantidad_nueva = $result['0']['cantidad'] - $cantidad_asignar;

			//CANTIDAD NUEVA PARA EL SERVICIO QUE ASIGNO
			if(Yii::app()->user->role=="Farmacia"){
				$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= 6";
				$execute = Yii::app()->db->createCommand($sql)->execute();
			}else{
				$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= ".$estacion_origen;
				$execute = Yii::app()->db->createCommand($sql)->execute();
			}

			if($cantidad_servicio){
				//CANTIDAD NUEVA PARA EL SERVICIO QUE RECIBIO (((UPDATE)))
				$cant_asignar = $cantidad_servicio['0']['cantidad'] + $cantidad_asignar;
				$sql = "UPDATE `stock` SET `cantidad`=".$cant_asignar." WHERE `id_medicamento` =".$id_medicamento." AND `id_estacion`= ".$estacion_destino;
				$execute = Yii::app()->db->createCommand($sql)->execute();
				
			}else{
				$model_stock = new Stock;
				$model_stock->id_medicamento = $id_medicamento;
				$model_stock->id_estacion = $estacion_destino;
				$model_stock->cantidad = $cantidad_asignar;
				$model_stock->save();
			}
		}

	}

	public function registro_bitacora($id_medicamento, $cantidad_asignar, $estacion_destino, $estacion_origen, $item){
		$model_bitacora = new BitacoraStock;
		$model_bitacora->id_usuario = Yii::app()->user->id;
		$model_bitacora->id_estacion_origen = $estacion_origen;
		$model_bitacora->id_estacion_destino = $estacion_destino;
		$model_bitacora->id_medicamento = $id_medicamento;
		$model_bitacora->cantidad = $cantidad_asignar;
		$model_bitacora->fecha = date('Y-m-d H:i:s');
		$model_bitacora->id_item_solicitud = $item;
		$model_bitacora->estado = 1; 

		$exist = BitacoraStock::model()->findByAttributes(array('id_item_solicitud'=>$item));

		if(empty($exist)){
			$model_bitacora->save();
			return true;
		}else{
			return false;
		}
		
	}
}

function dentro_de_horario($hms_inicio, $hms_fin, $hms_referencia){ // v2011-06-21
	    if( is_null($hms_referencia) ){
	        $hms_referencia = date('G:i:s');
	    }

	    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_inicio), 3, 0);
	    $s_inicio = 3600*$h + 60*$m + $s;

	    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_fin), 3, 0);
	    $s_fin = 3600*$h + 60*$m + $s;

	    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_referencia), 3, 0);
	    $s_referencia = 3600*$h + 60*$m + $s;

	    if($s_inicio<=$s_fin){
	        return $s_referencia>=$s_inicio && $s_referencia<=$s_fin;
	    }else{
	        return $s_referencia>=$s_inicio || $s_referencia<=$s_fin;
	    }
}
