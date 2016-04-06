## Clients

```php
$client = new IntercomClient(appId, apiKey);
```

## Users

```php
// Create/update a user
$client->users->create([
  'email' => 'test@intercom.io'
]);

// Add companies to a user
$client->users->create([
  'email' => 'test@intercom.io',
  "companies" => [
    [
      "id" => "3"
    ]
  ]
]);

// Find user by email
$client->users->getUsers(['email' => 'bob@intercom.io']);
```

## Events

```php
// Create an event
echo $client->events->create([
  "event_name" => "testing",
  "created_at" => 1391691571,
  "email" => "test@intercom.io"
]);

// View events for a user
$client->events->getEvents(["email" => "bob@intercom.io"]);
```
