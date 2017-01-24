# MvcCore Project - Portable

[![Latest Stable Version](https://img.shields.io/badge/Stable-v3.1.7-brightgreen.svg?style=plastic)](https://github.com/mvccore/project-portable/releases)
[![License](https://img.shields.io/badge/Licence-BSD-brightgreen.svg?style=plastic)](https://github.com/mvccore/project-portable/blob/master/LICENCE.md)
[![Packager Build](https://img.shields.io/badge/Packager%20Build-passing-brightgreen.svg?style=plastic)](https://github.com/mvccore/packager)
![PHP Version](https://img.shields.io/badge/PHP->=5.3-brightgreen.svg?style=plastic)

[**MvcCore**](https://github.com/mvccore/mvccore)  Project - Portable - empty project structure how to build portable, single PHP file applications or it's variants with MvcCore [**Packager**](https://github.com/mvccore/packager) library.

## Instalation
```shell
# load MvcCore portable project structure
composer create-project mvccore/project-portable

# go to project root dir
cd project-portable

# load MvcCore basic portable project
composer create-project mvccore/project-basic-portable development

# ... now you can do anything in development dir
```

## Build

### 1. Prepare application
- go to `project-portable/development`
- clear everything in `./Var/Tmp/`
- change `$app->Run();` to `$app->Run(1);` in `./index.php`
- visit all aplication routes where are different JS/CSS bundles 
  groups to generate `./Var/Tmp/` content for result app
- run build process

### 2. Build

#### Linux:
```shell
# go to project root dir
cd project-portable
# run build process into single PHP file
sh make.sh
```

#### Windows:
```shell
# go to project root dir
cd project-portable
# run build process into single PHP file
make.cmd
```

#### Browser:
```shell
# visit script `make-php.php` in your project root directory:
http://localhost/project-portable/make-php.php
# now run your result in:
http://localhost/project-portable/release/
```
