<?php

/**
 * This is the model class for table "bitacora_descargas".
 *
 * The followings are the available columns in table 'bitacora_descargas':
 * @property integer $id_bitacora
 * @property string $fecha_hora
 * @property integer $cantidad
 * @property integer $estado
 * @property integer $id_stock
 * @property integer $id_guardia
 *
 * The followings are the available model relations:
 * @property Guardias $idGuardia
 * @property Tickets[] $tickets
 */
class BitacoraDescargas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bitacora_descargas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_hora, cantidad, estado, id_stock, id_guardia', 'required'),
			array('cantidad, estado, id_stock, id_guardia', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_bitacora, fecha_hora, cantidad, estado, id_stock, id_guardia', 'safe', 'on'=>'search'),
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
			'idGuardia' => array(self::BELONGS_TO, 'Guardias', 'id_guardia'),
			'tickets' => array(self::HAS_MANY, 'Tickets', 'bitacora_descargas_id_bitacora'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bitacora' => 'Id Bitacora',
			'fecha_hora' => 'Fecha Hora',
			'cantidad' => 'Cantidad',
			'estado' => 'Estado',
			'id_stock' => 'Id Stock',
			'id_guardia' => 'Id Guardia',
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

		//$criteria->join='LEFT JOIN Stock ON Stock.id_estacion='.SolicitudesController::verificarGuardia()->id_estacion;
        //$criteria->condition='estado=1';

		$criteria->compare('id_bitacora',$this->id_bitacora);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('id_stock',$this->id_stock);
		$criteria->compare('id_guardia',$this->id_guardia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder' => 'estado DESC, fecha_hora DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BitacoraDescargas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
