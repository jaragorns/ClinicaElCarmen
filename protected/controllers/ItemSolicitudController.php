<?php

class ItemSolicitudController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionAutocomplete($term) 
	{
		$criteria = new CDbCriteria;
		$criteria->join = "RIGHT JOIN stock ON stock.id_medicamento = t.id_medicamento"; 
		$criteria->condition = "cantidad>0";
		$criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true);
		$criteria->order = 'nombre';
		$criteria->limit = 10; 
		
		$data = Medicamentos::model()->findAll($criteria);

		if (!empty($data))
		{
  			$arr = array();
  			foreach ($data as $item) {

	   			$idStock = Stock::model()->findByAttributes(array('id_medicamento'=>$item->id_medicamento))->id_stock;

	   			$arr[] = array(
	    			'id_stock' => $idStock,
	    			'id_medicamento'=>$item->id_medicamento,
	    			'value' => $item->nombre,
	    		);
  			}
	 	}else{
	  		$arr = array();
	  		$arr[] = array(
	   			'id_stock' => '',
	   			'id_medicamento' => '',
	   			'value' => 'El medicamento no existe, por favor verifíque.',
	   			'label' => 'El medicamento no existe, por favor verifíque.',
	  		);
	 	}
  
		echo CJSON::encode($arr);
	}
}