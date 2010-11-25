<?php
namespace Vmware\Data\Object;

class ObjectSpec extends DynamicData {

	/**
	 * Starting object.
	 * @var Vmware\Managed\Object\Reference
	 */
	protected $obj;
	/**
	 * Set of selections to specify additional objects to filter. 
	 * @var SelectionSpec
	 */
	protected $selectSet;
	/**
	 * Flag to specify whether or not to report this managed object's properties. 
	 * If the flag is true, the filter will not report this managed object's properties. 
	 * @var bool
	 */
	protected $skip;
	
}