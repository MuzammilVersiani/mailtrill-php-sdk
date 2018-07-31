<?php
/**
 * This file contains the autoloader class for the MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * The MailTrillApi Autoloader class.
 * 
 * From within a Yii Application, you would load this as:
 * 
 * <pre>
 * require_once(Yii::getPathOfAlias('application.vendors.MailTrillApi.Autoloader').'.php');
 * Yii::registerAutoloader(array('MailTrillApi_Autoloader', 'autoloader'), true);
 * </pre>
 * 
 * Alternatively you can:
 * <pre>
 * require_once('Path/To/MailTrillApi/Autoloader.php');
 * MailTrillApi_Autoloader::register();
 * </pre>
 * 
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @since 1.0
 */
class MailTrillApi_Autoloader
{
    /**
     * The registrable autoloader
     * 
     * @param string $class
     */
    public static function autoloader($class)
    {
        if (strpos($class, 'MailTrillApi') === 0) {
            $className = str_replace('_', '/', $class);
            $className = substr($className, 12);
            
            if (is_file($classFile = dirname(__FILE__) . '/'. $className.'.php')) {
                require_once($classFile);
            }
        }
    }
    
    /**
     * Registers the MailTrillApi_Autoloader::autoloader()
     */
    public static function register()
    {
        spl_autoload_register(array('MailTrillApi_Autoloader', 'autoloader'));
    }
}