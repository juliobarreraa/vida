<?php

Yii::import('zii.widgets.CPortlet');

class Header extends CWidget
{
	

	public function init()
	{
		parent::init();
	}

    public function run()
    {
        $this->render('header');
    }
}