<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Vm;

use Vmware\DataObject\VApp\PropertySpec;
use Vmware\DataObject\VApp\OvfSectionSpec;
use \Vmware\DataObjectVApp\PropertySpec;
use \Vmware\DataObject\DynamicData;

/**
 * vApp related configuration of a VM. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.VmConfigSpec.html
 */
class ConfigSpec extends DynamicData {
	/**
	 * Information about the product. 
	 * @var \Vmware\DataObject\VApp\ProductSpec
	 */
	protected $product = array();	
	/**
	 * List of properties.  
	 * @var \Vmware\DataObject\VApp\PropertySpec
	 */	
	protected $property = array();	
	/**
	 * IP assignment policy and DHCP support configuration. 
	 * @var \Vmware\DataObject\VApp\IPAssignmentInfo
	 */	
	protected $ipAssignment;	
	/**
	 * End User Liceses Agreements. 
	 * @var string[]
	 */	
	protected $eula = array();	
	/**
	 * List of uninterpreted OVF meta-data sections. 
	 * @var \Vmware\DataObject\VApp\OvfSectionSpec[]
	 */	
	protected $ovfSection = array();
	/**
	 * List the transports to use for properties. Supported values are: iso and com.vmware.guestInfo. 
	 * @var string[]
	 */	
	protected $ovfEnvironmentTransport = array();	
	/**
	 * If this is on a VirtualMachine object, it specifies whether 
	 * the VM needs an initial boot before the deployment is complete.
	 * @var boolean
	 */	
	protected $installBootRequired;	
	/**
	 * Specifies the delay in seconds to wait for the VM to power off after the initial boot 
	 * @var int
	 */
	protected $installBootStopDelay;
	
	/**
	 * @param ProductSpec $product
	 */
	public function addProduct(PropertySpec $product) {
		array_push($this->product,$product);
		return $this;
	}

	/**
	 * @param string $eula
	 */
	public function addEula($eula) {
		array_push($this->eula,$eula);
		return $this;
	}

	/**
	 * @param OvfSectionSpec $ovfSection
	 */
	public function addOvfSection(OvfSectionSpec $ovfSection) {
		array_push($this->ovfSection,$ovfSection);
		return $this;
	}

	/**
	 * @param string[] $ovfEnvironmentTransport
	 */
	public function addOvfEnvironmentTransport($ovfEnvironmentTransport) {
		array_push($this->ovfEnvironmentTransport,$ovfEnvironmentTransport);
		return $this;
	}

	/**
	 * @param PropertySpec $property
	 */
	public function addProperty(PropertySpec $property) {
		array_push($this->property,$property);
		return $this;
	}
}