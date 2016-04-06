<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomClient {

  private $http_client;

  public $usernamePart;
  public $passwordPart;

  public $users;

  public function __construct($usernamePart, $passwordPart)
  {
    $this->setDefaultClient();
    $this->users = new IntercomUsers($this);

    $this->usernamePart = $usernamePart;
    $this->$passwordPart = $passwordPart;
  }

  private function setDefaultClient()
  {
    $this->http_client = new Client();
  }

  public function setClient($client)
  {
    $this->http_client = $client;
  }

  public function post($endpoint, $json)
  {
    $this->http_client->request('POST', 'https://api.intercom.io/users', [
      'json' => $json,
      'auth' => $this->getAuth()
    ]);
  }

  private function getAuth()
  {
    return [$this->usernamePart, $this->passwordPart];
  }
}
