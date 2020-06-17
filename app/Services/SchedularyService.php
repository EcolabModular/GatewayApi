<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class SchedularyService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.schedularies.base_uri');
        $this->secret = config('services.schedularies.secret');
    }

    public function getAll($query=[]){
        return $this->performRequest('GET', '/schedularies',$query);
    }

    public function create($data){
        return $this->performRequest('POST', '/schedularies', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/schedularies/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/schedularies/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/schedularies/{$id}");
    }

    public function itemschedulary($item){
        return $this->performRequest('GET', "/itemschedulary/{$item}");
    }
}
