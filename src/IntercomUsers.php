<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomUsers {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    $this->client->post("users", $options);
  }
}
