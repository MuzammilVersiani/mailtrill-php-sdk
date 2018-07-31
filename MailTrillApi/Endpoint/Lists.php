<?php
/**
 * This file contains the lists endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Endpoint_Lists handles all the API calls for lists.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_Lists extends MailTrillApi_Base
{
    /**
     * Get all the mail list of the current customer
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param integer $page
     * @param integer $perPage
     * @return MailTrillApi_Http_Response
     */
    public function getLists($page = 1, $perPage = 10)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl('lists'),
            'paramsGet'     => array(
                'page'      => (int)$page, 
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Get one list
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param string $listUid
     * @return MailTrillApi_Http_Response
     */
    public function getList($listUid)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s', (string)$listUid)),
            'paramsGet'     => array(),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Create a new mail list for the customer
     * 
     * The $data param must contain following indexed arrays:
     * -> general
     * -> defaults
     * -> notifications
     * -> company
     * 
     * @param array $data
     * @return MailTrillApi_Http_Response
     */
    public function create(array $data)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_POST,
            'url'           => $this->config->getApiUrl('lists'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Update existing mail list for the customer
     * 
     * The $data param must contain following indexed arrays:
     * -> general
     * -> defaults
     * -> notifications
     * -> company
     * 
     * @param string $listUid
     * @param array $data
     * @return MailTrillApi_Http_Response
     */
    public function update($listUid, array $data)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_PUT,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s', $listUid)),
            'paramsPut'     => $data,
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Copy existing mail list for the customer
     * 
     * @param string $listUid
     * @return MailTrillApi_Http_Response
     */
    public function copy($listUid)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'    => MailTrillApi_Http_Client::METHOD_POST,
            'url'       => $this->config->getApiUrl(sprintf('lists/%s/copy', $listUid)),
        ));
        
        return $response = $client->request();
    }
    
    /**
     * Delete existing mail list for the customer
     * 
     * @param string $listUid
     * @return MailTrillApi_Http_Response
     */
    public function delete($listUid)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'    => MailTrillApi_Http_Client::METHOD_DELETE,
            'url'       => $this->config->getApiUrl(sprintf('lists/%s', $listUid)),
        ));
        
        return $response = $client->request();
    }
}