<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d1d5b7b0566f280230a085af2585375
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Thomisticus\\Generic\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Thomisticus\\Generic\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d1d5b7b0566f280230a085af2585375::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d1d5b7b0566f280230a085af2585375::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
