<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	public function getId()
	{
            return $this->_id;
	}

	public function __construct($username,$password)
	{
		$this->username=$username;
		$this->password=$password;
	}
	
	public function authenticate()
	{
		$toCompare=Usuario::encrypt($this->password);
		$user=Usuario::model()->findByAttributes(array(
			'userName'=>$this->username,'pwd'=>$toCompare,
			'activo'=>1,
		));
		if($user==null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else
		{
			$this->_id=$user->idUsuario;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}