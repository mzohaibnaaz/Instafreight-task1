<?php
namespace InstaFreight;
use InstaFreight\ProviderManager;

class Insurance
{
    private $_pm;
    private $_errors = [];
    
    function __construct(){
        $this->_pm = new ProviderManager();
    }
    
    public function getQuotes($providers = ['bank','insurance-company']){
        
        $quotes = array();
        
        for ($i = 0; $i < count($providers); $i++) {
            
            // provider name
            $provider = $providers[$i];
            
            // load the provider with manager
            if($this->_pm->loadProvider($provider)){
                
                $data = $this->_pm->getProvider()->getQuote();
                // check if provider has valid value after the api call
                // 200 is a success code
                if($data["code"] == 200){
                    $quotes[$provider] = $data["data"];
                }else{
                    // because it's not a success code that means it contain some error
                    // because all the error handling and messages comes from provider itself
                    // store the provider error with sub-array in provider index
                    $this->_errors[$provider]["provider"] = $data;
                }
                
            } else {
                $this->_errors[$provider]["404"] = "The given provider '{$provider}' is invalid!";
            }
        }
        return $quotes;
    }
    
    public function getErrors(){
        return $this->_errors;
    }
    
    public function hasError(){
        return (count($this->_errors) > 0);
    }
    
    private function response($code=200, $data="", $errors){
        return json_encode([
            "code"      => $code,
            "data"      => $data,
            "errors"    => $errors
        ]);
    }
    
}

?>