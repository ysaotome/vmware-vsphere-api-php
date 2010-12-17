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
 * The FlagInfo data object type encapsulates the flag settings for a virtual machine.
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.FlagInfo.html
 */
class FlagInfo extends DynamicData {
	/**
	 * Flag to turn off video acceleration for a virtual machine console window. 
	 * @var boolean
	 */
	protected $disableAcceleration;
	/**
	 * Flag to enable logging for a virtual machine. 
	 * @var boolean
	 */
	protected $enableLogging;
	/**
	 * Flag to specify whether or not to use TOE (TCP/IP Offloading). 
	 * @var boolean
	 */
	protected $useToe;
	/**
	 * Flag to specify whether or not to run in debug mode. 
	 * Enter description here ...
	 * @var boolean
	 * @deprecated As of VI API 2.5
	 */
	protected $runWithDebugInfo;
	/**
	 * Virtual machine monitor type.
	 * @var string
	 */
	protected $monitorType;
	/**
	 * Specifies how the VCPUs of a virtual machine are allowed to share physical cores on a hyperthreaded system.
	 * @var string
	 */
	protected $htSharing;
	/**
	 * Flag to specify whether snapshots are disabled for this virtual machine. 
	 * @var boolean
	 * @since VI API 2.5
	 * @deprecated As of vSphere API 4.0
	 */
	protected $snapshotDisabled;
	/**
	 * Flag to specify whether the snapshot tree is locked for this virtual machine. 
	 * @var boolean
	 * @since VI API 2.5
	 */
	protected $snapshotLocked;
	/**
	 * Indicates whether disk UUIDs are being used by this virtual machine.
	 * @var boolean
	 */
	protected $diskUuidEnabled;
	/**
	 * Indicates whether or not the system will try to use nested page table hardware support, if available. 
	 * @var string
	 * @since VI API 2.5
	 */
	protected $virtualMmuUsage;
	/**
	 * Indicates whether or not the system will try to use Hardware Virtualization (HV) 
	 * support for instruction virtualization, if available. 
	 * @var string
	 * @since vSphere API 4.0
	 */
	protected $virtualExecUsage;
	/**
	 * Specifies the power-off behavior for a virtual machine that has a snapshot.
	 * @var string
	 * @since VI API 2.5
	 */
	protected $snapshotPowerOffBehavior;
	/**
	 * Flag to specify whether record and replay operations are allowed for this virtual machine.
	 * @var boolean
	 * @since vSphere API 4.0
	 */
	protected $recordReplayEnabled;
}