<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\VirtualDevice;

use Vmware\DataObject\DynamicData;
/**
 * The VirtualDeviceSpec data object type encapsulates change specifications for an individual virtual device.
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.device.VirtualDeviceSpec.html
 *
 */
class ConfigSpec extends DynamicData {
	/**
	 * Specifies the creation of the device backing; for example, the creation of a virtual disk or floppy image file. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPEC_FILE_OPERATION_CREATE = 'create';
	/**
	 * Specifies the destruction of a device backing. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPEC_FILE_OPERATION_DESTROY = 'destroy';
	/**
	 * Specifies the deletion of the existing backing for a virtual device and the creation of a new backing. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPEC_FILE_OPERATION_REPLACE = 'replace';
	/**
	 * Specifies the addition of a virtual device to the configuration. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPE_COPERATION_ADD = 'add';
	/**
	 * Specifies changes to the virtual device specification. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPE_COPERATION_EDIT = 'edit';
	/**
	 * Specifies the removal of a virtual device. 
	 */
	const VIRTUAL_DEVICE_CONFIG_SPE_COPERATION_REMOVE = 'remove';
	/**
	 * Type of operation being performed on the specified virtual device. 
	 * @var string
	 */	
	protected $operation;	
	/**
	 * Type of operation being performed on the backing of the specified virtual device.
	 * @var string
	 */
	protected $fileOperation;	
	/**
	 * Device specification, with all necessary properties set. 
	 * @var \Vmware\DataObject\VirtualDevice
	 */	
	protected $device;	
}