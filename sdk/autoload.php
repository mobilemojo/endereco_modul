<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'configure.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'enderecosdkautoloader.php';

$enderecoAutoloader = EnderecoSdkAutoloader::createAutoloadClosure();

spl_autoload_register($enderecoAutoloader);