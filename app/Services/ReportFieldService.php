<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReportFieldService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.reportfields.base_uri');
        $this->secret = config('services.reportfields.secret');
    }

    public function getAll(){
        return $this->performRequest('GET', '/fields');
    }

    public function create($data){
        return $this->performRequest('POST', '/fields', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/fields/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/fields/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/fields/{$id}");
    }

    public function reportFields($reporType){
        return $this->performRequest('GET', "/reportfields/{$reporType}");
    }
}
