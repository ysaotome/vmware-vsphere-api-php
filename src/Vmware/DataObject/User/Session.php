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
 * Information about a current user session.
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.UserSession.html
 */
class Session extends DynamicData {
	/**
	 * The full name of the user, if available. 
	 * @var string
	 */	
	protected $key;
	/**
	 * The user name represented by this session. 
	 * @var string
	 */	
	protected $userName;
	/**
	 * The full name of the user, if available. 
	 * @var string
	 */
	protected $fullName;
	/**
	 * Timestamp when the user last logged on to the server.  
	 * @var string
	 */
	protected $loginTime;
	/**
	 * Timestamp when the user last executed a command. 
	 * @var string
	 */	
	protected $lastActiveTime;
	/**
	 * The locale for the session used for data formatting and preferred for messages.
	 * @var string
	 */	
	protected $locale;
	/**
	 * The locale used for messages for the session
	 * @var string
	 */	
	protected $messageLocale;

}