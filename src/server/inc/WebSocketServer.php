<?php

namespace SwooleChat;

use Swoole\WebSocket\Server;

class WebSocketServer extends Server
{
    private array $channels;

    public function __construct($host, $port = null, $mode = null, $sock_type = null)
    {
        parent::__construct($host, $port, $mode, $sock_type);
    }

    public function createChannel($target)
    {
        $this->channels[$target] = array();
    }

    public function existsChannel($target):bool
    {
        return !empty($this->channels[$target]);
    }

    public function getChannelUsers($target): array
    {
        return $this->channels[$target] ?? [];
    }

    public function addUserInChannel($channel_target, $user_id)
    {
        $this->channels[$channel_target][$user_id] = $user_id;
    }

    public function hasUserInChannel($channel_target, $user_id): bool
    {
        return array_key_exists($user_id, $this->channels[$channel_target]);
    }
}