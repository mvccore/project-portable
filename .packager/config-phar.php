<?php

$config = array(
	'sourcesDir'			=> __DIR__ . '/../development',
	'releaseFile'			=> __DIR__ . '/../release/index.php',
	// do not include script or file, where it's relative path from sourceDir match any of these rules:
	'excludePatterns'		=> array(
		
		// Common excludes for every MvcCore app using composer:
		"/\.",											// Everything started with '.' (.git, .htaccess ...)
		"^/web\.config",								// Microsoft IIS .rewrite rules
		"^/Var/Logs/.*",								// App development logs
		"composer\.(json|lock)",						// composer.json and composer.lock
		"composer/installed\.json",						// composer installed json
		"(LICEN(C|S)E\.(txt|TXT|md|MD))|(LICEN(C|S)E)",	// libraries licence files
		"\.(bak|BAK`bat|BAT|md|MD|phpt|PHPT)$",

		// Exclude specific PHP libraries
		"^/vendor/tracy/.*",							// - tracy library (https://tracy.nette.org/)
		"^/vendor/tracy/tracy/(.*)/assets/",			//   excluded everything except staticly
		"^/vendor/tracy/tracy/tools/",					//   loaded PHP scripts by composer - added later
		"^/vendor/mvccore/ext-tracy.*",					// - mvccore tracy adapter and all tracy panel extensions
		"^/vendor/mrclay/.*",							// HTML/JS/CSS minify library

		// Exclude source css and js files, use only what is generated in '/Var/Tmp' dir
		"^/static/js",
		"^/static/css",
		"^/static/fonts/(.*)\.css$",
	),
	// include all scripts or files, where it's relative path from sourceDir match any of these rules:
	// (include paterns always overides exclude patterns)
	'includePatterns'		=> array(
		// add staticly included tracy file back again and override it's exclusion,
		// to run composer at application start properly, but this file will not be used.
		"^/vendor/tracy/tracy/src/shortcuts.php",
	),
	// process simple strings replacements on all readed PHP scripts before saving into result package:
	// (replacements are executed before configured minification in RAM, they don't affect anythin on hard drive)
	'stringReplacements'	=> array(
		// Switch MvcCore application back from SFU mode to automatic compile mode detection
		'MvcCore::GetInstance()->Run(1);'			=> 'MvcCore::GetInstance()->Run();',
		'$app->Run(1);'								=> '$app->Run();',
	),
	'minifyTemplates'		=> 1,// Remove non-conditional comments and whitespaces
	'minifyPhp'				=> 1,// Remove comments and whitespaces
);