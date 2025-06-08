<?php
namespace App\Helpers;

class TripayHelper
{
    private $apiKey;
    private $apiUrl;
    private $merchantCode;
    private $privateKey;

    public function __construct()
    {
        $this->apiKey = getenv('TRIPAY_API_KEY');
        $this->apiUrl = getenv('TRIPAY_API_URL');
        $this->merchantCode = getenv('TRIPAY_MERCHANT_CODE');
        $this->privateKey = getenv('TRIPAY_PRIVATE_KEY');
    }

    public function generateSignature($merchantRef, $amount)
    {
        return hash_hmac('sha256', $this->merchantCode . $merchantRef . $amount, $this->privateKey);
    }

    public function sendRequest($endPoint, $method, $data)
    {
        $curl = curl_init();

        if ($method === 'POST') {
            curl_setopt_array($curl, [
                CURLOPT_FRESH_CONNECT  => true,
                CURLOPT_URL            => $this->apiUrl . $endPoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $this->apiKey],
                CURLOPT_FAILONERROR    => false,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => http_build_query($data),
                CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
            ]);
        } else {
            curl_setopt_array($curl, [
                CURLOPT_FRESH_CONNECT  => true,
                CURLOPT_URL            => $this->apiUrl . $endPoint . '?' . http_build_query($data),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $this->apiKey],
                CURLOPT_FAILONERROR    => false,
                CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
            ]);
        }

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return ['success' => false, 'error' => $error];
        }

        return json_decode($response, true)['data'];
    }
}
