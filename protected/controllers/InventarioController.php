<?php

class InventarioController extends Controller
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
		$model=$this->loadModel($id);

		//Buscar el modelo de la Factura
		$model_factura = new Facturas;
		$model_factura = Facturas::model()->findByAttributes(array("id_factura"=>$model->id_factura));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model_factura'=>$model_factura,
		));
	}

	/**
	 * Creates a new model with params standart because relations with (Estaciones, Medicamentos, Facturas).
	 * Recive $id_factura
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id_factura)
	{

		$model_factura = new Facturas;
		$model_factura = Facturas::model()->findByAttributes(array("id_factura"=>$id_factura));

		$model=new Inventario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventario']))
		{
			/*
			$model->attributes=$_POST['Inventario'];
			$model->id_usuario = Yii::app()->user->id;

			//Para no perder el modelo de la factura (PADRE)
			$model_factura = new Facturas;
			$model_factura = Facturas::model()->findByAttributes(array("id_factura"=>$id_factura));
			$model->id_factura = $model_factura->id_factura;

			$model->id_estacion = Estaciones::model()->findByAttributes(array('id_estacion'=>"6"))->id_estacion;

			$existe = Inventario::model()->findAll(array('condition'=>'id_medicamento=:id_medicamento',
					'params'=>array(':id_medicamento'=>$model->id_medicamento),));


			if($existe)
			{ // Como el medicamento EXISTE debo ACTUALIZAR la CANTIDAD en STOCK
				$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento;
				$cant_stock = Inventario::model()->findAllBySql($sql);
				$cantidad_nueva = $cant_stock['0']['cantidad'] + $model->cantidad;
				$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$model->id_medicamento;
				$execute = Yii::app()->db->createCommand($sql)->execute();
				
			}else{
				// Como el medicamente NO existe lo agrego en STOCK
				$model_stock = new Stock;
				$model_stock->id_medicamento = $model->id_medicamento;
				$model_stock->id_estacion = $model->id_estacion;
				$model_stock->cantidad = $model->cantidad;
				$model_stock->save();
				
			}

			if($model->save()){
				Yii::app()->user->setFlash('success','Item agregado a la factura.');
				$this->redirect(array('view','id'=>$model->id_inventario));
				
			}
			*/
	
		}

		$this->render('create',array(
			'model'=>$model,
			'model_factura'=>$model_factura,
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

		$model_factura = new Facturas;
		$model_factura = Facturas::model()->findByAttributes(array("id_factura"=>$model->id_factura));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventario']))
		{
			$model->attributes=$_POST['Inventario'];
			
			if(isset(Facturas::model()->findByAttributes(array("num_factura"=>$model->id_factura))->id_factura))
			{

				$id_factura = Facturas::model()->findByAttributes(array("num_factura"=>$model->id_factura))->id_factura;
				$model->id_factura = $id_factura;
				
			}else{

				Yii::app()->user->setFlash('error','# de Factura NO EXISTE.');

				$model->validate();

				$this->render('update',array(
					'model'=>$model,
					'model_factura'=>$model_factura,
				));
			}
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success','Item actualizado.');
				$this->redirect(array('view','id'=>$model->id_inventario));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
			'model_factura'=>$model_factura,
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
		{
			Yii::app()->user->setFlash('success','Item Eliminado.');
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		
		}
			
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Inventario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models of one id_factura.
	 * @param integer $id_factura the ID of the factura.
	 */
	public function actionIndexFactura($id_factura)
	{
		$dataProvider=new CActiveDataProvider('Inventario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'id_factura'=>$id_factura,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inventario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inventario']))
			$model->attributes=$_GET['Inventario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inventario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inventario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inventario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inventario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
