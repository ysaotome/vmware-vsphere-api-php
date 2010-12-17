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
 * Information that describes what product a vApp contains, e.g., 
 * what software that is installed in the contained virtual machines. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.ProductInfo.html
 * @since vSphere API 4.0
 */
class ProductInfo extends DynamicData {
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
	 * Name of the product.
	 * @var string
	 */	
	protected $name;
	/**
	 * Vendor of the product. 
	 * @var string
	 */	
	protected $vendor;
	/**
	 * Short version of the product
	 * @var string
	 * @example "1.0"
	 */	
	protected $version;
	/**
	 * Full-version of the product
	 * @var string
	 * @example "1.0-build 12323"
	 */	
	protected $fullVersion;
	/**
	 * URL to vendor homepage. 
	 * @var string
	 */	
	protected $vendorUrl;
	/**
	 * URL to product homepage. 
	 * @var string
	 */	
	protected $productUrl;
	/**
	 * URL to entry-point for application.
	 * @var string
	 */	
	protected $appUrl;
}