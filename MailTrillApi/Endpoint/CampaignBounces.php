<?php
/**
 * This file contains the campaign bounces endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */


/**
 * MailTrillApi_Endpoint_CampaignBounces handles all the API calls for campaign bounces.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_CampaignBounces extends MailTrillApi_Base
{
    /**
     * Get bounces from a certain campaign
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $campaignUid
     * @param integer $page
     * @param integer $perPage
     * @return MailTrillApi_Http_Response
     */
    public function getBounces($campaignUid, $page = 1, $perPage = 10)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('campaigns/%s/bounces', $campaignUid)),
            'paramsGet'     => array(
                'page'      => (int)$page,
                'per_page'  => (int)$perPage,
            ),
            'enableCache'   => true,
        ));

        return $response = $client->request();
    }

    /**
     * Create a new bounce in the given campaign
     *
     * @param string $campaignUid
     * @param array $data
     * @return MailTrillApi_Http_Response
     */
    public function create($campaignUid, array $data)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'        => MailTrillApi_Http_Client::METHOD_POST,
            'url'           => $this->config->getApiUrl(sprintf('campaigns/%s/bounces', (string)$campaignUid)),
            'paramsPost'    => $data,
        ));

        return $response = $client->request();
    }
}
