<?php
namespace InstaFreight;

interface BaseProviderInterface
{
    public function getQuote();
}

class BaseProvider implements BaseProviderInterface{
    
    private $_successCode = 200;
    
    function error($code, $message=""){
        return [
            "code"      => $code,
            "message"   => $message
        ];
    }
    
    function success($data){
        return [
            "code"  =>  $this->_successCode,
            "data"  =>  $data 
        ];
    }
    
    public function getQuote()
    {
        return false;
    }
    
}
?>