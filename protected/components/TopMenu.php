<?php

Yii::import('zii.widgets.CPortlet');

class TopMenu extends CWidget
{
	protected $canLogin=false;
	public $seccion='';

	public function  init() {
		parent::init();
		if (Yii::app()->user->isGuest)
		{
			if ($this->seccion=='home')
			{
				$sql='SELECT preventiva,teaser FROM actividad WHERE DATE(fechaActivacion)=:now LIMIT 1';
				$command=Yii::app()->db->createCommand($sql);
				$now=date("Y-m-d");
				$command->bindParam(':now',$now);
				$command->prepare();
				$row=$command->queryRow();
				$this->canLogin=($row['preventiva']!=null && ((int)$row['preventiva']==0) && (int)$row['teaser']==0);
			}
		}
	}
	
    public function run()
    {
        $this->render('topMenu');
    }
}