<?php
namespace Vmware\Data\Object\Property;

use Vmware\Data\Object\SelectionSpec;

class Spec extends SelectionSpec {
	
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
	
	/**
	 * Name of the managed object type being collected.
	 * @var string
	 */
	protected $type;
}