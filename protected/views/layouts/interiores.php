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
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo Yii::app()->homeUrl;?>js/devlynEspectaculo.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="<?php echo Yii::app()->homeUrl;?>style.css" rel="stylesheet" type="text/css" />
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
	<?php $this->widget('TopMenu',array('seccion'=>Yii::app()->user->isGuest?'home':"interior"));?>
	<div id="banner_galeria" class="precios">
    <table width="951" cellspacing="10" cellpadding="0" border="0">
      <tbody><tr>
        <td colspan="5">
          <p>
            <object width="750" height="415" id="myFlashContent" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
              <param value="<?php echo Yii::app()->homeUrl;?>swf/flash_dia1.swf" name="movie" />
              <param value="high" name="quality" />
              <param value="transparent" name="wmode" />
              <!--[if !IE]>-->
              <object width="750" height="415" quality="high" wmode="transparent" data="<?php echo Yii::app()->homeUrl;?>swf/flash_dia1.swf" type="application/x-shockwave-flash">
                <!--<![endif]-->
                <a href="#"><img border="0" alt="descargar flash player" src="<?php echo Yii::app()->homeUrl;?>images/noflash.png" /></a>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
            <br />
          </p></td>
      </tr>
		<tr>
        <td colspan="5">
          <p>
            <object width="750" height="415" id="myFlashContent" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
              <param value="<?php echo Yii::app()->homeUrl;?>swf/flashFINAL_FOTOS.swf" name="movie" />
              <param value="high" name="quality" />
              <param value="transparent" name="wmode" />
              <!--[if !IE]>-->
              <object width="750" height="415" quality="high" wmode="transparent" data="<?php echo Yii::app()->homeUrl;?>swf/flashFINAL_FOTOS.swf" type="application/x-shockwave-flash">
                <!--<![endif]-->
                <a href="#"><img border="0" alt="descargar flash player" src="<?php echo Yii::app()->homeUrl;?>images/noflash.png" /></a>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
            <br />
          </p></td>
      </tr>
      <tr>
        <td colspan="5">
			<?php echo $content; ?>
		</td>
      </tr>
    </tbody></table>
  </div>
	
</div>
<?php //$this->widget('Footer');?>
<script type="text/javascript">
	var logUrl='<?php echo $this->createUrl('/site/loginUser');?>';
</script>
</body>
</html>