<?php

namespace Intercom;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

class IntercomClient {

  /** @var Client $http_client */
  private $http_client;

  /** @var string API user authentication */
  protected $usernamePart;

  /** @var string API password authentication */
  protected $passwordPart;

  /** @var IntercomUsers $users */
  protected $users;

  /** @var IntercomEvents $events */
  protected $events;

  /** @var IntercomCompanies $companies */
  protected $companies;

  /** @var IntercomMessages $messages */
  protected $messages;

  /** @var IntercomConversations $conversations */
  protected $conversations;

  /** @var IntercomLeads $leads */
  protected $leads;

  /** @var IntercomAdmins $admins */
  protected $admins;

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
    $response = $this->http_client->request('POST', "https://api.intercom.io/$endpoint", [
      'json' => $json,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
    return $this->handleResponse($response);
  }

  public function delete($endpoint, $json)
  {
    $response = $this->http_client->request('DELETE', "https://api.intercom.io/$endpoint", [
      'json' => $json,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
    return $this->handleResponse($response);
  }

  public function get($endpoint, $query)
  {
    $response = $this->http_client->request('GET', "https://api.intercom.io/$endpoint", [
      'query' => $query,
      'auth' => $this->getAuth(),
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);
    return $this->handleResponse($response);
  }

  public function getAuth()
  {
    return [$this->usernamePart, $this->passwordPart];
  }

  private function handleResponse(Response $response){
    $stream = stream_for($response->getBody());
    $data = json_decode($stream->getContents());
    return $data;
  }
}
