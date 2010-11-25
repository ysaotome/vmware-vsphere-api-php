<?php
namespace Vmware\Data\Object;

use Vmware\Data\Object\DynamicData;

class Permission extends DynamicData {
	/**
	 * Managed entity the permission is defined on. 
	 * Left unset when calling setPermissions or resetPermissions, 
	 * but present for the results of permission queries. 
	 * @var Vmware\Managed\Object\Reference
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
	
	public function __get($name) {
		
		return 'ns1:'.$this->$name;
	} 
	
	public function __sleep() {
		echo 'a';exit;
	}
	
public function __invoke($x)
    {
        var_dump($x);exit;
    }
}