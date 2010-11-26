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

class DynamicData extends AbstractObject{
	/**
	 * Set of dynamic properties. This property is optional because only the 
	 * properties of an object that are unknown to a client will be part of 
	 * this set. This property is not readonly just in case we want to send 
	 * such properties from a client in the future. 
	 * 
	 */
	protected $dynamicProperty;
	
	/**
	 * Reserved
	 * @var string
	 */
	protected $dynamicType;
}