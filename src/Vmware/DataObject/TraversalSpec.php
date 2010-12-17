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
 * The TraversalSpec data object type specifies how to derive
 *  a new set of objects to add to the filter. 
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.TraversalSpec.html
 */
class TraversalSpec extends SelectionSpec {
	/**
	 * Name of the object type containing the property. 
	 * @var string
	 */
	protected $type;
	
	/**
	 * Name of the property to use in order to select additional objects. 
	 * @var string
	 */
	protected $path;	
	
	/**
	 * Flag to indicate whether or not to filter the object in the "path" field. 
	 * @var bool
	 */
	protected $skip;
	
	/**
	 * Optional set of selections to specify additional objects to filter. 
	 * @var array
	 */
	protected $selectSet = array();	
	
	/*public function __construct($type, $path, $skip, $selectSet, $dynamicType, $dynamicProperty, $name) {
		
	}*/
	
	public function addSelectSet($selectSet) {
		array_push($this->selectSet, $selectSet);
		return $this;
	}
	 
	public function offsetSetSelectSet($index,$newval) {
		$this->selectSet[$index] = $newval;
		return $this;
	}
	
	public function offsetGetSelectSet($index) {
		return $this->selectSet[$index];	
	}

}