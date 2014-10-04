<?php

/**
 * This is the model class for table "comprobantes".
 *
 * The followings are the available columns in table 'comprobantes':
 * @property integer $id_comprobante
 * @property string $num_comprobante
 * @property string $num_cheque
 * @property integer $monto
 * @property string $fecha
 * @property string $detalle
 * @property integer $estado
 * @property integer $usuarios_userid
 * @property integer $usuarios_roles_roleid
 * @property integer $bancos_id_bancos
 *
 * The followings are the available model relations:
 * @property Bancos $bancosIdBancos
 * @property Roles $usuariosRolesRole
 * @property Usuarios $usuariosUser
 */
class Comprobantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comprobantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_comprobante, num_cheque, monto, fecha, detalle, estado, usuarios_userid, usuarios_roles_roleid, bancos_id_bancos', 'required'),
			array('monto, estado, usuarios_userid, usuarios_roles_roleid, bancos_id_bancos', 'numerical', 'integerOnly'=>true),
			array('num_comprobante', 'length', 'max'=>10),
			array('num_cheque', 'length', 'max'=>20),
			array('detalle', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_comprobante, num_comprobante, num_cheque, monto, fecha, detalle, estado, usuarios_userid, usuarios_roles_roleid, bancos_id_bancos', 'safe', 'on'=>'search'),
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
			'bancosIdBancos' => array(self::BELONGS_TO, 'Bancos', 'bancos_id_bancos'),
			'usuariosRolesRole' => array(self::BELONGS_TO, 'Roles', 'usuarios_roles_roleid'),
			'usuariosUser' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_comprobante' => 'Id Comprobante',
			'num_comprobante' => 'Num Comprobante',
			'num_cheque' => 'Num Cheque',
			'monto' => 'Monto',
			'fecha' => 'Fecha',
			'detalle' => 'Detalle',
			'estado' => 'Estado',
			'usuarios_userid' => 'Usuarios Userid',
			'usuarios_roles_roleid' => 'Usuarios Roles Roleid',
			'bancos_id_bancos' => 'Bancos Id Bancos',
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

		$criteria->compare('id_comprobante',$this->id_comprobante);
		$criteria->compare('num_comprobante',$this->num_comprobante,true);
		$criteria->compare('num_cheque',$this->num_cheque,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('usuarios_userid',$this->usuarios_userid);
		$criteria->compare('usuarios_roles_roleid',$this->usuarios_roles_roleid);
		$criteria->compare('bancos_id_bancos',$this->bancos_id_bancos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comprobantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
