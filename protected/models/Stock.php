<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $id_stock
 * @property integer $cantidad
 * @property integer $id_estacion
 * @property integer $id_medicamento
 *
 * The followings are the available model relations:
 * @property BitacoraDescargas[] $bitacoraDescargases
 * @property Solicitudes[] $solicitudes
 * @property Estaciones $idEstacion
 * @property Medicamentos $idMedicamento
 */
class Stock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, id_estacion, id_medicamento', 'required'),
			array('cantidad, id_estacion, id_medicamento', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_stock, cantidad, id_estacion, id_medicamento', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bitacoraDescargases' => array(self::HAS_MANY, 'BitacoraDescargas', 'id_stock'),
			'solicitudes' => array(self::HAS_MANY, 'Solicitudes', 'stock_id_stock'),
			'idEstacion' => array(self::BELONGS_TO, 'Estaciones', 'id_estacion'),
			'idMedicamento' => array(self::BELONGS_TO, 'Medicamentos', 'id_medicamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_stock' => 'Id Stock',
			'cantidad' => 'Cantidad',
			'id_estacion' => 'Estación',
			'id_medicamento' => 'Medicamento',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_stock',$this->id_stock);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('id_estacion',$this->id_estacion);
		$criteria->compare('id_medicamento',$this->id_medicamento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchDescarga()
	{
		// @todo Please modify the following code to remove attributes that should not be searched
		$criteria=new CDbCriteria;

		$criteria->compare('id_medicamento',$this->id_medicamento);

		$estacion = SolicitudesController::verificarGuardia(); 

		if(!empty($estacion)){

			$estacion = $estacion['id_estacion'];
		
			$criteria->addCondition("id_estacion='$estacion'");

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
			));	

		}else{
			Yii::app()->user->setFlash('notice','Debe estar de Guardia para realizar descargas en su servicio.');

			$criteria->addCondition("1=0");

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
			));	
		}

	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
