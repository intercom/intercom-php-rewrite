<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomMessages extends IntercomEndpoint{

  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function create($options)
  {
    return $this->client->post("messages", $options);
  }
}
