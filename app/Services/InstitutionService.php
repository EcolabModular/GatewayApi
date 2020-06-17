<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class InstitutionService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.institutions.base_uri');
        $this->secret = config('services.institutions.secret');
    }

    public function getAll($query=[]){
        return $this->performRequest('GET', '/institutions',$query);
    }

    public function create($data){
        return $this->performRequestWithFile('POST', '/institutions', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/institutions/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/institutions/{$id}", $data);
    }

    public function editWithFile($data, $id){
        return $this->performRequestWithFile('POST', "/institutions/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/institutions/{$id}");
    }
}
