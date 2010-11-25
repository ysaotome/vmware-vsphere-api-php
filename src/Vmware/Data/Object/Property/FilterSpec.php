<?php
namespace Vmware\Data\Object\Property;

use Vmware\Data\Object\DynamicData;

class FilterSpec extends DynamicData {
	
	/**
	 * Set of specifications that determine the objects to filter. 
	 * @var unknown_type
	 */
	protected $objectSet;
	
	/**
	 * Set of properties to include in the filter, specified for each object type. 
	 * @var unknown_type
	 */
	protected $propSet;
	
	
	/**
	 * Control how to report missing objects during filter creation. 
	 * @var boolean
	 */
	protected $reportMissingObjectsInResults;

}