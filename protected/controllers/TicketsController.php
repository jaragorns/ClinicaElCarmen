<?php

class TicketsController extends Controller
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
				'actions'=>array('index','view','create','update','admin','adminHistorial','delete','aprobar','rechazar'),
				'roles'=>array('Superadmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','admin','adminHistorial','aprobar','rechazar'),
				'roles'=>array('Jefe_Farmacia'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create'),
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
		$model=new Tickets;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tickets']))
		{
			$model->attributes=$_POST['Tickets'];

			if($model->save()){
				//Notificar al admin del ticket generado
				
				$this->redirect(array('view','id'=>$model->id_ticket));
			}
		}

		if(empty(SolicitudesController::verificarGuardia()->id_guardia)){
			Yii::app()->user->setFlash('notice','Debe estar de guardia para generar tickets');
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

		if(isset($_POST['Tickets']))
		{
			$model->attributes=$_POST['Tickets'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_ticket));
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
		$dataProvider=new CActiveDataProvider('Tickets');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Accion que retorna todos los modelos donde estado es pendiente VER MODELO search().
	 */
	public function actionAdmin()
	{
		$model=new Tickets('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tickets']))
			$model->attributes=$_GET['Tickets'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Accion que retorna todos los modelos donde estado es aprobado y pendiente VER MODELO historial().
	 */
	public function actionAdminHistorial()
	{
		
		$model=new Tickets('historial');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tickets']))
			$model->attributes=$_GET['Tickets'];

		$this->render('adminHistorial',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tickets the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tickets::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	/**
	 * Valida y realiza la actualizacion del Stock, debido a la aprobacion del ticket.
	 * @param integer $id_ticket el ID del ticket aprobado. Recibido por URL y obtenido mediante $_GET['ticket']
	 */
	public function actionAprobar()
	{

		$model = new Tickets;

		$ticket = Tickets::model()->findByPk($_GET['ticket']);

		$bitacoraDescarga = BitacoraDescargas::model()->findByPk($ticket->bitacora_descargas_id_bitacora);

		$stock = Stock::model()->findByPk($bitacoraDescarga->id_stock);

		if(($stock->cantidad + $bitacoraDescarga->cantidad - $ticket->cantidad) > 0 ){
			$sql = "UPDATE `stock` SET `cantidad`=".($stock->cantidad + $bitacoraDescarga->cantidad - $ticket->cantidad)." WHERE `id_stock`=".$stock->id_stock;
			$execute = Yii::app()->db->createCommand($sql)->execute();
			//ESTADO 2 = APROBADO
			$ticket->estado = 1;
			$ticket->save();
			Yii::app()->user->setFlash('success','Ticket aprobado e inventario actualizado.');
			$this->redirect(array('tickets/admin'));
		}else{
			Yii::app()->user->setFlash('error','El ticket no puede ser aprobado debido a que no hay existencia suficiente.');
			$this->redirect(array('tickets/admin'));
		}

	}

	/**
	 * Accion que actualiza el estado del ticket y rechazo del mismo.
	 * @param integer $id_ticket el ID del ticket aprobado. Recibido por URL y obtenido mediante $_GET['ticket']
	 */
	public function actionRechazar()
	{
		$ticket = new Tickets;

		$ticket = Tickets::model()->findByPk($_GET['ticket']);
		//ESTADO 2 = RECHAZADO
		$ticket->estado = 2;
		$ticket->save();
		Yii::app()->user->setFlash('notice','Ticket rechazado.');
		$this->redirect(array('tickets/admin'));
			
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tickets $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tickets-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
