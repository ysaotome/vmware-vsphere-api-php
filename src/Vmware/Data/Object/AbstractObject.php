<?php
namespace Vmware\Data\Object;

abstract class AbstractObject {
	
	public function __call($name,array $arguments) {
		// TODO a rendre plus hype
		$prefix = substr($name, 0,3);
		$property = \lcfirst(substr($name, 3));
		
		// Check if the property exist
		// Too restrictive ?
		$stClass = \get_called_class();
		$reflection = new \ReflectionClass(new $stClass());  
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
			default:
				throw new \BadMethodCallException('Invalid Method :'.$name);	
		}
	}
} 