<?php

class BitacoraDescargasController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','descontar','submit'),
				'roles'=>array('Superadmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admin'),
				'roles'=>array('Jefe_Farmacia','Farmaceuta','Jefe_Enfermeria','Accionista','Administrador_Admin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admin','descontar','submit'),
				'roles'=>array('Enfermera'),
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
		$model=new BitacoraDescargas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BitacoraDescargas']))
		{
			$model->attributes=$_POST['BitacoraDescargas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_bitacora));
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

		if(isset($_POST['BitacoraDescargas']))
		{
			$model->attributes=$_POST['BitacoraDescargas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_bitacora));
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
		$dataProvider=new CActiveDataProvider('BitacoraDescargas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BitacoraDescargas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BitacoraDescargas']))
			$model->attributes=$_GET['BitacoraDescargas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BitacoraDescargas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BitacoraDescargas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BitacoraDescargas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bitacora-descargas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDescontar(){

		$keyvalue   = $_POST["keyvalue"];   // ie: 'userid123'
        //$name       = $_POST["name"];   // ie: 'firstname'
        $old_value  = $_POST["old_value"];  // ie: 'patricia'
        $new_value  = $_POST["new_value"];  // ie: '  paTTy '
 
        // do some stuff here, and return the value to be displayed..
        $model_stock = Stock::model()->findByPk($keyvalue);

        $bitacora_descarga = new BitacoraDescargas;

        if($new_value <= $model_stock->cantidad && $new_value > 0){
        	date_default_timezone_set("America/Caracas");
        	$bitacora_descarga->fecha_hora = date('Y-m-d H:i:s');
        	$bitacora_descarga->cantidad = $new_value;
        	$bitacora_descarga->estado = 0;
        	$bitacora_descarga->id_stock = $model_stock->id_stock;
        	$bitacora_descarga->id_guardia = SolicitudesController::verificarGuardia()->id_guardia;
        	$bitacora_descarga->save();
        	echo $new_value;
        }else{
        	echo $old_value;
        }
		
	}
	/*BUSCO EL ULTIMO REGISTRO EN BITACORA_DESCARGAS
	* $_GET['stock'] es el id_stock donde se hizo la descarga, obtenido mediante $_GET.
	* Se realiza la busqueda tomando en cuenta el id_guardia de la persona logeada y el ultimo registro escrito en BITACORA_DESCARGAS ''DESC => fecha_hora''
	* Esto se hace debido a que el usuario pudo haber modificado varias veces el campo eeditable de la cantidad a descargar y debo tomar el ultimo insertado
	*/ 
	public function actionSubmit(){

		$bitacora_descarga = new BitacoraDescargas;

		$bitacora = BitacoraDescargas::model()->findAllByAttributes(array('id_stock'=>$_GET['stock'],'id_guardia'=>SolicitudesController::verificarGuardia()->id_guardia,'estado'=>0), array('order'=>'fecha_hora DESC'));

		if(!empty($bitacora)){
			
			$bitacora_descarga = $bitacora[0];
			$stock = Stock::model()->findByPk($_GET['stock']);
			$sql = "UPDATE `stock` SET `cantidad`=".($stock->cantidad - $bitacora_descarga->cantidad)." WHERE `id_stock`=".$_GET['stock'];
			$execute = Yii::app()->db->createCommand($sql)->execute();
			$bitacora_descarga->estado = 1;
			$bitacora_descarga->save();
			Yii::app()->user->setFlash('success','Descarga de medicamentos realizada.');
			$this->redirect(array('stock/adminDescarga'));

		}else{

			Yii::app()->user->setFlash('notice','Debe haber insertado un monto del medicamento a descargar.');
			$this->redirect(array('stock/adminDescarga'));

		}

	}

}
