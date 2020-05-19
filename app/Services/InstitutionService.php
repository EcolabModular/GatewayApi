<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class InstitutionService{

    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.institutions.base_uri');
    }

    public function getAll(){
        return $this->performRequest('GET', '/institutions');
    }

    public function create($data){
        return $this->performRequest('POST', '/institutions', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/institutions/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/institutions/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/institutions/{$id}");
    }
}
