<table width="770" cellspacing="0" cellpadding="8" border="0" align="center">
    <tbody>
	<tr>
		<td width="474" valign="middle" align="left" class="titulofichabig">
			<p class="titulofichabig">
			  <img width="11" height="9" alt="" src="<?php echo Yii::app()->homeUrl;?>images/bullet_1.png"> Mi galería
			</p>
		</td>
		<td width="264" align="left" class="precios">
			<span class="titulofichabig">
				<img width="11" height="9" alt="" src="<?php echo Yii::app()->homeUrl;?>images/bullet_1.png"> editar mis fotos</span>
		</td>
    </tr>
  </tbody>
</table>
<div id="votarContainer" class="precios" style="width:730px;margin:0 auto;float:left;">
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$fotosDataProvider,
'itemView'=>'_viewPhoto',
'htmlOptions'=>array('width'=>'730px;'),
'summaryText'=>'',
'template'=>'{items}<div style="clear:both;"><br /></div>{pager}',
'pager'=>array('class'=>'CLinkPager','header'=>'','nextPageLabel'=>'&gt;','prevPageLabel'=>'&lt;','firstPageLabel'=>'&lt;&lt;',
			   'lastPageLabel'=>'&gt;&gt;')
)); ?>
</div>
<div id="fechasHolder" style="width:240px;margin:0 auto;">
		<table width="100%" border="0" align="center" style="background: transparent url(<?php echo Yii::app()->homeUrl;?>images/fondofotos.png) repeat;  width:232px;">
        <tbody>
			<tr>
          <th colspan="3">
			  <table width="100%" border="0" align="center" style="background: transparent url(<?php echo Yii::app()->homeUrl;?>images/fondofotos.png) repeat;  width:232px;">
            <tbody>
<?php
	$days=(strtotime(date("Y-m-d"))-strtotime("2012-06-25"))/(3600*24);
	if ($days>8)
		$days=8;
	$time=strtotime("2012-06-25");
	for ($i=0;$i<$days;++$i)
	{
		$date=date("Y-m-d",$time+($i*24*3600));
?>
		<tr>
			<th colspan="3"><p><span class="precios">
		<a href="/respuestas/votar/?d=<?php echo $date;?>"><?php echo Yii::app()->dateFormatter->formatDateTime($date,"long",null);?></a></span></p>
                <p>&nbsp;</p></th>
        </tr>
<?php
	}
?>
			
          </tbody></table></th>
        </tr>
        </tbody></table>
</div>