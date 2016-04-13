<?php

namespace Intercom;

class IntercomCompanies extends IntercomEndpoint{
  
  public function __construct(Client $client)
  {
    parent::__construct($client);
  }

  public function create($options)
  {
    return $this->client->post("companies", $options);
  }

  public function getCompanies($options)
  {
    return $this->client->get("companies", $options);
  }
}
