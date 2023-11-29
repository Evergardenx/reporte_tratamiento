<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitde5b342f427128c5b9028445db99018a
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LaravelDaily\\LaravelCharts\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LaravelDaily\\LaravelCharts\\' => 
        array (
            0 => __DIR__ . '/..' . '/laraveldaily/laravel-charts/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitde5b342f427128c5b9028445db99018a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitde5b342f427128c5b9028445db99018a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitde5b342f427128c5b9028445db99018a::$classMap;

        }, null, ClassLoader::class);
    }
}