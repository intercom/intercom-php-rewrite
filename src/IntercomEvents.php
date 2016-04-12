<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomEvents extends IntercomEndpoint {

  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function create($options)
  {
    return $this->client->post("events", $options);
  }

  public function getEvents($options)
  {
    return $this->client->get("events", array_merge(["type" => "user"], $options));
  }
}
