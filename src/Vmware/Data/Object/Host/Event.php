<?php
namespace Vmware\Data\Object\Host;

use Vmware\Data\Object\Event as baseEvent;

class Event extends baseEvent {

	/**
	 * The host object. 
	 * @var Vmware\Data\Object\Host\Reference
	 */	
	protected $host;
}