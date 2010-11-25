<?php
namespace Vmware\Data\Object\Host;

use Vmware\Data\Object\DynamicData;

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