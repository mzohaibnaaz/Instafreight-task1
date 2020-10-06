# Tast 1


## Installation

clone the repo and run command inside project directory to install  dependency!

```bash
composer install
```

## Usage

using `insurance` class

```php
require __DIR__ . '/vendor/autoload.php';
use InstaFreight\Insurance;

$insurance = new Insurance();
$quotes = $insurance->getQuotes();

```

#### Pass providers as array
script automatically loads the required provider!
```php
$quotes = $insurance->getQuotes(["bank","insurance-company"]);

``` 

### Create new provider
create new provider using `CLI` tool!
> created CLI tool just for fun :)

command

```bash
php InstaFreight provider:create name
```
it will generate a new provider in `providers` folder with following code
```php
<?php
// auto-generated FILE using CLI
namespace Providers;
use Curl\Curl;
use InstaFreight\BaseProvider;

class TestProvider extends BaseProvider {
    
    // implemented method
    function getQuote(){
        
        // add logic here
        return $this->error(501, "Provider is not Implemented yet!");
    
    }
    
}
?>
```
do all the fun code inside `getQuote` :)
```
Note: When you creating provider file. make sure you follow these rules

> Provider file name & class name should be same
> File name should start with Capital letter
> Provider name should add Provider kayword at the end Ex if you create `test` provider it should be named like `TestProvider`
```
If you using CLI tool, don't need to add Provider at the end just enter name Ex if you creating `test` provider cmd will be
```bash
php InstaFreight provider:create test
```