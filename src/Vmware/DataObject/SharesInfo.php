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


/**
 * Shares are used to determine relative allocation between resource consumers.
 *
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.SharesInfo.html
 *
 */
class SharesInfo extends DynamicData{
	/**
	 * Shares are specified in the "shares" column. 
	 */
	const SHARES_LEVEL_CUSTOM = 'custom';
	/**
	 * For CPU: Shares = 2000 * number of virtual CPUs
	 * For Memory: Shares = 20 * virtual machine memory size in megabytes
	 * For Disk: Shares = 2000 
	 */
	const SHARES_LEVEL_HIGH = 'high';
	/**
	 * For CPU: Shares = 500 * number of virtual CPUs
	 * For Memory: Shares = 5 * virtual machine memory size in megabytes
	 * For Disk: Shares = 500 
	 */
	const SHARES_LEVEL_LOW = 'low';
	/**

	 * For CPU: Shares = 1000 * number of virtual CPUs
	 * For Memory: Shares = 10 * virtual machine memory size in megabytes
	 * For Disk: Shares = 1000 
	 */
	const SHARES_LEVEL_NORMAL = 'normal';
	/**
	 * The number of shares allocated. Used
	 * @var int
	 */
	protected $shares;
	/**
	 * The allocation level. 
	 * @var const
	 */
	protected $level;
}