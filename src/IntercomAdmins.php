<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomAdmins {

  /** @var Client $client */
  private $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function getAdmins($options = [])
  {
    return $this->client->get("admins", $options);
  }
}
