<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/22/19
 * Time: 10:50
 */
class Push {

    // push message title
    private $title;
    private $message;
    private $image;
    // push message payload
    private $data;
    // flag indicating whether to show the push
    // notification or not
    // this flag will be useful when perform some opertation
    // in background when push is recevied
    private $is_background;

    function __construct() {

    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setImage($imageUrl) {
        $this->image = $imageUrl;
    }

    public function setPayload($data) {
        $this->data = $data;
    }

    public function setIsBackground($is_background) {
        $this->is_background = $is_background;
    }

    public function getPush() {
        $res = array();
        $res['title'] = $this->title;
        $res['is_background'] = $this->is_background;
        $res['message'] = $this->message;
        $res['image'] = $this->image;
        $res['payload'] = $this->data;
        $res['timestamp'] = date('Y-m-d G:i:s');
        return $res;
    }

}