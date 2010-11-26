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

use Vmware\DataObject\Event as baseEvent;

class HostEvent extends baseEvent {

	/**
	 * The host object. 
	 * @var Vmware\DataObject\Managed\ObjectReference
	 */	
	protected $host;
}