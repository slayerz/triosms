<?php namespace Slayerz\Triosms;

use Curl;

class Triosms {

    public function __construct()
    {
        $this->url = \Config::get('triosms::url');
        $this->token = \Config::get('triosms::token');
        $this->sender = \Config::get('triosms::sender');
        $this->format = \Config::get('triosms::format');
    }

    public function balance($method = 'shortcode')
    {
        $curl = new Curl\Curl();
        $curl->setopt(CURLOPT_RETURNTRANSFER, true);

        $curl->get($this->url . 'index.php/api/bulk_mt', array(
            'api_key' => $this->token,
            'action'  => 'bal_check',
            'mode'    => $method
        ));

        $curl->close();

        if ($curl->error)
        {
            return $curl->error_code;
        } else
        {
            return $curl->response;
        }
    }

    public function send($recipient, $message, $method = 'shortcode')
    {
        $curl = new Curl\Curl();
        $curl->setopt(CURLOPT_RETURNTRANSFER, true);

        $curl->get($this->url . 'index.php/api/bulk_mt', array(
            'api_key'      => $this->token,
            'action'       => 'send',
            'to'           => $recipient,
            'msg'          => $message,
            'sender_id'    => $this->sender,
            'content_type' => $this->format,
            'mode'         => $method
        ));

        $curl->close();

        if ($curl->error)
        {
            return $curl->error_code;
        } else
        {
            return $curl->response;
        }
    }
}