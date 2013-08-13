<?php
	$id=-1;
	$region="";
	$nombre="";
	$votos=0;

	if (strtotime($fecha)<=strtotime(date("Y-m-d")) && count($fotos)>0)
	{
		foreach ($fotos as $foto)
		{
			if ($fecha==date("Y-m-d",strtotime($foto['fechaActivacion'])))
			{
				$id=$foto['idRespuesta'];
				$region=$foto['region'];
				$nombre=$foto['nombre'];
				$votos=$foto['votos'];
			}
		}
	}
?>
<div class="Contenedor_fotos" style="float:left;">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody><tr>
		<td class="respuesta2" colspan="2">
		<div id="alinearsubtitulo" class="Contenedor_leyenda" style="height:10px;">
			<span class="tituloficha"><?php echo $nombre;?></span>
		</div>
		</td>
	  </tr>
	  <tr>
		<td valign="middle" align="center" colspan="2">
<?php
	if ($id!=-1)
	{
?>
			<a href="<?php echo Yii::app()->controller->createUrl('/respuestas/viewFullImage/',array('id'=>$id));?>">
				<img width="190" height="190" class="images" alt="" src="<?php echo Yii::app()->controller->createUrl('/respuestas/viewImage/',array('id'=>$id));?>">
			</a>
<?php
	}
	else
	{
?>
			<div style="width:190px;height:190px;display:inline-block;">

			</div>
<?php
	}
?>
		</td>
	  </tr>
	  <tr>
		  <td>
			  <span style="font-size:10px;"><?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($fecha),'long',null)?></span>
		  </td>
	  </tr>
	  <tr>
		<td width="55%" class="precios">
<?php
	if ($id!=-1)
	{
?>

			<input type="button" value="Modificar" onclick="document.location.href='/respuestas/respuesta/?m=<?php echo $fecha;?>'">&nbsp;<?php echo $votos;?> votos
<?php
	}
	else if (strtotime($fecha)<=strtotime(date("Y-m-d")))
	{
?>
		<input type="button" value="Agregar" onclick="document.location.href='/respuestas/respuesta/?a=<?php echo $fecha;?>'">&nbsp;<?php echo $votos;?> votos
<?php
	}
?>
		</td>
	  </tr>
	</tbody></table>
</div>