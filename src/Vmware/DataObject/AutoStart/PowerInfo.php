<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Vmware\DataObject\AutoStart;

use Vmware\DataObject\DynamicData;

/**
 * This object type describes the power-on / power-off behavior for a given virtual machine
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.host.AutoStartManager.AutoPowerInfo.html
 */
class PowerInfo extends DynamicData {
	/**
	 * The system does not wait to receive a heartbeat before powering on the next machine in the order. 
	 * This is the default setting. 
	 */
	const AUTOSTART_WAIT_HEART_BE_AT_SETTING_NO = 'no';
	/**
	 * The system uses the default value to determine whether or not to wait to receive a heartbeat before powering 
	 * on the next machine in the order. 
	 */
	const AUTOSTART_WAIT_HEART_BE_AT_SETTING_SYSTEMDEFAULT = 'systemDefault';
	/**
	 * The system waits until receiving a heartbeat before powering on the next machine in the order. 
	 */
	const AUTOSTART_WAIT_HEART_BE_AT_SETTING_YES = 'yes';
	/**
	 * Virtual machine to power on or power off. 
	 * Enter description here ...
	 * @var \Vmware\DataObject\Managed\ObjectReference
	 */
	protected $key;	
	/**
	 * The autostart priority of this virtual machine
	 * @var int
	 */
	protected $startOrder;
	/**
	 * Delay in seconds before continuing with the next virtual machine in the order of machines to be started
	 * @var int
	 */
	protected $startDelay;
	/**
	 * See const AUTOSTART_...
	 * @var const
	 */
	protected $waitForHeartbeat;
	/**
	 * How to start the virtual machine. Valid settings are none or powerOn. 
	 * @var string
	 */
	protected $startAction;
	/**
	 * Delay in seconds before continuing with the next virtual machine in the order sequence
	 * @var int
	 */
	protected $stopDelay;
	/**
	 * Defines the stop action for the virtual machine
	 * @var string
	 */
	protected $stopAction;
}