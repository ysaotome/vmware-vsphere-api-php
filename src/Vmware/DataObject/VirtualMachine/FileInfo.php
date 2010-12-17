<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware\DataObject\VirtualMachine;

use \Vmware\DataObject\DynamicData;

class FileInfo extends DynamicData {
	/**
	 * Path name to the configuration file for the virtual machine, e.g., the .vmx file.
	 * @var string
	 */
	protected $vmPathName;
	/**
	 * Path name of the directory that typically holds suspend, redo, 
	 * or snapshot files belonging to the virtual machine.
	 * @var string
	 */
	protected $snapshotDirectory;
	/**
	 * Some products allow the suspend directory to be different than the snapshot directory.
	 * @var string
	 */
	protected $suspendDirectory;
	/**
	 * Directory to store the log files for the virtual machine.
	 * @var string
	 */
	protected $logDirectory;
}