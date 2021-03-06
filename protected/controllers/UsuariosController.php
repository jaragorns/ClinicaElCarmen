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
				'actions'=>array('view','create','update','admin','delete'),
				'roles'=>array('Superadmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','admin','update'),
				'roles'=>array('Jefe_Enfermeria','Presidente','Vicepresidente','Jefe_Farmacia'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','update'),
				'roles'=>array('Enfermera','Farmaceuta'),
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
		if($id == Yii::app()->user->id || Yii::app()->user->role=="Superadmin" || Yii::app()->user->role=="Presidente" || Yii::app()->user->role=="Vicepresidente"){
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}else{
			$this->render('view',array(
				'model'=>$this->loadModel(Yii::app()->user->id),
			));
		}
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuarios;
		$rol_user = new AuthAssignment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//if(isset($_POST['Usuarios']))
		if(!empty($_POST))
		{
			$rol_user->attributes=$_POST['AuthAssignment'][1];
			$rol=Roles::model()->findByAttributes(['description'=> $rol_user->itemname]);
			$model->attributes=$_POST['Usuarios'];
			$rol_user->userid = Yii::app()->user->id;
			$valid=$rol_user->validate();
			if($valid)
	        { 
	           	$model->roles_id = $rol->id;
	           	$model->itemname = $rol_user->itemname;
	            $model->password = password_hash($model->password,PASSWORD_DEFAULT);
	            $model->save();
	            
				Yii::app()->authManager->assign($rol_user->itemname,$model->id);
				Yii::app()->user->setFlash('success','Usuario creado.');
				$this->redirect(array('view','id'=>$model->id));
	        }else{
	        	$model->validate();
	        	$rol_user->validate();
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
		if($id == Yii::app()->user->id || Yii::app()->user->role=="Superadmin" || Yii::app()->user->role=="Presidente" || Yii::app()->user->role=="Vicepresidente" || Yii::app()->user->role=="Jefe_Enfermeria"){
			if($id=='18716856' && Yii::app()->user->role!="Superadmin"){
				echo "2";
				Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
				$this->render('view',array(
					'model'=>$this->loadModel(Yii::app()->user->id),
				));
			}
			$model=$this->loadModel($id);
			if($model->cargo=='Presidente' && Yii::app()->user->role!="Presidente"){
				if(!(Yii::app()->user->role=="Superadmin")){
					Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
					$this->render('view',array(
						'model'=>$this->loadModel(Yii::app()->user->id),
					));
				}
			}
			if($model->cargo=='Vicepresidente' && Yii::app()->user->role!="Vicepresidente"){
				if(!(Yii::app()->user->role=="Superadmin")){
					Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
					$this->render('view',array(
						'model'=>$this->loadModel(Yii::app()->user->id),
					));
				}
			}
			if($model->cargo=='Jefe_Farmacia' && Yii::app()->user->role!="Jefe_Farmacia"){
				if(!(Yii::app()->user->role=="Superadmin")){
					Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
					$this->render('view',array(
						'model'=>$this->loadModel(Yii::app()->user->id),
					));
				}
			}
			if($model->cargo=='Jefe_Enfermeria' && Yii::app()->user->role!="Jefe_Enfermeria"){
				if(!(Yii::app()->user->role=="Superadmin")){
					Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
					$this->render('view',array(
						'model'=>$this->loadModel(Yii::app()->user->id),
					));
				}
			}
		    $rol_user=AuthAssignment::model()->find($model->id);
			if(isset($_POST['Usuarios']))
			{
				if(Yii::app()->user->role=="Superadmin" || Yii::app()->user->role=="Presidente" || Yii::app()->user->role=="Vicepresidente"){
		        	$rol_user->attributes=$_POST['AuthAssignment'][1];
		    		$rol=Roles::model()->find('description'== $rol_user->itemname);
		        }
				$model->attributes=$_POST['Usuarios'];
				$rol_user->attributes=$_POST['AuthAssignment'][1];
		    	$rol=Roles::model()->findByAttributes(['description'=> $rol_user->itemname]);
				// Validate all three model
		        if($model->validate() AND $rol_user->validate()){
					$rol_user->userid = Yii::app()->user->id;
					$rol_user->itemname = $rol_user->itemname;
					$model->itemname = $rol_user->itemname;
		        	$model->roles_id = $rol->id;       
		            $model->password = password_hash($model->password,PASSWORD_DEFAULT);
		            $model->save();

					if(Yii::app()->user->role=="Superadmin" || Yii::app()->user->role=="Presidente" || Yii::app()->user->role=="Vicepresidente"){
						Yii::app()->authManager->revoke(AuthAssignment::model()->findByAttributes(array("userid"=>$model->id))->itemname,$model->id);
						Yii::app()->authManager->assign($rol_user->itemname,$model->id);
						$model->cargo = $rol_user->itemname;
						$model->save();
					}
					Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');
					$this->redirect(array('view','id'=>$model->id));
		        }
				
			}
			$this->render('update',array(
				'model'=>$model,
				'rol_user'=>$rol_user,
			));
		}else{
			Yii::app()->user->setFlash('error','Usted no tiene permiso para efectuar esa operación.');
			$this->render('view',array(
				'model'=>$this->loadModel(Yii::app()->user->id),
			));
		}
	}
		
	    
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the id of the model to be deleted
	 */
	public function actionDelete($id)
	{
		Yii::app()->authManager->revoke(AuthAssignment::model()->findByAttributes(array("userid"=>$id))->itemname,$id);
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
		$rol_user=AuthAssignment::model()->find($model->id);
		
		$model->unsetAttributes();  // clear any default values
		$rol_user->unsetAttributes();
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];
			
		/*if(isset($_GET['AuthAssignment']))
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