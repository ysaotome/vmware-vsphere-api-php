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

use Vmware\DataObject\DynamicData;
/**
 * This data object type provides assignment of some role access to a principal
 * on a specific entity. A ManagedEntity is limited to one permission per principal. 
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.AuthorizationManager.Permission.html
 */
class Permission extends DynamicData {
	/**
	 * Managed entity the permission is defined on. 
	 * Left unset when calling setPermissions or resetPermissions, 
	 * but present for the results of permission queries. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */
	protected $entity;
	/**
	 * User or group receiving access in the form of "login" for local or "DOMAIN\login" for users in a Windows domain. 
	 * @var string 
	 */
	protected $principal;
	/**
	 * Whether principal refers to a user or a group. True for a group and false for a user. 
	 * @var boolean
	 */
	protected $group;	
	/**
	 * Reference to the role providing the access. 
	 * @var int
	 */
	protected $roleId;	
	/**
	 * Whether or not this permission propagates down the hierarchy to sub-entities. 
	 * @var boolean
	 */
	protected $propagate;
}