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

use Vmware\DataObject\ArrayUpdateSpec;

/**
 * An incremental update to the Product information list.  
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.ProductSpec.html
 * @since vSphere API 4.0
 */
class ProductSpec extends ArrayUpdateSpec {
	/**
	 * @var \Vmware\DataObject\VApp\ProductInfo
	 */
	protected $info;
}