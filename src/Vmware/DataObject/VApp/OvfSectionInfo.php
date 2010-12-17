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
 * The OvfSection encapsulates uninterpreted meta-data sections in an OVF descriptor.
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.OvfSectionInfo.html
 * @since vSphere API 4.0
 */
class OvfSectionInfo extends DynamicData {
	/**
	 * A unique key to identify a section. 
	 * @var int
	 */
	protected $key;	
	/**
	 * The namespace for the value in xsi:type attribute. 
	 * @var string
	 */
	protected $namespace;	
	/**
	 * The value of the xsi:type attribute not including the namespace prefix. 
	 * @var string
	 */
	protected $type;	
	/**
	 * Whether this is a global envelope section 
	 * @var boolean
	 */
	protected $atEnvelopeLevel;	
	/**
	 * The XML fragment including the top-level <Section...> element. 
	 * @var string
	 */
	protected $contents;	
}