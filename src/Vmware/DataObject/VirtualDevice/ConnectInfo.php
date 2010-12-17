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
 * The ConnectInfo data object type contains information about connectable virtual devices. 
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.device.VirtualDevice.ConnectInfo.html
 *
 */
class ConnectInfo extends DynamicData {
	/**
	 * Flag to specify whether or not to connect the device when the virtual machine starts. 
	 * @var boolean
	 */
	protected $startConnected;
	/**
	 * Flag to allow the guest to control whether the connectable device is connected. 
	 * @var boolean
	 */
	protected $allowGuestControl;
	/**
	 * Flag indicating the device is currently connected. 
	 * Valid only while the virtual machine is running. 
	 * @var boolean
	 */
	protected $connected;
	/**
	 * The current status of the connectable device. Valid only while the virtual machine is running
	 * @var string
	 * @since vSphere API 4.0
	 */
	protected $status;
}