<?php

class RespuestasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/interiores';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout='//layouts/adminLayout';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='//layouts/adminLayout';
		$model=new RespuestaActividad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RespuestaActividad']))
		{
			$model->attributes=$_POST['RespuestaActividad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idRespuesta));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionRespuesta()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$action="";
/*		if (isset($_GET["m"]))
		{
			$action="update";
			$now=date("Y-m-d",strtotime($_GET['m']));
		}
		else if (isset($_GET["a"]))
		{
			$action="insert";
			$now=date("Y-m-d",strtotime($_GET['a']));
		}
		else*/
			$now=date("Y-m-d");
		$row=Actividad::model()->find("DATE(fechaActivacion)='".$now."'");
		if ($row==null)
			return;
		$respuesta=RespuestaActividad::model()->find('idActividad='.$row->idActividad." AND idUsuario=".Yii::app()->user->idEmpleado);
		if ($respuesta==null)
		{
			$respuesta=new RespuestaActividad;
			$respuesta->idActividad=$row['idActividad'];
			$respuesta->idUsuario=Yii::app()->user->idEmpleado;
			$respuesta->fechaIngreso=date('Y-m-d H:i:s');
			$respuesta->save(false);
		}
		if(isset($_POST['RespuestaActividad']))
		{
			$id=(int)$_POST['RespuestaActividad']['idRespuesta'];
			$resp1=strip_tags(addslashes(trim($_POST['RespuestaActividad']['respuesta1'])));
			$resp2=strip_tags(addslashes(trim($_POST['RespuestaActividad']['respuesta2'])));
			$resp3=strip_tags(addslashes(trim($_POST['RespuestaActividad']['respuesta3'])));
			$respuesta=$this->loadModel($id);
			$respuesta->attributes=$_POST['RespuestaActividad'];
			$respuesta->respuesta=$resp1."<hr />".$resp2."<hr />".$resp3;
			$respuesta->fechaRespuesta=date('Y-m-d H:i:s');
			$respuesta->idUsuario=Yii::app()->user->name;
			//$respuesta->saveNewImages();
			if($respuesta->save())
			{
/*				if ($now=="2012-06-26")
					$this->redirect($this->createUrl('/respuestas/telon/'.$respuesta->idRespuesta));
				else*/
					$this->redirect('/respuestas/gracias');
			}
		}
		$sql="UPDATE empleado SET registrado=1 WHERE idEmpleado=:id";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam('id',Yii::app()->user->idEmpleado);
		$command->prepare();
		$command->execute();
/*		if ($now=='2012-06-26' && $action!="telon")
		{
			$respuesta->media="";
			$respuesta->telon=0;
			$respuesta->telonX=0;
			$respuesta->telonY=0;
			$respuesta->save(false);
		}*/
		if ($respuesta->media!="")
		{
			if ($now=='2012-06-26' && $respuesta->telon==0)
				$this->redirect($this->createUrl('/respuestas/telon/'.$respuesta->idRespuesta));
			else if ($action=="")
				$this->redirect('/respuestas/gracias');
			else if ($action=="update" || $action=="insert")
				$this->render('actividad',array('model'=>$respuesta->actividad,'respuesta'=>$respuesta,'action'=>$action,'now'=>$now));
		}
		else if (($respuesta->media=="" && $respuesta->respuesta=="") || $action=="insert")
			$this->render('actividad',array('model'=>$respuesta->actividad,'respuesta'=>$respuesta,'action'=>$action,'now'=>$now));
		else
			$this->redirect('/respuestas/gracias');
	}

	public function actionGetRandomPhoto()
	{
		$sql="SELECT idRespuesta FROM respuestaActividad ORDER BY RAND()  LIMIT 1 ";
		$photo=$this->queryScalar($sql);
		echo "&urlFoto=".$this->createUrl('/respuesta/viewImage/',array('id'=>$photo));
		exit;
	}

	public function actionTelon($id)
	{
		$this->layout='//layouts/telon';
		$model=$this->loadModel($id);
		if ($model->telon==0)
			$this->render('_telon',array('model'=>$model));
		else
			$this->redirect("/respuestas/galeria/");
	}

	public function actionGaleria()
	{
		$this->layout='//layouts/galeria';
/*		$fotosDataProvider=new CActiveDataProvider('RespuestaActividad', array(
				'criteria'=>array(
				'condition'=>"idUsuario=".Yii::app()->user->idEmpleado." AND media<>''",
				'order'=>'idRespuesta',
				'with'=>array('empleado'),
			),
				'pagination'=>array(
				'pageSize'=>9,
			),
		));*/
		$sql="SELECT idRespuesta,media,nombre,votos,fechaActivacion,fechaRespuesta,region FROM respuestaActividad r,
			empleado e, actividad a
			WHERE e.idEmpleado=r.idUsuario AND a.idActividad=r.idActividad AND r.idUsuario=:id AND media<>''";
		$id=Yii::app()->user->idEmpleado;
		$fotos=$this->queryAll($sql,array(':id'=>$id));
		$this->render('galeria',array(
			'fotos'=>$fotos,
		));
	}

	public function actionVotar()
	{
		if (!isset($_GET["d"]))
			Yii::app()->user->setState('fecha',date("Y-m-d"));
		else
			Yii::app()->user->setState('fecha',date("Y-m-d",strtotime($_GET["d"])));
		$this->layout='//layouts/galeria';
		$fotosDataProvider=new CActiveDataProvider('RespuestaActividad', array(
				'criteria'=>array(
				'condition'=>"media<>'' AND DATE(actividad.fechaActivacion)='".Yii::app()->user->fecha."'",
				'order'=>'idRespuesta',
				'with'=>array('empleado','actividad'),
			),
				'pagination'=>array(
				'pageSize'=>9,
			),
		));
		$this->render('votar',array(
			'fotosDataProvider'=>$fotosDataProvider,
		));
	}

	public function actionVotaFoto()
	{
		$id=(int)$_POST['id'];
		$this->layout='//layouts/galeria';
		$sql="SELECT COUNT(idRespuesta) FROM respuestaActividad r
			WHERE r.idRespuesta=:id AND r.media<>''";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':id',$id);
		$command->prepare();
		$total=(int)$command->queryScalar();
		if ($total==0)
		{
			echo CJSON::encode(array('errors'=>'La foto no existe'));
			exit;
		}
		$sql="SELECT COUNT(idVoto) FROM votoMediaUsuario v,respuestaActividad r
			WHERE v.idRespuesta=:id AND v.idVotante=:me AND r.idRespuesta=v.idRespuesta AND
			r.media<>''";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':id',$id);
		$command->bindParam(':me',Yii::app()->user->idEmpleado);
		$command->prepare();
		$total=(int)$command->queryScalar();
		if ($total>0)
		{
			echo CJSON::encode(array('errors'=>'Ya has votado por esta foto'));
			exit;
		}
		$model=$this->loadModel($id);
		$model->votos+=1;
		$model->save(false);
		$sql="INSERT INTO votoMediaUsuario (idRespuesta,idVotante,fechaVoto,ipVoto) VALUES (:id,:me,:now,:ip)";
		$now=date("Y-m-d H:i:s");
		$command=Yii::app()->db->createCommand($sql);
		$command->bindParam(':id',$id);
		$command->bindParam(':me',Yii::app()->user->idEmpleado);
		$command->bindParam(':now',$now);
		$command->bindParam(':ip',$_SERVER['REMOTE_ADDR']);
		$command->prepare();
		$command->execute();
		echo CJSON::encode(array('success'=>'1'));
		return;
	}

	public function actionViewImage($id)
	{
		$imagen=$this->loadModel($id);
		$realPath=$_SERVER["DOCUMENT_ROOT"]."/../media/".$imagen->media;
		if (file_exists($realPath))
		{
			echo header("Content-type:image/jpeg");
			echo file_get_contents($realPath);
		}
	}

	public function actionViewFullImage($id)
	{
		$this->layout='//layouts/telon';
		$model=$this->loadModel($id);
		if ($model->telon==1)
			$this->render("viewFullImage",array('model'=>$model));
		else
			$this->render("viewNormalImage",array('model'=>$model));
	}

	public function actionSaveTelon($id)
	{
		$model=$this->loadModel($id);
		$model->telon=1;
		$model->telonX=(int)$_POST["x"];
		$model->telonY=(int)$_POST["y"];
		$model->save();
		echo CJSON::encode(array('success'=>'1'));
	}


	public function actionGracias()
	{
		$this->render("gracias");
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout='//layouts/adminLayout';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RespuestaActividad']))
		{
			$model->attributes=$_POST['RespuestaActividad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idRespuesta));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Petición no válida. No lo realice de nuevo por favor.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/adminLayout';
		$dataProvider=new CActiveDataProvider('RespuestaActividad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/adminLayout';
		$model=new RespuestaActividad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RespuestaActividad']))
			$model->attributes=$_GET['RespuestaActividad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=RespuestaActividad::model()->with('actividad')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='respuesta-actividad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function beforeAction($action)
	{
		if (in_array($action->id,array("getRandomPhoto")))
			return true;
		else
			return parent::beforeAction($action);
	}

	public function onUnauthorizedAccess()
	{
		$this->redirect($this->createUrl('/site/login'));
	}
}