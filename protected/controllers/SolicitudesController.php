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
				'actions'=>array('index','view','create','update','admin','delete','autocomplete'),
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

		$deGuardia = $this->verificarGuardia(); 
				
		if(!empty($deGuardia)){

			$model = new Solicitudes;
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Solicitudes']))
			{
				$model->attributes=$_POST['Solicitudes'];
				
				if($model->validate()){

					//busco que el medicamento seleccionado este disponible en el servicio
					$sql = "SELECT * FROM stock WHERE id_estacion=".$model->estacion_id_estacion." AND id_medicamento=".$model->stock_id_stock; 
					$stock = Stock::model()->findBySql($sql); 

					if(!empty($stock) && $stock->cantidad>0){
						//Si le digo la cantidad que solicito reviso si existe esa cantidad en la estacion 
						if(!empty($model->cantidad) && ($model->cantidad > $stock->cantidad))
							Yii::app()->user->setFlash('error','La cantidad solicitada no está disponible en el Servicio');
						else{
							$model->stock_id_stock = $stock->id_stock; 
							$model->fecha_solicitud = date("Y-m-d"); 
							$model->estado = 0; 
							$model->save();
							$this->redirect(array('view','id'=>$model->id_solicitud)); 
						}
					}else{
						Yii::app()->user->setFlash('error','El medicamento no está disponible en el Servicio');
					}
				}
			}

			$this->render('create',array(
				'model'=>$model,
			));
			
		}else{
			Yii::app()->user->setFlash('success','Debe estar de guardia para poder realizar solicitudes');
			$this->redirect(array('index'));			
		}

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

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
	
	/*public function actionIndex($id_usuario)
	{
		$dataProvider=new CActiveDataProvider('Solicitudes',array('criteria'=>array('condition'=>'usuarios='.$id_usuario)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/
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

	public function actionAutocomplete($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->join = "RIGHT JOIN stock ON stock.id_medicamento = t.id_medicamento"; 
		$criteria->condition = "cantidad>0";
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		
		$data = Medicamentos::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
	   			$arr[] = array(
	    			'stock_id_stock' => $item->id_medicamento,
	    			'value' => $item->nombre,
	   			);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'stock_id_stock' => '',
	   			'value' => 'El medicamento no existe, por favor verifíque.',
	   			'label' => 'El medicamento no existe, por favor verifíque.',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}

	public function verificarGuardia(){
	
		//asignacion zona horaria	
		date_default_timezone_set("America/Caracas");
		//consulto si la persona logueada esta de guardia hoy para poder hacer solicitudes
		$dia = "dia_".date("j");
		//cambiar el dia y el id
		//$sql = "SELECT id_guardia, id_usuario, id_estacion FROM guardias WHERE mes=".date('n')." AND ano=".date('Y')." AND id_usuario=".Yii::app()->user->id." AND ".$dia."!=1 "; 
		$sql = "SELECT id_guardia, id_usuario, id_estacion, ".$dia." 
				FROM guardias 
				WHERE mes=7
						AND ano=".date('Y')." 
						AND id_usuario=22234555 
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
		elseif(dentro_de_horario("19:00","07:00",$hora)==1)
			$turno = 4;
		elseif(dentro_de_horario("07:00","15:00",$hora)==1)
			$turno = 5;

		for($i=0; $i<count($deGuardia); $i++){
			if($deGuardia[$i]->$dia==$turno){
				//echo "ESTA de guardia EN ".$deGuardia[$i]->id_estacion;
				$pos = $i;
				$band = true; 
			}				
			else{
				echo "no esta de guardia"; 
				$deGuardia = ""; 
			}
				
		}	
		if($band)
			return $deGuardia[$pos];
		else
			return $deGuardia;
	}

}

function dentro_de_horario($hms_inicio, $hms_fin, $hms_referencia=NULL){ // v2011-06-21
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
