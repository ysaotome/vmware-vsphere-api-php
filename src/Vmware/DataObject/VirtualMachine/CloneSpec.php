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
 * Specification for a virtual machine cloning operation. 
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.CloneSpec.html
 *
 */
class CloneSpec extends DynamicData {
	/**
     * A type of RelocateSpec that specifies the location of resources the newly cloned virtual machine will use
     * @var \Vmware\DataObject\VirtualMachine\RelocateSpec
	 */
	protected $location;
	/**
	 * Specifies whether or not the new virtual machine should be marked as a template. 
     * @var boolean
	 */
	protected $template;
	/**
	 * An optional specification of changes to the virtual hardware
	 * @var \Vmware\DataObject\VirtualMachine\ConfigSpec
	 */
	protected $config;
	/**
	 * An optional guest operating system customization specification
	 * @var \Vmware\DataObject\CustomizationSpec
	 */
	protected $customization;
	/**
     * Specifies whether or not the new VirtualMachine should be powered on after creation
     * @var boolean
	 */
	protected $powerOn;
	/**
     * Snapshot reference from which to base the clone. 
     * @var \Vmware\DataObject\VirtualMachine\Snapshot
	 */
	protected $snapshot;
}
	
