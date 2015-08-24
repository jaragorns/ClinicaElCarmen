<?php

class FacturasController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
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
		$model = new Facturas;
		$items_1 = new Inventario;
		$items_2 = new Inventario;
		$items_3 = new Inventario;
		$items_4 = new Inventario;
		$items_5 = new Inventario;
		$items_6 = new Inventario;
		$items_7 = new Inventario;
		$items_8 = new Inventario;
		$items_9 = new Inventario;
		$items_10 = new Inventario;
		$items_11 = new Inventario;
		$items_12 = new Inventario;
		$items_13 = new Inventario;
		$items_14 = new Inventario;
		$items_15 = new Inventario;
		$items_16 = new Inventario;
		$items_17 = new Inventario;
		$items_18 = new Inventario;
		$items_19 = new Inventario;
		$items_20 = new Inventario;
		$items_21 = new Inventario;
		$items_22 = new Inventario;
		$items_23 = new Inventario;
		$items_24 = new Inventario;
		$items_25 = new Inventario;
		$items_26 = new Inventario;
		$items_27 = new Inventario;
		$items_28 = new Inventario;
		$items_29 = new Inventario;
		$items_30 = new Inventario;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($items_1);
		

		if(isset($_POST['Facturas']))
		{
			$model->attributes = $_POST['Facturas'];
			$items_1->attributes = $_POST["Inventario"][0];
			$items_2->attributes = $_POST["Inventario"][1];
			$items_3->attributes = $_POST["Inventario"][2];
			$items_4->attributes = $_POST["Inventario"][3];
			$items_5->attributes = $_POST["Inventario"][4];
			$items_6->attributes = $_POST["Inventario"][5];
			$items_7->attributes = $_POST["Inventario"][6];
			$items_8->attributes = $_POST["Inventario"][7];
			$items_9->attributes = $_POST["Inventario"][8];
			$items_10->attributes = $_POST["Inventario"][9];
			$items_11->attributes = $_POST["Inventario"][10];
			$items_12->attributes = $_POST["Inventario"][11];
			$items_13->attributes = $_POST["Inventario"][12];
			$items_14->attributes = $_POST["Inventario"][13];
			$items_15->attributes = $_POST["Inventario"][14];
			$items_16->attributes = $_POST["Inventario"][15];
			$items_17->attributes = $_POST["Inventario"][16];
			$items_18->attributes = $_POST["Inventario"][17];
			$items_19->attributes = $_POST["Inventario"][18];
			$items_20->attributes = $_POST["Inventario"][19];
			$items_21->attributes = $_POST["Inventario"][20];
			$items_22->attributes = $_POST["Inventario"][21];
			$items_23->attributes = $_POST["Inventario"][22];
			$items_24->attributes = $_POST["Inventario"][23];
			$items_25->attributes = $_POST["Inventario"][24];
			$items_26->attributes = $_POST["Inventario"][25];
			$items_27->attributes = $_POST["Inventario"][26];
			$items_28->attributes = $_POST["Inventario"][27];
			$items_29->attributes = $_POST["Inventario"][28];
			$items_30->attributes = $_POST["Inventario"][29];

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


			$items_1->id_estacion = 6; 
			$items_2->id_estacion = 6; 
			$items_3->id_estacion = 6; 
			$items_4->id_estacion = 6; 
			$items_5->id_estacion = 6; 
			$items_6->id_estacion = 6; 
			$items_7->id_estacion = 6; 
			$items_8->id_estacion = 6; 
			$items_9->id_estacion = 6; 
			$items_10->id_estacion = 6; 
			$items_11->id_estacion = 6; 
			$items_12->id_estacion = 6; 
			$items_13->id_estacion = 6; 
			$items_14->id_estacion = 6; 
			$items_15->id_estacion = 6; 
			$items_16->id_estacion = 6; 
			$items_17->id_estacion = 6; 
			$items_18->id_estacion = 6; 
			$items_19->id_estacion = 6; 
			$items_20->id_estacion = 6; 
			$items_21->id_estacion = 6; 
			$items_22->id_estacion = 6; 
			$items_23->id_estacion = 6; 
			$items_24->id_estacion = 6; 
			$items_25->id_estacion = 6; 
			$items_26->id_estacion = 6; 
			$items_27->id_estacion = 6; 
			$items_28->id_estacion = 6; 
			$items_29->id_estacion = 6; 
			$items_30->id_estacion = 6; 

			$items_1->id_factura = $model->num_factura;
			$items_2->id_factura = $model->num_factura;
			$items_3->id_factura = $model->num_factura;
			$items_4->id_factura = $model->num_factura;
			$items_5->id_factura = $model->num_factura;
			$items_6->id_factura = $model->num_factura;
			$items_7->id_factura = $model->num_factura;
			$items_8->id_factura = $model->num_factura;
			$items_9->id_factura = $model->num_factura;
			$items_10->id_factura = $model->num_factura;
			$items_11->id_factura = $model->num_factura;
			$items_12->id_factura = $model->num_factura;
			$items_13->id_factura = $model->num_factura;
			$items_14->id_factura = $model->num_factura;
			$items_15->id_factura = $model->num_factura;
			$items_16->id_factura = $model->num_factura;
			$items_17->id_factura = $model->num_factura;
			$items_18->id_factura = $model->num_factura;
			$items_19->id_factura = $model->num_factura;
			$items_20->id_factura = $model->num_factura;
			$items_21->id_factura = $model->num_factura;
			$items_22->id_factura = $model->num_factura;
			$items_23->id_factura = $model->num_factura;
			$items_24->id_factura = $model->num_factura;
			$items_25->id_factura = $model->num_factura;
			$items_26->id_factura = $model->num_factura;
			$items_27->id_factura = $model->num_factura;
			$items_28->id_factura = $model->num_factura;
			$items_29->id_factura = $model->num_factura;
			$items_30->id_factura = $model->num_factura;
		
			$cont = 0; 

			if($model->validate())
			{
				$consulta = "SELECT * FROM facturas WHERE num_factura = $model->num_factura	AND id_proveedor = $model->id_proveedor";
		
				if(Facturas::model()->findAllBySql($consulta)){
					// Si consigue el mismo num_factura de un mismo id_proveedor
					Yii::app()->user->setFlash('error','Ya existe ese NUMERO DE FACTURA para ese PROVEEDOR. Por favor revisar los datos suministrados.');
					
				}else{					
					if($items_1->validate()){
						$items_1->save(); 
						$cont++; 
					}
					if($items_2->validate()){
						$items_2->save(); 
						$cont++; 
					}
					if($items_3->validate()){
						$items_3->save(); 
						$cont++; 
					}
					if($items_4->validate()){
						$items_4->save(); 
						$cont++; 
					}
					if($items_5->validate()){
						$items_5->save(); 
						$cont++; 
					}
					if($items_6->validate()){
						$items_6->save(); 
						$cont++; 
					}
					if($items_7->validate()){
						$items_7->save(); 
						$cont++; 
					}
					if($items_8->validate()){
						$items_8->save(); 
						$cont++; 
					}
					if($items_9->validate()){
						$items_9->save(); 
						$cont++; 
					}
					if($items_10->validate()){
						$items_10->save(); 
						$cont++; 
					}
					if($items_11->validate()){
						$items_11->save(); 
						$cont++; 
					}
					if($items_12->validate()){
						$items_12->save(); 
						$cont++; 
					}
					if($items_13->validate()){
						$items_13->save(); 
						$cont++; 
					}
					if($items_14->validate()){
						$items_14->save(); 
						$cont++; 
					}
					if($items_15->validate()){
						$items_15->save(); 
						$cont++; 
					}
					if($items_16->validate()){
						$items_16->save(); 
						$cont++; 
					}
					if($items_17->validate()){
						$items_17->save(); 
						$cont++; 
					}
					if($items_18->validate()){
						$items_18->save(); 
						$cont++; 
					}
					if($items_19->validate()){
						$items_19->save(); 
						$cont++; 
					}
					if($items_20->validate()){
						$items_20->save(); 
						$cont++; 
					}
					if($items_21->validate()){
						$items_21->save(); 
						$cont++; 
					}
					if($items_22->validate()){
						$items_22->save(); 
						$cont++; 
					}
					if($items_23->validate()){
						$items_23->save(); 
						$cont++; 
					}
					if($items_24->validate()){
						$items_24->save(); 
						$cont++; 
					}
					if($items_25->validate()){
						$items_25->save(); 
						$cont++; 
					}
					if($items_26->validate()){
						$items_26->save(); 
						$cont++; 
					}
					if($items_27->validate()){
						$items_27->save(); 
						$cont++; 
					}
					if($items_28->validate()){
						$items_28->save(); 
						$cont++; 
					}
					if($items_29->validate()){
						$items_29->save(); 
						$cont++; 
					}
					if($items_30->validate()){
						$items_30->save(); 
						$cont++; 
					}
					if($cont>0){
						$model->save();
						$this->redirect(array('view','id'=>$model->id_factura));
						Yii::app()->user->setFlash('success','Factura creada.');	
					}
				}

			}

		}

		$this->render('create',array(
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

		if(isset($_POST['Facturas']))
		{
			$model->attributes=$_POST['Facturas'];
			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->id_factura));
				Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');
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
		$dataProvider=new CActiveDataProvider('Facturas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Facturas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Facturas']))
			$model->attributes=$_GET['Facturas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Facturas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Facturas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Facturas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-form')
		{
			
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
