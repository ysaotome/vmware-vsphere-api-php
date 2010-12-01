<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\Tests\DataObject\Host;

use Vmware\DataObject\Host\AccountSpec;

/**
 * ObjectReference test case.
 */
class AccountSpecTest extends \PHPUnit_Framework_TestCase {
	public function testConstructor() {
		$std = $this->_initStd();
		$account = new AccountSpec($std);
		
		$this->assertAttributeEquals($std->id, 'id', $account,'Invalid value for the attribute: id');
		$this->assertAttributeEquals($std->password, 'password', $account,'Invalid value for the attribute: password');
		$this->assertAttributeEquals($std->description, 'description', $account,'Invalid value for the attribute: description');
	}	
	
    protected function _initStd()  {
    	$std = new \stdClass();
		$std->id ='id1';
		$std->password ='password1';
		$std->description ='description1';
		return $std;
    }
}