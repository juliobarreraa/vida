
<?php
	if (count($respuesta->errors)>0)
	{
?>
	<ul style="font-size: 10px; color: #ff0000;">
<?php
		foreach ($respuesta->errors as $err)
			echo "<li>".$err[0]."</li>";
?>
	</ul>
<?php
	}
?>
<form action="<?php echo $this->createUrl("/respuestas/respuesta/").($action=="insert"?("/?a=".$now):($action=="update"?("/?m=".$now):""));?>" method="post" enctype="multipart/form-data" id="frmRespuesta">
<table width="600" cellspacing="9" cellpadding="0" border="0" align="center" style="width:600px;margin:0 auto;">
	<tr>
		<td class="precios" colspan="5" align="center" width="600" style="width:600px;">
			<table width="600" cellspacing="19" cellpadding="0" border="0" align="center">
				<tr>
					<td class="respuesta" align="center">
						<p class="tituloficha1" style="width:600px;">
						<?php echo $model['descripcion'];?>
						<br />
						<!--No participan en este concurso : Gerentes Regionales, Distritales , Jefes  de Promoción Comercial, integrantes del área de Publicidad ni Merchandising.--></p>
						<p class="parrafo">&nbsp;</p>
					</td>
				</tr>
			</table>
		</td>
    </tr>
	  <tr>
		<td align="left" colspan="5"><span class="titulofichabig" style="text-align: justify;">
				DINOS QUE SIGNIFICA PARA TI NUESTRO SLOGAN &quot;LA VIDA ES UN ESPECTACULO, NO DEJES DE VERLA&quot;
				</span>
		</td>
	  </tr>
	  <tr>
		<th scope="col" colspan="5" style="padding-left:50px;"><textarea id="RespuestaActividad_respuesta" class="el02" rows="10" cols="49" name="RespuestaActividad[respuesta1]"><?php echo $respuesta->respuesta;?></textarea></th>
	  </tr>
	  <tr>
		<td align="left" colspan="5"><span class="titulofichabig">
				¿Por qué  CREES QUE EL LOGO DE DEVLYN EN ESTE SLOGAN  QUE ACABAS DE VER ES UN BOLETO?
				</span>
		</td>
	  </tr>
	  <tr>
		<th scope="col" colspan="5" style="padding-left: 50px;"><textarea id="RespuestaActividad_respuesta" class="el02" rows="10" cols="49" name="RespuestaActividad[respuesta2]"><?php echo $respuesta->respuesta;?></textarea></th>
	  </tr>
		<tr>
		<td align="left" colspan="5">
			<span class="titulofichabig" style="text-align: justify;">
				¿DE QUE FORMA DESDE TU AREA DE TRABAJO PUEDES HACER QUE LOS CLIENTES DEVLYN DISFRUTEN EL ESPECTACULO DE LA VIDA?
			</span>
		</td>
	  </tr>
	  <tr>
		<th scope="col" colspan="5" style="padding-left: 50px;"><textarea id="RespuestaActividad_respuesta" class="el02" rows="10" cols="49" name="RespuestaActividad[respuesta3]"><?php echo $respuesta->respuesta;?></textarea></th>
	  </tr>
	  <tr>
		  <td width="212" class="titulofichabig" colspan="5">SUBE TUS RESPUESTAS, LAS MAS ACERTADAS Y EN EL TIEMPO MAS RAPIDO SERAN LAS QUE GANEN ESTE ULTIMO RETO. ¡ MUCHA SUERTE!!!!</td>
	  </tr>

<?php
	if ($action!="")
	{
?>
	  <tr>
		<td class="titulofichabig">SUBE TU FOTOGRAFÍA
			<br />
			<?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($now),'long',null)?>
		</td>
		<th valign="middle" align="center" scope="col" colspan="4"><img width="48" height="48" alt="" src="<?php echo Yii::app()->homeUrl?>images/Camera.png">
			<input type="file" size="38" value="" id="foto" class="respuesta2" name="foto">
		</th>
	  </tr>
<?php
	}
?>
	  <tr>
		<td class="precios" colspan="3">&nbsp;</td>
		<td width="97" class="precios">&nbsp;</td>
		<td width="189" class="precios">
			<a onclick="submitResponse();" href="javascript:;" class="button2"><span> SUBE TU RESPUESTA</span></a></td>
	  </tr>
</table>
	<input type="hidden" name="RespuestaActividad[idRespuesta]" id="RespuestaActividad_idRespuesta" value="<?php echo $respuesta->idRespuesta;?>" />

</form>