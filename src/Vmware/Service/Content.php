<?php
namespace Vmware\Service;

use Vmware\Managed\Object\Reference;
use Vmware\Data\Object\AboutInfo;


class Content {

	protected $_data;
	
	public function __construct($serviceContent){
		if(is_array($serviceContent)) {
			foreach($serviceContent as $_key => $_property) {
				if($_key == 'about') {
					$this->_data['About'] = new AboutInfo($_property);	
				}
				else {
					$this->_data[ucfirst($_property->type)] = $this->_data[ucfirst($_key)] 	= new Reference($_property->_,$_property->type);
				}
			}
		}
	}
 	
	public function __call($name, $arguments) {
		if(isset($this->_data[$name])) {
			return  $this->_data[$name];	
		} else throw new \BadMethodCallException('Invalid method '.$name);
	}
}