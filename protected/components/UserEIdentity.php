<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserEIdentity extends CUserIdentity
{
	private $_id;
	 
	public function getId()
	{
            return $this->_id;
	}
	
	public function __construct($username)
	{
		$this->username=$username;
	}
	 
	public function authenticate()
	{
		$sql="SELECT idEmpleado,nombre FROM empleado WHERE idEmpleado=:id ORDER BY idEmpleado";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':id',$this->username);
		$command->prepare();
		$row=$command->queryRow();
		if(!$row)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else
		{
			$sql="SELECT idUsuario FROM usuario WHERE userName=:id";
			$command=Yii::app()->db->createCommand($sql);
			$command->bindParam(':id',$this->username);
			$command->prepare();
			$count=(int)$command->queryScalar();
			if ($count==0)
			{
				$user=new Usuario;
				$user->nombre=$row['nombre'];
				$user->email='dummy@dummy.com';
				$user->pwd='SinContraseña';
				$user->activo=1;
				$user->userName=$row['idEmpleado'];
				$user->save(false);
				$sql="INSERT INTO assignments (itemname,userid) VALUES ('Participante',:id)";
				$command=Yii::app()->db->createCommand($sql);
				$command->bindParam(':id',$user->idUsuario);
				$command->prepare();
				$command->execute();
			}
			$this->_id=$count;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}