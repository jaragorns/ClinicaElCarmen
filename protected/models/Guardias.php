<?php

/**
 * This is the model class for table "guardias".
 *
 * The followings are the available columns in table 'guardias':
 * @property integer $id_guardia
 * @property integer $id_usuario
 * @property integer $id_estacion
 * @property integer $dia_1
 * @property integer $dia_2
 * @property integer $dia_3
 * @property integer $dia_4
 * @property integer $dia_5
 * @property integer $dia_6
 * @property integer $dia_7
 * @property integer $dia_8
 * @property integer $dia_9
 * @property integer $dia_10
 * @property integer $dia_11
 * @property integer $dia_12
 * @property integer $dia_13
 * @property integer $dia_14
 * @property integer $dia_15
 * @property integer $dia_16
 * @property integer $dia_17
 * @property integer $dia_18
 * @property integer $dia_19
 * @property integer $dia_20
 * @property integer $dia_21
 * @property integer $dia_22
 * @property integer $dia_23
 * @property integer $dia_24
 * @property integer $dia_25
 * @property integer $dia_26
 * @property integer $dia_27
 * @property integer $dia_28
 * @property integer $dia_29
 * @property integer $dia_30
 * @property integer $dia_31
 * @property integer $mes
 * @property integer $ano
 *
 * The followings are the available model relations:
 * @property BitacoraDescargas[] $bitacoraDescargases
 * @property Estaciones $idEstacion
 * @property Usuarios $idUsuario
 * @property Solicitudes[] $solicitudes
 */
class Guardias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'guardias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_estacion, mes, ano', 'required'),
			array('id_usuario, id_estacion, dia_1, dia_2, dia_3, dia_4, dia_5, dia_6, dia_7, dia_8, dia_9, dia_10, dia_11, dia_12, dia_13, dia_14, dia_15, dia_16, dia_17, dia_18, dia_19, dia_20, dia_21, dia_22, dia_23, dia_24, dia_25, dia_26, dia_27, dia_28, dia_29, dia_30, dia_31, mes, ano', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_guardia, id_usuario, id_estacion, dia_1, dia_2, dia_3, dia_4, dia_5, dia_6, dia_7, dia_8, dia_9, dia_10, dia_11, dia_12, dia_13, dia_14, dia_15, dia_16, dia_17, dia_18, dia_19, dia_20, dia_21, dia_22, dia_23, dia_24, dia_25, dia_26, dia_27, dia_28, dia_29, dia_30, dia_31, mes, ano', 'safe', 'on'=>'search'),
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
			'bitacoraDescargases' => array(self::HAS_MANY, 'BitacoraDescargas', 'id_guardia'),
			'idEstacion' => array(self::BELONGS_TO, 'Estaciones', 'id_estacion'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'solicitudes' => array(self::HAS_MANY, 'Solicitudes', 'guardias_id_guardia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_guardia' => 'Id Guardia',
			'id_usuario' => 'Enfermera:',
			'id_estacion' => 'Servicio:',
			'dia_1' => '1',
			'dia_2' => '2',
			'dia_3' => '3',
			'dia_4' => '4',
			'dia_5' => '5',
			'dia_6' => '6',
			'dia_7' => '7',
			'dia_8' => '8',
			'dia_9' => '9',
			'dia_10' => '10',
			'dia_11' => '11',
			'dia_12' => '12',
			'dia_13' => '13',
			'dia_14' => '14',
			'dia_15' => '15',
			'dia_16' => '16',
			'dia_17' => '17',
			'dia_18' => '18',
			'dia_19' => '19',
			'dia_20' => '20',
			'dia_21' => '21',
			'dia_22' => '22',
			'dia_23' => '23',
			'dia_24' => '24',
			'dia_25' => '25',
			'dia_26' => '26',
			'dia_27' => '27',
			'dia_28' => '28',
			'dia_29' => '29',
			'dia_30' => '30',
			'dia_31' => '31',
			'mes' => 'Mes',
			'ano' => 'Año',
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

		if(isset($_GET['mes']) && isset($_GET['ano'])){
			$mes = 	$_GET['mes'];
			$ano = $_GET['ano'];
			$criteria->condition = "mes like :mes AND ano like :ano";
			$criteria->params = array(':mes'=>$mes,':ano'=>$ano);
			
		}	
		
		$sort = new CSort();
		$sort->defaultOrder = 'mes ASC, ano ASC, id_estacion ASC';

		$criteria->compare('id_guardia',$this->id_guardia);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_estacion',$this->id_estacion);
		$criteria->compare('dia_1',$this->dia_1);
		$criteria->compare('dia_2',$this->dia_2);
		$criteria->compare('dia_3',$this->dia_3);
		$criteria->compare('dia_4',$this->dia_4);
		$criteria->compare('dia_5',$this->dia_5);
		$criteria->compare('dia_6',$this->dia_6);
		$criteria->compare('dia_7',$this->dia_7);
		$criteria->compare('dia_8',$this->dia_8);
		$criteria->compare('dia_9',$this->dia_9);
		$criteria->compare('dia_10',$this->dia_10);
		$criteria->compare('dia_11',$this->dia_11);
		$criteria->compare('dia_12',$this->dia_12);
		$criteria->compare('dia_13',$this->dia_13);
		$criteria->compare('dia_14',$this->dia_14);
		$criteria->compare('dia_15',$this->dia_15);
		$criteria->compare('dia_16',$this->dia_16);
		$criteria->compare('dia_17',$this->dia_17);
		$criteria->compare('dia_18',$this->dia_18);
		$criteria->compare('dia_19',$this->dia_19);
		$criteria->compare('dia_20',$this->dia_20);
		$criteria->compare('dia_21',$this->dia_21);
		$criteria->compare('dia_22',$this->dia_22);
		$criteria->compare('dia_23',$this->dia_23);
		$criteria->compare('dia_24',$this->dia_24);
		$criteria->compare('dia_25',$this->dia_25);
		$criteria->compare('dia_26',$this->dia_26);
		$criteria->compare('dia_27',$this->dia_27);
		$criteria->compare('dia_28',$this->dia_28);
		$criteria->compare('dia_29',$this->dia_29);
		$criteria->compare('dia_30',$this->dia_30);
		$criteria->compare('dia_31',$this->dia_31);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('ano',$this->ano);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria, 'sort'=>$sort
		)); 
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Guardias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
