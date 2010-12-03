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
	
	/**
	 * 
	 * Enter description here ...
	 * 
	 * @return array
	 */
	public static function soapMap () {
		$reader = new \Doctrine\Common\Annotations\AnnotationReader(
		    new \Doctrine\Common\Cache\ArrayCache(),
		    new \Doctrine\Common\Annotations\Parser()
		);
		
		$reader->setAutoloadAnnotations(true);
		$reader->setDefaultAnnotationNamespace('Vmware\\Annotations\\');

		$return = array();
		$srcDir = __DIR__.'/DataObject/';
		$prefix = '\Vmware\DataObject\\';
		
		foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($srcDir, \FilesystemIterator::SKIP_DOTS)) as $file) {
			if (!$file->isFile() || '.php' !== substr($file->getFilename(), -4)) {
                continue;
            }
			$namespace = $prefix.str_replace(array($srcDir,'/','.php'), array('','\\',''), $file->getPathname());
			
			$reflClass = new \ReflectionClass($namespace);
			
			$classAnnotations = $reader->getClassAnnotations($reflClass);
			foreach ($classAnnotations as $object) {
				$return[$object->soap] = $namespace;	
			}
		}
		
		return $return;
	}
	
}