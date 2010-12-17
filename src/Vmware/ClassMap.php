<?php

/*
 * This file is part of the Vmware package.
 *
 * (c) Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vmware;

/**
 * 
 * Enter description here ...
 * @author Nicolas Fabre <nicolas.fabre@gmail.com>
 *
 */
class ClassMap {
	const NS_PREFIX = '\Vmware\DataObject\\';
	const DATA_OBJECT_DIR = '/DataObject/';
	
	protected static $_exclude = array('User\Session','DynamicData');
	
	protected static $classMap = null;
	
	/**
	 * 
	 * @return array
	 */
	public static function soapMap () {
		if(is_null(self::$classMap)) {
			$return = array();
			$srcDir = __DIR__.self::DATA_OBJECT_DIR;
			foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($srcDir, \FilesystemIterator::SKIP_DOTS)) as $file) {
				if (!$file->isFile() || '.php' !== substr($file->getFilename(), -4)) {
	                continue;
	            }
				$tmp = str_replace(array($srcDir,'.php'), '', $file->getPathname());
				$soapClass = str_replace('/', '', $tmp);
				$namespace = str_replace('/','\\',self::NS_PREFIX.$tmp);
				if(in_array(str_replace(self::NS_PREFIX,'',$namespace),self::$_exclude) === false) {
					$return[$soapClass] = $namespace;	
				}
			}
			self::$classMap = $return;
		}
		
		return self::$classMap;
	}
	
}