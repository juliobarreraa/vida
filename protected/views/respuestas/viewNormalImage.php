<?php
		$realPath=$_SERVER["DOCUMENT_ROOT"]."/../media/".$model->media;
		$tipo="land";
		if (file_exists($realPath))
		{
			$size=getimagesize($realPath);
			$w=$size[0];
			$h=$size[1];
			if ($w<$h)
				$tipo="port";
		}
		if ($tipo=="land")
		{
?>
<table width="647" height="603" cellspacing="0" cellpadding="0" border="0" align="center" id="Table_01">
            <tbody><tr>
              <td valign="top" height="460" align="left" colspan="4"><div id="Contenedor_detalle" class="precios"><img width="547" height="410" class="images" alt="" src="<?php echo $this->createUrl('/respuestas/viewImage',array('id'=>$model->idRespuesta));?>">
              </div></td>
            </tr>
            <tr>
              <td valign="middle" align="center" colspan="4"><div id="vota_foto">
                <table width="100%" cellpadding="0" border="0">
                  <tbody><tr>
                    <td width="54%"><span class="titulofichabig"><?php echo $model->votos;?> votos registrados</span></td>
                    <td width="46%"><img width="58" height="30" alt="" src="images/votar_small.png"> <span class="tituloficha"><a href="javascript:;" onclick="vota(<?php echo $model->idRespuesta?>);">vota por esta foto</a></span></td>
                  </tr>
                </tbody></table>
              </div></td>
            </tr>
            <!--tr>
              <td width="159" valign="middle" align="center">&nbsp;</td>
              <td width="160" valign="middle" align="center" class="precios"><span class="parrafo_bold">&lt;&lt;</span> ANTERIOR</td>
              <td width="143" valign="middle" align="center" class="precios">SIGUIENTE <span class="parrafo_bold">&gt;&gt;</span></td>
              <td width="185" valign="middle" align="center">&nbsp;</td>
            </tr-->
          </tbody></table>
<?php
		}
		else
		{
?>
<table width="647" height="603" cellspacing="0" cellpadding="0" border="0" align="center" id="Table_01">
            <tbody><tr>
              <td valign="top" height="460" align="left" colspan="4"><div id="Contenedor_detalle" class="precios"><img width="410" height="547" class="images" alt="" src="<?php echo $this->createUrl('/respuestas/viewImage',array('id'=>$model->idRespuesta));?>">

              </div></td>
            </tr>
            <tr>
              <td valign="middle" align="center" colspan="4"><div id="vota_foto">
                <table width="100%" cellpadding="0" border="0">
                  <tbody><tr>
                    <td width="54%"><span class="titulofichabig"><?php echo $model->votos;?> votos registrados</span></td>
                    <td width="46%"><img width="58" height="30" alt="" src="images/votar_small.png"> <a href="javascript:;" onclick="vota(<?php echo $model->idRespuesta?>);"><span class="tituloficha">vota por esta foto</span></a></td>
                  </tr>
                </tbody></table>
              </div></td>
            </tr>
            <!--tr>
              <td width="159" valign="middle" align="center">&nbsp;</td>
              <td width="160" valign="middle" align="center" class="precios"><span class="parrafo_bold">&lt;&lt;</span> ANTERIOR</td>
              <td width="143" valign="middle" align="center" class="precios">SIGUIENTE <span class="parrafo_bold">&gt;&gt;</span></td>
              <td width="185" valign="middle" align="center">&nbsp;</td>
            </tr-->
          </tbody></table>
<?php
		}
?>