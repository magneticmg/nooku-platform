<?php
/**
* @copyright    Copyright (C) 2007 - 2012 Johan Janssens. All rights reserved.
* @license      GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
* @link         http://www.nooku.org
*/

/**
 * Nooku constant, if true nooku is loaded
 */
define('NOOKU', 1);

/**
 * Nooku class
 *
 * Loads classes and files, and provides metadata for Koowa such as version info
 *
 * @author  Johan Janssens <johan@nooku.org>
 */
class Nooku
{
    /**
     * Koowa version
     *
     * @var string
     */
    const VERSION = '12.3';

    /**
     * Path to Koowa libraries
     *
     * @var string
     */
    protected $_path;

 	/**
     * Constructor
     *
     * Prevent creating instances of this class by making the contructor private
     *
     * @param  array  An optional array with configuration options.
     */
    final private function __construct($config = array())
    {
        //Initialize the path
        $this->_path = dirname(__FILE__);

        //Load the legacy functions
        require_once $this->_path.'/legacy.php';

        //Create the loader
        require_once $this->_path.'/loader/loader.php';
        $loader = new KLoader($config);

        //Create the service manager
        $service = KServiceManager::getInstance($config);

        //Add a 'loader' alias to the service manager
        $service->set('lib://nooku/loader', $loader);
        $service->setAlias('loader', 'lib://nooku/loader');
    }

	/**
     * Clone
     *
     * Prevent creating clones of this class
     */
    final private function __clone() { }

	/**
     * Singleton instance
     *
     * @param  array  An optional array with configuration options.
     * @return Koowa
     */
    final public static function getInstance($config = array())
    {
        static $instance;

        if ($instance === NULL) {
            $instance = new self($config);
        }

        return $instance;
    }

    /**
     * Get the version of the Koowa library
     *
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Get path to Koowa libraries
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }
}