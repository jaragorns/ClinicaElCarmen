<?php

/**
 * This is the model class for table "item_solicitud".
 *
 * The followings are the available columns in table 'item_solicitud':
 * @property integer $id_item_solicitud
 * @property integer $id_stock
 * @property integer $id_solicitud
 * @property integer $estado
 * @property integer $id_medicamento
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property Solicitudes $idStock
 * @property Stock $idSolicitud
 */
class ItemSolicitud extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_solicitud, estado, id_medicamento', 'required'),
			array('id_stock, id_solicitud, estado, id_medicamento, cantidad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_item_solicitud, id_stock, id_solicitud, estado, id_medicamento, cantidad', 'safe', 'on'=>'search'),
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
			'idStock' => array(self::BELONGS_TO, 'Solicitudes', 'id_stock'),
			'idSolicitud' => array(self::BELONGS_TO, 'Stock', 'id_solicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_item_solicitud' => 'Id Item Solicitud',
			'id_stock' => 'Medicamento',
			'id_solicitud' => 'Id Solicitud',
			'estado' => 'Estado',
			'id_medicamento' => 'Medicamento',
			'cantidad' => 'Cantidad',
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

		$criteria->compare('id_item_solicitud',$this->id_item_solicitud);
		$criteria->compare('id_stock',$this->id_stock);
		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('id_medicamento',$this->id_medicamento);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemSolicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
