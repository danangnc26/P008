<?php

/**
 * SPL autoloader.
 * Sebagai contoh apabila direktori tempat class file adalah di sub direktori
 * dirname(__FILE__)'/class/';
 * apabila bootstrap.php diletakkan di satu tempat pada direktory class atau berbeda 
 * maka ubah : . DIRECTORY_SEPARATOR.'class'
 * @param string $classname The name of the class to load
 */
function _autoload($className)
{
    // tentukan direktori saat ini , menggunakan function realpath
    // untuk menghindari kasus symlink ( biasanya pada direktori https )
    $baseDir   = (function_exists('realpath') ? realpath(dirname(__FILE__)) : dirname(__FILE__) )
                . DIRECTORY_SEPARATOR.'class' ;
    $className = ltrim($className, '\\');
    $fileName  = $baseDir.DIRECTORY_SEPARATOR;

    // penggunaan namespace sebagai direktori 
    // dimana file yang menggunakan namespace tersebut diletakkan di direktori yang bernama namespace itu sendiri
    $namespace = '';
    if ($lastNsPos = strripos( $className, '\\' ) ) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    // tentukan full path/file untuk file tersebut berada
    $fileName .= $className . '.php';

    // validasi apabila file exist dengan menggunakan class yang mengandung undersoce "_"
    // tersebut ada ataukah underscore tersebut digunakan sebagai DIRECTORY_SEPARATOR
    // tentukan variable baru
    $fileName  = file_exists($fileName) ? $fileName : str_replace( '_', DIRECTORY_SEPARATOR, $fileName);

    // apabila file tersebut ada maka require
    if (file_exists($fileName)) {
        require $fileName;
    }
}

/**
 * Register Autoloader , dan validasi untuk penggunaan 
 * Pada versi PHP yang berbeda
 * Compare / bandingkan versi PHP
 */
// apabila Versi PHP 5.1.2 Keatas maka -->
if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('_autoload', true, true);
    } else {
        spl_autoload_register('_autoload');
    }
} else {

    /**
     * Kembalikan autoload menggunakan versi lama 
     * @param string $classname The name of the class to load
     */
    function __autoload($classname)
    {
        _autoload($classname);
    }
}

?>