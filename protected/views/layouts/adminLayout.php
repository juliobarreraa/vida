<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pro_dropdown_2.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/stuHover.js" type="text/javascript"></script>
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo Yii::app()->homeUrl;?>js/devlynEspectaculo.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cms.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    	<script type="text/javascript" src="<?php echo Yii::app()->homeUrl;?>js/swfobject.js"></script><!-- menu jQuery Library -->
		<script type="text/javascript" src="<?php echo Yii::app()->homeUrl;?>js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			/*$(function() {
				$('#tj_container').gridnav({
					rows	: 3,
					type	: {
						mode		: 'seqfade', 		// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
						speed		: 500,				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
						easing		: '',				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
						factor		: 50,				// for seqfade, sequpdown, rows
						reverse		: false				// for sequpdown
					}
				});
			});*/
		</script>

		<!-- Let's do the animation -->
		<script type="text/javascript">
            $(function() {
                // set opacity to nill on page load
                $("ul#menu span").css("opacity","0");
                // on mouse over
                $("ul#menu span").hover(function () {
                    // animate opacity to full
                    $(this).stop().animate({
                        opacity: 1
                    }, 'slow');
                },
                // on mouse out
                function () {
                    // animate opacity to nill
                    $(this).stop().animate({
                        opacity: 0
                    }, 'slow');
                });
            });
        </script>
            <!-- fin menu jQuery Library -->


</head>

<body>

<div id="wrapper">      
	<?php $this->widget('Header');?>
	<?php $this->widget('AdminTopMenu');?>
	<div id="banner_galeria" class="precios">
	<?php
                    if (!Yii::app()->user->isGuest)
                    {
?>
                        <?php
                        $this->beginWidget('zii.widgets.CPortlet', array(
                            'title'=>'',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>$this->menu,
                            'htmlOptions'=>array('class'=>'submenu'),
                        ));
                        $this->endWidget();
?>
<?php
                    }
?>

    <table width="951" height="200" cellspacing="10" cellpadding="0" border="0">
      <tr>
        <td colspan="5">
			<?php echo $content; ?>
		</td>
      </tr>
    </table>
  </div>
	
</div>
<?php $this->widget('Footer');?>
<script type="text/javascript">
	var logUrl='<?php echo $this->createUrl('/site/loginUser');?>';
</script>
</body>
</html>