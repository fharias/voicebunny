<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('VoiceBunny', 'Lib/VoiceBunny');
App::uses('Phrases', 'Lib/Phrases');

class SearchesController extends AppController {

    public function display() {
        $phrases = new Phrases();
        $response = $phrases->getPhrase();
        CakeLog::debug(print_r($response, true));
        $this->set('phrase', $response);
    }

    public function view($id = 0) {
        $search = $this->Search->findById($id);
        if ($search) {
            $prettyBunny = new VoiceBunny(1);
            $read = $prettyBunny->reads($search['Search']['projectId']);
            $project = $prettyBunny->projects($search['Search']['projectId']);
            $this->set('project', $project);
            if(@!$read->error){
                $this->set('data', $read);
            }else{
                $this->Session->setFlash(__('This project haven\'t a submited voice'), 'flash_failure');
            }
        } else {
            $this->Session->setFlash(__('Not found'), 'flash_failure');
        }
    }

    public function show() {
        $list = $this->Search->find('all');
        $this->set('list', $list);
    }

    public function add() {
        if ($this->request->is('post')) {
            $prettyBunny = new VoiceBunny(1);
            $response = $prettyBunny->addSpeedy($this->request->data['Search']['description'], $this->request->data['Search']['title']);
            if(@!$response->error){
                $this->request->data['Search']['projectId']=$response->project->id;
                if($this->Search->save($this->request->data)){
                    $this->Session->setFlash(__('Project Saved ID:'.$response->project->id), 'flash_success');
                }else{
                    $this->Session->setFlash(__('Project Not Saved ID:'.$response->project->id), 'flash_failure');
                }
            }else{
                $this->Session->setFlash(__($response->error->message), 'flash_failure');
            }
        } else {
            $this->redirect('display');
        }
    }

}
