<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property integer $id_proveedor
 * @property string $nombre
 * @property string $rif
 * @property string $telefono
 * @property string $direccion
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Facturas[] $facturases
 */
class Proveedores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, rif, telefono, direccion', 'required'),
			array('nombre, telefono, direccion, email', 'length', 'max'=>45),
			array('email', 'email'),
			array('rif', 'length', 'max'=>10),
			array('rif', 'unique', 
     			'className' => 'Proveedores',
        		'attributeName' => 'rif',
        		'message'=>'Este RIF ya existe.'
        	),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proveedor, nombre, rif, telefono, direccion, email', 'safe', 'on'=>'search'),
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
			'facturas' => array(self::HAS_MANY, 'Facturas', 'id_proveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_proveedor' => 'Id Proveedor',
			'nombre' => 'Nombre',
			'rif' => 'Rif',
			'telefono' => 'Tel&eacute;fono',
			'direccion' => 'Direcci&oacute;n',
			'email' => 'Email',
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

		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
