<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Managed;

use Vmware\DataObject\AbstractObject;
/**
 * This class is used to refer to a server-side Managed Object. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.ManagedObjectReference.html
 */
class ObjectReference extends AbstractObject {
	/**
	 * The name of the Managed Object type this ManagedObjectReference refers to. 
	 * @var string
	 */
	protected $type;
	/**
	 * The specific instance of Managed Object this ManagedObjectReference refers to. 
	 * @var string
	 */
	protected $value;
	
	/**
	 * Re-map $_ to $value
	 * 
	 * @param unknown_type $name
	 * @param unknown_type $value
	 */
	public function __set($name,$value) {
		if($name == '_') {
			$this->value = $value;
		}else $this->$name = $value;
	}
}