<?php

namespace Moreshco\PusheLaravel;

class PusheLaravel
{
    public function sendSimpleNotification($title, $content){
        $appId = config('app_id');
        $token = config('token');
        if (empty($appId) or empty($token)){
            return 'Please set config file';
        }
        $notificationURL = config('pushe_notification_url');
        $ch = curl_init($notificationURL);
        curl_setopt_array($ch, array(
            CURLOPT_POST  => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Token " . $token,
            ),
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
            'app_ids' => $appId,
            'data' => array(
                'title' => $title,
                'content' => $content
            )
        )));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
