<?php

class UsuariosController extends Controller
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
				'roles'=>array('superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the id of the model to be displayed
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
		$model=new Usuarios;
		$rol_user = new Authassignment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//if(isset($_POST['Usuarios']))
		if(!empty($_POST))
		{
			$rol_user->attributes=$_POST['Authassignment'][1];
			$model->attributes=$_POST['Usuarios'];
			$rol_user->userid = Yii::app()->user->id;
			$valid=$rol_user->validate();
			if($valid)
	        { 
	            //$rol_user->save();
	            $itemname = $rol_user->itemname;
	
	            $model->roles_id = Roles::model()->findByAttributes(array('description'=>$itemname))->id;

	            $model->password = crypt($model->password.'salt');

	            $model->save();
	            
	            //$command = Yii::app()->db->createCommand('SHOW TABLE STATUS LIKE "usuarios"');
				//$res=$command->queryRow();      
				//$next_id=$res['Auto_increment'];

				//file_put_contents("archivo.txt", print_r(),true);
				Yii::app()->authManager->assign($rol_user->itemname,$model->id);
				$this->redirect(array('view','id'=>$model->id));
	        }
		}

		$this->render('create',array(
			'model'=>$model,
			'rol_user'=>$rol_user,
		));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the id of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

	    $rol_user=Authassignment::model()->find($model->id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
	        $rol_user->attributes=$_POST['Authassignment'][1];

			$model->attributes=$_POST['Usuarios'];

			// Validate all three model
			$rol_user->userid = Yii::app()->user->id;
	        $valid=$rol_user->validate(); 
	        $valid=$model->validate() && $valid;
	 
	        if($valid)
	        {       
	            //$rol_user->save();
	            $model->save();
	        }

			$model->password = crypt($model->password.'salt');
			Yii::app()->authManager->revoke(Authassignment::model()->findByAttributes(array("userid"=>$model->id))->itemname,$model->id);
			Yii::app()->authManager->assign($rol_user->itemname,$model->id);
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'rol_user'=>$rol_user,
		));
	}
		
	    
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the id of the model to be deleted
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
		$dataProvider=new CActiveDataProvider('Usuarios', array(
		    'pagination'=>array(
		        'pageSize'=>5,
		    ),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Usuarios('search');
		$rol_user=Authassignment::model()->find($model->id);
		
		$model->unsetAttributes();  // clear any default values
		$rol_user->unsetAttributes();

		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];
			
		/*if(isset($_GET['Authassignment']))
			$rol_user->attributes=$_POST['itemname'][1];
		*/
		$this->render('admin',array(
			'model'=>$model,
			'rol_user'=>$rol_user,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $userid the userid of the model to be loaded
	 * @return Usuarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuarios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
