<?php
/**
 * @version     $Id$
 * @package     Nooku_Components
 * @subpackage  Default
 * @copyright   Copyright (C) 2007 - 2012 Johan Janssens. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Default Dispatcher
.*
 * @author      Johan Janssens <johan@nooku.org>
 * @package     Nooku_Components
 * @subpackage  Default
 */
class ComDefaultDispatcher extends KDispatcherDefault implements KServiceInstantiatable
{
    /**
     * Constructor.
     *
     * @param 	object 	An optional KConfig object with configuration options.
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        //Sign GET request with a cookie token
        if(KRequest::method() == 'GET') {
            $this->registerCallback('after.dispatch' , array($this, 'signResponse'));
        }
    }
    
	/**
     * Force creation of a singleton
     *
     * @param 	object 	An optional KConfig object with configuration options
     * @param 	object	A KServiceInterface object
     * @return KDispatcherDefault
     */
    public static function getInstance(KConfigInterface $config, KServiceInterface $container)
    { 
       // Check if an instance with this identifier already exists or not
        if (!$container->has($config->service_identifier))
        {
            //Create the singleton
            $classname = $config->service_identifier->classname;
            $instance  = new $classname($config);
            $container->set($config->service_identifier, $instance);
            
            //Add the factory map to allow easy access to the singleton
            $container->setAlias('component', $config->service_identifier);
        }
        
        return $container->get($config->service_identifier);
    }

    /**
     * Sign the response with a token
     *
     * @param	KCommandContext	A command context object
     */
    public function signResponse(KCommandContext $context)
    {
        if(!$context->response->isError())
        {
            $token = $this->getService('application.session')->getToken();

            $context->response->headers->addCookie($this->getService('koowa:http.cookie', array(
                'name'   => '_token',
                'value'  => $token,
                'path'   => JURI::base(true)
            )));

            $context->response->headers->set('X-Token', $token);
        }
    }
      
    /**
     * Dispatch the controller and redirect
     * 
     * This function divert the standard behavior and will redirect if no view
     * information can be found in the request.
     * 
     * @param   string      The view to dispatch. If null, it will default to
     *                      retrieve the controller information from the request or
     *                      default to the component name if no controller info can
     *                      be found.
     *
     * @return  KDispatcherDefault
     */
    protected function _actionDispatch(KCommandContext $context)
    {
        //Redirect if no view information can be found in the request
        if(!$this->getRequest()->view) 
        {
            $url = clone(KRequest::url());
            $url->query['view'] = $this->getController()->getView()->getName();

            $context->response->setRedirect($url);
            return false;
        }
       
        return parent::_actionDispatch($context);
    }
}