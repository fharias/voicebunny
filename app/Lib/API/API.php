<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class API {

    public $URL = '';
    public $userId = '';
    public $token = '';

    /**
     * Call the API Methods
     * @param string $method can be PUT/POST/GET
     * @param string $action Action to call 
     * @param mixed $data array with data to send
     * @param boolean $auth Needs Authentication
     * @param boolean $ssl Needs SSL
     * @return mixed Response from API
     */
    public function call($method, $action, $data = false, $auth = false, $ssl = false) {
        $curl = curl_init();
        $url = $this->URL . '/'.$action;
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                
                if ($data){
                    if($this->isAssoc($data)){
                        $url = sprintf("%s?%s", $url, http_build_query($data));
                    }else{
                        foreach ($data as $var){
                            $url .= '/'.$var;
                        }
                    }
                }
        }
        CakeLog::debug($url);
        if ($ssl) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        if ($auth) {
            curl_setopt($curl, CURLOPT_USERPWD, $this->userId . ':' . $this->token);
        }
        curl_setopt($curl, CURLOPT_URL, $url );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    private function isAssoc($arr) {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

}
