<?php
require __DIR__ . '/vendor/autoload.php';
use InstaFreight\Insurance;

$insurance = new Insurance();
$quotes = $insurance->getQuotes();

// with providers as argument 

//$quotes = $insurance->getQuotes(["bank"]);
//$quotes = $insurance->getQuotes(["bank", "insurancecompany"]);

// test with invalid provider

//$quotes = $insurance->getQuotes(["bank", "insurancecompany", "test"]);



// check if there is any error
if($insurance->hasError()){
    foreach($insurance->getErrors() as $provider => $error){
        if(isset($error["404"])){
            // error coming from insurance file
            echo $error["404"];
        }else{
            // error coming from provider file
            echo $provider.": ".$error["provider"]["message"]. "<br />";
        }
    }
    
}else{
    var_dump($quotes);
}


// if you want to skip the invalid providers
// take out "var_dump($quotes)" this line from else block
//var_dump($quotes);

?>