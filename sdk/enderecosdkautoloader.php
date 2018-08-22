<?php

/**
 * Class EnderecoSdkAutoloader
 */
class EnderecoSdkAutoloader {

    public static function createAutoloadClosure() {
        $cache = [];

        $sApiPath = __DIR__.DIRECTORY_SEPARATOR.'Api';
        $sLibraryPath = __DIR__.DIRECTORY_SEPARATOR.'Lib';

        self::prepareFileCache($cache, $sApiPath);
        self::prepareFileCache($cache, $sLibraryPath);

        return function($class) use (&$cache) {
            $name = strtolower($class);
            if(!isset($cache[$name]))
                return;
            $sPath = $cache[$name];

            if(null === $sPath)
                return;

            require_once $sPath;
        };
    }

    private static function prepareFileCache(&$cache, $path) {
        $directoryIterator = new RecursiveDirectoryIterator($path);
        $recursiveIterator = new RecursiveIteratorIterator($directoryIterator);
        $iterator = new RegexIterator($recursiveIterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
        foreach ($iterator as $phpFile) {
            if(is_array($phpFile))
                $cache[strtolower(pathinfo($phpFile[0], PATHINFO_FILENAME))] = $phpFile[0];
        }
    }
}