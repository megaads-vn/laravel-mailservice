<?php 
namespace Megaads\Laravelmailservice\Services;

class EmailService
{
    public function sendMail($options) {
        $emailService = env('EMAIL_SERVICE_URL');
        if ( !$options ) {
            
        }
        $token = $this->refreshToken($emailService);
    }

    private function refreshToken($emailService) {
        $options = array(
            'email' => env('EMAIL_SERVICE_USER'),
            'password' => env('EMAIL_SERVICE_PASSWORD')
        );
        $result = $this->sendHttpRequest($emailService . '/auth/login', "POST", $options);
        if ( isset($result->token) ) {
            return $result->token;
        }
        return null;
    }

    private function sendHttpRequest($url, $method = "GET", $data = []) {
        $channel = curl_init();
        curl_setopt($channel, CURLOPT_URL, $url);
        curl_setopt($channel, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($channel, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($channel);
        curl_close($channel);
        $responseInJson = json_decode($response);
        return isset($responseInJson->result) ? $responseInJson->result : $responseInJson;
    }
}