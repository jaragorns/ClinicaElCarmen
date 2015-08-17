<?php

/**
 * This is the model class for table "inventario".
 *
 * The followings are the available columns in table 'inventario':
 * @property integer $id_inventario
 * @property integer $cantidad
 * @property string $precio_compra
 * @property integer $id_factura
 * @property integer $id_usuario
 * @property integer $id_medicamento
 * @property integer $id_estacion
 *
 * The followings are the available model relations:
 * @property Facturas $idFactura
 * @property Usuarios $idUsuario
 * @property Medicamentos $idMedicamento
 * @property Estaciones $idEstacion
 */
class Inventario extends CActiveRecord
{

	public $usuario;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, precio_compra, id_factura, id_usuario, id_medicamento, id_estacion', 'required'),
			array('cantidad, id_factura, id_usuario, id_medicamento, id_estacion', 'numerical', 'integerOnly'=>true),
			array('precio_compra', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_inventario, cantidad, precio_compra, id_factura, id_usuario, id_medicamento, id_estacion', 'safe', 'on'=>'search'),
			array('usuario', 'safe', 'on'=>'search'),
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
			'idFactura' => array(self::BELONGS_TO, 'Facturas', 'id_factura'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'idMedicamento' => array(self::BELONGS_TO, 'Medicamentos', 'id_medicamento'),
			'idEstacion' => array(self::BELONGS_TO, 'Estaciones', 'id_estacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inventario' => 'Id Inventario',
			'cantidad' => 'Cantidad',
			'precio_compra' => 'Precio de Compra',
			'id_factura' => 'Factura',
			'id_usuario' => 'Usuario',
			'id_medicamento' => 'Medicamento',
			'id_estacion' => 'Estación',
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

		$criteria->compare('id_inventario',$this->id_inventario);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio_compra',$this->precio_compra,true);
		$criteria->compare('id_factura',$this->id_factura);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_medicamento',$this->id_medicamento);
		$criteria->compare('id_estacion',$this->id_estacion);

		$criteria->with = array('idUsuario');
		$criteria->compare('idUsuario.username', $this->usuario, true );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
