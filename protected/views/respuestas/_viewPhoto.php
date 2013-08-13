<div class="Contenedor_fotos" style="float:left;">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody><tr>
		<td class="respuesta2" colspan="2"><div id="alinearsubtitulo" class="Contenedor_leyenda"><span class="tituloficha"><?php echo $data->empleado->nombre;?></span><br>
		<span class="legalesgris"><?php echo $data->empleado->region; ?></span></div></td>
	  </tr>
	  <tr>
		<td valign="middle" align="center" colspan="2">
			<a href="<?php echo Yii::app()->controller->createUrl('/respuestas/viewFullImage/',array('id'=>$data->idRespuesta));?>">
				<img width="190" height="190" class="images" alt="" src="<?php echo Yii::app()->controller->createUrl('/respuestas/viewImage/',array('id'=>$data->idRespuesta));?>">
			</a>
			<a href="#"></a></td>
	  </tr>
	  <tr>
		<td width="55%" class="precios"><?php echo $data->votos;?> votos</td>
		<?php
		if ($data->idUsuario!=Yii::app()->user->idEmpleado)
		{
		?>
		<td width="45%" valign="middle" align="center">
			<a href="javascript:;" onclick="vota(<?php echo $data->idRespuesta?>);">
			<img width="58" height="30" alt="Vota" src="<?php echo Yii::app()->homeUrl;?>images/votar_small.png">
			</a>
		</td>
		<?php
		}
		?>
	  </tr>
	</tbody></table>
</div>