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
 * Network traffic shaping specification. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vm.NetworkShaperInfo.html
 */
class NetworkShaperInfo extends DynamicData {
	/**
	 * Is the shaper enabled? 
	 * @var boolean
	 */
	protected $enabled;
	/**
	 * Peak bandwidth, in bits per second. 
	 * @var long
	 */	
	protected $peakBps;
	/**
	 * Average bandwidth, in bits per second. 
	 * @var long
	 */	
	protected $averageBps;
	/**
	 * Burst size, in bytes.
	 * @var long
	 */
	protected $burstSize;
}