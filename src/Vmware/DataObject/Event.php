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

use Vmware\DataObject\DynamicData;
/**
 * This event is the base data object type from which all events inherit.
 * 
 * @author nicolasfabre
 * @see http://www.vmware.com/support/developer/vc-sdk/visdk400pubs/ReferenceGuide/vim.event.Event.html
 */
class Event extends DynamicData {
	/**
	 * The event ID
	 * @var int
	 */
	protected $key;
	
	/**
	 * The parent or group ID. 
	 * @var int
	 */
	protected $chainId;
	
	/**
	 * The time the event was created. 
	 * @var \DateTime
	 */
	protected $createdTime;
	
	/**
	 * The user who caused the event
	 * @var string
	 */
	protected $userName;
	
	/**
	 * The Datacenter object of the event. 
	 * @var Vmware\DataObject\Datacenter\EventArgument  
	 */
	protected $datacenter;	
	
	/**
	 * The ComputeResource object of the event. 
	 * @var Vmware\DataObject\ComputeResource\EventArgument  
	 */
	protected $computeResource;
		
	/**
	 * The Host object of the event. 
	 * @var Vmware\DataObject\Host\EventArgument  
	 */
	protected $host;
	
	/**
	 * The VirtualMachine object of the event.
	 * @var Vmware\DataObject\Vm\EventArgument 
	 */
	protected $vm;
	
	/**
	 * The Datastore object of the event. 
	 * @var Vmware\DataObject\Datastore\EventArgument 
	 */
	protected $ds;
	
	/**
	 * The Network object of the event. 
	 * @var Vmware\DataObject\Network\EventArgument
	 */
	protected $net;
	
	/**
	 * The DistributedVirtualSwitch object of the event. 
	 * @var Vmware\DataObject\Dvs\EventArgument 
	 */
	protected $dvs;
	
	/**
	 * A formatted text message describing the event. The message may be localized. 
	 * @var string
	 */
	protected $fullFormattedMessage;

	/**
	 * The user entered tag to identify the operations and their side effects 
	 * @var string
	 */
	protected $changeTag;
}