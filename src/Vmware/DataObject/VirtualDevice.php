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

/**
 * VirtualDevice is the base data object type for devices in a virtual machine. 
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.device.VirtualDevice.html
 */
class VirtualDevice extends DynamicData {
	/**
	 * This property is a unique key that distinguishes this device 
	 * from other devices in the same virtual machine
	 * @var int
	 */
	protected $key;
	/**
	 * This property provides a label and summary information for the device. 
	 * @var \Vmware\DataObject\Description
	 */
	protected $deviceInfo;
	/**
	 * Information about the backing of this virtual device presented in 
	 * the context of the virtual machine's environment.
	 * @var \Vmware\DataObject\VirtualDevice\BackingInfo
	 */	
	protected $backing;
	/**
	 * Information about restrictions on removing this device while 
	 * a virtual machine is running
	 * @var \Vmware\DataObject\VirtualDevice\ConnectInfo
	 */	
	protected $connectable;
	/**
	 * Object key that denotes the controller object for this device.
	 * @var int
	 */	
	protected $controllerKey;
	/**
	 * Unit number of this device on its controller.
	 * @var int
	 */	
	protected $unitNumber;
}