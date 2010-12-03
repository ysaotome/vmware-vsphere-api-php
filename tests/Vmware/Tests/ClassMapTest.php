<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\Tests;


use Vmware\ClassMap;

class ClassMapTest  extends \PHPUnit_Framework_TestCase {
	
	public function testSoapMapReturn() {
		$classMapExpected = array(
			'HostAccountSpec'  => 'Vmware\DataObject\Host\AccountSpec',
			'Permission' 	   => 'Vmware\DataObject\Permission',
			'UserSearchResult' => 'Vmware\DataObject\User\SearchResult',
			'ManagedObjectReference' 	=> 'Vmware\DataObject\Managed\ObjectReference',
			'AboutInfo' 				=> 'Vmware\DataObject\AboutInfo',
			'ServiceContent' 			=> 'Vmware\DataObject\ServiceContent',
		);
		
		$return = ClassMap::soapMap();
		var_dump($return);
		$this->assertType('array', $return,'classMap::soapMap doesnt return array');
	}
	
}