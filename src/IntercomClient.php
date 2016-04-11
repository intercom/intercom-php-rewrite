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
    $this->events = new IntercomEvents($this);
    $this->companies = new IntercomCompanies($this);
    $this->messages = new IntercomMessages($this);
    $this->conversations = new IntercomConversations($this);
    $this->leads = new IntercomLeads($this);
    $this->admins = new IntercomAdmins($this);

    $this->usernamePart = $usernamePart;
    $this->passwordPart = $passwordPart;
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
    return $this->http_client->request('POST', "https://api.intercom.io/$endpoint", [
      'json' => $json,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
  }

  public function delete($endpoint, $json)
  {
    return $this->http_client->request('DELETE', "https://api.intercom.io/$endpoint", [
      'json' => $json,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
  }

  public function get($endpoint, $query)
  {
    return $this->http_client->request('GET', "https://api.intercom.io/$endpoint", [
      'query' => $query,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
  }

  public function getAuth()
  {
    return [$this->usernamePart, $this->passwordPart];
  }
}
