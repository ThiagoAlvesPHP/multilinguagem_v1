<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7767c54f0f068c5e4c8e42e8bdad86b0
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Statickidz\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Statickidz\\' => 
        array (
            0 => __DIR__ . '/..' . '/statickidz/php-google-translate-free/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7767c54f0f068c5e4c8e42e8bdad86b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7767c54f0f068c5e4c8e42e8bdad86b0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
