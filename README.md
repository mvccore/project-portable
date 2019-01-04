# MvcCore - Template Project - Portable Skeleton

[![Latest Stable Version](https://img.shields.io/badge/Stable-v5.0.0-brightgreen.svg?style=plastic)](https://github.com/mvccore/project-portable/releases)
[![License](https://img.shields.io/badge/Licence-BSD-brightgreen.svg?style=plastic)](https://mvccore.github.io/docs/mvccore/4.0.0/LICENCE.md)
[![Packager Build](https://img.shields.io/badge/Packager%20Build-passing-brightgreen.svg?style=plastic)](https://github.com/mvccore/packager)
![PHP Version](https://img.shields.io/badge/PHP->=5.4-brightgreen.svg?style=plastic)

- [**MvcCore**](https://github.com/mvccore/mvccore) empty template project skeleton for portable packing/building.
- Project is configured to pack with [**Packager**](https://github.com/mvccore/packager) in strict package mode but is possible to reconfigure it to any mixed mode with hard drive.
- All assets has to be hardly linked for strict package mode with [**MvcCore Extension - View Helper Assets**](https://github.com/mvccore/ext-view-helper-assets).

## Instalation
```shell
# load MvcCore project template skeleton for portable packing/building
composer create-project mvccore/project-portable my-portable-project-structure

# go to project root dir
cd my-portable-project-structure

# load MvcCore basic website project template for portable packing/building
composer create-project mvccore/project-basic-portable development

# ... now you can do anything in development dir
```

## Build

### 1. Prepare application
- go to `my-portable-project-structure/development`
- clear everything in `./Var/Tmp/`
- change `$app->Run();` to `$app->Run(1);` in `./index.php`
- visit all application routes where are different JS/CSS bundles 
  groups to generate `./Var/Tmp/` content for result app
- run build process

### 2. Build

#### Linux:
```shell
# go to project root dir
cd my-portable-project-structure
# run build process into single PHP file
sh make.sh
```

#### Windows:
```shell
# go to project root dir
cd my-portable-project-structure
# run build process into single PHP file
make.cmd
```

#### Browser:
```shell
# visit script `make-php.php` in your project root directory:
http://localhost/my-portable-project-structure/build/make-php.php
```

## Result
- Now you can find the result on **http://localhost/my-portable-project-structure/build/release/**
- Result is in strict package mode completely portable os only one single PHP file.


