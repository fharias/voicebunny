<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('API', 'Lib/API');
class Phrases extends API {
    public $URL = 'http://www.iheartquotes.com/api/v1';
    
    public function getPhrase(){
        $response = $this->call('GET', 'random', array('format'=>'json',
            'source'=>'love', 'max_lines'=>1));
        return json_decode($response);
    }
}