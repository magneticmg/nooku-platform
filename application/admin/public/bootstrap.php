<?php
/**
 * @category    Nooku
 * @package     Nooku_Server
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Framework loader
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 */

use Nooku\Library;

//Installation check
if (!file_exists(JPATH_ROOT . '/config/config.php') || (filesize(JPATH_ROOT . '/config/config.php') < 10)) {
    echo 'No configuration file found. Exciting...';
    exit();
}

// Joomla : setup
require_once(JPATH_VENDOR . '/joomla/import.php');
jimport('joomla.environment.uri');
jimport('joomla.html.html');
jimport('joomla.html.parameter');
jimport('joomla.utilities.utility');
jimport('joomla.language.language');

// Koowa : setup
require_once JPATH_ROOT . '/config/config.php';
$config = new JConfig();

require_once(JPATH_ROOT . '/library/nooku.php');
\Nooku::getInstance(array(
    'cache_prefix' => md5($config->secret) . '-cache-koowa',
    'cache_enabled' => $config->caching
));

unset($config);

//Setup the component loader
$adapter = new Library\LoaderAdapterComponent();
$adapter->registerNamespace('\\', JPATH_APPLICATION.'/component');
$adapter->registerNamespace('Nooku\Component', JPATH_ROOT.'/component');
Library\ServiceManager::get('loader')->addAdapter($adapter);

//Setup the vendor loader
$adapter = new Library\LoaderAdapterStandard();
$adapter->registerNamespace('Imagine', JPATH_VENDOR.'/imagine/lib');
Library\ServiceManager::get('loader')->addAdapter($adapter);

//Add the different applications
Library\ServiceManager::get('loader')->addApplication('site' , JPATH_ROOT.'/application/site');
Library\ServiceManager::get('loader')->addApplication('admin', JPATH_ROOT.'/application/admin');

//Set the service
Library\ServiceIdentifier::addLocator(Library\ServiceManager::get('lib:service.locator.component'));