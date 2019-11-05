<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f9124946e242e9bedff6ee5ea4f70ac
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f9124946e242e9bedff6ee5ea4f70ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f9124946e242e9bedff6ee5ea4f70ac::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}