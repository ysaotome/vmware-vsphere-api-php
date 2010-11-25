<?php
namespace Vmware\Data\Object;

use Vmware\Data\Object\DynamicData;

class Event extends DynamicData {
	/**
	 * The parent or group ID. 
	 * @var int
	 */
	protected $chainId;
	/**
	 * The user entered tag to identify the operations and their side effects 
	 * @var string
	 */
	protected $changeTag;
	/**
	 * The ComputeResource object of the event. 
	 * @var Vmware\ComputeResource\Event\Argument  
	 */
	protected $computeResource;
	/**
	 * The time the event was created. 
	 * @var \DateTime
	 */
	protected $createdTime;
	/**
	 * The Datacenter object of the event. 
	 * @var Vmware\Datacenter\Event\Argument  
	 */
	protected $datacenter;
	/**
	 * The Datastore object of the event. 
	 * @var Vmware\Datastore\Event\Argument 
	 */
	protected $ds;
	/**
	 * The DistributedVirtualSwitch object of the event. 
	 * @var Vmware\Dvs\Event\Argument 
	 */
	protected $dvs;
	/**
	 * A formatted text message describing the event. The message may be localized. 
	 * @var string
	 */
	protected $fullFormattedMessage;
	/**
	 * The Host object of the event. 
	 * @var Vmware\Host\Event\Argument  
	 */
	protected $host;
	/**
	 * The event ID
	 * @var int
	 */
	protected $key;
	/**
	 * The Network object of the event. 
	 * @var Vmware\Network\Event\Argument
	 */
	protected $net;
	/**
	 * The user who caused the event
	 * @var string
	 */
	protected $userName;
	/**
	 * The VirtualMachine object of the event.
	 * @var Vmware\Vm\Event\Argument 
	 */
	protected $vm;
}