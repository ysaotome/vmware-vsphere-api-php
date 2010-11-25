<?php
namespace Vmware\Data\Object;

class TraversalSpec extends SelectionSpec {
	/**
	 * Name of the property to use in order to select additional objects. 
	 * @var string
	 */
	protected $path;
	
	/**
	 * Optional set of selections to specify additional objects to filter. 
	 * @var array
	 */
	protected $selectSet = array();
	
	/**
	 * Flag to indicate whether or not to filter the object in the "path" field. 
	 * @var bool
	 */
	protected $skip;
	
	/**
	 * Name of the object type containing the property. 
	 * @var string
	 */
	protected $type;
	
}