<?php
require('../Obfuscator.php');

$file = 'file.php';

$ob = new Obfuscator($file);
$ob->run(); // write file file_encoded.php
