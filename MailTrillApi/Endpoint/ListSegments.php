<?php
/**
 * This file contains the list segments endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Endpoint_ListSegments handles all the API calls for handling the list segments.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_ListSegments extends MailTrillApi_Base
{
    /**
     * Get segments from a certain mail list
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param string $listUid
     * @param integer $page
     * @param integer $perPage
     * @return MailTrillApi_Http_Response
     */
    public function getSegments($listUid, $page = 1, $perPage = 10)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s/segments', $listUid)),
            'paramsGet'     => array(
                'page'      => (int)$page, 
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
}