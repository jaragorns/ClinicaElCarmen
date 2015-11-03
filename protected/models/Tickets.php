<?php

/**
 * This is the model class for table "tickets".
 *
 * The followings are the available columns in table 'tickets':
 * @property integer $id_ticket
 * @property integer $id_medicamento
 * @property integer $cantidad
 * @property integer $estado
 * @property integer $bitacora_descargas_id_bitacora
 *
 * The followings are the available model relations:
 * @property BitacoraDescargas $bitacoraDescargasIdBitacora
 */
class Tickets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tickets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_medicamento, cantidad, bitacora_descargas_id_bitacora', 'required'),
			array('id_medicamento, cantidad, estado, bitacora_descargas_id_bitacora', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ticket, id_medicamento, cantidad, estado, bitacora_descargas_id_bitacora', 'safe', 'on'=>'search'),
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
			'bitacoraDescargasIdBitacora' => array(self::BELONGS_TO, 'BitacoraDescargas', 'bitacora_descargas_id_bitacora'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ticket' => 'Id Ticket',
			'id_medicamento' => 'Medicamento',
			'cantidad' => 'Cantidad',
			'estado' => 'Estado',
			'bitacora_descargas_id_bitacora' => 'Bitacora Descarga',
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

		$criteria->addCondition("estado=0");

		$criteria->compare('id_ticket',$this->id_ticket);
		$criteria->compare('id_medicamento',$this->id_medicamento);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('bitacora_descargas_id_bitacora',$this->bitacora_descargas_id_bitacora);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function historial()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->addCondition("estado=1 OR estado=2");

		$criteria->compare('id_ticket',$this->id_ticket);
		$criteria->compare('id_medicamento',$this->id_medicamento);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('bitacora_descargas_id_bitacora',$this->bitacora_descargas_id_bitacora);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
