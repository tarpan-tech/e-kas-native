<?php

require './vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Api\DeviceApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

$device_id = 105800;
$api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0Mjk3ODgxMSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY0MjAxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.Csi4HU4iyUfdMJlPKo4X0cv0zoUYcV4i8Ohf5Ap-e-U';

function getDevice()
{
    global $api_key;
    global $device_id;

    // Configure client
    $config = Configuration::getDefaultConfiguration();
    $config->setApiKey('Authorization', $api_key);
    $apiClient = new ApiClient($config);
    // Create device client
    $deviceClient = new DeviceApi($apiClient);
    // Get device information
    $device = $deviceClient->getDevice($device_id);
    return json_decode($device);
}


/**
 * Get message information
 *
 * @param integer $message_id
 * @return void
 */
function getMessage(int $message_id)
{
    global $api_key;

    // Configure client
    $config = Configuration::getDefaultConfiguration();
    $config->setApiKey('Authorization', $api_key);
    $apiClient = new ApiClient($config);
    $messageClient = new MessageApi($apiClient);

    // Get SMS Message Information
    $message = $messageClient->getMessage($message_id);
    return json_decode($message);
}

/**
 * Send message to other phone
 *
 * @param string $phone_number
 * @param string $message
 * @return void
 */
function sendMessage(string $phone_number, string $message)
{
    global $device_id;
    global $api_key;

    // Configure client
    $config = Configuration::getDefaultConfiguration();
    $config->setApiKey('Authorization', $api_key);
    $apiClient = new ApiClient($config);
    $messageClient = new MessageApi($apiClient);

    // Sending a SMS Message
    $sendMessageRequest = new SendMessageRequest([
        'phoneNumber' => $phone_number,
        'message' => $message,
        'deviceId' => $device_id
    ]);
    $sendMessage = $messageClient->sendMessages([$sendMessageRequest]);
    return $sendMessage;
}