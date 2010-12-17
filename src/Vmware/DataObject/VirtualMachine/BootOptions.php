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
 * Options for configuring the boot-time behavior of a virtual machine. 
 * @author nicolasfabre
 * @since VI API 2.5
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.BootOptions.html
 */
class BootOptions extends DynamicData {
	/**
	 * Delay in milliseconds to add to the boot time of a virtual machine. 
	 * @var long
	 */
	protected $bootDelay;
	/**
	 * If set to "true", then the virtual machine will drop into BIOS setup upon the next boot. 
	 * This flag will subsequently be reset to "false" so that subsequent boots proceed normally. 
	 * @var boolean
	 */
	protected $enterBIOSSetup;
}