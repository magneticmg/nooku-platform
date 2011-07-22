<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>
<!DOCTYPE HTML>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" id="minwidth">
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
<link href="templates/<?php echo  $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<link href="templates/<?php echo  $this->template ?>/css/960_fluid.css" rel="stylesheet" type="text/css" media="screen and (min-width:1025px)" />
<link href="templates/tablet/css/960_fluid.css" rel="stylesheet" type="text/css" media="screen and (max-width: 1024px)" />
<?php if($this->direction == 'rtl') : ?>
	<link href="templates/<?php echo  $this->template ?>/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>

<?php if(JModuleHelper::isEnabled('menu')) : ?>
	<script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/index.js"></script>
<?php endif; ?>

<?php if(strpos(KRequest::get('server.HTTP_USER_AGENT', 'word'), 'Titanium')) : ?>
     <link href="templates/desktop/css/template.css" rel="stylesheet" type="text/css" />
 <?php endif ?>

</head>
<body id="minwidth-body" class="<?php echo JRequest::getVar('option', 'cmd'); ?>">
	<div id="header-box">
		<jdoc:include type="modules" name="menu" />
		<jdoc:include type="modules" name="status"  />
	</div>
	<div id="content-box">
		<div id="element-box" class="container_16 clearfix">
			<div class="grid_16 frame cpanel clearfix">
				<div class="grid_8">
					<jdoc:include type="modules" name="icon" />
				</div>
				<div class="grid_8">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</div>
		</div>
	</div>
</body>
</html>
