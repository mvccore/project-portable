<?php

	// do not use composer autoload for packing multiprocess, include Packager library directly:
	include_once('vendor/mvccore/packager/src/Packager/Php.php');


	// to pack PHP scripts, templates and all static files (CSS/JS/images and fonts),
	// use this config bellow:
	include_once('.packager/config-php-with-composer-strict-package.php');


	// to pack PHP scripts and templates but without any static files,
	// use this config bellow and follow copying instructions inside:
	//include_once('.packager/config-php-with-composer-preserve-package.php');


	// to pack PHP scripts and templates but without any static files,
	// use this config bellow and follow copying instructions inside:
	//include_once('.packager/config-php-with-composer-preserve-hdd.php');


	// to pack only PHP scripts without any static files and any templates,
	// use this config bellow and follow copying instructions inside:
	//include_once('.packager/config-php-with-composer-strict-hdd.php');


	Packager_Php::Create($config)
		
		// set php functions wrapper type:
		->SetPhpFileSystemMode($phpFileSystemMode)
		
		// print files to pack by previous $config array and exit:
		//->PrintFilesToPack()
		
		// name original PHP filesystem functions implemented by packager wrapper:
		//->KeepPhpFunctions('DirectoryIterator')
		
		// run packing multiprocess:
		->Run();