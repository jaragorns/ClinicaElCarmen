<?php

class ComprobantesController extends Controller
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
				'roles'=>array('superadmin','accionista'),
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

		$model=new Comprobantes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comprobantes']))
		{
			$model->attributes=$_POST['Comprobantes'];
			$model->usuarios_username = Yii::app()->user->id;
			$model->estado = 0;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_comprobante));
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

		if(isset($_POST['Comprobantes']))
		{
			$model->attributes=$_POST['Comprobantes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_comprobante));
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
		$dataProvider=new CActiveDataProvider('Comprobantes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comprobantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comprobantes']))
			$model->attributes=$_GET['Comprobantes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comprobantes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comprobantes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comprobantes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comprobantes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionFlag($pk, $name, $value){
		$model = $this->loadModel($pk);
		$model->{$name} = $value;
		$model->save(false);
		if(!Yii::app()->request->isAjaxRequest){
			$this->redirect('admin');
		}
	}

	public function actionAjaxEditColumn(){
		$keyvalue   = $_POST["keyvalue"];   // ie: 'userid123'
        $name       = $_POST["name"];   // ie: 'firstname'
        $old_value  = $_POST["old_value"];  // ie: 'patricia'
        $new_value  = $_POST["new_value"];  // ie: '  paTTy '
 
        // do some stuff here, and return the value to be displayed..

        $model = Comprobantes::model()->findByPk($keyvalue);

        //$model->updateAll(array('login_attempts'=>$user->login_attempts+1, 'last_login_attempt'=>time()), 'LOWER(user_name)=?', array($username));
        if($name == "estado_med"){
        	Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');
        	$model->saveAttributes(array('estado_med'=>$new_value));
        }
        if($name == "estado_pra"){
        	Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');
        	$model->saveAttributes(array('estado_pra'=>$new_value));
        }
        
        //$model->setAttributes(array('estado_pra', $new_update));
/*
        $model->estado_med = $new_value;
        if($model->save()){
        	Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');
        }
        Yii::app()->user->setFlash('error','ESA MIEERRRDDAAA NOOOO ENTRA!!!.');
*/
		echo $new_value;			// Patty

    }

}
