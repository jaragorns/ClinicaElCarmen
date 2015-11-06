<?php

/**
 * This is the model class for table "solicitudes".
 *
 * The followings are the available columns in table 'solicitudes':
 * @property integer $id_solicitud
 * @property string $fecha_solicitud
 * @property integer $estacion_id_estacion
 * @property string $usuarios
 * @property integer $guardias_id_guardia
 *
 * The followings are the available model relations:
 * @property ItemSolicitud[] $itemSolicituds
 * @property Estaciones $estacionIdEstacion
 * @property Guardias $guardiasIdGuardia
 */
class Solicitudes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitudes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_solicitud, estacion_id_estacion, usuarios, guardias_id_guardia, estado', 'required'),
			array('estacion_id_estacion, guardias_id_guardia, estado', 'numerical', 'integerOnly'=>true),
			array('usuarios', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, fecha_solicitud, estacion_id_estacion, usuarios, guardias_id_guardia, estado, id_usuario_procesa', 'safe', 'on'=>'search'),
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
			'itemSolicituds' => array(self::HAS_MANY, 'ItemSolicitud', 'id_stock'),
			'estacionIdEstacion' => array(self::BELONGS_TO, 'Estaciones', 'estacion_id_estacion'),
			'guardiasIdGuardia' => array(self::BELONGS_TO, 'Guardias', 'guardias_id_guardia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud' => 'Id Solicitud',
			'fecha_solicitud' => 'Fecha de Solicitud',
			'estacion_id_estacion' => 'Solicitado A',
			'usuarios' => 'Realizado Por',
			'guardias_id_guardia' => 'Guardia',
			'estado' => 'Estado'
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

		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('estacion_id_estacion',$this->estacion_id_estacion);
		$criteria->compare('usuarios',$this->usuarios,true);
		$criteria->compare('guardias_id_guardia',$this->guardias_id_guardia);
		$criteria->compare('estado',$this->estado);

		$criteria->addCondition("usuarios=".Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder' => 'fecha_solicitud DESC, estado ASC',
			),
		));
	}

	public function searchPendiente()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$estacion = SolicitudesController::verificarGuardia(); 

		if(!empty($estacion) || Yii::app()->user->role=="Farmaceuta"){
			if(Yii::app()->user->role=="Farmaceuta")
				$estacion = 6;
			else
				$estacion = $estacion['id_estacion'];
		
			$criteria->addCondition("estacion_id_estacion='$estacion' AND estado!=2");

			$criteria->compare('id_solicitud',$this->id_solicitud);
			$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
			$criteria->compare('estacion_id_estacion',$estacion);
			$criteria->compare('usuarios',$this->usuarios,true);
			$criteria->compare('guardias_id_guardia',$this->guardias_id_guardia);
			$criteria->compare('estado',$this->estado);

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder' => 'fecha_solicitud DESC, estado ASC',
				),
			));	
		}else{
			Yii::app()->user->setFlash('notice','Debe estar de guardia para Gestionar Solicitudes');

			$criteria->addCondition("1=0");

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
			));	
		}
		
	}

	public function searchHistorial()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

			if(Yii::app()->user->role=="Farmaceuta"){
				$criteria->addCondition("estado=2");
			}				
			else{
				$criteria->addCondition("id_usuario_procesa='".Yii::app()->user->id."' AND estado=2");
			}

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder' => 'fecha_solicitud DESC, estado ASC',
				),
			));	
	}

	public function searchItems($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria;
		$criteria->addCondition("id_solicitud='$id'");
			
		return new CActiveDataProvider('ItemSolicitud', array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitudes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
