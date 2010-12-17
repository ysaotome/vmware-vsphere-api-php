<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\VirtualMachine;

use \Vmware\DataObject\DynamicData;

/**
 * Specification of scheduling affinity. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.AffinityInfo.html
 */
class AffinityInfo extends DynamicData {
	/**
	 * List of nodes that may be used by the virtual machine.
	 * @var int[]
	 */
	protected $affinitySet = array();
	
	/**
	 * Enter description here ...
	 * @param int $affinitySet
	 */
	public function addAffinitySet($affinitySet) {
		array_push($this->affinitySet, $affinitySet);
		return $this;
	}
}