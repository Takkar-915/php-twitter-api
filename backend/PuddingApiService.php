<?php

require("TwitterApi.php");
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class PuddingApiService
{
    private $statusCode = 200;
    private $res = [];

    private $api_end_point = "https://api.twitter.com/2/tweets/search/recent";
    private $query = [
        "query" => "紡ぐ乙女と大正の月",
        "sort_order" => "recency",
        "expansions" => "author_id",
        "user.fields" => "name,username"
    ];

    public function getPuddingList()
    {
        $twitterapi = new TwitterApi($this->api_end_point, $this->query, $_ENV["BEARERTOKEN"]);
    }
}
