<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomTags extends IntercomEndpoint {

  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function tag($options)
  {
    return $this->client->post("tags", $options);
  }

  public function getTags($options = [])
  {
    return $this->client->get("tags", $options);
  }
}
