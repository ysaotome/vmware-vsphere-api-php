<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Tools;

use \Vmware\DataObject\DynamicData;

/**
 * ToolsConfigInfo is a data object type containing settings 
 * for the VMware Tools software running in the guest operating system. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.ToolsConfigInfo.html
 */
class ConfigInfo extends DynamicData {
	/**
	 * Version of VMware Tools installed on the guest operating system. 
	 * @var int
	 */
	protected $toolsVersion;
	/**
	 * 
	 * Flag to specify whether or not scripts should run after the virtual machine powers on. 
	 * @var boolean
	 */
	protected $afterPowerOn;
	/**
	 * Flag to specify whether or not scripts should run after the virtual machine resumes. 
	 * @var boolean
	 */
	protected $afterResume;
	/**
	 * Flag to specify whether or not scripts should run before the virtual machine suspends. 
	 * @var boolean
	 */
	protected $beforeGuestStandby;
	/**
	 * Flag to specify whether or not scripts should run before the virtual machine powers off.  
	 * @var boolean
	 */
	protected $beforeGuestShutdown;
	/**
	 * Flag to specify whether or not scripts should run before the virtual machine reboots.  
	 * @var boolean
	 */
	protected $beforeGuestReboot;
	/**
	 * Tools upgrade policy setting for the virtual machine
	 * @var string
	 * @since VI API 2.5
	 */
	protected $toolsUpgradePolicy;
	/**
	 * When set, this indicates that a customization operation is pending on the VM.
	 * @var string
	 * @since VI API 2.5
	 */
	protected $pendingCustomization;
	/**
	 * Indicates whether or not the tools program will sync time with the host time. 
	 * @var boolean
	 * @since VI API 2.5
	 */
	protected $syncTimeWithHost;
}