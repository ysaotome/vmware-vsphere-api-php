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
 * The SelectionSpec is the base type for data object types that specify 
 * what additional objects to filter. The base type contains only an 
 * optional "name" field, which allows a selection to be named for 
 * future reference. More information is available in the subtype. 
 *
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vmodl.query.PropertyCollector.SelectionSpec.html
 *
 */
class SelectionSpec extends DynamicData {
	/**
	 * Name of the selection specification
	 * @var string
	 */
	protected $name;
}