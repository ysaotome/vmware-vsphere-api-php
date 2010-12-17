<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\Resource;

use Vmware\DataObject\DynamicData;

/**
 * The ResourceAllocationInfo data object specifies the reserved resource requirement 
 * as well as the limit (maximum allowed usage) for a given kind of resource.
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.ResourceAllocationInfo.html
 */
class AllocationInfo extends DynamicData {
	/**
	 * Amount of resource that is guaranteed available to the virtual machine or resource pool.
	 * @var long
	 */
	protected $reservation;
	/**
	 * In a resource pool with an expandable reservation, 
	 * the reservation on a resource pool can grow beyond the specified value, 
	 * if the parent resource pool has unreserved resources
	 * @var boolean
	 */	
	protected $expandableReservation;
	/**
	 * The utilization of a virtual machine/resource pool will not exceed this limit, 
	 * even if there are available resources.
	 * @var long
	 */	
	protected $limit;
	/**
	 * Memory shares are used in case of resource contention. 
	 * @var \Vmware\DataObject\SharesInfo
	 */	
	protected $shares;
	/**
	 * The maximum allowed overhead memory. 
	 * @var long
	 */	
	protected $overheadLimit;
}