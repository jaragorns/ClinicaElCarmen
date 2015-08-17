<?php

/**
 * This is the model class for table "unidad_medidas".
 *
 * The followings are the available columns in table 'unidad_medidas':
 * @property integer $id_unidad_medidas
 * @property string $descripcion
 * @property string $abreviatura
 *
 * The followings are the available model relations:
 * @property Medicamentos[] $medicamentoses
 */
class UnidadMedidas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unidad_medidas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, abreviatura', 'required'),
			array('descripcion', 'length', 'max'=>80),
			array('abreviatura', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_unidad_medidas, descripcion, abreviatura', 'safe', 'on'=>'search'),
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
			'medicamentoses' => array(self::HAS_MANY, 'Medicamentos', 'unidad_medida'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_unidad_medidas' => 'Id Unidad Medidas',
			'descripcion' => 'Descripción',
			'abreviatura' => 'Abreviatura',
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

		$criteria->compare('id_unidad_medidas',$this->id_unidad_medidas);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('abreviatura',$this->abreviatura,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnidadMedidas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
