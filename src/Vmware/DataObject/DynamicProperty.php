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

/**
 * The DynamicProperty data object type represents a name-value pair. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.DynamicProperty.html
 */
class DynamicProperty extends AbstractObject{
	/**
	 * Path to the property. 
	 * @var string
	 */
	protected $name;
	
	/**
	 * Value of the property. 
	 * @var mixed
	 */
	protected $val;
	
}