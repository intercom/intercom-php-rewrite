<?php

use Intercom\IntercomConversations;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomConversationsTest extends PHPUnit_Framework_TestCase {
  public function testConversationsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $users = new IntercomConversations($stub);
    $this->assertEquals('foo', $users->getConversations([]));
  }
}
