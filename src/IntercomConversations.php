<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomConversations {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function getConversations($options)
  {
    return $this->client->get("conversations", $options);
  }
}
