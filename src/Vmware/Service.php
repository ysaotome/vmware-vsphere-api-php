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

use Vmware\DataObject\User\SearchResult;
use Vmware\DataObject\User\Session;
use Vmware\DataObject\ServiceContent as serviceContent;
use Vmware\DataObject\Managed\ObjectReference;

 
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
	public function __construct(\SoapClient $soapClient,$autoInit=true) {
		$this->_soapClient = $soapClient;
		
		if(true === $autoInit) {
			$this->init();
		}
	}
	
	/**
	 * Retrieve ServiceContent
	 */
	public function init() {
		$result = $this->retrieveServiceContent();
		$this->_serviceContent = $result->returnval;
	}
	
	/**
	 * Retrieves the properties of the service instance. 
	 * 
	 * @return array The properties belonging to the service instance, including various object managers.
	 */
	public function retrieveServiceContent() {
		$soapMessage = array('_this' => $this->_prepareMessage("ServiceInstance","ServiceInstance"));
		$result = $this->getSoapClient()->RetrieveServiceContent($soapMessage);
		return $result;
	}
	
	
	/**
	 * Returns the current time on the server. 
	 * 
	 * @return dateTime
	 */
	public function currentTime() {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectServiceInstance(),
		);	
		$result = $this->getSoapClient()->CurrentTime($soapMessage);
		return $result->returnval;		
	}
	
	/**
	 * Investigates the general VMotion compatibility of a virtual machine with a set of hosts.
	 */
	public function queryVMotionCompatibility() {
		throw new \Exception('Deprecated. As of vSphere API 4.0, use QueryVMotionCompatibilityEx_Task instead.');
	}
	
	//
	/**
	 * Component information for bundled products 
	 * @notwork
	 */
	public function retrieveProductComponents() {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectServiceInstance(),
		);	
		$result = $this->getSoapClient()->RetrieveProductComponents($soapMessage);
		return $result;
	}
	
	/**
	 * Checks the validity of a set of proposed migrations.
	 * @throws \Exception
	 * @todo Support multi version ?
	 */
	public function validateMigration() {
		throw new \Exception('Deprecated. As of vSphere API 4.0, use VirtualMachineProvisioningChecker instead.');	
	}
	

	/**
	 * Log on to the server. This method fails if the user name and password are incorrect, 
	 * or if the user is valid but has no permissions granted.
	 *  
	 * @param string $username The ID of the user who is logging on to the server. 
	 * @param string $password The password of the user who is logging on to the server. 
	 * @param string $locale A two-character ISO-639 language ID (like "en")
	 */
	public function login($username, $password, $locale=null) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'userName' => $username,
			'password' => $password,
			'locale' => $locale,
		);
		$result = $this->getSoapClient()->Login($soapMessage);
		
		return new Session($result->returnval);
	}
	
	/**
	 * Log on to the server using SSPI pass-through authentication. 
	 * 
	 * @var string $base64Token The partially formed context returned from InitializeSecurityContext(). 
	 * @var string $locale A two-character ISO-639 language ID (like "en")
	 */
	public function loginBySSPI($base64Token, $locale=nul) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'base64Token' => $base64Token,
			'locale' => $locale,
		);
		$result = $this->getSoapClient()->LoginBySSPI($soapMessage);
		
		return new Session($result->returnval);	
	}
	
	/**
	 * Creates a special privileged session that includes the Sessions.
	 * 
	 * @var string $extensionKey Key of extension that is logging in. 
	 * @var string $locale A two-character ISO-639 language ID (like "en")
	 */
	public function loginExtensionByCertificate($extensionKey, $locale=nul) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'extensionKey' => $extensionKey,
			'locale' => $locale,
		);
		$result = $this->getSoapClient()->LoginExtensionByCertificate($soapMessage);
		
		return new Session($result->returnval);	
	}	
	
	/**
	 * Creates a special privileged session that includes the Sessions
	 * 
	 * @var string $extensionKey Key of extension that is logging in. 
	 * @var string $locale A two-character ISO-639 language ID (like "en")
	 */
	public function loginExtensionBySubjectName($extensionKey, $locale=nul) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'extensionKey' => $extensionKey,
			'locale' => $locale,
		);
		$result = $this->getSoapClient()->LoginExtensionBySubjectName($soapMessage);
		
		return new Session($result->returnval);	
	}		
	
	/**
	 * Log out and terminate the current session. 
	 */
	public function logout() {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager')
		);
		$this->getSoapClient()->Logout($soapMessage);
	}
	
	/**
	 * Validates that a currently-active session exists with the specified 
	 * sessionID and userName associated with it
	 * 
	 * @param string $sessionID	Session ID to validate. 
	 * @param string $userName	User name to validate. 
	 * @return bool
	 */
	public function sessionIsActive($sessionID, $userName) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'sessionID' => $sessionID,
			'userName'  => $userName,
		);
		$result = $this->getSoapClient()->SessionIsActive($soapMessage);
		
		return $result->returnval;		
	}
	/**
	 * Sets the session locale. 
	 * 
	 * @param string $locale A two-character ISO-639 language ID (like "en") 
	 */
	public function setLocale($locale) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'locale' => $locale,
		);
		$result = $this->getSoapClient()->SetLocale($soapMessage);
	}
	
	/**
	 * Log off and terminate the provided list of sessions. 
	 * 
	 * @param string[] $sessionId
	 * @todo a tester...
	 */
	public function terminateSession($sessionId) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'sessionId' => $sessionId,
		);
		$result = $this->getSoapClient()->TerminateSession($soapMessage);		
	}
	
	/**
	 * Updates the system global message
	 * 
	 * @param string $message The message to send. Newline characters may be included. 
	 */
	public function updateServiceMessage($message) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('SessionManager'),
			'message' => $message,
		);
		$result = $this->getSoapClient()->UpdateServiceMessage($soapMessage);		
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
			'_this' => $this->_prepareManagedObjectReference('AccountManager'),
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
	 * @param ObjectReference $entity
	 * @param array $permissions
	 */
	public function setEntityPermissions( $entity,  $permissions ) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('AuthorizationManager'),
			'entity' => $this->_prepareMessage($entity->getType(),$entity->getValue()),	
		    'permission' => $this->_prepareMessage('Permission',$permissions,SOAP_ENC_OBJECT),
		);
		$result = $this->getSoapClient()->SetEntityPermissions($soapMessage);
			
		return $this;
	}
	
	/**
	 * Finds all permissions defined in the system. 
	 * The result is restricted to the managed entities visible to the user making the call. 
	 * 
	 * @return array
	 */
	public function retrieveAllPermissions() {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('AuthorizationManager'),
		);
		$result = $this->getSoapClient()->RetrieveAllPermissions($soapMessage);
			
		return $result;	
	}
	
	/**
	 * Gets permissions defined on or effective on a managed entity
	 * 
	 * @param Vmware\DataObject\Managed\ObjectReference  $entity
	 * @param bool $inherited
	 * 
	 * @return array;
	 */
	public function retrieveEntityPermissions($entity,$inherited = false) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('AuthorizationManager'),
			'entity' => $this->_prepareManagedObjectReference($entity),
			'inherited' 	 => new \SoapVar($inherited,XSD_BOOLEAN),
		);
		$result = $this->getSoapClient()->RetrieveEntityPermissions($soapMessage);
			
		return $result;		
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
		    'pool' => $this->_prepareMessage($pool->getType(),$pool->getValue()),	
		    'host' => $this->_prepareMessage($host->getType(),$host->getValue()),	
		);
		$result = $this->getSoapClient()->createVM_Task($soapMessage);
			
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
		// We use SoapClient 'classmap'
		return $result;	
	}
	
	/**
	 * Retrieves the specified properties of the specified managed objects. 
	 */
	public function retrieveProperties($specSet) {
		$soapMessage = array(
			'_this' => $this->_prepareManagedObjectReference('PropertyCollector'),
			'specSet'	=> $this->_prepareMessage('PropertyFilterSpec',$specSet,SOAP_ENC_OBJECT),
		);	
		$result = $this->getSoapClient()->RetrieveProperties($soapMessage);
		// We use SoapClient 'classmap'
		return $result;		
	}

	
	/**
	 * Return ServiceContent Instance
	 */
	public function getServiceContent() {
		return $this->_serviceContent;
	}

	/**
	 * Return SoapClient Instance
	 * 
	 * @return Vmware\Client
	 */
	public function getSoapClient() {
		return $this->_soapClient;
	}
		
	/**
	 * Return Formated data
	 * 
	 * @param string $type_name
	 * @param string $data
	 * @param string $encoding
	 */
	protected function _prepareMessage($type_name, $data,$encoding= \XSD_STRING) {
		return new \SoapVar($data, $encoding, $type_name); 	
	}
	
	/**
	 * 
	 * @param string $reference
	 * @retur \Vmware\Managed\Object\Reference
	 */
	protected function _prepareManagedObjectReference($reference) {
		return  $this->_prepareMessage(
					$this->getServiceContent()->{'get'.$reference}()->getType(),
					$this->getServiceContent()->{'get'.$reference}()->getValue()
				); 	
	}	
	
	protected function _prepareManagedObjectServiceInstance() {
		return $this->_prepareMessage("ServiceInstance","ServiceInstance");	
	}
}