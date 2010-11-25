<?php
namespace Vmware\Managed\Object;

class Reference {
	protected $type, $value;
	
	public function __construct($value,$type) {
		$this->type = $type;
		$this->value= $value;
	}
	
	public function getType() {
		return $this->type;
	} 
	
	public function setType($type) {
		$this->type = $type;
		
		return $this;
	}
	
	public function getValue() {
		return $this->value;
	} 
	
	public function setValue($value) {
		$this->value= $value;
		
		return $this;
	}
}