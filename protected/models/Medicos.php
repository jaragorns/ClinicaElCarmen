<?php

/**
 * This is the model class for table "medicos".
 *
 * The followings are the available columns in table 'medicos':
 * @property integer $id_medico
 * @property string $nombre_completo
 * @property integer $cedula
 * @property string $especialidad
 * @property string $rif
 * @property string $consulta
 */
class Medicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_completo, cedula, especialidad, rif, consulta', 'required'),
			array('id_medico', 'numerical', 'integerOnly'=>true),
			array('nombre_completo', 'length', 'max'=>80),
			array('cedula', 'length', 'max'=>10),
			array('especialidad', 'length', 'max'=>40),
			array('rif', 'length', 'max'=>13),
			array('consulta', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_medico, nombre_completo, cedula, especialidad, rif, consulta', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_medico' => 'Id Médico',
			'nombre_completo' => 'NOMBRE DEL MEDICO',
			'cedula' => 'C.I',
			'especialidad' => 'ESPECIALIDAD',
			'rif' => 'RIF',
			'consulta' => 'DIAS DE CONSULTA',
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

		$criteria->compare('id_medico',$this->id_medico);
		$criteria->compare('nombre_completo',$this->nombre_completo,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('especialidad',$this->especialidad,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('consulta',$this->consulta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
