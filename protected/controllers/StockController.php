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
				'actions'=>array('index','view','viewEstacion','create','update','admin','adminEstacion','delete','asignar','adminDescarga','autocomplete'),
				'roles'=>array('Superadmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','viewEstacion','create','update','admin','asignar','autocomplete'),
				'roles'=>array('Farmaceuta','Jefe_Farmacia'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('adminEstacion','adminDescarga','asignar','autocomplete'),
				'roles'=>array('Enfermera'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admin','adminDescarga','autocomplete'),
				'roles'=>array('Jefe_Enfermeria'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewEstacion($id_estacion)
	{
		$model=new Stock('search');
		//$model->unsetAttributes();  // clear any default values
		$model->id_estacion = $id_estacion;
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('admin',array(
			'model'=>$model,
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
		
		//SolicitudesController::verificarGuardia();
		//exit();

		if(isset($_POST['Stock']))
		{
			$model->attributes = $_POST["Stock"];
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

			if(!empty($model->id_estacion))
			{
				$items_1->id_estacion = $model->id_estacion;
				$items_2->id_estacion = $model->id_estacion;
				$items_3->id_estacion = $model->id_estacion;
				$items_4->id_estacion = $model->id_estacion;
				$items_5->id_estacion = $model->id_estacion;
				$items_6->id_estacion = $model->id_estacion;
				$items_7->id_estacion = $model->id_estacion;
				$items_8->id_estacion = $model->id_estacion;
				$items_9->id_estacion = $model->id_estacion;
				$items_10->id_estacion = $model->id_estacion;
				$items_11->id_estacion = $model->id_estacion;
				$items_12->id_estacion = $model->id_estacion;
				$items_13->id_estacion = $model->id_estacion;
				$items_14->id_estacion = $model->id_estacion;
				$items_15->id_estacion = $model->id_estacion;
				$items_16->id_estacion = $model->id_estacion;
				$items_17->id_estacion = $model->id_estacion;
				$items_18->id_estacion = $model->id_estacion;
				$items_19->id_estacion = $model->id_estacion;
				$items_20->id_estacion = $model->id_estacion;
				$items_21->id_estacion = $model->id_estacion;
				$items_22->id_estacion = $model->id_estacion;
				$items_23->id_estacion = $model->id_estacion;
				$items_24->id_estacion = $model->id_estacion;
				$items_25->id_estacion = $model->id_estacion;
				$items_26->id_estacion = $model->id_estacion;
				$items_27->id_estacion = $model->id_estacion;
				$items_28->id_estacion = $model->id_estacion;
				$items_29->id_estacion = $model->id_estacion;
				$items_30->id_estacion = $model->id_estacion;

				$cont = 0; 
				$contMalos = 0;
				$id = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
				$validos = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

				if($items_1->validate()){
					$id[1] = $items_1->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[1] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_2->validate()){
					$id[2] = $items_2->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[2] = 1;
						$cont++;
					}else
						$contMalos++;
				}
				if($items_3->validate()){
					$id[3] = $items_3->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[3] = 1;		
						$cont++;
					}else
						$contMalos++;
				}
				if($items_4->validate()){
					$id[4] = $items_4->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[4] = 1;		
						$cont++;
					}else
						$contMalos++;
				}
				if($items_5->validate()){
					$id[5] = $items_5->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[5] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_6->validate()){
					$id[6] = $items_6->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[6] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_7->validate()){
					$id[7] = $items_7->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[7] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_8->validate()){
					$id[8] = $items_8->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[8] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_9->validate()){
					$id[9] = $items_9->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[9] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_10->validate()){
					$id[10] = $items_10->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[10] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_11->validate()){
					$id[11] = $items_11->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[11] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_12->validate()){
					$id[12] = $items_12->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[12] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_13->validate()){
					$id[13] = $items_13->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[13] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_14->validate()){
					$id[14] = $items_14->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[14] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_15->validate()){
					$id[15] = $items_15->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[15] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_16->validate()){
					$id[16] = $items_16->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[16] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_17->validate()){
					$id[17] = $items_17->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[17] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_18->validate()){
					$id[18] = $items_18->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[18] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_19->validate()){
					$id[19] = $items_19->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[19] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_20->validate()){
					$id[20] = $items_20->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[20] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_21->validate()){
					$id[21] = $items_21->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[21] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_22->validate()){
					$id[22] = $items_22->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[22] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_23->validate()){
					$id[23] = $items_23->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[23] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_24->validate()){
					$id[24] = $items_24->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[24] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_25->validate()){
					$id[25] = $items_25->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[25] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_26->validate()){
					$id[26] = $items_26->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[26] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_27->validate()){
					$id[27] = $items_27->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[27] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_28->validate()){
					$id[28] = $items_28->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[28] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_29->validate()){
					$id[29] = $items_29->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[29] = 1;	
						$cont++;
					}else
						$contMalos++;
				}
				if($items_30->validate()){
					$id[30] = $items_30->id_medicamento;
					if($this->noRepetidos($id)){
						$validos[30] = 1;	
						$cont++;
					}else
						$contMalos++;
				}

				if($cont>0 && $contMalos==0){

					if($validos[1]==1) $this->Asignar($items_1);
					if($validos[2]==1) $this->Asignar($items_2);
					if($validos[3]==1) $this->Asignar($items_3);
					if($validos[4]==1) $this->Asignar($items_4);
					if($validos[5]==1) $this->Asignar($items_5);
					if($validos[6]==1) $this->Asignar($items_6);
					if($validos[7]==1) $this->Asignar($items_7);
					if($validos[8]==1) $this->Asignar($items_8);
					if($validos[9]==1) $this->Asignar($items_9);
					if($validos[10]==1) $this->Asignar($items_10);
					if($validos[11]==1) $this->Asignar($items_11);
					if($validos[12]==1) $this->Asignar($items_12);
					if($validos[13]==1) $this->Asignar($items_13);
					if($validos[14]==1) $this->Asignar($items_14);
					if($validos[15]==1) $this->Asignar($items_15);
					if($validos[16]==1) $this->Asignar($items_16);
					if($validos[17]==1) $this->Asignar($items_17);
					if($validos[18]==1) $this->Asignar($items_18);
					if($validos[19]==1) $this->Asignar($items_19);
					if($validos[20]==1) $this->Asignar($items_20);
					if($validos[21]==1) $this->Asignar($items_21);
					if($validos[22]==1) $this->Asignar($items_22);
					if($validos[23]==1) $this->Asignar($items_23);
					if($validos[24]==1) $this->Asignar($items_24);
					if($validos[25]==1) $this->Asignar($items_25);
					if($validos[26]==1) $this->Asignar($items_26);
					if($validos[27]==1) $this->Asignar($items_27);
					if($validos[28]==1) $this->Asignar($items_28);
					if($validos[29]==1) $this->Asignar($items_29);
					if($validos[30]==1) $this->Asignar($items_30);

			 		$model->save();
			 		if(Yii::app()->user->role=='Farmaceuta' OR Yii::app()->user->role=='Jefe_Farmacia'){
			 			Yii::app()->user->setFlash('success','Medicamentos Asignados Correctamente.');		
						$this->redirect(array('stock/admin'));
			 		}

					Yii::app()->user->setFlash('success','Medicamentos Asignados Correctamente.');		
					$this->redirect(array('adminEstacion'));

			 	}else{
			 		if($cont == 0)
			 		Yii::app()->user->setFlash('notice','Debe asignar al menos un medicamento.');		
			 	}
				
			}else{
				$model->cantidad = 0;
				$model->id_medicamento = 0;
				$model->validate();
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

	public function actionAdminEstacion()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('adminEstacion',array(
			'model'=>$model,
		));
	}

	public function actionAdminDescarga()
	{
		
		$model=new Stock('searchDescarga');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock']))
			$model->attributes=$_GET['Stock'];

		$this->render('adminDescarga',array(
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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID_ESTACION of the model to be loaded
	 * @return Stock the loaded model
	 * @throws CHttpException
	 */
	public function loadModelByEstacion($id_estacion)
	{

		$model = Stock::model()->findByAttributes(array('id_estacion'=>$id_estacion));
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
		$criteria->join = "RIGHT JOIN stock ON stock.id_medicamento = t.id_medicamento"; 

		if(Yii::app()->user->role=="Farmaceuta"){
			$criteria->condition = "stock.cantidad > 0 AND id_estacion = 6";
			$estacion = 6;
		}else{
			if(!empty(SolicitudesController::verificarGuardia()->id_estacion)){
				$criteria->condition = "stock.cantidad > 0 AND id_estacion = ".SolicitudesController::verificarGuardia()->id_estacion;
				$estacion = SolicitudesController::verificarGuardia()->id_estacion;
			}else{
				Yii::app()->user->setFlash('error','Debe estar de guardia para realizar asiganaciones.');	
			}
		}

		
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		$data = Medicamentos::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
  				$idStock = Stock::model()->findByAttributes(array('id_medicamento'=>$item->id_medicamento, 'id_estacion'=>$estacion))->id_stock;
  				$existencia = Stock::model()->findByAttributes(array('id_medicamento'=>$item->id_medicamento, 'id_estacion'=>$estacion))->cantidad;
  				$UnidadMedida = UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$item->id_medicamento))->unidad_medida))->descripcion;
  				
  				$arr[] = array(
		    		'id_medicamento' => $item->id_medicamento,
		    		'value' => $item->nombre." (".$UnidadMedida.")",
		    		'existencia' => $existencia,
	   			);
  			}

	 	}else{

	  		$arr = array();
	  		$arr[] = array(
	   			'id' => '',
	   			'value' => 'El medicamento no existe o no esta disponible, por favor verifíque.',
	   			'label' => 'El medicamento no existe o no esta disponible, por favor verifíque.',
	  		);

	 	}
  
		echo CJSON::encode($arr);
	}

	public function Asignar($model)
	{

		if(Yii::app()->user->role=="Farmaceuta"){
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= 6";
		}else{
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= ".SolicitudesController::verificarGuardia()->id_estacion;
		}
		$result = Stock::model()->findAllBySql($sql);
		$band = FALSE;

		//SI LA CANTIDAD A ASIGNAR ES MAYOR A LA EXISTENCIA
		if($model->cantidad > $result['0']['cantidad']){

			Yii::app()->user->setFlash('error','No hay existencia suficiente para efectuar la operación. '.$model->id_medicamento);	
			$band = TRUE;

		}else{ 
			//SE PROCEDE A BUSCAR SI EXISTE CANTIDAD DEL MEDICAMENTO EN LA ESTACION A ASIGNAR.
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= ".$model->id_estacion;
			$cantidad_servicio = Stock::model()->findAllBySql($sql);

			$cantidad_nueva = $result['0']['cantidad'] - $model->cantidad;

			//CANTIDAD NUEVA PARA EL SERVICIO QUE ASIGNO
			if(Yii::app()->user->role=="Farmaceuta"){
				$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= 6";
				$execute = Yii::app()->db->createCommand($sql)->execute();
				$estacion_origen = 6;
			}else{
				$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= ".SolicitudesController::verificarGuardia()->id_estacion;
				$execute = Yii::app()->db->createCommand($sql)->execute();
				$estacion_origen = SolicitudesController::verificarGuardia()->id_estacion;
			}

			if($cantidad_servicio){
				//CANTIDAD NUEVA PARA EL SERVICIO QUE RECIBIO (((UPDATE)))
				$cant_asignar = $cantidad_servicio['0']['cantidad'] + $model->cantidad;
				$sql = "UPDATE `stock` SET `cantidad`=".$cant_asignar." WHERE `id_medicamento` =".$model->id_medicamento." AND `id_estacion`= ".$model->id_estacion;
				$execute = Yii::app()->db->createCommand($sql)->execute();
				
			}else{
				$model_stock = new Stock;
				$model_stock->id_medicamento = $model->id_medicamento;
				$model_stock->id_estacion = $model->id_estacion;
				$model_stock->cantidad = $model->cantidad;
				$model_stock->save();
			}
		}

		//BITACORA DE LAS ASIGNACIONES
		if(!$band){
			$model_bitacora = new BitacoraStock;
			$model_bitacora->id_usuario = Yii::app()->user->id;
			$model_bitacora->id_estacion_origen = $estacion_origen;
			$model_bitacora->id_estacion_destino = $model->id_estacion;
			$model_bitacora->id_medicamento = $model->id_medicamento;
			$model_bitacora->cantidad = $model->cantidad;
			date_default_timezone_set("America/Caracas");
			$model_bitacora->fecha = date('Y-m-d H:i:s');
			$model_bitacora->save();
		}
	}

	public function noRepetidos($id){
		$contaRepe = 0;
		$band = false;
		 	for($i=0; $i<count($id); $i++){
		 		for($j=0; $j<count($id); $j++){
		 			if($id[$i]==$id[$j] && !empty($id[$i]) ){
		 				$contaRepe++;
		 			}			
		 		}
		 		if($contaRepe>2){
		 			$contaRepe=0;
		 			$band=true;
		 		}	
		 	}

		 	if($band){
		 		Yii::app()->user->setFlash('error','No debe repetir medicamentos. BORRAR EL MEDICAMENTO Y SU ASIGNACION');
		 		return false;
		 	}else{
		 		return true;
		 	}		
	}

}
