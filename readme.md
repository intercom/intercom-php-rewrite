## Clients

```php
$client = new IntercomClient(appId, apiKey);
```

## Users

```php
$client->users->create([
  'email' => 'test@intercom.io'
]);

// Add companies to users
$client->users->create([
  'email' => 'test@intercom.io',
  "companies" => [
    [
      "id" => "3"
    ]
  ]
]);

// Find user by email
$client->users->getUsers(['email' => 'bob@intercom.io'])->getBody();
```
