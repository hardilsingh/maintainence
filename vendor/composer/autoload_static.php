<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite204038343cb9dc18c8ee31f0eb5fabc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite204038343cb9dc18c8ee31f0eb5fabc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite204038343cb9dc18c8ee31f0eb5fabc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
