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
 * The IPAssignmentInfo class specifies how the guest software gets configured with IP addresses, 
 * including protocol type (IPv4 or IPv6) and the life-time of those IP addresses. 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.vApp.IPAssignmentInfo.html
 * @since vSphere API 4.0
 */
class IPAssignmentInfo extends DynamicData {
	/**
	 * Specifies the IP allocation schemes supported by the guest software. 
	 * @var string[]
	 */
	protected $supportedAllocationScheme = array();
	/**
	 * Specifies how IP allocation should be managed by the VI platform.
	 * Enter description here ...
	 * @var string
	 */
	protected $ipAllocationPolicy;
	/**
	 * Specifies the IP protocols supported by the guest software. 
	 * @var string[]
	 */
	protected $supportedIpProtocol = array();
	/**
	 * Specifies the chosen IP protocol for this deployment.
	 * @var string
	 */
	protected $ipProtocol;
	/**
	 * @param string $supportedAllocationScheme
	 */
	public function addSupportedAllocationScheme($supportedAllocationScheme) {
		array_push($this->supportedAllocationScheme,$supportedAllocationScheme);
		return $this;
	}
	/**
	 * @param string $supportedIpProtocol
	 */
	public function addSupportedIpProtocol($supportedIpProtocol) {
		array_push($this->supportedIpProtocol,$supportedIpProtocol);
		return $this;
	}
}