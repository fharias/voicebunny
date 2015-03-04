<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('API', 'Lib/API');

class VoiceBunny extends API {

    public $URL = 'https://api.voicebunny.com';
    public $test = 0;

    public function VoiceBunny($test = 0, $userId='8686', $token='d18b4ed733fb37f718208cb9b681e7e0') {
        $this->test = $test;
        $this->userId = $userId;
        $this->token = $token;
    }

    public function addSpeedy($script, $title) {

        $response = $this->call('POST', 'projects/addSpeedy', array('test' => $this->test,
            'title' => $title, 'script' => $script), true, true);
        return json_decode($response);
    }
    
    public function reads($projectId){
        $response = $this->call('GET', 'reads', array($projectId), true, true);
        CakeLog::debug(print_r($response, true));
        return json_decode($response);
    }
    
    public function projects($projectId){
        $response = $this->call('GET', 'projects', array($projectId), true, true);
        CakeLog::debug(print_r($response, true));
        return json_decode($response);
    }

}
