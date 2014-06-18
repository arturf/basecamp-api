A PHP Wrapper for use with the [new Basecamp API](https://github.com/basecamp/bcx-api).
==============

Simple PHP library to communicate with Basecamp. Works only with new Basecamp.

Installation
------------
Install Composer

```
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

Add the following to your require block in composer.json config.

```
"arturf/basecamp-api": "dev-master"
```

Include Composer's autoloader:


```php
require_once dirname(__DIR__).'/vendor/autoload.php';
```

API Usage
-----------------

Get client
```php
$client = new \Basecamp\Client([
    'accountId' => '', // Basecamp account ID
    'appName' => '', // Application name (used as User-Agent header)

    // OAuth token
    'token' => '',
    // or
    'login' => '', // 37Signal's account login
    'password' => '', // 37Signal's account password
]);
```

List of all active projects
```php
$projects = $client->projects()->active();
```

Create new project
```php
$newProject = $client->projects()->create(
    [
        'name' => 'Name of project',
        'description' => 'Some description',
    ]
);
```

Update existing project
```php
$updateProject = $client->projects()->update(
    $projectId,
    [
        'name' => 'New name of project',
        'description' => 'Some description',
    ]
);
```

Contributing
------------

Welcome :)