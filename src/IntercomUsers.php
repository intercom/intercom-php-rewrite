<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomUsers extends IntercomEndpoint {

  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function create($options)
  {
    return $this->client->post("users", $options);
  }

  public function getUsers($options)
  {
    return $this->client->get("users", $options);
  }
}
