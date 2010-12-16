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
 * This data object type describes system information including the name, type, version, and build number. 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk41pubs/ApiReference/vim.AboutInfo.html
 *
 */
class AboutInfo extends DynamicData {
	/**
	 * Short form of the product name. 
	 * @var string
	 */
	protected $name;
	/**
	 * The complete product name, including the version information. 
	 * @var string
	 */
	protected $fullName;
	/**
	 * The complete product name, including the version information. 
	 * @var string
	 */
	protected $vendor;
	/**
	 * Dot-separated version string.
	 * @var string
	 * @example "1.2"
	 */
	protected $version;
	/**
	 * Build string for the server on which this call is made. 
	 * This string does not apply to the API. 
	 * @var string
	 * @example "x.y.z-num"
	 */
	protected $build;
	/**
	 * Version of the message catalog for the current session's locale. 
	 * @var string
	 */
	protected $localeVersion;
	/**
	 * Build number for the current session's locale. 
	 * Typically, this is a small number reflecting a localization 
	 * change from the normal product build. 
	 * @var string
	 */
	protected $localeBuild;
	/**
	 * Operating system type and architecture. 
	 * @var string
	 * @exemple "win32-x86", "linux-x86"
	 */	
	protected $osType;
	/**
	 * The product ID is a unique identifier for a product line. 
	 * @var string
	 * @example "gsx","esx","vpx"
	 */
	protected $productLineId;
	/**
	 * Indicates whether or not the service instance represents a standalone host. 
	 * @var string
	 */
	protected $apiType;
	/**
	 * The version of the API as a dot-separated string.
	 * @var string
	 * @example "1.0.0"
	 */	
	protected $apiVersion;
	/**
	 * A globally unique identifier associated with this service instance. 
	 * @var string
	 * @since vSphere API 4.0
	 */
	protected $instanceUuid;
	/**
	 * The license product name 
	 * @var string
	 * @since vSphere API 4.0
	 */
	protected $licenseProductName;
	/**
	 * The license product version 
	 * @var string
	 * @since vSphere API 4.0
	 */	
	protected $licenseProductVersion;
}