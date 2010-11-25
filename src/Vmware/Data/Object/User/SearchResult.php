<?php
namespace Vmware\Data\Object\User;

use Vmware\Data\Object\DynamicData;
/**
 * When searching for users, the search results in some additional information. 
 * This object describes the additional information. 
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 */
class SearchResult extends DynamicData {
	/**
	 * Login name of a user or the name of a group. 
	 * This key is the user within the searched domain.
	 * @var string
	 */
	protected $principal;
	
	/**
	 * Full name of the user found by the search, or the description of a group, if available. 
	 * @var string
	 */
	protected $fullName;
	
	/**
	 * If this is true, then the result is a group. If this is false, then the result is a user. 
	 * @var boolean
	 */
	protected $group;
	
	public function __construct($data) {
		$this->principal = $data->principal;
		$this->fullName  = $data->fullName;
		$this->group 	 = $data->group;
	}
}