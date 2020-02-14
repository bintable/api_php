# api_php
The Nodejs Package for BINTable.com API

# Installation
Please run > `composer require bintable/api_php`

# Usage
The package contains two endpoints
- BIN Lookup endpoint
- Balance check endpoint

For calling BIN lookup, you can use the following code after replacing the BIN, and API_KEY with valid data.

```php
require_once __DIR__ . '/vendor/autoload.php';
use Bintable\BintableApi;

try{
    $pi_key = ""; //YOUR API KEY
    $bintable = new BintableApi($pi_key);
    $lookup = $bintable->Lookup("403244");
    echo $lookup;
}catch(Exception $ex){
    echo $ex->getMessage();
}
```
For Calling Balance check

```php
require_once __DIR__ . '/vendor/autoload.php';
use Bintable\BintableApi;

try{
    $pi_key = ""; //YOUR API KEY
    $bintable = new BintableApi($pi_key);
    $balance = $bintable->Balance();
    echo $balance;
}catch(Exception $ex){
    echo $ex->getMessage();
}
```

For more information and API key, please visit
[BINTable BIN Lookup API] <https://bintable.com/get-api>
