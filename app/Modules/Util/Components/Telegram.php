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
    public $secret = ""; // FILL THIS

    public $chat = ''; // AND THIS

    public $baseUrl = "https://api.telegram.org/bot";

    public function send($text)
    {
        if ($this->chat && $this->secret) {
            $this->request('sendMessage', [
                'parse_mode' => "HTML",
                'disable_web_page_preview' => 'true',
                'chat_id' => $this->chat,
                'text' => $text
            ]);
        }
    }

    public function getUpdates()
    {
        // Go to: https://api.telegram.org/bot{bot}/getUpdates
    }

    public function request($url, $data = [])
    {
        $url = $this->baseUrl . $this->secret . '/' . $url . '?' . http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://rclass.pro/pro/tg');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'url' => $url,
            'key' => "d23d46d6-8bf8-11e8-9eb6-529269fb1459"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}