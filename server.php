<?php

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// エンドポイントを指定
$api_end_point = "https://api.twitter.com/2/tweets/search/recent";

// 検索条件
$query = [
    "query" => "ぷりぷりプリン美味しいプリン",
    "sort_order" => "recency",
    "expansions" => "author_id",
    "user.fields" => "name,username"
];

$url = $api_end_point . "?" . http_build_query($query);

// BearerTOKENの読み込み
$token = $_ENV["BEARERTOKEN"];

// ステータスコード,レスポンスヘッダー,レスポンスボディ
// ヘッダーの生成
$header = [
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json',
];

// 外部アプリからデータを取得できる関数
// 1　セッションの開始
$curl = curl_init();

// 2　オプションの指定
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// trueで文字列で受け取る
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 3　実行

$results = curl_exec($curl);

// 4　必ずセッションを終了させる
curl_close($curl);

// debug用
// print json_encode($results, JSON_PRETTY_PRINT);