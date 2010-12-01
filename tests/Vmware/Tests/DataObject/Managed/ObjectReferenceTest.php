<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\Tests\DataObject\Managed;

use Vmware\DataObject\Managed\ObjectReference;

/**
 * ObjectReference test case.
 */
class ObjectReferenceTest extends \PHPUnit_Framework_TestCase {
	
	public function testConstructor() {
		$std = $this->_initStd();
		$objectRef = new ObjectReference($std);
		
		$this->assertAttributeEquals($std->type, 'type', $objectRef,'Invalid value for the attribute: type');
		$this->assertAttributeEquals($std->value, 'value', $objectRef,'Invalid value for the attribute: value');
    }
    
    public function testConstructorNoStdClass() {
    	try {
    		$aStd = array('type','value');
    		$objectRef = new ObjectReference($aStd);	
    	} catch (\Exception $e) {
    		$this->assertStringStartsWith('ReflectionObject::__construct() expects parameter 1 to be object', $e->getMessage());
    	}
    }
    
    public function testConstructorReMap() {
    	$std = new \stdClass();
		$std->type ='type1';
		$std->_ ='value1';
		$objectRef = new ObjectReference($std);
		
		$this->assertAttributeEquals($std->type, 'type', $objectRef,'Invalid value for the attribute: type');
		$this->assertAttributeEquals($std->_, 'value', $objectRef,'Invalid value for the attribute: value');	
    }
    
    public function testGetter() {
		$std = $this->_initStd();
		$objectRef = new ObjectReference($std);
		
		$this->assertEquals($std->type, $objectRef->getType());
		$this->assertEquals($std->value, $objectRef->getValue());
    }
    
	public function testSetter() {
		$std = $this->_initStd();
		$objectRef = new ObjectReference();
		
		$objectRef->setType($std->type);
		$objectRef->setValue($std->value);
		$this->assertAttributeEquals($std->type, 'type', $objectRef,'Invalid value for the attribute: type');
		$this->assertAttributeEquals($std->value, 'value', $objectRef,'Invalid value for the attribute: value');	
    }
    
    public function testGetterSetterException() {
    	$std = $this->_initStd();
		$objectRef = new ObjectReference($std);

		try {
			$objectRef->getFoo();	
		} catch (\InvalidArgumentException $e) {
			$this->assertStringStartsWith('Invalid Argument', $e->getMessage());
			try {
				$objectRef->unsType();	
			} catch (\BadMethodCallException $e) {
				$this->assertStringStartsWith('Invalid Method', $e->getMessage());		
			}
		}
    }
    
    
    protected function _initStd()  {
    	$std = new \stdClass();
		$std->type ='type1';
		$std->value ='value1';
		return $std;
    }
    
    
}

