<?php
/**
 * This file contains the countries endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Endpoint_Countries handles all the API calls for handling the countries and their zones.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_Countries extends MailTrillApi_Base
{
    /**
     * Get all available countries
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param integer $page
     * @param integer $perPage
     * @return MailTrillApi_Http_Response
     */
    public function getCountries($page = 1, $perPage = 10)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl('countries'),
            'paramsGet'     => array(
                'page'      => (int)$page, 
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Get all available country zones
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param integer $countryId
     * @param integer $page
     * @param integer $perPage
     * @return MailTrillApi_Http_Response
     */
    public function getZones($countryId, $page = 1, $perPage = 10)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('countries/%d/zones', $countryId)),
            'paramsGet'     => array(
                'page'      => (int)$page, 
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
}