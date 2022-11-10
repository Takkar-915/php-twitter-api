<?php
require("PuddingApiService.php");

$PuddingApiService = new PuddingApiService();

list($statusCode, $res) = $PuddingApiService->getPuddingList();

header("Content-Type: application/json; charset=UTF-8");

http_response_code($statusCode);

print json_encode($res, JSON_PRETTY_PRINT);
