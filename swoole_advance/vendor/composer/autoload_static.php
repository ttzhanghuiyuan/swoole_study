<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit433b3b776350eebeeaf5bffb92fa5e4c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
            'Abner\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
        'Abner\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework/abner',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit433b3b776350eebeeaf5bffb92fa5e4c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit433b3b776350eebeeaf5bffb92fa5e4c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
