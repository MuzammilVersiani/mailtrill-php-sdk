<?php
/**
 * This file contains an example of base setup for the MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 http://www.mailtrill.com/
 */

//exit('COMMENT ME TO TEST THE EXAMPLES!');

// require the autoloader class if you haven't used composer to install the package
require_once dirname(__FILE__) . '/../MailTrillApi/Autoloader.php';

// register the autoloader if you haven't used composer to install the package
MailTrillApi_Autoloader::register();

// if using a framework that already uses an autoloading mechanism, like Yii for example,
// you can register the autoloader like:
// Yii::registerAutoloader(array('MailTrillApi_Autoloader', 'autoloader'), true);

/**
 * Configuration components:
 * The api for the MailTrill is designed to return proper etags when GET requests are made.
 * We can use this to cache the request response in order to decrease loading time therefore improving performance.
 * In this case, we will need to use a cache component that will store the responses and a file cache will do it just fine.
 * Please see MailTrillApi/Cache for a list of available cache components and their usage.
 */

// configuration object
$config = new MailTrillApi_Config(array(
    'apiUrl'        => 'https://app.mailtrill.com/api',
    'publicKey'     => 'YOUR_PUBLIC_KEY',
    'privateKey'    => 'YOUR_PRIVATE_KEY',

    // components
    'components' => array(
        'cache' => array(
            'class'     => 'MailTrillApi_Cache_File',
            'filesPath' => dirname(__FILE__) . '/../MailTrillApi/Cache/data/cache', // make sure it is writable by webserver
        )
    ),
));

// now inject the configuration and we are ready to make api calls
MailTrillApi_Base::setConfig($config);

// start UTC
date_default_timezone_set('UTC');
