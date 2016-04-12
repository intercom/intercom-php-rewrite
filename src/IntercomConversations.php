<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomConversations extends IntercomEndpoint {

  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function getConversations($options)
  {
    return $this->client->get("conversations", $options);
  }

  public function getConversation($id) {
    $path = $this->conversationPath($id);
    return $this->client->get($path, []);
  }

  public function replyToConversation($id, $options) {
    $path = $this->conversationReplyPath($id);
    return $this->client->post($path, $options);
  }

  public function conversationPath($id)
  {
    return "conversations/" . $id;
  }

  public function conversationReplyPath($id)
  {
    return "conversations/" . $id . "/reply";
  }
}
