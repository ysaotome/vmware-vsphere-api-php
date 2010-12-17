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
 * Preferences for the legacy console application that affect the way 
 * it behaves during power operations on the virtual machine. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.ConsolePreferences.html
 */
class ConsolePreferences extends DynamicData {
	/**
	 * Power on the virtual machine when it is opened in the console. 
	 * @var boolean
	 */
	protected $powerOnWhenOpened;
	/**
	 * Enter full screen mode when this virtual machine is powered on. 
	 * @var boolean
	 */
	protected $enterFullScreenOnPowerOn;
	/**
	 * Close the console application when the virtual machine is powered off or suspended. 
	 * @var boolean
	 */
	protected $closeOnPowerOffOrSuspend;
}