<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject;

use \Vmware\DataObject\DynamicData;

/**
 * An ArrayUpdateSpec data object type is a common superclass for supporting incremental updates to arrays.  
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.option.ArrayUpdateSpec.html
 */
abstract class ArrayUpdateSpec extends DynamicData {
	
	
}