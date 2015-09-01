<?php

/**
 * This is the model class for table "medicamentos".
 *
 * The followings are the available columns in table 'medicamentos':
 * @property integer $id_medicamento
 * @property string $nombre
 * @property string $componente
 * @property string $unidad_medida
 * @property string $precio_contado
 * @property string $precio_seguro
 * @property double $iva
 *
 * The followings are the available model relations:
 * @property Inventario[] $inventarios
 * @property Stock[] $stocks
 */
class Medicamentos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medicamentos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, unidad_medida, precio_contado, precio_seguro, iva', 'required'),
			array('nombre, componente', 'length', 'max'=>45),
			array('unidad_medida', 'length', 'max'=>20),
			array('iva', 'length', 'max'=>5),
			array('precio_contado, precio_seguro', 'length', 'max'=>9),
     		array('nombre', 'unique', 
     			'className' => 'Medicamentos',
        		'attributeName' => 'nombre',
        		'message'=>'Este medicamento ya existe.'
        	),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_medicamento, nombre, componente, unidad_medida, precio_contado, precio_seguro, iva', 'safe', 'on'=>'search'),
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
			'inventarios' => array(self::HAS_MANY, 'Inventario', 'id_medicamento'),
			'stocks' => array(self::HAS_MANY, 'Stock', 'id_medicamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_medicamento' => 'Id Medicamento',
			'nombre' => 'Nombre',
			'componente' => 'Componente',
			'unidad_medida' => 'Unidad de Medida',
			'precio_contado' => 'Precio Contado',
			'precio_seguro' => 'Precio Seguro',
			'iva' => '% IVA',
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

		$criteria->compare('id_medicamento',$this->id_medicamento);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('componente',$this->componente,true);
		$criteria->compare('unidad_medida',$this->unidad_medida,true);
		$criteria->compare('precio_contado',$this->precio_contado,true);
		$criteria->compare('precio_seguro',$this->precio_seguro,true);
		$criteria->compare('iva',$this->iva,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medicamentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
