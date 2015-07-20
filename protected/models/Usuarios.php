<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $cargo
 * @property string $nombres
 * @property string $apellidos
 * @property string $telefono
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Comprobantes[] $comprobantes
 * @property AuthAssignment $roles
 */
class Usuarios extends CActiveRecord
{
	public $description_role;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, cargo, nombres, apellidos, telefono, email', 'required'),
			array('username', 'length', 'max'=>64),
			array('password', 'length', 'max'=>255),
			array('nombres, apellidos', 'length', 'max'=>30),
			array('cargo, email', 'length', 'max'=>50),
			array('telefono', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, cargo, nombres, apellidos, telefono, email','safe', 'on'=>'search'),
			array('description_role', 'safe', 'on'=>'search'),
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
			'comprobantes' => array(self::HAS_MANY, 'Comprobantes', 'usuarios_userid'),
			'roles' => array(self::BELONGS_TO, 'Authassignment', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'cargo' => 'Cargo',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'telefono' => 'Tel&eacute;fono',
			'email' => 'Email',
			'description_role' => 'Rol',
		);
	}

	/**
	 * @return array to obtain full name 
	 */
	public function getNombreCompleto()
    {
        return $this->nombres.' '.$this->apellidos;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);

		$criteria->with = array('roles');
		$criteria->compare('roles.itemname', $this->description_role, true );
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}
}
