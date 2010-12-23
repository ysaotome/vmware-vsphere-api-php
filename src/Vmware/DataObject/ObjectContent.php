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
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.ObjectContent.html
 */
class ObjectContent extends DynamicData {
	/**
	 * Starting object.
	 * @var \Vmware\DataObject\Managed\ObjectReference
	 */
	protected $obj;
	
	/**
	 * Set of name-value pairs for the properties of the managed object. 
	 * @var DynamicProperty
	 */
	protected $propSet;
	/**
	 * Properties for which values could not be retrieved and the associated fault 
	 * @var MissingProperty
	 */
	protected $missingSet;
	
	
}