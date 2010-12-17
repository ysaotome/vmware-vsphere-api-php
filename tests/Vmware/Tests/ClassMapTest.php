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
		$return = ClassMap::soapMap();
		$this->assertType('array', $return,'classMap::soapMap doesnt return array');
	}
	
	/**
     * @dataProvider keyProvider
     */
	public function testSoapMapKeyReturn($key) {
		$return = ClassMap::soapMap();
		$this->assertArrayHasKey($key, $return,'classMap::soapMap doesnt map correctly');	
	}
	
	/**
     * @dataProvider valueProvider
     */
	public function testSoapMapValueReturn($value) {
		$return = ClassMap::soapMap();
		$this->assertTrue(in_array($value,$return),'classMap::soapMap doesnt map correctly');	
	}	
	
	public static function keyProvider() {
		$classMapKeyExpected = array(
			'HostAccountSpec' ,
			'Permission' 	,
			'UserSearchResult',
			'ManagedObjectReference' ,
			'AboutInfo' 			,
			'ServiceContent',
		);
		return array($classMapKeyExpected);
	}
	
	public static function valueProvider() {
		$classMapValueExpected = array(
				'\Vmware\DataObject\Host\AccountSpec',
				'\Vmware\DataObject\Permission',
				'\Vmware\DataObject\User\SearchResult',
				'\Vmware\DataObject\Managed\ObjectReference',
				'\Vmware\DataObject\AboutInfo',
				'\Vmware\DataObject\ServiceContent',
			);
	return array($classMapValueExpected);
	}		
}