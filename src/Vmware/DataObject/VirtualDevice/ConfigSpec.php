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
	 * Type of operation being performed on the specified virtual device. 
	 * @var \Vmware\DataObject\VirtualDevice\ConfigSpec\Operation
	 */	
	protected $operation;	
	/**
	 * Type of operation being performed on the backing of the specified virtual device.
	 * @var \Vmware\DataObject\VirtualDevice\ConfigSpec\FileOperation
	 */
	protected $fileOperation;	
	/**
	 * Device specification, with all necessary properties set. 
	 * @var \Vmware\DataObject\VirtualDevice
	 */	
	protected $device;	
}