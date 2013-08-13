<span class="preload1"></span>
<span class="preload2"></span>
<ul id="nav">
<?php
	if (!Yii::app()->user->isGuest && Yii::app()->user->isAdmin())
	{
?>
    <li class="top"><a href="<?php echo Yii::app()->controller->createUrl('/participantes/admin');?>" id="homeMenu" class="top_link"><span>Participantes</span></a></li>
	<li class="top"><a href="<?php echo Yii::app()->controller->createUrl('/respuestas/admin');?>" id="homeMenu" class="top_link"><span>Respuestas</span></a></li>
	<li class="top"><a href="<?php echo Yii::app()->controller->createUrl('/actividades/admin');?>" id="homeMenu" class="top_link"><span>Actividades</span></a></li>
<?php
	}
?>
    <li class="top"><a href="<?php echo Yii::app()->controller->createUrl('/site/logout');?>" id="Logout" class="top_link"><span>Salir</span></a></li>
    </ul>