<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware;

use Vmware\Data\Object\User\SearchResult;

use Vmware\Service\Content as serviceContent;
use Vmware\Managed\Object\Reference;
use Vmware\Data\Object\User\Session;
 
class Service {
	/**
	 * @var Vmware\Soap\Client
	 */
	protected $_soapClient;
	
	/**
	 * @var unknown_type
	 */
	protected  $_serviceContent;
	/**
	 * Constructor
	 * @param \SoapClient $soapClient
	 */
	public function __construct(\SoapClient $soapClient) {
		$this->_soapClient = $soapClient;
		$this->init();
	}
	
	public function init() {
		$result = $this->retrieveServiceContent("ServiceInstance");
		$this->_serviceContent = new serviceContent((array)$result->returnval);
	}
	
	public function retrieveServiceContent($value) {
		$soapMessage = array('_this' => $this->_prepareMessage($value,$value));
		$result = $this->getSoapClient()->RetrieveServiceContent($soapMessage);
		return $result;
	}
	
	/**
	 * Enter description here ...
	 * 
	 * @return Vmware\Client
	 */
	public function getSoapClient() {
		return $this->_soapClient;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $username
	 * @param string $password
	*/
	public function login($username, $password) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'userName' => $username,
			'password' => $password,
		);
		$result = $this->getSoapClient()->Login($soapMessage);
		return new Session($result->returnval);
	}
	
	/**
	 * 
	 * @param string $reference
	 * @retur \Vmware\Managed\Object\Reference
	 */
	protected function _prepareManagedObjectReference($reference) {
		return  $this->_prepareMessage(
					$this->getServiceContent()->{$reference}()->getType(),
					$this->getServiceContent()->{$reference}()->getValue()
				); 	
	}

	/**
	 * Log out and terminate the current session. 
	 */
	public function logout() {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager')
		);
		$result = $this->getSoapClient()->Logout($soapMessage);
	}
		
	/**
	 * Finds a managed entity based on its location in the inventory.
	 * @param string $path
	 */
	public function findByInventoryPath($path) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SearchIndex'),
			'inventoryPath' => $path,
		);
		$result = $this->getSoapClient()->FindByInventoryPath($soapMessage);
		return $result;	
	}
	
	/**
	 * Finds a virtual machine by its location on a datastore. 
	 * 
	 * @todo not implemented
	 * @param  $datacenter Specifies the datacenter to which the datastore path belongs. 
	 * @param string $path A datastore path to the .vmx file for the virtual machine. 
	 */
	public function findByDatastorePath($datacenter,$path) {
	}

	
	/**
	 * @todo not implemented
	 * Enter description here ...
	 * @param unknown_type $entityId
	 */
	public function queryLicenseUsage($entityId) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('LicenceManager'),
		);
		$result = $this->getSoapClient()->QueryLicenseUsage($soapMessage);
		return $result;	
	}
	
	
	public function createContainerView($container,$type,$recursive = true) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('ViewManager'),
			'container' => $this->_prepareMessage($container->getType(),
				$container->getValue()
			),
			'type' => $type,
			'recursive' => $recursive,
		);
		$result = $this->getSoapClient()->CreateContainerView($soapMessage);
		return $result;		
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param array $specSet
	 * @param Vmware\Data\Object\RetrieveOptions $options
	 */
	public function retrievePropertiesEx($specSet,$options) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('PropertyCollector'),
			'specSet' => $specSet,
			'options' => $options,
		);
		$result = $this->getSoapClient()->RetrievePropertiesEx($soapMessage);
		return $result;			
	}
	
	/**
	 * Creates a local user account
	 * 
	 * @param \Vmware\Host\AccountSpec $user Specification of user being created. 	
	 */
	public function createUser($user) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'user' => $this->_prepareMessage('HostAccountSpec',$user,SOAP_ENC_OBJECT)
		);
		$this->getSoapClient()->CreateUser($soapMessage);
		
		return $this;			
	}
	
	/**
	 * Updates a local user account
	 * 
	 * @param \Vmware\Host\AccountSpec $user Specification of user being updated. 
	 */
	public function updateUser($user) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'user' => $this->_prepareMessage('HostAccountSpec',$user,SOAP_ENC_OBJECT)
		);
		$this->getSoapClient()->UpdateUser($soapMessage);
		
		return $this;		
	}
	
	/**
	 * Removes a local user account
	 * 
	 * @param string $userName User ID of the user account being removed. 	
	 */
	public function removeUser($userName) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'userName' => $userName
		);
		$this->getSoapClient()->RemoveUser($soapMessage);
		
		return $this;			
	}
	
	/**
	 * Assigns a user to a group. 
	 * 
	 * @param string $user User ID of the account whose group membership is being assigned. 
	 * @param string $group Destination group account to which the user is being assigned. 
	 */
	public function assignUserToGroup($user, $group) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'user' 	=> $user,
			'group' => $group
		);
		$this->getSoapClient()->AssignUserToGroup($soapMessage);
		
		return $this;				
	}
	
	/**
	 * Creates a local group account using the parameters defined in the 
	 * HostLocalAccountManagerAccountSpecification data object type.
	 * 
	 * @param \Vmware\Data\Object\Host\AccountSpec $group Specification of group being created. 
	 */
	public function createGroup($group) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'group' => $this->_prepareMessage('HostAccountSpec',$group,SOAP_ENC_OBJECT)
		);
		$this->getSoapClient()->CreateGroup($soapMessage);
		
		return $this;
	}
	
	/**
	 * Removes a local group account. 
	 * 
	 * @param string $userName Group ID of the group account being removed. 	
	 */
	public function removeGroup($groupName) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'groupName' => $groupName
		);
		$this->getSoapClient()->RemoveGroup($soapMessage);
		
		return $this;			
	}
	
	/**
	 * Unassigns a user from a group. 
	 * 
	 * @param string $user User being unassigned from group. 
	 * @param string $group Group from which the user is being removed. 
	 */
	public function unassignUserFromGroup($user, $group) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('HostLocalAccountManager'),
			'user' 	=> $user,
			'group' => $group
		);
		$this->getSoapClient()->UnassignUserFromGroup($soapMessage);
		
		return $this;				
	}
	
	
	/**
	 * Defines one or more permission rules on an entity or updates rules 
	 * if already present for the given user or group on the entity. 
	 * 
	 * @param Reference $entity
	 * @param array $permissions
	 */
	public function setEntityPermissions(Reference $entity, $permissions ) {
		$permissions = array(
			'entity' => $entity,
			'principal' => 'userName',
		);
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('AuthorizationManager'),
			'entity' => $this->_prepareMessage('ManagedEntity',$entity,SOAP_ENC_OBJECT),
		    'permission' => $this->_prepareMessage('Permission',$permissions,SOAP_ENC_OBJECT)
		);
		$result = $this->getSoapClient()->SetEntityPermissions($soapMessage);
			
		return $this;
	}
	
	/**
	 * Creates a new virtual machine in the current folder 
	 * and attaches it to the specified resource pool. 
	 * 
	 * @param VirtualMachineConfigSpec $config
	 * @param ResourcePool $pool
	 * @param HostSystem $host
	 * @return Task
	 */
	public function createVM($config, $pool, $host = null) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('Folder'),
			'config' => $this->_prepareMessage('VirtualMachineConfigSpec',$config,SOAP_ENC_OBJECT),
		    'pool' => $this->_prepareMessage('ResourcePool',$pool,SOAP_ENC_OBJECT),
		    'host' => $this->_prepareMessage('HostSystem',$host,SOAP_ENC_OBJECT),
		);
		$result = $this->getSoapClient()->SetEntityPermissions($soapMessage);
			
		return $result;
	}
	
	
	/**
	 * Returns a list of UserSearchResult objects describing the users 
	 * and groups defined for the server. 
	 * 
	 * @param string $searchStr	Case insensitive substring used to filter results
	 * @param bool $exactMatch	Indicates the searchStr passed should match a user or group name exactly. 
	 * @param bool $findUsers	True, if users should be included in the result. 
	 * @param bool $findGroups	True, if groups should be included in the result. 
	 * @param string $domain	Domain to be searched. If not set, then the method searches the local machine. 
	 * @param string $belongsToGroup	If present, the returned list contains only users or groups that directly belong to the specified group.
	 * @param string $belongsToUser		If present, the returned list contains only groups that directly contain the specified user.
	 * 
	 * @return array \Vmware\Data\Object\User\SearchResult
	 */
	public function retrieveUserGroups($searchStr,$exactMatch=false,$findUsers=true,$findGroups=true,$domain=null,$belongsToGroup=null, $belongsToUser=null) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('UserDirectory'),
			'domain' 		 => $domain,
		    'searchStr' 	 => $searchStr,
		    'belongsToGroup' => $belongsToGroup,
		    'belongsToUser'  => $belongsToUser,
		    'exactMatch' 	 => new \SoapVar($exactMatch,XSD_BOOLEAN),
		    'findUsers'  	 => new \SoapVar($findUsers,XSD_BOOLEAN),
		    'findGroups' 	 => new \SoapVar($findGroups,XSD_BOOLEAN)
		);
		$result = $this->getSoapClient()->RetrieveUserGroups($soapMessage);
		// TODO en cours de reflexion
		$return = array();
		foreach ($result->returnval as $_row) {
			$return[] = new SearchResult($_row);	
		}
		
		return $return;	
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getServiceContent() {
		return $this->_serviceContent;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $type_name
	 * @param string $data
	 * @param string $encoding
	 */
	protected function _prepareMessage($type_name, $data,$encoding= \XSD_STRING) {
		return new \SoapVar($data, $encoding, $type_name); 	
	}
	
	
}