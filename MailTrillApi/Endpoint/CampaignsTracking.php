<?php
/**
 * This file contains the campaigns endpoint for MailTrillApi PHP-SDK.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @link https://www.mailtrill.com/
 * @copyright 2018 https://www.mailtrill.com/
 */
 
 
/**
 * MailTrillApi_Endpoint_CampaignsTracking handles all the API calls for campaigns.
 *
 * @author Muzammil Versiani <muzammil.versiani@mailtrill.com>
 * @package MailTrillApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailTrillApi_Endpoint_CampaignsTracking extends MailTrillApi_Base
{
    /**
     * Track campaign url click for certain subscriber 
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     * @param string $hash
     * @return MailTrillApi_Http_Response
     */
    public function trackUrl($campaignUid, $subscriberUid, $hash)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'    => MailTrillApi_Http_Client::METHOD_GET,
            'url'       => $this->config->getApiUrl(sprintf('campaigns/%s/track-url/%s/%s', (string)$campaignUid, (string)$subscriberUid, (string)$hash)),
            'paramsGet' => array(),
        ));
        
        return $response = $client->request();
    }

    /**
     * Track campaign open for certain subscriber
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     * @return MailTrillApi_Http_Response
     */
    public function trackOpening($campaignUid, $subscriberUid)
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'    => MailTrillApi_Http_Client::METHOD_GET,
            'url'       => $this->config->getApiUrl(sprintf('campaigns/%s/track-opening/%s', (string)$campaignUid, (string)$subscriberUid)),
            'paramsGet' => array(),
        ));

        return $response = $client->request();
    }

    /**
     * Track campaign unsubscribe for certain subscriber
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     * @param array $data
     * @return MailTrillApi_Http_Response
     */
    public function trackUnsubscribe($campaignUid, $subscriberUid, array $data = array())
    {
        $client = new MailTrillApi_Http_Client(array(
            'method'     => MailTrillApi_Http_Client::METHOD_POST,
            'url'        => $this->config->getApiUrl(sprintf('campaigns/%s/track-unsubscribe/%s', (string)$campaignUid, (string)$subscriberUid)),
            'paramsPost' => $data,
        ));

        return $response = $client->request();
    }
}
