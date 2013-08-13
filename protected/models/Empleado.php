<?php

/**
 * This is the model class for table "empleado".
 *
 * The followings are the available columns in table 'empleado':
 * @property string $idEmpleado
 * @property string $nombre
 * @property string $sucursal
 * @property string $departamento
 * @property string $region
 * @property integer $registrado
 * @property string $fechaRegistro
 * @property string $ipRegistro
 */
class Empleado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Empleado the static model class
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
		return 'empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, nombre, sucursal, departamento, region', 'required'),
			array('registrado', 'numerical', 'integerOnly'=>true),
			array('idEmpleado', 'length', 'max'=>20),
			array('nombre', 'length', 'max'=>120),
			array('sucursal', 'length', 'max'=>10),
			array('departamento, region', 'length', 'max'=>80),
			array('ipRegistro', 'length', 'max'=>15),
			array('fechaRegistro', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEmpleado, nombre, sucursal, departamento, region, registrado, fechaRegistro, ipRegistro', 'safe', 'on'=>'search'),
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
			'usuario'=>array(self::HAS_ONE,'Usuario','userName','joinType'=>'LEFT JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEmpleado' => 'Id Empleado',
			'nombre' => 'Nombre',
			'sucursal' => 'Sucursal',
			'departamento' => 'Departamento',
			'region' => 'Region',
			'registrado' => 'Registrado',
			'fechaRegistro' => 'Fecha Registro',
			'ipRegistro' => 'Ip Registro',
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

		$criteria->compare('idEmpleado',$this->idEmpleado,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('sucursal',$this->sucursal,true);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('registrado',$this->registrado);
		$criteria->compare('fechaRegistro',$this->fechaRegistro,true);
		$criteria->compare('ipRegistro',$this->ipRegistro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}