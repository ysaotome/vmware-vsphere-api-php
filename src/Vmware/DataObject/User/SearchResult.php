<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\User;

use Vmware\DataObject\DynamicData;
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
}