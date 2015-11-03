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
				'actions'=>array('index','view','create','update','admin','delete','autocomplete','imprimir'),
				'roles'=>array('Superadmin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','autocomplete','imprimir'),
				'roles'=>array('Jefe_Farmacia','Farmaceuta'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('autocomplete'),
				'roles'=>array('Accionista'),
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
				$consulta = "SELECT * FROM facturas WHERE num_factura = '".$model->num_factura."' AND id_proveedor = ".$model->id_proveedor;
				$data = Facturas::model()->findAllBySql($consulta);

				if(!empty($data) ){
					// Si consigue el mismo num_factura de un mismo id_proveedor
					Yii::app()->user->setFlash('error','Ya existe ese NUMERO DE FACTURA para ese PROVEEDOR. Por favor revisar los datos suministrados.');
					
				}else{	
					if($items_1->validate()){				
						$items_1->save(); 
						$cont++; 
						$this->Stock($items_1);						
					}
					if($items_2->validate()){
						$items_2->save(); 
						$cont++; 
						$this->Stock($items_2);
					}
					if($items_3->validate()){
						$items_3->save(); 
						$cont++; 
						$this->Stock($items_3);
					}
					if($items_4->validate()){
						$items_4->save(); 
						$cont++; 
						$this->Stock($items_4);
					}
					if($items_5->validate()){
						$items_5->save(); 
						$cont++; 
						$this->Stock($items_5);
					}
					if($items_6->validate()){
						$items_6->save(); 
						$cont++; 
						$this->Stock($items_6);
					}
					if($items_7->validate()){
						$items_7->save(); 
						$cont++; 
						$this->Stock($items_7);
					}
					if($items_8->validate()){
						$items_8->save(); 
						$cont++; 
						$this->Stock($items_8);
					}
					if($items_9->validate()){
						$items_9->save(); 
						$cont++; 
						$this->Stock($items_9);
					}
					if($items_10->validate()){
						$items_10->save(); 
						$cont++; 
						$this->Stock($items_10);
					}
					if($items_11->validate()){
						$items_11->save(); 
						$cont++; 
						$this->Stock($items_11);
					}
					if($items_12->validate()){
						$items_12->save(); 
						$cont++; 
						$this->Stock($items_12);
					}
					if($items_13->validate()){
						$items_13->save(); 
						$cont++; 
						$this->Stock($items_13);
					}
					if($items_14->validate()){
						$items_14->save(); 
						$cont++; 
						$this->Stock($items_14);
					}
					if($items_15->validate()){
						$items_15->save(); 
						$cont++; 
						$this->Stock($items_15);
					}
					if($items_16->validate()){
						$items_16->save(); 
						$cont++; 
						$this->Stock($items_16);
					}
					if($items_17->validate()){
						$items_17->save(); 
						$cont++; 
						$this->Stock($items_17);
					}
					if($items_18->validate()){
						$items_18->save(); 
						$cont++; 
						$this->Stock($items_18);
					}
					if($items_19->validate()){
						$items_19->save(); 
						$cont++; 
						$this->Stock($items_19);
					}
					if($items_20->validate()){
						$items_20->save(); 
						$cont++; 
						$this->Stock($items_20);
					}
					if($items_21->validate()){
						$items_21->save(); 
						$cont++; 
						$this->Stock($items_21);
					}
					if($items_22->validate()){
						$items_22->save(); 
						$cont++; 
						$this->Stock($items_22);
					}
					if($items_23->validate()){
						$items_23->save(); 
						$cont++; 
						$this->Stock($items_23);
					}
					if($items_24->validate()){
						$items_24->save(); 
						$cont++; 
						$this->Stock($items_24);
					}
					if($items_25->validate()){
						$items_25->save(); 
						$cont++; 
						$this->Stock($items_25);
					}
					if($items_26->validate()){
						$items_26->save(); 
						$cont++; 
						$this->Stock($items_26);
					}
					if($items_27->validate()){
						$items_27->save(); 
						$cont++; 
						$this->Stock($items_27);
					}
					if($items_28->validate()){
						$items_28->save(); 
						$cont++; 
						$this->Stock($items_28);
					}
					if($items_29->validate()){
						$items_29->save(); 
						$cont++; 
						$this->Stock($items_29);
					}
					if($items_30->validate()){
						$items_30->save(); 
						$cont++; 
						$this->Stock($items_30);
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
		//busco todos los items para ese numero de factura
		$data = Inventario::model()->findAll("id_factura='".$model->num_factura."'");	

		//los guardo en un array, donde cada posicion(item) es un modelo 
		for($i=0; $i<count($data); $i++){
			$cantidadesIniciales[$i] = $data[$i]->cantidad;
		}
		//si existe el modelo lo asigno a su variable modelo sino le digo que es uno nuevo
		if(isset($data[0])) $items_1 = $data[0]; else $items_1 = new Inventario;
		if(isset($data[1])) $items_2 = $data[1]; else $items_2 = new Inventario;
		if(isset($data[2])) $items_3 = $data[2]; else $items_3 = new Inventario;
		if(isset($data[3])) $items_4 = $data[3]; else $items_4 = new Inventario;
		if(isset($data[4])) $items_5 = $data[4]; else $items_5 = new Inventario;
		if(isset($data[5])) $items_6 = $data[5]; else $items_6 = new Inventario;
		if(isset($data[6])) $items_7 = $data[6]; else $items_7 = new Inventario;
		if(isset($data[7])) $items_8 = $data[7]; else $items_8 = new Inventario;
		if(isset($data[8])) $items_9 = $data[8]; else $items_9 = new Inventario;
		if(isset($data[9])) $items_10 = $data[9]; else $items_10 = new Inventario;
		if(isset($data[10])) $items_11 = $data[10]; else $items_11 = new Inventario;
		if(isset($data[11])) $items_12 = $data[11]; else $items_12 = new Inventario;
		if(isset($data[12])) $items_13 = $data[12]; else $items_13 = new Inventario;
		if(isset($data[13])) $items_14 = $data[13]; else $items_14 = new Inventario;
		if(isset($data[14])) $items_15 = $data[14]; else $items_15 = new Inventario;
		if(isset($data[15])) $items_16 = $data[15]; else $items_16 = new Inventario;
		if(isset($data[16])) $items_17 = $data[16]; else $items_17 = new Inventario;
		if(isset($data[17])) $items_18 = $data[17]; else $items_18 = new Inventario;
		if(isset($data[18])) $items_19 = $data[18]; else $items_19 = new Inventario;
		if(isset($data[19])) $items_20 = $data[19]; else $items_20 = new Inventario;
		if(isset($data[20])) $items_21 = $data[20]; else $items_21 = new Inventario;
		if(isset($data[21])) $items_22 = $data[21]; else $items_22 = new Inventario;
		if(isset($data[22])) $items_23 = $data[22]; else $items_23 = new Inventario;
		if(isset($data[23])) $items_24 = $data[23]; else $items_24 = new Inventario;
		if(isset($data[24])) $items_25 = $data[24]; else $items_25 = new Inventario;
		if(isset($data[25])) $items_26 = $data[25]; else $items_26 = new Inventario;
		if(isset($data[26])) $items_27 = $data[26]; else $items_27 = new Inventario;
		if(isset($data[27])) $items_28 = $data[27]; else $items_28 = new Inventario;
		if(isset($data[28])) $items_29 = $data[28]; else $items_29 = new Inventario;
		if(isset($data[29])) $items_30 = $data[29]; else $items_30 = new Inventario;


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST))
		{
			$model->attributes=$_POST['Facturas'];
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
					if($items_1->validate()){	
						if($cantidadesIniciales[0] != $items_1->cantidad)
							$this->StockUpdate($items_1, $cantidadesIniciales[0]);
						$items_1->save(); 
						$cont++;								
					}
					if($items_2->validate()){
						if($cantidadesIniciales[1] != $items_2->cantidad)
							$this->StockUpdate($items_2, $cantidadesIniciales[1]);
						$items_2->save(); 
						$cont++; 
					}
					if($items_3->validate()){
						if($cantidadesIniciales[2] != $items_3->cantidad)
							$this->StockUpdate($items_3, $cantidadesIniciales[2]);
						$items_3->save(); 
						$cont++; 
					}
					if($items_4->validate()){
						if($cantidadesIniciales[3] != $items_4->cantidad)
							$this->StockUpdate($items_4, $cantidadesIniciales[3]);
						$items_4->save(); 
						$cont++; 
					}
					if($items_5->validate()){
						if($cantidadesIniciales[4] != $items_5->cantidad)
							$this->StockUpdate($items_5, $cantidadesIniciales[4]);
						$items_5->save(); 
						$cont++; 
					}
					if($items_6->validate()){
						if($cantidadesIniciales[5] != $items_6->cantidad)
							$this->StockUpdate($items_6, $cantidadesIniciales[5]);
						$items_6->save(); 
						$cont++; 
					}
					if($items_7->validate()){
						if($cantidadesIniciales[6] != $items_7->cantidad)
							$this->StockUpdate($items_7, $cantidadesIniciales[6]);
						$items_7->save(); 
						$cont++; 
					}
					if($items_8->validate()){
						if($cantidadesIniciales[7] != $items_8->cantidad)
							$this->StockUpdate($items_8, $cantidadesIniciales[7]);
						$items_8->save(); 
						$cont++; 
					}
					if($items_9->validate()){
						if($cantidadesIniciales[8] != $items_9->cantidad)
							$this->StockUpdate($items_9, $cantidadesIniciales[8]);
						$items_9->save(); 
						$cont++; 
					}
					if($items_10->validate()){
						if($cantidadesIniciales[9] != $items_10->cantidad)
							$this->StockUpdate($items_10, $cantidadesIniciales[9]);
						$items_10->save(); 
						$cont++; 
					}
					if($items_11->validate()){
						if($cantidadesIniciales[10] != $items_11->cantidad)
							$this->StockUpdate($items_11, $cantidadesIniciales[10]);
						$items_11->save(); 
						$cont++; 
					}
					if($items_12->validate()){
						if($cantidadesIniciales[11] != $items_12->cantidad)
							$this->StockUpdate($items_12, $cantidadesIniciales[11]);
						$items_12->save(); 
						$cont++; 
					}
					if($items_13->validate()){
						if($cantidadesIniciales[12] != $items_13->cantidad)
							$this->StockUpdate($items_13, $cantidadesIniciales[12]);
						$items_13->save(); 
						$cont++; 
					}
					if($items_14->validate()){
						if($cantidadesIniciales[13] != $items_14->cantidad)
							$this->StockUpdate($items_14, $cantidadesIniciales[13]);
						$items_14->save(); 
						$cont++; 
					}
					if($items_15->validate()){
						if($cantidadesIniciales[14] != $items_15->cantidad)
							$this->StockUpdate($items_15, $cantidadesIniciales[14]);
						$items_15->save(); 
						$cont++; 
					}
					if($items_16->validate()){
						if($cantidadesIniciales[15] != $items_16->cantidad)
							$this->StockUpdate($items_16, $cantidadesIniciales[15]);
						$items_16->save(); 
						$cont++; 
					}
					if($items_17->validate()){
						if($cantidadesIniciales[16] != $items_17->cantidad)
							$this->StockUpdate($items_17, $cantidadesIniciales[16]);
						$items_17->save(); 
						$cont++; 
					}
					if($items_18->validate()){
						if($cantidadesIniciales[17] != $items_18->cantidad)
							$this->StockUpdate($items_18, $cantidadesIniciales[17]);
						$items_18->save(); 
						$cont++; 
					}
					if($items_19->validate()){
						if($cantidadesIniciales[18] != $items_19->cantidad)
							$this->StockUpdate($items_19, $cantidadesIniciales[18]);
						$items_19->save(); 
						$cont++; 
					}
					if($items_20->validate()){
						if($cantidadesIniciales[19] != $items_20->cantidad)
							$this->StockUpdate($items_20, $cantidadesIniciales[19]);
						$items_20->save(); 
						$cont++; 
					}
					if($items_21->validate()){
						if($cantidadesIniciales[20] != $items_21->cantidad)
							$this->StockUpdate($items_21, $cantidadesIniciales[20]);
						$items_21->save(); 
						$cont++; 
					}
					if($items_22->validate()){
						if($cantidadesIniciales[21] != $items_22->cantidad)
							$this->StockUpdate($items_22, $cantidadesIniciales[21]);
						$items_22->save(); 
						$cont++; 
					}
					if($items_23->validate()){
						if($cantidadesIniciales[22] != $items_23->cantidad)
							$this->StockUpdate($items_23, $cantidadesIniciales[22]);
						$items_23->save(); 
						$cont++; 
					}
					if($items_24->validate()){
						if($cantidadesIniciales[23] != $items_24->cantidad)
							$this->StockUpdate($items_24, $cantidadesIniciales[23]);
						$items_24->save(); 
						$cont++; 
					}
					if($items_25->validate()){
						if($cantidadesIniciales[24] != $items_25->cantidad)
							$this->StockUpdate($items_25, $cantidadesIniciales[24]);
						$items_25->save(); 
						$cont++; 
					}
					if($items_26->validate()){
						if($cantidadesIniciales[25] != $items_26->cantidad)
							$this->StockUpdate($items_26, $cantidadesIniciales[25]);
						$items_26->save(); 
						$cont++; 
					}
					if($items_27->validate()){
						if($cantidadesIniciales[26] != $items_27->cantidad)
							$this->StockUpdate($items_27, $cantidadesIniciales[26]);
						$items_27->save(); 
						$cont++; 
					}
					if($items_28->validate()){
						if($cantidadesIniciales[27] != $items_28->cantidad)
							$this->StockUpdate($items_28, $cantidadesIniciales[27]);
						$items_28->save(); 
						$cont++; 
					}
					if($items_29->validate()){
						if($cantidadesIniciales[28] != $items_29->cantidad)
							$this->StockUpdate($items_29, $cantidadesIniciales[28]);
						$items_29->save(); 
						$cont++; 
					}
					if($items_30->validate()){
						if($cantidadesIniciales[29] != $items_30->cantidad)
							$this->StockUpdate($items_30, $cantidadesIniciales[29]);
						$items_30->save(); 
						$cont++; 
					}
					if($cont>0){
						$model->save();
						$this->redirect(array('view','id'=>$model->id_factura));
						Yii::app()->user->setFlash('success','Actualización de Datos Satisfactoria.');	
					}
			}

		}

		$this->render('update',array(
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

	public function actionImprimir($id){
		$factura = Facturas::model()->findByAttributes(array('id_factura'=>$id));
		$data = Inventario::model()->findAllByAttributes(array('id_factura'=>$factura->num_factura));

		$html='
			<table class="ancho">
			<tr>
				<td></td>
				<td></td>
		    	<td class="control"><b>Control Fact:</b></td>
		    	<td class="numF">'.$factura->control_factura.'</td>
		    	<td class="control"><b>Fecha de Entra:</b></td>
				<td class="numF">'.date_format(date_create($factura->fecha_entrada),"d-m-Y").'</td>
		  	</tr>
		  	<tr>
			  	<td class="proveedor"><b>Proveedor:</b></td>	
				<td class="nomP">'.$factura->idProveedor->nombre.'</td>
			    <td class="control"><b>Num Factura:</b></td>
			   	<td class="numF">'.$factura->num_factura.'</td>
			    <td class="control"> <b>Fecha Fact:</b></td>	
				<td class="numF">'.date_format(date_create($factura->fecha_factura),"d-m-Y").'</td>
		  	</tr>
		  	<tr>
		  		<td></td>
		  		<td></td>
		  		<td></td>
		  		<td></td>
		  		<td class="control"> <b>Fecha Venc:</b></td>	
				<td class="numF">'.date_format(date_create($factura->fecha_vencimiento),"d-m-Y").'</td>
		  	</tr>
		</table>
		<br><br>
		<table class="ancho">
		<tr>
			<th class="align"><b>Medicamento</b></th>
			<th class="align"><b>IVA</b></th>
			<th class="align"><b>Cantidad</b></th>
			<th class="align"><b>Precio de Compra</b></th>
			<th class="align"><b>Total</b></th>
		</tr>';
		for ($i=0; $i < count($data); $i++) { 
			if(fmod($i,2)==0){
		$html.='		
		<tr>
			<td class="medicamento">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->nombre.' </td>
			<td class="iva">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->iva.' </td>
			<td class="cantidad">'.$data[$i]["cantidad"].' </td>
			<td class="precio_compra">'.$data[$i]["precio_compra"].' </td>
			<td class="total">'.$data[$i]["total"].' </td>
		</tr>';	
		}else{
		$html.='				
		<tr>
			<td class="medicamentoC">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->nombre.' </td>
			<td class="ivaC">'.Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data[$i]["id_medicamento"]))->iva.' </td>
			<td class="cantidadC">'.$data[$i]["cantidad"].' </td>
			<td class="precio_compraC">'.$data[$i]["precio_compra"].' </td>
			<td class="totalC">'.$data[$i]["total"].' </td>
		</tr>';	
			}
		}
		$html.='
	</table>
	<br>
	<table class="ancho">
		<tr>
			<td class="retencion"><b>Retención: </b>';
				if($factura->retencion==1)
					$html.='75 %';
				elseif($factura->retencion==2)
					$html.='100 %';
				else
					$html.='Sin Retención';
			$html.='
			</td>
			<td class="totalF2"><b>Total Factura: </b>'.$factura->monto.' </td>
			<td>

			</td>
		</tr>
	</table>		
		';

		$mPDF1 = Yii::app()->ePdf->mpdf('','A4',9,'',15,15,15,15,'','');
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/libre.css');
		$nombre = "factura_".$factura->num_factura.".pdf";
        $mPDF1->WriteHTML($stylesheet, 1);
		$mPDF1->WriteHTML($html);
		$mPDF1->Output($nombre,'I'); 
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

	public function actionAutocomplete($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		$data = Medicamentos::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {
	   			$arr[] = array(
	    			'id_medicamento' => $item->id_medicamento,
	    			'value' => $item->nombre,
	    			'iva' => $item->iva,
	   			);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'id' => '',
	   			'value' => 'El medicamento no existe, por favor verifíque.',
	   			'label' => 'El medicamento no existe, por favor verifíque.',
	   			'iva' => '',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}

	public function Stock($model)
	{
		$existe = Stock::model()->findAll(array('condition'=>'id_medicamento=:id_medicamento',
								'params'=>array(':id_medicamento'=>$model->id_medicamento),));

		if($existe)
		{ // Como el medicamento EXISTE debo ACTUALIZAR la CANTIDAD en STOCK
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento;
			$cant_stock = Stock::model()->findAllBySql($sql);
			$sql = "SELECT `cantidad` FROM `medicamentos` WHERE `id_medicamento` =".$model->id_medicamento;
			$cant_medicamento = Medicamentos::model()->findAllBySql($sql);
			$cantidad_nueva = $cant_stock['0']['cantidad'] + ($model->cantidad * $cant_medicamento['0']['cantidad']);
			$sql = "UPDATE `stock` SET `cantidad`=".$cantidad_nueva." WHERE `id_medicamento` =".$model->id_medicamento;
			$execute = Yii::app()->db->createCommand($sql)->execute();
			
		}else{
			// Como el medicamente NO existe lo agrego en STOCK
			$model_stock = new Stock;
			$model_stock->id_medicamento = $model->id_medicamento;
			$model_stock->id_estacion = $model->id_estacion;
			$sql = "SELECT `cantidad` FROM `medicamentos` WHERE `id_medicamento` =".$model->id_medicamento;
			$cant_medicamento = Medicamentos::model()->findAllBySql($sql);
			$model_stock->cantidad = ($model->cantidad * $cant_medicamento['0']['cantidad']);
			$model_stock->save();
			
		}
	}
	
	public function StockUpdate($model, $cantidadInicial)
	{

		$existe = Stock::model()->findAll(array('condition'=>'id_medicamento=:id_medicamento',
								'params'=>array(':id_medicamento'=>$model->id_medicamento),));

		if($existe)
		{ // Como el medicamento EXISTE debo ACTUALIZAR la CANTIDAD en STOCK
			$sql = "SELECT `cantidad` FROM `stock` WHERE `id_medicamento` =".$model->id_medicamento;
			$cant_stock = Stock::model()->findAllBySql($sql);
			$cantidad_nueva = $cant_stock['0']['cantidad'] - $cantidadInicial + $model->cantidad;
			
			echo $cant_stock['0']['cantidad']."+". $model->cantidad ."-".$cantidadInicial;
			echo $cantidad_nueva;
			//exit();

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
	}
	

}
