<table width="647" height="603" cellspacing="0" cellpadding="0" border="0" align="center" id="Table_01">
	<tbody><tr>
	  <td valign="top" height="460" align="left" colspan="4">
		<div id="Contenedor_detalle" class="precios">
		<div id="retocada_foto"  style="overflow:hidden;position:relative;z-index:2000; background:url(<?php echo Yii::app()->homeUrl;?>images/marco_retoque_detalle.png) no-repeat;">
		</div>
		</div>
	  </td>
	</tr>
  </tbody>
</table>
<div id="FotoEnTelon" class="draggable" style="position:relative;width:547px; height:460px;top:<?php echo $model->telonY;?>px;left:<?php echo $model->telonX;?>px;">
	<img src="<?php echo $this->createUrl('/respuestas/viewImage/',array('id'=>$model->idRespuesta));?>" />	
</div>