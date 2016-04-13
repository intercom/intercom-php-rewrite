<?php
/**
 * Created by PhpStorm.
 * User: wavyx
 * Date: 12/04/16
 * Time: 14:47
 */

namespace Intercom;


use GuzzleHttp\Client;

class IntercomEndpoint
{

    /** @var Client $client */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

}