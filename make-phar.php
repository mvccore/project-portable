<?php

	// include Packager library by composer autoload (you can do it only for PHAR packing):
	include_once('vendor/autoload.php');
	

	// include basic configuration for PHAR packing:
	include_once('.packager/config-phar.php');

	
	Packager_Phar::Create($config)
	
		// print files to pack by previous $config array and exit:
		//->PrintFilesToPack()
		
		// run packing multiprocess:
		->Run();