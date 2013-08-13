<?php

/**
 * This is the model class for table "votoMediaUsuario".
 *
 * The followings are the available columns in table 'votoMediaUsuario':
 * @property string $idVoto
 * @property string $idRespuesta
 * @property integer $idVotante
 * @property string $fechaVoto
 * @property string $ipVoto
 */
class VotoMediaUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VotoMediaUsuario the static model class
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
		return 'votoMediaUsuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRespuesta, idVotante, fechaVoto, ipVoto', 'required'),
			array('idVotante', 'numerical', 'integerOnly'=>true),
			array('idRespuesta', 'length', 'max'=>20),
			array('ipVoto', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idVoto, idRespuesta, idVotante, fechaVoto, ipVoto', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idVoto' => 'Id Voto',
			'idRespuesta' => 'Id Respuesta',
			'idVotante' => 'Id Votante',
			'fechaVoto' => 'Fecha Voto',
			'ipVoto' => 'Ip Voto',
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

		$criteria->compare('idVoto',$this->idVoto,true);
		$criteria->compare('idRespuesta',$this->idRespuesta,true);
		$criteria->compare('idVotante',$this->idVotante);
		$criteria->compare('fechaVoto',$this->fechaVoto,true);
		$criteria->compare('ipVoto',$this->ipVoto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}