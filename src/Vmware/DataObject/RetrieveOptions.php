<?php
namespace Vmware\DataObject;

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * 
 * Enter description here ...
 * @author nicolasfabre
 * @since 4.1
 */
class RetrieveOptions extends DynamicData {
	/**
	 * The maximum number of ObjectContent data objects that should 
	 * be returned in a single result from RetrievePropertiesEx.
	 * @var int
	 */
	protected $maxObjects;
}
	