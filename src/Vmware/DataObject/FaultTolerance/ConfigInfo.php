<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\FaultTolerance;

use \Vmware\DataObject\DynamicData;
/**
 * FaultToleranceConfigInfo is a data object type containing Fault Tolerance settings for this virtual machine.
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.FaultToleranceConfigInfo.html
 * @since vSphere API 4.0
 */
class ConfigInfo extends DynamicData {
	/**
	 * The index of the current VM in instanceUuids array starting from 1, so 1 means that it is the primary VM.
	 * @var int
	 */
	protected $role;	
	/**
	 * The instanceUuid of all the VMs in this fault tolerance group. 
	 * The first element is the instanceUuid of the primary VM. 
	 * @var string[]
	 */	
	protected $instanceUuids;	
	/**
	 * The configuration file path for all the VMs in this fault tolerance group. 
	 * @var string[]
	 */	
	protected $configPaths;	
	
	/**
	 * @param string $configPaths
	 */
	public function addConfigPaths( $configPaths) {
		array_push($this->configPaths,$configPaths);
		return $this;
	}

	/**
	 * @param string $instanceUuids
	 */
	public function addInstanceUuids($instanceUuids) {
		array_push($this->instanceUuids,$instanceUuids);
		return $this;
	}	
}