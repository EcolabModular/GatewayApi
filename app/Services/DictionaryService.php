<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class DictionaryService{

    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.dictionaries.base_uri');
    }

    public function getAll(){
        return $this->performRequest('GET', '/dictionaries');
    }

    public function create($data){
        return $this->performRequest('POST', '/dictionaries', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/dictionaries/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/dictionaries/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/dictionaries/{$id}");
    }
}
