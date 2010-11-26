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

use Vmware\DataObject\Managed\ObjectReference;

/**
 * The ServiceContent data object defines properties for the ServiceInstance managed object
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.ServiceInstanceContent.html
 */
class ServiceContent extends DynamicData {
	/**
	 * Reference to the top of the inventory managed by this service. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */
	protected $rootFolder;
	/**
	 * Reference to a per-session object for retrieving properties and updates. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */
	protected $propertyCollector;
	/**
	 * A singleton managed object for tracking custom sets of objects. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */
	protected $viewManager;
	/**
	 * Information about the service, such as the software version. 
	 * @var Vmware\DataObject\AboutInfo
	 */	
	protected $about;
	/**
	 * Generic configuration for a management server.
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $setting;
	/**
	 * A user directory managed object. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $userDirectory;
	/**
	 * Managed object for logging in and managing sessions. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $sessionManager;
	/**
	 * Manages permissions for managed entities in the service. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $authorizationManager;
	/**
	 * A singleton managed object that manages the collection 
	 * and reporting of performance statistics. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $perfManager;
	/**
	 * A singleton managed object that manages scheduled tasks. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $scheduledTaskManager;
	/**
	 * A singleton managed object that manages alarms. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $alarmManager;
	/**
	 * A singleton managed object that manages events. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $eventManager;
	/**
	 * A singleton managed object that manages tasks. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $taskManager;
	/**
	 * A singleton managed object that manages extensions. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $extensionManager;
	/**
	 * A singleton managed object that manages saved guest customization 
	 * specifications.  
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $customizationSpecManager;
	/**
	 * A singleton managed object that managed custom fields. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $customFieldsManager;
	/**
	 * A singleton managed object that manages host local user and group accounts.
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $accountManager;
	/**
	 * A singleton managed object that provides access to low-level log files.  
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $diagnosticManager;
	/**
	 * A singleton managed object that manages licensing 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $licenseManager;
	/**
	 * A singleton managed object that allows search of the inventory. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $searchIndex;
	/**
	 * A singleton managed object that allows management of files present on datastores.
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $fileManager;
	/**
	 * A singleton managed object that allows management of virtual disks on datastores.
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $virtualDiskManager;
	/**
	 * A singleton managed object that manages the discovery, analysis, 
	 * recommendation and virtualization of physical machines 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 * @deprecated
	 */
	protected $virtualizationManager;
	/**
	 * A singleton managed object that allows SNMP configuration. 
	 * Not set if not supported on a particular platform. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $snmpSystem;
	/**
	 * A singleton managed object that can answer questions 
	 * about the feasibility of certain provisioning operations. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $vmProvisioningChecker;
	/**
	 * A singleton managed object that can answer questions 
	 * about compatibility of a virtual machine with a host. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $vmCompatibilityChecker;
	/**
	 * A singleton managed object that can generate OVF descriptors (export) 
	 * and create vApps (single-VM or vApp container-based) from OVF descriptors (import). 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $ovfManager;
	/**
	 * A singleton managed object that supports management of IpPool objects.
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $ipPoolManager;
	/**
	 * A singleton managed object that provides relevant information of DistributedVirtualSwitch. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $dvSwitchManager;
	/**
	 * A singleton managed object that manages the host profiles. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $hostProfileManager;
	/**
	 * A singleton managed object that manages the cluster profiles. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $clusterProfileManager;
	/**
	 * A singleton managed object that manages compliance aspects of entities. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $complianceManager;
	/**
	 * A singleton managed object that provides methods for retrieving message 
	 * catalogs for client-side localization support. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */		
	protected $localizationManager;
	
	public function __construct($serviceContent){
		if(is_array($serviceContent)) {
			foreach($serviceContent as $_key => $_property) {
				if($_key == 'about') {
					$this->$_key = new AboutInfo($_property);	
				}
				else {
					$this->$_key = new ObjectReference($_property->_,$_property->type);
				}
			}
		}
	}
}