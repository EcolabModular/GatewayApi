<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class NoteService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.notes.base_uri');
        $this->secret = config('services.notes.secret');
    }

    public function getAll($query=[]){
        return $this->performRequest('GET', '/notes',$query);
    }

    public function itemNotes($id){
        return $this->performRequest('GET', "/itemnotes/{$id}");
    }

    public function create($data){
        return $this->performRequest('POST', '/notes', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/notes/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/notes/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/notes/{$id}");
    }
}
