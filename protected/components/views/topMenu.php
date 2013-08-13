<?php
if (Yii::app()->user->isGuest)
{
	if ($this->seccion=='home' && $this->canLogin===true)
	{
?>
<table width="830" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr>
      <td width="169" align="center" valign="middle" class="titulofichabig"><p class="titulofichabig">
			  <img src="<?php echo Yii::app()->homeUrl;?>images/bullet_1.png" alt="" width="11" height="9" /> BIENVENIDO</p>
	  </td>
      <td width="232" align="left" class="precios">
		  <?php echo "NÚMERO DE EMPLEADO ";?>
	  </td>
      <td width="199" align="left" class="precios">
		  <?php echo '<input name="NumeroEmpleado" id="NumeroEmpleado" type="text" class="precios" id="nombre" size="10" maxlength="50" />';?>
	  </td>
      <td width="196" align="left" class="precios">
		<?php echo '<a class="button" href="javascript:;" onclick="doLogin();"><span> + INGRESA A TU CUENTA</span></a>';?>
	  </td>
    </tr>
</table>
<?php
	}
}
else
{
?>
		<div id="menu_div">
			<ul id="menu">
				<li><a class="menu1" href="<?php echo Yii::app()->homeUrl;?>"><span style="opacity: 0;"></span></a></li>
			  <li><a class="menu2" href="<?php echo Yii::app()->controller->createUrl('/respuestas/respuesta/');?>"><span style="opacity: 0;"></span></a></li>
              <li><a class="menu3" href="<?php echo Yii::app()->controller->createUrl('/respuestas/galeria/');?>"><span style="opacity: 0;"></span></a></li>
			  <li><a class="menu4" href="<?php echo Yii::app()->controller->createUrl('/respuestas/votar/');?>"><span style="opacity: 0;"></span></a></li>
              <li><a class="menu5" href="<?php echo Yii::app()->controller->createUrl('/site/logout/');?>"><span style="opacity: 0;"></span></a></li>
			</ul>
          </div>
		<br />
		<table width="830" border="0" align="center" cellpadding="8" cellspacing="0">
			<tr>
			  <td width="305" valign="middle" align="center" class="titulofichabig"><p class="titulofichabig"><img width="11" height="9" alt="" src="<?php echo Yii::app()->homeUrl;?>images/bullet_1.png"> BIENVENIDO</p></td>
			  <td width="493" align="left" class="precios"><?php echo Yii::app()->user->fullName;?></td>
			</tr>
		</table>
<?php
}
?>