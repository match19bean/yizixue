<?php

namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
class LinePayService
{
    const SANDBOX_API_HOST = 'https://sandbox-api-pay.line.me';

    const API_HOST = 'https://api-pay.line.me';

    protected static $apiUris = [
        'request' => '/v3/payments/request',
        'confirm' => '/v3/payments/{transactionId}/confirm',
        'refund' => '/v3/payments/{transactionId}/refund',
        'details' => '/v3/payments',
        'check' => '/v3/payments/requests/{transactionId}/check',
        'authorizationsCapture' => '/v3/payments/authorizations/{transactionId}/capture',
        'authorizationsVoid' => '/v3/payments/authorizations/{transactionId}/void',
        'preapproved' => '/v3/payments/preapprovedPay/{regKey}/payment',
        'preapprovedCheck' => '/v3/payments/preapprovedPay/{regKey}/check',
        'preapprovedExpire' => '/v3/payments/preapprovedPay/{regKey}/expire',
        'oneTimeKeysPay' => '/v2/payments/oneTimeKeys/pay',
        'ordersCheck' => '/v2/payments/orders/{orderId}/check',
        'ordersVoid' => '/v2/payments/orders/{orderId}/void',
        'ordersCapture' => '/v2/payments/orders/{orderId}/capture',
        'ordersRefund' => '/v2/payments/orders/{orderId}/refund',
        'authorizations' => '/v2/payments/authorizations',
        'detailsV2' => '/v2/payments',
    ];
    public function __construct($optParams)
    {
        $channelId = isset($optParams['channelId']) ? $optParams['channelId'] : null;
        $channelSecret = isset($optParams['channelSecret']) ? $optParams['channelSecret'] : null;
        $isSandbox = isset($optParams['isSandbox']) ? $optParams['isSandbox'] : false;
        $this->useUnixTimeNonce = isset($optParams['useUnixTimeNonce']) ? $optParams['useUnixTimeNonce'] : false;

        if (!$channelId || !$channelSecret) {
            throw new Exception("channelId/channelSecret are required", 400);
        }

        // Base URI
        $baseUri = ($isSandbox) ? self::SANDBOX_API_HOST : self::API_HOST;

        // Headers
        $headers = [
            'Content-Type' => 'application/json',
            'X-LINE-ChannelId' => $channelId,
        ];

        // Save channel secret
        $this->channelSecret = (string) $channelSecret;

        // Load GuzzleHttp\Client
        $this->httpClient = new HttpClient([
            'base_uri' => $baseUri,
            // 'timeout'  => 6.0,
            'headers' => $headers,
            'http_errors' => false,
        ]);

        return $this;
    }

    static public function getAuthSignature($channelSecret, $uri, $queryOrBody, $nonce)
    {
        $authMacText = $channelSecret . $uri . $queryOrBody . $nonce;
        return base64_encode(hash_hmac('sha256', $authMacText, $channelSecret, true));
    }

    public function requestHandler($version, $method, $uri, $queryParams=null, $bodyParams=null, $options=[])
    {
        // Headers
        $headers = [];
        // Query String
        $queryString = ($queryParams) ? http_build_query($queryParams) : null;
        $url = ($queryParams) ? "{$uri}?{$queryString}" : $uri ;
        // Body
        $body = ($bodyParams) ? json_encode($bodyParams) : '';

        // Guzzle on_stats
        $stats = null;
        $options['on_stats'] = function (\GuzzleHttp\TransferStats $transferStats) use (&$stats) {
            // Assign object
            $stats = $transferStats;
            $stats->responseTime = microtime(true);
            $stats->requestTime = $stats->responseTime - $stats->getTransferTime();
        };

        switch ($version) {
            case 'v2':
                // V2 API Authentication
                $headers['X-LINE-ChannelSecret'] = $this->channelSecret;
                break;

            case 'v3':
            default:
                // V3 API Authentication
                $authNonce = ($this->useUnixTimeNonce) ? round(microtime(true) * 1000) : date('c') . uniqid('-'); // ISO 8601 date + UUID 1
                $authParams = ($method=='GET' && $queryParams) ? $queryString : (($bodyParams) ? $body : null);
                $headers['X-LINE-Authorization'] = self::getAuthSignature($this->channelSecret, $uri, $authParams, $authNonce);
                $headers['X-LINE-Authorization-Nonce'] = $authNonce;
                break;
        }

        // Send request with PSR-7 pattern
        $this->request = new Request($method, $url, $headers, $body);
        $this->request->timestamp = microtime(true);
        try {
            $response = $this->httpClient->send($this->request, $options);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            logger($e->getMessage(), $this->request);
        }

        return new Response($response, $stats);
    }

    public function details($queryParams, $version="v3")
    {
        $version = ($version == "v2") ? $version : "v3";
        $apiUrl = ($version == "v2") ? self::$apiUris['detailsV2'] : self::$apiUris['details'];
        return $this->requestHandler($version, 'GET', $apiUrl, $queryParams, null, [
            'connect_timeout' => 5,
            'timeout' => 20,
        ]);
    }

    public function request($bodyParams)
    {
        return $this->requestHandler('v3', 'POST', self::$apiUris['request'], null, $bodyParams, [
            'connect_timeout' => 5,
            'timeout' => 20,
        ]);
    }

    public function confirm($transactionId, $bodyParams)
    {
        return $this->requestHandler('v3', 'POST', str_replace('{transactionId}', $transactionId, self::$apiUris['confirm']), null, $bodyParams, [
            'connect_timeout' => 5,
            'timeout' => 40,
        ]);
    }


}