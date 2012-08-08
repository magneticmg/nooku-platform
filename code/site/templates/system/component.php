<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	<?php
    $template = JComponentHelper::getParams('com_extensions')->get('template_site');

 if($this->direction == 'rtl' && (!file_exists(JPATH_APPLICATION.'/templates/'.$template.DS.'css/template_rtl.css') || !file_exists(JPATH_APPLICATION.'/templates/'.$template.DS.'css/template.css'))) : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/template_rtl.css" type="text/css" />
<?php elseif($this->direction == 'rtl' ) : ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $template; ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $template; ?>/css/template_rtl.css" type="text/css" />
<?php elseif($this->direction == 'ltr' && !file_exists(JPATH_APPLICATION.'/templates/'.$template.DS.'css/template.css')) : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/template.css" type="text/css" />
<?php elseif($this->direction == 'ltr' ) : ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $template; ?>/css/template.css" type="text/css" />
<?php endif; ?>
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>