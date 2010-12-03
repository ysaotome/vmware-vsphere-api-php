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

use Vmware\Service;
use Vmware\DataObject\Host\AccountSpec;
use Vmware\DataObject\Managed\ObjectReference;
use Vmware\DataObject\ServiceContent;
use Vmware\Soap\Client;

class ServiceTest extends \PHPUnit_Framework_TestCase {
	protected $_soapClient;
	
	protected function setUp() {
	    parent::setUp();
	    static $soapStub = null; // cache the mock object here (or anywhere else)
	    if ($soapStub === null) {
	        $soapStub = $this->getMockFromWsdl(__DIR__.'/Fixtures/vimService.wsdl');
	     }
	   
	    $this->_soapClient = clone $soapStub;
	}
	

	public function testConstructorNoInit() {
		$soapClient = new Client(__DIR__.'/Fixtures/vimService.wsdl');
		$service = new Service($soapClient,false);
		$this->assertAttributeEquals($soapClient, '_soapClient', $service,'Invalid value for the attribute: _soapClient');	
		$this->assertAttributeInstanceOf('\Vmware\Soap\Client', '_soapClient', $service,'Invalid instance for the attribute: _soapClient');
	}
	
	public function testConstructorWithInit() {
		$result = new \stdClass();
        $result->returnval = $this->getMock('\Vmware\DataObject\ServiceContent',array(),array(),'',false);
		// Configure the stub.
		$this->_soapClient->expects($this->any())
						  ->method('retrieveServiceContent')
						  ->will($this->returnValue($result));
		$service = new Service($this->_soapClient);
		$this->assertAttributeEquals($this->_soapClient, '_soapClient', $service,'Invalid value for the attribute: _soapClient');	
		$this->assertInstanceOf('\Vmware\DataObject\ServiceContent', $service->getServiceContent());
	}
	
	public function testConstructorNoInitExcpetion() {
		try {
    		$service = new Service(array());
    	} catch (\Exception $e) {
    		$this->assertStringStartsWith('Argument 1 passed to Vmware\Service::__construct() must be an instance of SoapClient', $e->getMessage());
    	}	
	}
	
	public function testCreateUser() {
		$this->getStubInit();
		$service = new Service($this->_soapClient);
		$type  = $service->getServiceContent()->getAccountManager()->getType();
		$value = $service->getServiceContent()->getAccountManager()->getValue();
		
		$hostAccountSpec = new AccountSpec();
		$hostAccountSpec->setId('userName'); 
		$hostAccountSpec->setPassword('password'); 
		$hostAccountSpec->setDescription("my delegated ad");

		$this->_soapClient->expects($this->any())
             ->method('CreateUser')		
             ->with(
             	array(
             		'_this' => new \SoapVar($value,\XSD_STRING,$type),
             		'user'  =>  new \SoapVar($hostAccountSpec,\SOAP_ENC_OBJECT,'HostAccountSpec')
             	)
             );
		$service->createUser($hostAccountSpec);
		
		$this->assertTrue(true);
	}
	
	protected function getObjectReferencetMock() {
		 $stubObjectReference = $this->getMock('Vmware\DataObject\Managed\ObjectReference',array(),array(),'',false);
		$stubObjectReference->expects($this->at(0))
				->method('__call')
             	->with($this->equalTo('getType'))
             	->will($this->returnValue('HostLocalAccountManager'));
        $stubObjectReference->expects($this->at(1))
        		->method('__call')
             	->with($this->equalTo('getValue'))
             	->will($this->returnValue('ha-localacctmgr'));
		$stubObjectReference->expects($this->at(2))
				->method('__call')
             	->with($this->equalTo('getType'))
             	->will($this->returnValue('HostLocalAccountManager'));
        $stubObjectReference->expects($this->at(3))
        		->method('__call')
             	->with($this->equalTo('getValue'))
             	->will($this->returnValue('ha-localacctmgr'));
             	              	 
    	return $stubObjectReference;         	  		
	}
	
	protected function getStubInit() {
		$result = new \stdClass();
        $result->returnval = $this->getMock('\Vmware\DataObject\ServiceContent',array(),array(),'',false);
		// Configure the stub.
        $result->returnval->expects($this->any())
             ->method('__call')
             ->with($this->equalTo('getAccountManager'))
             ->will($this->returnValue($this->getObjectReferencetMock()));
		$this->_soapClient->expects($this->any())
						  ->method('retrieveServiceContent')
						  ->will($this->returnValue($result));
	}
}