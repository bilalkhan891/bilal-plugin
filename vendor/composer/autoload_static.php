<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbaa9cace1c1b67adb9644c7e5ffab4f2
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbaa9cace1c1b67adb9644c7e5ffab4f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbaa9cace1c1b67adb9644c7e5ffab4f2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}