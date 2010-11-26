<?php
namespace Vmware\DataObject;

/**
 * This data object type describes system information including the name, type, version, and build number. 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk41pubs/ApiReference/vim.AboutInfo.html
 *
 */
class AboutInfo extends DynamicData {
	/**
	 * Indicates whether or not the service instance represents a standalone host. 
	 * If the service instance represents a standalone host, 
	 * then the physical inventory for that service instance is fixed to that single host. 
	 * VirtualCenter server provides additional features over single hosts. 
	 * For example, VirtualCenter offers multi-host management. 
	 * 
	 * @var string
	 */
	protected $apiType;
	
	
}