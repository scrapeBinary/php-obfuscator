# PHP Obfuscator
[![GitHub issues](https://img.shields.io/github/issues/namdevel/php-obfuscator)](https://github.com/namdevel/php-obfuscator/issues)
[![GitHub forks](https://img.shields.io/github/forks/namdevel/php-obfuscator)](https://github.com/namdevel/php-obfuscator/network)
[![GitHub stars](https://img.shields.io/github/stars/namdevel/php-obfuscator)](https://github.com/namdevel/php-obfuscator/stargazers)
[![GitHub license](https://img.shields.io/github/license/namdevel/php-obfuscator)](https://github.com/namdevel/php-obfuscator/blob/master/LICENSE)
[![Twitter](https://img.shields.io/twitter/url?style=social&url=https%3A%2F%2Fgithub.com%2Fnamdevel%2Fphp-obfuscator)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2Fnamdevel%2Fphp-obfuscator)

Simple, easy-to-use and effective Obfuscator PHP class.

**Not just a stupid `base64 encoding` script, but a real and effective obfuscation script.**

Ideal to obfuscate some critical pieces of your software such as licensing verification functions.

Usage
---------

```php
<?php
require('Obfuscator.php');

$file = 'file.php';

$ob = new Obfuscator($file);
$ob->run(); // write file file_encoded.php

```
Output
---------

```php
<?php
/*
#################################################
* Obfuscation provided by NAMDEVEL
* URL : https://github.com/namdevel/
* Signature : 8beef589a39326c2ae1a61e620b81ea2fb514e88
#################################################
*/
const _NAMDEVEL_9505e64b=__FILE__;$NAMDEVEL_2d7d91c="\x62\x61\x73\x65\.....

```
License
------------

This open-source software is distributed under the MIT License. See LICENSE.md

Contributing
------------

All kinds of contributions are welcome - code, tests, documentation, bug reports, new features, etc...

* Send feedbacks.
* Submit bug reports.
* Write/Edit the documents.
* Fix bugs or add new features.
