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

abstract class AbstractObject {
	/**
	 * Constructor
	 * 
	 * @param \stdClass $data
	 */
	public function __construct($data = null) {
		if(isset($data)) {
			$reflection = new \ReflectionObject($data);  
			
			$properties = $reflection->getProperties();
			foreach ($properties as $_property) {
				$this->{$_property->getName()} = $_property->getValue($data);
			}
		}
	}
	
	/**
	 * 
	 * 
	 * @param string $name
	 * @param array $arguments
	 * @throws \InvalidArgumentException
	 * @throws \BadMethodCallException
	 */
	public function __call($name,array $arguments) {
		// TODO a rendre plus hype
		$prefix = substr($name, 0,3);
		$property = \lcfirst(substr($name, 3));
		// Check if the property exist
		// Too restrictive ?
		$stClass = \get_called_class();
		$reflection = new \ReflectionClass($stClass);  
		if(!$reflection->hasProperty($property)) {
			throw new \InvalidArgumentException('Invalid Argument :'.$property);	
		} 
		switch($prefix) {
			case 'set' :
				// TODO
				$this->{$property} = $arguments[0];
				return $this;
				break;
			case 'get' :
				return $this->{$property};
				break;
			case 'add' :
				array_push($this->{$property},$arguments[0]);
				return $this;
				break;
			default:
				throw new \BadMethodCallException('Invalid Method :'.$name);	
		}
	}
	

} 