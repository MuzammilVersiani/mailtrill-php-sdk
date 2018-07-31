<?php
/**
 * This file contains the lists fields endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Endpoint_ListFields handles all the API calls for handling the list custom fields.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_ListFields extends MailTrillApi_Base
{
    /**
     * Get fields from a certain mail list
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param string $listUid
     * @return MailTrillApi_Http_Response
     */
    public function getFields($listUid)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s/fields', $listUid)),
            'paramsGet'     => array(),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
}