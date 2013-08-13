<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $idUsuario
 * @property string $nombre
 * @property string $userName
 * @property string $pwd
 * @property integer $activo
 * @property string $email
 */
class Usuario extends CActiveRecord
{

	public $newPwd="";
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, userName, pwd, activo, email', 'required'),
			array('pwd, newPwd', 'required','on'=>'chPwd'),
			array('pwd, newPwd', 'validPassword','on'=>'chPwd'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('email', 'email'),
			array('nombre', 'length', 'max'=>120),
			array('userName', 'length', 'max'=>20),
			array('pwd', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUsuario, nombre, userName, pwd, activo, email', 'safe', 'on'=>'search'),
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
			'assignments'=>array(self::HAS_MANY,"Assignments",'userid','joinType'=>'INNER JOIN'),
			'empleado'=>array(self::HAS_ONE,"Empleado",array('idEmpleado'=>'userName'),'joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'userName' => 'User Name',
			'pwd' => 'Contraseña',
			'newPwd' => 'Confirme Contraseña',
			'activo' => 'Activo',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('email',$this->email,true);
		$criteria->with='assignments';
		$criteria->together=true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function encrypt($pwd)
	{
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$key = "w335itE%#l4v1D4_";
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $pwd, MCRYPT_MODE_ECB, $iv);
		return base64_encode($crypttext);
	}

	public static function emailBasedPwd($email)
	{
		$aParts=explode('@',$email);
		return $aParts[0].implode("",Usuario::randomDigits(4));
	}

	public static function randomDigits($max)
	{
		$aNumbers=array(1,2,3,4,5,6,7,8,9,0);
		return array_rand($aNumbers,$max);
	}

	public function isAdmin()
	{
		return $this->assignments!=null && $this->assignments[0]->itemname=="Administrador";
	}

	public function validPassword($attribute, $params)
	{
		if (strlen(trim($this->pwd)) > 15 || strlen(trim($this->pwd)) < 6 ||  !ctype_alnum($this->pwd))
			$this->addError($attribute, 'La contraseña debe ser de 6 a 15 caracteres (letras y números solamente)');
		if ($this->pwd!=$this->newPwd)
			$this->addError($attribute, 'La contraseña y la confirmación no coinciden.');
	}

	public function validUserName($attribute, $params)
	{
        if (strlen(trim($this->userName)) < 5 ||  !ctype_alnum($this->userName))
            $this->addError($attribute, 'El username debe ser de 6 a 15 caracteres (letras y números solamente)');
        else
        {
            if ($this->isNewRecord)
            {
                $criteria=new CDbCriteria;
                $criteria->condition='userName=\''.$this->userName.'\'';
                $criteria->limit=1;
                $toFind=Usuario::model()->find($criteria);
                if ($toFind!=null)
                    $this->addError($attribute, 'El username que especificó ya se encuentra registrado, por favor especifique otro.');
            }
        }
	}

	public function validEmail($attribute, $params)
	{
		if ($this->isNewRecord)
		{
			$criteria=new CDbCriteria;
			$criteria->condition='email=\''.$this->email.'\'';
			$criteria->limit=1;
			$toFind=Usuario::model()->find($criteria);
			if ($toFind!=null)
				$this->addError($attribute, 'El email que especificó ya se encuentra registrado, por favor especifique otro.');
		}
	}


}