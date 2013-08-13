<?php

/**
 * This is the model class for table "respuestaActividad".
 *
 * The followings are the available columns in table 'respuestaActividad':
 * @property string $idRespuesta
 * @property string $idActividad
 * @property string $idUsuario
 * @property string $fechaIngreso
 * @property string $fechaRespuesta
 * @property string $respuesta
 * @property string $media
 * @property integer $respuestaResaltada
 */
class RespuestaActividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RespuestaActividad the static model class
	 */
	public $idUsuarioRegion;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respuestaActividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idActividad, idUsuario, fechaIngreso, fechaRespuesta, respuesta, respuestaResaltada', 'required','message'=>'Debe llenar {attribute}'),
			array('respuestaResaltada', 'numerical', 'integerOnly'=>true),
			array('idActividad, idUsuario', 'length', 'max'=>10),
			array('votos,telon,telonX,telonY,idUsuarioRegion,media', 'safe'),
			array('media', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRespuesta, idActividad, idUsuario, fechaIngreso, fechaRespuesta, respuesta, media, respuestaResaltada', 'safe', 'on'=>'search'),
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
			'actividad'=>array(self::BELONGS_TO,'Actividad','idActividad','joinType'=>'INNER JOIN'),
			'empleado'=>array(self::BELONGS_TO,'Empleado','idUsuario','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRespuesta' => 'Id Respuesta',
			'idActividad' => 'Actividad',
			'idUsuario' => 'Nombre',
			'idUsuarioRegion' => 'Región',
			'fechaIngreso' => 'Fecha Ingreso',
			'fechaRespuesta' => 'Fecha Respuesta',
			'respuesta' => 'Respuesta',
			'media' => 'Foto',
			'respuestaResaltada' => 'Respuesta Resaltada',
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
		$criteria->addCondition("fechaRespuesta<>'0000-00-00 00:00:00'");
		$criteria->compare('idRespuesta',$this->idRespuesta,true);
		$criteria->compare('empleado.nombre',$this->idUsuario,true);
		$criteria->compare('empleado.region',$this->idUsuarioRegion,true);
		$criteria->compare('actividad.fechaActivacion',$this->idActividad,true);
		$criteria->compare('idUsuarioRegion',$this->empleado->region,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('fechaRespuesta',$this->fechaRespuesta,true);
		$criteria->compare('respuesta',$this->respuesta,true);
		$criteria->compare('media',$this->media,true);
		$criteria->compare('respuestaResaltada',$this->respuestaResaltada);
		$criteria->with=array('actividad','empleado');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'sort'=>array('defaultOrder'=>'idRespuesta DESC')
		));
	}

	public function saveNewImages()
	{
		$retVal=true;
		if (count($_FILES)>0)
		{
			$aImages=array();
			foreach($_FILES as $k=>$file)
			{
				if (trim($file["name"])!="")
					$aImages[$k]=$file;
			}
		}
		$aErrors=array();
		if (count($aImages)>0)
		{
			Yii::import('application.extensions.upload.Upload');
			$destPath=Yii::app()->getBasePath().'/../../media/';
			foreach($aImages as $k=>$file)
			{
				$Upload = new Upload($file);
				if ($Upload->uploaded)
				{
					$portrait=$Upload->image_src_y > $Upload->image_src_x;
					$Upload->jpeg_quality  = 100;
					$Upload->no_script     = false;
					$Upload->image_resize  = true;
					$Upload->image_x       = $portrait==true?410:547;
					$Upload->image_y       = $portrait==true?547:410;
					$Upload->image_ratio   = true;
					$newName=uniqid();
					$Upload->file_new_name_body = $newName;
					$Upload->process($destPath);
					if ($Upload->processed)
					{
						$destName = $Upload->file_dst_name;
						$this->media=$destName;
						unset($Upload);
						$Upload = new Upload($file);
						$Upload->file_new_name_body = "_icon_".$newName;
						$Upload->jpeg_quality  = 100;
						$Upload->no_script     = false;
						$Upload->image_resize  = true;
						$Upload->image_ratio_crop='TBLR';
						$Upload->image_x       = $portrait==true?82:108;
						$Upload->image_y       = $portrait==true?108:82;
						$Upload->process($destPath);						
						unset($Upload);
					}
					else
					{
						$this->addError("foto",$Upload->error);
						unset($Upload);
					}
				}
			}
		}
		return $retVal;
	}

	public function  beforeSave() {
		if ($this->isNewRecord)
			$this->votos=0;
		return parent::beforeSave();
	}
	
}