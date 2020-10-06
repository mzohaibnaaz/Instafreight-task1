<?php
namespace Providers;
use Curl\Curl;
use InstaFreight\BaseProvider;

class InsuranceCompanyProvider extends BaseProvider {
    
    private $_url = 'http://demo9084693.mockable.io/insurance';
    
    function getQuote(){
        
        // because api link isn't working so i'm gonna use dummy data
        return $this->success(10);
        
        // incase if you use API request
        // because i'm using composer with project
        // i can use third-party libraries as dependancy
        
        // i'm using curl library to make API request
        // see the doc here
        // https://github.com/php-curl-class/php-curl-class
        
        $curl = new Curl();
        $curl->post($this->_url, array(
            'month' => 3
        ));
        
        if ($curl->error) {
            return $this->error($curl->errorCode, $curl->errorMessage);
        } else {
            // if there is no error process the Api response
            $res = json_decode($curl->response);
            // change the values as you desire and return it with success
            // let's say response gives us price
            $price = $res->price;
            
            return $this->success($price);
        }
        
    }
    
}
?>