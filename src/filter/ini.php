<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright	Copyright (C) 2007 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/nooku/nooku-platform for the canonical source repository
 */

namespace Nooku\Library;

/**
 * Ini Filter
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package Nooku\Library\Filter
 */
class FilterIni extends FilterAbstract
{
    /**
     * Validate a value
     *
     * @param   scalar  $value Value to be validated
     * @return   bool   True when the variable is valid
     */
    public function validate($value)
    {
        try {
            $config = $this->getObject('object.config.factory')->fromString('ini', $value);
        } catch(\RuntimeException $e) {
            $config = null;
        }

        return is_string($value) && !is_null($config);
    }

    /**
     * Sanitize a value
     *
     * @param   scalar  $value Value to be sanitized
     * @return  ObjectConfig
     */
    public function sanitize($value)
    {
        if(!$value instanceof ObjectConfig)
        {
            if(is_string($value)) {
                $value = $this->getObject('object.config.factory')->fromString('ini', $value);
            } else {
                $value = $this->getObject('object.config.factory')->createFormat('ini', $value);
            }
        }

        return $value;
    }
}