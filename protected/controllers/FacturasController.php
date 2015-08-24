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
				'actions'=>array('index','view','create','update','admin','delete','ajax','ajax2','ajax3'),
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

			if($model->validate())
			{
				$consulta = "SELECT * FROM facturas WHERE num_factura = $model->num_factura	AND id_proveedor = $model->id_proveedor";
		
				if(Facturas::model()->findAllBySql($consulta)){
					// Si consigue el mismo num_factura de un mismo id_proveedor
					Yii::app()->user->setFlash('error','Ya existe ese NUMERO DE FACTURA para ese PROVEEDOR. Por favor revisar los datos suministrados.');
					
				}else{
					if($model->save())
					{
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
			'items_3'=>$items_1,
			'items_4'=>$items_1,
			'items_5'=>$items_1,
			'items_6'=>$items_1,
			'items_7'=>$items_1,
			'items_8'=>$items_1,
			'items_9'=>$items_1,
			'items_10'=>$items_1,
			'items_11'=>$items_1,
			'items_12'=>$items_1,
			'items_13'=>$items_1,
			'items_14'=>$items_1,
			'items_15'=>$items_1,
			'items_16'=>$items_1,
			'items_17'=>$items_1,
			'items_18'=>$items_1,
			'items_19'=>$items_1,
			'items_20'=>$items_1,
			'items_21'=>$items_1,
			'items_22'=>$items_1,
			'items_23'=>$items_1,
			'items_24'=>$items_1,
			'items_25'=>$items_1,
			'items_26'=>$items_1,
			'items_27'=>$items_1,
			'items_28'=>$items_1,
			'items_29'=>$items_1,
			'items_30'=>$items_1,
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

	public function actionAjax3($term) {

		$criteria = new CDbCriteria;
		$criteria->condition = "LOWER(nombre) like LOWER(:term)";
		$criteria->params = array(':term'=> '%'.$_GET['term'].'%');
		$criteria->limit = 30;
		$data = Medicamentos::model()->findAll($criteria);
		$arr = array();
		foreach ($data as $item) {
			$arr[] = array(
				'id' => $item->id,
				'value' => $item->nombre,
				'label' => $item->nombre,
			);
		}
		echo CJSON::encode($arr);
	}

public function actionAjax2() {
	echo "HOLA MUNDOOOOOOOOOOOOo";
    $res =array();
    if (isset($_GET['term'])) {
        // http://www.yiiframework.com/doc/guide/database.dao
        $qtxt ="SELECT nombre FROM {{medicamentos}} WHERE nombre LIKE :name";
        $command =Yii::app()->db->createCommand($qtxt);
        $command->bindValue(":nombre", '%'.$_GET['term'].'%', PDO::PARAM_STR);
        $res =$command->queryColumn();
    }

    echo CJSON::encode($res);
    Yii::app()->end();
}

public function actionAjax(){
	echo "HOLA MUNDOOOOOOOOOOOOo";
    $request=trim($_GET['term']);
    if($request!=''){
        $model=Medicamentos::model()->findAll(array("condition"=>"nombre LIKE '$request%'"));
        $data=array();
        foreach($model as $get){
            $data[]=$get->nombre;
        }
        $this->layout='empty';
        echo json_encode($data);
    }
}


}
