<?php
class WebUser extends CWebUser {

      // Store model to not repeat query.
    private $_model;

	public function getIdEmpleado()
	{
		if (Yii::app()->user->isGuest)
			return -1;
		$sql="SELECT userName FROM usuario WHERE idUsuario=:id";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':id', Yii::app()->user->id);
		$command->prepare();
		return (int)$command->queryScalar();
	}

    public function getRoles()
    {
        $roles=Assignments::model()->findAll('userid='.$this->id);
        return $roles->itemname;
    }

    public function isAdmin()
    {
		if (Yii::app()->user->isGuest)
			return false;
        $roles=Assignments::model()->find('userid='.$this->id.' AND itemname=\'Administrador\'');
        return $roles!=null;
    }


    public function isEmployee()
    {
		if (Yii::app()->user->isGuest)
			return false;
        $roles=Assignments::model()->find("userid=".$this->id." AND itemname<>'Administrador'");
        return $roles!=null;
    }

    public function getFullName()
    {
		if (Yii::app()->user->isGuest)
			return "";
		$cte=Usuario::model()->find('idUsuario='.Yii::app()->user->id);
		if ($cte!=null)
			return $cte->nombre;
		else
			return "";
    }

	public function isInRole($possibleRoles)
	{
		if (Yii::app()->user->isGuest)
				return false;
		if (!isset($possibleRoles) || !is_array($possibleRoles) || count($possibleRoles)==0)
			return false;
		$strRoles="'".implode("','", $possibleRoles)."'";
        $roles=Assignments::model()->find('userid='.$this->id.' AND itemname IN ('.$strRoles.')');
        return $roles!=null;
	}

  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Usuario::model()->findByPk($id);
            else
                $this->_model=Usuario::model()->findByPk($this->id);
       }
        return $this->_model;
    }

}
