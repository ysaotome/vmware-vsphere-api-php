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

use Vmware\DataObject\DynamicData;
/**
 * The ConfigSpec data object type encapsulates configuration settings 
 * when creating or reconfiguring a virtual machine. 
 * To support incremental changes, these properties are all optional. 
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.ConfigSpec.html
 *
 */
class ConfigSpec extends DynamicData {
	
	/**
	 * If specified, the changes are only applied 
	 * if the current changeVersion matches the specified changeVersion. 
	 * @var string
	 */
	protected $changeVersion;
	/**
	 * Display name of the virtual machine. 
	 * @var string
	 */
	protected $name;
	/**
	 * The version string for this virtual machine.
	 * @var string
	 */
	protected $version;
	/**
	 * 128-bit SMBIOS UUID of a virtual machine represented as a hexadecimal 
	 * string in "12345678-abcd-1234-cdef-123456789abc" form
	 * @var string
	 */
	protected $uuid;
	/**
	 * VirtualCenter-specific 128-bit UUID of a virtual machine, 
	 * represented as a hexadecimal string
	 * @var string
	 */
	protected $instanceUuid;
	/**
	 * The NPIV node WWN to be assigned to a virtual machine
	 * @var long[]
	 */	
	protected $npivNodeWorldWideName;		
	/**
	 * The NPIV port WWN to be assigned to a virtual machine
	 * @var long[]
	 */		
	protected $npivPortWorldWideName;
	/**
	 * This property is used internally in the communication between 
	 * the VirtualCenter server and ESX Server to indicate the source 
	 * for npivNodeWorldWideName and npivPortWorldWideName when 
	 * npivWorldWideNameOp is "set".
	 * @var string
	 */
	protected $npivWorldWideNameType;
	/**
	 * The NPIV node WWNs to be extended from the original list of WWN nummbers
	 * @var short
	 */
	protected $npivDesiredNodeWwns;		
	/**
	 * The NPIV port WWNs to be extended from the original list of WWN nummbers
	 * @var short
	 */
	protected $npivDesiredPortWwns;		
	/**
	 * This property is used to enable or disable the NPIV capability 
	 * on a desired virtual machine on a temporary basis
	 * @var boolean
	 */
	protected $npivTemporaryDisabled;
	/**
	 * This property is used to check whether the NPIV can be enabled 
	 * on the Virtual machine with non-rdm disks in the configuration
	 * @var boolean
	 */	
	protected $npivOnNonRdmDisks;	
	/**
	 * The flag to indicate what type of NPIV WWN operation is going 
	 * to be performed on the virtual machine
	 * @var string
	 */	
	protected $npivWorldWideNameOp;		
	/**
	 * 128-bit hash based on the virtual machine's configuration file 
	 * location and the UUID of the host assigned to run the virtual machine. 
	 * @var string
	 */
	protected $locationId;	
	/**
	 * Short guest operating system identifier. 
     * @var string
	 */
	protected $guestId;	
	/**
	 * Full name for guest, if guestId is specified as other or other-64. 
	 * @var string
	 */
	protected $alternateGuestName;
	/**
	 * Settings that control the boot behavior of the virtual machine. 
	 * These settings take effect during the next power-on of the virtual machine. 
	 * @var string
	 */
	protected $annotation;
	/**
     * Information about virtual machine files. 
     * @var Vmware\VirtualMachine\FileInfo
	 */
	protected $files;
	/**
	 * Configuration of VMware Tools running in the guest operating system. 
	 * @var Vmware\Tools\ConfigInfo
	 */		
	protected $tools;
	/**
	 * Additional flags for a virtual machine.   
	 * @var  Vmware\VirtualMachine\FlagInfo
	 */
	protected $flags;
	/**
	 * Legacy console viewer preferences that are used with power operations. For example, power on. 
	 * @var  Vmware\VVirtualMachine\Console\Preferences
	 */		
	protected $consolePreferences;	
	/**
	 * Configuration for default power operations. 
	 * @var VirtualMachine\DefaultPowerOpInfo
	 */
	protected $powerOpInfo;		
	/**
	 * Number of virtual processors in a virtual machine. 
	 * @var int
	 */
	protected $numCPUs;
	/**
	 * Size of a virtual machine's memory, in MB. 
	 * @var long
	 */
	protected $memoryMB;
	/**
	 * Indicates whether or not memory can be added to the virtual machine while it is running
	 * @var boolean
	 */
	protected $memoryHotAddEnabled;	
	/**
	 * Indicates whether or not virtual processors can be added to the 
	 * virtual machine while it is running.
	 * @var boolean
	 */	
	protected $cpuHotAddEnabled;	
	/**
	 * Indicates whether or not virtual processors can be removed from 
	 * the virtual machine while it is running
	 * @var boolean
	 */	
	protected $cpuHotRemoveEnabled;	
	/**
	 * Set of virtual devices being modified by the configuration operation. 
	 * @var \Vmware\DataObject\VirtualDevice\ConfigSpec[]
	 */	
	protected $deviceChange;
	/**
	 * Resource limits for CPU. 
	 * @var \Vmware\DataObject\Resource\AllocationInfo
	 */	
	protected $cpuAllocation;
	/**
	 * Resource limits for memory. 
	 * @var \Vmware\DataObject\Resource\AllocationInfo
	 */
	protected $memoryAllocation;
	/**
	 * Affinity settings for CPU. 
	 * @var \Vmware\DataObject\VirtualMachine\AffinityInfo
	 */		
	protected $cpuAffinity;
	/**
	 * Resource limits for network. 
	 * @var \Vmware\DataObject\VirtualMachine\AffinityInfo
	 */	
	protected $memoryAffinity;	
	/**
	 * Resource limits for network. 
	 * @var \Vmware\DataObject\VirtualMachine\NetworkShaperInfo 
	 */	
	protected $networkShaper;	
	/**
	 * Specifies the CPU feature compatibility masks. 
	 * @var \Vmware\DataObject\VirtualMachine\CpuIdInfoSpec[]
	 */
	protected $cpuFeatureMask;
	/**
	 * Additional configuration information for the virtual machine
	 * @var \Vmware\DataObject\OptionValue[]
	 */
	protected $extraConfig;		
	/**
	 * Virtual machine swapfile placement policy
	 * @var string
	 */
	protected $swapPlacement;
	/**
	 * Settings that control the boot behavior of the virtual machine. 
	 * These settings take effect during the next power-on of the virtual machine. 
	 * @var \Vmware\DataObject\VirtualMachine\BootOptions
	 */	
	protected $bootOptions;
	/**
     * Configuration of vApp meta-data for a virtual machine 
     * @var \Vmware\DataObject\Vm\ConfigSpec
	 */
	protected $vAppConfig;	
	/**
	 * Fault Tolerance settings for this virtual machine.
	 * @var \Vmware\DataObject\VirtualMachine\FaultTolerance\ConfigInfo
	 */
	protected $ftInfo;	
	/**
	 * Set to true, if the vApp configuration should be removed 
	 * @var boolean
	 */
	protected $vAppConfigRemoved;
	/**
	 * Indicates whether user-configured virtual asserts will be triggered during virtual machine replay
	 * @var boolean
	 */		
	protected $vAssertsEnabled;	
	/**
	 * Setting to control enabling/disabling changed block tracking for the virtual disks of this VM
	 * @var boolean
	 */	
	protected $changeTrackingEnabled;
}