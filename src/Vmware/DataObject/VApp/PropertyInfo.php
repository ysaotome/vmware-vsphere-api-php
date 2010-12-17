<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\VApp;

use Vmware\DataObject\DynamicData;

/**
 * A vApp Property description, including deployment values 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.PropertyInfo.html
 * @since vSphere API 4.0
 */
class PropertyInfo extends DynamicData {
	/**
	 * A unqique key for the product section 
	 * @var int
	 */
	protected $key;
	/**
	 * class name for this attribute 
	 * @var string
	 */
	protected $classId;
	/**
	 * class name for this attribute 
	 * @var string
	 */	
	protected $instanceId;
	/**
	 * Name of property.
	 * @var string
	 */	
	protected $id;
	/**
	 * A user-visible description the category the property belongs to. 
	 * @var string
	 */	
	protected $category;
	/**
	 * The display name for the property. 
	 * @var string
	 */	
	protected $label;
	/**
	 * Describes the valid format of the property. 
	 * @var string
	 */	
	protected $type;
	/**
	 * Whether the property is user-configurable or a system property. 
	 * @var boolean
	 */	
	protected $userConfigurable;
	/**
	 * This either contains the default value of a field (used if value is empty string), 
	 * or the expression if the type is "expression"
	 * @var string
	 */	
	protected $defaultValue;
	/**
	 * The value of the field at deployment time.
	 * @var string
	 */	
	protected $value;
	/**
	 * A description of the field. 
	 * @var string
	 */
	protected $description;
}