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
 * Within a PropertyFilterSpec, the ObjectSpec data object type specifies 
 * the managed object at which the filter begins to collect the managed 
 * object references and properties specified by the associated PropertySpec 
 * set. If the "skip" property is present and set to true, then the filter 
 * does not check to see if the starting object's type matches any of the 
 * types listed in the associated sets of PropertySpec data objects. 
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.ObjectSpec.html
 */
class ObjectSpec extends DynamicData {
	/**
	 * Starting object.
	 * @var \Vmware\DataObject\Managed\ObjectReference
	 */
	protected $obj;
	
	/**
	 * Flag to specify whether or not to report this managed object's properties. 
	 * If the flag is true, the filter will not report this managed object's properties. 
	 * @var bool
	 */
	protected $skip;
	
	/**
	 * Set of selections to specify additional objects to filter. 
	 * @var \Vmware\DataObject\SelectionSpec
	 */
	protected $selectSet;
}