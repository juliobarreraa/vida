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
<div id="banner_galeria" class="precios" style="width:730px;margin:0 auto;">
<?php
	$time=strtotime("2012-06-24 00:00:00");
	for ($i=1;$i<=5;++$i)
	{
		$time=$time+(24*60*60);
		$this->renderPartial("_viewMyPhoto",array("fecha"=>date("Y-m-d",$time),'fotos'=>$fotos));
	}
?>
<?php /*$this->widget('zii.widgets.CListView', array(
'dataProvider'=>$fotosDataProvider,
'itemView'=>'_viewMyPhoto',
'summaryText'=>'',
'template'=>'{items}<div style="clear:both;"><br /></div>{pager}',
'pager'=>array('class'=>'CLinkPager','header'=>'','nextPageLabel'=>'&gt;','prevPageLabel'=>'&lt;','firstPageLabel'=>'&lt;&lt;',
			   'lastPageLabel'=>'&gt;&gt;')
)); */?>
</div>