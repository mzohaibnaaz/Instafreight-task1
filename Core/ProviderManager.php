<?php
namespace InstaFreight;

class ProviderManager{
    
    private $_path;
    private $_dir = "providers";
    private $_provider;
    
    function __construct(){
        $this->_path = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->_dir.DIRECTORY_SEPARATOR;
        require_once "BaseProvider.php";
    }
    
    private function getFileName($provider="") {
        $provider = $this->_path.$this->getValidProviderName($provider).".php";
        return $provider;
    }
    
    private function getValidProviderName($provider=""){
        $provider = $provider = str_replace("-", "", $provider);
        return ucfirst($provider)."Provider";
    }
    
    private function isValid($provider=""){
        return file_exists($this->getFileName($provider));
    }
    
    function loadProvider($provider=""){
        if($this->isValid($provider)){
            require_once $this->getFileName($provider);
            $provider = "Providers\\".$this->getValidProviderName($provider);
            $this->_provider = new $provider;
            return $this->_provider;
        }else{
            return false;
        }
    }
    
    function getProvider(){
        return $this->_provider;
    }
    
}
?>