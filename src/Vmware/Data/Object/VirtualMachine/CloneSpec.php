<?php
namespace Vmware\Data\VirtualMachine;

use Vmware\Data\Object\DynamicData;
/**
 * Specification for a virtual machine cloning operation. 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.CloneSpec.html
 *
 */

class CloneSpec extends DynamicData {
	/**
     * A type of RelocateSpec that specifies the location of resources the newly cloned virtual machine will use
     * @var \Vmware\VirtualMachine\RelocateSpec
	 */
	protected $location;
	/**
	 * Specifies whether or not the new virtual machine should be marked as a template. 
     * @var boolean
	 */
	protected $template;
	/**
	 * An optional specification of changes to the virtual hardware
	 * @var \Vmware\VirtualMachine\ConfigSpec
	 */
	protected $config;
	/**
	 * An optional guest operating system customization specification
	 * @var \Vmware\CustomizationSpec
	 */
	protected $customization;
	/**
     * Specifies whether or not the new VirtualMachine should be powered on after creation
     * @var boolean
	 */
	protected $powerOn;
	/**
     * Snapshot reference from which to base the clone. 
     * @var \Vmware\Managed\Object\VirtualMachine\Snapshot
	 */
	protected $snapshot;
}
	
