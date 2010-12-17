<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Host;

use Vmware\DataObject\DynamicData;

/**
 * The CpuIdInfo data object type is used to represent the CPU features of a particular host or product, 
 * or to specify what the CPU feature requirements are for a particular virtual machine or guest operating system. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.host.CpuIdInfo.html 
 */
class CpuIdInfo extends DynamicData {
	/**
	 * Level (EAX input to CPUID). 
	 * @var int
	 */
	protected $level;
	/**
	 * Used if this mask is for a particular vendor. 
	 * @var string
	 */	
	protected $vendor;	
	/**
	 * String representing the required EAX bits. 
	 * @var string
	 */
	protected $eax;	
	/**
	 * String representing the required EBX bits. 
	 * @var string
	 */	
	protected $ebx;	
	/**
	 * String representing the required ECX bits. 
	 * @var string
	 */	
	protected $ecx;	
	/**
	 * String representing the required EDX bits. 
	 * @var string
	 */	
	protected $edx;	
}