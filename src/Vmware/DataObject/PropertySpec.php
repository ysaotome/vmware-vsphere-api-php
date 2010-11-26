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

use Vmware\DataObject\SelectionSpec;
/**
 * Within a PropertyFilterSpec, the PropertySpec data object type specifies a 
 * managed object from which to collect information. The PropertySpec also 
 * specifies whether to collect properties or references to the selected managed objects. 
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.PropertySpec.html
 *
 */
class PropertySpec extends SelectionSpec {
	/**
	 * Name of the managed object type being collected.
	 * @var string
	 */
	protected $type;
		
	/**
	 * Specifies whether or not all properties of the object are read. 
	 * If this property is set to true, the pathSet property is ignored. 
	 * @var bool
	 */
	protected $all;
		
	/**
	 * Specifies which managed object properties are retrieved. 
	 * If the pathSet is empty, then the PropertyCollector retrieves 
	 * references to the managed objects and no managed object properties are collected.
	 * @var string
	 */
	protected $pathSet;
}