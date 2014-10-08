<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
		
		$user = Usuarios::model()->find("LOWER(username)=?",array(strtolower($this->username)));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->validatePassword($this->password))	//elseif($user->password!==crypt($this->password,'salt'))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			//$role = Roles::model()->findByPk($user->roles_id);
			//$this->setState('role',$role->description);
			$role = Authassignment::model()->findByAttributes(array('userid'=>$user->id))->itemname;
			$this->setState('role',$role);
			$this->setState('nombres',$user->nombres);
			$this->setState('apellidos',$user->apellidos);
			$this->setState('cargo',$user->cargo);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	/**
	 * @return integer the ID of the user record.
	 */
	public function getId()
	{
		return $this->_id;
	}
}