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
 * The DefaultPowerOpInfo data object type holds the configured defaults for the power operations on a virtual machine
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.DefaultPowerOpInfo.html
 */
class DefaultPowerOpInfo extends DynamicData {
	/**
	 * Describes the default power off type for this virtual machine.
	 * @var string
	 */
	protected $powerOffType;
	/**
	 * Describes the default suspend type for this virtual machine.
	 * @var string
	 */	
	protected $suspendType;
	/**
	 * Describes the default reset type for this virtual machine. 
	 * @var string
	 */	
	protected $resetType;
	/**
	 * Default operation for power off: soft or hard 
	 * @var string
	 */
	protected $defaultPowerOffType;
	/**
	 * Default operation for suspend: soft or hard 
	 * @var string
	 */
	protected $defaultSuspendType;
	/**
	 * Default operation for reset: soft or hard 
	 * @var string
	 */	
	protected $defaultResetType;
	/**
	 * Behavior of virtual machine when it receives the S1 ACPI call. 
	 * @var string
	 */	
	protected $standbyAction;
}