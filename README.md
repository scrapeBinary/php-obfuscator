# PHP Obfuscator
Simple, easy-to-use and effective Obfuscator PHP class.

**Not just a stupid `base64 encoding` script, but a real and effective obfuscation script).**

Ideal to obfuscate some critical pieces of your software such as licensing verification functions.

Usage
---------

```php
require('Obfuscator.php');

$file = 'file.php';

$ob = new Obfuscator($file);
$ob->run(); // write file file_encoded.php

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
