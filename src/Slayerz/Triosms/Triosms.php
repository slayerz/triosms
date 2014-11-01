<?php namespace Slayerz\Triosms;

use Curl;

class Triosms {

    public function __construct()
    {
        $this->url = \Config::get('triosms::url');
        $this->token = \Config::get('triosms::token');
        $this->sender = \Config::get('triosms::sender');
        $this->mode = \Config::get('triosms::mode');
        $this->format = \Config::get('triosms::format');
    }

    /**
     * Check credit balance for specified account
     *
     * @param string $mode : account you wish to check balance from
     * @return string containing cURL response
     */
    public function balance($mode = '')
    {
        $curl = new Curl\Curl();
        $curl->setopt(CURLOPT_RETURNTRANSFER, true);

        $curl->get($this->url . 'index.php/api/bulk_mt', array(
            'api_key' => $this->token,
            'action'  => 'bal_check',
            'mode'    => (empty($mode) ? $this->mode : $mode),
        ));

        $curl->close();

        if ($curl->error)
        {
            return false;
        } else
        {
            return $curl->response;
        }
    }

    /**
     * Send SMS from specified account
     *
     * @param string $recipient : recipient mobile number
     * @param string $message : message to be sent
     * @param string $mode : account to send the SMS from
     * @param string $format : content type
     * @return string containing cURL response
     */
    public function send($recipient, $message, $mode = '', $format = '')
    {
        /* make sure credit is available before proceed */
        $balance = $this->balance(empty($mode) ? $this->mode : $mode);

        if ($balance == 0)
        {
            return false;
        }

        $curl = new Curl\Curl();
        $curl->setopt(CURLOPT_RETURNTRANSFER, true);

        $curl->get($this->url . 'index.php/api/bulk_mt', array(
            'api_key'      => $this->token,
            'action'       => 'send',
            'to'           => $recipient,
            'msg'          => $message,
            'sender_id'    => $this->sender,
            'content_type' => (empty($format) ? $this->format : $format),
            'mode'         => (empty($mode) ? $this->mode : $mode),
        ));

        $curl->close();

        if ($curl->error)
        {
            return false;
        } else
        {
            return $curl->response;
        }
    }
}