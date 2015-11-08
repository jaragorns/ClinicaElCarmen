<?php

/**
 * This is the model class for table "facturas".
 *
 * The followings are the available columns in table 'facturas':
 * @property integer $id_factura
 * @property string control_factura
 * @property string $num_factura
 * @property string $fecha
 * @property integer $monto
 * @property integer $id_proveedor
 * @property string $retencion
 * The followings are the available model relations:
 * @property Proveedores $idProveedor
 * @property Inventario[] $inventarios
 */
class Facturas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facturas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_factura, control_factura, fecha_factura, fecha_vencimiento ,fecha_entrada, monto, id_proveedor, retencion', 'required'),
			array('id_proveedor', 'numerical', 'integerOnly'=>true),
			array('monto', 'length', 'max'=>15),
			array('num_factura', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_factura, num_factura, fecha_factura, fecha_entrada, fecha_vencimiento, monto, id_proveedor, retencion', 'safe', 'on'=>'search'),
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
			'idProveedor' => array(self::BELONGS_TO, 'Proveedores', 'id_proveedor'),
			'inventarios' => array(self::HAS_MANY, 'Inventario', 'id_factura'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_factura' => 'Id Factura',
			'control_factura' => 'Control Fact:',
			'num_factura' => 'Num Factura:',
			'fecha_factura' => 'Fecha Fact:',
			'fecha_entrada' => 'Fecha Entra:',
			'fecha_vencimiento' => 'Fecha Venc:',
			'monto' => 'Total Factura:',
			'retencion' => 'Retención:',
			'id_proveedor' => 'Proveedor:',
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

		$criteria->compare('id_factura',$this->id_factura);
		$criteria->compare('control_factura',$this->control_factura,true);
		$criteria->compare('num_factura',$this->num_factura,true);
		$criteria->compare('fecha_factura',$this->fecha_factura,true);
		$criteria->compare('fecha_entrada',$this->fecha_entrada,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('retencion',$this->retencion);
		$criteria->compare('id_proveedor',$this->id_proveedor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder' => 'fecha_entrada DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facturas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
