<?php
/**
 * Copyright (c) 2013-2016
 *
 * @category  Library
 * @package   Dwoo\Plugins\Functions
 * @author    Jordi Boggiano <j.boggiano@seld.be>
 * @author    David Sanchez <david38sanchez@gmail.com>
 * @copyright 2008-2013 Jordi Boggiano
 * @copyright 2013-2016 David Sanchez
 * @license   http://dwoo.org/LICENSE Modified BSD License
 * @version   1.3.0
 * @date      2016-09-19
 * @link      http://dwoo.org/
 */

namespace Dwoo\Plugins\Functions;

use Dwoo\Compiler;

/**
 * Inserts another template into the current one
 * <pre>
 *  * file : the resource name of the template
 *  * cache_time : cache length in seconds
 *  * cache_id : cache identifier for the included template
 *  * compile_id : compilation identifier for the included template
 *  * data : data to feed into the included template, it can be any array and will default to $_root (the current data)
 *  * assign : if set, the output of the included template will be saved in this variable instead of being output
 *  * rest : any additional parameter/value provided will be added to the data array
 * </pre>
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 */
function PluginReturnCompile(Compiler $compiler, array $rest = array())
{
    $out = array();
    foreach ($rest as $var => $val) {
        $out[] = '$this->setReturnValue(' . var_export($var, true) . ', ' . $val . ')';
    }

    return '(' . implode('.', $out) . ')';
}
