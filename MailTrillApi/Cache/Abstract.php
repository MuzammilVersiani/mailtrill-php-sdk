<?php
/**
 * This file contains the base class for implementing caching in the MailTrillApi PHP-SDK.
 * 
 * Each class extending this one needs to implement the abstract methods.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Cache_Abstract is the base class that all the caching classes should extend.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Cache
 * @since 1.0
 */
abstract class MailTrillApi_Cache_Abstract extends MailTrillApi_Base
{
    /**
     * @var array keeps a history of loaded keys for easier and faster reference
     */
    protected $_loaded = array();
    
    /**
     * Set data into the cache
     * 
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    abstract public function set($key, $value);
    
    /**
     * Get data from the cache
     * 
     * @param string $key
     * @return mixed
     */
    abstract public function get($key);
    
    /**
     * Delete data from cache
     * 
     * @param string $key
     * @return bool
     */
    abstract public function delete($key);
    
    /**
     * Delete all data from cache
     * 
     * @return bool
     */
    abstract public function flush();
}