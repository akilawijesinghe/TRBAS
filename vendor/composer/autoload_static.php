<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee4df1a345f7ce95b9e8507ff741c919
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs\\' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsstream/src/main/php',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee4df1a345f7ce95b9e8507ff741c919::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee4df1a345f7ce95b9e8507ff741c919::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitee4df1a345f7ce95b9e8507ff741c919::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitee4df1a345f7ce95b9e8507ff741c919::$classMap;

        }, null, ClassLoader::class);
    }
}
