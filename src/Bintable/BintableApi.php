<?php
namespace Bintable;

/**
 * @description Bintable Lookup API PHP Package
 * @author Bintable.com
 * @since 14/02/2020
 */
class BintableApi{
    private $base_url = 'https://api.bintable.com/v1/';
    private $api_key;
    
    public function __construct($api_key="",$proxy=[]){
        if(!$api_key){
            throw new \Exception('Please provide API Key');
        }

        $this->api_key = $api_key;
    }

    /**
     * @description Lookup Bin Meta Information
     */
    public function Lookup($bin){
        $url = $this->base_url.$bin.'?api_key='.$this->api_key;
        return $this->_curl($url);
    }

    /**
     * @description Get account balance
     */
    public function Balance(){
        $url = $this->base_url.'balance?api_key='.$this->api_key;
        return $this->_curl($url);
    }

    /**
     * @description Get the API using CURl and fallback in case it doesn't exist
     */
    private function _curl($url){
        if (!function_exists('curl_init')){
            return file_get_contents($url);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, gethostname());
        curl_setopt($ch, CURLOPT_USERAGENT, "Bintable.com PHP API");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}