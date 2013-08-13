
<table width="647" height="603" cellspacing="0" cellpadding="0" border="0" align="center" id="Table_01">
	<tbody><tr>
	  <td valign="top" height="460" align="left" colspan="4">
		<div id="Contenedor_detalle" class="precios">
		<div id="retocada_foto" class="droppable" style="position:relative;z-index:2000; background:url(<?php echo Yii::app()->homeUrl;?>images/marco_retoque_detalle.png) no-repeat;">
		</div>
		</div>
	  </td>
	</tr>
  </tbody>
</table>
<div id="FotoEnTelon" class="draggable" style="position:relative;width:547px; height:460px;/*top:-587px;*/top:-107px;left:201px;">
	<img src="<?php echo $this->createUrl('/respuestas/viewImage/',array('id'=>$model->idRespuesta));?>" />
	<div style="clear:both;color:#000;opacity:.8;background-color: #fafafa;height:30px;">
		Arrastra la foto para enmarcarla y presiona "Guardar"
	</div>
	<br />
	<input type="button" value="Guardar" onclick="saveTelonPosition(<?php echo $model->idRespuesta;?>);" />
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		$("#FotoEnTelon").draggable({cursor: "move"});
		$(".droppable" ).droppable({
					accept: ".draggable",
					greedy: true,
					drop: function( event, ui ) {
						posx=ui.offset.left;
						posy=ui.offset.top+$(this).height();
						mx=ui.offset.left - parseInt(($(document).width()-$("#wrapper").width())/2)-($("#growthContainer").width()/2);
						my = ui.position.top+$(this).height()-20;
						prevx=mx;
						prevy=my;
						//updatePosition();
						return false;
					}
				});
	});
</script>