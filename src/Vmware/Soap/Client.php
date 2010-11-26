<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\Soap;

/**
 * Remove "xsi:" prefix
 * 
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 */
class Client extends \SoapClient {

	/**
	 * Performs SOAP request over HTTP.
	 * 
	 * @see http://geauxvirtual.wordpress.com/2010/10/07/using-php5-soap-with-vsphere-api/
	 * 
	 * @param string $request The XML SOAP request.
	 * @param string $location The URL to request.
	 * @param string $action The SOAP action.
	 * @param int $version The SOAP version.
	 * @param int $one_way If one_way is set to 1, this method returns nothing. Use this where a response is not expected.
	 * 
	 * @return string The XML SOAP response
	 */
	public function __doRequest($request,$location,$action, $version, $one_way=0) {
		/**
		 * PHP5 SOAP function sets the type of the SOAP message as “xsi:type”.  
		 * The vSphere API expects a type of just “type”
		 */
        $request = str_replace("xsi:", "", $request);
        
		return parent::__doRequest($request, $location, $action, $version);	
	}
}