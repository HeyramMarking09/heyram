<?php

namespace App\Services;

use Google_Client;
use GuzzleHttp\Client;

class FirebaseNotificationService
{
    protected $pathToServiceAccountKey;
    protected $projectId;

    public function __construct()
    {
        // Path to the Firebase service account key JSON file (store it in a secure location, like Laravel's storage folder)
        $this->pathToServiceAccountKey = base_path('fir-notifications-71c20-firebase-adminsdk-45nku-35ad605e25.json');
        $this->projectId = env('FIREBASE_PROJECT_ID'); // Store your Firebase project ID in .env
    }

    public function sendNotification($title, $body, $tokens)
    {
        // Initialize Google Client
        $client = new Google_Client();
        $client->setAuthConfig($this->pathToServiceAccountKey);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        // Get the OAuth2 access token
        $accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];

        // Define FCM API endpoint
        $url = 'https://fcm.googleapis.com/v1/projects/' . $this->projectId . '/messages:send';

        $httpClient = new Client();
        $responses = [];

        // Loop through each token and send a separate notification
        foreach ($tokens as $token) {
            $data = [
                "message" => [
                    "token" => $token,
                    "notification" => [
                        "title" => $title,
                        "body" => $body
                    ]
                ]
            ];

            // Send the notification using GuzzleHTTP
            try {
                $response = $httpClient->post($url, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Content-Type' => 'application/json'
                    ],
                    'json' => $data
                ]);
                $responses[] = $response->getBody()->getContents();
            } catch (\Exception $e) {
                // Handle exception if FCM request fails
                $responses[] = $e->getMessage();
            }
        }

        return $responses;
    }
}
