<?php

class StockController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','asignar','autocomplete'),
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

		$model=new Stock;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_stock));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Asignar medicamentos.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAsignar()
	{

		$model = new Stock;
		$items_1 = new Stock;
		$items_2 = new Stock;
		$items_3 = new Stock;
		$items_4 = new Stock;
		$items_5 = new Stock;
		$items_6 = new Stock;
		$items_7 = new Stock;
		$items_8 = new Stock;
		$items_9 = new Stock;
		$items_10 = new Stock;
		$items_11 = new Stock;
		$items_12 = new Stock;
		$items_13 = new Stock;
		$items_14 = new Stock;
		$items_15 = new Stock;
		$items_16 = new Stock;
		$items_17 = new Stock;
		$items_18 = new Stock;
		$items_19 = new Stock;
		$items_20 = new Stock;
		$items_21 = new Stock;
		$items_22 = new Stock;
		$items_23 = new Stock;
		$items_24 = new Stock;
		$items_25 = new Stock;
		$items_26 = new Stock;
		$items_27 = new Stock;
		$items_28 = new Stock;
		$items_29 = new Stock;
		$items_30 = new Stock;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($items_1);
		

		if(isset($_POST['Stock']))
		{
			$items_1->attributes = $_POST["Stock"][0];
			$items_2->attributes = $_POST["Stock"][1];
			$items_3->attributes = $_POST["Stock"][2];
			$items_4->attributes = $_POST["Stock"][3];
			$items_5->attributes = $_POST["Stock"][4];
			$items_6->attributes = $_POST["Stock"][5];
			$items_7->attributes = $_POST["Stock"][6];
			$items_8->attributes = $_POST["Stock"][7];
			$items_9->attributes = $_POST["Stock"][8];
			$items_10->attributes = $_POST["Stock"][9];
			$items_11->attributes = $_POST["Stock"][10];
			$items_12->attributes = $_POST["Stock"][11];
			$items_13->attributes = $_POST["Stock"][12];
			$items_14->attributes = $_POST["Stock"][13];
			$items_15->attributes = $_POST["Stock"][14];
			$items_16->attributes = $_POST["Stock"][15];
			$items_17->attributes = $_POST["Stock"][16];
			$items_18->attributes = $_POST["Stock"][17];
			$items_19->attributes = $_POST["Stock"][18];
			$items_20->attributes = $_POST["Stock"][19];
			$items_21->attributes = $_POST["Stock"][20];
			$items_22->attributes = $_POST["Stock"][21];
			$items_23->attributes = $_POST["Stock"][22];
			$items_24->attributes = $_POST["Stock"][23];
			$items_25->attributes = $_POST["Stock"][24];
			$items_26->attributes = $_POST["Stock"][25];
			$items_27->attributes = $_POST["Stock"][26];
			$items_28->attributes = $_POST["Stock"][27];
			$items_29->attributes = $_POST["Stock"][28];
			$items_30->attributes = $_POST["Stock"][29];
/*
			$items_1->id_usuario = Yii::app()->user->id;
			$items_2->id_usuario = Yii::app()->user->id;
			$items_3->id_usuario = Yii::app()->user->id;
			$items_4->id_usuario = Yii::app()->user->id;
			$items_5->id_usuario = Yii::app()->user->id;
			$items_6->id_usuario = Yii::app()->user->id;
			$items_7->id_usuario = Yii::app()->user->id;
			$items_8->id_usuario = Yii::app()->user->id;
			$items_9->id_usuario = Yii::app()->user->id;
			$items_10->id_usuario = Yii::app()->user->id;
			$items_11->id_usuario = Yii::app()->user->id;
			$items_12->id_usuario = Yii::app()->user->id;
			$items_13->id_usuario = Yii::app()->user->id;
			$items_14->id_usuario = Yii::app()->user->id;
			$items_15->id_usuario = Yii::app()->user->id;
			$items_16->id_usuario = Yii::app()->user->id;
			$items_17->id_usuario = Yii::app()->user->id;
			$items_18->id_usuario = Yii::app()->user->id;
			$items_19->id_usuario = Yii::app()->user->id;
			$items_20->id_usuario = Yii::app()->user->id;
			$items_21->id_usuario = Yii::app()->user->id;
			$items_22->id_usuario = Yii::app()->user->id;
			$items_23->id_usuario = Yii::app()->user->id;
			$items_24->id_usuario = Yii::app()->user->id;
			$items_25->id_usuario = Yii::app()->user->id;
			$items_26->id_usuario = Yii::app()->user->id;
			$items_27->id_usuario = Yii::app()->user->id;
			$items_28->id_usuario = Yii::app()->user->id;
			$items_29->id_usuario = Yii::app()->user->id;
			$items_30->id_usuario = Yii::app()->user->id;
*/		
			$cont = 0; 

			if($model->validate())
			{
				//$consulta = "SELECT * FROM facturas WHERE num_factura = '".$model->num_factura."' AND id_proveedor = ".$model->id_proveedor;
				//$data = Facturas::model()->findAllBySql($consulta);

				//if(!empty($data) ){
					// Si consigue el mismo num_factura de un mismo id_proveedor
					//Yii::app()->user->setFlash('error','Ya existe ese NUMERO DE FACTURA para ese PROVEEDOR. Por favor revisar los datos suministrados.');
					
				//}else{	
					if($items_1->validate()){				
						$items_1->save(); 
						$cont++; 
						$this->Stock($items_1);						
					}
					if($items_2->validate()){
						$items_2->save(); 
						$cont++; 
						$this->Stock($items_2);
					}
					if($items_3->validate()){
						$items_3->save(); 
						$cont++; 
						$this->Stock($items_3);
					}
					if($items_4->validate()){
						$items_4->save(); 
						$cont++; 
						$this->Stock($items_4);
					}
					if($items_5->validate()){
						$items_5->save(); 
						$cont++; 
						$this->Stock($items_5);
					}
					if($items_6->validate()){
						$items_6->save(); 
						$cont++; 
						$this->Stock($items_6);
					}
					if($items_7->validate()){
						$items_7->save(); 
						$cont++; 
						$this->Stock($items_7);
					}
					if($items_8->validate()){
						$items_8->save(); 
						$cont++; 
						$this->Stock($items_8);
					}
					if($items_9->validate()){
						$items_9->save(); 
						$cont++; 
						$this->Stock($items_9);
					}
					if($items_10->validate()){
						$items_10->save(); 
						$cont++; 
						$this->Stock($items_10);
					}
					if($items_11->validate()){
						$items_11->save(); 
						$cont++; 
						$this->Stock($items_11);
					}
					if($items_12->validate()){
						$items_12->save(); 
						$cont++; 
						$this->Stock($items_12);
					}
					if($items_13->validate()){
						$items_13->save(); 
						$cont++; 
						$this->Stock($items_13);
					}
					if($items_14->validate()){
						$items_14->save(); 
						$cont++; 
						$this->Stock($items_14);
					}
					if($items_15->validate()){
						$items_15->save(); 
						$cont++; 
						$this->Stock($items_15);
					}
					if($items_16->validate()){
						$items_16->save(); 
						$cont++; 
						$this->Stock($items_16);
					}
					if($items_17->validate()){
						$items_17->save(); 
						$cont++; 
						$this->Stock($items_17);
					}
					if($items_18->validate()){
						$items_18->save(); 
						$cont++; 
						$this->Stock($items_18);
					}
					if($items_19->validate()){
						$items_19->save(); 
						$cont++; 
						$this->Stock($items_19);
					}
					if($items_20->validate()){
						$items_20->save(); 
						$cont++; 
						$this->Stock($items_20);
					}
					if($items_21->validate()){
						$items_21->save(); 
						$cont++; 
						$this->Stock($items_21);
					}
					if($items_22->validate()){
						$items_22->save(); 
						$cont++; 
						$this->Stock($items_22);
					}
					if($items_23->validate()){
						$items_23->save(); 
						$cont++; 
						$this->Stock($items_23);
					}
					if($items_24->validate()){
						$items_24->save(); 
						$cont++; 
						$this->Stock($items_24);
					}
					if($items_25->validate()){
						$items_25->save(); 
						$cont++; 
						$this->Stock($items_25);
					}
					if($items_26->validate()){
						$items_26->save(); 
						$cont++; 
						$this->Stock($items_26);
					}
					if($items_27->validate()){
						$items_27->save(); 
						$cont++; 
						$this->Stock($items_27);
					}
					if($items_28->validate()){
						$items_28->save(); 
						$cont++; 
						$this->Stock($items_28);
					}
					if($items_29->validate()){
						$items_29->save(); 
						$cont++; 
						$this->Stock($items_29);
					}
					if($items_30->validate()){
						$items_30->save(); 
						$cont++; 
						$this->Stock($items_30);
					}
					if($cont>0){
						$model->save();
						$this->redirect(array('view','id'=>$model->id_estacion));
						Yii::app()->user->setFlash('success','Medicamentos Asignados Correctamente.');	
					}
				//}

			}

		}

		$this->render('asignar',array(
			'model'=>$model,
			'items_1'=>$items_1,
			'items_2'=>$items_2,
			'items_3'=>$items_3,
			'items_4'=>$items_4,
			'items_5'=>$items_5,
			'items_6'=>$items_6,
			'items_7'=>$items_7,
			'items_8'=>$items_8,
			'items_9'=>$items_9,
			'items_10'=>$items_10,
			'items_11'=>$items_11,
			'items_12'=>$items_12,
			'items_13'=>$items_13,
			'items_14'=>$items_14,
			'items_15'=>$items_15,
			'items_16'=>$items_16,
			'items_17'=>$items_17,
			'items_18'=>$items_18,
			'items_19'=>$items_19,
			'items_20'=>$items_20,
			'items_21'=>$items_21,
			'items_22'=>$items_22,
			'items_23'=>$items_23,
			'items_24'=>$items_24,
			'items_25'=>$items_25,
			'items_26'=>$items_26,
			'items_27'=>$items_27,
			'items_28'=>$items_28,
			'items_29'=>$items_29,
			'items_30'=>$items_30,
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

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_stock));
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
		$dataProvider=new CActiveDataProvider('Stock');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Stock the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Stock::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Stock $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='stock-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutocomplete($term) 
	{
		$criteria = new CDbCriteria;
		
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		
		$criteria->limit = 10; 
		$data = Medicamentos::model()->findAll($criteria);

		//$consulta = "SELECT * FROM stock WHERE id_medicamento = '".$model->num_factura."' AND id_proveedor = ".$model->id_proveedor;
		//$data = Facturas::model()->findAllBySql($consulta);

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

	/*
	$criteria = new CDbCriteria;
$criteria->with = array('foreign_table1',
                        'foreign_table2', 
                        'foreign_table2.foreign_table3');
$criteria->together = true; // ADDED THIS
$criteria->select = array('id');
$criteria->condition = "foreign_table1.col1=:col_val AND 
                        foreign_table3.col3=:col_val2";
$criteria->params = array(':col_val' => some_val, ':col_val2' => other_val);
$criteria->order = 'foreign_table3.col5 DESC';
$criteria->limit = 10;
*/
}
