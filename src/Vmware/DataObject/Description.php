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

/**
 * Static strings used for describing an object or property.  
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.Description.html
 *
 */
class Description extends DynamicData {
	/**
	 * Display label.
	 * @var string
	 */
	protected $label;
	/**
	 * Summary description. 
	 * @var string
	 */
	protected $summary;
}