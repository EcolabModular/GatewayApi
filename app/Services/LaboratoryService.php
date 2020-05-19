<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LaboratoryService{

    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.laboratories.base_uri');
    }

    public function getAll(){
        return $this->performRequest('GET', '/laboratories');
    }

    public function create($data){
        return $this->performRequest('POST', '/laboratories', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/laboratories/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/laboratories/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/laboratories/{$id}");
    }
}