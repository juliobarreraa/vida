<?php

Yii::import('zii.widgets.CPortlet');

class Footer extends CWidget
{

    public function run()
    {
        $this->render('footer');
    }
}