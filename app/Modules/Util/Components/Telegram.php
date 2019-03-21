<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05/07/2018
 * Time: 13:28
 */

namespace Modules\Util\Components;


class Telegram
{
    public $secret = ''; // FILL THIS

    public $chat = ''; // AND THIS

    public $baseUrl = 'https://api.telegram.org/bot';

    public $proxy = 'http://51.15.220.235:8212';

    public function getUpdates()
    {
        // Go to: https://api.telegram.org/bot{bot}/getUpdates
    }

    public function send($text)
    {
        $this->request('sendMessage', [
            'parse_mode' => "HTML",
            'disable_web_page_preview' => 'true',
            'chat_id' => $this->chat,
            'text' => $text
        ]);
    }

    public function request($url, $data = [])
    {
        $url = $this->baseUrl . $this->secret . '/' . $url . '?' . http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($this->proxy) {
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            curl_setopt($ch, CURLOPT_PROXY,  $this->proxy);
        }
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}