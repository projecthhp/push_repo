<?php

/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/22/19
 * Time: 10:50
 */
class Firebase
{

    // sending push message to single user by firebase reg id
    public function send($to, $message)
    {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message)
    {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToMixTopic($top1, $top2, $message)
    {
        $fields = array(
            'condition' => "'$top1' in topics && '$top2' in topics",
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToMixTopicNew($cityId, $careerId, $message)
    {
        $fields = array(
            'condition' => "'cit_$cityId' in topics && 'cat_$careerId' in topics && 'ung_vien' in topics",
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToMixTopicMulti($cond, $message)
    {
        $fields = array(
            'condition' => $cond,
            'data' => $message,
            //            'notification' => $message['data'],
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message)
    {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields)
    {

        require_once __DIR__ . '/config.php';

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }

    // function to get  the address
    function get_lat_long($address)
    {
        $result = array('data' => null, 'kq' => false);
        // $address = str_replace(" ", "+", $address);
        $address = urlencode ($address);
        // echo "https://geocoder.api.here.com/6.2/geocode.json?searchtext=$address&app_id=jA9VUaOZpOPOuXVV8Sqm&app_code=6PsVoIeWG65TaLOvz2-2aw&gen=8";

        $json = file_get_contents("https://geocoder.api.here.com/6.2/geocode.json?searchtext=$address&app_id=jA9VUaOZpOPOuXVV8Sqm&app_code=6PsVoIeWG65TaLOvz2-2aw&gen=8");
        $json = json_decode($json);

        $lat = $json->{'Response'}->{'View'}[0]->{'Result'}[0]->{'Location'}->{'DisplayPosition'}->{'Latitude'};
        $long = $json->{'Response'}->{'View'}[0]->{'Result'}[0]->{'Location'}->{'DisplayPosition'}->{'Longitude'};
        $coordinate = array('lat' => $lat, 'long' => $long);
        $arr_view = $json->{'Response'}->{'View'};
        if (count($arr_view) > 0){
            $result = array('data' => $coordinate, 'kq' => true);
        }
        // echo json_encode($result, true);
        // die();
        return json_encode($result);
    }
}
