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

$quotes = $insurance->getQuotes();

```

#### Pass providers as array
script automatically loads the required provider!
```php
$quotes = $insurance->getQuotes(["bank","insurance-company"]);

``` 

### Create new provider
create new provider using CLI tool!
> create CLI tool just for fun :)

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