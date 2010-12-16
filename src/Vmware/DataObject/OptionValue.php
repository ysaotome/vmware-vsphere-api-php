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

use \Vmware\DataObject\DynamicData;

/**
 * Describes the key/value pair of a configured option.
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.option.OptionValue.html
 */
class OptionValue extends DynamicData {
	/**
	 * The name of the option using dot notation to reflect the option's position in a hierarchy
	 * @var string
	 * @example "Ethernet"
	 */
	protected $key;
	/**
	 * The value of the option.	
	 * @var mixed (String or Integer)
	 */
	protected $value;
}