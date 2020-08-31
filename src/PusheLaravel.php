<?php

namespace Moreshco\PusheLaravel;

class PusheLaravel
{
    private function sendNotificationToSpecificApp($data, $appId, $token, $filters){
        if (empty($appId) or empty($token)){
            return 'Please set config file';
        }
        $notificationURL = config('pushe.pushe_notification_url');
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
        if (empty($filters)){
            $pusheData = array(
                'app_ids' => $appId,
                'data' => $data
            );
        }else{
            $pusheData = array(
                'app_ids' => $appId,
                'data' => $data,
                'filters' => $filters
            );
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($pusheData));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function sendNotification($data, $names = [], $filters = []){
        $apps = config('pushe.apps');
        $results = array();
        foreach ($apps as $app){
            if (empty($names) or in_array($app['name'], $names)){
                $results[] = $this->sendNotificationToSpecificApp($data, $app['app_id'], $app['token'], $filters);
            }
        }
        return $results;
    }

    public function sendSimpleNotificationToAll($title, $content){
        $data = array(
            'title' => $title,
            'content' => $content
        );
        return $this->sendNotification($data);
    }

    public function sendSimpleNotificationToApp($title, $content, $name){
        $data = array(
            'title' => $title,
            'content' => $content
        );
        return $this->sendNotification($data, [$name]);
    }

    public function sendSimpleNotificationToDeviceByAppName($title, $content, $deviceId, $name){
        $data = array(
            'title' => $title,
            'content' => $content
        );
        $filters = array(
            'device_id' => array(
                $deviceId
            ),
        );
        return $this->sendNotification($data, [$name], $filters);
    }
}
