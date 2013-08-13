<?php

Yii::import('zii.widgets.CPortlet');

class AdminTopMenu extends CWidget
{
	public function  init() {
		parent::init();
	}
	
    public function run()
    {
		if (!Yii::app()->user->isGuest && Yii::app()->user->isAdmin())
			$this->render('adminTopMenu');
    }
}