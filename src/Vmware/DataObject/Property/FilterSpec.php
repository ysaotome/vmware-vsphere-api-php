<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Property;

use Vmware\DataObject\DynamicData;

/**
 * This data object type defines the property data that is included in a filter. 
 * A filter can specify part of a single managed object, or parts of multiple 
 * related managed objects in an inventory hierarchy - for example, 
 * to collect updates from all virtual machines in a given folder. 
 *
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.FilterSpec.html
 */
class FilterSpec extends DynamicData {
	/**
	 * Set of properties to include in the filter, specified for each object type. 
	 * @var unknown_type
	 */
	protected $propSet = array();
	
	/**
	 * Set of specifications that determine the objects to filter. 
	 * @var unknown_type
	 */
	protected $objectSet = array();
		
	/**
	 * Control how to report missing objects during filter creation. 
	 * @var boolean
	 * @since 4.1
	 */
	protected $reportMissingObjectsInResults;

}