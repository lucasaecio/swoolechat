<?php

require __DIR__ . "/../../vendor/autoload.php";

use Swoole\WebSocket\Frame;
use SwooleChat\WebSocketServer;


$channels = array();

$server = new WebSocketServer("0.0.0.0", 8080, 1, 3);

$server->on('Connect', function (WebSocketServer $server, int $fd, int $reactorId) {
    echo "New connection established: #{$fd}.\n";
});

$server->on("message", function (WebSocketServer $server, Frame $message) {
    $request_body = json_decode($message->data);
    $origin = $message->fd;

    switch ($request_body->type) {
        case "dashboard":
            $server->push($origin, json_encode(["type" => "dashboard", "data" => count($server->getClientList())]));
            break;
        case "subscribe":
            if (!$server->existsChannel($request_body->target)) {
                $server->createChannel($request_body->target);
            }
            if (!$server->hasUserInChannel($request_body->target, $origin)) {
                $server->addUserInChannel($request_body->target, $origin);
            }
            break;
    }

    if ($request_body->type != "message" || !$server->existsChannel($request_body->target)) {
        return;
    }

    foreach ($server->getChannelUsers($request_body->target) as $connection) {
        if ($connection === $origin || !$server->exist($connection)) continue;

        $server->push($connection, json_encode(["type" => "chat", "data" => $request_body->data]));
    }
});


$server->start();
