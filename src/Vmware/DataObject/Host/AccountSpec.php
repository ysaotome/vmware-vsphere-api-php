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
 * This data object type contains common parameters for local account creation.
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.host.LocalAccountManager.AccountSpecification.html
 * @ClassMap(soap="HostAccountSpec")
 */
class AccountSpec extends DynamicData {
	/**
	 * The ID of the specified account. 
	 * @var string
	 */
	protected $id;
	/**
	 * The password for a user or group. 
	 * @var string
	 */
	protected $password;
	/**
	 * The description of the specified account. 
	 * @var string
	 */
	protected $description;
}