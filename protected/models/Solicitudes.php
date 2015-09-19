<?php

/**
 * This is the model class for table "solicitudes".
 *
 * The followings are the available columns in table 'solicitudes':
 * @property integer $id_solicitud
 * @property integer $estacion_id_estacion
 * @property integer $cantidad
 * @property string $usuarios
 * @property integer $stock_id_stock
 * @property integer $guardias_id_guardia
 *
 * The followings are the available model relations:
 * @property Estaciones $estacionIdEstacion
 * @property Guardias $guardiasIdGuardia
 * @property Stock $stockIdStock
 */
class Solicitudes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitudes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estacion_id_estacion, usuarios, stock_id_stock, guardias_id_guardia', 'required'),
			array('estacion_id_estacion, cantidad, stock_id_stock, guardias_id_guardia', 'numerical', 'integerOnly'=>true),
			array('usuarios', 'length', 'max'=>45),
			array('cantidad', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, estacion_id_estacion, cantidad, usuarios, stock_id_stock, guardias_id_guardia, estado, fecha_solicitud', 'safe', 'on'=>'search'),
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
			'estacionIdEstacion' => array(self::BELONGS_TO, 'Estaciones', 'estacion_id_estacion'),
			'guardiasIdGuardia' => array(self::BELONGS_TO, 'Guardias', 'guardias_id_guardia'),
			'stockIdStock' => array(self::BELONGS_TO, 'Stock', 'stock_id_stock'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud' => 'Id Solicitud',
			'fecha_solicitud' => 'Fecha de Solicitud',
			'estacion_id_estacion' => 'Servicio Origen',
			'cantidad' => 'Cantidad',
			'usuarios' => 'Realizada Por',
			'stock_id_stock' => 'Medicamento',
			'guardias_id_guardia' => 'Guardia',
			'estado' => 'Estado',
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

		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('estacion_id_estacion',$this->estacion_id_estacion);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('usuarios',$this->usuarios,true);
		$criteria->compare('stock_id_stock',$this->stock_id_stock);
		$criteria->compare('guardias_id_guardia',$this->guardias_id_guardia);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitudes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
