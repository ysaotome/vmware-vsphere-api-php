<?php
namespace Vmware\Data\Object;

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