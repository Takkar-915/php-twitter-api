<?php

class TwitterApi
{
    private $url = "";
    private $header = "";
    public function __construct($api_end_point, $query, $token)
    {
        $this->url = $api_end_point . "?" . http_build_query($query);
        // ヘッダーの生成
        $this->header = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ];

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $results = curl_exec($curl);

        curl_close($curl);

        print json_encode($results, JSON_PRETTY_PRINT);
    }
}
