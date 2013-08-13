<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property string $idActividad
 * @property string $fechaActivacion
 * @property string $descripcion
 * @property string $mediaHome
 * @property string $mediaTypeHome
 * @property string $mediaInterior
 * @property string $mediaTypeInterior
 * @property integer $preventiva
 * @property integer $teaser
 */
class Actividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Actividad the static model class
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
		return 'actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaActivacion, descripcion, mediaHome, mediaTypeHome, mediaInterior, mediaTypeInterior, preventiva, teaser', 'required'),
			array('preventiva, teaser', 'numerical', 'integerOnly'=>true),
			array('mediaTypeHome, mediaTypeInterior', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idActividad, fechaActivacion, descripcion, mediaHome, mediaTypeHome, mediaInterior, mediaTypeInterior, preventiva, teaser', 'safe', 'on'=>'search'),
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
			'idActividad' => 'Id Actividad',
			'fechaActivacion' => 'Fecha Activacion',
			'descripcion' => 'Descripcion',
			'mediaHome' => 'Media Home',
			'mediaTypeHome' => 'Media Type Home',
			'mediaInterior' => 'Media Interior',
			'mediaTypeInterior' => 'Media Type Interior',
			'preventiva' => 'Preventiva',
			'teaser' => 'Teaser',
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

		$criteria->compare('idActividad',$this->idActividad,true);
		$criteria->compare('fechaActivacion',$this->fechaActivacion,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('mediaHome',$this->mediaHome,true);
		$criteria->compare('mediaTypeHome',$this->mediaTypeHome,true);
		$criteria->compare('mediaInterior',$this->mediaInterior,true);
		$criteria->compare('mediaTypeInterior',$this->mediaTypeInterior,true);
		$criteria->compare('preventiva',$this->preventiva);
		$criteria->compare('teaser',$this->teaser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}