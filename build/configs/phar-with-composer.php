<?php

$config = [
	'sourcesDir'			=> __DIR__ . '/../../development',
	'releaseDir'			=> __DIR__ . '/../../release',
	// define statically copied files and folders (exclude patterns doesn't exclude anything from static copies):
	'staticCopies'				=> [
		'/.htaccess',			'/web.config',
	],
	// do not include script or file, where it's relative path from sourceDir match any of these rules:
	'excludePatterns'		=> [

		// Common excludes for every MvcCore app using composer:
		"#/\.#",										// Everything started with '.' (.git, .htaccess ...)
		"#^/web\.config#",								// Microsoft IIS .rewrite rules
		"#^/Var/Logs/.*#",								// App development logs
		"#(composer|installed)\.((dev\.)?)(json|lock)#",// composer.json, installed.json, composer.lock, ...
		"#LICEN(C|S)E(\.(txt|md))?#i",					// libraries licence files
		"#\.(bak|bat|cmd|sh|md|phpt|neon|dummy|phpproj|phpproj\.user)$#i",

		// Exclude specific PHP libraries
		"#^/vendor/tracy/.*#",							// - tracy library (https://tracy.nette.org/)
		"#^/vendor/tracy/tracy/(.*)/assets/#",			//   excluded everything except statically
		"#^/vendor/tracy/tracy/tools/#",				//   loaded PHP scripts by composer - added later
		"#^/vendor/mvccore/ext-debug-tracy.*#",			// - mvccore tracy adapter and all tracy panel extensions
		"#^/vendor/bin/.*#",							// CLI tools
		"#^/vendor/tedivm/.*#",							// JS minify library
		"#^/vendor/tubalmartin/.*#",					// CSS minify library

		// Exclude source css and js files, use only what is generated in '/Var/Tmp' dir
		"#^/static/js#",
		"#^/static/css#",
	],
	// include all scripts or files, where it's relative path from sourceDir match any of these rules:
	// (include paterns always overrides exclude patterns)
	'includePatterns'		=> [
		// add statically included tracy file back again and override it's exclusion,
		// to run composer at application start properly, but this file will not be used.
		"#^/vendor/tracy/tracy/src/shortcuts.php#",
	],
	// process simple strings replacements on all read PHP scripts before saving into result package:
	// (replacements are executed before configured minification in RAM, they don't affect anything on hard drive)
	'stringReplacements'	=> [
		// Switch \MvcCore application back from SFU mode to automatic compile mode detection
		'->SetCompiled(\MvcCore\Application::COMPILED_SFU)'	=> '',
		// Remove tracy debug library:
		"class_exists('\MvcCore\Ext\Debugs\Tracy')"			=> 'FALSE',
	],
	'minifyTemplates'		=> 1,// Remove non-conditional comments and white spaces
	'minifyPhp'				=> 1,// Remove comments and white spaces
];
