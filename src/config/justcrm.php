<?php
$url = env('JUSTCRM_URL');
$api = $url . '/api/v1';
$clientId = env('JUSTCRM_CLIENT_ID');
$clientSecret = env('JUSTCRM_CLIENT_SECRET');
$customerId = env('JUSTCRM_CUSTOMER_ID');
$ssoAccess = $url . '/' . 'sso/' . $customerId . '/access';
$token = $api . '/oauth/token';

return [
    'url' => $url,
    'api' => $api,
    'api_token' => $token,
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'sso_access' => $ssoAccess,
    'customer_id' => $customerId
];