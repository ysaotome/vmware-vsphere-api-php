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

use \Vmware\DataObject\ArrayUpdateSpec;

/**
 * Wrapper class to support incremental updates of the cpuFeatureMask. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.ConfigSpec.CpuIdInfoSpec.html
 */
class CpuIdInfoSpec extends ArrayUpdateSpec {
	/**
	 * @var \Vmware\DataObject\Host\CpuIdInfo
	 */
	protected $info;
}