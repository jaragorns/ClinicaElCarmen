<?php

class AuthitemController extends Controller
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
	public function actionView($name)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($name),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Authitem;
		$rol = new Roles;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authitem']))
		{
			$model->attributes=$_POST['Authitem'];
			$rol->setAttribute("description",$model->name);
			
			if($rol->save())
				if($model->save()){
					Yii::app()->user->setFlash('success','Authitem Creado.');
					$model=new Authitem('search');
					$model->unsetAttributes();  // clear any default values
					if(isset($_GET['Authitem']))
						$model->attributes=$_GET['Authitem'];

					$model=new Authitem('search');
					$model->unsetAttributes();  // clear any default values
					if(isset($_GET['Authitem']))
						$model->attributes=$_GET['Authitem'];

					$this->render('admin',array(
						'model'=>$model,
					));
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
		$rol = new Roles;

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authitem']))
		{
			$model->attributes=$_POST['Authitem'];
			$rol->setAttribute("description",$model->name);

			if($rol->save())
				if($model->save())
					$this->redirect(array('view','id'=>$model->name));
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
		$dataProvider=new CActiveDataProvider('Authitem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Authitem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Authitem']))
			$model->attributes=$_GET['Authitem'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Authitem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($name)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='name=:name';
		$criteria->params=array(':name'=>$name);
		$model = Authitem::model()->find($criteria);
		$roles=Authitem::model()->findAll();
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Authitem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='authitem-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
